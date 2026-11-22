---
titulo: "Evite o modelo entidade-atributo-valor e modele os subtipos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 6 (Entity-Attribute-Value), p. 80-95"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Evite o modelo entidade-atributo-valor e modele os subtipos

## Regra

Para atributos variáveis por tipo de registro, não use uma tabela genérica de linhas (entidade, nome do atributo, valor). Modele os subtipos em tabelas convencionais.

## Por quê

O EAV (também chamado de esquema aberto ou pares nome-valor) parece flexível, mas o livro lista o que se perde:

- Consultar um atributo exige buscar a linha pelo nome do atributo, o que torna as consultas mais longas e menos claras.
- Não dá para tornar um atributo obrigatório nem usar tipos de dados e restrições do banco.
- Os nomes podem divergir de uma linha a outra (data de registro em colunas ou formatos diferentes), e os valores deixam de ser comparáveis.
- O autor cita consultores segundo os quais sistemas em EAV ficam ingovernáveis em cerca de um ano.

O livro propõe modelar os subtipos. A mais simples é a herança em tabela única: uma tabela com as colunas de todos os tipos e uma coluna que diz o subtipo. Se os dados forem realmente não relacionais, use uma tecnologia própria para isso.

## Quando não vale

Aplicações que precisam de atributos dinâmicos em uma ou duas tabelas podem usar EAV com cuidado e planejando o custo extra. Se o requisito é geral, o livro recomenda um banco não relacional.

## Como verificar

Procure tabelas com colunas como `atributo` e `valor`. Pergunte se a lista de subtipos e seus atributos é finita e conhecida.

## Notas do Claude

Confiança média: li a definição, os problemas e o início das alternativas. As outras formas de modelar subtipos (tabela concreta, tabela de classes, dados semiestruturados) não foram lidas por inteiro.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]] — a tabela de papéis pode cair no modelo EAV
- [[regra-nao-crie-tabelas-ou-colunas-por-valor-de-dado]] — é o inverso do EAV: dados que viram metadados
- [[formas-normais-resumo]] — o EAV viola a regra de uma coluna, um significado
