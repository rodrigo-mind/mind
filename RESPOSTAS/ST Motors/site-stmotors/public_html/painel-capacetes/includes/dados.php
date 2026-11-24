<?php
defined('PAINEL_LOADED') or die(http_response_code(403));

/**
 * dados.php — Camada de consultas do Painel Financeiro de Capacetes
 *
 * Regras de negócio aplicadas em TODAS as consultas abaixo:
 *  - Vendas com status = CANCELADA nunca entram em faturamento/lucro/custo.
 *  - Lucro de uma linha = valor_total - (valor_custo * quantidade).
 *  - "A Receber" em aberto é receita prevista — nunca somada ao lucro realizado.
 *  - "Total vendido a prazo" = soma dos pagamentos na forma A_RECEBER.
 *  - "Faturamento em caixa" = faturamento total - total a prazo (dinheiro que
 *    já entrou, com certeza, sem depender de recebimento futuro).
 *  - "Lucro em caixa" é o lucro ponderado pela fração à vista de cada venda
 *    (quando uma venda é parte à vista + parte a prazo, só a fração à vista
 *    do lucro entra aqui) — é um indicador derivado, não um valor bruto novo.
 *  - Mês/período usam sempre data_venda, nunca criado_em.
 *  - Saídas de caixa (capacete_saidas): só status = ATIVA entram nas somas.
 *    "Saldo em caixa" = faturamento em caixa - saídas. Saídas NÃO alteram
 *    faturamento, custo nem lucro (retirada de caixa não é custo de venda;
 *    a "Compra de capacete" vira custo quando o item é vendido).
 *    Período das saídas usa data_saida.
 *  - Capacete excluído do estoque: usamos o snapshot gravado no próprio item
 *    da venda (codigo/modelo/tamanho), pois capacete_id fica NULL
 *    (ON DELETE SET NULL) — e sinalizamos como "descontinuado".
 */

const FORMA_PAGAMENTO_LABELS = [
    'PIX' => 'Pix', 'DINHEIRO' => 'Dinheiro', 'CREDITO' => 'Crédito',
    'DEBITO' => 'Débito', 'TRANSFERENCIA' => 'Transferência',
    'FINANCIAMENTO' => 'Financiamento', 'A_RECEBER' => 'A Receber', 'OUTROS' => 'Outros',
];

const MESES_PT = [
    '01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março', '04' => 'Abril',
    '05' => 'Maio', '06' => 'Junho', '07' => 'Julho', '08' => 'Agosto',
    '09' => 'Setembro', '10' => 'Outubro', '11' => 'Novembro', '12' => 'Dezembro',
];

/** Monta cláusula WHERE de data_venda para um range (ou vazio se null = "todo o período"). */
function whereDataVenda(?string $start, ?string $end, array &$params, string $alias = 'v'): string {
    if (!$start || !$end) return '';
    $params[':dv_start'] = $start;
    $params[':dv_end']   = $end;
    return " AND {$alias}.data_venda BETWEEN :dv_start AND :dv_end ";
}

// ============================================================
// MESES DISPONÍVEIS (para as seções da Aba Vendas e o filtro da Aba Capacetes)
// ============================================================

/**
 * Lista os meses com dados (a partir de data_venda), do mais recente ao mais
 * antigo. O mês corrente sempre aparece primeiro, com o rótulo "Mês Atual",
 * mesmo que ainda não tenha nenhuma venda registrada.
 */
