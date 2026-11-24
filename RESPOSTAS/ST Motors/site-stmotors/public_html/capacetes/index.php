<?php
/**
 * catalogo-capacetes.php — Catálogo público de capacetes (ST Motors).
 * ------------------------------------------------------------------
 * Página só de leitura, sem login, para o público em geral.
 * Mostra foto, modelo, código (discreto), tamanho e valor de cada
 * capacete cadastrado em /admin/capacetes/estoque, e monta o pedido
 * para ser enviado pelo WhatsApp — mesma lógica de "escolher
 * quantidade + botão fixo que soma o total e abre o WhatsApp" usada
 * nas lojas públicas do sistema (Jumbex / Motoca Raiz).
 *
 * Onde colocar este arquivo:
 *   Ele espera achar `includes/db.php` (define getDB()) na raiz do
 *   site. Se você colocá-lo direto na raiz, funciona automaticamente.
 *   Se colocar dentro de uma subpasta (ex.: /capacetes/index.php),
 *   ele também acha o includes/db.php um ou dois níveis acima —
 *   ajuste $candidatos abaixo se precisar de outra profundidade.
 * ------------------------------------------------------------------
 */
declare(strict_types=1);

// ---------------------------------------------------------------
// Localiza includes/db.php (mesmo getDB() usado no admin de capacetes)
// ---------------------------------------------------------------
$candidatos = [
    __DIR__ . '/includes/db.php',
    __DIR__ . '/../includes/db.php',
    __DIR__ . '/../../includes/db.php',
];

$dbEncontrado = null;
foreach ($candidatos as $caminho) {
    if (is_file($caminho)) {
        $dbEncontrado = $caminho;
        break;
    }
}

if ($dbEncontrado === null) {
    http_response_code(500);
    exit('Erro interno. Tente novamente mais tarde.');
}

require_once $dbEncontrado;

// ---------------------------------------------------------------
// CONFIGURAÇÕES DA LOJA
// ---------------------------------------------------------------
const WHATSAPP  = '5516997305602';
const NOME_LOJA = 'ST Motors';

// Limite de unidades por item no stepper (nunca passa do estoque real)
const LIMITE_QTD_MAX = 10;

// ---------------------------------------------------------------
// BUSCA OS CAPACETES
// ---------------------------------------------------------------
$db = getDB();
$linhas = $db->query(
    'SELECT id, codigo, modelo, tamanho, valor_venda, quantidade, foto
     FROM capacetes
     ORDER BY modelo ASC, tamanho ASC, codigo ASC, criado_em DESC'
)->fetchAll();

// Agrupa por código + tamanho: se houver mais de um lote cadastrado
// com o mesmo código e tamanho, aparece só um card no catálogo, com
// o estoque somado (o valor e a foto usados são os do lote mais
// recente daquele código+tamanho, já que a listagem vem ordenada
// por criado_em DESC dentro de cada modelo/tamanho/código).
$agrupados = [];
foreach ($linhas as $c) {
    $chave = $c['codigo'] . '||' . $c['tamanho'];
    if (!isset($agrupados[$chave])) {
        $agrupados[$chave] = [
            'id'      => (int) $c['id'],
            'modelo'  => $c['modelo'],
            'codigo'  => $c['codigo'],
            'tamanho' => $c['tamanho'],
            'preco'   => (float) $c['valor_venda'],
            'estoque' => (int) $c['quantidade'],
            'foto'    => $c['foto'] ?: null,
        ];
    } else {
        $agrupados[$chave]['estoque'] += (int) $c['quantidade'];
        // Se o lote já mostrado não tem foto mas este tem, usa a foto
        if (!$agrupados[$chave]['foto'] && $c['foto']) {
            $agrupados[$chave]['foto'] = $c['foto'];
        }
    }
}

$itensParaJs = array_values($agrupados);

