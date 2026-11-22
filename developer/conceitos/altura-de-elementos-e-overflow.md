---
titulo: "Altura de elementos e overflow"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seção 3.3 (PDF p. 105-108; impressa 75-78)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Altura de elementos e overflow

## Definição

A altura de um contêiner vem organicamente do conteúdo. Definir uma altura explícita arrisca o **overflow**: o conteúdo que não cabe vaza para fora do pai, e o que vem depois é desenhado por cima.

A propriedade `overflow` (e `overflow-x`, `overflow-y`) tem cinco valores: `visible` (padrão; tudo aparece), `hidden` (corta o que passa do padding; ainda rola por JavaScript), `clip` (como `hidden`, mas sem rolagem nem por script), `scroll` (barras sempre) e `auto` (barras só se houver excesso; o autor prefere esse). Combinar valores diferentes em x e y, com um `hidden`, dá resultado imprevisível: use `clip`. Barras de rolagem aninhadas frustram: a roda do mouse passa a rolar a caixa menor em vez da página.

**Altura em porcentagem:** refere-se à altura do bloco contêiner, que normalmente depende dos filhos (definição circular), então o navegador ignora; só funciona se o pai tem altura explícita. Dois usos que levam a isso: fazer um contêiner preencher a tela (use `100svh`/`100lvh`, ver unidades de viewport) e criar colunas de mesma altura (flexbox e grid resolvem).

**`min-height` e `max-height`** (e `min-block-size`, `max-block-size`): em vez de uma altura fixa, impõem um piso ou um teto, e o elemento cresce naturalmente. O mesmo vale para `min-width`/`max-width`.

## Por que importa

Evita conteúdo sobreposto e barras de rolagem inesperadas.

## Como se relaciona

Ver regra de min-height em vez de height e fluxo normal do documento.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fluxo-normal-do-documento]] — «Fluxo normal do documento e a assimetria entre largura e altura» cita esta nota ao explicar suas relações
- [[regra-prefira-min-height-a-height-fixa]] — a regra resume a recomendação do capítulo
- [[unidades-de-viewport-em-css]] — 100svh substitui a altura em porcentagem para preencher a tela
- [[flexbox]] — colunas de mesma altura se fazem com flexbox
- [[geometria-e-rolagem-do-documento]] — scrollHeight e scrollTop tratam do conteúdo que transborda