function getMesesComVendas(PDO $db): array {
    $rows = $db->query("SELECT DISTINCT DATE_FORMAT(data_venda, '%Y-%m') AS ym FROM capacete_vendas")->fetchAll();
    $yms = array_column($rows, 'ym');

    $tz = new DateTimeZone('America/Sao_Paulo');
    $now = new DateTime('now', $tz);
    $currentYm = $now->format('Y-m');

    if (!in_array($currentYm, $yms, true)) {
        $yms[] = $currentYm;
    }
    rsort($yms);

    $meses = [];
    foreach ($yms as $ym) {
        [$ano, $mes] = explode('-', $ym);
        $start = DateTime::createFromFormat('Y-m-d H:i:s', "{$ano}-{$mes}-01 00:00:00", $tz);
        if (!$start) continue;
        $end = (clone $start)->modify('last day of this month')->setTime(23, 59, 59);

        $meses[] = [
            'ym'    => $ym,
            'label' => ($ym === $currentYm) ? 'Mês Atual' : (MESES_PT[$mes] . '/' . $ano),
            'start' => $start->format('Y-m-d H:i:s'),
            'end'   => $end->format('Y-m-d H:i:s'),
        ];
    }
    return $meses;
}

/** Resolve um "ym" (ex: "2026-09") ou "tudo" em start/end para consultas. */
function resolverIntervaloYm(?string $ym): array {
    if (!$ym || $ym === 'tudo') {
        return [null, null];
    }
    $tz = new DateTimeZone('America/Sao_Paulo');
    if (!preg_match('/^\d{4}-\d{2}$/', $ym)) return [null, null];
    [$ano, $mes] = explode('-', $ym);
    $start = DateTime::createFromFormat('Y-m-d H:i:s', "{$ano}-{$mes}-01 00:00:00", $tz);
    if (!$start) return [null, null];
    $end = (clone $start)->modify('last day of this month')->setTime(23, 59, 59);
    return [$start->format('Y-m-d H:i:s'), $end->format('Y-m-d H:i:s')];
}

/** Monta cláusula de data_saida para um range (vazio = "todo o período"). */
function whereDataSaida(?string $start, ?string $end, array &$params): string {
    if (!$start || !$end) return '';
    $params[':ds_start'] = $start;
    $params[':ds_end']   = $end;
    return " AND data_saida BETWEEN :ds_start AND :ds_end ";
}

/** Soma das saídas ATIVAS no período (ou de tudo, se start/end forem null). */
function getTotalSaidas(PDO $db, ?string $start, ?string $end): float {
    $params = [];
    $where = whereDataSaida($start, $end, $params);
    $stmt = $db->prepare("SELECT COALESCE(SUM(valor), 0) AS total FROM capacete_saidas WHERE status = 'ATIVA' {$where}");
    $stmt->execute($params);
    return (float)($stmt->fetch()['total'] ?? 0);
}

// ============================================================
// RESUMO FINANCEIRO (usado na seção "Geral" e em cada mês da Aba Vendas)
// ============================================================

function pendenteRecebimento(PDO $db, ?string $start, ?string $end): float {
    $params = [];
    $whereData = whereDataVenda($start, $end, $params, 'v');
    // Inclui ABERTO e PARCIAL — uma baixa parcial não "some" da conta, só reduz
    // o saldo pendente (valor - valor_recebido). Antes, uma conta virava
    // PARCIAL e era excluída inteira dessa soma, mesmo com saldo em aberto.
    $sql = "
        SELECT COALESCE(SUM(cr.valor - cr.valor_recebido), 0) AS pendente
        FROM capacete_contas_receber cr
        INNER JOIN capacete_vendas v ON v.id = cr.venda_id
        WHERE cr.status IN ('ABERTO', 'PARCIAL') AND v.status = 'ATIVA' {$whereData}
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return (float)($stmt->fetch()['pendente'] ?? 0);
}

/**
 * Resumo financeiro completo de um intervalo (ou de tudo, se start/end forem null).
 * Usado tanto para o card "Geral" quanto para cada mês expansível.
 */
