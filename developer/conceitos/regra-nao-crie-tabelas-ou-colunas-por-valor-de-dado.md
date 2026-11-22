---
titulo: "Não crie tabelas ou colunas por valor de dado (Metadata Tribbles)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 9 (Metadata Tribbles), p. 118-129 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não crie tabelas ou colunas por valor de dado

## Regra

Não divida uma tabela em várias com o valor de um dado no nome (`Bugs_2021`, `Bugs_2022`) e não crie uma coluna por valor (`revenue2002`, `revenue2003`); guarde os dados em uma só tabela, com uma coluna para o valor (o ano) que distingue as linhas.

## Por quê

O erro nasce da ideia de que tabelas com menos linhas são mais rápidas. Mas:
- **Dados criam metadados:** todo ano exige uma tabela ou coluna nova, e esquecer de criá-la derruba a aplicação (o livro cita o relato de falha por falta da tabela do ano novo).
- **Integridade:** nada impede um registro de 2022 na tabela de 2021 (só um `CHECK` por tabela, que precisa ser ajustado a cada nova); alterar uma data pode exigir mover a linha de uma tabela a outra; as chaves primárias precisam ser únicas entre as tabelas (uma sequência única ou uma tabela geradora de IDs).
- **Consultas:** qualquer relatório geral exige `UNION` de todas as tabelas, e a lista cresce todo ano; os nomes de tabela passados como parâmetro viram sinal do problema.
- **Chave estrangeira:** uma tabela dependente (comentários) não consegue referenciar a "tabela mãe" dividida.
- **Estrutura:** acrescentar uma coluna vale só para uma das tabelas, e o `UNION` só funciona com colunas iguais.
- **Colunas:** mesma doença (várias colunas de ano): a solução é uma tabela dependente `ProjectHistory (project_id, year, bugs_fixed)`, com uma linha por ano.

## Quando não vale

**Arquivar** dados históricos (mover registros antigos para outro lugar quando já não se consultam com os atuais) é legítimo, e dividir **bancos** por cliente em escala muito grande também (o livro conta o caso de um serviço de blogs com centenas de servidores). Mas, para desempenho, a solução certa é o particionamento (ver particionamento de tabelas).

## Como verificar

Procure tabelas ou colunas cujo nome termina em ano, mês ou código de cliente, e frases como "uma tabela por...".

## Notas do Claude

"Não deixe os dados gerarem metadados" é a síntese do livro; compare com a regra de não usar EAV (que faz o inverso: guarda metadados como dados).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[particionamento-de-tabelas]] — o particionamento é a alternativa correta
- [[regra-nao-use-eav-modele-subtipos]] — é o inverso do EAV: dados que viram metadados
- [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]] — as duas trocam linhas por colunas
