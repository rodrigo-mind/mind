---
titulo: "Campos públicos, privados e estáticos em classes JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 9, seção 9.3.3 (PDF p. 239-266, capítulo 9)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Campos públicos, privados e estáticos em classes JavaScript

## Definição

O livro (início de 2020) trata isto como proposta em padronização, já suportada no Chrome e parcialmente no Firefox, e comum entre usuários de React e Babel:

- **Campos de instância públicos:** declarados no corpo (`size = 0; capacity = 4096;`), fora do construtor. Rodam como parte do construtor. Continua-se usando `this.` para referir-se a eles, inclusive nos inicializadores. Sem inicializador, o valor é `undefined`; o estilo melhor é sempre explicitar o valor inicial. Isto deixa claro que o corpo da classe não é um objeto literal.
- **Campos privados:** nomes começando por `#` (`#size = 0`), usáveis com o prefixo só dentro do corpo e invisíveis e inalteráveis de fora. Precisam ser **declarados no corpo** antes do uso (não basta `this.#size = 0` no construtor). Típico: campo privado mais getter para leitura só.
- **Campos estáticos:** `static` antes do campo (público ou privado) cria propriedade do construtor, por exemplo um `static integerRangePattern` para a expressão regular de `Range.parse`.

O exemplo do livro `TypedMap` serve de caso: `keyType` e `valueType` deveriam ser privados para ninguém burlar a checagem de tipos.

## Por que importa

Dá encapsulamento real em JavaScript, ao contrário da convenção de prefixar com `_`.

## Como se relaciona

Veja classes com a palavra class, a regra de encapsular propriedades como privadas (em PHP) e subclasses com extends e super.

## Notas do Claude

Campos de instância, privados (`#`) e estáticos foram padronizados depois do livro (ES2022) e hoje são suportados pelos navegadores atuais (conhecimento meu, a conferir no suporte alvo). Por isso a confiança é média: o texto lido os trata como "ainda não padrão".

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[classes-com-a-palavra-class-em-javascript]] — complementa com campos
- [[regra-encapsule-propriedades-como-privadas]] — a mesma ideia de encapsulamento
