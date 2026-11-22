---
titulo: "Acesso condicional e invocação condicional (?. e ?.())"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seções 4.4.1 e 4.5.1 (PDF p. 79-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Acesso condicional e invocação condicional (`?.` e `?.()`)

## Definição

Novidade da ES2020. Em `.` e `[]`, se o lado esquerdo é `null` ou `undefined`, ocorre `TypeError` (são os dois únicos valores sem propriedades). Com **`?.`**, **`?.[ ]`** e **`?.()`**, se o lado esquerdo for `null` ou `undefined`, a expressão inteira vira `undefined`, sem erro.

- É **curto-circuito** ("encadeamento opcional"): em `a.b?.c.d`, se `a.b` é `null`, o resto da cadeia nem é avaliado. Mas `(a.b?.c).d` com parênteses lança erro. Se `a.b` é um objeto sem `c`, é preciso `a.b?.c?.d`.
- **Efeitos colaterais são pulados:** em `a?.[index++]` com `a` indefinido, `index` não incrementa.
- **`?.()`** chama a função só se existir: `log?.(x)` no lugar de `if (log) log(x)`. Verifica só `null`/`undefined`, não se o valor é função (um número ainda dá erro).
- **Três formas de método:** `o.m()` (objeto e método devem existir), `o?.m()` (`o` pode ser nulo) e `o.m?.()` (o método pode faltar).

## Por que importa

Dispensa cadeias de `if` e `&&` ao ler dados aninhados, por exemplo de respostas de API.

## Como se relaciona

Veja operadores lógicos e valores padrão (`??`), usar a API fetch (dados de resposta) e objetos como vetores associativos.

## Notas do Claude

O livro (início de 2020) diz que o suporte estava só nas versões atuais ou beta dos navegadores; hoje é amplamente suportado (conhecimento meu, a conferir no público-alvo).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[operadores-logicos-e-valores-padrao-em-javascript]] — ?. e ?? tratam valores ausentes
- [[usar-a-api-fetch]] — útil para ler dados aninhados de respostas
- [[parametros-opcionais-e-rest-em-javascript]] — ?.() substitui o teste de função opcional
