---
titulo: "Declaração de variáveis: let, const e var"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 3, seção 3.10 (PDF p. 41-78, seção indicada dentro do capítulo)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Declaração de variáveis: let, const e var

## Definição

- **`let`:** variável com escopo de bloco. Sem valor inicial, vale `undefined`. É boa prática inicializar na declaração.
- **`const`:** igual ao `let`, mas exige valor inicial e não permite reatribuir (tentar gera `TypeError`). Convenção: nomes em maiúsculas para constantes fixas.
- **`var`:** o jeito pré-ES6. Não tem escopo de bloco (vale na função inteira); fora de função cria propriedade do objeto global (`globalThis`), o que `let` e `const` não fazem; pode ser declarada várias vezes.
- **Duas escolas sobre `const`:** só para valores fundamentalmente fixos (preferência do autor), ou para tudo que não muda (e trocar por `let` se mudar), o que evita alterações acidentais.

## Por que importa

O escopo de bloco do `let` e do `const` evita os vazamentos de variável típicos do `var`.

## Como se relaciona

Variáveis de módulo não viram globais (ver módulos ES6 em JavaScript).

## Notas do Claude

Para código novo, o livro e o ES6 apontam `let` e `const`; evitar `var` (inferência minha, coerente com o texto). Confiança média: não li içamento e desestruturação em detalhe.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modulos-es6-em-javascript]] — esta nota cita a ideia de «Módulos ES6 em JavaScript» na seção sobre como se relaciona
- [[classes-com-a-palavra-class-em-javascript]] — classes não sofrem içamento como os var e as funções
- [[modo-estrito-em-javascript]] — atribuir a variável não declarada é erro
