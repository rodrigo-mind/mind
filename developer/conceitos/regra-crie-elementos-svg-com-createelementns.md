---
titulo: "Crie elementos SVG com createElementNS"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.7.3 (PDF p. 498-499)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Crie elementos SVG com createElementNS

## Regra

Ao criar elementos SVG por JavaScript, use `document.createElementNS("http://www.w3.org/2000/svg", "circle")`, e não `document.createElement("circle")`.

## Por quê

Mesmo dentro de um documento HTML, as tags SVG são tecnicamente XML. O `createElement()` comum cria elementos HTML, e um `<circle>` criado assim não é desenhado. `createElementNS()` recebe o namespace XML como primeiro argumento, e o do SVG é a string `http://www.w3.org/2000/svg`.

## Quando não vale

- Quando o SVG é escrito direto no HTML: o analisador do navegador dispensa o namespace.
- Quando o SVG entra por `innerHTML` de um elemento já dentro de um `<svg>` (inferência minha, fora do livro).

## Como verificar

Procure `createElement(` com nomes de tags SVG (`svg`, `circle`, `path`, `line`, `rect`, `g`, `text`) nos `.js`. Cada ocorrência deve ser `createElementNS` com o namespace do SVG.

## Notas do Claude

Guarde o namespace numa constante (`const SVG_NS = "http://www.w3.org/2000/svg";`) para não errar a string.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[criar-inserir-e-remover-nos-do-dom]] — createElement é o método comum, que não serve para SVG
- [[desenhar-graficos-com-canvas]] — é a alternativa quando o desenho é feito por métodos e não por elementos
- [[svg-no-html-e-por-javascript]] — para criar SVG por JavaScript, vale a regra do namespace
