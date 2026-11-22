---
titulo: "async e await em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 13, seção 13.3 (PDF p. 385-388)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# async e await em JavaScript

## Definição

Introduzidos no ES2017, simplificam o uso das promessas, permitindo escrever código assíncrono que parece síncrono.

- `await promessa` espera a promessa se estabelecer: se for cumprida, o valor da expressão é o valor da promessa; se for rejeitada, a expressão lança o motivo (que se trata com `try`/`catch`). O `await` não bloqueia o programa: o código continua assíncrono, e o `await` apenas disfarça isso.
- Só se pode usar `await` dentro de funções declaradas `async`. Uma função `async` sempre devolve uma promessa, mesmo sem código com promessas; uma exceção dentro dela rejeita essa promessa. Funciona com funções comuns, expressões, setas e métodos de classes e objetos. Em nível superior, fora de função `async`, trata-se a promessa da forma usual (o livro cita que o `await` no nível superior era só uma proposta e que no console do navegador costuma funcionar).
- Por baixo, uma função `async` equivale a uma função que devolve uma promessa e quebra o corpo em pedaços síncronos a cada `await`.

## Pontos de atenção

- **Esperar várias promessas:** dois `await` em sequência fazem a segunda operação só começar quando a primeira termina. Se forem independentes, rode juntas e espere com `await Promise.all([...])`.
- **Iteração assíncrona:** o laço `for await (const x of fonte)` (ES2018) espera cada promessa gerada por um iterador. Iteráveis assíncronos usam `Symbol.asyncIterator`, e seu `next()` devolve uma promessa para o resultado; os fluxos legíveis do Node 12 são iteráveis assíncronos. Também só vale dentro de função `async`.

## Por que importa

Muito da complexidade das promessas some, e o código fica fácil de ler e de raciocinar. Ainda assim, é importante entender como as promessas funcionam.

## Como se relaciona

Constrói-se sobre as promessas (ver promises em JavaScript).

## Notas do Claude

Na sequência com várias requisições independentes, o ganho de `Promise.all` em vez de `await` em série pode ser grande (inferência minha, a partir da explicação do livro).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[promises-em-javascript]] — esta nota cita a ideia de «Promises em JavaScript» na seção sobre como se relaciona
- [[regra-fetch-so-rejeita-em-falha-de-rede]] — a conferência de response.ok vale também com await
- [[usar-a-api-fetch]] — com async/await são dois await: resposta e corpo
- [[usar-modulos-javascript-no-navegador]] — import() costuma ser usado com await
