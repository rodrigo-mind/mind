---
titulo: "Herança no CSS (inheritance) e valores especiais"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 1, seções 1.2 e 1.3 (p. 19-22, numeração impressa)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Herança no CSS

## Definição

Se um elemento não tem valor em cascata para uma propriedade, ele pode herdar o valor do elemento pai. Só algumas propriedades são herdadas por padrão, em geral as relacionadas a texto: `color`, `font`, `font-family`, `font-size`, `font-weight`, `font-style`, `line-height`, `letter-spacing`, `text-align`, `text-indent`, `text-transform`, `white-space`, `word-spacing`, as de lista (`list-style`) e as `border-collapse` e `border-spacing` de tabelas. Margens, bordas e preenchimento não são herdados (uma `div` não passaria a borda a todos os descendentes).

Uso prático: aplicar `font-family` ao `body` e deixar os descendentes herdarem, até que um valor em cascata o substitua.

## Por que importa

A herança e a cascata costumam ser confundidas. A cascata resolve conflitos entre declarações; a herança só entra quando não há declaração. As ferramentas do navegador (DevTools) mostram os valores herdados e de onde vêm.

## Valores especiais

Palavras-chave que se aplicam a qualquer propriedade: `inherit` (força a herança do pai), `initial`, `unset` e `revert`. O livro começa a explicar `inherit`; as outras não foram lidas por inteiro.

## Como se relaciona

Complementa a cascata do CSS.

## Notas do Claude

Confiança média: li as definições e o início dos valores especiais; `initial`, `unset` e `revert` não foram lidos por inteiro.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[cascata-do-css]] — esta nota cita a ideia de «A cascata do CSS» na seção sobre como se relaciona
- [[escolher-o-elemento-html-de-texto-pelo-significado]] — a aparência padrão dos elementos é alterada por CSS
- [[unidades-relativas-em-css]] — o em de font-size depende do tamanho herdado
- [[regra-use-line-height-sem-unidade]] — a regra decorre de como o valor computado é herdado
- [[propriedades-personalizadas-do-css]] — as variáveis são herdadas pelos descendentes
