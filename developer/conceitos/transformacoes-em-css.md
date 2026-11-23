---
titulo: "Transformações em CSS (transform, translate, rotate, scale)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 16 (PDF p. 461-488)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Transformações em CSS

## Definição

`transform` move, gira, aumenta ou inclina um elemento, em 2D ou 3D: `translate()`, `rotate()`, `scale()`, `skew()` e as versões 3D.

- **Não mexe no fluxo:** o elemento muda de lugar na tela, mas o espaço original continua reservado e os vizinhos não se movem.
- **Ponto de origem:** a rotação, a escala e a inclinação acontecem em volta de `transform-origin`, que por padrão é o centro (pode ser `right top`, `left bottom` ou um comprimento). O `translate()` não depende dele.
- **Ordem:** várias funções vão separadas por espaço e são aplicadas **da direita para a esquerda**. Em `translate(50px, 0) rotate(15deg)`, o elemento gira primeiro e depois anda. O autor prefere deixar o `translate()` por último na ordem de aplicação (primeiro no código), para mover em coordenadas normais, e o mesmo vale para `scale()`.
- **Propriedades separadas:** `translate`, `rotate` e `scale` existem como propriedades próprias e são mais simples para transformações isoladas. Não há propriedade separada para `skew`.
- **3D:** `perspective` no elemento-pai dá profundidade comum a todos os filhos. `rotateY()` e `translateZ()` criam efeitos como cartões que "voam" para a tela.

## Por que importa

É a base de efeitos de hover, menus e animações que rodam lisos, porque transformações são baratas de desenhar (ver a regra anime só transform e opacity).

## Como se relaciona

É usado em criar transições em CSS e em animações com keyframes em CSS. No canvas, a mesma ideia de ordem das transformações aparece em desenhar gráficos com canvas.

## Notas do Claude

Exemplo do livro: um ícone de menu que aumenta levemente no hover, com `scale()` e uma transição curta.

## Conexões

- [[animacoes-com-keyframes-em-css]] — as transformações são o que os keyframes mais animam
- [[regra-anime-so-transform-e-opacity]] — as transformações são baratas de desenhar e fazem parte da regra
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[criar-transicoes-em-css]] — as transformações costumam ser o que se transiciona
- [[desenhar-graficos-com-canvas]] — a ordem das transformações vale também no canvas
- [[tipos-de-posicionamento-em-css]] — a transformação não altera o fluxo, ao contrário do posicionamento
- [[mapa-css-in-depth]] — o mapa acompanha a destilação do livro de que esta nota veio
