---
titulo: "Siga a regra do valor único no GROUP BY"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 15 (Ambiguous Groups), p. 188-199 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Siga a regra do valor único no GROUP BY

## Regra

Em uma consulta com `GROUP BY`, toda coluna do `SELECT` precisa ter **um único valor por grupo**: ou está no `GROUP BY`, ou está dentro de uma função de agregação, ou depende funcionalmente das colunas agrupadas.

## Por quê

Um erro comum é pedir `MAX(data)` junto com `bug_id` achando que o banco devolve o `bug_id` da linha do máximo. O SQL não infere isso (duas linhas podem empatar na data; com `MAX` e `MIN` juntos, são linhas diferentes; com `AVG`, `COUNT` e `SUM`, nenhuma linha corresponde). Quase todos os bancos dão erro. No MySQL, desde a 5.7, o modo `ONLY_FULL_GROUP_BY` vem ligado; desligado, e no SQLite, o resultado vem sem garantia (no MySQL, o da primeira linha física; no SQLite, o da última), comportamento não documentado e que pode mudar.

Para obter a linha do maior valor por grupo, ver obter a linha com o maior valor por grupo.

## Quando não vale

Colunas com **dependência funcional** são seguras: se se agrupa pela chave estrangeira `reported_by`, o `account_name` da tabela de contas tem um valor só por grupo (o mesmo vale ao agrupar pela chave primária). A maioria dos bancos ainda rejeita; o MySQL e o SQLite permitem, e dá para usar com cuidado. `ANY_VALUE()` (MySQL) suprime a checagem quando não importa qual valor vem.

## Como verificar

Rode as consultas agrupadas com `ONLY_FULL_GROUP_BY` ligado e procure colunas não agrupadas nem agregadas no `SELECT`.

## Notas do Claude

Sem agregação, `DISTINCT` e `GROUP BY` dão o mesmo resultado; o livro prefere `DISTINCT` nesse caso.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[obter-a-linha-com-o-maior-valor-por-grupo]] — o framework resolve o caso de querer a linha do máximo
- [[modelo-relacional-juncoes-e-agregacoes]] — trata de GROUP BY e agregações
- [[regra-trate-null-como-desconhecido]] — COUNT e outras agregações ignoram valores nulos
