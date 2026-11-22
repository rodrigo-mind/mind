---
titulo: "Subclasses com extends e super em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 9, seções 9.5.1 e 9.5.2 (PDF p. 239-266, capítulo 9)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Subclasses com extends e super em JavaScript

## Definição

**Do jeito antigo:** para `Span` ser subclasse de `Range`, faz-se `Span.prototype = Object.create(Range.prototype)` e restaura-se `Span.prototype.constructor = Span`. Essa linha é a chave: os objetos `Span` herdam de `Span.prototype`, que herda de `Range.prototype`. O exemplo só dispensa chamar o construtor do pai porque conhece a implementação dele; uma subclasse robusta precisa de `super`.

**Com `extends`:** `class EZArray extends Array {...}`, mesmo de classes nativas. A instância é de ambas as classes (`instanceof`), usa métodos herdados (`push`, `pop`, `length`), e os **métodos estáticos também são herdados** (`EZArray.isArray`), pois o construtor da subclasse herda do da superclasse.

**Regras do `super()` no construtor** (exemplo `TypedMap extends Map`, que confere o tipo das chaves e valores):
- Quem usa `extends` precisa chamar `super()` no construtor.
- Sem construtor na subclasse, um é criado e repassa tudo a `super()`.
- Não se pode usar `this` antes de `super()` (a superclasse inicializa primeiro).
- `new.target` aponta para o construtor da subclasse mesmo dentro do construtor da superclasse; uma boa superclasse não precisa saber que foi estendida.

**Sobrescrita de métodos:** a subclasse redefine o método (`set` no `TypedMap`) e pode chamar a versão do pai com `super.método(...)`, no começo, no meio ou no fim; não é obrigada a chamá-la.

## Por que importa

É o mecanismo de herança da linguagem, usado ao estender classes nativas ou de bibliotecas.

## Como se relaciona

Veja classes e protótipos, classes abstratas e hierarquias, a regra de preferir delegação à herança, composição em vez de herança e tipos de objeto e herança de tipos em PHP.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[classes-e-prototipos-em-javascript]] — a herança por protótipos explica o extends
- [[regra-prefira-delegacao-a-heranca-em-javascript]] — quando evitar subclasses
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — herança em PHP
- [[classes-abstratas-e-hierarquias-de-classes-em-javascript]] — a hierarquia usa extends e super
- [[classes-de-erro-do-javascript-e-erros-personalizados]] — erros personalizados usam extends e super
