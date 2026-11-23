---
titulo: "Iteração de objetos em PHP (Iterator e IteratorAggregate)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seções 11.4.8 e 11.4.9 (PDF p. 517-521)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Iteração de objetos em PHP

## Definição

- **`foreach` direto:** percorre as propriedades de um objeto (`foreach ($obj as $nome => $valor)`); no exemplo do livro, as propriedades são públicas.
- **Interface `Iterator`:** uma classe de iteração implementa cinco métodos: `current()` (valor atual), `key()` (chave), `next()` (avança), `rewind()` (volta ao início) e `valid()` (ainda há elementos?). O construtor costuma receber o conjunto a percorrer.
- **Interface `IteratorAggregate`:** a classe que contém os dados implementa só `getIterator()`, que devolve o objeto iterador; assim ela pode ser usada em um `foreach`.

## Por que importa

Padroniza o percorrimento de listas (resultados de banco, arquivos, vetores) com um só mecanismo.

## Como se relaciona

Ver fundamentos de classes e objetos em PHP e interfaces, classes abstratas e traits; em JavaScript, os iteradores equivalentes estão no livro de JavaScript (ainda não destilados).

## Notas do Claude

Não li as seções de SPL, de reflexão e de atributos do mesmo capítulo; ficam para um próximo lote.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fundamentos-de-classes-e-objetos-em-php]] — esta nota cita a ideia de «Fundamentos de classes e objetos em PHP» na seção sobre como se relaciona
- [[padroes-de-banco-de-dados-visao-geral]] — resultados de banco costumam ser percorridos como iteráveis
- [[vetores-iteraveis-e-geradores-em-php]] — «Vetores, iteráveis e geradores em PHP» cita esta nota ao explicar suas relações
- [[spl-iteradores-e-classes-padrao-do-php]] — «SPL: iteradores e classes padrão do PHP» cita esta nota ao explicar suas relações
- [[lacos-em-javascript-for-of-e-for-in]] — «Laços em JavaScript: for, for/of e for/in» cita esta nota ao explicar suas relações
- [[padrao-collection-colecao-tipada]] — as interfaces de iteração são as que a coleção implementa
