---
titulo: "Operadores lógicos, ?? e valores padrão em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seções 4.10 e 4.13.2 (PDF p. 79-114)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Operadores lógicos, `??` e valores padrão em JavaScript

## Definição

- **`&&` e `||` não devolvem só booleano:** fazem curto-circuito e devolvem um dos operandos. `||` devolve o primeiro operando verdadeiro (truthy); se o da esquerda for falso (falsy), avalia e devolve o da direita. Os valores falsy são `false`, `null`, `undefined`, `0`, `-0`, `NaN` e `""`. Evite operandos com efeito colateral à direita.
- **Idioma antigo:** `let max = maxWidth || preferences.maxWidth || 500;` e `p = p || {}` para valor padrão de parâmetro. Defeito: se `0`, `""` ou `false` são valores válidos, eles são ignorados. Em ES6, para parâmetros use o valor padrão na própria definição (`function copy(o, p = {})`).
- **`??` (primeiro definido):** devolve o operando esquerdo se não for `null` nem `undefined`; senão, o direito. Curto-circuito também. Com `options.timeout ?? 1000`, um `0` definido é respeitado. O livro dá exemplos: `""` e `false` são mantidos e só `null`, `undefined` ou propriedade ausente caem no padrão.
- **Precedência:** `??` não tem precedência definida em relação a `&&` e `||`; misturá-los sem parênteses é erro de sintaxe (`(a ?? b) || c`).
- **`!`** converte para booleano e inverte (`!!x` converte qualquer valor); leis de De Morgan: `!(p && q) === (!p || !q)`.
- **Operador condicional `?:`:** o único ternário; avalia só um dos dois ramos.

## Por que importa

Padrões incorretos com `||` são fonte comum de bugs com `0` e texto vazio.

## Como se relaciona

Veja a regra de usar `??` em vez de `||` para valores padrão, acesso condicional (`?.`) e parâmetros opcionais e rest.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[acesso-condicional-e-invocacao-condicional-em-javascript]] — ?. e ?? tratam valores ausentes
- [[regra-use-nullish-em-vez-de-ou-para-valores-padrao]] — a regra decorrente
- [[parametros-opcionais-e-rest-em-javascript]] — valores padrão de parâmetros substituem o idioma ||
