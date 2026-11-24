// Service Worker — ST Motors Links Rápidos
// Estratégia: stale-while-revalidate (serve do cache instantaneamente,
// atualiza em segundo plano). Mantém a página funcionando offline ou
// com conexão ruim, sem prejudicar quem tem internet normal.

const CACHE_NAME = 'stmotors-links-v1';
const APP_SHELL = [
    './',
    './index.html',
    './manifest.json',
    '../favicon.svg',
    '../favicon.ico'
];

self.addEventListener('install', function (event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function (cache) { return cache.addAll(APP_SHELL); })
            .catch(function () { /* algum asset pode não existir; ignora */ })
    );
    self.skipWaiting();
});

self.addEventListener('activate', function (event) {
    event.waitUntil(
        caches.keys().then(function (keys) {
            return Promise.all(
                keys.filter(function (key) { return key !== CACHE_NAME; })
                    .map(function (key) { return caches.delete(key); })
            );
        })
    );
    self.clients.claim();
});

self.addEventListener('fetch', function (event) {
    if (event.request.method !== 'GET') return;
    // Não intercepta chamadas para outros domínios (WhatsApp, Maps, redes sociais etc.)
    if (!event.request.url.startsWith(self.location.origin)) return;

    event.respondWith(
        caches.match(event.request).then(function (cached) {
            const network = fetch(event.request)
                .then(function (response) {
                    if (response && response.status === 200) {
                        const clone = response.clone();
                        caches.open(CACHE_NAME).then(function (cache) {
                            cache.put(event.request, clone);
                        });
                    }
                    return response;
                })
                .catch(function () { return cached; });

            return cached || network;
        })
    );
});