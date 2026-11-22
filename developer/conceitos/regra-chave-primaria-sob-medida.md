---
titulo: "Dê a cada tabela a chave primária que combina com ela"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 4 (ID Required), p. 60-71"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Dê a cada tabela a chave primária que combina com ela

## Regra

Não ponha uma coluna `id` inteira em toda tabela por convenção. Defina a chave primária que garante a unicidade do que importa, e dê a ela um nome que diga o que ela identifica (por exemplo, `bug_id`).

## Por quê

O livro chama de "tamanho único" a ideia de que toda tabela tem uma coluna `id`, inteira e gerada automaticamente. Efeitos:

- Em tabelas de interseção, um `id` artificial deixa passar linhas duplicadas na combinação que importa, já que a chave primária protege só o `id`. No exemplo do livro, uma contagem de artigos por etiqueta deu sete em vez de cinco porque o mesmo par se repetiu com ids diferentes. A chave primária composta resolve.
- Uma chave redundante convive com uma chave natural que poderia servir.
- O nome `id` em todas as tabelas dificulta ler junções e usar a mesma coluna nas chaves estrangeiras.

Chave primária é uma restrição (constraint), e não um tipo de dado; e coluna autoincremento é um conceito separado da chave primária.

## Quando não vale

Uma chave artificial (pseudochave) é boa quando a chave natural seria longa demais, ou quando um framework de mapeamento objeto-relacional exige a convenção. Em tabelas subordinadas a uma chave composta longa, a pseudochave pode ser a única saída prática.

## Como verificar

Em tabelas de ligação, confira se existe `PRIMARY KEY` ou `UNIQUE` na combinação das duas colunas. Veja se algum `id` genérico poderia ser substituído por uma chave natural com `UNIQUE`.

## Notas do Claude

O livro cita o padrão ISO/IEC 11179 para nomear metadados. No MySQL com PDO, use `BIGINT UNSIGNED AUTO_INCREMENT` quando uma pseudochave for necessária, mantendo a regra de nomes.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-nao-guardar-lista-em-uma-coluna]] — a tabela de interseção precisa de chave primária composta
- [[sql-basico-para-aplicacoes-web]] — o livro de SQL Antipatterns discute a escolha da chave primária
- [[regra-nao-renumere-chaves-primarias-nem-reaproveite-ids]] — a regra sobre pseudochaves complementa a escolha da chave
- [[numerar-linhas-do-resultado-com-row-number]] — compara chaves geradas e GUIDs