function getResumoFinanceiro(PDO $db, ?string $start, ?string $end): array {
    $params = [];
    $whereData = whereDataVenda($start, $end, $params, 'v');

    $sql = "
        SELECT
            v.id,
            v.valor_total,
            COALESCE(i.lucro_venda, 0) AS lucro_venda,
            COALESCE(i.custo_venda, 0) AS custo_venda,
            COALESCE(p.a_prazo, 0)     AS a_prazo,
            COALESCE(cr.pendente, 0)   AS pendente
        FROM capacete_vendas v
        LEFT JOIN (
            SELECT venda_id,
                   SUM(valor_total - (valor_custo * quantidade)) AS lucro_venda,
                   SUM(valor_custo * quantidade)                 AS custo_venda
            FROM capacete_venda_itens
            GROUP BY venda_id
        ) i ON i.venda_id = v.id
        LEFT JOIN (
            SELECT venda_id, SUM(valor) AS a_prazo
            FROM capacete_venda_pagamentos
            WHERE forma = 'A_RECEBER'
            GROUP BY venda_id
        ) p ON p.venda_id = v.id
        LEFT JOIN (
            -- Saldo ainda pendente HOJE em capacete_contas_receber (cai a cada
            -- baixa registrada em receber/index.php). Diferente de p.a_prazo,
            -- que é a fotografia do que foi lançado como 'A Receber' na hora
            -- da venda e nunca muda depois. É este valor (pendente), e não o
            -- a_prazo histórico, que deve ser descontado do faturamento/lucro
            -- em caixa — senão uma dívida quitada nunca vira caixa.
            SELECT venda_id,
                   SUM(CASE WHEN status IN ('ABERTO', 'PARCIAL') THEN valor - valor_recebido ELSE 0 END) AS pendente
            FROM capacete_contas_receber
            GROUP BY venda_id
        ) cr ON cr.venda_id = v.id
        WHERE v.status = 'ATIVA' {$whereData}
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $vendas = $stmt->fetchAll();

    $faturamento = 0.0; $custo = 0.0; $lucro = 0.0;
    $totalAPrazo = 0.0; $totalPendente = 0.0; $lucroCaixa = 0.0;
    foreach ($vendas as $v) {
        $valorTotal = (float)$v['valor_total'];
        $lucroVenda = (float)$v['lucro_venda'];
        $custoVenda = (float)$v['custo_venda'];
        // a_prazo: valor histórico lançado como "A Receber" na venda (fixo,
        // não muda com baixas) — usado só para o card informativo "Vendido a prazo".
        $aPrazo     = min((float)$v['a_prazo'], max(0, $valorTotal));
        // pendente: saldo que AINDA falta receber hoje (cai a cada baixa,
        // some quando a conta é quitada) — é este que define o que já é caixa.
        $pendente   = min((float)$v['pendente'], max(0, $valorTotal));

        $faturamento   += $valorTotal;
        $custo         += $custoVenda;
        $lucro         += $lucroVenda;
        $totalAPrazo   += $aPrazo;
        $totalPendente += $pendente;

        $fracaoCaixa = $valorTotal > 0 ? max(0.0, ($valorTotal - $pendente) / $valorTotal) : 1.0;
        $lucroCaixa  += $lucroVenda * $fracaoCaixa;
    }
    $vendasAtivas = count($vendas);

    $paramsCanc = [];
    $whereCanc = whereDataVenda($start, $end, $paramsCanc, 'v');
    $stmtCanc = $db->prepare("SELECT COUNT(*) AS total FROM capacete_vendas v WHERE v.status = 'CANCELADA' {$whereCanc}");
    $stmtCanc->execute($paramsCanc);
    $vendasCanceladas = (int)($stmtCanc->fetch()['total'] ?? 0);

    // Formas de pagamento: quantidade de vendas (distintas) + valor movimentado
    $paramsF = [];
    $whereF = whereDataVenda($start, $end, $paramsF, 'v');
    $sqlF = "
        SELECT p.forma, COUNT(DISTINCT p.venda_id) AS qtd, COALESCE(SUM(p.valor), 0) AS valor
        FROM capacete_venda_pagamentos p
        INNER JOIN capacete_vendas v ON v.id = p.venda_id
        WHERE v.status = 'ATIVA' {$whereF}
        GROUP BY p.forma
        ORDER BY valor DESC
    ";
    $stmtF = $db->prepare($sqlF);
    $stmtF->execute($paramsF);
    $formas = array_map(fn($r) => [
        'forma' => FORMA_PAGAMENTO_LABELS[$r['forma']] ?? $r['forma'],
        'chave' => $r['forma'],
        'qtd'   => (int)$r['qtd'],
        'valor' => (float)$r['valor'],
    ], $stmtF->fetchAll());

    $totalSaidas = getTotalSaidas($db, $start, $end);

    return [
        'faturamento'       => $faturamento,
        'custo_total'       => $custo,
        'lucro_total'       => $lucro,
        'margem_pct'        => $faturamento > 0 ? ($lucro / $faturamento) * 100 : 0.0,
        'total_a_prazo'     => $totalAPrazo,
        'faturamento_caixa' => $faturamento - $totalPendente,
        'lucro_caixa'       => $lucroCaixa,
        'total_saidas'      => $totalSaidas,
        'saldo_caixa'       => ($faturamento - $totalPendente) - $totalSaidas,
        'vendas_ativas'     => $vendasAtivas,
        'vendas_canceladas' => $vendasCanceladas,
        'ticket_medio'      => $vendasAtivas > 0 ? $faturamento / $vendasAtivas : 0.0,
        'pendente_receber'  => pendenteRecebimento($db, $start, $end),
        'formas'            => $formas,
    ];
}

