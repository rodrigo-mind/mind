---
titulo: "Classes abstratas e hierarquias de classes em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 9, seção 9.5.4 (PDF p. 239-266, capítulo 9)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Classes abstratas e hierarquias de classes em JavaScript

## Definição

JavaScript **não tem** definição formal de classes ou métodos abstratos; o livro chama assim os métodos não implementados (que lançam `Error("Abstract method")`) e as classes incompletas que servem de superclasse comum. Uma superclasse abstrata dá uma implementação parcial compartilhada, e cada subclasse só implementa o que lhe é próprio.

No exemplo do livro (hierarquia de conjuntos): `AbstractSet` define só `has()`; `NotSet` e `RangeSet` são concretas; `AbstractEnumerableSet` acrescenta o tamanho e o iterador abstratos e, em cima deles, `isEmpty`, `toString` e `equals` concretos; `AbstractWritableSet` acrescenta `insert` e `remove` abstratos e `add`, `subtract` e `intersect` concretos; `SingletonSet` e `BitSet` (com operações de bits) são concretas. Quem implementa o mínimo ganha o resto "de graça".

O autor lembra que muitos programadores usam `class` com frequência, mas preferem composição e raramente `extends` (exceto quando uma biblioteca ou framework exige).

## Por que importa

Mostra como separar interface de implementação em uma linguagem sem `abstract`.

## Como se relaciona

Veja subclasses com extends e super, a regra de preferir delegação à herança e classes abstratas e interfaces em PHP.

## Notas do Claude

Confiança média: li o exemplo completo, mas resumi as classes de conjuntos sem entrar nas operações de bits do `BitSet`.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[subclasses-com-extends-e-super-em-javascript]] — a hierarquia usa extends e super
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — classes abstratas formais em PHP
