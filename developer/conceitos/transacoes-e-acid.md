---
titulo: "Transações e o princípio ACID"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 17, seção 17.6.4 (PDF p. 761-762) e cap. 18, seção 18.2.4 (PDF p. 777-778)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Transações e o princípio ACID

## Definição

Uma transação é um conjunto de comandos SQL executados como uma unidade. O exemplo do livro: uma transferência bancária que consulta o saldo e depois atualiza pode falhar se o usuário abrir duas sessões e disparar duas transferências quase juntas: os dois `SELECT` rodam antes dos `UPDATE`, e os 30 reais de saldo permitem duas transferências de 20.

O princípio ACID:

- **Atomicidade:** ou a transação toda é feita, ou nada.
- **Consistência:** o banco fica válido antes e depois (as chaves estrangeiras não são violadas).
- **Isolamento:** nenhum estado intermediário é visível de fora.
- **Durabilidade:** o que foi confirmado é permanente.

`BEGIN TRANSACTION` abre, `COMMIT` confirma e `ROLLBACK` desfaz o que já foi feito. A maioria dos bancos usa autocommit (cada comando é confirmado na hora), mas isso se pode mudar. Nem todo banco suporta transações, e elas custam desempenho.

No PDO, os métodos equivalentes são `beginTransaction()`, `commit()` e `rollBack()`.

## Por que importa

Garante integridade em operações compostas, como baixar estoque e registrar pedido, ou transferir saldo.

## Como se relaciona

Ver acesso ao banco com PDO. A tabela do MySQL precisa de um motor com suporte a transações (InnoDB; ver chaves estrangeiras no MySQL).

## Notas do Claude

O livro cita ainda os procedimentos armazenados (stored procedures), em que a aplicação PHP só tem permissão de executar rotinas pré-definidas; em MySQL de hospedagem compartilhada, nem sempre estão disponíveis (inferência minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-declare-chaves-estrangeiras]] — esta nota cita a ideia de «Declare as chaves estrangeiras no banco» na seção sobre como se relaciona
- [[acesso-ao-banco-com-pdo]] — esta nota cita a ideia de «Acesso ao banco com PDO» na seção sobre como se relaciona
- [[regra-confira-o-motor-innodb-nas-chaves-estrangeiras]] — transações no MySQL exigem um motor como o InnoDB
- [[modelo-relacional-juncoes-e-agregacoes]] — a consistência ACID protege as relações entre tabelas
- [[regra-trave-o-arquivo-ao-ler-e-gravar]] — é o análogo, em arquivos, do isolamento das transações
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — arquivos externos não seguem transações
- [[indexeddb-banco-de-objetos-no-navegador]] — as transações do IndexedDB são atômicas
- [[mysqli-extensao-do-mysql-para-php]] — as transações também podem ser feitas com mysqli
