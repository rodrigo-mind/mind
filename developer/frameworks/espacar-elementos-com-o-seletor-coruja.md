---
titulo: "Espaçar elementos com o seletor coruja lobotomizada"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seção 3.6 (PDF p. 113-119; impressa 83-89)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Espaçar elementos com o seletor coruja lobotomizada

## Para que serve

Dar espaço vertical entre os filhos de um contêiner, sem espaço extra no topo nem no fim, e sem rever margens cada vez que o conteúdo muda.

## Quando usar e quando não usar

Use em contêineres cujos filhos devem ficar empilhados com espaçamento uniforme. Para linhas com itens lado a lado, flexbox e grid têm `gap`.

## O que perguntar ao usuário antes

- Quais contêineres empilham filhos? O espaçamento é o mesmo entre todos?

## Passos

1. Evite margem em cada item: ela se soma ao padding do contêiner e cria espaço extra no primeiro item (o autor cita a frase de Heydon Pickering: margens são como passar cola em um lado do objeto antes de saber se vai colar em algo).
2. A solução parcial é o combinador de irmão adjacente: `.botao + .botao { margin-top: 1em }`.
3. A solução geral é o seletor `* + *` (a "coruja lobotomizada", pela aparência), que escolhe todo elemento que segue imediatamente outro, ou seja, todos exceto o primeiro filho (equivale, na prática, a `:not(:first-child)`).
4. Limite-o a uma classe de contêiner e aos filhos diretos: `.stack > * + * { margin-top: 1.5em; }`.
5. Adicione a classe `stack` aos contêineres que precisam do espaçamento (no `body`, no contêiner principal, na caixa de links).

## Saída esperada

Espaçamento uniforme entre irmãos e nenhum espaço sobrando nas pontas, resistente a reordenações do HTML.

## Erros comuns

- Pôr margem superior e inferior em cada item, somando ao padding do contêiner.
- Usar `* + *` sem limitar a um contêiner: afeta a página inteira.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
.stack > * + * { margin-block-start: 1.5em; }
```

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[margens-negativas-e-colapso-de-margens]] — o framework evita problemas de margem entre irmãos
- [[especificidade-de-seletores]] — o seletor * + * tem especificidade zero e é fácil de sobrescrever
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
