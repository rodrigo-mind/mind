---
titulo: "Evite números mágicos no CSS"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seção 3.2.1 (PDF p. 102-103; impressa 72-73)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Evite números mágicos no CSS

## Regra

Não acerte um layout ajustando valores até "dar certo" (como trocar 70% por 66%); entenda de onde o valor vem, ou deixe o navegador calcular com `calc()`.

## Por quê

Um número mágico funciona em um tamanho de viewport e falha em outros, e ninguém sabe explicar por que funciona. O autor reserva tentativa e erro para escolhas estilísticas, e não para forçar o encaixe. No exemplo do livro, o título estava 3 em largo demais por causa do padding, e `calc(var(--largura) - 3em)` resolve exatamente; ainda melhor é consertar a causa (o modelo de caixa).

## Quando não vale

Em decisões de estilo (cores, espaçamentos visuais), a experimentação é legítima.

## Como verificar

Procure valores com casas decimais estranhas, como `66.6%` ou `margin-left: 37px`, sem relação com outras medidas; troque por relação explícita (`calc`, variáveis).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-use-border-box-em-todos-os-elementos]] — o border-box elimina a conta que levava ao número mágico
- [[propriedades-personalizadas-do-css]] — calc com variáveis substitui o número mágico
- [[regra-nao-repita-valores-use-constantes-nomeadas]] — a mesma ideia aplicada ao CSS
- [[precedencia-associatividade-e-ordem-de-avaliacao-em-javascript]] — a mesma preferência por expressões explícitas e legíveis
