<?php
/**
 * /admin/capacetes/estoque
 *
 * Cadastro e listagem do estoque de capacetes.
 * OBS: a tabela `capacetes` guarda apenas dados de cadastro por enquanto.
 * Campos relativos à venda serão adicionados nela futuramente.
 */

define('ADMIN_LOADED', true);
require_once __DIR__ . '/../../includes/guard.php';
require_once __DIR__ . '/../../../includes/money.php';
require_once __DIR__ . '/../../../includes/db.php';

$csrf    = getCsrfToken();
$erro    = '';
$sucesso = '';

function h($v): string {
    return htmlspecialchars((string) ($v ?? ''), ENT_QUOTES, 'UTF-8');
}

// ============================================================
// UPLOAD CONFIG (foto do capacete)
// ============================================================
const CAPACETE_UPLOAD_DIR      = __DIR__ . '/../../../assets/images/capacetes/';
const CAPACETE_UPLOAD_URL_BASE = '/assets/images/capacetes/';
const CAPACETE_UPLOAD_MAX_MB   = 5;
const CAPACETE_UPLOAD_ALLOWED  = ['image/jpeg', 'image/png', 'image/webp', 'image/heic', 'image/heif'];

/**
 * Processa o upload da foto (campo opcional). Retorna a URL salva,
 * null se nenhum arquivo foi enviado, ou lança RuntimeException em caso de erro.
 */
function processarUploadFoto(): ?string {
    if (empty($_FILES['foto']['name'])) return null;

    $file     = $_FILES['foto'];
    $maxBytes = CAPACETE_UPLOAD_MAX_MB * 1024 * 1024;

    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException('Erro no upload da foto.');
    }
    if ($file['size'] > $maxBytes) {
        throw new RuntimeException('Foto muito grande. Máximo ' . CAPACETE_UPLOAD_MAX_MB . 'MB.');
    }

    // Verifica os magic bytes reais — não confia apenas no MIME informado pelo navegador
    $finfo    = new finfo(FILEINFO_MIME_TYPE);
    $mimeReal = $finfo->file($file['tmp_name']);
    if (!in_array($mimeReal, CAPACETE_UPLOAD_ALLOWED, true)) {
        throw new RuntimeException('Formato inválido. Use JPG, PNG, WebP, HEIC ou HEIF.');
    }

    if (!is_dir(CAPACETE_UPLOAD_DIR)) mkdir(CAPACETE_UPLOAD_DIR, 0755, true);

    $extMap   = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp', 'image/heic' => 'heic', 'image/heif' => 'heif'];
    $ext      = $extMap[$mimeReal] ?? 'jpg'; // seguro: $mimeReal já passou pela allowlist acima
    $filename = bin2hex(random_bytes(12)) . '.' . $ext;
    $destino  = CAPACETE_UPLOAD_DIR . $filename;

    if (!move_uploaded_file($file['tmp_name'], $destino)) {
        throw new RuntimeException('Erro ao salvar a foto.');
    }

    return CAPACETE_UPLOAD_URL_BASE . $filename;
}

function excluirFotoDoDisco(?string $url): void {
    if (!$url) return;
    $path = __DIR__ . '/../../../' . ltrim($url, '/');
    if (file_exists($path)) unlink($path);
}

