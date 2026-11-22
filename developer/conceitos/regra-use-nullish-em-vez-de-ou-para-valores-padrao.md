---
titulo: "Regra: use ?? em vez de || para valores padrão"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seções 4.10.2 e 4.13.2 (PDF p. 79-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use `??` em vez de `||` para valores padrão

## Regra

Quando o valor padrão deve entrar só se o valor for ausente (`null` ou `undefined`), use `??`; use `||` apenas se **qualquer** valor falsy deve ser trocado.

## Por quê

`maxWidth || 500` descarta um `0` legítimo, e o mesmo vale para `""` e `false`; `maxWidth ?? 500` mantém esses valores. O livro mostra com um objeto de opções em que `timeout: 0`, `title: ""` e `verbose: false` são respeitados.

## Quando não vale

Quando o valor vazio ou zero também deve virar o padrão (por exemplo, texto em branco digitado pelo usuário), `||` é a escolha certa.

## Como verificar

Procure `|| literal` em atribuições de padrão e pergunte se `0`, `""` ou `false` são válidos ali.

## Notas do Claude

Ao misturar com `&&` ou `||`, lembre dos parênteses obrigatórios. Em ambientes sem suporte à ES2020, `??` precisa de transpilação.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[operadores-logicos-e-valores-padrao-em-javascript]] — a regra decorrente
- [[regra-use-sempre-a-comparacao-identica-em-php]] — a mesma preocupação com valores falsy em PHP
