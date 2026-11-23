---
titulo: "Prefira === a == em JavaScript"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 3, seção 3.9.1 (PDF p. 41-78, seção indicada dentro do capítulo)"
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 4, seção 4.9.1 (PDF p. 79-114): o autor diz que `==` é legado e fonte de bugs e que se deve usar quase sempre `===`"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Prefira === a == em JavaScript

## Regra

Compare com `===` e `!==`; use `==` só quando quiser de propósito a conversão de tipos (por exemplo, `x == null` para testar `null` ou `undefined`, inferência minha).

## Por quê

O `===` não considera iguais valores de tipos diferentes, e o livro diz que é quase sempre o operador certo. O `==` converte antes de comparar, e dá resultados surpreendentes: `"0" == 0` e `0 == false` são verdadeiros, e `"0" == false` também. Ser conversível para outro valor não significa ser igual a ele.

## Quando não vale

O próprio livro mantém o `==` na linguagem e o explica à parte; o caso `null == undefined` (verdadeiro) é um uso deliberado comum.

## Como verificar

Procure `==` e `!=` no código e confirme que cada um é intencional.

## Notas do Claude

Combina com a regra de que valores vindos de formulários chegam como texto (ver validar formulários em PHP, equivalente no servidor).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[validar-formularios-em-php]] — valores de formulário chegam como texto, e a conversão frouxa gera erros nos dois lados
- [[regra-compare-o-retorno-de-strpos-com-estrito]] — é o mesmo princípio no JavaScript
- [[regra-use-sempre-a-comparacao-identica-em-php]] — o mesmo princípio no JavaScript
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — a regra decorrente
- [[condicionais-em-javascript-if-else-if-e-switch]] — o switch compara com ===
- [[ferramentas-do-javascript-eslint-prettier-jest-e-empacotadores]] — o ESLint aponta a violação desta regra
