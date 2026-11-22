---
titulo: "Escolha o modelo de árvore pelas consultas de que você precisa"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 3 (Naive Trees), p. 40-59"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Escolha o modelo de árvore pelas consultas de que você precisa

## Regra

Para dados hierárquicos (comentários com respostas, organogramas, categorias), não adote por padrão só a coluna `parent_id` (lista de adjacência). Escolha o modelo conforme as consultas que a aplicação vai fazer.

## Por quê

O modelo simples (cada linha aponta para o pai) é fácil de gravar, mas é difícil buscar todos os descendentes ou todos os ancestrais de um nó de profundidade qualquer. O livro apresenta alternativas, cada uma com pontos fortes e custos:

| Modelo | Como funciona | Bom para | Custo |
|---|---|---|---|
| Lista de adjacência | `parent_id` em cada linha | Árvores rasas, ou com consultas recursivas | Descendentes e ancestrais exigem consultas recursivas |
| Consulta recursiva | `WITH RECURSIVE` sobre a lista de adjacência | Quando o banco suporta (no MySQL, a partir da versão 8.0) | Depende do banco |
| Enumeração de caminho | Coluna com o caminho de ancestrais, como `1/4/6/` | Obter ancestrais com facilidade | Integridade do caminho fica por conta da aplicação |
| Conjuntos aninhados | Dois números por nó (esquerda e direita) pela travessia em profundidade | Consultas de subárvore rápidas; apagar um nó não de folha reaproveita os filhos | Inserir e mover nós é complexo e exige renumerar |
| Tabela de fechamento | Tabela à parte com todos os pares ancestral e descendente | Consultas simples nos dois sentidos, e mover subárvores | Mais linhas e uma tabela extra |

## Quando não vale

A lista de adjacência basta se a árvore tem profundidade limitada e você não precisa dos descendentes. O livro conta que um sistema de inventário que previa profundidade ilimitada nunca passou de um nível, e a engenharia a mais foi desperdício.

## Como verificar

Liste as consultas que a tela precisa (todos os filhos? o caminho até a raiz? a subárvore?). Para cada modelo, veja se elas ficam simples. Se alguém diz "quantos níveis precisamos suportar?", o modelo atual provavelmente está limitando.

## Notas do Claude

Confiança média: li com atenção a lista de adjacência, a consulta recursiva, os conjuntos aninhados e a tabela de fechamento; a enumeração de caminho só em parte. Em MySQL 5.7 ou anterior, a consulta recursiva não existe, e o livro dá a versão 8.0 como a que a introduziu.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