// ── AÇÕES POST ────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida.';
    } else {
        $acao = $_POST['acao'] ?? '';
        $db   = getDB();

        // Salvar (criar ou editar)
        if ($acao === 'salvar') {
            $id          = (int) ($_POST['id'] ?? 0);
            $codigo      = trim($_POST['codigo'] ?? '');
            $modelo      = trim($_POST['modelo'] ?? '');
            $tamanho     = trim($_POST['tamanho'] ?? '');
            $valorCusto  = precoToFloat($_POST['valor_custo'] ?? '0');
            $valorVenda  = precoToFloat($_POST['valor_venda'] ?? '0');
            $quantidade  = (int) preg_replace('/\D/', '', $_POST['quantidade'] ?? '0');

            if ($codigo === '' || $modelo === '' || $tamanho === '') {
                $erro = 'Preencha código, modelo e tamanho.';
            } elseif ($valorCusto < 0 || $valorVenda < 0) {
                $erro = 'Os valores de custo e venda não podem ser negativos.';
            } elseif ($quantidade < 0) {
                $erro = 'A quantidade não pode ser negativa.';
            } else {
                $removerFoto = ($_POST['remover_foto'] ?? '0') === '1';

                try {
                    $novaFoto = processarUploadFoto(); // null se nenhum arquivo foi enviado

                    if ($id > 0) {
                        // Edição de um registro específico — mantém a foto atual
                        // se nenhuma nova foto foi enviada nem a remoção solicitada.
                        $st = $db->prepare('SELECT foto FROM capacetes WHERE id = ?');
                        $st->execute([$id]);
                        $atual     = $st->fetch();
                        $fotoFinal = $novaFoto ?? ($removerFoto ? null : ($atual['foto'] ?? null));

                        if (($novaFoto !== null || $removerFoto) && !empty($atual['foto'])) {
                            excluirFotoDoDisco($atual['foto']);
                        }

                        $db->prepare('UPDATE capacetes SET codigo=?, modelo=?, tamanho=?, valor_custo=?, valor_venda=?, quantidade=?, foto=? WHERE id=?')
                           ->execute([$codigo, $modelo, $tamanho, $valorCusto, $valorVenda, $quantidade, $fotoFinal, $id]);
                        $sucesso = 'Capacete atualizado.';
                    } else {
                        // Novo cadastro: se já existir um lote idêntico (mesmo código,
                        // tamanho e valores), soma a quantidade em vez de duplicar a linha.
                        // Se os valores forem diferentes, vira uma linha nova (conforme pedido).
                        $st = $db->prepare('SELECT id, foto FROM capacetes WHERE codigo = ? AND tamanho = ? AND valor_custo = ? AND valor_venda = ? LIMIT 1');
                        $st->execute([$codigo, $tamanho, $valorCusto, $valorVenda]);
                        $existente = $st->fetch();

                        if ($existente) {
                            if ($novaFoto !== null) {
                                if (!empty($existente['foto'])) excluirFotoDoDisco($existente['foto']);
                                $db->prepare('UPDATE capacetes SET quantidade = quantidade + ?, foto = ? WHERE id = ?')
                                   ->execute([$quantidade, $novaFoto, $existente['id']]);
                            } else {
                                $db->prepare('UPDATE capacetes SET quantidade = quantidade + ? WHERE id = ?')
                                   ->execute([$quantidade, $existente['id']]);
                            }
                            $sucesso = 'Lote já existia — quantidade somada ao estoque.';
                        } else {
                            $db->prepare('INSERT INTO capacetes (codigo, modelo, tamanho, valor_custo, valor_venda, quantidade, foto) VALUES (?,?,?,?,?,?,?)')
                               ->execute([$codigo, $modelo, $tamanho, $valorCusto, $valorVenda, $quantidade, $novaFoto]);
                            $sucesso = 'Capacete cadastrado.';
                        }
                    }
                } catch (RuntimeException $e) {
                    $erro = $e->getMessage();
                }
            }
        }

        // Excluir
        if ($acao === 'excluir') {
            $id = (int) ($_POST['id'] ?? 0);
            if ($id > 0) {
                $st = $db->prepare('SELECT foto FROM capacetes WHERE id = ?');
                $st->execute([$id]);
                $row = $st->fetch();

                $db->prepare('DELETE FROM capacetes WHERE id = ?')->execute([$id]);
                if ($row && !empty($row['foto'])) excluirFotoDoDisco($row['foto']);
                $sucesso = 'Capacete removido.';
            }
        }
    }
}

