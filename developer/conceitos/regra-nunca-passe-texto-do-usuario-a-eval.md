---
titulo: "Regra: nunca passe texto vindo do usuário a eval()"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seção 4.12 (PDF p. 79-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Nunca passe texto vindo do usuário a `eval()`

## Regra

Não use `eval()` com nenhum texto derivado de entrada do usuário e, na prática, evite `eval()` por completo.

## Por quê

O livro afirma que, numa linguagem tão complicada, não há como "sanitizar" a entrada para o `eval` ficar seguro. Também impede otimizações do interpretador.

## Quando não vale

Quando se precisa executar um texto de código **confiável** como script independente: use o `eval` indireto (global), que o livro considera o caso mais plausível.

## Como verificar

Procure `eval(` e `new Function(` no código (o segundo é conhecimento meu, a conferir) e rastreie a origem dos textos.

## Notas do Claude

É o mesmo princípio da regra de nunca confiar na entrada do usuário e da de não inserir entrada com `innerHTML`.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[eval-em-javascript]] — a regra decorrente
- [[regra-nunca-confie-na-entrada-do-usuario]] — caso particular do princípio
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — outro vetor de injeção de código no navegador
