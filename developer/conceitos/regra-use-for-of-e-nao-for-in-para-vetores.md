---
titulo: "Regra: use for/of, e não for/in, para percorrer vetores"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 5, seção 5.4.5 (PDF p. 115-146)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use `for/of`, e não `for/in`, para percorrer vetores

## Regra

Para percorrer elementos de vetores (e de outros iteráveis), use `for/of`; reserve `for/in` para nomes de propriedades de objetos, e mesmo assim com cuidado.

## Por quê

O autor diz que é "fonte comum de bugs" no próprio código usar `for/in` com vetores quando queria `for/of`. O `for/in` devolve os índices como texto e também enumera propriedades herdadas enumeráveis, o que pode surpreender se outro código acrescentou propriedades aos protótipos; por isso muitos preferem `for/of` com `Object.keys()` para objetos.

## Quando não vale

Para enumerar propriedades de um objeto de forma simples, o `for/in` funciona se não houver propriedades herdadas indesejadas.

## Como verificar

Procure `for (... in ...)` em variáveis que são vetores.

## Notas do Claude

Combina com a regra de não adicionar métodos aos protótipos nativos (que quebraria `for/in`).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[lacos-em-javascript-for-of-e-for-in]] — a regra decorrente
- [[regra-nao-adicione-metodos-aos-prototipos-dos-tipos-nativos]] — propriedades acrescentadas ao protótipo aparecem no for/in
