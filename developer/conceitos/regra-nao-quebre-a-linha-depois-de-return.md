---
titulo: "Não quebre a linha depois de return e use ponto e vírgula em JavaScript"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 2, seção 2.6 (PDF p. 38-40)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não quebre a linha depois de return e use ponto e vírgula em JavaScript

## Regra

Termine as instruções com ponto e vírgula. Nunca ponha quebra de linha entre `return` (ou `throw`, `yield`, `break`, `continue`) e o valor que vem depois.

## Por quê

- O JavaScript trata a quebra de linha como ponto e vírgula **só quando não consegue continuar** a instrução anterior. Assim, uma linha que começa com `(`, `[`, `/`, `+` ou `-` pode ser lida como continuação da linha de cima. No exemplo do livro, `let y = x + f` seguido de `(a+b).toString()` vira `f(a+b)`, uma chamada de função.
- As exceções à regra:
  - depois de `return`, `throw`, `yield`, `break` e `continue`, a quebra de linha **sempre** vira ponto e vírgula. Então `return` numa linha e `true;` na seguinte devolve `undefined`;
  - `++` e `--` usados depois do valor precisam ficar na mesma linha dele;
  - a seta `=>` precisa ficar na mesma linha dos parâmetros.
- O autor avisa que esses erros falham de um jeito pouco óbvio e são difíceis de depurar.

## Quando não vale

Em projetos que adotam de propósito o estilo sem ponto e vírgula, com uma ferramenta de formatação que cuida dos casos perigosos. O livro cita o ponto e vírgula defensivo no início da linha (`;[x, y].forEach(...)`) para quem usa esse estilo.

## Como verificar

- Procure `return` sozinho no fim de uma linha seguido de um valor na linha de baixo.
- Um analisador como o ESLint aponta os dois casos (ver ferramentas do JavaScript).

## Notas do Claude

No mesmo capítulo: o JavaScript diferencia maiúsculas de minúsculas; identificadores podem ter letras Unicode (por exemplo, `café`), mas o costume é usar só ASCII; e o mesmo caractere acentuado pode ser codificado de duas formas. Compare textos com acento depois de `normalize()` (ver versões do ECMAScript e ambientes do JavaScript).

## Conexões

- [[ferramentas-do-javascript-eslint-prettier-jest-e-empacotadores]] — o ESLint aponta os erros que esta regra evita
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[versoes-do-ecmascript-e-ambientes-do-javascript]] — a estrutura léxica do capítulo 2 explica a inserção automática de ponto e vírgula
- [[funcoes-de-seta-e-o-valor-de-this]] — a seta `=>` também precisa ficar na mesma linha dos parâmetros
