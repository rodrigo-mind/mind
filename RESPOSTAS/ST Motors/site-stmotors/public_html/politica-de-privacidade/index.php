<?php
define('APP_LOADED', true);
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/security.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Política de Privacidade | ST Motors Araraquara</title>
  <meta name="description" content="Como a ST Motors coleta, usa e protege seus dados pessoais de acordo com a LGPD (Lei nº 13.709/2018).">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= SITE_URL ?>/politica-de-privacidade/">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/styles/components/header.css">
  <link rel="stylesheet" href="/assets/styles/components/footer.css">
  <style>

    /* ─── Reset de segurança contra overflow horizontal ─── */
    html, body {
      max-width: 100%;
      overflow-x: hidden;
    }

    /* ─── Layout geral ─── */
    .pp-page {
      background: var(--color-bg-secondary);
      min-height: 100vh;
      /*
        Compensa o header fixo/sticky do site, que sobrepõe o conteúdo
        quando não há espaço reservado no topo da página.
        --header-height deve ser definida globalmente (ex: em :root, no header.css).
        O valor 80px é apenas um fallback caso a variável não exista.
      */
      padding-top: var(--header-height, 80px);
      box-sizing: border-box;
    }

    /* ─── Hero ─── */
    .pp-hero {
      background: var(--color-bg-dark);
      padding: 72px 24px 80px;
      position: relative;
      overflow: hidden;
    }
    .pp-hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 600px 400px at 80% 50%, rgba(79,158,33,.18) 0%, transparent 70%),
        radial-gradient(ellipse 300px 300px at 10% 80%, rgba(79,158,33,.10) 0%, transparent 60%);
      pointer-events: none;
    }
    .pp-hero__inner {
      max-width: 860px;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }
    .pp-hero__tag {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: .75rem;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--color-primary-light);
      margin-bottom: 18px;
    }
    .pp-hero__tag svg { opacity: .8; }
    .pp-hero__title {
      font-family: 'Montserrat', sans-serif;
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 800;
      color: var(--color-text-light);
      line-height: 1.2;
      margin-bottom: 14px;
    }
    .pp-hero__sub {
      font-size: .9375rem;
      color: rgba(250,250,248,.6);
      max-width: 560px;
      line-height: 1.65;
    }

    /* ─── Sumário em glassmorfismo ─── */
    .pp-summary {
      background: rgba(255,255,255,.07);
      backdrop-filter: blur(20px) saturate(150%);
      -webkit-backdrop-filter: blur(20px) saturate(150%);
      border: 1px solid rgba(255,255,255,.12);
      border-radius: 18px;
      padding: 24px 28px;
      margin-top: 36px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 18px 24px;
    }
    .pp-summary__item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      min-width: 0;
    }
    .pp-summary__icon {
      flex-shrink: 0;
      width: 32px;
      height: 32px;
      background: rgba(79,158,33,.2);
      border: 1px solid rgba(139,201,106,.25);
      border-radius: 9px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-primary-light);
      margin-top: 2px;
    }
    .pp-summary__text {
      font-size: .875rem;
      color: rgba(250,250,248,.78);
      line-height: 1.5;
      min-width: 0;
    }
    .pp-summary__text strong {
      display: block;
      color: var(--color-text-light);
      font-weight: 600;
      font-size: .875rem;
      margin-bottom: 2px;
    }

    /* ─── Corpo ─── */
    .pp-body {
      max-width: 860px;
      margin: 0 auto;
      padding: 0 24px 96px;
      display: grid;
      grid-template-columns: 220px 1fr;
      gap: 0 48px;
      align-items: start;
      min-width: 0;
    }

    /* ─── Nav lateral (âncora) ─── */
    .pp-nav {
      position: sticky;
      top: calc(var(--header-height, 80px) + 32px);
      padding: 32px 0;
      min-width: 0;
    }
    .pp-nav__label {
      font-size: .7rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--color-text-tertiary);
      margin-bottom: 12px;
    }
    .pp-nav__list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 2px;
    }
    .pp-nav__link {
      display: block;
      font-size: .8125rem;
      font-weight: 500;
      color: var(--color-text-secondary);
      padding: 6px 10px;
      border-radius: 7px;
      transition: background .15s, color .15s;
      line-height: 1.4;
    }
    .pp-nav__link:hover,
    .pp-nav__link.active {
      background: rgba(79,158,33,.08);
      color: var(--color-primary);
    }

    /* ─── Conteúdo principal ─── */
    .pp-content {
      padding: 40px 0;
      min-width: 0; /* impede que filhos largos (ex: tabelas) estourem o grid */
    }

    .pp-meta {
      font-size: .8125rem;
      color: var(--color-text-tertiary);
      margin-bottom: 48px;
    }

    .pp-section {
      margin-bottom: 52px;
      scroll-margin-top: calc(var(--header-height, 80px) + 24px);
    }

    .pp-section__num {
      font-size: .75rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--color-primary);
      margin-bottom: 6px;
    }

    .pp-section h2 {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.125rem;
      font-weight: 700;
      color: var(--color-text-primary);
      margin-bottom: 14px;
    }

    .pp-section p {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      line-height: 1.75;
      margin-bottom: 12px;
    }

    .pp-section p:last-child { margin-bottom: 0; }

    .pp-section ul {
      list-style: none;
      padding: 0;
      margin: 12px 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .pp-section ul li {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      line-height: 1.65;
      padding-left: 18px;
      position: relative;
    }

    .pp-section ul li::before {
      content: '';
      position: absolute;
      left: 0;
      top: .65em;
      width: 5px;
      height: 5px;
      border-radius: 50%;
      background: var(--color-primary);
      opacity: .7;
    }

    .pp-section strong { color: var(--color-text-primary); font-weight: 600; }

    /* ─── Tabela ─── */
    .pp-table-wrap {
      overflow-x: auto;
      max-width: 100%;
      -webkit-overflow-scrolling: touch;
      margin: 16px 0;
      border-radius: 12px;
      border: 1px solid var(--color-border-light);
    }
    .pp-table {
      width: 100%;
      border-collapse: collapse;
      font-size: .875rem;
    }
    .pp-table th {
      background: var(--color-bg-secondary);
      font-weight: 600;
      color: var(--color-text-primary);
      padding: 11px 14px;
      text-align: left;
      white-space: nowrap;
    }
    .pp-table td {
      padding: 11px 14px;
      border-top: 1px solid var(--color-border-light);
      color: var(--color-text-secondary);
      vertical-align: top;
      line-height: 1.55;
    }
    .pp-table tr:hover td { background: rgba(79,158,33,.03); }
    .pp-table code {
      font-family: 'Menlo', 'Consolas', monospace;
      font-size: .8rem;
      background: rgba(0,0,0,.05);
      border-radius: 4px;
      padding: 1px 5px;
    }

    /* ─── Destaque (aviso) ─── */
    .pp-note {
      background: rgba(79,158,33,.06);
      border-radius: 10px;
      padding: 14px 18px;
      margin: 16px 0;
      font-size: .875rem;
      color: var(--color-text-secondary);
      line-height: 1.65;
    }
    .pp-note strong { color: var(--color-text-primary); }

    /* ─── Box de contato em glassmorfismo (fundo claro) ─── */
    .pp-contact {
      background: rgba(255,255,255,.7);
      backdrop-filter: blur(20px) saturate(160%);
      -webkit-backdrop-filter: blur(20px) saturate(160%);
      border: 1px solid rgba(255,255,255,.9);
      border-radius: 16px;
      padding: 24px 28px;
      box-shadow: 0 4px 24px rgba(0,0,0,.06);
      margin-top: 14px;
    }
    .pp-contact p {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      line-height: 1.8;
      margin: 0;
    }
    .pp-contact a { color: var(--color-primary); font-weight: 500; }
    .pp-contact strong { color: var(--color-text-primary); }

    /* ─── Responsivo ─── */
    @media (max-width: 700px) {
      .pp-body {
        grid-template-columns: 1fr;
        padding: 0 18px 72px;
      }
      .pp-nav { display: none; }
      .pp-hero { padding: 52px 18px 60px; }
      .pp-summary { grid-template-columns: 1fr; padding: 20px; }
      .pp-content { padding: 32px 0; }
    }

  </style>
</head>
<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="pp-page">

  <!-- HERO -->
  <section class="pp-hero">
    <div class="pp-hero__inner">

      <span class="pp-hero__tag">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Documento legal
      </span>

      <h1 class="pp-hero__title">Política de Privacidade</h1>
      <p class="pp-hero__sub">Explicamos de forma clara quais dados coletamos, por que coletamos e como protegemos suas informações, em conformidade com a LGPD.</p>

      <!-- Sumário em glassmorfismo -->
      <div class="pp-summary" aria-label="Resumo dos pontos principais">

        <div class="pp-summary__item">
          <div class="pp-summary__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          </div>
          <div class="pp-summary__text">
            <strong>Dados coletamos</strong>
            Nome, CPF, telefone, renda e endereço, apenas quando você nos envia formulários de simulação/financiamento.
          </div>
        </div>

        <div class="pp-summary__item">
          <div class="pp-summary__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div class="pp-summary__text">
            <strong>Não vendemos dados</strong>
            Nunca vendemos, alugamos ou cedemos suas informações para fins de marketing de terceiros.
          </div>
        </div>

        <div class="pp-summary__item">
          <div class="pp-summary__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div class="pp-summary__text">
            <strong>Retenção limitada</strong>
            Mantemos simulações por até 2 anos e cadastros por até 5 anos, ou excluímos a seu pedido.
          </div>
        </div>

        <div class="pp-summary__item">
          <div class="pp-summary__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          </div>
          <div class="pp-summary__text">
            <strong>Cookies opcionais</strong>
            Analytics (Google e Microsoft) só são ativados se você aceitar. Cookies essenciais não podem ser desativados.
          </div>
        </div>

        <div class="pp-summary__item">
          <div class="pp-summary__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          </div>
          <div class="pp-summary__text">
            <strong>Seus direitos (LGPD)</strong>
            Acesso, correção, exclusão, portabilidade e revogação de consentimento. Prazo de 15 dias úteis.
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- CORPO -->
  <div class="pp-body">

    <!-- Nav âncora lateral -->
    <nav class="pp-nav" aria-label="Índice da política">
      <p class="pp-nav__label">Nesta página</p>
      <ul class="pp-nav__list">
        <li><a class="pp-nav__link" href="#s1">Quem somos</a></li>
        <li><a class="pp-nav__link" href="#s2">Dados que coletamos</a></li>
        <li><a class="pp-nav__link" href="#s3">Cookies</a></li>
        <li><a class="pp-nav__link" href="#s4">Como usamos</a></li>
        <li><a class="pp-nav__link" href="#s5">Compartilhamento</a></li>
        <li><a class="pp-nav__link" href="#s6">Retenção</a></li>
        <li><a class="pp-nav__link" href="#s7">Segurança</a></li>
        <li><a class="pp-nav__link" href="#s8">Seus direitos</a></li>
        <li><a class="pp-nav__link" href="#s9">Contato</a></li>
        <li><a class="pp-nav__link" href="#s10">Terceiros</a></li>
        <li><a class="pp-nav__link" href="#s11">Menores</a></li>
        <li><a class="pp-nav__link" href="#s12">Alterações</a></li>
      </ul>
    </nav>

    <!-- Conteúdo -->
    <main class="pp-content" id="main-content">

      <p class="pp-meta">Última atualização: julho de 2026</p>

      <p style="font-size:.9375rem;color:var(--color-text-secondary);line-height:1.75;margin-bottom:48px;">A <strong>ST Motors Araraquara</strong> leva a sério a proteção dos seus dados pessoais. Este documento descreve quais dados coletamos, por que coletamos, como usamos e quais são seus direitos, em conformidade com a Lei Geral de Proteção de Dados Pessoais (Lei n.º 13.709/2018).</p>

      <!-- 1 -->
      <section class="pp-section" id="s1" aria-labelledby="s1-title">
        <p class="pp-section__num">01</p>
        <h2 id="s1-title">Quem somos (controlador de dados)</h2>
        <p>Para fins da LGPD, o controlador responsável pelo tratamento dos dados pessoais coletados neste site é:</p>
        <div class="pp-contact">
          <p>
            <strong>ST Motors Araraquara</strong><br>
            CNPJ: 55.032.769/0001-83<br>
            R. Mauricio Galli, 47 &mdash; Araraquara/SP<br>
            Telefone: (16) 3014-7386<br>
            Instagram: <a href="https://www.instagram.com/stmotors_ara/" target="_blank" rel="noopener noreferrer">@stmotors_ara</a>
          </p>
        </div>
      </section>

      <!-- 2 -->
      <section class="pp-section" id="s2" aria-labelledby="s2-title">
        <p class="pp-section__num">02</p>
        <h2 id="s2-title">Dados que coletamos e por quê</h2>
        <p>Coletamos apenas os dados estritamente necessários para cada finalidade. A tabela abaixo detalha cada ponto de coleta, os dados envolvidos e a base legal (art. 7.º da LGPD):</p>
        <div class="pp-table-wrap">
          <table class="pp-table">
            <thead>
              <tr>
                <th>Onde</th>
                <th>Dados coletados</th>
                <th>Finalidade</th>
                <th>Base legal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Simulação de financiamento</strong></td>
                <td>Nome, CPF, telefone, data de nascimento, CNH (sim/não), entrada (sim/não), renda mensal, moto de interesse</td>
                <td>Atendimento comercial e inicio da simulação junto a instituições parceiras</td>
                <td>Procedimentos preliminares a contrato (art. 7.º, V) e consentimento (art. 7.º, I)</td>
              </tr>
              <tr>
                <td><strong>Cadastro de financiamento</strong></td>
                <td>Nome, CPF, RG, nome da mãe, CEP, número da residência, profissão, empresa, data de admissão, e-mail</td>
                <td>Formalizar o cadastro para análise de crédito pela instituição financeira escolhida</td>
                <td>Procedimentos preliminares a contrato (art. 7.º, V) e consentimento (art. 7.º, I)</td>
              </tr>
              <tr>
                <td><strong>Contato via WhatsApp</strong></td>
                <td>Telefone e conteúdo da conversa iniciada pelo usuário</td>
                <td>Atendimento, dúvidas, negociação e suporte</td>
                <td>Legitimo interesse (art. 7.º, IX) e consentimento implicito (art. 7.º, I)</td>
              </tr>
              <tr>
                <td><strong>Navegacao no site</strong></td>
                <td>Endereço IP, páginas visitadas, data e hora do acesso</td>
                <td>Segurança do site, prevenção de abuso e rate limit em formulários públicos</td>
                <td>Legitimo interesse (art. 7.º, IX)</td>
              </tr>
              <tr>
                <td><strong>Cookies de analytics</strong></td>
                <td>Dados de navegação via Google Analytics 4 e Microsoft Clarity, apenas com consentimento expresso</td>
                <td>Análise de tráfego e melhoria do site</td>
                <td>Consentimento expresso (art. 7.º, I)</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="pp-note">
          <strong>Sobre o CPF:</strong> usamos o CPF informado para tentar localizar seu histórico de atendimento (simulação e cadastro) e evitar que você repita dados já enviados. É armazenado apenas como dígitos, sem máscara, e nunca exibido em páginas públicas ou logs de acesso.
        </div>
        <div class="pp-note">
          <strong>Dados que não coletamos pelo site:</strong> foto de CNH, selfie com documento, comprovante de renda escaneado, extrato bancário ou certidões. Se necessários para formalização, são solicitados diretamente por nossa equipe ou pela instituição financeira, em etapa posterior.
        </div>
      </section>

      <!-- 3 -->
      <section class="pp-section" id="s3" aria-labelledby="s3-title">
        <p class="pp-section__num">03</p>
        <h2 id="s3-title">Cookies e tecnologias de rastreamento</h2>
        <div class="pp-table-wrap">
          <table class="pp-table">
            <thead>
              <tr>
                <th>Cookie</th>
                <th>Tipo</th>
                <th>Finalidade</th>
                <th>Duração</th>
                <th>Pode recusar?</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><code>stmotors_consent</code></td>
                <td>Essencial</td>
                <td>Guarda a escolha do usuário no banner de cookies</td>
                <td>1 ano</td>
                <td>Não</td>
              </tr>
              <tr>
                <td><code>PHPSESSID</code></td>
                <td>Sessão (admin)</td>
                <td>Sessão PHP da área administrativa restrita. Não é criado para visitantes públicos</td>
                <td>Sessao</td>
                <td>N/A</td>
              </tr>
              <tr>
                <td><code>_ga</code>, <code>_ga_*</code></td>
                <td>Analytics (Google)</td>
                <td>Medição de tráfego com IP anonimizado e armazenamento de anúncios desativado</td>
                <td>Ate 2 anos</td>
                <td>Sim</td>
              </tr>
              <tr>
                <td><code>_clck</code>, <code>_clsk</code>, <code>CLID</code></td>
                <td>Analytics (Microsoft)</td>
                <td>Gravação anônima de sessões e mapas de calor para usabilidade</td>
                <td>Ate 1 ano</td>
                <td>Sim</td>
              </tr>
              <tr>
                <td>Google Maps</td>
                <td>Funcional (terceiro)</td>
                <td>Mapa interativo com a localização da loja. O Google pode definir seus próprios cookies no iframe</td>
                <td>Conforme Google</td>
                <td>Parcialmente</td>
              </tr>
            </tbody>
          </table>
        </div>
        <p>Para gerenciar ou revogar seu consentimento de cookies, utilize o botão de preferências no rodapé do site ou apague os cookies nas configurações do seu navegador.</p>
      </section>

      <!-- 4 -->
      <section class="pp-section" id="s4" aria-labelledby="s4-title">
        <p class="pp-section__num">04</p>
        <h2 id="s4-title">Como usamos seus dados</h2>
        <p>Os dados que você nos fornece são usados exclusivamente para:</p>
        <ul>
          <li>Entrar em contato para apresentar propostas relacionadas ao financiamento que você iniciou</li>
          <li>Encaminhar seu cadastro à instituição financeira parceira para análise de crédito, quando você autorizar o avanço</li>
          <li>Tentar localizar, pelo CPF informado, simulações e cadastros anteriores do mesmo titular, facilitando o atendimento sem repetir dados</li>
          <li>Proteger o site contra abuso de formulários via rate limit por IP</li>
          <li>Cumprir obrigações legais ou atender ordens de autoridades competentes</li>
        </ul>
        <p>Não realizamos venda, aluguel ou cessão de dados para fins de marketing; não criamos perfis comportamentais para publicidade; e não tomamos decisões automatizadas com efeitos jurídicos sobre o titular.</p>
      </section>

      <!-- 5 -->
      <section class="pp-section" id="s5" aria-labelledby="s5-title">
        <p class="pp-section__num">05</p>
        <h2 id="s5-title">Com quem compartilhamos</h2>
        <ul>
          <li><strong>Instituições financeiras parceiras</strong>: somente quando você avança com uma proposta, e apenas os dados necessários para análise de crédito. Essas instituições são controladoras independentes sujeitas à própria política e à LGPD.</li>
          <li><strong>Hostinger</strong> (hospedagem): opera a infraestrutura do site e banco de dados como operadora, sem acesso ao conteúdo dos dados para fins próprios.</li>
          <li><strong>Google LLC</strong>: somente se o usuario consentir com cookies de analytics (Google Analytics 4).</li>
          <li><strong>Microsoft Corporation</strong>: somente se o usuario consentir com cookies de analytics (Microsoft Clarity).</li>
          <li><strong>Autoridades públicas</strong>: quando obrigados por lei, regulamento ou decisão judicial, limitado ao mínimo necessário.</li>
        </ul>
        <p>Os serviços de analytics (Google e Microsoft) operam servidores internacionais. Ambos possuem mecanismos de transferência compatíveis com a LGPD e o GDPR europeu, conforme art. 33 da LGPD.</p>
      </section>

      <!-- 6 -->
      <section class="pp-section" id="s6" aria-labelledby="s6-title">
        <p class="pp-section__num">06</p>
        <h2 id="s6-title">Por quanto tempo guardamos seus dados</h2>
        <div class="pp-table-wrap">
          <table class="pp-table">
            <thead>
              <tr><th>Dado</th><th>Prazo</th><th>Justificativa</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>Simulações de financiamento (CPF, telefone, renda, moto)</td>
                <td>Até 2 anos após o último contato</td>
                <td>Ciclo médio de decisão de compra de veículo; legítimo interesse comercial</td>
              </tr>
              <tr>
                <td>Cadastro completo (CPF, RG, dados profissionais, e-mail)</td>
                <td>Até 5 anos após o cadastro</td>
                <td>Prazo compatível com ciclo de financiamento e eventual disputa contratual (art. 206 CC)</td>
              </tr>
              <tr>
                <td>IP de origem (rate limit)</td>
                <td>90 dias</td>
                <td>Segurança e prevenção de abusos</td>
              </tr>
              <tr>
                <td>Cookie de consentimento</td>
                <td>1 ano</td>
                <td>Evitar exibição repetida do banner</td>
              </tr>
            </tbody>
          </table>
        </div>
        <p>Após o prazo aplicável, os dados são excluídos ou anonimizados de forma irreversível, salvo obrigação legal de guarda adicional. A anonimização do IP de origem e a exclusão dos registros vencidos são executadas automaticamente por rotina diária no servidor.</p>
      </section>

      <!-- 7 -->
      <section class="pp-section" id="s7" aria-labelledby="s7-title">
        <p class="pp-section__num">07</p>
        <h2 id="s7-title">Segurança dos dados</h2>
        <p>Adotamos medidas técnicas e organizacionais para proteger seus dados contra acesso não autorizado, alteração ou destruição. Entre elas:</p>
        <ul>
          <li>Comunicação criptografada entre seu navegador e nosso servidor (HTTPS)</li>
          <li>Controle de acesso restrito à área administrativa, com autenticação e proteção de sessão</li>
          <li>Limitação de tentativas nos formulários públicos, para prevenir abuso e automação indevida</li>
          <li>Armazenamento de dados sensíveis sem exposição em páginas públicas ou registros de acesso</li>
          <li>Restrição de acesso a arquivos internos do servidor e desativação da listagem de diretórios</li>
          <li>Revisão periódica das medidas de segurança conforme evolução de boas práticas do setor</li>
        </ul>
        <p>Por motivos de segurança, não detalhamos publicamente a arquitetura técnica específica dessas proteções.</p>
        <p>Em caso de incidente que possa acarretar risco relevante aos titulares, comunicaremos a ANPD e os afetados nos prazos previstos pela LGPD.</p>
      </section>

      <!-- 8 -->
      <section class="pp-section" id="s8" aria-labelledby="s8-title">
        <p class="pp-section__num">08</p>
        <h2 id="s8-title">Seus direitos como titular (art. 18 da LGPD)</h2>
        <p>Você pode exercer os seguintes direitos a qualquer momento:</p>
        <ul>
          <li><strong>Confirmação e acesso</strong>: saber se tratamos seus dados e obter uma cópia</li>
          <li><strong>Correção</strong>: atualizar dados incompletos, inexatos ou desatualizados</li>
          <li><strong>Eliminação</strong>: solicitar a exclusão dos dados tratados com base no consentimento, ressalvadas hipóteses de guarda obrigatória por lei</li>
          <li><strong>Portabilidade</strong>: receber seus dados em formato estruturado e interoperável</li>
          <li><strong>Revogação do consentimento</strong>: retirar o consentimento a qualquer momento, sem prejuízo da licitude do tratamento anterior</li>
          <li><strong>Oposição</strong>: opor-se a tratamento realizado com base em legítimo interesse quando entender que viola seus direitos</li>
          <li><strong>Reclamação à ANPD</strong>: registrar reclamação perante a Autoridade Nacional de Proteção de Dados em <a href="https://www.gov.br/anpd" target="_blank" rel="noopener noreferrer">www.gov.br/anpd</a></li>
        </ul>
        <div class="pp-note">
          Respondemos em até <strong>15 dias úteis</strong>. Em casos complexos, informaremos sobre prazo adicional. Para solicitações de exclusão ou portabilidade, podemos solicitar dados adicionais para confirmar sua identidade antes de atender o pedido.
        </div>
      </section>

      <!-- 9 -->
      <section class="pp-section" id="s9" aria-labelledby="s9-title">
        <p class="pp-section__num">09</p>
        <h2 id="s9-title">Canal de contato para privacidade</h2>
        <p>Para exercer seus direitos, tirar dúvidas ou reportar preocupações sobre o tratamento de dados:</p>
        <div class="pp-contact">
          <p>
            <strong>ST Motors Araraquara</strong><br>
            CNPJ: 55.032.769/0001-83<br>
            R. Mauricio Galli, 47 &mdash; Araraquara/SP<br>
            Telefone: (16) 3014-7386<br>
            Instagram: <a href="https://www.instagram.com/stmotors_ara/" target="_blank" rel="noopener noreferrer">@stmotors_ara</a>
          </p>
        </div>
        <p style="margin-top:14px;">Ao entrar em contato, informe: qual direito deseja exercer e o contexto envolvido. Podemos solicitar informações adicionais para confirmar que você é o titular dos dados antes de localizar ou alterar qualquer registro.</p>
      </section>

      <!-- 10 -->
      <section class="pp-section" id="s10" aria-labelledby="s10-title">
        <p class="pp-section__num">10</p>
        <h2 id="s10-title">Links e serviços de terceiros</h2>
        <p>Este site contém links e integrações com WhatsApp, Instagram, Facebook, Google Maps e ANPD. Ao acessar esses serviços, você estará sujeito às políticas de privacidade de cada um deles, que são independentes desta. A ST Motors não é responsável pelas práticas de privacidade de terceiros.</p>
      </section>

      <!-- 11 -->
      <section class="pp-section" id="s11" aria-labelledby="s11-title">
        <p class="pp-section__num">11</p>
        <h2 id="s11-title">Crianças e adolescentes</h2>
        <p>Este site e seus formulários destinam-se a maiores de 18 anos, o que é verificado no preenchimento da data de nascimento. Não coletamos intencionalmente dados de crianças ou adolescentes. Se identificarmos que dados de um menor foram coletados sem o consentimento dos responsáveis legais, os excluiremos imediatamente.</p>
      </section>

      <!-- 12 -->
      <section class="pp-section" id="s12" aria-labelledby="s12-title">
        <p class="pp-section__num">12</p>
        <h2 id="s12-title">Alterações desta política</h2>
        <p>Esta política pode ser atualizada para refletir mudanças em nossas práticas ou na legislação aplicável. A data da última atualização está sempre no topo da página. O uso continuado do site após a publicação de uma versão atualizada implica ciência e aceitação das novas condições.</p>
      </section>

    </main>
  </div>

</div><!-- /.pp-page -->

<?php include __DIR__ . '/../includes/footer.php'; ?>

<script>
  // Marca o link ativo na nav lateral conforme o scroll
  (function () {
    var links = document.querySelectorAll('.pp-nav__link');
    var sections = Array.from(links).map(function (l) {
      return document.querySelector(l.getAttribute('href'));
    });

    function onScroll() {
      var scrollY = window.scrollY + 120;
      var current = sections[0];
      sections.forEach(function (s) {
        if (s && s.offsetTop <= scrollY) current = s;
      });
      links.forEach(function (l) {
        l.classList.toggle('active', l.getAttribute('href') === '#' + (current && current.id));
      });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  })();
</script>

</body>
</html>