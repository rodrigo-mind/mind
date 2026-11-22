---
titulo: "Não renumere chaves primárias nem reaproveite IDs"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 22 (Pseudokey Neat-Freak), p. 276-283 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não renumere chaves primárias nem reaproveite IDs

## Regra

Aceite as lacunas na sequência de uma chave primária gerada pelo banco: não preencha os buracos com novos registros, não renumere as linhas existentes e não reutilize o ID de um registro apagado.

## Por quê

- **Preencher lacunas** exige uma consulta extra para achar o menor valor livre, e dois clientes simultâneos podem pegar o mesmo número (um dos dois falha).
- **Renumerar** exige achar o valor livre, atualizar a chave e propagar a mudança a todas as tabelas filhas (fácil só com `ON UPDATE CASCADE`), com risco de concorrência e de interromper o serviço. Além disso dura pouco: o gerador sempre dá um valor maior que o último que gerou (e não o maior atualmente na tabela), então uma nova lacuna aparece de imediato.
- **Sistemas externos** que se referem às linhas pelo ID, os rótulos impressos em equipamentos e os relatórios trimestrais quebram: na história do livro, os bens renumerados deixaram de bater com os relatórios da contabilidade e com as etiquetas físicas, e os bens novos receberam números já usados antes.
- **Reaproveitar um ID** pode atribuir a uma pessoa nova a culpa que pertencia a quem foi banido (o caso da conta 789, com e-mails ofensivos ainda pendentes).
- As lacunas são inofensivas: nascem de linhas apagadas ou de transações desfeitas, e o gerador não volta atrás (se voltasse, haveria bloqueio ou corrida entre clientes).

## Quando não vale

Se a chave **tem significado** (código de produto, número de nota), ela é uma chave natural, e mudar o valor é comum; aí as lacunas se explicam pelo próprio significado.

## Como verificar

Procure consultas para "o primeiro ID livre", `UPDATE` em colunas de chave primária e perguntas como "o que houve com o ID 4?".

## Notas do Claude

O livro aconselha a conversar com o gestor: explicar que as lacunas são normais, estimar o custo real da mudança e, se for preciso exibir números contínuos, usar uma chave natural ou numerar na consulta (ver numerar linhas do resultado com ROW_NUMBER).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-chave-primaria-sob-medida]] — a regra sobre pseudochaves complementa a escolha da chave
- [[regra-declare-chaves-estrangeiras]] — renumerar exige propagar por chaves estrangeiras
- [[numerar-linhas-do-resultado-com-row-number]] — a numeração contínua se faz na consulta
