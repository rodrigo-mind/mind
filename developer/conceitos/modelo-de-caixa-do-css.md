---
titulo: "Modelo de caixa do CSS e box-sizing"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seção 3.2 (PDF p. 100-104; impressa 70-74)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Modelo de caixa do CSS e box-sizing

## Definição

Todo elemento é feito de quatro retângulos sobrepostos: **conteúdo**, **padding** (preenchimento), **borda** e **margem**. No modelo padrão (`box-sizing: content-box`), `width` e `height` definem só o conteúdo, e o padding e a borda se somam por fora: 300 px de largura + 10 px de padding + 1 px de borda dá 322 px renderizados. No exemplo do livro, isso fazia o texto de um título com padding não alinhar com o do conteúdo abaixo.

Com `box-sizing: border-box`, `width`, `height`, `inline-size` e `block-size` valem para conteúdo + padding + borda: o padding deixa de alargar o elemento e passa a estreitar o conteúdo.

- **Padding e margem em elementos inline:** os verticais aumentam a caixa, mas não a altura que o elemento contribui ao contêiner (essa vem do `line-height`).
- **`outline`:** parecido com a borda (atalho de cor, estilo e largura), mas **não faz parte do modelo de caixa**: não muda tamanho nem posição, fica fora da borda sobre a margem, e tem os quatro lados iguais. `outline-offset` afasta ou aproxima. Os navegadores recentes seguem o `border-radius`.

## Por que importa

É a causa mais comum de largura "errada" e de rolagem horizontal surpresa.

## Como se relaciona

A regra prática está em border-box em todos os elementos; a margem tem comportamentos próprios em colapso de margens.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fluxo-normal-do-documento]] — o modelo de caixa define o tamanho de cada elemento no fluxo
- [[regra-use-border-box-em-todos-os-elementos]] — a regra corrige o comportamento padrão do modelo
- [[margens-negativas-e-colapso-de-margens]] — a margem é a camada externa do modelo
- [[elementos-de-secao-semanticos-html5]] — a caixa de cada seção semântica segue o mesmo modelo
- [[geometria-e-rolagem-do-documento]] — offset, client e scroll medem partes da caixa
- [[tipos-de-posicionamento-em-css]] — as propriedades inset e o bloco contêiner dependem da caixa
- [[espacamento-preciso-ao-implementar-um-design]] — padding e margem são camadas da caixa
