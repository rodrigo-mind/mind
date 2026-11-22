---
tipo: ficha-de-arquivo
arquivo: SQL-Antipatterns-Volume-1-Avoiding-the-Pitfalls-of-Database-Programming-(Bill-Karwin).pdf
formato: pdf
leitura: parcial
lido_em: 2026-11-22
---

# SQL-Antipatterns-Volume-1-Avoiding-the-Pitfalls-of-Database-Programming-(Bill-Karwin) (pdf)

Original: [[SQL-Antipatterns-Volume-1-Avoiding-the-Pitfalls-of-Database-Programming-(Bill-Karwin).pdf]]

## Resumo

*SQL Antipatterns, Volume 1: Avoiding the Pitfalls of Database Programming*, de Bill Karwin (The Pragmatic Bookshelf, 2ª edição, novembro de 2022; 379 páginas, em inglês). Catálogo dos erros mais comuns no uso de SQL, e de como corrigi-los. Cada capítulo segue a mesma anatomia: objetivo, antipadrão, como reconhecê-lo, usos legítimos e solução. Pelo sumário, a Parte I trata de modelagem lógica (listas separadas por vírgula, árvores ingênuas, chave `id` universal, falta de constraints, EAV, associações polimórficas, colunas múltiplas, clonagem de tabelas); a Parte II, de modelagem física (FLOAT, ENUM na definição da coluna, arquivos fora do banco, excesso de índices); a Parte III, de consultas (NULL, grupos ambíguos, seleção aleatória, busca por LIKE, consultas "espaguete", colunas implícitas). O sumário também prevê uma Parte IV, sobre antipadrões de desenvolvimento de aplicações, que não li.

Leitura parcial: li os metadados, os elogios, o sumário até o capítulo 19 e o início da introdução (as 14 primeiras páginas de 379 e mais três do sumário). Os capítulos não foram lidos; o que está dito sobre eles vem dos títulos do sumário. Nas páginas lidas não há trecho dirigido ao Claude.

## Conexões

- [[developer]] — referência de modelagem e consultas SQL para a área de banco de dados da stack (MySQL), com a lista de erros comuns a evitar
- [[PHP-and-MySQL-The-Comprehensive-Guide-(Christian-Wenz-Tobias-Hauser) (pdf)]] — aquele livro ensina SQL, PDO e MySQL; este mostra os erros mais comuns de modelagem, índices e consultas a evitar ao aplicá-los
- [[mapa-sql-antipatterns]] — o mapa acompanha a destilação deste livro
