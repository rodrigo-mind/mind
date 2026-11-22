---
titulo: "Use line-height sem unidade"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 2, seção 2.5 (PDF p. 85-87; impressa 55-57)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use line-height sem unidade

## Regra

Declare `line-height` como número puro (`1.2`), não com unidade (`1.2em`, `19px`).

## Por quê

Com unidade, o valor é calculado no elemento onde foi declarado e **esse valor calculado** é herdado pelos filhos; se um filho tem fonte maior, as linhas se sobrepõem. Com número puro, é o valor declarado que se herda, e cada descendente recalcula com a sua fonte, então se pode definir no `body` e esquecer. A exceção (`line-height` aceitar os dois) é uma peculiaridade, e o mesmo vale para `z-index` e `font-weight` serem sem unidade.

## Quando não vale

Quando de fato se quer uma altura de linha fixa, igual para todos os descendentes.

## Como verificar

Procure `line-height` com `px`, `em` ou `rem` em containers que têm filhos com outros tamanhos de fonte.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[heranca-no-css]] — a regra decorre de como o valor computado é herdado
- [[css-modular-modulos-variantes-e-bem]] — o tamanho da fonte do módulo escala o espaçamento em em
- [[espacamento-preciso-ao-implementar-um-design]] — o line-height entra na altura do conteúdo
- [[espacamento-de-texto-line-height-letter-spacing-e-text-transform]] — a entrelinha sem unidade
