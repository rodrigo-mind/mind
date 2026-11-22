---
titulo: "Modelo relacional, junções (joins) e funções de agregação"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 17, seções 17.6.1 a 17.6.3 (PDF p. 755-760)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Modelo relacional, junções e agregações

## Definição

- **Redundância e chave estrangeira:** se a mesma informação (nome e e-mail de quem assina um livro de visitas) se repete em muitas linhas, é melhor guardá-la em outra tabela, e a tabela de entradas passa a guardar só a chave primária do usuário (`user_id`), a chave estrangeira. As tabelas se relacionam pela chave estrangeira, daí "modelo relacional". Cada administrador tem o seu esquema de nomes da chave: `id` ou `nome_da_tabela_id`.
- **Junção (join):** une as tabelas em uma só consulta, para obter, por exemplo, as entradas de um usuário pelo nome. O livro mostra o estilo "teta" (`FROM entry, user WHERE entry.user_id = user.id AND ...`) e a forma longa (`JOIN user ON entry.user_id = user.id`). Há tipos (interna, externa, esquerda e direita). Colunas de nome repetido se escrevem como `tabela.coluna`.
- **Agregações:** `COUNT(*)` conta linhas; `COUNT(coluna)` conta valores não nulos; `COUNT(DISTINCT coluna)` conta valores diferentes; `MIN`, `MAX`, `SUM` e `AVG` valem para números. Com `GROUP BY`, agrupam por coluna (por exemplo, o número de entradas de cada usuário).
- **Apelidos:** `AS` dá nomes práticos às colunas do resultado, e um apelido curto de tabela (`entry e`) poupa digitação.

## Por que importa

Evita redundância e inconsistência, e permite relatórios em uma só consulta.

## Como se relaciona

Chaves estrangeiras devem ser declaradas no banco (ver regra de declarar chaves estrangeiras). O livro de SQL Antipatterns trata de erros comuns ao modelar e consultar.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-declare-chaves-estrangeiras]] — esta nota cita a ideia de «Declare as chaves estrangeiras no banco» na seção sobre como se relaciona
- [[sql-basico-para-aplicacoes-web]] — o modelo relacional continua o SQL básico
- [[regra-trate-null-como-desconhecido]] — COUNT(coluna) ignora valores nulos
- [[transacoes-e-acid]] — a consistência ACID protege as relações entre tabelas
- [[valor-historico-em-tabela-de-associacao]] — a tabela de associação é a de muitos para muitos
- [[regra-siga-a-regra-do-valor-unico-no-group-by]] — trata de GROUP BY e agregações
- [[produto-cartesiano-nao-intencional]] — trata de junções sem condição
- [[formas-normais-resumo]] — a normalização leva a mais tabelas ligadas por chave estrangeira
- [[tabelas-em-html5]] — a grade de linhas e colunas lembra a tabela de dados
