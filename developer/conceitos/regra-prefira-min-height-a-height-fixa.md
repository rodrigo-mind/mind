---
titulo: "Prefira min-height a height fixa"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seção 3.3.3 (PDF p. 107-108; impressa 77-78)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Prefira min-height a height fixa

## Regra

Quando sentir vontade de fixar a altura de um contêiner, use `min-height`.

## Por quê

A altura fixa transborda se o conteúdo crescer (texto traduzido, fonte maior, tela estreita); `min-height` garante um mínimo e deixa o elemento crescer, evitando problemas de overflow depois. O autor diz que, na maioria das vezes em que quis definir a altura, usou `min-height`.

## Quando não vale

Quando a altura realmente é um valor de projeto (um ícone, uma barra) e o conteúdo é controlado.

## Como verificar

Procure `height:` em contêineres com texto; troque por `min-height` e teste com mais conteúdo e em tela estreita.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[altura-de-elementos-e-overflow]] — a regra resume a recomendação do capítulo
