<?php
define('APP_LOADED', true);
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/security.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/money.php';

// ── FILTROS ──────────────────────────────────────────────────
$q         = trim($_GET['q']         ?? '');
$categoria = trim($_GET['categoria'] ?? '');
$preco_max = precoToFloat($_GET['preco_max'] ?? '0');
$ordem     = in_array($_GET['ordem'] ?? '', ['categoria','preco_asc','preco_desc','ano_desc','km_asc','criado_desc'])
           ? $_GET['ordem'] : 'categoria';

$where  = ['m.ativo = 1'];
$params = [];

if ($q !== '') {
    $where[]  = '(m.marca LIKE ? OR m.modelo LIKE ? OR m.categoria LIKE ?)';
    $like     = '%' . $q . '%';
    $params   = array_merge($params, [$like, $like, $like]);
}
if ($categoria !== '') { $where[] = 'm.categoria = ?'; $params[] = $categoria; }
if ($preco_max  >   0) { $where[] = 'm.preco <= ?';    $params[] = $preco_max;  }

// Ordem fixa de categorias pedida pela loja; qualquer categoria fora desta
// lista (ex: cadastrada futuramente com nome diferente) cai no fim, em vez
// de sumir ou ficar em posição arbitrária.
$categoriaOrdem = "CASE LOWER(m.categoria)
    WHEN 'street'   THEN 1
    WHEN 'naked'    THEN 2
    WHEN 'trail'    THEN 3
    WHEN 'bigtrail' THEN 4
    WHEN 'sport'    THEN 5
    WHEN 'custom'   THEN 6
    ELSE 99
END";

$orderMap = [
    'categoria'   => $categoriaOrdem . ', m.preco DESC', // padrão: agrupa por categoria, maior preço primeiro dentro de cada uma
    'preco_asc'   => 'm.preco ASC',
    'preco_desc'  => 'm.preco DESC',
    'ano_desc'    => 'm.ano DESC',
    'km_asc'      => 'm.km ASC',
    'criado_desc' => 'm.criado_em DESC',
];

$sql = 'SELECT m.*, (SELECT arquivo FROM moto_fotos WHERE moto_id = m.id AND principal = 1 LIMIT 1) AS foto
        FROM motos m
        WHERE ' . implode(' AND ', $where) . '
        ORDER BY ' . $orderMap[$ordem];

$motos = [];
$cats  = [];
$dbErro = false;

try {
    $db    = getDB();
    $st    = $db->prepare($sql);
    $st->execute($params);
    $motos = $st->fetchAll();

    $cats  = $db->query('SELECT DISTINCT categoria FROM motos WHERE ativo = 1 ORDER BY categoria')->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $motos  = [];
    $cats   = [];
    $dbErro = true;
}
$total = count($motos);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estoque de Motos | ST Motors Araraquara</title>
  <meta name="description" content="Estoque completo de motos usadas e seminovas em Araraquara. Filtre por categoria, preco e mais.">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= SITE_URL ?>/estoque/">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/styles/components/header.css">
  <link rel="stylesheet" href="/assets/styles/components/footer.css">
  <link rel="stylesheet" href="/assets/styles/home.css">
  <link rel="stylesheet" href="/assets/styles/estoque.css">
</head>
<body class="estoque-body">
<?php include __DIR__ . '/../includes/header.php'; ?>

<main id="main-content" class="estoque-page">

  <!-- ── HERO BANNER ── -->
<div class="estoque-hero">
  <div class="estoque-hero__content">
    <h1 class="estoque-hero__title">Estoque <span>ST Motors</span></h1>
    <div class="estoque-hero__meta">
     <span class="estoque-hero__sub"><?= $total ?> moto<?= $total !== 1 ? 's' : '' ?> dispon<?= $total !== 1 ? 'íveis' : 'ível' ?></span>
      <button class="filtro-toggle-btn" id="filtro-toggle" aria-expanded="false" aria-controls="filtros-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="20" y2="12"/><line x1="12" y1="18" x2="20" y2="18"/></svg>
        Filtros
        <?php if ($q || $categoria || $preco_max): ?>
          <span class="filtro-toggle-badge"></span>
        <?php endif; ?>
      </button>
    </div>
  </div>
</div>

