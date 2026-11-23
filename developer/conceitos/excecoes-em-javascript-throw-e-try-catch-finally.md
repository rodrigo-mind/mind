---
titulo: "Exceções em JavaScript: throw e try/catch/finally"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 5, seções 5.5.6 e 5.5.7 (PDF p. 115-146)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Exceções em JavaScript: `throw` e `try/catch/finally`

## Definição

- **`throw expressão`:** lança qualquer valor, mas o recomendado é um objeto `Error` (ou subclasse), com `name` e `message` (`throw new Error("x não pode ser negativo")`). Erros de execução também lançam exceções. Ao lançar, a execução normal para e vai ao tratador mais próximo, subindo pela pilha de chamadas; sem tratador, o erro é relatado ao usuário.
- **`try/catch/finally`:** o `try` delimita o código monitorado; o `catch (e)` roda só se houver exceção (o `e` tem escopo de bloco) e pode tratar, ignorar ou relançar; o `finally` roda **sempre** que parte do `try` rodou: ao fim normal, com `break`, `continue` ou `return`, com exceção tratada ou com exceção não tratada em propagação. `catch` e `finally` são opcionais, mas é preciso pelo menos um; as chaves são obrigatórias.
- **`return` e `yield`:** não se pode quebrar a linha entre `return` e a expressão (inserção automática de `;`).

## Por que importa

É o mecanismo de tratamento de erros da linguagem.

## Como se relaciona

Veja níveis de erro e `set_error_handler` em PHP (outro modelo), promises em JavaScript, a regra de não exibir erros na tela em produção e usar a API fetch.

## Notas do Claude

Confiança alta no que li; o detalhe do comportamento do `finally` com `return` dentro dele não foi lido e não está aqui.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[promises-em-javascript]] — esta nota cita a ideia de «Promises em JavaScript» na seção sobre como se relaciona
- [[niveis-de-erro-e-set-error-handler]] — modelo de erros em PHP
- [[regra-nao-exiba-erros-na-tela-em-producao]] — não exibir detalhes de erros ao usuário
- [[classes-de-erro-do-javascript-e-erros-personalizados]] — como lançar e tratar
- [[tratar-erros-com-excecoes-em-php]] — o tratamento de exceções em PHP tem o mesmo desenho do JavaScript
