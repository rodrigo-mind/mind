<?php
/**
 * /admin/capacetes/receber
 *
 * Contas a Receber geradas pelas vendas de capacetes (forma de
 * pagamento "A Receber" em venda/nova.php grava uma linha em
 * `capacete_contas_receber`).
 *
 * Diferente do cancelamento de Venda (que é lógico — a venda nunca
 * é apagada, só marcada como CANCELADA), aqui os dois botões fazem
 * exatamente o que dizem:
 *
 *   - "Dar baixa" (total ou parcial): NUNCA sobrescreve o valor já
 *     recebido. Cada baixa vira uma LINHA NOVA em
 *     `capacete_contas_receber_baixas` (histórico auditável) e o
 *     total recebido da conta é recalculado a partir disso. Quando
 *     o recebido atinge o valor da conta, ela vira RECEBIDO.
 *
 *   - "Excluir": exclusão de verdade (DELETE), não cancelamento.
 *     Remove a conta e todo o histórico de baixas ligado a ela.
 *     Não mexe na venda nem no estoque — a conta a receber é um
 *     registro financeiro independente da venda em si.
 *
 * Requer a migration em receber/schema.sql (colunas valor_recebido/
 * recebido_em + tabela capacete_contas_receber_baixas).
 */

define('ADMIN_LOADED', true);
require_once __DIR__ . '/../../includes/guard.php';
require_once __DIR__ . '/../../../includes/money.php';
require_once __DIR__ . '/../../../includes/db.php';

date_default_timezone_set('America/Sao_Paulo');

