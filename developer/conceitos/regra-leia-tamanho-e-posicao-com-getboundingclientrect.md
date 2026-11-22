---
titulo: "Leia tamanho e posição com getBoundingClientRect"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seções 15.4.3 e 15.5.2 (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Leia tamanho e posição com getBoundingClientRect

## Regra

Para saber o tamanho e a posição de um elemento, use `getBoundingClientRect()` (ou as propriedades `offset*` e `client*`); não consulte `top`, `left`, `width` do estilo computado.

## Por quê

O estilo computado devolve o valor declarado em CSS, que costuma ser `auto` para elementos não posicionados, e em texto com `px`; `getBoundingClientRect()` devolve números reais, em coordenadas de viewport, com borda e padding. O próprio livro diz que o estilo computado não é a forma preferida de obter posição e tamanho.

## Quando não vale

Para ler o valor de uma propriedade em si (a cor, a família de fonte) o estilo computado é o certo.

## Como verificar

Procure `getComputedStyle(...).top`, `.left` ou `.width` usados como medida e troque pelo retângulo.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[controlar-css-por-javascript]] — a regra dá a alternativa ao estilo computado para medidas
- [[geometria-e-rolagem-do-documento]] — a regra resume qual API usar para medir
