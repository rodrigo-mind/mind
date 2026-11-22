---
titulo: "Regra: compare o retorno de strpos com === false"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 35, seção 35.3 (PDF p. 1294-1295)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Compare o retorno de strpos com === false

## Regra

Teste o resultado de `strpos()` (e de funções parecidas, como `array_search`) com `=== false` ou `!== false`, nunca com `if ($posicao)` ou `== -1`.

## Por quê

`strpos()` conta as posições a partir de **0**; se o texto procurado está no começo, o retorno é `0`, que como booleano vale `false`, e o `if` não entra. Era o erro do programa de exemplo do livro: a linha 3 começava com `http://`, e a URL não era achada. Quando o texto não existe, o retorno é `false` (e não `-1`, como o código errado supunha); o `===` distingue o `false` do inteiro `0`.

## Quando não vale

Quando a posição zero é impossível ou irrelevante; mesmo assim, o `===` não custa nada.

## Como verificar

Procure `if (strpos(` e `if (!strpos(` sem comparação estrita, e `== -1`.

## Notas do Claude

É o mesmo princípio da regra de preferir `===` em JavaScript (ver prefira igualdade estrita em JavaScript).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-prefira-igualdade-estrita-em-javascript]] — é o mesmo princípio no JavaScript
- [[regra-strict-types-em-todo-arquivo-php]] — ambas evitam conversões implícitas de tipo
- [[depurar-php-com-var-dump-e-xdebug]] — o exemplo de depuração termina nesta correção
- [[regra-use-sempre-a-comparacao-identica-em-php]] — é um caso concreto
