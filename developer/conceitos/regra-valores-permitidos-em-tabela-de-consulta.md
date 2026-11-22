---
titulo: "Guarde os valores permitidos em uma tabela de consulta, e não na definição da coluna"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 11 (31 Flavors), p. 140-149"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Guarde os valores permitidos em uma tabela de consulta

## Regra

Para restringir uma coluna a um conjunto de valores que pode mudar (status de um chamado, por exemplo), crie uma tabela de consulta com esses valores e uma chave estrangeira, em vez de `ENUM`, `CHECK` ou gatilhos.

## Por quê

Valores na definição da coluna ficam nos metadados, e mudar a lista exige alterar a estrutura da tabela. O `ENUM` do MySQL ordena pelo número da posição e não pelo texto, o que surpreende. Com a tabela de consulta:

- A lista é lida com `SELECT`, e fica fácil preencher a tela.
- Adicionar ou renomear valores é um `INSERT` ou `UPDATE`, sem redefinir colunas; com `ON UPDATE CASCADE` as referências acompanham.
- Valores obsoletos podem ser marcados como inativos em vez de apagados, mantendo o histórico.
- Dá para guardar atributos por valor, o que `ENUM` e `CHECK` não permitem.
- É portátil: usa só chave estrangeira padrão.

Resumo do livro: use metadados para um conjunto fixo de valores, e dados para um conjunto fluido.

## Quando não vale

Para um conjunto realmente fixo e pequeno de valores, que nunca mudará, o metadado é aceitável.

## Como verificar

Procure `ENUM(...)` ou `CHECK (coluna IN (...))` em colunas de status, tipo ou categoria que já mudaram alguma vez.

## Notas do Claude

O mini-antipadrão de "palavras reservadas" do mesmo capítulo vale lembrar: não use palavras reservadas do SQL, como `order`, como nome de coluna ou de tabela.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[enums-em-php]] — «Enumerações em PHP 8.1» cita esta nota ao explicar suas relações
- [[regra-trate-null-como-desconhecido]] — ambas tratam de como o banco guarda valores ausentes e conjuntos de valores
