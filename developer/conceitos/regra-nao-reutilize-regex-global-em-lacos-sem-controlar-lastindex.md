---
titulo: "Regra: não reutilize uma regex com g ou y em laços sem controlar lastIndex"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.3.3 (PDF p. 285-344, capítulo 11)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não reutilize uma regex com `g` ou `y` em laços sem controlar `lastIndex`

## Regra

Ao usar `test()`, `exec()` ou `match()` com uma regex que tenha `g` ou `y`, trate o `lastIndex`: crie a regex **uma vez** quando o laço depende do estado dela, e **recrie, zere `lastIndex` ou remova a flag** quando cada chamada deve começar do início; para percorrer todos os casamentos, prefira `matchAll`.

## Por quê

O livro mostra dois defeitos opostos. (1) `while ((m = /<p>/g.exec(html)) !== null)` recria a regex a cada volta, `lastIndex` sempre 0, e o laço fica infinito se houver um `<p>`. (2) Reusar `/(\w)\1/g` com `test()` sobre uma lista de palavras faz perder "book", porque a busca seguinte começa no `lastIndex` deixado pelo "apple". O `matchAll` não altera `lastIndex`.

## Quando não vale

Quando a regex não tem `g` nem `y`: aí não há estado e `test` e `exec` são seguros.

## Como verificar

Procure `.test(` e `.exec(` em regexes com `g` ou `y` dentro de laços e literais de regex na condição de `while`.

## Notas do Claude

O próprio autor chama a API de "propensa a erros" nesse ponto.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[metodos-de-string-com-expressoes-regulares-em-javascript]] — o lastIndex é explicado ali
- [[expressoes-regulares-em-javascript-sintaxe-e-flags]] — as flags g e y
- [[lacos-em-javascript-for-of-e-for-in]] — armadilha de estado em laços
