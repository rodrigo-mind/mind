---
titulo: "O que os padrões de projeto oferecem (e seus limites)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 14 (PDF p. 588-596)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# O que os padrões de projeto oferecem (e seus limites)

## Definição

Os padrões descrevem problemas comuns e soluções testadas: nomeiam, codificam e organizam a boa prática que já existia (um padrão só é válido se descreve práticas já comuns; a ideia veio da arquitetura, que construía pátios e arcos há milênios antes de os descrever). O livro lista o que se ganha:

- **Testados e comprovados:** são "meio cozidos" (Martin Fowler), ao contrário de receitas, que se seguem às cegas: pedem tratamento ponderado.
- **Um padrão sugere outros:** as consequências de um viram as condições que pedem os complementares; cuidado para não construir uma "extravagância arquitetônica" (um castelo de padrões sem uso).
- **Vocabulário comum:** nomear permite cobrir muito terreno com poucas palavras (e confunde quem ainda não o conhece).
- **Promovem o bom projeto**, mas não são "pó de fada".

**Limites:** os padrões geram emoções quase religiosas, e muitos os veem como modismo; em linguagens como o PHP e o Perl são polêmicos pela associação à orientação a objetos, em um contexto em que os objetos são uma decisão e não um dado. O bom projeto está na **adequação ao propósito**, e a solução bonita nem sempre é a mais eficiente: às vezes um script rápido resolve melhor que uma solução orientada a objetos completa. O código orientado a objetos pode virar uma explosão de classes tão desacopladas que entender suas relações dá dor de cabeça (fábricas que produzem fábricas: um "salão de espelhos"). A aplicação rígida de "boas práticas", como ritual, vira "culto de carga".

## Por que importa

Evita tanto ignorar os padrões quanto usá-los por reflexo.

## Como se relaciona

Ver padrões de projeto, a regra de fazer o mais simples que funcione e o resumo dos princípios de projeto.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padroes-de-projeto]] — esta nota cita a ideia de «Padrões de projeto» na seção sobre como se relaciona
- [[regra-faca-o-mais-simples-que-funcione-antes-de-aplicar-um-padrao]] — a regra decorre dos limites
- [[divida-tecnica]] — excesso de abstração também gera dívida
