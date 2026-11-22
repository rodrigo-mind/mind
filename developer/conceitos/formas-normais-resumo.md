---
titulo: "Formas normais: resumo da 1FN à 6FN"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, apêndice 1 (Rules of Normalization), p. 340-354 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Formas normais: resumo da 1FN à 6FN

## Definição

"Relacional" se refere à tabela em si (a relação entre as colunas), e não às ligações entre tabelas. Para ser uma relação: as linhas não têm ordem; as colunas não têm ordem; não há linhas duplicadas (uma chave primária ou única identifica cada linha); cada coluna tem um tipo e um valor por linha, com o mesmo significado em todas as linhas (o EAV e as associações polimórficas violam isto); não há componentes ocultos (identificadores físicos de linha, como `ROWNUM` do Oracle).

A **normalização** tem por objetivos representar os fatos do mundo de modo compreensível, reduzir a redundância e as anomalias e apoiar as restrições de integridade. Desempenho não está na lista, mas o custo da limpeza de dados inconsistentes costuma ser o maior.

| Forma | Exige | Exemplo do livro |
|---|---|---|
| 1FN | é uma relação, sem grupos repetidos (nem colunas semelhantes `tag1`, `tag2`, nem lista em uma coluna) | tabela de etiquetas, uma linha por etiqueta (ver não crie colunas numeradas) |
| 2FN | só difere da 1FN com chave composta: nenhum atributo depende de parte da chave | o `coiner` da etiqueta vai para uma tabela `Tags`, e não repetido em cada `BugsTags` |
| 3FN | todo atributo que não é chave depende da chave (e só dela) | o e-mail de quem foi designado fica em `Accounts`, não em `Bugs` |
| Boyce-Codd | a regra vale também para colunas-chave, quando há várias chaves candidatas | o tipo da etiqueta vai para `Tags` |
| 4FN | uma tabela de associação não faz "trabalho duplo": uma por relação muitos-para-muitos | `BugsReported`, `BugsAssigned` e `BugsVerified` em vez de uma só `BugsAccounts` |
| 5FN | fatos de relações independentes em tabelas separadas | `EngineerProducts` (em que produtos o engenheiro pode atuar) separada de `BugsAssigned` |
| DKNF | toda restrição decorre das restrições de domínio e de chave | regras entre colunas comuns (status e horas) exigem `CHECK` ou gatilho |
| 6FN | elimina dependências de junção; guarda histórico de atributos | quase uma tabela de histórico por coluna; exagero para quase tudo (usada em modelagem temporal) |

Cada forma normal inclui as anteriores. O livro cita um estudo em que mais de 20% dos bancos comerciais atendiam as três primeiras formas e violavam a quarta.

## Por que importa

É a base para decidir onde cada fato fica guardado, e explica as regras de modelagem do restante do livro (tabelas dependentes, chaves estrangeiras, tabelas de associação).

## Como se relaciona

Ver normalize primeiro e desnormalize só com medição, valor histórico em tabela de associação (exceção legítima) e não guardar lista em uma coluna.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-declare-chaves-estrangeiras]] — esta nota cita a ideia de «Declare as chaves estrangeiras no banco» na seção sobre como se relaciona
- [[regra-normalize-primeiro-e-desnormalize-so-com-medicao]] — a regra tira a consequência prática das formas normais
- [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]] — a 1FN proíbe colunas semelhantes
- [[regra-nao-guardar-lista-em-uma-coluna]] — a 1FN proíbe várias informações em uma coluna
- [[regra-nao-use-eav-modele-subtipos]] — o EAV viola a regra de uma coluna, um significado
- [[regra-nao-use-associacao-polimorfica]] — a associação polimórfica viola a mesma regra
- [[valor-historico-em-tabela-de-associacao]] — é uma exceção legítima aparente
- [[modelo-relacional-juncoes-e-agregacoes]] — a normalização leva a mais tabelas ligadas por chave estrangeira
