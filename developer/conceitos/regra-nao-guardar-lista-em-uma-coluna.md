---
titulo: "Não guarde uma lista de valores em uma só coluna"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 2 (Jaywalking), p. 28-39"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não guarde uma lista de valores em uma só coluna

## Regra

Para um atributo com vários valores (muitos contatos de um produto, por exemplo), crie uma tabela de interseção, com uma linha por valor, e não uma coluna de texto com os valores separados por vírgula.

## Por quê

O livro chama a lista separada por vírgulas de "Jaywalking" (atravessar fora da faixa), por fugir da tabela de interseção. Os problemas listados:

- Não há chave estrangeira que valide cada item da lista.
- Consultar quem tem o item X, juntar com a outra tabela ou contar itens exige expressões regulares ou gambiarras que não usam índice.
- O limite de tamanho da coluna (VARCHAR) limita sem aviso quantos itens cabem, e depende do tamanho de cada identificador.
- Qualquer caractere escolhido como separador pode aparecer um dia num valor.
- Adicionar, remover e ordenar itens é trabalhoso.

A tabela de interseção, com chave primária composta e chaves estrangeiras para as duas tabelas, resolve tudo isso. Junções, contagens e remoções ficam simples e usam índices.

## Quando não vale

Quando a aplicação só recebe a lista em formato separado por vírgulas e a devolve exatamente igual, sem acessar itens individuais; ou como desnormalização consciente para algum desempenho. O livro avisa para ser conservador: comece normalizado.

## Como verificar

Procure colunas de texto com nomes no plural, ou que o código separe com `explode` ou expressões regulares. Pergunte se alguém já falou "qual o máximo de itens que essa lista aguenta?".

## Notas do Claude

Em PHP com MySQL via PDO, o equivalente do exemplo é uma tabela de ligação com `PRIMARY KEY (a_id, b_id)` e duas `FOREIGN KEY`. O livro cita que PostgreSQL, Oracle, DB2 e Informix têm algum tipo de matriz, que ameniza parte dos problemas sem resolver todos. Não verifiquei esse recurso no MySQL da stack de referência; a tabela de interseção é a opção segura.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-declare-chaves-estrangeiras]] — a tabela de interseção que substitui a lista também usa chaves estrangeiras
- [[regra-chave-primaria-sob-medida]] — a tabela de interseção precisa de chave primária composta
- [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]] — é o mesmo objetivo e a mesma solução de uma relação um para muitos
- [[formas-normais-resumo]] — a 1FN proíbe várias informações em uma coluna
- [[antipadrao-de-sql-o-que-e]] — a regra é um antipadrão no formato objetivo, antipadrão, reconhecer, solução
