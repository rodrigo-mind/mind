<?php
/**
 * /admin/capacetes/venda/nova.php
 *
 * Registro de uma nova venda de capacetes.
 * GET  -> exibe o formulário (mesmos campos/UX do modelo de referência).
 * POST -> valida tudo e grava em UMA transação atômica:
 *   1. valida estoque de cada item (com FOR UPDATE / trava de linha)
 *   2. cria a venda + itens
 *   3. baixa o estoque de `capacetes`
 *   4. grava os pagamentos
 *   5. cria conta a receber para cada pagamento "A Receber"
 *
 * Se "Financiamento" for uma das formas de pagamento, o campo
 * Observações passa a ser obrigatório (nome do financiamento).
 *
 * Todos os valores chegam do formulário já mascarados em pt-BR
 * ("1.234,56") e são convertidos com precoToFloat() antes de gravar.
 */

define('ADMIN_LOADED', true);
require_once __DIR__ . '/../../includes/guard.php';
require_once __DIR__ . '/../../../includes/money.php';
require_once __DIR__ . '/../../../includes/db.php';

// Fuso horário fixo (evita horário do servidor em UTC ficar 3h à frente do horário de SP).
date_default_timezone_set('America/Sao_Paulo');

if (!function_exists('h')) {
    function h($v): string {
        return htmlspecialchars((string) ($v ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

$csrf = getCsrfToken();
$erro = '';

// ID do usuário logado — ajuste aqui se sua sessão usa outra chave.
$usuarioId = $_SESSION['usuario_id'] ?? $_SESSION['user_id'] ?? null;

$formasValidas = ['PIX', 'DINHEIRO', 'CREDITO', 'DEBITO', 'TRANSFERENCIA', 'FINANCIAMENTO', 'A_RECEBER', 'OUTROS'];

// ============================================================
// POST — processa a venda
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida. Recarregue a página e tente novamente.';
    } else {
        $db = getDB();

        try {
            // ── Cliente ──
            $nome = trim($_POST['cliente_nome'] ?? '');
            $cpf  = preg_replace('/\D/', '', $_POST['cliente_cpf'] ?? '');
            $tel  = preg_replace('/\D/', '', $_POST['cliente_telefone'] ?? '');

            if ($nome === '')        throw new RuntimeException('Informe o nome do cliente.');
            if (strlen($cpf) !== 11) throw new RuntimeException('CPF inválido.');
            if (strlen($tel) < 10 || strlen($tel) > 11) throw new RuntimeException('Telefone inválido.');

            // ── Data da venda (editável; default = agora) ──
            $dataVendaIn = trim($_POST['data_venda'] ?? '');
            $dt = $dataVendaIn !== '' ? DateTime::createFromFormat('Y-m-d\TH:i', $dataVendaIn) : new DateTime();
            if ($dt === false) $dt = new DateTime();
            $dataVendaSql = $dt->format('Y-m-d H:i:s');

            $observacoes = trim($_POST['observacoes'] ?? '');
            $observacoes = $observacoes === '' ? null : $observacoes;

            // ── Itens (enviados como JSON num campo hidden) ──
            $itensIn = json_decode($_POST['itens_json'] ?? '[]', true);
            if (!is_array($itensIn) || count($itensIn) === 0) {
                throw new RuntimeException('Adicione ao menos um capacete.');
            }

            // ── Pagamentos (idem) ──
            $pagsIn = json_decode($_POST['pagamentos_json'] ?? '[]', true);
            if (!is_array($pagsIn) || count($pagsIn) === 0) {
                throw new RuntimeException('Informe ao menos uma forma de pagamento.');
            }

            // Financiamento exige observação preenchida
            $temFinanciamento = false;
            foreach ($pagsIn as $p) {
                if (strtoupper(trim($p['forma'] ?? '')) === 'FINANCIAMENTO') { $temFinanciamento = true; break; }
            }
            if ($temFinanciamento && $observacoes === null) {
                throw new RuntimeException('Informe de qual financiamento essa venda faz parte no campo Observações.');
            }

            $db->beginTransaction();

            // ── Itens: valida estoque, trava a linha e calcula totais ──
            $itens        = [];
            $brutoTotal   = 0.0;
            $descontoTotal = 0.0;
            $gorjetaTotal  = 0.0;

            foreach ($itensIn as $linha) {
                $capaceteId = (int) ($linha['capacete_id'] ?? 0);
                $qtd        = (int) ($linha['quantidade'] ?? 0);
                $desc       = max(0.0, precoToFloat($linha['desconto'] ?? '0'));
                $gorj       = max(0.0, precoToFloat($linha['gorjeta']  ?? '0'));

                if ($capaceteId <= 0) throw new RuntimeException('Selecione um capacete válido em todas as linhas.');
                if ($qtd < 1)         throw new RuntimeException('Quantidade mínima é 1.');

                // Trava a linha do estoque até o fim da transação.
                $st = $db->prepare('SELECT codigo, modelo, tamanho, valor_venda, valor_custo, quantidade FROM capacetes WHERE id = ? FOR UPDATE');
                $st->execute([$capaceteId]);
                $prod = $st->fetch();

                if (!$prod) throw new RuntimeException('Capacete não encontrado (id inválido).');
                if ($qtd > (int) $prod['quantidade']) {
                    throw new RuntimeException('Estoque insuficiente para "' . $prod['modelo'] . '". Disponível: ' . (int) $prod['quantidade'] . '.');
                }

                $unit      = (float) $prod['valor_venda'];
                $custo     = (float) $prod['valor_custo'];
                $linhaBase = $unit * $qtd;
                $linhaTot  = $linhaBase - $desc + $gorj;
                if ($linhaTot < 0) throw new RuntimeException('Desconto maior que o valor do capacete "' . $prod['modelo'] . '".');

                $brutoTotal    += $linhaBase;
                $descontoTotal += $desc;
                $gorjetaTotal  += $gorj;

                $itens[] = [
                    'capacete_id' => $capaceteId,
                    'codigo'      => $prod['codigo'],
                    'modelo'      => $prod['modelo'],
                    'tamanho'     => $prod['tamanho'],
                    'unit'        => $unit,
                    'custo'       => $custo,
                    'qtd'         => $qtd,
                    'desc'        => $desc,
                    'gorj'        => $gorj,
                    'total'       => $linhaTot,
                ];
            }

            $totalVenda = $brutoTotal - $descontoTotal + $gorjetaTotal;
            if ($totalVenda <= 0) throw new RuntimeException('O valor total da venda deve ser maior que zero.');

            // ── Pagamentos: normaliza, soma e confere contra o total ──
            $pagamentos     = [];
            $somaPag        = 0.0;
            $linhasAReceber = [];

            foreach ($pagsIn as $p) {
                $forma = strtoupper(trim($p['forma'] ?? ''));
                $valor = precoToFloat($p['valor'] ?? '0');

                if (!in_array($forma, $formasValidas, true)) throw new RuntimeException('Forma de pagamento inválida.');
                if ($valor <= 0) throw new RuntimeException('Valor de pagamento deve ser maior que zero.');

                if ($forma === 'A_RECEBER') {
                    $venc = trim($p['data_vencimento'] ?? '');
                    $vd   = DateTime::createFromFormat('Y-m-d', $venc);
                    if ($vd === false) throw new RuntimeException('Informe a data de vencimento do valor "A Receber".');
                    $linhasAReceber[] = ['valor' => $valor, 'vencimento' => $vd->format('Y-m-d')];
                }

                $somaPag += $valor;
                $pagamentos[] = ['forma' => $forma, 'valor' => $valor];
            }

            // Regra dura: soma dos pagamentos deve bater com o total (tolerância de 1 centavo por arredondamento).
            if (abs($somaPag - $totalVenda) > 0.01) {
                throw new RuntimeException('A soma dos pagamentos (R$ ' . precoExibir($somaPag) . ') difere do total da venda (R$ ' . precoExibir($totalVenda) . ').');
            }

            // ── Cria a venda ──
            $st = $db->prepare(
                'INSERT INTO capacete_vendas
                 (cliente_nome, cliente_cpf, cliente_telefone, data_venda, valor_bruto, desconto, gorjeta, valor_total, observacoes, usuario_id, status, criado_em)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, \'ATIVA\', NOW())'
            );
            $st->execute([$nome, $cpf, $tel, $dataVendaSql, $brutoTotal, $descontoTotal, $gorjetaTotal, $totalVenda, $observacoes, $usuarioId]);
            $vendaId = (int) $db->lastInsertId();

            // ── Itens + baixa de estoque ──
            $stItem  = $db->prepare(
                'INSERT INTO capacete_venda_itens
                 (venda_id, capacete_id, codigo, modelo, tamanho, valor_unit, valor_custo, quantidade, desconto, gorjeta, valor_total)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
            );
            $stBaixa = $db->prepare('UPDATE capacetes SET quantidade = quantidade - ? WHERE id = ? AND quantidade >= ?');

            foreach ($itens as $it) {
                $stItem->execute([
                    $vendaId, $it['capacete_id'], $it['codigo'], $it['modelo'], $it['tamanho'],
                    $it['unit'], $it['custo'], $it['qtd'], $it['desc'], $it['gorj'], $it['total'],
                ]);

                $stBaixa->execute([$it['qtd'], $it['capacete_id'], $it['qtd']]);
                if ($stBaixa->rowCount() !== 1) {
                    throw new RuntimeException('Falha ao baixar o estoque (venda concorrente detectada). Quantidade do modelo insuficiente no estoque.');
                }
            }

            // ── Pagamentos ──
            $stPag = $db->prepare('INSERT INTO capacete_venda_pagamentos (venda_id, forma, valor) VALUES (?, ?, ?)');
            foreach ($pagamentos as $pg) {
                $stPag->execute([$vendaId, $pg['forma'], $pg['valor']]);
            }

            // ── Contas a receber ──
            if (!empty($linhasAReceber)) {
                $stCR = $db->prepare('INSERT INTO capacete_contas_receber (venda_id, valor, data_venc, status, criado_em) VALUES (?, ?, ?, \'ABERTO\', NOW())');
                foreach ($linhasAReceber as $ar) {
                    $stCR->execute([$vendaId, $ar['valor'], $ar['vencimento']]);
                }
            }

            $db->commit();

            $_SESSION['capacetes_flash_sucesso'] = 'Venda #' . $vendaId . ' registrada com sucesso.';
            header('Location: index.php');
            exit;

        } catch (Throwable $e) {
            if ($db->inTransaction()) $db->rollBack();
            $erro = $e->getMessage();
        }
    }
}

// ============================================================
// GET — dados para montar o formulário
// ============================================================
$db = getDB();
$capacetesDisponiveis = $db->query(
    'SELECT id, codigo, modelo, tamanho, valor_venda, valor_custo, quantidade
     FROM capacetes
     WHERE quantidade > 0
     ORDER BY modelo ASC, codigo ASC'
)->fetchAll();

$agora = (new DateTime())->format('Y-m-d\TH:i');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Venda de Capacetes — ST Motors Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-venda.css">
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
        <h1 class="topbar__title">Nova Venda de Capacetes</h1>
    </header>

    <main class="admin-main" id="main-content">
        <div class="admin-content">

            <?php if ($erro): ?>
                <div class="alert alert--error"><?= h($erro) ?></div>
            <?php endif; ?>

            <form method="POST" action="" id="venda-form" class="cadastro-form" autocomplete="off" novalidate>
                <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
                <input type="hidden" name="itens_json" id="itens_json">
                <input type="hidden" name="pagamentos_json" id="pagamentos_json">

                <div class="alert alert--error" id="cv-form-erro" hidden></div>

                <!-- ============ INFORMAÇÕES ============ -->
                <section class="cadastro-section">
                    <h2 class="dash-section__title">Informações</h2>
                    <div class="modal-row">
                        <div class="form-group">
                            <label class="form-label">Data e hora</label>
                            <input type="datetime-local" name="data_venda" id="cv-data" class="form-input" value="<?= h($agora) ?>">
                        </div>
                    </div>
                </section>

                <!-- ============ CLIENTE ============ -->
                <section class="cadastro-section">
                    <h2 class="dash-section__title">Cliente</h2>
                    <div class="form-group">
                        <label class="form-label">Nome <span class="required">*</span></label>
                        <input type="text" name="cliente_nome" id="cv-nome" class="form-input" required>
                        <span class="form-hint form-hint--erro" id="cv-nome-erro" hidden>Informe o nome do cliente.</span>
                    </div>
                    <div class="modal-row">
                        <div class="form-group">
                            <label class="form-label">CPF <span class="required">*</span></label>
                            <input type="text" name="cliente_cpf" id="cv-cpf" class="form-input" required inputmode="numeric" placeholder="000.000.000-00" maxlength="14">
                            <span class="form-hint form-hint--erro" id="cv-cpf-erro" hidden>Informe um CPF válido.</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Telefone <span class="required">*</span></label>
                            <input type="tel" name="cliente_telefone" id="cv-telefone" class="form-input" required inputmode="numeric" placeholder="(11) 99999-8888" maxlength="15">
                            <span class="form-hint form-hint--erro" id="cv-telefone-erro" hidden>Informe um telefone válido.</span>
                        </div>
                    </div>
                </section>

                <!-- ============ CAPACETES ============ -->
                <section class="cadastro-section">
                    <h2 class="dash-section__title">Capacetes</h2>
                    <div id="cv-itens-lista"><!-- linhas via JS --></div>
                    <button type="button" class="btn btn--ghost-dark" id="cv-btn-add-item">+ Adicionar Capacete</button>
                </section>

                <!-- ============ PAGAMENTO ============ -->
                <section class="cadastro-section">
                    <h2 class="dash-section__title">Pagamento</h2>
                    <div id="cv-pagamentos-lista"><!-- linhas via JS --></div>
                    <button type="button" class="btn btn--ghost-dark" id="cv-btn-add-pagamento">+ Forma de Pagamento</button>

                    <div class="cv-resumo">
                        <div class="cv-resumo__linha">
                            <span>Total da venda</span>
                            <strong id="cv-resumo-total">R$ 0,00</strong>
                        </div>
                        <div class="cv-resumo__linha">
                            <span>Pago</span>
                            <strong id="cv-resumo-pago">R$ 0,00</strong>
                        </div>
                        <div class="cv-resumo__linha cv-resumo__linha--restante">
                            <span>Restante</span>
                            <strong id="cv-resumo-restante">R$ 0,00</strong>
                        </div>
                    </div>
                </section>

                <!-- ============ OBSERVAÇÕES ============ -->
                <section class="cadastro-section">
                    <h2 class="dash-section__title">Observações</h2>
                    <div class="form-group">
                        <textarea name="observacoes" id="cv-observacoes" class="form-input" rows="3" placeholder="Observações da venda (opcional)"></textarea>
                        <span class="form-hint form-hint--alerta" id="cv-observacoes-hint" style="display:none">De qual financiamento essa venda faz parte?</span>
                        <span class="form-hint form-hint--erro" id="cv-observacoes-erro" hidden>Esse campo é obrigatório quando há financiamento.</span>
                    </div>
                </section>

                <!-- ============ TOTAL ============ -->
                <section class="cadastro-section cv-total-section">
                    <span class="cv-total-rotulo">Valor Total</span>
                    <span class="cv-total-valor" id="cv-total-geral">R$ 0,00</span>
                </section>

                <div class="form-actions">
                    <a href="index.php" class="btn btn--ghost-dark" style="margin-right:.5rem">Cancelar</a>
                    <button type="submit" class="btn btn--primary" id="cv-btn-finalizar">Finalizar Venda</button>
                </div>
            </form>

        </div>
    </main>
</div>

<!-- Template de linha de capacete -->
<template id="cv-tpl-item">
    <div class="cv-linha-item">
        <div class="cv-linha-topo">
            <select class="cv-it-produto form-input">
                <option value="">Selecione o capacete…</option>
                <?php foreach ($capacetesDisponiveis as $p): ?>
                    <option value="<?= (int) $p['id'] ?>"
                        data-codigo="<?= h($p['codigo']) ?>"
                        data-valor="<?= h($p['valor_venda']) ?>"
                        data-custo="<?= h($p['valor_custo']) ?>"
                        data-estoque="<?= (int) $p['quantidade'] ?>">
                        <?= h($p['modelo']) ?> — Tam. <?= h($p['tamanho']) ?> (<?= (int) $p['quantidade'] ?> em estoque)
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="button" class="btn-icon btn-icon--danger cv-btn-remover" aria-label="Remover">✕</button>
        </div>
        <span class="form-hint form-hint--erro cv-it-erro" hidden>Selecione um capacete.</span>
        <div class="modal-row">
            <div class="form-group">
                <label class="form-label">Código</label>
                <input type="text" class="cv-it-codigo form-input" list="cv-codigos-datalist" autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">Valor Unit.</label>
                <input type="text" class="cv-it-unit form-input" disabled>
            </div>
        </div>
        <div class="modal-row">
            <div class="form-group">
                <label class="form-label">Quantidade</label>
                <input type="number" class="cv-it-qtd form-input" min="1" value="1" inputmode="numeric">
            </div>
            <div class="form-group">
                <label class="form-label">Desconto (R$)</label>
                <input type="text" class="cv-it-desconto form-input" inputmode="decimal" placeholder="0,00">
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Gorjeta (R$)</label>
            <input type="text" class="cv-it-gorjeta form-input" inputmode="decimal" placeholder="0,00">
        </div>
        <div class="cv-linha-total">
            <span>Total da linha</span>
            <strong class="cv-it-total">R$ 0,00</strong>
        </div>
    </div>
</template>

<!-- Datalist compartilhado de códigos (usado pelo campo Código de cada linha) -->
<datalist id="cv-codigos-datalist">
    <?php foreach ($capacetesDisponiveis as $p): ?>
        <option value="<?= h($p['codigo']) ?>"><?= h($p['modelo']) ?></option>
    <?php endforeach; ?>
</datalist>

<!-- Template de linha de pagamento -->
<template id="cv-tpl-pagamento">
    <div class="cv-linha-pagto">
        <div class="cv-linha-topo">
            <select class="cv-pg-forma form-input">
                <option value="PIX">Pix</option>
                <option value="DINHEIRO">Dinheiro</option>
                <option value="CREDITO">Cartão Crédito</option>
                <option value="DEBITO">Cartão Débito</option>
                <option value="TRANSFERENCIA">Transferência</option>
                <option value="FINANCIAMENTO">Financiamento</option>
                <option value="A_RECEBER">A Receber</option>
                <option value="OUTROS">Outros</option>
            </select>
            <button type="button" class="btn-icon btn-icon--danger cv-btn-remover" aria-label="Remover">✕</button>
        </div>
        <div class="form-group">
            <label class="form-label">Valor (R$)</label>
            <input type="text" class="cv-pg-valor form-input" inputmode="decimal" placeholder="0,00">
            <span class="form-hint form-hint--erro cv-pg-valor-erro" hidden>Informe um valor maior que zero.</span>
        </div>
        <div class="form-group cv-campo-venc" hidden>
            <label class="form-label">Vencimento <span class="required">*</span></label>
            <input type="date" class="cv-pg-vencimento form-input">
            <span class="form-hint form-hint--erro cv-venc-erro" hidden>Informe a data de vencimento.</span>
        </div>
    </div>
</template>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script src="/admin/assets/scripts/capacetes-venda.js" defer></script>
</body>
</html>