---
titulo: "Use retorno antecipado em vez de condicionais aninhadas"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Early return and cyclomatic complexity (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use retorno antecipado em vez de condicionais aninhadas

## Regra

Verifique as condições de erro e de saída no início da função e retorne (ou lance a exceção) logo, em vez de aninhar `if`/`else`.

## Por quê

No exemplo do livro, a mesma validação de um valor numérico entre 10 e 200 passa de quatro níveis de aninhamento e muitas chaves para uma sequência plana de `if` que retornam `false`, com complexidade ciclomática menor. Cada condição que retorna encerra aquele ramo, e o resto do método fica simples. O autor considera esta a melhor coisa a fazer para tornar o código mais legível.

## Quando não vale

Não force o retorno antecipado quando só houver uma verificação simples, nem troque a clareza por um one-liner. Para métodos que precisam de limpeza ao sair (fechar arquivo, liberar trava), cuide de garantir a limpeza.

## Como verificar

Procure `else` após `return`, mais de dois níveis de indentação em um método e erros devolvidos só no fim da função.

## Notas do Claude

A ressalva sobre limpeza ao sair é minha, e não do livro (em PHP, `finally` resolve).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[complexidade-ciclomatica]] — o retorno antecipado é a principal forma de reduzi-la
- [[nomes-claros-e-linguagem-ubiqua-no-codigo]] — as duas melhoram a legibilidade
- [[condicionais-em-javascript-if-else-if-e-switch]] — reduz o aninhamento dos if
- [[match-e-switch-em-php]] — o `match` e o retorno antecipado são formas de evitar `if` aninhado
