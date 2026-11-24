<?php
define('ADMIN_LOADED', true);
require_once __DIR__ . '/../../includes/guard.php';
require_once __DIR__ . '/../../../includes/db.php';
require_once __DIR__ . '/../../includes/upload-handler.php';
require_once __DIR__ . '/../../includes/slug-generator.php';
require_once __DIR__ . '/../../../includes/money.php';

$csrf    = getCsrfToken();
$erro    = '';
$sucesso = '';
$id      = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$moto    = null;
$fotos   = [];
$db      = getDB();

if ($id > 0) {
    $st = $db->prepare('SELECT * FROM motos WHERE id = ?');
    $st->execute([$id]);
    $moto = $st->fetch();
    if (!$moto) { header('Location: /admin/estoque/'); exit; }

    $stf = $db->prepare('SELECT * FROM moto_fotos WHERE moto_id = ? ORDER BY ordem ASC');
    $stf->execute([$id]);
    $fotos = $stf->fetchAll();
}

// ── POST ──────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida.';
    } else {
        $acao = $_POST['acao'] ?? '';

        // ── SALVAR MOTO + FOTOS (formulário unificado) ──
        if ($acao === 'salvar') {
            $marca       = trim($_POST['marca']       ?? '');
            $modelo      = trim($_POST['modelo']      ?? '');
            $ano         = trim($_POST['ano']         ?? '');
            $cilindrada  = (int) preg_replace('/\D/', '', $_POST['cilindrada'] ?? '0');
            $categoria   = trim($_POST['categoria']   ?? '');
            $combustivel = trim($_POST['combustivel'] ?? '');
            $cambio      = trim($_POST['cambio']      ?? '');
            $preco       = precoToFloat($_POST['preco'] ?? '0');
            $km          = (int) preg_replace('/\D/', '', $_POST['km'] ?? '0');
            $cor         = trim($_POST['cor']         ?? '');
            $placa       = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '', trim($_POST['placa'] ?? '')));
            $descricao   = trim($_POST['descricao']   ?? '');

            // Valida e normaliza o ano (aceita "2025/2026" ou "Anterior")
            $anoValido = ($ano === 'Anterior') || preg_match('/^\d{4}\/\d{4}$/', $ano);

            if (!$marca || !$modelo || !$anoValido || !$categoria || $preco < 1000) {
                $erro = 'Preencha todos os campos obrigatórios. Preço mínimo: R$ 1.000,00.';
            } else {
                if ($placa !== '') {
                    $stPlaca = $db->prepare('SELECT id FROM motos WHERE placa = ? AND id != ?');
                    $stPlaca->execute([$placa, $id ?: 0]);
                    if ($stPlaca->fetch()) {
                        $erro = 'Já existe uma moto cadastrada com essa placa.';
                    }
                }
                if (empty($erro)) {
                    try {
                        // Usa o ano do modelo para o slug (segundo valor, ex: 2026 de "2025/2026")
                        $anoSlug  = ($ano === 'Anterior') ? 'anterior'
                                  : trim(explode('/', $ano)[1] ?? explode('/', $ano)[0]);
                        $slugBase = $marca . ' ' . $modelo . ' ' . $anoSlug;
                        $slug     = uniqueSlug($db, $slugBase, $id ?: null);

                        if ($id > 0) {
                            $db->prepare('UPDATE motos SET slug=?,marca=?,modelo=?,ano=?,cilindrada=?,categoria=?,combustivel=?,cambio=?,preco=?,km=?,cor=?,placa=?,descricao=? WHERE id=?')
                               ->execute([$slug,$marca,$modelo,$ano,$cilindrada,$categoria,$combustivel,$cambio,$preco,$km,$cor,$placa ?: null,$descricao,$id]);
                            $sucesso = 'Moto atualizada.';
                        } else {
                            $db->prepare('INSERT INTO motos (slug,marca,modelo,ano,cilindrada,categoria,combustivel,cambio,preco,km,cor,placa,descricao) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)')
                               ->execute([$slug,$marca,$modelo,$ano,$cilindrada,$categoria,$combustivel,$cambio,$preco,$km,$cor,$placa ?: null,$descricao]);
                            $id      = (int)$db->lastInsertId();
                            $sucesso = 'Moto cadastrada.';
                        }

                        $st = $db->prepare('SELECT * FROM motos WHERE id = ?');
                        $st->execute([$id]);
                        $moto = $st->fetch();

                        // Upload de fotos enviadas junto com o formulário
                        $arquivos = $_FILES['fotos'] ?? [];
                        if (!empty($arquivos['name'][0])) {
                            $stCount = $db->prepare('SELECT COUNT(*) FROM moto_fotos WHERE moto_id = ?');
                            $total   = count($arquivos['name']);
                            $errosUp = [];

                            for ($i = 0; $i < $total; $i++) {
                                if ($arquivos['error'][$i] !== UPLOAD_ERR_OK) continue;
                                $stCount->execute([$id]);
                                $qtdNow = (int)$stCount->fetchColumn();
                                if ($qtdNow >= 8) break;
                                $file = [
                                    'name'     => $arquivos['name'][$i],
                                    'type'     => $arquivos['type'][$i],
                                    'tmp_name' => $arquivos['tmp_name'][$i],
                                    'error'    => $arquivos['error'][$i],
                                    'size'     => $arquivos['size'][$i],
                                ];
                                try {
                                    $url         = handleMotoUpload($file);
                                    $isPrincipal = ($qtdNow === 0) ? 1 : 0;
                                    $db->prepare('INSERT INTO moto_fotos (moto_id,arquivo,principal,ordem) VALUES (?,?,?,?)')
                                       ->execute([$id, $url, $isPrincipal, $qtdNow]);
                                } catch (RuntimeException $e) {
                                    $errosUp[] = $arquivos['name'][$i] . ': ' . $e->getMessage();
                                }
                            }
                            if ($errosUp) {
                                $erro = implode(' | ', $errosUp);
                            }
                        }

                        // Redireciona para URL com id (evita resubmit e libera fotos)
                        if (empty($erro)) {
                            $redir = '/admin/estoque/cadastrar-moto/?id=' . $id;
                            if ($sucesso) $redir .= '&ok=1';
                            header('Location: ' . $redir);
                            exit;
                        }

                    } catch (PDOException $e) {
                        $erro = 'Erro ao salvar: ' . $e->getMessage();
                    }
                }
            }
        }

        // ── UPLOAD ADICIONAL DE FOTOS ──
        if ($acao === 'upload_fotos' && $id > 0) {
            $arquivos = $_FILES['fotos'] ?? [];
            $total    = is_array($arquivos['name']) ? count($arquivos['name']) : 0;

            $stCount = $db->prepare('SELECT COUNT(*) FROM moto_fotos WHERE moto_id = ?');
            $stCount->execute([$id]);
            $qtdAtual   = (int)$stCount->fetchColumn();
            $permitidas = max(0, 8 - $qtdAtual);
            $errosUpload = [];

            for ($i = 0; $i < min($total, $permitidas); $i++) {
                if ($arquivos['error'][$i] !== UPLOAD_ERR_OK) continue;
                $file = [
                    'name'     => $arquivos['name'][$i],
                    'type'     => $arquivos['type'][$i],
                    'tmp_name' => $arquivos['tmp_name'][$i],
                    'error'    => $arquivos['error'][$i],
                    'size'     => $arquivos['size'][$i],
                ];
                try {
                    $stCount->execute([$id]);
                    $qtdNow      = (int)$stCount->fetchColumn();
                    $isPrincipal = ($qtdNow === 0) ? 1 : 0;
                    $url         = handleMotoUpload($file);
                    $db->prepare('INSERT INTO moto_fotos (moto_id,arquivo,principal,ordem) VALUES (?,?,?,?)')
                       ->execute([$id, $url, $isPrincipal, $qtdNow]);
                } catch (RuntimeException $e) {
                    $errosUpload[] = $arquivos['name'][$i] . ': ' . $e->getMessage();
                }
            }

            if ($errosUpload) $erro    = implode(' | ', $errosUpload);
            elseif ($total > 0) $sucesso = min($total, $permitidas) . ' foto(s) adicionada(s).';
            if ($total > $permitidas && $permitidas < $total) {
                $sucesso .= ' (' . ($total - $permitidas) . ' ignorada(s) — limite de 8)';
            }
        }

        if ($acao === 'foto_principal' && $id > 0) {
            $fotoId = (int)($_POST['foto_id'] ?? 0);
            if ($fotoId > 0) {
                $db->prepare('UPDATE moto_fotos SET principal = 0 WHERE moto_id = ?')->execute([$id]);
                $db->prepare('UPDATE moto_fotos SET principal = 1 WHERE id = ? AND moto_id = ?')->execute([$fotoId, $id]);
                $sucesso = 'Foto principal definida.';
            }
        }

        if ($acao === 'excluir_foto' && $id > 0) {
            $fotoId = (int)($_POST['foto_id'] ?? 0);
            if ($fotoId > 0) {
                $st = $db->prepare('SELECT arquivo, principal FROM moto_fotos WHERE id = ? AND moto_id = ?');
                $st->execute([$fotoId, $id]);
                $foto = $st->fetch();
                if ($foto) {
                    deleteMotoFoto($foto['arquivo']);
                    $db->prepare('DELETE FROM moto_fotos WHERE id = ?')->execute([$fotoId]);
                    if ($foto['principal']) {
                        $prox = $db->prepare('SELECT id FROM moto_fotos WHERE moto_id = ? LIMIT 1');
                        $prox->execute([$id]);
                        $pf = $prox->fetch();
                        if ($pf) $db->prepare('UPDATE moto_fotos SET principal = 1 WHERE id = ?')->execute([$pf['id']]);
                    }
                    $sucesso = 'Foto removida.';
                }
            }
        }

        $stf = $db->prepare('SELECT * FROM moto_fotos WHERE moto_id = ? ORDER BY ordem ASC');
        $stf->execute([$id ?: 0]);
        $fotos = $stf->fetchAll();
        $csrf  = getCsrfToken();
    }
}

