---
titulo: "Funções de vetores em PHP (busca, ordenação e manipulação)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 8 (PDF p. 345-385)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Funções de vetores em PHP

## Definição

Os vetores (arrays) do PHP são flexíveis: guardam qualquer tipo, até tipos diferentes juntos, e podem ser numéricos ou associativos (`chave => valor`). As funções mais usadas, segundo o livro:

- **Buscar:**
  - `in_array($procurado, $vetor, true)` diz se o valor existe;
  - `array_search($valor, $vetor, true)` devolve a chave;
  - `array_key_exists($chave, $vetor)` testa uma chave.
  - O terceiro argumento `true` faz a comparação incluir o tipo.
  - Cuidado: em `in_array` e `array_search`, o valor procurado vem **antes** do vetor, ao contrário das outras funções.
- **Pôr e tirar:** `array_push`/`array_pop` no fim e `array_unshift`/`array_shift` no começo.
- **Recortar:** `array_slice()` devolve um pedaço **sem mudar** o original (renumera índices numéricos, salvo com `true` no último argumento). `array_splice()` remove ou substitui **no próprio** vetor.
- **Juntar:** `array_merge()`, `array_merge_recursive()` e `array_combine($chaves, $valores)`.
- **Percorrer:** `foreach`; `array_walk()` (com parâmetro extra) e `array_walk_recursive()`; `array_map($funcao, $vetor)`.
- **Ordenar:** os nomes seguem um padrão. `sort` ordena por valor e descarta as chaves. Um `r` inverte a ordem; um `a` no início mantém a ligação chave e valor (`asort`); um `k` ordena pela chave (`ksort`); um `u` recebe função de comparação (`usort`); `nat` usa ordem "natural" (2 antes de 10). As funções de ordenação mudam o vetor original.
- **Ver o conteúdo:** `print_r()` e `var_dump()`.

## Por que importa

São as ferramentas do dia a dia para tratar listas que vêm do banco (`fetchAll`) e de formulários.

## Como se relaciona

A iteração e os geradores estão em vetores, iteráveis e geradores em PHP. A comparação estrita está na regra use sempre a comparação idêntica em PHP. As funções de seta usadas com `array_map` e `usort` estão em callbacks, funções anônimas e closures em PHP.

## Notas do Claude

- Confiança média: o capítulo foi lido nas seções de busca, manipulação e ordenação, sem todos os exemplos.
- Use sempre o `true` em `in_array` e `array_search` com dados de formulário, porque a comparação frouxa converte tipos: `in_array("1e3", ["1000"])` dá `true` (as duas são "numéricas" e valem 1000), e no PHP 7 até `in_array("abc", [0])` dava `true`. O PHP 8 corrigiu a comparação entre número e texto não numérico, mas a frouxa continua surpreendendo (inferência minha, a conferir no manual).
- Para ordenar nomes em português com acento, `sort` comum põe "Ágata" depois de "Zé". Use `Collator` da extensão `intl` (inferência minha; ver a regra ordene textos para pessoas com Intl.Collator, o equivalente em JavaScript).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[vetores-iteraveis-e-geradores-em-php]] — complementa com a iteração e os geradores, que a nota de funções não cobre
- [[regra-use-sempre-a-comparacao-identica-em-php]] — o terceiro argumento `true` de in_array aplica a comparação estrita
- [[callbacks-funcoes-anonimas-e-closures-em-php]] — array_map e usort recebem callbacks e funções de seta
- [[vetores-e-iteracao-em-javascript]] — é o equivalente em JavaScript dos métodos de vetor
- [[regra-ordene-textos-para-pessoas-com-intl-collator]] — a ordenação de textos com acento pede Collator, como o equivalente em JavaScript