// ============================================================
// ABA "CAPACETES"
// ============================================================

/**
 * Desempenho por modelo/tamanho. Estoque, custo e valor de venda vêm sempre
 * do cadastro ATUAL (não dependem de período). Quantidade vendida, receita e
 * lucro respeitam o período informado (ou "todo o período" se start/end forem null).
 */
function getDesempenhoCapacetes(PDO $db, ?string $start = null, ?string $end = null): array {
    $paramsAtivos = [];
    $whereAtivos = whereDataVenda($start, $end, $paramsAtivos, 'v');

    $sqlAtivos = "
        SELECT
            c.id, c.codigo, c.modelo, c.tamanho, c.valor_custo, c.valor_venda,
            c.quantidade AS estoque_atual, c.foto,
            COALESCE(a.qtd_vendida, 0)   AS qtd_vendida,
            COALESCE(a.receita_total, 0) AS receita_total,
            COALESCE(a.custo_total, 0)   AS custo_total,
            COALESCE(a.lucro_total, 0)   AS lucro_total
        FROM capacetes c
        LEFT JOIN (
            SELECT
                i.capacete_id,
                SUM(i.quantidade)                                   AS qtd_vendida,
                SUM(i.valor_total)                                  AS receita_total,
                SUM(i.valor_custo * i.quantidade)                   AS custo_total,
                SUM(i.valor_total - (i.valor_custo * i.quantidade)) AS lucro_total
            FROM capacete_venda_itens i
            INNER JOIN capacete_vendas v ON v.id = i.venda_id
            WHERE v.status = 'ATIVA' AND i.capacete_id IS NOT NULL {$whereAtivos}
            GROUP BY i.capacete_id
        ) a ON a.capacete_id = c.id
        ORDER BY c.modelo ASC
    ";
    $stmt = $db->prepare($sqlAtivos);
    $stmt->execute($paramsAtivos);
    $ativos = $stmt->fetchAll();

    $resultado = [];
    foreach ($ativos as $cRow) {
        $custo = (float)$cRow['valor_custo'];
        $venda = (float)$cRow['valor_venda'];
        $lucroUnit = $venda - $custo;
        $margem = $venda > 0 ? ($lucroUnit / $venda) * 100 : 0.0;

        $resultado[] = [
            'id'             => (int)$cRow['id'],
            'codigo'         => $cRow['codigo'],
            'modelo'         => $cRow['modelo'],
            'tamanho'        => $cRow['tamanho'],
            'foto'           => $cRow['foto'],
            'descontinuado'  => false,
            'estoque_atual'  => (int)$cRow['estoque_atual'],
            'valor_custo'    => $custo,
            'valor_venda'    => $venda,
            'lucro_unitario' => $lucroUnit,
            'margem_pct'     => $margem,
            'qtd_vendida'    => (int)$cRow['qtd_vendida'],
            'receita_total'  => (float)$cRow['receita_total'],
            'custo_total'    => (float)$cRow['custo_total'],
            'lucro_total'    => (float)$cRow['lucro_total'],
        ];
    }

    // Descontinuados: itens de venda ativa cujo capacete_id é NULL (cadastro excluído)
    $paramsDesc = [];
    $whereDesc = whereDataVenda($start, $end, $paramsDesc, 'v');
    $sqlDesc = "
        SELECT
            i.codigo, i.modelo, i.tamanho,
            AVG(i.valor_custo) AS valor_custo_medio,
            AVG(i.valor_unit)  AS valor_venda_medio,
            SUM(i.quantidade)  AS qtd_vendida,
            SUM(i.valor_total) AS receita_total,
            SUM(i.valor_custo * i.quantidade) AS custo_total,
            SUM(i.valor_total - (i.valor_custo * i.quantidade)) AS lucro_total
        FROM capacete_venda_itens i
        INNER JOIN capacete_vendas v ON v.id = i.venda_id
        WHERE v.status = 'ATIVA' AND i.capacete_id IS NULL {$whereDesc}
        GROUP BY i.codigo, i.modelo, i.tamanho
        ORDER BY i.modelo ASC
    ";
    $stmtDesc = $db->prepare($sqlDesc);
    $stmtDesc->execute($paramsDesc);
    $descontinuados = $stmtDesc->fetchAll();

    foreach ($descontinuados as $d) {
        $custo = (float)$d['valor_custo_medio'];
        $venda = (float)$d['valor_venda_medio'];
        $lucroUnit = $venda - $custo;
        $margem = $venda > 0 ? ($lucroUnit / $venda) * 100 : 0.0;

        // Só entra na lista se realmente teve movimento no período filtrado
        if ((int)$d['qtd_vendida'] <= 0) continue;

        $resultado[] = [
            'id'             => null,
            'codigo'         => $d['codigo'],
            'modelo'         => $d['modelo'],
            'tamanho'        => $d['tamanho'],
            'foto'           => null,
            'descontinuado'  => true,
            'estoque_atual'  => 0,
            'valor_custo'    => $custo,
            'valor_venda'    => $venda,
            'lucro_unitario' => $lucroUnit,
            'margem_pct'     => $margem,
            'qtd_vendida'    => (int)$d['qtd_vendida'],
            'receita_total'  => (float)$d['receita_total'],
            'custo_total'    => (float)$d['custo_total'],
            'lucro_total'    => (float)$d['lucro_total'],
        ];
    }

    return $resultado;
}

