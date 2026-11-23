---
titulo: "Leia as superglobais em um só lugar"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 8, seção sobre o Controller (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Leia as superglobais em um só lugar

## Regra

Leia `$_SERVER`, `$_GET`, `$_POST`, `$_COOKIE` e as demais superglobais num único ponto, que monta um objeto de requisição. O resto do código recebe esse objeto.

## Por quê

O livro chama de antipadrão usar as superglobais espalhadas pelo código. No exemplo, uma fábrica (`RequestDataFactory`) é a única classe que lê `$_SERVER` e cria um `RequestData`, passado adiante. Isso reduz e deixa visível o contato com as superglobais.

## Quando não vale

Em scripts procedurais muito pequenos, de uma página só. Mesmo neles, filtre e valide a entrada logo no início (inferência minha).

## Como verificar

Procure as superglobais no código (`grep -rnE '\$_(GET|POST|SERVER|COOKIE|REQUEST|FILES)' --include=*.php .`). Elas só devem aparecer no ponto de entrada ou na fábrica da requisição.

## Notas do Claude

- Ganho de testabilidade: uma classe que recebe um objeto de requisição pode ser testada sem simular as superglobais (inferência minha).
- Combina com filtrar entrada com filter_input, request e response como objetos (Zandstra) e front controller em PHP.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[request-e-response-como-objetos]] — o objeto de requisição é o ponto único que lê as superglobais
- [[filtrar-entrada-com-filter-input]] — a leitura única é onde a entrada deve ser filtrada
- [[front-controller-em-php]] — o controlador frontal é o ponto de entrada onde a leitura acontece
- [[regra-nunca-confie-na-entrada-do-usuario]] — as superglobais são a porta de entrada dos dados do usuário
- [[renderizar-templates-em-php-puro-com-buffer-de-saida]] — a requisição lida num ponto único alimenta o controlador que usa o template
