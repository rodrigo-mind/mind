---
titulo: "SPL: iteradores e classes padrão do PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seção 11.4.11 (PDF p. 449-549, capítulo 11; páginas exatas da seção não conferidas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# SPL: iteradores e classes padrão do PHP

## Definição

A Standard PHP Library (SPL), inspirada na STL do C++, é um conjunto de classes e interfaces definidas para iteradores e outras tarefas comuns. O laço `foreach` já é um iterador simples; as interfaces permitem escrever o próprio.

- **`Iterator`:** a classe implementa `rewind()` (volta ao início), `valid()` (ainda há elemento?), `current()`, `key()` e `next()`. No exemplo do livro, `CSVIterator` percorre um texto separado por vírgulas.
- **`IteratorAggregate`:** a classe-coleção implementa só `getIterator()`, que devolve o iterador; assim o objeto `CSV` pode ir direto a um `foreach`.
- **Iteradores externos:** `FilterIterator` (implementa `accept()` para filtrar; o iterador interno vem por `getInnerIterator()`) e `LimitIterator` (começa em um elemento e limita a quantidade) envolvem um iterador interno, e os iteradores se empilham do específico ao geral.
- **Outros:** `RecursiveIterator`, iteradores de diretórios (simples e recursivo), `SimpleXMLIterator`, `GlobIterator`, `Countable` (controla o `count()`), classes de erro e as interfaces do padrão Observer. `SplFileObject` com `setCsvControl()` e `fgetcsv()` lê arquivos CSV linha a linha como vetores.

## Por que importa

Dá coleções que o `foreach` percorre, com filtro e limite sem mexer na classe original.

## Como se relaciona

Veja iteração de objetos em PHP, vetores iteráveis e geradores, padrão Observer, padrões Iterator e trabalhar com arquivos em PHP.

## Notas do Claude

Os métodos de iteradores do exemplo vieram em duas versões no livro (com e sem tipos de retorno); em PHP 8.1+ declare os tipos de retorno (`: void`, `: bool`, `: mixed`) para evitar avisos de depreciação (conhecimento meu, a conferir).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[iteracao-de-objetos-em-php]] — esta nota cita a ideia de «Iteração de objetos em PHP» na seção sobre como se relaciona
- [[padrao-observer]] — esta nota cita a ideia de «Padrão Observer» na seção sobre como se relaciona
- [[trabalhar-com-arquivos-em-php]] — esta nota cita a ideia de «Trabalhar com arquivos em PHP» na seção sobre como se relaciona
- [[vetores-iteraveis-e-geradores-em-php]] — alternativa com geradores
- [[padrao-collection-colecao-tipada]] — a coleção usa as classes de iteração da SPL
