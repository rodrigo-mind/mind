---
titulo: "APIs do navegador para conhecer (lista do fim do capítulo 15)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.15 (PDF p. 586-593)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# APIs do navegador para conhecer

## Definição

Lista do fim do capítulo 15, com recursos que o livro só cita, para saber que existem:

- **HTML e CSS primeiro:** dominar formulários, flexbox e grid, acessibilidade (ARIA) e internacionalização (inclusive escrita da direita para a esquerda) rende mais que novas APIs de JavaScript.
- **Desempenho:** `performance.now()` (relógio de alta resolução), `performance.mark()` e `performance.measure()` para medir trechos do código, e `PerformanceObserver`.
- **Segurança:** além de XSS, estudar o cabeçalho `Content-Security-Policy` (CSP) e o CORS.
- **Janela e documento:**
  - `alert()`, `confirm()` e `prompt()` bloqueiam a página e servem só para protótipos;
  - `requestFullscreen()`;
  - `requestAnimationFrame()` para animações suaves;
  - `getSelection()` e `navigator.clipboard` (área de transferência);
  - `contenteditable`;
  - `MutationObserver` (vigiar mudanças no DOM);
  - `IntersectionObserver` (saber o que está na tela, para carregar conteúdo ao rolar).
- **Eventos:** `online` e `offline`, `visibilitychange`, arrastar e soltar (inclusive arquivos da área de trabalho), Pointer Lock e Gamepad.
- **Aplicações progressivas (PWA):** service workers (interceptam a rede e guardam respostas para uso offline), a API Cache, o manifesto (`<link rel="manifest">`, para instalar o site como ícone), notificações e push. Quase todas exigem HTTPS.
- **Dispositivos móveis:** geolocalização (`navigator.geolocation`), vibração (não funciona no iOS), orientação de tela e eventos `devicemotion` e `deviceorientation`.
- **Binário:** `File` e `Blob` (de um `<input type="file">` ou de arrastar), `FileReader` ou os métodos `text()` e `arrayBuffer()` do `Blob`, e `TextEncoder`/`TextDecoder`.
- **Mídia:** `getUserMedia()` (câmera e microfone), `MediaRecorder` e WebRTC.
- **Criptografia e login:** `crypto.getRandomValues()` (números aleatórios seguros) e `crypto.subtle` (só em HTTPS; o autor avisa que é fácil usar errado), Credential Management e Web Authentication (login sem senha) e Payment Request.

## Por que importa

Serve de índice: antes de procurar uma biblioteca, veja se o navegador já tem a API.

## Como se relaciona

As APIs detalhadas no capítulo têm notas próprias: eventos no navegador, armazenamento no navegador, workers, usar a API fetch, desenhar gráficos com canvas e SVG no HTML e por JavaScript.

## Notas do Claude

- A lista é de 2020. Antes de usar qualquer item, confira o suporte atual nos navegadores (inferência minha).
- Para os sites do projeto, os mais úteis parecem ser `IntersectionObserver` (carregar imagens ao rolar), `File`/`FileReader` (prévia de upload) e o estudo de CSP (avaliação minha).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[armazenamento-no-navegador]] — o armazenamento é uma das APIs detalhadas em nota própria
- [[workers-threads-no-navegador]] — os workers aparecem na lista e têm nota própria
- [[usar-a-api-fetch]] — o fetch é uma das APIs da lista com nota detalhada
- [[diferencas-entre-navegadores-e-deteccao-de-recursos]] — a lista serve de ponto de partida para decidir se um recurso é seguro de usar
- [[modelo-de-seguranca-da-web-no-navegador]] — a lista recomenda estudar CSP e CORS, tratados no modelo de segurança
- [[desenhar-graficos-com-canvas]] — a lista cita o canvas e `requestAnimationFrame` para animação
- [[aplicacoes-offline-appcache-e-service-workers]] — a lista cita os service workers e o manifesto, detalhados na nota de aplicações offline
- [[geolocalizacao-no-navegador]] — a lista cita a geolocalização, detalhada em nota própria
