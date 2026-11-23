---
titulo: "Use sempre a comparação idêntica (===) em PHP"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 4, seções Type juggling e Type and value comparison (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use sempre a comparação idêntica (===) em PHP

## Regra

Compare com `===` e `!==` (mesmo tipo e mesmo valor), e converta explicitamente os tipos antes, em vez de contar com a conversão automática do `==`.

## Por quê

O type juggling converte tipos conforme regras previsíveis, mas não simples; confiar na sua memória delas é arriscado. O `==` iguala coisas que ninguém quer iguais (textos que começam com números, por exemplo). `===` falha mais cedo e de forma mais compreensível quando um valor chega inesperado, e um simples `=` extra poupa horas de busca de erros. O livro mostra uma tabela dinâmica (um "TruthDumper") com o resultado de `==`, `===`, `if`, `empty`, `isset`, `switch` e `match` para valores como `null`, `0`, `'0'`, `''`, `false` e `0.1`, para provar que depender da veracidade (truthiness) é imprevisível; use `strict_types` e tipos declarados para saber o tipo antes de comparar. Atenção também às funções que fazem comparação frouxa por baixo.

## Quando não vale

Quando a conversão é deliberada e documentada.

## Como verificar

Procure `==` e `!=` e `if ($variavel)` com valores não booleanos; confira o retorno de funções como `strpos` com `=== false`.

## Notas do Claude

Exemplo de função frouxa: `in_array` sem o terceiro argumento verdadeiro (inferência minha; o livro cita só o princípio). Ver compare o retorno de strpos com === false e prefira === em JavaScript.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[tipos-escalares-do-php-e-armadilhas]] — a comparação de escalares
- [[regra-compare-o-retorno-de-strpos-com-estrito]] — é um caso concreto
- [[regra-prefira-igualdade-estrita-em-javascript]] — o mesmo princípio no JavaScript
- [[padrao-null-object]] — evita a checagem de nulos com comparações
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[regra-use-nullish-em-vez-de-ou-para-valores-padrao]] — a mesma preocupação com valores falsy em PHP
- [[funcoes-de-vetores-em-php]] — in_array e array_search com `true` são casos da regra
- [[match-e-switch-em-php]] — o `match` já aplica a comparação idêntica