// ── LISTAGEM ──────────────────────────────────────────────────
$db        = getDB();
$capacetes = $db->query('SELECT * FROM capacetes ORDER BY modelo ASC, codigo ASC, criado_em DESC')->fetchAll();
$csrf      = getCsrfToken();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque de Capacetes — ST Motors Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-estoque.css">
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
        <h1 class="topbar__title">Estoque de Capacetes</h1>
        <button type="button" class="btn btn--primary" style="margin-left:auto" onclick="abrirModalNovo()">+ Novo Capacete</button>
    </header>

    <main class="admin-main">
        <div class="admin-content">

            <?php if ($sucesso): ?>
                <div class="alert alert--success"><?= h($sucesso) ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert--error"><?= h($erro) ?></div>
            <?php endif; ?>

            <section class="cadastro-section">
                <h2 class="dash-section__title">Capacetes em Estoque</h2>
                <p class="dash-section__subtitle"><?= count($capacetes) ?> registro(s) — o mesmo código pode aparecer mais de uma vez quando o custo ou o valor de venda mudam.</p>

                <?php if (empty($capacetes)): ?>
                    <p class="empty-state">Nenhum capacete cadastrado ainda.</p>
                <?php else: ?>
                    <div class="capacetes-grid">
                        <?php foreach ($capacetes as $c): ?>
                            <?php $lucro = (float) $c['valor_venda'] - (float) $c['valor_custo']; ?>
                            <article class="capacete-card">
                                <div class="capacete-card__top">
                                    <span class="capacete-card__codigo"><?= h($c['codigo']) ?></span>
                                    <div class="capacete-card__actions">
                                        <button type="button" class="btn-icon" title="Editar"
                                            onclick='abrirModalEditar(<?= json_encode([
                                                "id"          => (int) $c["id"],
                                                "codigo"      => $c["codigo"],
                                                "modelo"      => $c["modelo"],
                                                "tamanho"     => $c["tamanho"],
                                                "valor_custo" => number_format((float) $c["valor_custo"], 2, ",", "."),
                                                "valor_venda" => number_format((float) $c["valor_venda"], 2, ",", "."),
                                                "quantidade"  => (int) $c["quantidade"],
                                                "foto"        => $c["foto"] ?: '',
                                            ], JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'>✏️</button>

                                        <form method="POST" action="" style="display:inline" onsubmit="return confirm('Excluir este capacete do estoque?')">
                                            <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
                                            <input type="hidden" name="acao" value="excluir">
                                            <input type="hidden" name="id" value="<?= (int) $c['id'] ?>">
                                            <button type="submit" class="btn-icon btn-icon--danger" title="Excluir">🗑️</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="capacete-card__body">
                                    <div class="capacete-card__thumb-wrap">
                                        <?php if (!empty($c['foto'])): ?>
                                            <img class="capacete-card__foto" src="<?= h($c['foto']) ?>" alt="Foto de <?= h($c['modelo']) ?>" width="40" height="40" style="object-fit:cover;border-radius:8px">
                                        <?php else: ?>
                                            <span class="capacete-thumb capacete-thumb--lg" aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 18c1.5-1.5 2.5-3.5 2.5-6.5 0-4.5-3.5-8-8.5-8C8 3.5 5 5 4 8c-.8 2.5-.8 5 .5 7.5l2 2.5C8 19 10 20 12.5 20h2.5c1.5 0 3-1 4-2z" /><path d="M4 11h9.5c1.5 0 2-1 2-2.5S14.5 6 12 6H7.5" /></svg>
                                            </span>
                                        <?php endif; ?>
                                        <span class="capacete-card__qtd" title="Quantidade em estoque">×<?= (int) $c['quantidade'] ?></span>
                                    </div>

                                    <div class="capacete-card__info">
                                        <h3 class="capacete-card__modelo">
                                            <?= h($c['modelo']) ?>
                                            <span class="capacete-card__tamanho">Tam. <?= h($c['tamanho']) ?></span>
                                        </h3>
                                        <div class="capacete-card__valor">R$ <?= precoExibir($c['valor_venda']) ?></div>
                                    </div>
                                </div>

                                <div class="capacete-card__footer">
                                    <span class="capacete-card__custo">Valor de custo: R$ <?= precoExibir($c['valor_custo']) ?></span>
                                    <span class="td-lucro <?= $lucro < 0 ? 'td-lucro--negativo' : 'td-lucro--positivo' ?>">Lucro: R$ <?= precoExibir($lucro) ?></span>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

        </div>
    </main>