$dadosPagina = [
    'whatsapp' => WHATSAPP,
    'nomeLoja' => NOME_LOJA,
    'limite'   => LIMITE_QTD_MAX,
    'itens'    => $itensParaJs,
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<meta name="theme-color" content="#0d0d0d">
<meta name="description" content="Catálogo de capacetes da ST Motors. Escolha o modelo, o tamanho e finalize o pedido pelo WhatsApp.">

<meta name="google-site-verification" content="NHip5e3LsNh6DOOAGfLemumBBt8vY2FVnteh8aYCsIU" />

<title>Capacetes — <?= htmlspecialchars(NOME_LOJA, ENT_QUOTES, 'UTF-8') ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  /* =========================================================
     Mobile-first: estilos base pensados para telas pequenas.
     Os @media (min-width: ...) no final SOMAM ajustes para
     telas maiores — nada é "desfeito", só ampliado/refinado.
     Fundo branco em toda a página; a única exceção é a barra
     fixa de preço no rodapé, que continua escura para destacar
     o total e o botão de pedido.
     ========================================================= */
  :root{
    --bg:#ffffff;
    --surface:#ffffff;
    --surface-2:#f6f6f6;
    --line:#e6e6e6;
    --ink:#0d0d0d;
    --mut:#6e6666;
    --disabled:#e3e3e3;
    --disabled-ink:#9a9292;
    --green:#16a34a;
    --green-dark:#0f7a37;
    --green-tint:#eaf7ee;
    --radius:14px;
  }
  *{box-sizing:border-box}
  html{-webkit-text-size-adjust:100%}
  body{
    margin:0;background:var(--bg);color:var(--ink);
    font-family:'Inter',system-ui,sans-serif;font-size:15px;
    padding-bottom:88px; /* espaço p/ a barra fixa não cobrir conteúdo */
  }

  /* ---- Cabeçalho ---- */
  .topo{
    background:var(--surface);color:var(--ink);
    padding:20px 16px 18px;text-align:center;border-bottom:1px solid var(--line);
  }
  .topo img{height:30px;margin-bottom:10px}
  .topo h1{margin:0 0 4px;font-size:1.2rem;font-weight:700;letter-spacing:.01em}
  .topo p{margin:0;color:var(--mut);font-size:.82rem;line-height:1.4}

  /* ---- Filtros ---- */
  .filtros{
    max-width:1000px;margin:0 auto;padding:12px 12px 0;position:relative;z-index:2;
    display:flex;flex-direction:column;gap:8px;
  }
  .filtros input,.filtros select{
    width:100%;background:var(--surface);border:1px solid var(--line);
    border-radius:12px;padding:11px 13px;font:inherit;font-size:.92rem;color:var(--ink);
  }
  .filtros input:focus,.filtros select:focus{outline:2px solid var(--green);outline-offset:1px}

  /* ---- Instrução ---- */
  .instrucoes{
    max-width:1000px;margin:0 auto;padding:10px 12px 0;color:var(--mut);
    font-size:.78rem;text-align:center;line-height:1.4;
  }

  /* ---- Grade de produtos ---- */
  .secao{max-width:1000px;margin:0 auto;padding:14px 12px 16px}
  .grid{
    display:grid;grid-template-columns:repeat(2,1fr);gap:10px;
  }
  .card{
    background:var(--surface);border:1.5px solid var(--line);border-radius:var(--radius);
    overflow:hidden;display:flex;flex-direction:column;transition:border-color .15s;
  }
  .card.selecionado{border-color:var(--green);background:var(--green-tint)}
  .card.esgotado{opacity:.55}
  .card__foto-wrap{
    aspect-ratio:1/1;background:var(--surface-2);cursor:pointer;overflow:hidden;position:relative;
  }
  .card__foto-wrap img{width:100%;height:100%;object-fit:cover;display:block}
  .card__foto-wrap.sem-foto::after{
    content:"Sem foto";position:absolute;inset:0;display:flex;align-items:center;justify-content:center;
    color:var(--disabled-ink);font-size:.78rem;text-align:center;padding:8px;
  }
  .tag-esgotado{
    position:absolute;top:6px;right:6px;background:#0d0d0d;color:#fff;font-size:.62rem;
    font-weight:600;padding:3px 7px;border-radius:999px;letter-spacing:.03em;
  }
  .card__corpo{padding:9px 10px 10px;display:flex;flex-direction:column;gap:3px;flex:1}
  .card__modelo{font-size:.86rem;font-weight:600;line-height:1.25;margin:0}
  .card__codigo{font-size:.66rem;color:var(--mut);font-family:'SFMono-Regular',Consolas,monospace;letter-spacing:.01em;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
  .card__linha{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:4px;margin-top:4px}
  .card__tamanho{
    font-size:.68rem;font-weight:600;color:var(--mut);background:var(--surface-2);
    border:1px solid var(--line);border-radius:999px;padding:2px 8px;
  }
  .card__preco{font-size:.92rem;font-weight:700;color:var(--ink)}

  /* ---- Stepper ---- */
  .stepper{
    margin-top:8px;display:flex;align-items:center;justify-content:space-between;
    background:var(--surface-2);border:1px solid var(--line);border-radius:10px;padding:3px;
  }
  .stepper button{
    width:34px;height:34px;border:none;border-radius:8px;background:transparent;color:var(--ink);
    font-size:1.2rem;cursor:pointer;display:grid;place-items:center;font-family:inherit;
    -webkit-tap-highlight-color:transparent;
  }
  .stepper button:disabled{color:var(--disabled-ink);cursor:not-allowed}
  .stepper button:not(:disabled):active{background:var(--green);color:#fff}
  .stepper .qtd{font-weight:700;font-size:.92rem;min-width:20px;text-align:center}
  .btn-esgotado{
    margin-top:8px;text-align:center;font-size:.74rem;font-weight:600;color:var(--disabled-ink);
    background:var(--disabled);border-radius:10px;padding:8px 6px;
  }

  .vazio{text-align:center;color:var(--mut);padding:32px 16px;font-size:.9rem}

  /* ---- Barra fixa (única seção com fundo escuro — onde fica o preço) ---- */
  .bar{
    position:fixed;left:0;right:0;bottom:0;background:#0d0d0d;color:#fff;
    padding:10px 12px calc(10px + env(safe-area-inset-bottom));z-index:40;
    box-shadow:0 -6px 20px rgba(0,0,0,.25);
  }
  .bar-inner{max-width:1000px;margin:0 auto;display:flex;align-items:center;gap:10px}
  .totais{flex:1;min-width:0}
  .totais .lbl{font-size:.65rem;color:#b8b8b8;text-transform:uppercase;letter-spacing:.05em}
  .totais .val{font-size:1.02rem;font-weight:700;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .limpar{
    background:none;border:none;color:#b8b8b8;font-size:.7rem;text-decoration:underline;
    cursor:pointer;padding:0;margin-top:2px;font-family:inherit;
  }
  .cta{
    display:flex;align-items:center;gap:6px;background:var(--green);color:#fff;font-weight:700;
    border:none;border-radius:12px;padding:12px 14px;font-size:.82rem;cursor:pointer;
    text-decoration:none;white-space:nowrap;font-family:inherit;transition:filter .15s;
    flex-shrink:0;
  }
  .cta svg{width:16px;height:16px;fill:#fff;flex-shrink:0}
  .cta:hover{filter:brightness(1.08)}
  .cta[aria-disabled="true"]{background:#4a4747;color:#9a9494;pointer-events:none}
  .cta[aria-disabled="true"] svg{fill:#9a9494}

  /* ---- Modal (zoom da foto) ---- */
  .modal-backdrop{
    position:fixed;inset:0;background:rgba(0,0,0,.82);display:none;
    align-items:center;justify-content:center;padding:16px;z-index:50;
  }
  .modal-backdrop.open{display:flex}
  .modal{
    background:var(--surface);border-radius:16px;width:100%;max-width:420px;max-height:86vh;
    overflow:hidden;display:flex;flex-direction:column;box-shadow:0 20px 50px rgba(0,0,0,.6);
  }
  .modal img{width:100%;aspect-ratio:1/1;object-fit:contain;background:var(--surface-2);display:block}
  .modal-body{padding:12px 14px 14px;display:flex;align-items:flex-start;gap:10px}
  .modal-body .nome{font-size:.92rem;margin:0 0 2px;font-weight:600}
  .modal-body .meta{font-size:.76rem;color:var(--mut)}
  .modal-close{
    flex-shrink:0;width:30px;height:30px;border-radius:50%;border:1px solid var(--line);
    background:var(--surface-2);color:var(--ink);cursor:pointer;font-size:1.05rem;line-height:1;
    display:grid;place-items:center;
  }

  :focus-visible{outline:2px solid #000;outline-offset:2px;border-radius:6px}
  @media (prefers-reduced-motion:reduce){*{transition:none!important}}

  /* =========================================================
     A partir daqui, ajustes progressivos para telas maiores.
     ========================================================= */

  /* Tablets pequenos / celulares grandes na horizontal */
  @media (min-width:480px){
    .grid{grid-template-columns:repeat(3,1fr);gap:12px}
    .filtros{flex-direction:row}
    .filtros input,.filtros select{width:auto;flex:1;min-width:140px}
  }

  /* Tablets */
  @media (min-width:700px){
    body{font-size:16px;padding-bottom:96px}
    .topo{padding:32px 20px 26px}
    .topo img{height:38px;margin-bottom:14px}
    .topo h1{font-size:1.5rem}
    .topo p{font-size:.92rem}
    .filtros{padding:16px 16px 0}
    .instrucoes{padding:14px 16px 0;font-size:.85rem}
    .secao{padding:20px 16px 20px}
    .grid{grid-template-columns:repeat(4,1fr);gap:16px}
    .card{border-width:2px}
    .card__corpo{padding:12px 14px 14px;gap:4px}
    .card__modelo{font-size:.98rem}
    .card__codigo{font-size:.72rem}
    .card__tamanho{font-size:.74rem;padding:3px 9px}
    .card__preco{font-size:1.02rem}
    .stepper button{width:32px;height:32px;font-size:1.15rem}
    .bar{padding:12px 16px calc(12px + env(safe-area-inset-bottom))}
    .bar-inner{gap:14px}
    .totais .val{font-size:1.15rem}
    .cta{padding:13px 18px;font-size:.92rem;gap:8px}
    .cta svg{width:18px;height:18px}
  }

  /* Desktop */
  @media (min-width:960px){
    .grid{grid-template-columns:repeat(5,1fr)}
  }
</style>
</head>
<body>

  <header class="topo">
    <img src="/assets/images/logo-header.svg" alt="<?= htmlspecialchars(NOME_LOJA, ENT_QUOTES, 'UTF-8') ?>">
    <h1>Catálogo de Capacetes</h1>
    <p>Escolha o modelo e o tamanho e finalize o pedido pelo WhatsApp.</p>
  </header>

  <div class="filtros">
    <input type="search" id="busca" placeholder="Buscar por modelo ou código...">
    <select id="filtroTamanho">
      <option value="">Todos os tamanhos</option>
    </select>
  </div>

  <p class="instrucoes">Toque em <strong>+</strong> para escolher a quantidade. Toque na foto para ampliar.</p>

  <div class="secao">
    <div class="grid" id="grid"></div>
    <div class="vazio" id="vazio" style="display:none">Nenhum capacete encontrado.</div>
  </div>

  <div class="bar">
    <div class="bar-inner">
      <div class="totais">
        <div class="lbl">Total</div>
        <div class="val" id="total">R$ 0,00</div>
        <button class="limpar" id="limpar" type="button">Limpar seleção</button>
      </div>
      <a class="cta" id="pedir" href="#" aria-disabled="true" target="_blank" rel="noopener noreferrer">
        <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 0 0-8.6 15l-1.3 4.8 4.9-1.3A10 10 0 1 0 12 2Zm5.3 14.2c-.2.6-1.3 1.2-1.8 1.2-.5.1-1 .1-1.7-.1-.4-.1-1-.3-1.6-.6-2.9-1.2-4.7-4.1-4.9-4.3-.1-.2-1.1-1.5-1.1-2.8 0-1.3.7-2 .9-2.2.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.5l.8 1.9c.1.2.1.3 0 .5l-.4.5c-.2.2-.3.4-.1.7.2.3.9 1.4 1.9 2.3 1.3 1.1 2 1.3 2.3 1.4.2.1.4 0 .5-.1l.7-.8c.2-.2.4-.2.6-.1l1.8.9c.2.1.4.2.4.3.1.1.1.6-.1 1.1Z"/></svg>
        <span id="ctatxt">Pedir capacetes selecionados</span>
      </a>
    </div>
  </div>

  <!-- Modal de zoom da foto -->
  <div class="modal-backdrop" id="modalBg">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="modalNome">
      <img id="modalImg" src="" alt="">
      <div class="modal-body">
        <div>
          <p class="nome" id="modalNome"></p>
          <p class="meta" id="modalMeta"></p>
        </div>
        <button class="modal-close" id="modalFechar" type="button" aria-label="Fechar">✕</button>
      </div>
    </div>
  </div>

  <script type="application/json" id="dados-loja"><?= json_encode($dadosPagina, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>

  <script>
  (function(){
    const dados = JSON.parse(document.getElementById('dados-loja').textContent);
    const itens = dados.itens;
    const carrinho = {}; // id -> quantidade

    const fmt = v => v.toLocaleString('pt-BR', {style:'currency', currency:'BRL'});

    const grid = document.getElementById('grid');
    const vazio = document.getElementById('vazio');
    const busca = document.getElementById('busca');
    const filtroTamanho = document.getElementById('filtroTamanho');
    const total = document.getElementById('total');
    const pedir = document.getElementById('pedir');
    const ctatxt = document.getElementById('ctatxt');
    const limparBtn = document.getElementById('limpar');

    // Popula filtro de tamanhos com os valores existentes
    const tamanhos = [...new Set(itens.map(i => i.tamanho))].sort();
    tamanhos.forEach(t => {
      const op = document.createElement('option');
      op.value = t; op.textContent = 'Tam. ' + t;
      filtroTamanho.appendChild(op);
    });

    function card(item){
      const li = document.createElement('div');
      const esgotado = item.estoque <= 0;
      li.className = 'card' + (esgotado ? ' esgotado' : '');
      li.dataset.id = item.id;

      const fotoWrap = document.createElement('div');
      fotoWrap.className = 'card__foto-wrap' + (item.foto ? '' : ' sem-foto');
      if (item.foto){
        const img = document.createElement('img');
        img.src = item.foto;
        img.alt = 'Foto de ' + item.modelo;
        img.loading = 'lazy';
        fotoWrap.appendChild(img);
        fotoWrap.addEventListener('click', () => abrirModal(item));
      }
      if (esgotado){
        const tag = document.createElement('span');
        tag.className = 'tag-esgotado';
        tag.textContent = 'Esgotado';
        fotoWrap.appendChild(tag);
      }
      li.appendChild(fotoWrap);

      const corpo = document.createElement('div');
      corpo.className = 'card__corpo';
      corpo.innerHTML = `
        <p class="card__modelo">${escapeHtml(item.modelo)}</p>
        <span class="card__codigo">Cód. ${escapeHtml(item.codigo)}</span>
        <div class="card__linha">
          <span class="card__tamanho">Tam. ${escapeHtml(item.tamanho)}</span>
          <span class="card__preco">${fmt(item.preco)}</span>
        </div>
      `;

      if (esgotado){
        const aviso = document.createElement('div');
        aviso.className = 'btn-esgotado';
        aviso.textContent = 'Sem estoque no momento';
        corpo.appendChild(aviso);
      } else {
        const maxQtd = Math.min(item.estoque, dados.limite);
        const stepper = document.createElement('div');
        stepper.className = 'stepper';
        stepper.innerHTML = `
          <button type="button" data-acao="menos" aria-label="Diminuir quantidade">−</button>
          <span class="qtd">0</span>
          <button type="button" data-acao="mais" aria-label="Aumentar quantidade">+</button>
        `;
        const qtdEl = stepper.querySelector('.qtd');
        const btnMenos = stepper.querySelector('[data-acao="menos"]');
        const btnMais = stepper.querySelector('[data-acao="mais"]');
        btnMenos.disabled = true;

        function atualizar(){
          const q = carrinho[item.id] || 0;
          qtdEl.textContent = q;
          btnMenos.disabled = q <= 0;
          btnMais.disabled = q >= maxQtd;
          li.classList.toggle('selecionado', q > 0);
        }

        btnMais.addEventListener('click', () => {
          const q = Math.min((carrinho[item.id] || 0) + 1, maxQtd);
          carrinho[item.id] = q;
          atualizar();
          atualizarBarra();
        });
        btnMenos.addEventListener('click', () => {
          const q = Math.max((carrinho[item.id] || 0) - 1, 0);
          if (q === 0) delete carrinho[item.id]; else carrinho[item.id] = q;
          atualizar();
          atualizarBarra();
        });

        corpo.appendChild(stepper);
      }

      li.appendChild(corpo);
      return li;
    }

    function escapeHtml(s){
      return String(s).replace(/[&<>"']/g, c => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c]));
    }

    function renderizar(){
      const termo = busca.value.trim().toLowerCase();
      const tam = filtroTamanho.value;
      const filtrados = itens.filter(i => {
        const bateBusca = !termo || i.modelo.toLowerCase().includes(termo) || i.codigo.toLowerCase().includes(termo);
        const bateTam = !tam || i.tamanho === tam;
        return bateBusca && bateTam;
      });
      grid.innerHTML = '';
      filtrados.forEach(i => grid.appendChild(card(i)));
      vazio.style.display = filtrados.length ? 'none' : 'block';
    }

    function atualizarBarra(){
      let soma = 0, qtdTotal = 0;
      Object.entries(carrinho).forEach(([id, q]) => {
        const item = itens.find(i => i.id === Number(id));
        if (item){ soma += item.preco * q; qtdTotal += q; }
      });
      total.textContent = fmt(soma);
      if (qtdTotal > 0){
        pedir.removeAttribute('aria-disabled');
        ctatxt.textContent = `Pedir ${qtdTotal} capacete${qtdTotal > 1 ? 's' : ''} selecionado${qtdTotal > 1 ? 's' : ''}`;
        pedir.href = montarLinkWhatsApp(soma);
      } else {
        pedir.setAttribute('aria-disabled', 'true');
        ctatxt.textContent = 'Pedir capacetes selecionados';
        pedir.href = '#';
      }
    }

    function montarLinkWhatsApp(total){
      let msg = `Olá! Vim pelo catálogo da ${dados.nomeLoja} e quero pedir:\n\n`;
      Object.entries(carrinho).forEach(([id, q]) => {
        const item = itens.find(i => i.id === Number(id));
        if (!item) return;
        msg += `• ${item.modelo} (Cód. ${item.codigo}) — Tam. ${item.tamanho} — Qtde: ${q} — ${fmt(item.preco)} cada\n`;
      });
      msg += `\nTotal: ${fmt(total)}`;
      return `https://wa.me/${dados.whatsapp}?text=${encodeURIComponent(msg)}`;
    }

    limparBtn.addEventListener('click', () => {
      Object.keys(carrinho).forEach(k => delete carrinho[k]);
      renderizar();
      atualizarBarra();
    });

    // Modal de zoom
    const modalBg = document.getElementById('modalBg');
    const modalImg = document.getElementById('modalImg');
    const modalNome = document.getElementById('modalNome');
    const modalMeta = document.getElementById('modalMeta');
    document.getElementById('modalFechar').addEventListener('click', fecharModal);
    modalBg.addEventListener('click', e => { if (e.target === modalBg) fecharModal(); });

    function abrirModal(item){
      modalImg.src = item.foto;
      modalImg.alt = 'Foto de ' + item.modelo;
      modalNome.textContent = item.modelo;
      modalMeta.textContent = `Cód. ${item.codigo} — Tam. ${item.tamanho} — ${fmt(item.preco)}`;
      modalBg.classList.add('open');
    }
    function fecharModal(){ modalBg.classList.remove('open'); }

    busca.addEventListener('input', renderizar);
    filtroTamanho.addEventListener('change', renderizar);

    renderizar();
    atualizarBarra();
  })();
  </script>
</body>
</html>