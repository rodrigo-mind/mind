---
titulo: "eval() em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seção 4.12 (PDF p. 79-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# `eval()` em JavaScript

## Definição

Função global que interpreta um texto como código JavaScript e devolve o valor da última expressão. O livro a descreve como recurso poderoso "quase nunca necessário" e **falha de segurança em potencial**; alguns servidores desabilitam `eval()` no site todo com o cabeçalho `Content-Security-Policy`.

- **`eval` direto** (chamado exatamente como `eval(...)`): usa o ambiente de variáveis de quem chama; lê e altera variáveis locais; `var` e `function` definem no escopo local, mas `let` e `const` ficam locais à avaliação. O texto precisa fazer sentido sozinho (`eval("return;")` dá `SyntaxError`).
- **`eval` indireto** (por outro nome, `const geval = eval`): roda como código global, sem acessar nem alterar locais; é a forma mais útil quando realmente se precisa executar um texto como script independente.
- **Modo estrito:** `eval` direto usa um ambiente privado (pode ler e alterar locais, mas não declarar variáveis ou funções no escopo local), e `eval` vira quase palavra reservada.
- Funções que chamam `eval` são menos otimizadas pelos interpretadores.

## Por que importa

É um vetor clássico de injeção de código.

## Como se relaciona

Veja a regra de nunca passar entrada do usuário ao `eval`, modo estrito em JavaScript e o modelo de segurança da web no navegador.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modo-estrito-em-javascript]] — esta nota cita a ideia de «Modo estrito em JavaScript» na seção sobre como se relaciona
- [[regra-nunca-passe-texto-do-usuario-a-eval]] — a regra decorrente
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — não decodificar JSON com eval
