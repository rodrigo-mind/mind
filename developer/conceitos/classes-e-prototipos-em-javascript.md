---
titulo: "Classes e protótipos em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 9, seções 9.1, 9.2 e 9.4 (PDF p. 239-266, capítulo 9)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Classes e protótipos em JavaScript

## Definição

Em JavaScript, uma classe é um conjunto de objetos que **herdam propriedades do mesmo objeto protótipo**; o protótipo é o centro da classe. Isto é herança baseada em protótipos, bem diferente da herança de classes de Java ou C++. Dá para definir uma classe só com `Object.create(protótipo)` e uma função fábrica que inicializa as propriedades próprias (`from`, `to` no exemplo `Range` do livro); os métodos compartilhados usam `this` para falar do objeto pelo qual foram chamados.

- **Construtor:** função pensada para inicializar objetos novos, chamada com `new`. A chamada com `new` cria o objeto sozinha, usa a propriedade **`prototype` do construtor** como protótipo do novo objeto e devolve-o; o construtor só inicializa `this`. Por convenção, construtores começam com maiúscula. Só funções (comuns) têm propriedade `prototype`.
- **`new.target`:** dentro da função, indica se foi chamada com `new` (indefinido se não). Permite emular os construtores de erro, que funcionam sem `new` (`if (!new.target) return new C();`); não vale para classes feitas com `class`.
- **Identidade da classe:** o protótipo é o que define a classe; o construtor é a "cara pública". `o instanceof C` é verdadeiro se `o` herda de `C.prototype`, direta ou indiretamente; ele **não verifica** que o construtor inicializou o objeto. `proto.isPrototypeOf(o)` testa a cadeia sem construtor.
- **Propriedade `constructor`:** o `prototype` padrão de cada função tem uma propriedade não enumerável `constructor` que aponta de volta à função. Se você troca `Range.prototype` por um objeto novo, ele perde a propriedade; restaure com `constructor: Range`. Outro estilo antigo: acrescentar métodos um a um em `Range.prototype`.
- **Funções de seta não servem** como construtores nem como métodos: não têm `prototype` e herdam `this` do contexto.
- **Adicionar métodos a classes existentes:** a herança é dinâmica, então acrescentar um método ao protótipo vale também para objetos já criados (ver a regra sobre tipos nativos).

## Por que importa

É o mecanismo por baixo da sintaxe `class`; entender isso evita confusão ao ler código antigo.

## Como se relaciona

Veja classes com a palavra class, subclasses com extends e super, funções de seta e o valor de this, objetos como vetores associativos e fundamentos de classes e objetos em PHP (modelo diferente).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fundamentos-de-classes-e-objetos-em-php]] — esta nota cita a ideia de «Fundamentos de classes e objetos em PHP» na seção sobre como se relaciona
- [[funcoes-de-seta-e-o-valor-de-this]] — esta nota cita a ideia de «Funções de seta e o valor de this» na seção sobre como se relaciona
- [[classes-com-a-palavra-class-em-javascript]] — a sintaxe class é açúcar sobre protótipos
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — objetos e herança de propriedades
- [[regra-nao-adicione-metodos-aos-prototipos-dos-tipos-nativos]] — a herança dinâmica permite alterar protótipos
- [[subclasses-com-extends-e-super-em-javascript]] — a herança por protótipos explica o extends
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — instanceof e a cadeia de protótipos
- [[metaprogramacao-em-javascript]] — os atributos de propriedade e as operações de protótipo aprofundam o modelo de objetos
