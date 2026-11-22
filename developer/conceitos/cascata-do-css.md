---
titulo: "A cascata do CSS (cascade)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 1, seção 1.1 (p. 5-18, numeração impressa)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# A cascata do CSS

## Definição

Quando duas ou mais regras apontam para o mesmo elemento com declarações conflitantes, o navegador resolve o conflito pela cascata. Ela decide, para cada propriedade de cada elemento, um valor, o valor em cascata (cascaded value). O livro dá seis critérios, aplicados nesta ordem:

1. **Origem da folha de estilos:** estilos do navegador (user-agent), do usuário e do autor (os seus). Os do autor vencem os do navegador. Para declarações com `!important`, a ordem se inverte: importante do navegador, importante do usuário, importante do autor, normal do autor, normal do usuário, normal do navegador.
2. **Estilos em linha (atributo `style`):** vencem os de folha de estilos; só `!important` na folha os supera.
3. **Camada (layer):** estilos em camadas com prioridades diferentes (tratados no capítulo 8 do livro).
4. **Especificidade do seletor** (ver especificidade de seletores).
5. **Proximidade de escopo:** estilos limitados a uma parte do DOM (capítulo 9 do livro).
6. **Ordem de aparição:** se tudo mais empata, a declaração que vem depois vence.

## Por que importa

Prever o comportamento das regras exige entender a cascata, e boa parte do trabalho de CSS é escrever regras previsíveis. A ordem de aparição explica por que os estilos de link devem ficar na sequência link, visited, hover e active (a mnemônica "LoVe/HAte"): com a mesma especificidade, a última vence.

## Como se relaciona

A cascata resolve conflitos; a herança entrega valores quando não há valor em cascata (ver herança no CSS). A regra de manter a especificidade baixa dá o uso prático.

## Notas do Claude

O livro é de 2024; camadas e escopo são recursos novos. Camadas e escopo não foram lidos; até lê-los, use os quatro critérios mais antigos (origem, estilos em linha, especificidade e ordem).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[heranca-no-css]] — «Herança no CSS» cita esta nota ao explicar suas relações
- [[especificidade-de-seletores]] — «Especificidade de seletores no CSS» cita esta nota ao explicar suas relações
- [[metadados-do-documento-html]] — style e link carregam as folhas de estilo que entram na cascata
- [[propriedades-personalizadas-do-css]] — as variáveis cascateiam como qualquer propriedade
- [[controlar-css-por-javascript]] — o estilo computado resulta da cascata
- [[camadas-da-cascata-em-css]] — «Camadas da cascata» cita esta nota ao explicar suas relações
- [[escopo-em-css-com-scope]] — «Escopo em CSS com @scope» cita esta nota ao explicar suas relações
