---
titulo: "Geometria e rolagem do documento"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.5 (PDF p. 427-594, capítulo 15)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Geometria e rolagem do documento

## Definição

- **Coordenadas:** posições em pixels CSS, com x para a direita e y para baixo, relativas ao canto do **documento** ou do **viewport**. Como elementos podem ter rolagem própria, as coordenadas de documento não descrevem bem a web; o JavaScript do cliente usa as de viewport (como `clientX` e `clientY` dos eventos e `position: fixed`). Um elemento com `position: absolute` usa o ancestral posicionado mais próximo como referência.
- **Pixel CSS:** pode ser vários pixels físicos; `window.devicePixelRatio` informa quantos (pode ser fracionário), então as coordenadas não precisam ser inteiras.
- **Medir um elemento:** `getBoundingClientRect()` devolve `left`, `top`, `right`, `bottom`, `width`, `height` em coordenadas de viewport, com borda e padding e sem margem; elementos inline que quebram a linha têm vários retângulos (`getClientRects()`).
- **Elemento num ponto:** `document.elementFromPoint(x, y)` devolve o elemento mais interno e mais alto na pilha naquele ponto (coordenadas de viewport).
- **Rolar:** `window.scrollTo(x, y)` (coordenadas de documento) e `scrollBy` (relativo); com um objeto `{ left, top, behavior: "smooth" }` a rolagem é suave. `elemento.scrollIntoView()` torna o elemento visível (`block` e `inline` com `start`, `end`, `nearest`, `center`).
- **Tamanhos:** viewport em `window.innerWidth` e `innerHeight`; posição de rolagem em `scrollX` e `scrollY` (somente leitura). Por elemento: `offsetWidth` e `offsetHeight` (com borda e padding), `clientWidth` e `clientHeight` (sem borda), `scrollWidth` e `scrollHeight` (incluindo o conteúdo que vaza), e `scrollLeft` e `scrollTop` (graváveis, para rolar o conteúdo).

## Por que importa

Posicionar dicas e menus ao lado de elementos e detectar o que está visível exigem essas medidas.

## Como se relaciona

Ver controlar CSS por JavaScript (o estilo computado não é a melhor fonte de tamanho e posição) e modelo de caixa do CSS.

## Notas do Claude

Confiança média: o final da seção (`scrollTo` de elementos e rolagem em elementos) ficou truncado na extração.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-leia-tamanho-e-posicao-com-getboundingclientrect]] — a regra resume qual API usar para medir
- [[modelo-de-caixa-do-css]] — offset, client e scroll medem partes da caixa
- [[altura-de-elementos-e-overflow]] — scrollHeight e scrollTop tratam do conteúdo que transborda
- [[unidades-de-viewport-em-css]] — o viewport é a base das medidas em coordenadas de viewport
- [[tipos-de-posicionamento-em-css]] — absolute usa o bloco contêiner e as coordenadas de viewport