<!-- ── FILTROS ── -->
<div class="estoque-filtros-wrap" id="filtros-wrap" hidden>
    <form method="GET" action="" class="filtros-form" id="filtros-form">

      <div class="filtro-group filtro-group--search">
        <svg class="filtro-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
          fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input type="search" name="q" class="filtro-input filtro-input--text"
          placeholder="Marca, modelo ou categoria…"
          value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>">
      </div>

      <div class="filtro-group">
        <select name="categoria" class="filtro-input filtro-select">
          <option value="">Todas as categorias</option>
          <?php foreach ($cats as $c): ?>
            <option value="<?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?>"
              <?= $categoria === $c ? 'selected' : '' ?>>
              <?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="filtro-group">
        <select name="preco_max" class="filtro-input filtro-select">
          <option value="">Qualquer preco</option>
          <option value="10000"  <?= $preco_max === 10000.0 ? 'selected' : '' ?>>Ate R$ 10.000</option>
          <option value="15000"  <?= $preco_max === 15000.0 ? 'selected' : '' ?>>Ate R$ 15.000</option>
          <option value="20000"  <?= $preco_max === 20000.0 ? 'selected' : '' ?>>Ate R$ 20.000</option>
          <option value="30000"  <?= $preco_max === 30000.0 ? 'selected' : '' ?>>Ate R$ 30.000</option>
          <option value="50000"  <?= $preco_max === 50000.0 ? 'selected' : '' ?>>Ate R$ 50.000</option>
        </select>
      </div>

      <div class="filtro-group">
        <select name="ordem" class="filtro-input filtro-select">
          <option value="categoria"   <?= $ordem === 'categoria'   ? 'selected' : '' ?>>Por categoria</option>
          <option value="criado_desc" <?= $ordem === 'criado_desc' ? 'selected' : '' ?>>Mais recentes</option>
          <option value="preco_asc"   <?= $ordem === 'preco_asc'   ? 'selected' : '' ?>>Menor preco</option>
          <option value="preco_desc"  <?= $ordem === 'preco_desc'  ? 'selected' : '' ?>>Maior preco</option>
          <option value="ano_desc"    <?= $ordem === 'ano_desc'    ? 'selected' : '' ?>>Mais novo</option>
          <option value="km_asc"      <?= $ordem === 'km_asc'      ? 'selected' : '' ?>>Menor KM</option>
        </select>
      </div>

      <button type="submit" class="filtro-btn">Filtrar</button>

      <?php if ($q || $categoria || $preco_max): ?>
        <a href="/estoque/" class="filtro-btn filtro-btn--clear">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M18 6 6 18M6 6l12 12"/>
          </svg>
          Limpar
        </a>
      <?php endif; ?>

    </form>

    <?php if ($q || $categoria || $preco_max): ?>
    <div class="filtros-ativos">
      <?php if ($q): ?>
        <span class="filtro-tag">Busca: "<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>"</span>
      <?php endif; ?>
      <?php if ($categoria): ?>
        <span class="filtro-tag"><?= htmlspecialchars($categoria, ENT_QUOTES, 'UTF-8') ?></span>
      <?php endif; ?>
      <?php if ($preco_max): ?>
        <span class="filtro-tag">Ate R$ <?= precoFormat($preco_max) ?></span>
      <?php endif; ?>
      <span class="filtros-ativos__total"><?= $total ?> resultado<?= $total !== 1 ? 's' : '' ?></span>
    </div>
    <?php endif; ?>
  </div>

  <!-- ── GRID DE MOTOS ── -->
  <?php if ($dbErro): ?>
    <div class="estoque-vazio">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
      </svg>
      <p>Não conseguimos carregar o estoque agora.</p>
      <p>Tente novamente em instantes ou fale com a gente pelo WhatsApp.</p>
      <a href="https://wa.me/<?= WHATSAPP_NUMERO ?>">Falar no WhatsApp</a>
    </div>
  <?php elseif (empty($motos)): ?>
    <div class="estoque-vazio">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
      </svg>
      <p>Hmm… não encontramos o que você digitou.</p>
      <p>Que tal dar uma olhada no nosso estoque? Pode ser que a moto que você procura esteja te esperando lá 😉</p>
      <a href="/estoque/">Ver todo o estoque</a>
    </div>
  <?php else: ?>
    <div class="estoque-grid">
      <?php foreach ($motos as $m): ?>
        <article class="bike-card">
          <a href="/estoque/motos/<?= htmlspecialchars($m['slug'], ENT_QUOTES, 'UTF-8') ?>"
             class="bike-card__link"
             aria-label="Ver detalhes: <?= htmlspecialchars($m['marca'].' '.$m['modelo'], ENT_QUOTES, 'UTF-8') ?>">

            <div class="bike-card__image-wrapper">
              <?php if ($m['foto']): ?>
                <img src="<?= htmlspecialchars($m['foto'], ENT_QUOTES, 'UTF-8') ?>"
                  alt="<?= htmlspecialchars($m['marca'].' '.$m['modelo'], ENT_QUOTES, 'UTF-8') ?>"
                  class="bike-card__image" loading="lazy" width="400" height="300">
              <?php else: ?>
                <div class="bike-card__no-foto" aria-hidden="true">&#x1F3CD;</div>
              <?php endif; ?>
            </div>

            <div class="bike-card__content">
              <h5 class="bike-card__brand"><?= htmlspecialchars(strtoupper($m['marca']), ENT_QUOTES, 'UTF-8') ?></h5>
              <h3 class="bike-card__name"><?= htmlspecialchars($m['modelo'], ENT_QUOTES, 'UTF-8') ?></h3>
              <div class="bike-card__specs">
                <span class="bike-card__spec">
                  <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 3h10a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/><path d="M5 7h14M5 10h14M12 14v4"/><circle cx="12" cy="20" r="2"/></svg>
                  <?= (int)$m['cilindrada'] ?>cc
                </span>
                <span class="bike-card__spec">
                  <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                  <?= htmlspecialchars($m['categoria'], ENT_QUOTES, 'UTF-8') ?>
                </span>
                <span class="bike-card__spec">
                  <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                  <?= htmlspecialchars($m['ano'], ENT_QUOTES, 'UTF-8') ?>
                </span>
                <?php if ($m['km'] > 0): ?>
                <span class="bike-card__spec">
                  <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                  <?= number_format((int)$m['km'], 0, ',', '.') ?> km
                </span>
                <?php endif; ?>
              </div>
              <div class="bike-card__footer">
                <p class="bike-card__price">
                  <span class="bike-card__price-label">A partir de</span>
                  <span class="bike-card__price-value">R$ <?= precoExibir($m['preco']) ?></span>
                </p>
                <span class="bike-card__cta">Ver detalhes</span>
              </div>
            </div>

          </a>
        </article>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="/assets/scripts/estoque.js" defer></script>
</body>
</html>
