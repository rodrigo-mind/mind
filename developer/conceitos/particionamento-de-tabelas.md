---
titulo: "Particionamento de tabelas: horizontal e vertical"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 9, seção Solution: Partition and Normalize (PDF p. 125-128)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Particionamento de tabelas: horizontal e vertical

## Definição

Alternativas corretas para uma tabela grande, em vez de dividir à mão:

- **Horizontal** (também chamado de sharding em alguns contextos): define-se uma tabela lógica com uma regra de separação das linhas em partições, e o banco cuida do resto: fisicamente a tabela se divide, mas as consultas usam a tabela inteira. Exemplo em MySQL: `PARTITION BY HASH (bug_id) PARTITIONS 4`. As linhas nunca caem na partição errada, mesmo se a data muda, e não é preciso consultar as partes. Não é parte do padrão SQL; a sintaxe varia, mas todas as grandes marcas oferecem algo.
- **Vertical:** divide por **colunas**. Colunas volumosas ou pouco usadas (BLOB, TEXT, como o instalador de um produto) vão para uma tabela separada, cuja chave primária também é chave estrangeira da tabela principal (no máximo uma linha por linha-mãe); assim, consultas com `SELECT *` não carregam bytes à toa. No MyISAM, linhas de tamanho fixo são mais rápidas; colunas de tamanho variável (VARCHAR) podem ir para outra tabela.
- **Tabelas dependentes:** o remédio para colunas que se multiplicam (ver regra de tabelas ou colunas por valor).

## Por que importa

Resolve o desempenho de tabelas grandes sem criar os problemas de integridade e de consulta da divisão manual.

## Como se relaciona

Complementa não crie tabelas ou colunas por valor de dado; a ideia de separar BLOBs está em imagens: BLOB ou arquivo.

## Notas do Claude

Para o projeto (MySQL em hospedagem compartilhada), o particionamento nem sempre está disponível, e raramente é necessário até a tabela ter milhões de linhas; um índice bem pensado (ver índices com o método Mentor) vem antes (inferência minha).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-nao-crie-tabelas-ou-colunas-por-valor-de-dado]] — o particionamento é a alternativa correta
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — separar BLOBs é um particionamento vertical
- [[indices-com-o-metodo-mentor]] — os índices vêm antes de particionar
