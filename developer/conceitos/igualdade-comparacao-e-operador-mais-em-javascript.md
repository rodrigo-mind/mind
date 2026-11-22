---
titulo: "Igualdade, comparação e o operador + em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seções 4.8.1 e 4.9 (PDF p. 79-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Igualdade, comparação e o operador `+` em JavaScript

## Definição

- **`===` (estrita):** sem conversão de tipo. Tipos diferentes são diferentes; `null === null`; `NaN` nunca é igual a nada, nem a si (use `isNaN()` ou `x !== x`); `0` e `-0` são iguais; textos são iguais se tiverem os mesmos valores de 16 bits (sem normalização Unicode); objetos, vetores e funções são iguais só se forem a **mesma referência**, mesmo com propriedades idênticas.
- **`==` (com conversão):** legado e "fonte de bugs"; `null == undefined`; texto e número viram número; `true` vira 1 e `false` vira 0; objeto vira primitivo (`valueOf` ou `toString`). Exemplo do livro: `"1" == true` dá `true`. Use `===` e `!==` quase sempre.
- **`<`, `>`, `<=`, `>=`:** comparam em ordem numérica ou, se **os dois** forem texto, em ordem de valores Unicode de 16 bits, com distinção de maiúsculas e minúsculas (`"Zoo" < "aardvark"`). Com `NaN`, tudo dá `false`. Para texto localizado use `localeCompare()` ou `Intl.Collator`. Exemplos: `11 < 3` é `false`, mas `"11" < "3"` é `true`.
- **`+`:** soma números, mas **prefere texto**: se um operando for texto (ou objeto que vire texto), concatena. `1 + 2 + " blind mice"` dá `"3 blind mice"`, e `1 + (2 + " blind mice")` dá `"12 blind mice"`. Já `true + true` é 2, `2 + null` é 2, `2 + undefined` é `NaN`. O unário `+` converte para número; `x++` não é igual a `x = x + 1` (nunca concatena).
- **`in`:** testa se um nome de propriedade existe no objeto (inclusive herdada); **`instanceof`:** testa a cadeia de protótipos contra `Construtor.prototype`.
- **`=`, `==`, `===`:** não confundir atribuição com igualdade.

## Por que importa

As conversões automáticas são a origem de muitos erros sutis.

## Como se relaciona

Veja a regra de preferir igualdade estrita, operadores lógicos e valores padrão, e classes e protótipos (instanceof).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-prefira-igualdade-estrita-em-javascript]] — a regra decorrente
- [[classes-e-prototipos-em-javascript]] — instanceof e a cadeia de protótipos
- [[tipos-escalares-do-php-e-armadilhas]] — armadilhas de conversão em PHP
- [[precedencia-associatividade-e-ordem-de-avaliacao-em-javascript]] — operadores específicos
- [[typeof-delete-e-outros-operadores-de-javascript]] — in e instanceof
- [[sets-e-maps-em-javascript]] — a pertinência usa igualdade estrita
- [[internacionalizacao-com-intl-em-javascript]] — a ordem de textos depende da localidade
- [[regra-ordene-textos-para-pessoas-com-intl-collator]] — a comparação padrão de textos é por valor Unicode
