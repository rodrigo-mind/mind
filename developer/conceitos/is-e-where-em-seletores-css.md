---
titulo: "Os pseudoclasses :is() e :where()"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 8, seção 8.3 (PDF p. 262-265; impressa 232-235)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Os pseudoclasses :is() e :where()

## Definição

- **`:is(a, b, c)`:** recebe uma lista de seletores e casa com qualquer elemento que combine com um deles; encurta seletores repetitivos (`.formulario :is(input, textarea, select)`). A especificidade é a do argumento **mais específico** da lista. Não funciona com pseudoelementos (`:is(div::before)` é inválido); pseudoclasses servem.
- **Perdão a seletores inválidos:** dentro do `:is()`, um seletor que o navegador não reconhece (como o novo `:user-invalid`) é ignorado sem anular o resto; em uma lista comum, o conjunto inteiro é descartado. Dá um jeito gracioso de usar pseudoclasses novas.
- **`:where()`:** igual ao `:is()`, mas com **especificidade zero**. Serve para manter a especificidade de seletores longos baixa (por exemplo, `:where(.link-padrao)` vale 0,0,0 mais a do restante). Foi muito útil antes das camadas e ainda serve para estilos da mesma camada.
- **Elevar a especificidade** com `:is(#id-falso)` é possível, mas o autor desaconselha.

## Por que importa

Seletores mais curtos e controle da especificidade sem alterar o HTML.

## Como se relaciona

Ver especificidade de seletores e camadas da cascata em CSS; o aninhamento também se traduz em `:is()`.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[camadas-da-cascata-em-css]] — esta nota cita a ideia de «Camadas da cascata» na seção sobre como se relaciona
- [[especificidade-de-seletores]] — tratam de como a especificidade é calculada
- [[aninhamento-de-css]] — o aninhamento se converte em :is()
- [[seletores-css-atributos-combinadores-e-pseudoclasses]] — `:is()` e `:where()` complementam os seletores do livro
