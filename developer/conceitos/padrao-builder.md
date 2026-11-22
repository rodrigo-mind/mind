---
titulo: "Padrão Builder (construtor de objetos)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Design patterns, Creational patterns, Builder (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Builder (construtor de objetos)

## Definição

Padrão de criação parecido com a fábrica, para o caso em que montar o objeto tem muitas partes, opções e condições. Em geral há **várias chamadas de método** antes da criação final, enquanto uma fábrica faz tudo em uma chamada. No exemplo do livro, o `QueryBuilder` do Doctrine: `select`, `from`, `where`, `orderBy` e, por fim, `getQuery()`, que devolve a consulta configurada. Os builders costumam usar também a interface fluente.

## Por que importa

Torna legível a criação de objetos complexos, passo a passo.

## Como se relaciona

Veja padrão fluent (interface fluente), padrões Adapter e Factory, padrões de criação de objetos e padrão Facade.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-fluent-interface-fluente]] — «Interface fluente» cita esta nota ao explicar suas relações
- [[padrao-facade]] — esta nota cita a ideia de «Padrão Facade» na seção sobre como se relaciona
- [[padroes-adapter-e-factory]] — esta nota cita a ideia de «Padrões Adapter e Factory» na seção sobre como se relaciona
- [[padroes-de-criacao-de-objetos]] — esta nota cita a ideia de «Padrões de criação de objetos» na seção sobre como se relaciona
- [[padroes-de-projeto]] — mais um padrão de criação
