---
titulo: "Precedência, associatividade e ordem de avaliação em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seções 4.7.4 a 4.7.6 e 4.8 (PDF p. 79-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Precedência, associatividade e ordem de avaliação em JavaScript

## Definição

- **Precedência:** operadores de precedência maior rodam antes (`x + y*z`). Acesso a propriedade e chamada têm precedência maior que todos os operadores da tabela (por isso `typeof meu.funcoes[x](y)` aplica `typeof` ao resultado da chamada). O livro aconselha: em dúvida, use parênteses.
- **Associatividade:** da esquerda para a direita na maioria (`x - y - z` é `(x - y) - z`); da direita para a esquerda em `**`, unários, atribuição e `?:` (`a ** b ** c` é `a ** (b ** c)`; `w = x = y = z`; `2**2**3` é `2**8`).
- **Casos sem precedência definida:** `-3**2` é erro de sintaxe (exige parênteses) e `??` misturado com `&&` ou `||` também.
- **Ordem de avaliação:** sempre estritamente da esquerda para a direita, independentemente da precedência; só importa se houver efeitos colaterais.
- **Aritmética:** `/` é sempre de ponto flutuante (`5/2` é 2,5); divisão por zero dá `Infinity` e `0/0` dá `NaN`, sem erro; `%` tem o sinal do primeiro operando (`-5 % 2` é -1); `**` equivale a `Math.pow`.
- **Efeitos colaterais:** só atribuição, `++`, `--` e `delete` os têm, além de chamadas e construções que usem esses.

## Por que importa

Evita expressões ambíguas e erros de leitura.

## Como se relaciona

Veja igualdade, comparação e o operador `+`, operadores lógicos e valores padrão, e a regra de evitar números mágicos.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — operadores específicos
- [[regra-evite-numeros-magicos-no-css]] — a mesma preferência por expressões explícitas e legíveis