// Mensagem de sucesso vinda do redirect
if (isset($_GET['ok']) && empty($sucesso)) {
    $sucesso = $id > 0 && $moto ? 'Moto salva com sucesso.' : '';
}

// ── LISTAS ────────────────────────────────────────────────────
$marcasPrioridade = ['Honda','Yamaha','Suzuki','Haojue/Suzuki','Kawasaki','BMW'];
$marcasAlfabetica = [
    'Adly','Agrale','Aprilia','Benelli','Beta','Bimota','Brandy','Buell',
    'CF Moto', 'Evon','Dafra','Ducati','Energica','Harley-Davidson','Hero',
    'Husqvarna','Indian','Irun', 'Jawa','KTM','Kasinski','Keeway','Kymco',
    'Lambretta','Lifan','Loncin','MV Agusta','Mondial','Motomel',
    'Motorino','Norton','Piaggio','Riguete','Royal Enfield','Shineray',
    'Triumph','Turing','Vespa','Voge','Zero',
];
sort($marcasAlfabetica);
$marcas = array_merge($marcasPrioridade, ['——'], $marcasAlfabetica, ['——', 'Outro']);

$anoAtual = (int)date('Y');
$anos = [];
$fab  = $anoAtual + 1;
while ($fab >= 1980) {
    $anos[] = $fab . '/' . $fab;
    if (($fab - 1) >= 1980) $anos[] = ($fab - 1) . '/' . $fab;
    $fab--;
}
$anos[] = 'Anterior';

