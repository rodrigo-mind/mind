---
titulo: "Laços em JavaScript: for, for/of e for/in"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 5, seção 5.4 (PDF p. 115-146)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Laços em JavaScript: `for`, `for/of` e `for/in`

## Definição

- **`for/of` (ES6):** percorre **objetos iteráveis** (vetores, textos, `Set`, `Map`): `for (let x of dados)`. Os vetores são iterados "ao vivo": se o corpo acrescenta elementos, o laço pode nunca acabar. **Objetos comuns não são iteráveis** (dá `TypeError`); use `Object.keys()`, `Object.values()` ou `Object.entries()` com desestruturação (`for (let [k, v] of Object.entries(o))`), que não são "ao vivo". Textos são percorridos por **ponto de código Unicode**, e não por unidade UTF-16 (um texto com dois emojis tem `length` 5, mas o laço roda 3 vezes).
- **`for/in`:** percorre os **nomes das propriedades enumeráveis** de qualquer objeto, inclusive as **herdadas**, mas não as de nome símbolo nem as nativas não enumeráveis. Com `null` ou `undefined`, o laço é pulado. Os índices de um vetor são nomes de propriedade (texto).
- **Instrução vazia no `for`:** `for (let i = 0; i < a.length; a[i++] = 0) ;` mostra o uso do corpo vazio.

## Por que importa

A escolha entre `for/of` e `for/in` evita bugs frequentes.

## Como se relaciona

Veja a regra de usar `for/of` em vez de `for/in` em vetores, vetores e iteração em JavaScript, condicionais em JavaScript e iteração de objetos em PHP.

## Notas do Claude

Confiança alta no `for/of` e no `for/in`; não resumi `while`, `do/while` e o `for` clássico (descrições simples, vistas só de relance), nem `break`, `continue` e rótulos.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[iteracao-de-objetos-em-php]] — esta nota cita a ideia de «Iteração de objetos em PHP» na seção sobre como se relaciona
- [[regra-use-for-of-e-nao-for-in-para-vetores]] — a regra decorrente
- [[vetores-e-iteracao-em-javascript]] — iteração de vetores
- [[sets-e-maps-em-javascript]] — Set e Map são percorridos com for/of
- [[regra-nao-reutilize-regex-global-em-lacos-sem-controlar-lastindex]] — armadilha de estado em laços
