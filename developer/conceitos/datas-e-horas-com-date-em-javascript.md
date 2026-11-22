---
titulo: "Datas e horas com Date em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.4 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Datas e horas com `Date` em JavaScript

## Definição

- **Criação:** `new Date()` (agora); `new Date(ms)` (milissegundos desde 1/1/1970 UTC); `new Date(ano, mês, dia, h, min, s, ms)` no fuso local; `new Date("2100-01-01T00:00:00Z")` (texto ISO); `Date.UTC(...)` para fixar em UTC. **Pegadinha:** o mês começa em 0, o dia do mês em 1; `getDay()` é o dia da semana (0 = domingo) e não tem `setDay`.
- **Campos:** `get`/`set` de `FullYear`, `Month`, `Date`, `Hours`, `Minutes`, `Seconds`, `Milliseconds`, cada um em versão local e `UTC`. Os `set` aceitam estouro (somar 3 meses passa o ano; dia 45 passa o mês).
- **Timestamps:** `getTime()`/`setTime()`; `Date.now()` mede intervalos. `performance.now()` tem fração de milissegundo e conta desde o carregamento da página (o Firefox pode reduzir a precisão por privacidade).
- **Aritmética:** comparar com `<`, `>`; subtrair duas datas dá milissegundos. Somar horas, minutos e segundos pelo timestamp; dias, meses e anos pelos `set`.
- **Texto:** `toISOString()` (ISO 8601, UTC, com `Z`), `toUTCString()`, `toString()` (fuso local, sem localização), `toLocaleString()`, `toLocaleDateString()`, `toLocaleTimeString()` (formatos locais). `Date.parse()` lê o que o construtor lê. Para controle fino na apresentação, use `Intl.DateTimeFormat`.

## Por que importa

Datas são fonte clássica de bugs (fusos, mês zero).

## Como se relaciona

Veja internacionalização com `Intl`, JSON (`Date` vira texto via `toJSON`), temporizadores e comparação em JavaScript.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[internacionalizacao-com-intl-em-javascript]] — Intl.DateTimeFormat formata datas para o usuário
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — Date vira texto no JSON
- [[imutabilidade-datetime-e-datetimeimmutable]] — o Date do JavaScript é mutável, como o DateTime do PHP