/**
 * Aplica busca e filtro de estoque (Todos / Em Estoque / Sem Estoque) + ordenação.
 * "Sem Estoque" cobre tanto capacetes cadastrados com quantidade zerada quanto
 * os descontinuados (que por definição não têm mais estoque físico).
 */
function filtrarCapacetes(array $lista, ?string $busca, ?string $filtroEstoque, ?string $ordenar): array {
    if ($busca !== null && $busca !== '') {
        $buscaNorm = mb_strtolower($busca);
        $lista = array_values(array_filter($lista, function ($item) use ($buscaNorm) {
            return str_contains(mb_strtolower($item['modelo']), $buscaNorm)
                || str_contains(mb_strtolower($item['codigo']), $buscaNorm);
        }));
    }

    if ($filtroEstoque === 'estoque') {
        $lista = array_values(array_filter($lista, fn($i) => !$i['descontinuado'] && $i['estoque_atual'] > 0));
    } elseif ($filtroEstoque === 'sem_estoque') {
        $lista = array_values(array_filter($lista, fn($i) => $i['descontinuado'] || $i['estoque_atual'] <= 0));
    }

    switch ($ordenar) {
        case 'mais_vendido':
            usort($lista, fn($a, $b) => $b['qtd_vendida'] <=> $a['qtd_vendida']);
            break;
        case 'margem':
            usort($lista, fn($a, $b) => $b['margem_pct'] <=> $a['margem_pct']);
            break;
        case 'mais_lucrativo':
        default:
            usort($lista, fn($a, $b) => $b['lucro_total'] <=> $a['lucro_total']);
            break;
    }

    return $lista;
}

