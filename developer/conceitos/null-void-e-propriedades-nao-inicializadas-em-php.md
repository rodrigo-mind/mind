---
titulo: "Null, void e propriedades não inicializadas em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 4, seção Nullable, void, and uninitialized (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Null, void e propriedades não inicializadas em PHP

## Definição

Três formas de "nenhum valor":

- **`null` e tipos anuláveis:** `?string` ou `string|null` aceitam `null` como opção; `null` não é um tipo de retorno isolado (se uma função sempre devolve nada, use `void`).
- **`void`:** só para retorno; a função não devolve nada (equivale a `null` quando se atribui). Declare `void` em funções sem retorno: se alguma retornar algo, o erro de tipo avisa logo.
- **Não inicializada (uninitialized):** estado de uma propriedade **tipada** antes de receber valor (surgiu com a promoção de propriedades do construtor); acessá-la lança erro fatal. Uma propriedade sem tipo vale `null` por padrão. Garanta que as propriedades tipadas sejam inicializadas antes de qualquer acesso.

**Operadores curtos:** o ternário serve para linhas simples (nunca aninhe); o **operador de coalescência nula** (`??`, e `??=` para atribuir se nulo) e o **operador nullsafe** (`$objeto?->propriedade`, que devolve `null` se `$objeto` for nulo) substituem cadeias de `if` verbosas: `$objeto->p2?->foo ?? $objeto->p1?->foo`.

**Recursos (resources):** como identificadores de arquivos (`fopen`) e conexões; `gettype` devolve `null` para eles, e, no PHP 8, vão sendo trocados por objetos (`curl_init` devolve `CurlHandle`).

## Por que importa

Tratar `null` explicitamente evita metade dos erros de execução em PHP.

## Como se relaciona

Ver tipos escalares do PHP e armadilhas, regra de strict_types e propriedades readonly em PHP.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[propriedades-readonly-em-php]] — esta nota cita a ideia de «Propriedades readonly em PHP 8.1» na seção sobre como se relaciona
- [[fundamentos-de-classes-e-objetos-em-php]] — a promoção de propriedades do construtor
- [[regra-trate-null-como-desconhecido]] — o tratamento de nulos também importa no banco
- [[padrao-null-object]] — «Padrão Null Object» cita esta nota ao explicar suas relações
- [[tipo-de-retorno-never-em-php]] — «Tipo de retorno never em PHP 8.1» cita esta nota ao explicar suas relações
