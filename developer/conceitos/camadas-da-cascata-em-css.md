---
titulo: "Camadas da cascata (cascade layers) em CSS"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 8, seção 8.1 (PDF p. 241-251; impressa 211-221)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Camadas da cascata (cascade layers) em CSS

## Definição

As camadas são um novo critério da cascata: dividem os estilos em grupos com **prioridade definida**, de modo que todos os estilos de uma camada superior vencem os de uma camada inferior, **independentemente da especificidade** dos seletores. Na ordem de decisão, as camadas vêm depois da origem e dos estilos em linha, e antes da especificidade; dentro de uma camada, valem as regras normais de especificidade e ordem.

- **Sintaxe:** `@layer nome { ... }`. A prioridade é a ordem da **primeira aparição** do nome na folha: mencionar a camada de novo, para acrescentar estilos, não muda a prioridade. O melhor é declarar todas no início, separadas por vírgula: `@layer reset, global, theme, modules;`.
- **Estilos fora de camadas vencem os de camadas** (são tratados como a camada de maior prioridade); por isso, convém colocar tudo em camadas (o estilo sem camada serve para depurar e prototipar).
- **Camadas anônimas** (sem nome) existem, mas o autor as evita, porque o nome permite reabrir a camada e documenta a intenção.
- **`!important` inverte** a ordem das camadas (como já ocorre com as origens): o importante de uma camada inferior vence o das superiores. Útil, por exemplo, para a regra `prefers-reduced-motion` na camada `reset`.
- **Camadas aninhadas:** uma camada dentro de outra (também com ponto: `@layer modules.layout`); o que está na camada-mãe e fora das filhas vence as filhas.
- **`@import`:** `@import "x.css" layer(nome)` põe a folha externa em uma camada (o `<link>` do HTML não tem equivalente); as camadas da folha importada ficam aninhadas.
- **`revert-layer`:** desfaz os valores da camada atual e volta aos da camada anterior; `all` reverte todas as propriedades de uma vez (aceita só `initial`, `inherit`, `unset`, `revert` e `revert-layer`).
- **Suporte:** todos os navegadores principais desde o início de 2022; um navegador que não entende ignora **todas** as regras dentro da camada, sem degradação gradual: confira os dados atuais antes de adotar.

## Por que importa

Resolve o problema de um seletor de baixa especificidade que deveria vencer outro (por exemplo, um botão que é um link) sem artifícios de especificidade, e dispensa o `!important` em utilitários.

## Como se relaciona

Vem depois da cascata do CSS e da especificidade de seletores; a organização recomendada está em organização em seis camadas de CSS.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[is-e-where-em-seletores-css]] — «Os pseudoclasses :is» cita esta nota ao explicar suas relações
- [[cascata-do-css]] — esta nota cita a ideia de «A cascata do CSS» na seção sobre como se relaciona
- [[especificidade-de-seletores]] — as camadas vêm antes da especificidade
- [[regra-mantenha-a-especificidade-baixa]] — as camadas reduzem a necessidade de truques de especificidade
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — o framework propõe as seis camadas
- [[aninhamento-de-css]] — at-rules como @layer podem ser aninhadas
- [[escopo-em-css-com-scope]] — «Escopo em CSS com @scope» cita esta nota ao explicar suas relações
