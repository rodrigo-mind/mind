---
titulo: "Especificidade de seletores no CSS"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 1, seção 1.1.3 (p. 12-15, numeração impressa)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Especificidade de seletores no CSS

## Definição

Quando a origem e os estilos em linha não resolvem um conflito, o navegador compara a especificidade dos seletores. Regras:

- Vence o seletor com mais IDs.
- Em caso de empate, o que tem mais classes.
- Em novo empate, o que tem mais nomes de tag (elementos).

Pseudoclasses (`:hover`) e seletores de atributo valem como uma classe. O seletor universal (`*`) e os combinadores (`>`, `+`, `~`) não contam.

A notação é por três números, ID, classe e tag, como `1,0,1` para `#main-nav a`. Compara-se da esquerda para a direita: `1,0,0` vence `0,10,0`. Com estilos em linha, às vezes se usa quatro números (`1,0,0,0`).

## Por que importa

Um `ID` tem especificidade maior do que qualquer número de classes, e isso gera uma "corrida armamentista": para sobrepor uma regra com ID, só outro ID ou `!important`. O livro mostra um caso: um link com `.featured` não ficou laranja porque `#main-nav a` (1,0,1) vencia `.featured` (0,1,0).

Opções de correção que o livro compara:

1. `!important`: fácil, mas ingênuo; com vários `!important` volta-se ao mesmo problema.
2. Subir a especificidade do seletor desejado (`#main-nav .featured`, 1,1,0).
3. **Baixar** a especificidade da regra concorrente (trocar `#main-nav` por `.nav`), a preferida do autor para o caso.
4. Igualar as especificidades e deixar a ordem decidir (`a.featured`), ao custo de efeitos colaterais fora do contexto.

## Como se relaciona

É o quarto critério da cascata do CSS. A regra de manter a especificidade baixa dá a orientação de uso.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[cascata-do-css]] — esta nota cita a ideia de «A cascata do CSS» na seção sobre como se relaciona
- [[regra-mantenha-a-especificidade-baixa]] — a regra dá a orientação prática para a especificidade
- [[espacar-elementos-com-o-seletor-coruja]] — o seletor * + * tem especificidade zero e é fácil de sobrescrever
- [[camadas-da-cascata-em-css]] — as camadas vêm antes da especificidade
- [[is-e-where-em-seletores-css]] — tratam de como a especificidade é calculada
- [[regra-nao-altere-um-modulo-com-seletores-de-contexto]] — seletores de contexto aumentam a especificidade
- [[seletores-css-atributos-combinadores-e-pseudoclasses]] — os tipos de seletor são o que a especificidade calcula
