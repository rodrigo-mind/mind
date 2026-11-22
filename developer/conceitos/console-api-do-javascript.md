---
titulo: "Console API do JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.8 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Console API do JavaScript

## Definição

Conjunto de funções de registro e depuração, fora do padrão ECMAScript, mas suportado por navegadores e Node (e descrito pela especificação WHATWG). No navegador, a saída vai à aba "Console"; no Node, ao `stdout`.

- **Saída por nível:** `log`, `debug`, `info`, `warn`, `error` (no Node, `error` vai a `stderr`; o navegador permite filtrar por nível).
- **`console.assert(cond, ...)`:** só imprime se a condição for falsa, **sem lançar exceção**. `clear()` limpa.
- **`console.table(dados)`:** mostra um vetor de objetos curtos e homogêneos como tabela (aceita vetor de nomes de colunas).
- **`trace()`:** imprime e mostra a pilha; **`count(rótulo)`** e `countReset()`: contam chamadas; **`group()`, `groupCollapsed()` e `groupEnd()`:** indentam mensagens relacionadas; **`time()`, `timeLog()` e `timeEnd()`:** medem tempo decorrido por rótulo.
- **Formatação:** se o primeiro argumento é um texto com `%s`, `%i`/`%d`, `%f`, `%o`/`%O` ou `%c` (estilos CSS, só no navegador), os demais são substituídos. Em geral basta passar os valores; um `Error` é impresso com sua pilha.

## Por que importa

É a ferramenta de depuração mais usada no dia a dia.

## Como se relaciona

Veja exceções e classes de erro em JavaScript, a regra de não exibir erros na tela em produção (no navegador, não deixe `console.log` de dados sensíveis) e depurar PHP com `var_dump` e Xdebug.

## Notas do Claude

O aviso sobre dados sensíveis no console é uma inferência minha.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[depurar-php-com-var-dump-e-xdebug]] — depuração no lado do servidor
- [[classes-de-erro-do-javascript-e-erros-personalizados]] — console.log de um Error mostra a pilha
- [[regra-nao-exiba-erros-na-tela-em-producao]] — cuidado com detalhes em produção
