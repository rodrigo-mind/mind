---
titulo: "Limite o aninhamento a três níveis e declare as propriedades primeiro"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 8, seções 8.4 e 8.4.3 (PDF p. 262-267; impressa 232-237)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Limite o aninhamento a três níveis e declare as propriedades primeiro

## Regra

Em CSS aninhado, não passe de cerca de três níveis de profundidade e escreva sempre as declarações não aninhadas **antes** dos blocos aninhados.

## Por quê

- Cada nível alonga o seletor final e **aumenta a especificidade** sem necessidade; passando de três níveis, é hora de reorganizar o código.
- O navegador trata as declarações escritas depois de um bloco aninhado como se viessem antes dele para efeito da cascata; um `font-size` colocado depois de uma `@media` aninhada não vence a declaração da própria `@media`, ao contrário do que parece. Escrevendo as declarações primeiro, a ordem visível coincide com a real.
- Navegadores que não entendem o aninhamento ainda interpretam as declarações do bloco externo, o que dá uma degradação melhor.

## Quando não vale

Não há exceção declarada; o limite de três níveis é uma regra prática do autor.

## Como verificar

Procure blocos aninhados com mais de três níveis e declarações soltas depois de blocos aninhados.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[aninhamento-de-css]] — a regra limita o uso do aninhamento
- [[regra-mantenha-a-especificidade-baixa]] — o aninhamento profundo eleva a especificidade
