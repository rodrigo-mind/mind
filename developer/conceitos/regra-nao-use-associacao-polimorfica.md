---
titulo: "Não use uma chave estrangeira de duplo propósito (associação polimórfica)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 7 (Polymorphic Associations), p. 96-107"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não use uma chave estrangeira de duplo propósito

## Regra

Quando uma tabela (por exemplo, comentários) precisa se ligar a mais de uma tabela pai (bugs e pedidos de recurso), não use uma coluna de chave mais uma coluna com o nome da tabela. Crie tabelas de interseção, uma por pai, e use chaves estrangeiras.

## Por quê

Na associação polimórfica, uma coluna guarda o identificador e outra, o nome da tabela referenciada. O problema:

- Não dá para declarar uma chave estrangeira que aponte para várias tabelas. O banco não impede um identificador inexistente nem um nome de tabela inválido.
- Consultas precisam de junções externas para todas as tabelas pai, e é preciso usar a coluna do tipo na junção para não casar o identificador com a tabela errada.
- Diagramas de relacionamento não têm notação oficial para isso.

Solução do livro, "inverter a referência": cada tabela de interseção liga os comentários a um dos pais, com chave estrangeira para os dois lados. Adicionar `UNIQUE` em `comment_id` em cada tabela de interseção evita que um comentário pertença a vários bugs, mas impedir que pertença a um bug e a um pedido ao mesmo tempo continua a cargo da aplicação.

## Quando não vale

Pode ser inevitável com um framework de mapeamento objeto-relacional (como o Hibernate ou o Rails), que encapsula a lógica de integridade. Prefira um framework maduro nesse caso.

## Como verificar

Procure colunas com nomes como `*_type` ou `parent_type` junto a uma coluna `*_id`, sem `FOREIGN KEY`.

## Notas do Claude

A stack de referência (PHP puro) não usa framework, então a solução com tabelas de interseção deve ser a regra.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-declare-chaves-estrangeiras]] — a associação polimórfica impede declarar a chave estrangeira que esta regra pede
- [[formas-normais-resumo]] — a associação polimórfica viola a mesma regra
