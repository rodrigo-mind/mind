---
titulo: "Declare as chaves estrangeiras no banco"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 5 (Keyless Entry), p. 72-79"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Declare as chaves estrangeiras no banco

## Regra

Declare `FOREIGN KEY` para toda relação entre tabelas, em vez de confiar que o código da aplicação nunca erra.

## Por quê

- Sem a restrição, a integridade referencial depende de o código verificar antes de cada inserção, alteração ou exclusão. Isso exige consultas extras e, para ser seguro com acesso simultâneo, travar tabelas, o que não escala. O livro lembra que "um em um milhão é na próxima terça".
- A alternativa de escrever scripts que procuram linhas órfãs periodicamente reinventa a roda e fica mais lenta e mais longa a cada tabela.
- O livro usa a ideia japonesa de poka-yoke (à prova de erro): em vez de caçar erros de integridade depois, impeça-os de entrar.
- No exemplo do livro, um sistema de reserva de equipamentos em MySQL com o motor MyISAM, que não suportava chaves estrangeiras, passou a ter reservas duplicadas.

## Quando não vale

Há razões legítimas: o banco ou o motor não suporta chaves estrangeiras (MyISAM, SQLite antes da 3.6.19), limpezas de dados em que se sabe de linhas órfãs, ou ferramentas de alteração de tabelas que ficam mais simples sem elas. Nesses casos é preciso compensar de outro modo, como scripts de verificação.

## Como verificar

Procure colunas `*_id` sem `FOREIGN KEY` declarada e tabelas MyISAM. Confira se o esquema usa InnoDB.

## Notas do Claude

No MySQL, as chaves estrangeiras exigem o motor InnoDB e tipos de coluna compatíveis entre as duas pontas. O livro dedica os capítulos 26 e 27 a erros comuns ao declará-las, que ainda não foram destilados.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-nao-use-associacao-polimorfica]] — a associação polimórfica impede declarar a chave estrangeira que esta regra pede
- [[regra-nao-guardar-lista-em-uma-coluna]] — a tabela de interseção que substitui a lista também usa chaves estrangeiras
- [[transacoes-e-acid]] — «Transações e o princípio ACID» cita esta nota ao explicar suas relações
- [[modelo-relacional-juncoes-e-agregacoes]] — «Modelo relacional, junções» cita esta nota ao explicar suas relações
- [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]] — a tabela dependente precisa da chave estrangeira
- [[regra-nomeie-as-colunas-explicitamente]] — a estrutura estável é parte do contrato do banco
- [[formas-normais-resumo]] — «Formas normais: resumo da 1FN à 6FN» cita esta nota ao explicar suas relações
- [[regra-nao-renumere-chaves-primarias-nem-reaproveite-ids]] — renumerar exige propagar por chaves estrangeiras
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