if (!function_exists('h')) {
    function h($v): string {
        return htmlspecialchars((string) ($v ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

$csrf    = getCsrfToken();
$erro    = '';
$sucesso = $_SESSION['capacetes_flash_sucesso'] ?? '';
unset($_SESSION['capacetes_flash_sucesso']);

$usuarioId = $_SESSION['usuario_id'] ?? $_SESSION['user_id'] ?? null;

$formasValidas = ['PIX', 'DINHEIRO', 'CREDITO', 'DEBITO', 'TRANSFERENCIA', 'FINANCIAMENTO', 'OUTROS'];

// ============================================================
// POST — dar baixa (total/parcial) ou excluir
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida.';
    } else {
        $acao = $_POST['acao'] ?? '';
        $db   = getDB();

        // ── Dar baixa (total ou parcial) ──────────────────────
        if ($acao === 'baixa') {
            $contaId = (int) ($_POST['id'] ?? 0);
            $valorBx = precoToFloat($_POST['valor'] ?? '0');
            $forma   = strtoupper(trim($_POST['forma'] ?? ''));
            $obs     = trim($_POST['observacao'] ?? '');
            $obs     = $obs === '' ? null : $obs;

            $dataIn = trim($_POST['data_baixa'] ?? '');
            $dt     = $dataIn !== '' ? DateTime::createFromFormat('Y-m-d\TH:i', $dataIn) : new DateTime();
            if ($dt === false) $dt = new DateTime();
            $dataBaixaSql = $dt->format('Y-m-d H:i:s');

            try {
                if ($contaId <= 0)                              throw new RuntimeException('Conta inválida.');
                if (!in_array($forma, $formasValidas, true))    throw new RuntimeException('Forma de recebimento inválida.');
                if ($valorBx <= 0)                               throw new RuntimeException('Informe um valor de baixa maior que zero.');

                $db->beginTransaction();

                $st = $db->prepare('SELECT * FROM capacete_contas_receber WHERE id = ? FOR UPDATE');
                $st->execute([$contaId]);
                $conta = $st->fetch();

                if (!$conta) {
                    throw new RuntimeException('Conta a receber não encontrada.');
                }
                if ($conta['status'] === 'CANCELADO') {
                    throw new RuntimeException('Essa conta está cancelada (venda excluída) e não aceita baixas.');
                }
                if ($conta['status'] === 'RECEBIDO') {
                    throw new RuntimeException('Essa conta já foi totalmente recebida.');
                }

                $pendente = round((float) $conta['valor'] - (float) $conta['valor_recebido'], 2);

                if ($valorBx > $pendente + 0.01) {
                    throw new RuntimeException('Valor informado (R$ ' . precoExibir($valorBx) . ') é maior que o valor pendente (R$ ' . precoExibir($pendente) . ').');
                }

                // Registra a baixa como uma NOVA linha (histórico auditável).
                $db->prepare(
                    'INSERT INTO capacete_contas_receber_baixas
                     (conta_id, valor, forma_pagamento, observacao, usuario_id, criado_em)
                     VALUES (?, ?, ?, ?, ?, ?)'
                )->execute([$contaId, $valorBx, $forma, $obs, $usuarioId, $dataBaixaSql]);

                $novoRecebido = (float) $conta['valor_recebido'] + $valorBx;
                $quitada      = ($conta['valor'] - $novoRecebido) <= 0.01;
                if ($quitada) $novoRecebido = (float) $conta['valor']; // trava arredondamento

                $novoStatus = $quitada ? 'RECEBIDO' : 'PARCIAL';

                $db->prepare(
                    'UPDATE capacete_contas_receber
                     SET valor_recebido = ?, status = ?, recebido_em = ?
                     WHERE id = ?'
                )->execute([$novoRecebido, $novoStatus, $quitada ? $dataBaixaSql : null, $contaId]);

                $db->commit();

                $restante = round((float) $conta['valor'] - $novoRecebido, 2);
                $sucesso  = 'Baixa de R$ ' . precoExibir($valorBx) . ' registrada na conta #' . $contaId . '.'
                          . ($quitada ? ' Conta quitada.' : ' Restam R$ ' . precoExibir($restante) . ' em aberto.');
            } catch (Throwable $e) {
                if ($db->inTransaction()) $db->rollBack();
                $erro = $e->getMessage();
            }
        }

        // ── Excluir definitivamente ────────────────────────────
        if ($acao === 'excluir') {
            $contaId = (int) ($_POST['id'] ?? 0);
            try {
                if ($contaId <= 0) throw new RuntimeException('Conta inválida.');

                $db->beginTransaction();

                $st = $db->prepare('SELECT id FROM capacete_contas_receber WHERE id = ? FOR UPDATE');
                $st->execute([$contaId]);
                if (!$st->fetch()) {
                    throw new RuntimeException('Conta a receber não encontrada.');
                }

                // Apaga o histórico de baixas e, por fim, a conta.
                // (a FK do schema.sql já faz isso em cascata; o DELETE
                // explícito aqui é só uma segurança caso a FK não exista.)
                $db->prepare('DELETE FROM capacete_contas_receber_baixas WHERE conta_id = ?')->execute([$contaId]);
                $db->prepare('DELETE FROM capacete_contas_receber WHERE id = ?')->execute([$contaId]);

                $db->commit();
                $sucesso = 'Conta a receber #' . $contaId . ' excluída definitivamente.';
            } catch (Throwable $e) {
                if ($db->inTransaction()) $db->rollBack();
                $erro = $e->getMessage();
            }
        }
    }
}

// ============================================================
// LISTAGEM
// ============================================================
$db = getDB();
$contas = $db->query(
    "SELECT cr.*, cv.cliente_nome, cv.cliente_cpf, cv.cliente_telefone, cv.data_venda
     FROM capacete_contas_receber cr
     JOIN capacete_vendas cv ON cv.id = cr.venda_id
     ORDER BY (cr.status IN ('ABERTO','PARCIAL')) DESC, cr.data_venc ASC, cr.id DESC"
)->fetchAll();

$baixasPorConta = [];
if (!empty($contas)) {
    $ids = array_map(fn($c) => (int) $c['id'], $contas);
    $ph  = implode(',', array_fill(0, count($ids), '?'));
    $st  = $db->prepare("SELECT * FROM capacete_contas_receber_baixas WHERE conta_id IN ($ph) ORDER BY criado_em ASC, id ASC");
    $st->execute($ids);
    foreach ($st->fetchAll() as $bx) {
        $baixasPorConta[(int) $bx['conta_id']][] = $bx;
    }
}

$hoje = date('Y-m-d');

$totAberto = 0; $totRecebido = 0; $totCancelado = 0; $totAtrasado = 0;
$somaPendente = 0.0; $somaAtrasado = 0.0; $somaRecebido = 0.0;

foreach ($contas as $c) {
    $pendente = round((float) $c['valor'] - (float) $c['valor_recebido'], 2);
    $atrasada = in_array($c['status'], ['ABERTO', 'PARCIAL'], true) && $c['data_venc'] < $hoje;

    if ($c['status'] === 'RECEBIDO') {
        $totRecebido++;
        $somaRecebido += (float) $c['valor_recebido'];
    } elseif ($c['status'] === 'CANCELADO') {
        $totCancelado++;
    } else {
        $totAberto++;
        $somaPendente += $pendente;
        if ($atrasada) { $totAtrasado++; $somaAtrasado += $pendente; }
    }
}

function labelForma(string $f): string {
    return match ($f) {
        'PIX'           => 'Pix',
        'DINHEIRO'      => 'Dinheiro',
        'CREDITO'       => 'Crédito',
        'DEBITO'        => 'Débito',
        'TRANSFERENCIA' => 'Transferência',
        'FINANCIAMENTO' => 'Financiamento',
        'OUTROS'        => 'Outros',
        default         => ucfirst(strtolower($f)),
    };
}
function statusInfo(string $status, bool $atrasada): array {
    if ($atrasada && in_array($status, ['ABERTO', 'PARCIAL'], true)) {
        return ['Atrasada', '#dc2626'];
    }
    return match ($status) {
        'ABERTO'    => ['Em aberto', '#d97706'],
        'PARCIAL'   => ['Parcial',   '#2563eb'],
        'RECEBIDO'  => ['Recebida',  '#16a34a'],
        'CANCELADO' => ['Cancelada', '#6b7280'],
        default     => [$status, '#6b7280'],
    };
}
function fmtData(string $s): string {
    $dt = DateTime::createFromFormat('Y-m-d', substr($s, 0, 10));
    return $dt ? $dt->format('d/m/Y') : $s;
}
function fmtDataHora(string $s): string {
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $s);
    return $dt ? $dt->format('d/m/Y H:i') : $s;
}
function mascCpf(string $c): string {
    return strlen($c) === 11 ? substr($c,0,3).'.'.substr($c,3,3).'.'.substr($c,6,3).'-'.substr($c,9,2) : $c;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas a Receber — Capacetes — ST Motors Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-venda.css">
    <style>
        /* ==========================================================
           Contas a Receber — estilos próprios da página (namespace
           "cr-"), para não depender de classes de outras telas
           (cv-*) que não foram pensadas para esse layout.
           ========================================================== */
        .cr-summary {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-bottom: 4px;
        }
        .cr-stat {
            flex: 1 1 180px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-left: 3px solid var(--cr-accent, #94a3b8);
            border-radius: 10px;
            padding: 14px 16px;
        }
        .cr-stat--aberto   { --cr-accent: #d97706; }
        .cr-stat--atrasado { --cr-accent: #dc2626; }
        .cr-stat--recebido { --cr-accent: #16a34a; }
        .cr-stat__label {
            font-size: .72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .04em;
            color: #94a3b8;
        }
        .cr-stat__value {
            font-size: 1.4rem;
            font-weight: 700;
            color: #0f172a;
            margin-top: 4px;
            line-height: 1.2;
        }
        .cr-stat__count {
            font-size: .78rem;
            color: #94a3b8;
            margin-top: 2px;
        }

        .cr-tabs {
            display: inline-flex;
            gap: 2px;
            background: #f1f5f9;
            padding: 4px;
            border-radius: 10px;
            margin: 4px 0 18px;
        }
        .cr-tab {
            appearance: none;
            border: 0;
            background: transparent;
            color: #64748b;
            font-family: inherit;
            font-size: .84rem;
            font-weight: 600;
            padding: 7px 14px;
            border-radius: 7px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: background .15s, color .15s;
        }
        .cr-tab:hover { color: #1e293b; }
        .cr-tab.is-active {
            background: #fff;
            color: #0f172a;
            box-shadow: 0 1px 2px rgba(15, 23, 42, .08);
        }
        .cr-tab__count {
            background: #e2e8f0;
            color: #475569;
            font-size: .7rem;
            font-weight: 700;
            padding: 1px 7px;
            border-radius: 999px;
            line-height: 1.5;
        }
        .cr-tab.is-active .cr-tab__count { background: #0f172a; color: #fff; }

        .cr-list {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }
        .cr-row + .cr-row { border-top: 1px solid #f1f5f9; }
        .cr-row__head {
            width: 100%;
            appearance: none;
            border: 0;
            background: none;
            font-family: inherit;
            text-align: left;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            transition: background .12s;
        }
        .cr-row__head:hover { background: #f8fafc; }
        .cr-dot { width: 8px; height: 8px; border-radius: 50%; flex: 0 0 auto; }
        .cr-row__main { flex: 1; min-width: 0; }
        .cr-row__cliente {
            font-size: .93rem;
            font-weight: 600;
            color: #0f172a;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .cr-row__meta {
            font-size: .78rem;
            color: #94a3b8;
            margin-top: 1px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .cr-badge {
            flex: 0 0 auto;
            font-size: .7rem;
            font-weight: 700;
            color: #fff;
            padding: 3px 10px;
            border-radius: 999px;
            white-space: nowrap;
        }
        .cr-row__valor {
            flex: 0 0 auto;
            min-width: 100px;
            text-align: right;
            font-size: .98rem;
            font-weight: 700;
            color: #0f172a;
        }
        .cr-chevron { flex: 0 0 auto; color: #cbd5e1; transition: transform .2s; }
        .cr-row.is-open .cr-chevron { transform: rotate(90deg); }
        .cr-row.is-open .cr-row__head { background: #f8fafc; }

        .cr-row__body {
            padding: 4px 18px 20px;
            background: #fafbfc;
            border-top: 1px solid #f1f5f9;
        }
        .cr-details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin: 16px 0;
        }
        .cr-detail {
            background: #fff;
            border: 1px solid #eef1f4;
            border-radius: 9px;
            padding: 10px 13px;
        }
        .cr-detail__label {
            font-size: .68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .03em;
            color: #94a3b8;
        }
        .cr-detail__value {
            font-size: 1rem;
            font-weight: 700;
            color: #0f172a;
            margin-top: 2px;
        }
        .cr-detail--destaque .cr-detail__value { color: #b45309; }

        .cr-hist { margin-top: 18px; }
        .cr-hist__title {
            font-size: .74rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .03em;
            color: #64748b;
            margin-bottom: 8px;
        }
        .cr-hist-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 0;
            border-bottom: 1px dashed #e2e8f0;
            font-size: .85rem;
        }
        .cr-hist-row:last-child { border-bottom: 0; }
        .cr-hist-forma {
            background: #eef2ff;
            color: #4338ca;
            font-weight: 700;
            font-size: .7rem;
            padding: 2px 9px;
            border-radius: 6px;
            flex: 0 0 auto;
        }
        .cr-hist-data { color: #94a3b8; flex: 1; }
        .cr-hist-valor { font-weight: 700; color: #0f172a; flex: 0 0 auto; }
        .cr-hist-obs { font-size: .78rem; color: #94a3b8; padding: 0 0 8px 2px; margin-top: -4px; }

        .cr-note {
            font-size: .8rem;
            color: #94a3b8;
            font-style: italic;
            margin-top: 14px;
        }

        .cr-actions { display: flex; gap: 8px; margin-top: 18px; }
        .cr-btn {
            appearance: none;
            border: 0;
            border-radius: 8px;
            padding: 9px 16px;
            font-family: inherit;
            font-size: .84rem;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background .12s;
        }
        .cr-btn--primary { background: #0f172a; color: #fff; }
        .cr-btn--primary:hover { background: #1e293b; }
        .cr-btn--danger { background: #fef2f2; color: #dc2626; }
        .cr-btn--danger:hover { background: #fee2e2; }

        @media (max-width: 640px) {
            .cr-row__meta { display: none; }
            .cr-row__valor { min-width: 78px; font-size: .88rem; }
        }

@media (max-width: 640px) {

    /* -- Cartões de resumo (Em aberto / Atrasado / Recebido) -- */
    .cr-summary {
        gap: 0.6rem;
    }
    .cr-stat {
        flex: 1 1 calc(50% - 0.6rem);
        padding: 12px 14px;
        min-width: 0; /* evita que o conteúdo interno force largura mínima */
    }
    .cr-stat__value {
        font-size: 1.2rem;
        word-break: break-word;
    }

    /* -- Abas de filtro: sem isso, 4 abas em linha podem não
       caber e estourar a largura da tela -- */
    .cr-tabs {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }
    .cr-tab {
        flex: 1 1 auto;
        justify-content: center;
    }

    /* -- Cabeçalho de cada conta: quebra em 2 linhas --
       Linha 1: ponto + nome do cliente + seta
       Linha 2: badge de status + valor (alinhado à direita) */
    .cr-row__head {
        flex-wrap: wrap;
        row-gap: 6px;
        padding: 12px 14px;
    }

    .cr-dot   { order: 1; }
    .cr-row__main {
        order: 2;
        flex: 1 1 auto;
        min-width: 0; /* garante que o nome trunque em vez de estourar */
    }
    .cr-chevron { order: 3; }

    /* Força a quebra de linha antes do badge, sem precisar
       alterar o HTML: um item "fantasma" com 100% de largura. */
    .cr-row__head::after {
        content: "";
        order: 4;
        flex-basis: 100%;
        height: 0;
    }

    .cr-badge {
        order: 5;
        margin-left: 22px; /* alinha visualmente com o nome do cliente, após o ponto */
    }
    .cr-row__valor {
        order: 6;
        margin-left: auto; /* empurra o valor para a direita na 2ª linha */
        min-width: 0;
        text-align: right;
    }

    /* -- Corpo expandido da conta -- */
    .cr-row__body {
        padding: 4px 14px 16px;
    }
    .cr-details-grid {
        grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 8px;
    }
    .cr-detail {
        padding: 9px 11px;
        min-width: 0;
    }
    .cr-detail__value {
        font-size: 0.92rem;
        word-break: break-word;
    }

    /* -- Histórico de baixas: evita que forma+data+valor
       estourem lado a lado em telas muito estreitas -- */
    .cr-hist-row {
        flex-wrap: wrap;
        row-gap: 4px;
    }
    .cr-hist-data {
        flex: 1 1 auto;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* -- Ações (Dar Baixa / Excluir): empilha em telas bem
       pequenas para os botões não ficarem espremidos -- */
    .cr-actions {
        flex-wrap: wrap;
    }
    .cr-actions .cr-btn {
        flex: 1 1 auto;
        justify-content: center;
    }
}

@media (max-width: 380px) {
    /* Telas muito estreitas: cada stat ocupa a linha toda */
    .cr-stat {
        flex: 1 1 100%;
    }

    /* Botões de ação um embaixo do outro */
    .cr-actions {
        flex-direction: column;
    }
    .cr-actions .cr-btn {
        width: 100%;
    }
}
    </style>
</head>
<body class="dashboard-page">

<!-- Sidebar -->
  <aside class="sidebar" id="sidebar" aria-label="Menu administrativo">
    <div class="sidebar__logo">
      <img src="/assets/images/logo-header.svg" alt="ST Motors" width="120" height="42">
    </div>

    <nav class="sidebar__nav" aria-label="Navegação do painel">
      <ul class="sidebar__list">
        <li class="sidebar__item">
          <a href="/admin/dashboard.php" class="sidebar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Dashboard
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/estoque" class="sidebar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="5" cy="17" r="3"/><circle cx="19" cy="17" r="3"/><path d="M7 17h5l3-5h3"/><path d="M10 12l1.5-3h3"/><path d="M14.5 9h2.5"/><path d="M8 12h4"/></svg>
            Estoque de Motos
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/clientes" class="sidebar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Clientes
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/avaliacoes/index.php" class="sidebar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            Avaliações Google
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/capacetes" class="sidebar__link sidebar__link--active">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M19 18c1.5-1.5 2.5-3.5 2.5-6.5 0-4.5-3.5-8-8.5-8C8 3.5 5 5 4 8c-.8 2.5-.8 5 .5 7.5l2 2.5C8 19 10 20 12.5 20h2.5c1.5 0 3-1 4-2z" />
              <path d="M4 11h9.5c1.5 0 2-1 2-2.5S14.5 6 12 6H7.5" />
              <circle cx="13.5" cy="8.5" r="0.75" />
              <path d="M5.5 13.5h2" />
              <path d="M6 15.5h2" />
              <path d="M18.5 14c-.5-1-1-2.5-1-2.5" />
            </svg>
            Capacetes
          </a>
        </li>
      </ul>
    </nav>

    <div class="sidebar__footer">
      <a
        href="/admin/dashboard.php?logout=1&token=<?= h($csrf) ?>"
        class="sidebar__logout"
        aria-label="Sair do painel"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Sair
      </a>
    </div>
  </aside>

<div class="admin-layout">
    <header class="topbar">
        <button class="topbar__toggle" id="sidebar-toggle" aria-label="Menu" aria-expanded="false" aria-controls="sidebar"><span></span><span></span><span></span></button>
        <h1 class="topbar__title">Contas a Receber</h1>
        <a href="../venda/" class="btn btn--ghost-dark" style="margin-left:auto">← Vendas</a>
    </header>

    <main class="admin-main" id="main-content">
        <div class="admin-content">

            <?php if ($sucesso): ?>
                <div class="alert alert--success"><?= h($sucesso) ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert--error"><?= h($erro) ?></div>
            <?php endif; ?>

            <section class="cadastro-section">
                <div class="cr-summary">
                    <div class="cr-stat cr-stat--aberto">
                        <div class="cr-stat__label">Em aberto</div>
                        <div class="cr-stat__value">R$ <?= precoExibir($somaPendente) ?></div>
                        <div class="cr-stat__count"><?= $totAberto ?> conta(s)</div>
                    </div>
                    <div class="cr-stat cr-stat--atrasado">
                        <div class="cr-stat__label">Atrasado</div>
                        <div class="cr-stat__value">R$ <?= precoExibir($somaAtrasado) ?></div>
                        <div class="cr-stat__count"><?= $totAtrasado ?> conta(s)</div>
                    </div>
                    <div class="cr-stat cr-stat--recebido">
                        <div class="cr-stat__label">Recebido</div>
                        <div class="cr-stat__value">R$ <?= precoExibir($somaRecebido) ?></div>
                        <div class="cr-stat__count"><?= $totRecebido ?> conta(s)</div>
                    </div>
                </div>
            </section>

            <section class="cadastro-section">
                <h2 class="dash-section__title">Contas a Receber</h2>
                <p class="dash-section__subtitle"><?= count($contas) ?> conta(s) no total, geradas por vendas com pagamento "A Receber".</p>

                <?php if (empty($contas)): ?>
                    <p class="empty-state">Nenhuma conta a receber registrada ainda.</p>
                <?php else: ?>
                    <div class="cr-tabs" role="tablist" aria-label="Filtro de contas a receber">
                        <button type="button" class="cr-tab is-active" data-tab="abertas" role="tab" aria-selected="true">
                            Em Aberto <span class="cr-tab__count"><?= $totAberto ?></span>
                        </button>
                        <button type="button" class="cr-tab" data-tab="recebidas" role="tab" aria-selected="false">
                            Recebidas <span class="cr-tab__count"><?= $totRecebido ?></span>
                        </button>
                        <button type="button" class="cr-tab" data-tab="canceladas" role="tab" aria-selected="false">
                            Canceladas <span class="cr-tab__count"><?= $totCancelado ?></span>
                        </button>
                        <button type="button" class="cr-tab" data-tab="todas" role="tab" aria-selected="false">
                            Geral <span class="cr-tab__count"><?= count($contas) ?></span>
                        </button>
                    </div>

                    <p class="empty-state" id="cr-tab-vazio" hidden>Nenhuma conta encontrada nesse filtro.</p>

                    <div class="cr-list">
                        <?php foreach ($contas as $c):
                            $cid       = (int) $c['id'];
                            $pendente  = round((float) $c['valor'] - (float) $c['valor_recebido'], 2);
                            $atrasada  = in_array($c['status'], ['ABERTO', 'PARCIAL'], true) && $c['data_venc'] < $hoje;
                            [$statusLabel, $statusCor] = statusInfo($c['status'], $atrasada);
                            $baixas    = $baixasPorConta[$cid] ?? [];
                            $grupo     = $c['status'] === 'RECEBIDO' ? 'recebida' : ($c['status'] === 'CANCELADO' ? 'cancelada' : 'aberta');
                            $podeBaixa = in_array($c['status'], ['ABERTO', 'PARCIAL'], true);
                        ?>
                        <div class="cr-row" data-status="<?= $grupo ?>" <?= $grupo !== 'aberta' ? 'hidden' : '' ?>>
                            <button type="button" class="cr-row__head" data-toggle="conta-<?= $cid ?>">
                                <span class="cr-dot" style="background:<?= $statusCor ?>"></span>
                                <span class="cr-row__main">
                                    <span class="cr-row__cliente"><?= h($c['cliente_nome']) ?></span>
                                    <span class="cr-row__meta">Venda #<?= (int) $c['venda_id'] ?> · Conta #<?= $cid ?> · Venc. <?= h(fmtData($c['data_venc'])) ?></span>
                                </span>
                                <span class="cr-badge" style="background:<?= $statusCor ?>"><?= h($statusLabel) ?></span>
                                <span class="cr-row__valor">R$ <?= precoExibir($podeBaixa ? $pendente : (float) $c['valor']) ?></span>
                                <svg class="cr-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 6 6 6-6 6"/></svg>
                            </button>

                            <div class="cr-row__body" id="conta-<?= $cid ?>" hidden>
                                <div class="cr-details-grid">
                                    <div class="cr-detail">
                                        <div class="cr-detail__label">Valor total</div>
                                        <div class="cr-detail__value">R$ <?= precoExibir((float) $c['valor']) ?></div>
                                    </div>
                                    <div class="cr-detail">
                                        <div class="cr-detail__label">Já recebido</div>
                                        <div class="cr-detail__value">R$ <?= precoExibir((float) $c['valor_recebido']) ?></div>
                                    </div>
                                    <?php if ($podeBaixa): ?>
                                    <div class="cr-detail cr-detail--destaque">
                                        <div class="cr-detail__label">Pendente</div>
                                        <div class="cr-detail__value">R$ <?= precoExibir($pendente) ?></div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="cr-detail">
                                        <div class="cr-detail__label">CPF do cliente</div>
                                        <div class="cr-detail__value" style="font-size:.88rem"><?= h(mascCpf($c['cliente_cpf'])) ?></div>
                                    </div>
                                </div>

                                <?php if (!empty($baixas)): ?>
                                    <div class="cr-hist">
                                        <div class="cr-hist__title">Histórico de Baixas (<?= count($baixas) ?>)</div>
                                        <?php foreach ($baixas as $bx): ?>
                                            <div class="cr-hist-row">
                                                <span class="cr-hist-forma"><?= h(labelForma($bx['forma_pagamento'])) ?></span>
                                                <span class="cr-hist-data"><?= h(fmtDataHora($bx['criado_em'])) ?></span>
                                                <span class="cr-hist-valor">R$ <?= precoExibir((float) $bx['valor']) ?></span>
                                            </div>
                                            <?php if ($bx['observacao']): ?>
                                                <div class="cr-hist-obs"><?= h($bx['observacao']) ?></div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($c['status'] === 'CANCELADO'): ?>
                                    <p class="cr-note">Conta cancelada automaticamente — a venda #<?= (int) $c['venda_id'] ?> foi excluída.</p>
                                <?php endif; ?>

                                <div class="cr-actions">
                                    <?php if ($podeBaixa): ?>
                                        <button type="button" class="cr-btn cr-btn--primary"
                                            onclick='abrirModalBaixa(<?= $cid ?>, <?= json_encode(precoExibir($pendente), JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'>Dar Baixa</button>
                                    <?php endif; ?>
                                    <button type="button" class="cr-btn cr-btn--danger"
                                        onclick='abrirModalExcluir(<?= $cid ?>, <?= (int) count($baixas) ?>, <?= json_encode(precoExibir((float) $c['valor_recebido']), JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'>Excluir</button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

        </div>
    </main>
</div>

<!-- ── MODAL: Dar Baixa ── -->
<div class="modal-overlay" id="baixa-modal-overlay">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="baixa-modal-title">
        <div class="modal__header">
            <h2 class="modal__title" id="baixa-modal-title">Dar Baixa</h2>
            <button type="button" class="modal__close" aria-label="Fechar" onclick="fecharModalBaixa()">&times;</button>
        </div>
        <p class="form-hint" style="margin-bottom:1rem">
            Valor pendente atual: <strong id="baixa-pendente-label">R$ 0,00</strong>.
            Informe um valor igual (baixa total) ou menor (baixa parcial) que o pendente.
        </p>
        <form method="POST" action="" id="baixa-form">
            <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
            <input type="hidden" name="acao" value="baixa">
            <input type="hidden" name="id" id="baixa-conta-id" value="">

            <div class="form-group">
                <label class="form-label">Valor recebido (R$) <span class="required">*</span></label>
                <input type="text" name="valor" id="baixa-valor" class="form-input" required inputmode="decimal" placeholder="0,00">
            </div>

            <div class="modal-row">
                <div class="form-group">
                    <label class="form-label">Forma de recebimento <span class="required">*</span></label>
                    <select name="forma" id="baixa-forma" class="form-input" required>
                        <option value="PIX">Pix</option>
                        <option value="DINHEIRO">Dinheiro</option>
                        <option value="CREDITO">Cartão Crédito</option>
                        <option value="DEBITO">Cartão Débito</option>
                        <option value="TRANSFERENCIA">Transferência</option>
                        <option value="FINANCIAMENTO">Financiamento</option>
                        <option value="OUTROS">Outros</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Data/hora do recebimento</label>
                    <input type="datetime-local" name="data_baixa" id="baixa-data" class="form-input">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Observação <span class="form-hint">(opcional)</span></label>
                <textarea name="observacao" id="baixa-observacao" class="form-input" rows="2" placeholder="Ex.: recebido em mãos, parcela 2/3…"></textarea>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn--ghost-dark" onclick="fecharModalBaixa()" style="margin-right:.5rem">Voltar</button>
                <button type="submit" class="btn btn--primary">Confirmar Baixa</button>
            </div>
        </form>
    </div>
</div>

<!-- ── MODAL: Excluir conta ── -->
<div class="modal-overlay" id="excluir-modal-overlay">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="excluir-modal-title">
        <div class="modal__header">
            <h2 class="modal__title" id="excluir-modal-title">Excluir Conta a Receber</h2>
            <button type="button" class="modal__close" aria-label="Fechar" onclick="fecharModalExcluir()">&times;</button>
        </div>
        <p class="form-hint" style="margin-bottom:1rem" id="excluir-aviso">
            Essa conta será apagada definitivamente do banco de dados. Essa ação não pode ser desfeita.
        </p>
        <form method="POST" action="" id="excluir-form">
            <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
            <input type="hidden" name="acao" value="excluir">
            <input type="hidden" name="id" id="excluir-conta-id" value="">
            <div class="form-actions">
                <button type="button" class="btn btn--ghost-dark" onclick="fecharModalExcluir()" style="margin-right:.5rem">Voltar</button>
                <button type="submit" class="btn btn--primary btn--perigo">Confirmar Exclusão</button>
            </div>
        </form>
    </div>
</div>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script>
(function () {
    // ── Expandir/recolher linha ────────────────────────────────
    document.querySelectorAll('[data-toggle]').forEach(function (topo) {
        topo.addEventListener('click', function () {
            var alvo = document.getElementById(topo.dataset.toggle);
            if (!alvo) return;
            alvo.hidden = !alvo.hidden;
            topo.closest('.cr-row').classList.toggle('is-open', !alvo.hidden);
        });
    });

    // ── ABAS: Em Aberto / Recebidas / Canceladas / Geral ──────
    var crRows  = document.querySelectorAll('.cr-row');
    var crTabs  = document.querySelectorAll('.cr-tab');
    var crVazio = document.getElementById('cr-tab-vazio');

    function aplicarFiltro(filtro) {
        var visiveis = 0;
        crRows.forEach(function (row) {
            var status  = row.dataset.status;
            var mostrar = filtro === 'todas'
                || (filtro === 'abertas'    && status === 'aberta')
                || (filtro === 'recebidas'  && status === 'recebida')
                || (filtro === 'canceladas' && status === 'cancelada');
            row.hidden = !mostrar;
            if (mostrar) visiveis++;
        });
        if (crVazio) crVazio.hidden = visiveis > 0;
    }

    crTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            crTabs.forEach(function (t) {
                t.classList.remove('is-active');
                t.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('is-active');
            tab.setAttribute('aria-selected', 'true');
            aplicarFiltro(tab.dataset.tab);
        });
    });

    if (crVazio) {
        var algumaAberta = Array.from(crRows).some(function (r) { return !r.hidden; });
        crVazio.hidden = algumaAberta;
    }

    // ── Máscara simples de moeda (pt-BR) ──────────────────────
    function mascararMoeda(input) {
        input.addEventListener('input', function () {
            var digitos = input.value.replace(/\D/g, '');
            if (digitos === '') { input.value = ''; return; }
            var num = (parseInt(digitos, 10) / 100).toFixed(2);
            input.value = num.replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });
    }
    var campoValorBaixa = document.getElementById('baixa-valor');
    if (campoValorBaixa) mascararMoeda(campoValorBaixa);

    // ── Modal: Dar Baixa ───────────────────────────────────────
    window.abrirModalBaixa = function (id, valorPendenteFmt) {
        document.getElementById('baixa-conta-id').value = id;
        document.getElementById('baixa-valor').value = valorPendenteFmt;
        document.getElementById('baixa-pendente-label').textContent = 'R$ ' + valorPendenteFmt;
        document.getElementById('baixa-observacao').value = '';

        var agora = new Date();
        agora.setMinutes(agora.getMinutes() - agora.getTimezoneOffset());
        document.getElementById('baixa-data').value = agora.toISOString().slice(0, 16);

        document.getElementById('baixa-modal-overlay').classList.add('open');
    };
    window.fecharModalBaixa = function () {
        document.getElementById('baixa-modal-overlay').classList.remove('open');
    };
    document.getElementById('baixa-modal-overlay').addEventListener('click', function (e) {
        if (e.target === this) window.fecharModalBaixa();
    });

    // ── Modal: Excluir ─────────────────────────────────────────
    window.abrirModalExcluir = function (id, qtdBaixas, valorRecebidoFmt) {
        document.getElementById('excluir-conta-id').value = id;
        var aviso = 'Essa conta será apagada definitivamente do banco de dados. Essa ação não pode ser desfeita.';
        if (qtdBaixas > 0) {
            aviso = 'Essa conta já tem ' + qtdBaixas + ' baixa(s) registrada(s), totalizando R$ ' + valorRecebidoFmt + ' recebidos. '
                  + 'Excluir a conta apaga TAMBÉM esse histórico de recebimento, definitivamente. Essa ação não pode ser desfeita.';
        }
        document.getElementById('excluir-aviso').textContent = aviso;
        document.getElementById('excluir-modal-overlay').classList.add('open');
    };
    window.fecharModalExcluir = function () {
        document.getElementById('excluir-modal-overlay').classList.remove('open');
    };
    document.getElementById('excluir-modal-overlay').addEventListener('click', function (e) {
        if (e.target === this) window.fecharModalExcluir();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { window.fecharModalBaixa(); window.fecharModalExcluir(); }
    });
})();
</script>
</body>
</html>