---
titulo: "Classes com a palavra class em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 9, seções 9.3.1, 9.3.2 e 9.3.4 (PDF p. 239-266, capítulo 9)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Classes com a palavra class em JavaScript

## Definição

O ES6 trouxe a palavra-chave `class`, que **não muda a natureza** das classes: continua sendo açúcar sintático sobre construtor e protótipo (o resultado é uma função construtora).

- **Corpo da classe:** `class Range { constructor(from, to) {...} includes(x) {...} }`. Métodos usam a forma abreviada, **sem vírgulas** entre eles; o corpo não é um objeto literal e não aceita pares nome/valor. `constructor` define a função construtora (o nome da variável é o da classe); sem inicialização, um construtor vazio é criado.
- **Métodos de acesso e outras formas:** getters e setters (`get magnitude()`), geradores (`*[Symbol.iterator]()`) e nomes computados valem como em objetos literais. No exemplo `Complex` do livro, há também métodos de instância (`plus`, `times`) e `equals` com `instanceof`.
- **Métodos estáticos:** prefixo `static`; ficam na função construtora (`Range.parse(...)`), não nas instâncias, e quase nunca usam `this`. Também chamados métodos de classe.
- **Propriedades estáticas** (antes dos campos estáticos): atribuídas depois da classe (`Complex.ZERO = new Complex(0,0)`).
- **Expressões de classe:** `let Square = class {...}`; um nome opcional só existe dentro do corpo.
- **Detalhes:** todo o corpo da classe roda em **modo estrito** e as declarações de classe **não sofrem içamento** (hoisting): não se pode instanciar antes de declarar. Os construtores de classe não podem ser chamados sem `new`. A sintaxe também impede definir métodos com funções de seta.

## Por que importa

É a forma moderna e legível de definir classes em JavaScript.

## Como se relaciona

Veja classes e protótipos, campos públicos, privados e estáticos, subclasses e declaração de variáveis (let, const e var).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[classes-e-prototipos-em-javascript]] — a sintaxe class é açúcar sobre protótipos
- [[campos-publicos-privados-e-estaticos-em-classes-javascript]] — complementa com campos
- [[declaracao-de-variaveis-let-const-e-var]] — classes não sofrem içamento como os var e as funções
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — static em PHP e em JavaScript
- [[vetores-e-iteracao-em-javascript]] — métodos geradores e Symbol.iterator tornam a classe iterável
- [[modo-estrito-em-javascript]] — o corpo de classe é estrito
