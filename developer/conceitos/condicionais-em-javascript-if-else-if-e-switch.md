---
titulo: "Condicionais em JavaScript: if, else if e switch"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 5, seção 5.3 (PDF p. 115-146)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Condicionais em JavaScript: `if`, `else if` e `switch`

## Definição

- **`if (expressão) instrução`** com `else` opcional; a expressão é avaliada como truthy ou falsy; os parênteses são obrigatórios. O `else` pertence ao **`if` mais próximo**, e o recuo não conta: o exemplo do livro com `if` aninhado sem chaves induz ao erro. O autor aconselha **usar chaves em todo corpo de `if`, `else` e laços**, mesmo de uma só instrução (ele próprio nem sempre o faz, só por compactar o livro).
- **`else if`** é só um idioma (série de `if/else`), preferível à forma totalmente aninhada.
- **`switch (expressão) { case ...: ... default: ... }`:** compara com **`===`** (sem conversão); `case` só marca o ponto de início, então sem `break` a execução "cai" para o caso seguinte (útil raramente; em 99% dos casos termine cada `case` com `break` ou, em função, com `return`). `default` pode ficar em qualquer lugar do bloco. As expressões dos `case` são avaliadas em tempo de execução, em ordem, o que o torna diferente e menos eficiente que em C ou Java; evite efeitos colaterais nelas e prefira constantes.
- **Instrução vazia e bloco:** um bloco `{ }` agrupa várias instruções e não leva `;` no fim; a instrução vazia `;` é válida (como corpo de laço, comente a intenção). Um `;` acidental depois de `if (...)`, `while (...)` ou `for (...)` causa bugs difíceis de achar.

## Por que importa

São os pontos de decisão do código.

## Como se relaciona

Veja a regra de preferir igualdade estrita, laços em JavaScript, retorno antecipado em vez de condicionais aninhadas e complexidade ciclomática.

## Conexões

- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[complexidade-ciclomatica]] — esta nota cita a ideia de «Complexidade ciclomática» na seção sobre como se relaciona
- [[regra-use-retorno-antecipado-em-vez-de-condicionais-aninhadas]] — reduz o aninhamento dos if
- [[regra-prefira-igualdade-estrita-em-javascript]] — o switch compara com ===
- [[match-e-switch-em-php]] — o `match` do PHP corrige o descuido do `break` do switch
- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
