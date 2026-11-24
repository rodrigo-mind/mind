// ============================================================
// RASTREAMENTO COM CONSENTIMENTO (LGPD)
// Clarity + Google Analytics 4 — só carregam APÓS o usuário
// aceitar cookies de analytics no banner. Sem consentimento,
// nenhum cookie de rastreamento é criado.
// ============================================================
(function () {
  'use strict';

  var CLARITY_ID = 'xa5b59ihze';
  var GA4_ID     = 'G-DHGYXPDCM4';

  var loaded = false; // evita carregar duas vezes na mesma página

  // Lê o mesmo cookie de consentimento gravado pelo header.js
  function analyticsConsentGranted() {
    var match = document.cookie.match('(?:^|; )stmotors_consent=([^;]*)');
    if (!match) return false;
    try {
      var data = JSON.parse(decodeURIComponent(match[1]));
      return data && data.analytics === true;
    } catch (e) {
      return false;
    }
  }

  function loadClarity() {
    (function (c, l, a, r, i, t, y) {
      c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments); };
      t = l.createElement(r); t.async = 1; t.src = 'https://www.clarity.ms/tag/' + i;
      y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
    })(window, document, 'clarity', 'script', CLARITY_ID);
  }

  function loadGA4() {
    var s = document.createElement('script');
    s.async = true;
    s.src = 'https://www.googletagmanager.com/gtag/js?id=' + GA4_ID;
    document.head.appendChild(s);

    window.dataLayer = window.dataLayer || [];
    function gtag() { window.dataLayer.push(arguments); }
    window.gtag = gtag;
    gtag('js', new Date());
    // Consent Mode v2: o usuário já aceitou analytics neste ponto
    gtag('consent', 'default', {
      ad_storage: 'denied',
      ad_user_data: 'denied',
      ad_personalization: 'denied',
      analytics_storage: 'granted'
    });
    gtag('config', GA4_ID, { anonymize_ip: true });
  }

  // Carrega os trackers (uma vez)
  function enableTracking() {
    if (loaded) return;
    loaded = true;
    loadClarity();
    loadGA4();
  }

  // 1) Em carregamentos futuros: se o consentimento já foi dado antes, ativa direto.
  if (analyticsConsentGranted()) {
    enableTracking();
  }

  // 2) No momento do clique em "Aceitar todos": o header.js dispara este evento.
  window.addEventListener('stmotors:consent-analytics', enableTracking);
})();
