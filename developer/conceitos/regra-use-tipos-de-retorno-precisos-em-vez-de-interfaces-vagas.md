---
titulo: "Use tipos de retorno precisos em vez de interfaces vagas"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Maximize meaningful types (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use tipos de retorno precisos em vez de interfaces vagas

## Regra

Faça os tipos de retorno e de parâmetro dizerem o que o código realmente entrega, para que o chamador e a IDE saibam quais métodos existem sem executar nada.

## Por quê

Se um método sempre devolve um `Customer` (com `getAccountNumber`), declarar `PersonInterface` obriga o código cliente a usar `instanceof` ou docblocks. Abstrações amplas são inevitáveis em partes do sistema; nelas, confira ou imponha o tipo preciso o mais cedo possível, com tipos reais e não com docblocks, para o resto do código ser bem tipado e facilitar o autocompletar e a análise estática. O autor liga isto ao princípio de substituição de Liskov.

## Quando não vale

Quando o chamador só precisa da capacidade da interface, a abstração é a escolha certa (ver SOLID).

## Como verificar

Procure `instanceof` logo após receber uma interface ampla e docblocks usados para "corrigir" o tipo.

## Notas do Claude

A ressalva da abstração desejada é minha, para equilibrar com a regra de depender de abstrações.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[principios-solid]] — ligada ao princípio de substituição de Liskov
- [[regra-componentes-devem-expor-capacidades-nao-tipos]] — diverge: aqui o tipo preciso é preferido ao vago, ali a capacidade vale mais que o tipo; as duas valem em contextos diferentes
