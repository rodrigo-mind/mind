---
titulo: "No MySQL, confira o motor InnoDB e as colunas ao declarar chaves estrangeiras"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 26, p. 320-331"
  - "Bill Karwin, SQL Antipatterns, cap. 27, p. 332-335"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# No MySQL, confira o motor InnoDB e as colunas ao declarar chaves estrangeiras

## Regra

Ao criar chaves estrangeiras no MySQL, confirme que as duas tabelas usam InnoDB, crie a tabela pai primeiro, declare a restrição na tabela do lado "muitos", e referencie uma chave primária ou única com colunas de mesmo tipo.

## Por quê

Os erros que o livro lista (com as mensagens do MySQL 8.0):

- **Direção invertida:** a chave estrangeira vai na tabela filha (o lado "muitos"). Na tabela pai, ela faria cada pai ter só um filho.
- **Ordem de criação:** referenciar uma tabela que ainda não existe falha (erro 1824). Com referências cíclicas, crie as tabelas e acrescente a restrição depois com `ALTER TABLE`.
- **Sem chave na tabela pai:** as colunas referenciadas devem ser chave primária ou única (erro 1822, "índice ausente").
- **Motor sem suporte:** se a tabela filha usa um motor que não suporta chaves estrangeiras, o MySQL ignora a restrição sem erro nem aviso (o livro explica que isso vem de uma decisão histórica de aceitar arquivos de outros bancos). Confira com `SHOW CREATE TABLE`. As tabelas devem ser InnoDB, o padrão atual.
- **Colunas grandes (BLOB/TEXT):** não podem ter chave nem chave estrangeira; um índice de prefixo não serve de chave estrangeira. A saída do livro é uma pseudochave.
- **Índice não único:** o InnoDB aceita referenciar um índice não único, desde que as colunas referenciadas sejam as mais à esquerda do índice; isso é uma extensão fora do padrão.

## Quando não vale

Não há exceção listada; os mini-antipadrões são para evitar.

## Como verificar

Rode `SHOW CREATE TABLE` e confirme `ENGINE=InnoDB` e a presença de cada `FOREIGN KEY`. Procure erros 1822 e 1824 nas migrações.

## Notas do Claude

Confiança média: li o capítulo 26 até a sexta ocorrência e o capítulo 27 até o índice não único; os demais itens (colunas de compostos, ordem de colunas, tipos e collations incompatíveis, órfãos, SET NULL e nomes duplicados) ficaram sem leitura.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[transacoes-e-acid]] — transações no MySQL exigem um motor como o InnoDB
