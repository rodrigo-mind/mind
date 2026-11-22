---
titulo: "Não repita valores: use constantes nomeadas em vez de números e textos mágicos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção DRY e Minimize magic (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não repita valores: use constantes nomeadas em vez de números e textos mágicos

## Regra

Defina cada valor com significado (símbolo de moeda, preço mínimo, casas decimais) uma única vez, como constante de classe ou de interface com nome descritivo, e use sempre essa constante.

## Por quê

É o princípio DRY (Don't Repeat Yourself): copiar código ou valores obriga a caçar todas as ocorrências quando algo muda. Números e textos "mágicos" escritos direto no código escondem o que representam e violam o DRY. No exemplo do livro, trocar a moeda ou o preço mínimo passa a exigir uma só alteração, e o nome da constante documenta o valor. Se o valor precisa mudar durante a execução, use variável ou propriedade em vez de constante.

## Quando não vale

Valores óbvios e sem significado de negócio (0, 1, índice de vetor) não precisam de constante.

## Como verificar

Procure o mesmo literal em mais de um ponto e literais numéricos ou de texto dentro de condições e chamadas.

## Notas do Claude

A exceção dos valores óbvios é minha. Em CSS, o equivalente está em evite números mágicos no CSS.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[nomes-claros-e-linguagem-ubiqua-no-codigo]] — constantes nomeadas também documentam o código
- [[regra-evite-numeros-magicos-no-css]] — a mesma ideia aplicada ao CSS
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — constantes de classe são o meio de aplicar a regra
- [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] — o mesmo princípio DRY para classes
- [[constantes-final-em-php]] — constantes nomeadas, agora protegidas contra sobrescrita
