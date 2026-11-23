---
titulo: "Declare strict_types e tipos de parâmetro e retorno em todo arquivo PHP"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 6, seção Coercive and strict modes"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Declare strict_types e tipos de parâmetro e retorno em todo arquivo PHP

## Regra

Comece todo arquivo PHP com `declare(strict_types=1);` e declare tipos em todos os parâmetros, propriedades e retornos.

## Por quê

As declarações de tipo funcionam em dois modos. No modo coercivo (o padrão), o PHP converte valores silenciosamente, como um cast manual a cada parâmetro e retorno, trazendo de volta a confusão de tipos que se queria evitar. No modo estrito, um valor de tipo errado lança uma exceção na primeira chamada incorreta, e o erro aparece perto da causa, em vez de se manifestar como bug depois.

O livro compara três estilos: o do PHP 5 otimista (só comentários DocBlock sobre os tipos), o defensivo (16 linhas de verificação manual de tipos, que também precisam de testes) e o moderno, que com `strict_types` e tipos declarados dispensa quase todo o código de verificação e os DocBlocks. Quase todo tipo pode ser declarado, exceto o recurso (resource). Para uma lista de inteiros, o autor usa o operador de espalhamento (`int ...$lista`), abrindo mão de promoção no construtor e de parâmetros nomeados, e prefere a segurança de tipo ao açúcar sintático.

## Quando não vale

O próprio livro admite que a declaração é por arquivo (não há opção global) e que isso gera repetição; sugere automatizar com modelos de arquivo da IDE e com ferramentas de padrão de código na integração contínua.

## Como verificar

Procure arquivos PHP sem `declare(strict_types=1)` na primeira linha após `<?php`, e funções sem tipo de retorno ou de parâmetro. Uma ferramenta de padrão de código pode verificar isso.

## Notas do Claude

Para código chamado por um formulário, os valores de `$_POST` chegam como texto; converta e valide explicitamente (por exemplo, com `filter_var` e conversão de tipo) antes de passar para funções tipadas em modo estrito (inferência minha).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[propriedades-readonly-em-php]] — «Propriedades readonly em PHP 8.1» cita esta nota ao explicar suas relações
- [[divida-tecnica]] — «Dívida técnica» cita esta nota ao explicar suas relações
- [[gerenciar-dependencias-com-composer]] — o carregamento automático PSR-4 e os tipos estritos compõem o projeto PHP moderno
- [[regra-compare-o-retorno-de-strpos-com-estrito]] — ambas evitam conversões implícitas de tipo
- [[tipos-escalares-do-php-e-armadilhas]] — os tipos escalares se declaram com strict_types
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[modo-estrito-em-javascript]] — equivalente em espírito em PHP
- [[declaracoes-de-tipo-em-php-uniao-anulavel-mixed-e-dnf]] — as declarações de tipo só são rigorosas com strict_types
