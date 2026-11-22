---
titulo: "Nomeie as colunas explicitamente (sem SELECT * e INSERT implícito)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 19 (Implicit Columns), p. 234-243 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Nomeie as colunas explicitamente

## Regra

No código de produção, liste as colunas em `SELECT` e em `INSERT`; evite `SELECT *` e `INSERT INTO tabela VALUES (...)` sem lista de colunas.

## Por quê

- **Quebra com mudanças na tabela:** acrescentar uma coluna faz o `INSERT` implícito falhar (a contagem de valores não confere) ou, pior, gravar nas colunas erradas; apagar ou reordenar uma coluna muda o que o `SELECT *` devolve, e o código que acessa pela posição (`row[10]`) passa a usar outra coluna sem aviso.
- **Nomes repetidos em junções:** com `SELECT *` num `JOIN`, duas colunas de mesmo nome (`title` de livros e de autores) disputam a mesma chave do vetor associativo, e uma sobrescreve a outra (o relato do livro de um programador PHP, em que todos os títulos vinham nulos).
- **Custo:** busca-se mais dados do que o necessário (colunas grandes como TEXT), saturando a rede quando muitas consultas rodam ao mesmo tempo; os ORMs (como o Active Record) costumam usar `SELECT *` por padrão.
- O SQL não tem `SELECT * EXCEPT`, e se tivesse, seria confuso.
- Listar as colunas é à prova de erros: se uma coluna some, o erro aponta o código que se deve corrigir (falhar cedo, o princípio "poka-yoke"), e ajuda a pensar só no que se precisa.

## Quando não vale

Consultas avulsas de diagnóstico e testes. Se a aplicação deve se adaptar a mudanças de colunas, os curingas podem servir (com o trabalho extra de depurar). Em uma junção, dá para usar o curinga com apelido de uma só tabela (`b.*, a.nome`). Digitar menos não compensa o custo, segundo o livro, mas ele diz para não se preocupar com o tamanho do texto da consulta.

## Como verificar

Procure `SELECT *` e `INSERT INTO x VALUES` em código de aplicação; troque por colunas explícitas.

## Notas do Claude

Em PHP com PDO e `fetch(PDO::FETCH_ASSOC)`, o problema dos nomes repetidos é exatamente o descrito (ver acesso ao banco com PDO).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[acesso-ao-banco-com-pdo]] — o fetch associativo sofre com nomes repetidos
- [[regra-declare-chaves-estrangeiras]] — a estrutura estável é parte do contrato do banco
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
