---
titulo: "Padrão Repository (repositório) e entidades"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 8, seção sobre o Model (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Repository (repositório) e entidades

## Definição

- **Entidade:** uma unidade de dados que representa uma coisa só (uma categoria, um post), com nome que faz sentido na linguagem do negócio. No exemplo do livro, a entidade é um DTO imutável com identificador único, nome e uma coleção de entidades relacionadas.
- **Repository:** resolve como buscar entidades na camada de persistência. Cada repositório cuida de **um** tipo de entidade e tem métodos como `load($id)` e `loadAll()`, e às vezes outros como `loadByName()`. Também pode gravar as entidades alteradas, ou essa tarefa pode ficar em outra classe.
- **Interface do repositório:** declarar o tipo pela interface, e não pela classe concreta, permite testar quem usa o repositório (como um controlador) com um **stub**: um repositório falso que devolve dados de teste sem tocar no banco.
- **UUID:** os autores preferem identificadores UUID, gerados pelo próprio código, ao autoincremento do banco. Assim dá para montar um grupo de entidades relacionadas e só depois gravar tudo. Eles sugerem a biblioteca `ramsey/uuid`.
- **ORM:** traduz objetos em tabelas, linhas e chaves estrangeiras (o favorito dos autores é o Doctrine). Mas é uma "abstração com vazamento" (leaky abstraction): como o banco costuma ser o primeiro gargalo, uma hora será preciso olhar o SQL gerado. Usar ORM não dispensa conhecer o banco.

## Por que importa

Concentra o SQL de cada entidade num lugar só, longe das páginas e dos controladores, e torna testáveis as classes que dependem de dados.

## Como se relaciona

É uma alternativa mais simples ao mapeador de dados (data mapper), dentro dos padrões de banco de dados. A camada fica dentro do padrão MVC. Os resultados múltiplos voltam como uma coleção tipada (ver padrão Collection). O acesso fica em acesso ao banco com PDO.

## Notas do Claude

- Na stack do projeto: um `ProdutoRepositorio` com PDO e consultas preparadas, métodos `buscarPorId(int $id): ?Produto` e `listarAtivos(): array`, recebendo o `PDO` no construtor (inferência minha).
- Com MySQL, UUID como chave primária tem custo de índice. Avalie `BINARY(16)` ou mantenha o autoincremento (inferência minha; ver as regras de chave primária do SQL Antipatterns).

## Conexões

- [[padrao-collection-colecao-tipada]] — o repositório devolve coleções tipadas
- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[mapeador-de-dados-data-mapper]] — é uma alternativa mais simples ao mapeador de dados
- [[padroes-de-banco-de-dados-visao-geral]] — é um dos padrões de acesso a dados da visão geral
- [[acesso-ao-banco-com-pdo]] — o repositório é onde o PDO e o SQL ficam concentrados
- [[padrao-mvc-modelo-visao-controlador]] — o repositório pertence à camada de modelo do MVC
- [[arquitetura-em-camadas]] — isola o acesso a dados em uma camada própria
- [[regra-chave-primaria-sob-medida]] — o uso de UUID em vez de autoincremento pesa na escolha da chave primária