</div>

<!-- ── MODAL: Novo / Editar Capacete ── -->
<div class="modal-overlay" id="capacete-modal-overlay">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="capacete-modal-title">
        <div class="modal__header">
            <h2 class="modal__title" id="capacete-modal-title">Novo Capacete</h2>
            <button type="button" class="modal__close" aria-label="Fechar" onclick="fecharModal()">&times;</button>
        </div>

        <form method="POST" action="" class="cadastro-form" id="capacete-form" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
            <input type="hidden" name="acao" value="salvar">
            <input type="hidden" name="id" id="capacete-id" value="0">
            <input type="hidden" name="remover_foto" id="capacete-remover-foto" value="0">

            <div class="form-group">
                <label class="form-label">Foto do Capacete <span class="form-hint">(opcional — JPG, PNG ou WebP, máx. 5MB)</span></label>
                <div class="upload-area" id="capacete-upload-area">
                    <div class="upload-area__preview" id="capacete-upload-preview" hidden>
                        <img id="capacete-preview-img" src="" alt="Prévia da foto">
                        <span class="upload-area__filename" id="capacete-preview-filename"></span>
                        <button type="button" class="upload-area__remove" id="capacete-upload-remove" aria-label="Remover foto">✕</button>
                    </div>
                    <div class="upload-area__placeholder" id="capacete-upload-placeholder">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                        <span>Clique ou arraste uma imagem</span>
                    </div>
                    <input type="file" id="capacete-foto" name="foto"
                        accept="image/jpeg,image/png,image/webp,image/heic,image/heif"
                        class="upload-input">
                </div>
                <span class="form-hint" id="capacete-foto-hint" style="display:none">Deixe em branco para manter a foto atual.</span>
            </div>

            <div class="form-group">
                <label class="form-label">Código do Capacete <span class="required">*</span></label>
                <input type="text" name="codigo" id="capacete-codigo" class="form-input" required maxlength="50" placeholder="Ex.: CAP-001">
            </div>

            <div class="form-group">
                <label class="form-label">Modelo do Capacete <span class="required">*</span></label>
                <input type="text" name="modelo" id="capacete-modelo" class="form-input" required maxlength="150" placeholder="Ex.: Bieffe B-40 Fast">
            </div>

            <div class="form-group">
                <label class="form-label">Tamanho <span class="required">*</span></label>
                <input type="text" name="tamanho" id="capacete-tamanho" class="form-input" required maxlength="10" placeholder="Ex.: 58, M, G...">
            </div>

            <div class="modal-row">
                <div class="form-group">
                    <label class="form-label">Valor de Custo (R$) <span class="required">*</span></label>
                    <input type="text" name="valor_custo" id="capacete-custo" class="form-input" required inputmode="numeric" placeholder="0,00">
                </div>
                <div class="form-group">
                    <label class="form-label">Valor de Venda (R$) <span class="required">*</span></label>
                    <input type="text" name="valor_venda" id="capacete-venda" class="form-input" required inputmode="numeric" placeholder="0,00">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Quantidade <span class="required">*</span></label>
                <input type="text" name="quantidade" id="capacete-quantidade" class="form-input" required inputmode="numeric" placeholder="0">
                <span class="form-hint" id="capacete-qtd-hint">Se já existir um lote com o mesmo código, tamanho e valores, a quantidade será somada ao existente.</span>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn--ghost-dark" onclick="fecharModal()" style="margin-right:.5rem">Cancelar</button>
                <button type="submit" class="btn btn--primary">Salvar</button>
            </div>
        </form>
    </div>
</div>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script src="/admin/assets/scripts/capacetes-estoque.js" defer></script>
</body>
</html>