function margemMediaGeral(array $lista): float {
    if (empty($lista)) return 0.0;
    $soma = array_sum(array_column($lista, 'margem_pct'));
    return $soma / count($lista);
}

// ============================================================
// ABA "ESTOQUE"
// ============================================================

/** Até esta quantidade (e acima de zero) o modelo é considerado "estoque baixo". */
const ESTOQUE_BAIXO_MAX = 2;

/**
 * Números do estoque ATUAL de capacetes (tabela `capacetes`), sem filtro de período.
 *  - investido      = soma de (valor_custo * quantidade)
 *  - valor_venda    = soma de (valor_venda * quantidade)
 *  - lucro_potencial = valor_venda - investido (se tudo for vendido ao preço de tabela)
 */
function getResumoEstoque(PDO $db): array {
    $r = $db->query("
        SELECT
            COUNT(*)                                   AS registros,
            COUNT(DISTINCT modelo)                     AS modelos,
            COALESCE(SUM(quantidade), 0)               AS unidades,
            COALESCE(SUM(valor_custo * quantidade), 0) AS investido,
            COALESCE(SUM(valor_venda * quantidade), 0) AS valor_venda,
            COALESCE(SUM(CASE WHEN quantidade = 0 THEN 1 ELSE 0 END), 0) AS sem_estoque,
            COALESCE(SUM(CASE WHEN quantidade BETWEEN 1 AND " . ESTOQUE_BAIXO_MAX . " THEN 1 ELSE 0 END), 0) AS estoque_baixo
        FROM capacetes
    ")->fetch();

    $unidades  = (int)$r['unidades'];
    $investido = (float)$r['investido'];
    $venda     = (float)$r['valor_venda'];
    $lucroPot  = $venda - $investido;

    $top = $db->query("
        SELECT modelo, tamanho, quantidade, (valor_custo * quantidade) AS investido
        FROM capacetes
        WHERE quantidade > 0
        ORDER BY investido DESC, modelo ASC
        LIMIT 5
    ")->fetchAll();

    return [
        'investido'       => $investido,
        'valor_venda'     => $venda,
        'lucro_potencial' => $lucroPot,
        'margem_potencial'=> $venda > 0 ? ($lucroPot / $venda) * 100 : 0.0,
        'unidades'        => $unidades,
        'registros'       => (int)$r['registros'],
        'modelos'         => (int)$r['modelos'],
        'sem_estoque'     => (int)$r['sem_estoque'],
        'estoque_baixo'   => (int)$r['estoque_baixo'],
        'baixo_max'       => ESTOQUE_BAIXO_MAX,
        'custo_medio'     => $unidades > 0 ? $investido / $unidades : 0.0,
        'preco_medio'     => $unidades > 0 ? $venda / $unidades : 0.0,
        'maior_capital'   => array_map(fn($t) => [
            'modelo'     => $t['modelo'],
            'tamanho'    => $t['tamanho'],
            'quantidade' => (int)$t['quantidade'],
            'investido'  => (float)$t['investido'],
        ], $top),
    ];
}
