---
titulo: "Metaprogramação em JavaScript (atributos de propriedade, Object.freeze, Reflect e Proxy)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 14 (PDF p. 397-426)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Metaprogramação em JavaScript

## Definição

O livro descreve recursos avançados, pouco usados no dia a dia, mas úteis para quem escreve bibliotecas e ferramentas.

**Atributos de propriedade (14.1):**

- Uma propriedade de dados tem `value`, `writable` (pode mudar o valor), `enumerable` (aparece em `for/in` e em `Object.keys`) e `configurable` (pode ser apagada ou ter os atributos mudados).
- Uma propriedade de acesso tem `get`, `set`, `enumerable` e `configurable`.
- `Object.getOwnPropertyDescriptor(obj, "x")` lê os atributos; `Object.defineProperty()` e `Object.defineProperties()` definem. Os atributos omitidos numa propriedade nova valem `false` (conhecimento meu).
- Há regras: uma propriedade não configurável não pode voltar a ser configurável, nem trocar de tipo.
- `Object.assign()` copia só as propriedades enumeráveis.

**Extensibilidade (14.2):**

- `Object.preventExtensions()` impede acrescentar propriedades;
- `Object.seal()` também impede apagar e reconfigurar;
- `Object.freeze()` também deixa tudo somente leitura.
- Os três agem só no próprio objeto, e não nos objetos que ele contém, nem no protótipo.

**Outros recursos:** `Object.getPrototypeOf()` e `setPrototypeOf()` (14.3), símbolos conhecidos que mudam o comportamento da linguagem (14.4, como `Symbol.iterator`), funções de tag em templates para criar minilinguagens (14.5), `Reflect` com as operações básicas em forma de função (14.6) e `Proxy`, que intercepta operações sobre um objeto (14.7).

## Por que importa

`Object.freeze()` protege configurações e constantes contra alteração acidental. O resto ajuda a ler código de bibliotecas.

## Como se relaciona

Os protótipos estão em classes e protótipos em JavaScript. `Symbol.iterator` está em iteradores e geradores em JavaScript. Os literais de template são do capítulo 3 do livro. A regra não adicione métodos aos protótipos dos tipos nativos vale aqui também.

## Notas do Claude

Confiança média: li as seções 14.1 e 14.2; as seções 14.3 a 14.7 foram só folheadas. O mapa marca este capítulo como `ignorar`, e ele foi destilado a pedido do usuário.

## Conexões

- [[iteradores-e-geradores-em-javascript]] — o Symbol.iterator é um dos símbolos conhecidos da metaprogramação
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[classes-e-prototipos-em-javascript]] — protótipos e atributos de propriedade são a base do modelo de objetos
- [[regra-nao-adicione-metodos-aos-prototipos-dos-tipos-nativos]] — a regra aborda a mesma tentação de mexer em protótipos
- [[modo-estrito-em-javascript]] — alterar um objeto congelado só dá erro no modo estrito
- [[propriedades-readonly-em-php]] — `Object.freeze` e as propriedades readonly do PHP buscam a mesma imutabilidade
