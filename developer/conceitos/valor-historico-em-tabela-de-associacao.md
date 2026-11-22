---
titulo: "Valor histórico em tabela de associação não é redundância"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 8, mini-antipadrão Storing Prices (PDF p. 115-116)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Valor histórico em tabela de associação não é redundância

## Definição

Guardar o preço total (ou o preço unitário) na linha de um pedido, mesmo existindo o preço atual do produto em outra tabela, **não** viola a regra de guardar cada fato uma só vez: são fatos diferentes. O preço do pedido é o que o cliente pagou naquele dia, depois dos descontos (promoções, descontos por idade ou associação); o preço da tabela de produtos é o valor atual. Os dois legitimamente divergem.

O mesmo vale para outras tabelas de associação (muitos para muitos): os jogadores de cada time em cada ano (`Lineup`), o nome com que um ator foi creditado em cada filme (`Cast`). Se o valor do atributo naquela ocasião difere do valor de hoje, é preciso guardar o valor da época, e o lugar certo é a tabela de associação.

## Por que importa

Evita o erro de "normalizar demais" e recalcular pedidos antigos com o preço de hoje, o que falsifica o histórico.

## Como se relaciona

É uma exceção sensata às regras de normalização (apêndice do livro, ainda não destilado) e se liga a use NUMERIC para valores exatos (preços em dinheiro).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-use-numeric-para-valores-exatos]] — preços pagos usam tipo numérico exato
- [[modelo-relacional-juncoes-e-agregacoes]] — a tabela de associação é a de muitos para muitos
- [[formas-normais-resumo]] — é uma exceção legítima aparente
