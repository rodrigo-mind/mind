---
titulo: "Faça o mais simples que funcione antes de aplicar um padrão"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 14 (PDF p. 588-596)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Faça o mais simples que funcione antes de aplicar um padrão

## Regra

Resolva o problema do jeito mais simples que funcione e só refatore para um padrão quando aparecer a necessidade real (KISS: "mantenha simples"; YAGNI: "você não vai precisar disso", ou seja, não implemente algo que não é exigido).

## Por quê

O autor conta que, no começo, criava Abstract Factories por todo o código: os conjuntos de objetos eram relacionados, mas não havia implementações alternativas; criar classes de fábrica para cada tipo e uma classe que serve a fábrica era trabalho desnecessário, e uma fábrica básica seria mais limpa, com a refatoração para a Abstract Factory somente se surgisse a necessidade de gerar um conjunto paralelo. Do mesmo modo, só se cria um pai abstrato quando uma implementação passa a fazer mais de uma coisa. "Usar padrões" não garante bom projeto; o problema deve determinar a solução, e não uma lista de boas práticas.

## Quando não vale

Quando já se sabe que haverá alternativas (por exemplo, testes que exigem trocar a implementação), aí a abstração inicial se justifica (inferência minha).

## Como verificar

Para cada abstração (interface, fábrica, camada), pergunte: "que segunda implementação ou variação existe hoje?". Sem resposta, adie.

## Como se relaciona

Ver o que os padrões oferecem e seus limites e padrões de criação de objetos.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[padroes-de-criacao-de-objetos]] — esta nota cita a ideia de «Padrões de criação de objetos» na seção sobre como se relaciona
- [[o-que-os-padroes-de-projeto-oferecem-e-seus-limites]] — a regra decorre dos limites
- [[regra-nao-resolva-um-problema-complexo-em-uma-consulta-so]] — a lei da parcimônia também vale para consultas SQL