$categorias   = ['Street','Naked','Sport','Custom','Scooter','Trail','BigTrail','Touring',
                 'Enduro','Crossover','Supermoto','Chopper','Elétrica','Triciclo','Quadriciclo','Outra'];
$combustiveis = ['Gasolina','Flex (Gasolina/Etanol)','Etanol','Diesel','Elétrico','Híbrido'];
$cambios      = ['Manual','Semi-automático','Automático','Elétrico'];
$cores        = ['Preta','Branca','Cinza','Prata','Azul','Vermelha','Laranja','Amarela',
                 'Verde','Roxa','Rosa','Marrom','Bege','Dourada','Grafite','Vinho',
                 'Azul Metálico','Prata Metálico','Outra'];

// O banco agora guarda a string completa ex: "2025/2026" ou "Anterior"
$anoSalvoStr = $moto['ano'] ?? '';

$qtdFotos  = count($fotos);
$restantes = max(0, 8 - $qtdFotos);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $id > 0 ? 'Editar Moto' : 'Nova Moto' ?> — ST Motors Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/cadastrar-moto.css">
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
          <a href="/admin/estoque" class="sidebar__link sidebar__link--active">
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
      </ul>
    </nav>

    <div class="sidebar__footer">
      <a
        href="/admin/dashboard.php?logout=1&token=<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>"
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
        <h1 class="topbar__title"><?= $id > 0 ? 'Editar Moto' : 'Nova Moto' ?></h1>
        <a href="/admin/estoque/" class="btn btn--secondary" style="margin-left:auto">← Voltar</a>
    </header>

    <main class="admin-main">
        <div class="admin-content" style="max-width:960px">

            <?php if ($sucesso): ?>
                <div class="alert alert--success"><?= htmlspecialchars($sucesso, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert--error"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <!-- ── FORMULÁRIO UNIFICADO (dados + fotos) ── -->
            <section class="cadastro-section">
                <h2 class="dash-section__title"><?= $id > 0 ? 'Editar Moto' : 'Nova Moto' ?></h2>

                <form method="POST" action="<?= $id > 0 ? '?id=' . $id : '' ?>"
                      class="cadastro-form" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="acao" value="salvar">

                    <!-- Linha 1: Marca + Modelo -->
                    <div class="form-row">
                        <div class="form-group fg-marca">
                            <label class="form-label">Marca <span class="required">*</span></label>
                            <select name="marca" class="form-input form-select" required>
                                <option value="">Selecione…</option>
                                <?php foreach ($marcas as $m):
                                    if (str_starts_with($m, '——')): ?>
                                        <option disabled>──────────</option>
                                    <?php continue; endif;
                                    $sel = ($moto['marca'] ?? '') === $m ? 'selected' : '';
                                ?>
                                    <option value="<?= htmlspecialchars($m, ENT_QUOTES, 'UTF-8') ?>" <?= $sel ?>><?= htmlspecialchars($m, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group fg-modelo">
                            <label class="form-label">Modelo <span class="required">*</span></label>
                            <input type="text" name="modelo" class="form-input" required maxlength="150"
                                value="<?= htmlspecialchars($moto['modelo'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                placeholder="Ex: CB 500F">
                        </div>
                    </div>

                    <!-- Linha 2: Ano + Cilindrada + KM -->
                    <div class="form-row">
                        <div class="form-group fg-ano">
                            <label class="form-label">Ano <span class="required">*</span></label>
                            <select name="ano" class="form-input form-select" required>
                                <option value="">Selecione…</option>
                                <?php foreach ($anos as $av):
                                    $sel = $anoSalvoStr === $av ? 'selected' : '';
                                ?>
                                    <option value="<?= htmlspecialchars($av, ENT_QUOTES, 'UTF-8') ?>" <?= $sel ?>><?= htmlspecialchars($av, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group fg-cilindrada">
                            <label class="form-label">Cilindrada</label>
                            <div class="input-suffix-wrap">
                                <input type="text" name="cilindrada" id="cilindrada" class="form-input"
                                    inputmode="numeric" maxlength="4"
                                    value="<?= htmlspecialchars(($moto['cilindrada'] ?? '') ?: '', ENT_QUOTES, 'UTF-8') ?>"
                                    placeholder="471 (deixe em branco para elétricas)">
                                <span class="input-suffix">cc</span>
                            </div>
                            <span class="form-hint">Deixe em branco ou "0" para motos elétricas.</span>
                        </div>
                        <div class="form-group fg-km">
                            <label class="form-label">KM</label>
                            <input type="text" name="km" id="km" class="form-input" inputmode="numeric"
                                value="<?= htmlspecialchars($moto['km'] ?? '0', ENT_QUOTES, 'UTF-8') ?>">
                        </div>
                    </div>

                    <!-- Linha 3: Categoria + Combustível + Câmbio -->
                    <div class="form-row">
                        <div class="form-group fg-categoria">
                            <label class="form-label">Categoria <span class="required">*</span></label>
                            <select name="categoria" class="form-input form-select" required>
                                <option value="">Selecione…</option>
                                <?php foreach ($categorias as $c):
                                    $sel = ($moto['categoria'] ?? '') === $c ? 'selected' : '';
                                ?>
                                    <option value="<?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?>" <?= $sel ?>><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group fg-combustivel">
                            <label class="form-label">Combustível</label>
                            <select name="combustivel" class="form-input form-select">
                                <option value="">Selecione…</option>
                                <?php foreach ($combustiveis as $c):
                                    $sel = ($moto['combustivel'] ?? '') === $c ? 'selected' : '';
                                ?>
                                    <option value="<?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?>" <?= $sel ?>><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group fg-cambio">
                            <label class="form-label">Câmbio</label>
                            <select name="cambio" class="form-input form-select">
                                <option value="">Selecione…</option>
                                <?php foreach ($cambios as $c):
                                    $sel = ($moto['cambio'] ?? '') === $c ? 'selected' : '';
                                ?>
                                    <option value="<?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?>" <?= $sel ?>><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Linha 4: Cor + Placa + Preço -->
                    <div class="form-row">
                        <div class="form-group fg-cor">
                            <label class="form-label">Cor</label>
                            <select name="cor" class="form-input form-select">
                                <option value="">Selecione…</option>
                                <?php foreach ($cores as $c):
                                    $sel = ($moto['cor'] ?? '') === $c ? 'selected' : '';
                                ?>
                                    <option value="<?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?>" <?= $sel ?>><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group fg-placa">
                            <label class="form-label">Placa</label>
                            <input type="text" name="placa" id="placa" class="form-input" maxlength="8"
                                value="<?= htmlspecialchars($moto['placa'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                placeholder="ABC-1D23" style="text-transform:uppercase">
                            <span class="form-hint">Opcional — evita duplicações.</span>
                        </div>
                        <div class="form-group fg-preco">
                            <label class="form-label">Preço (R$) <span class="required">*</span></label>
                            <input type="text" name="preco" id="preco" class="form-input"
                                required inputmode="numeric"
                                value="<?= htmlspecialchars($moto['preco'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                placeholder="1.000,00">
                        </div>
                    </div>

                    <!-- Observações -->
                    <div class="form-group">
                        <label class="form-label">Observações</label>
                        <textarea name="descricao" class="form-input form-textarea" rows="3"
                            placeholder="Estado de conservação, acessórios, revisões..."><?= htmlspecialchars($moto['descricao'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                    </div>

                    <!-- ── FOTOS (na mesma seção) ── -->
                    <div class="form-group">
                        <label class="form-label">
                            Fotos
                            <?php if ($id > 0): ?>
                                <span style="font-weight:400;color:var(--color-text-muted)">
                                    — <?= $qtdFotos ?>/8 cadastrada(s)
                                    <?= $restantes > 0 ? "· até {$restantes} restante(s)" : '· limite atingido' ?>
                                </span>
                            <?php else: ?>
                                <span style="font-weight:400;color:var(--color-text-muted)">— até 8 fotos</span>
                            <?php endif; ?>
                        </label>

                        <div class="fotos-upload-area" id="fotos-upload-area">
                            <label class="fotos-upload-label" for="fotos-input">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                                    <circle cx="8.5" cy="8.5" r="1.5"/>
                                    <polyline points="21 15 16 10 5 21"/>
                                </svg>
                                <span>Clique para selecionar ou arraste as fotos aqui</span>
                                <span style="font-size:.75rem">JPG, PNG, WebP · máx 8MB por foto</span>
                            </label>
                            <input type="file" name="fotos[]" id="fotos-input"
                                accept="image/jpeg,image/png,image/webp"
                                multiple
                                <?= ($id > 0 && $restantes <= 0) ? 'disabled' : '' ?>>
                        </div>

                        <div class="fotos-preview" id="fotos-preview"></div>
                        <span class="form-hint" id="fotos-hint"></span>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn--primary">
                            <?= $id > 0 ? 'Salvar Alterações' : 'Cadastrar Moto' ?>
                        </button>
                    </div>
                </form>

                <!-- ── Fotos já salvas (edição) ── -->
                <?php if ($id > 0 && !empty($fotos)): ?>
                <div style="margin-top:1.5rem">
                    <p class="form-label" style="margin-bottom:.5rem">Fotos cadastradas</p>
                    <p class="form-hint" style="margin-bottom:.75rem">A foto marcada como principal aparece nos cards de listagem.</p>
                    <div class="fotos-grid">
                        <?php foreach ($fotos as $f): ?>
                            <div class="foto-item <?= $f['principal'] ? 'foto-item--principal' : '' ?>">
                                <img src="<?= htmlspecialchars($f['arquivo'], ENT_QUOTES, 'UTF-8') ?>"
                                    alt="" width="160" height="120"
                                    style="object-fit:cover;width:100%;display:block">
                                <?php if ($f['principal']): ?>
                                    <span class="foto-badge">Principal</span>
                                <?php endif; ?>
                                <div class="foto-actions">
                                    <?php if (!$f['principal']): ?>
                                    <form method="POST" action="?id=<?= $id ?>" style="display:inline">
                                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
                                        <input type="hidden" name="acao" value="foto_principal">
                                        <input type="hidden" name="foto_id" value="<?= $f['id'] ?>">
                                        <button type="submit" class="btn-icon btn-icon--success" title="Definir como principal">⭐</button>
                                    </form>
                                    <?php endif; ?>
                                    <form method="POST" action="?id=<?= $id ?>" style="display:inline"
                                          onsubmit="return confirm('Remover foto?')">
                                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
                                        <input type="hidden" name="acao" value="excluir_foto">
                                        <input type="hidden" name="foto_id" value="<?= $f['id'] ?>">
                                        <button type="submit" class="btn-icon btn-icon--danger" title="Remover">🗑️</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

            </section>

        </div>
    </main>
</div>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script src="/admin/assets/scripts/cadastrar-moto.js" defer></script>
</body>
</html>