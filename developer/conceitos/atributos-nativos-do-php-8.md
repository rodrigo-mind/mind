---
titulo: "Atributos nativos do PHP 8"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seção 11.4.12 (PDF p. 449-549, capítulo 11; páginas exatas da seção não conferidas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Atributos nativos do PHP 8

## Definição

Atributos definem **metadados legíveis por máquina** sobre classes, métodos, funções, parâmetros, propriedades e constantes, diretamente na linguagem (as antigas "anotações" de PHPDoc ou de outras linguagens, como C#). Como fazem parte da linguagem, podem ser lidos em tempo de execução, por exemplo em arquiteturas orientadas a ouvintes, pela Reflection API; e podem conviver com anotações em comentários.

- **Sintaxe:** começa com `#[` e termina com `]`.
- **Definição:** uma classe marcada com `#[Attribute]`; o nome da classe é o nome do atributo e o construtor define seus parâmetros (por exemplo, `public string $value = 'Windows'`).
- **Uso:** `#[Installation(value: 'Mac')]` (parâmetros nomeados ou posicionais, com valores ou constantes) sobre a classe, o método, a função ou a propriedade.
- **Restrições:** `Attribute::TARGET_CLASS`, `TARGET_METHOD`, `TARGET_FUNCTION`, `TARGET_PROPERTY` (combináveis com `|`; o padrão é `TARGET_ALL`). Por padrão um atributo só pode aparecer uma vez por elemento; `Attribute::IS_REPEATABLE` permite repetir.
- **Leitura:** `getAttributes()` na classe ou no método de reflexão (com filtro opcional por classe); cada item tem `getName()`, `getArguments()` e `newInstance()`. Com `strict_types`, valores de tipo diferente do declarado geram `TypeError`.

## Por que importa

Dá a frameworks e validadores uma forma padrão de configuração dentro do código.

## Como se relaciona

Veja Reflection API do PHP, namespaces, propriedades readonly e enums em PHP, e testes unitários em PHP com PHPUnit.

## Notas do Claude

O livro grafa as constantes de forma incompleta em alguns trechos (por exemplo `#Attributes`); usei a forma `#[Attribute(Attribute::IS_REPEATABLE)]`, que é a do manual (a conferir).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[propriedades-readonly-em-php]] — esta nota cita a ideia de «Propriedades readonly em PHP 8.1» na seção sobre como se relaciona
- [[enums-em-php]] — esta nota cita a ideia de «Enumerações em PHP 8.1» na seção sobre como se relaciona
- [[reflection-api-do-php]] — esta nota cita a ideia de «Reflection API do PHP» na seção sobre como se relaciona
- [[testes-unitarios-em-php-com-phpunit]] — esta nota cita a ideia de «Testes unitários em PHP com PHPUnit» na seção sobre como se relaciona
