---
titulo: "Reflection API do PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seção 11.4.10 (PDF p. 449-549, capítulo 11; páginas exatas da seção não conferidas)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Reflection API do PHP

## Definição

Conjunto de classes para **examinar classes, métodos e propriedades em tempo de execução** ("segurar um espelho" diante delas) e reagir ao resultado no código. Para usar, cria-se o objeto da classe de reflexão adequada: `ReflectionClass`, `ReflectionProperty` e outras.

- `new ReflectionProperty("Computer", "cpu")` e `getValue($objeto)` leem uma propriedade, mesmo privada, no exemplo do livro.
- `new ReflectionClass('Computer')`, `getMethod('setCPU')` devolve o método, que se pode inspecionar (imprimi-lo) e executar com `invoke($objeto, args)` ou `invokeArgs($objeto, [args])`.
- É a base da leitura de atributos (`getAttributes()`).

## Por que importa

É o mecanismo de frameworks que descobrem dependências e metadados sem código manual.

## Como se relaciona

Veja atributos nativos do PHP 8, criar instâncias por clone, reflexão e serialização, e contêiner de injeção de dependências.

## Notas do Claude

As páginas não foram conferidas (confiança média). Ler propriedades privadas por reflexão quebra o encapsulamento: use com critério (observação minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[atributos-nativos-do-php-8]] — «Atributos nativos do PHP 8» cita esta nota ao explicar suas relações
- [[criar-instancias-por-clone-reflexao-e-serializacao]] — esta nota cita a ideia de «Criar instâncias por clone, reflexão e serialização» na seção sobre como se relaciona
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — contêineres usam reflexão para descobrir dependências
