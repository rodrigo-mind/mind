---
titulo: "typeof, delete e outros operadores de JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seção 4.13 (PDF p. 79-114)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# `typeof`, `delete` e outros operadores de JavaScript

## Definição

- **`typeof`:** devolve um texto com o tipo: `"undefined"`, `"boolean"`, `"number"` (também `NaN`), `"bigint"`, `"string"`, `"symbol"`, `"function"` e `"object"` para qualquer objeto ou vetor **e para `null`** (é preciso testar `null` à parte). Só distingue objeto de primitivo; para distinguir classes use `instanceof` ou outras técnicas.
- **`delete`:** remove uma propriedade de objeto ou elemento de vetor, usado pelo efeito colateral. Depois, `"x" in o` dá `false`; remover um elemento de vetor **não muda o `length`**. A propriedade removida não fica `undefined`: ela deixa de existir. Em modo estrito, `delete` em identificador sem qualificação é erro de sintaxe e em propriedade não configurável lança `TypeError`.
- **Expressões primárias e iniciadores:** literais, `this`, referências a variáveis (variável inexistente lança `ReferenceError`). Vetor literal aceita elementos omitidos (`[1,,,,5]`, esparso) e vírgula final; objeto literal aceita aninhamento.
- **Acesso a propriedade:** `.identificador` só serve para nomes válidos e conhecidos ao escrever; para nomes com espaços, números ou calculados, use `[expressão]`, convertida em texto.
- **Criação de objeto:** `new Construtor(args)`; os parênteses podem ser omitidos sem argumentos.

## Por que importa

São as ferramentas de checagem de tipo e remoção mais usadas no dia a dia.

## Como se relaciona

Veja igualdade, comparação e o operador `+`, objetos como vetores associativos e classes e protótipos.

## Notas do Claude

Confiança média: o final da seção de `delete` e os operadores `await`, `void` e vírgula (4.13.5 a 4.13.7), bem como os bit a bit (4.8.3), não foram lidos por inteiro.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — delete e in em propriedades
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — in e instanceof
