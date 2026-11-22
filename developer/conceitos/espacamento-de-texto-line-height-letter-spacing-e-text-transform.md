---
titulo: "Espaçamento de texto: line-height, letter-spacing e text-transform"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 12, seção 12.6 (PDF p. 380-386; impressa 350-356)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Espaçamento de texto: line-height, letter-spacing e text-transform

## Definição

Dois ajustes que muita gente ignora e que melhoram bastante a leitura e a aparência.

- **`line-height` (entrelinha):** o valor `normal` é cerca de 1,2, curto em geral; para texto corrido, de **1,4 a 1,6** (sem unidade); linhas mais longas pedem entrelinha maior; o ideal é de **45 a 75 caracteres por linha**. Em títulos, menor (até 1,0 em alguns sites), testando-os com texto longo que quebre linha (um erro comum é só testar títulos curtos).
- **`letter-spacing` (espaçamento entre letras):** um valor pequeno, em passos de centésimos de `em` (o livro aplica `0.01em` ao corpo); mesmo 1 px é drástico. Fontes bem desenhadas raramente precisam. Em trechos curtos e estilizados (slogan, botões), dá para ser ousado, inclusive negativo; **texto em caixa-alta fica melhor com mais espaçamento**.
- **`text-transform`** (`uppercase`, `lowercase`, `capitalize`): faça a caixa-alta **no CSS** e não no HTML, para mudar o design em um só lugar; só escreva em maiúsculas no HTML o que a gramática exige (siglas).
- **Termos do design:** entrelinha (leading, em pontos; converta pontos em pixels multiplicando por 1,333 e divida pelo tamanho da fonte para obter o número) e tracking (espaçamento entre letras, em milésimos de `em`).

## Por que importa

Texto muito apertado ou muito solto cansa e reduz o engajamento.

## Como se relaciona

A regra da entrelinha sem unidade está em use line-height sem unidade; o desconto dela no espaçamento, em espaçamento preciso ao implementar um design.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[espacamento-preciso-ao-implementar-um-design]] — esta nota cita a ideia de «Espaçamento preciso ao implementar um design» na seção sobre como se relaciona
- [[regra-use-line-height-sem-unidade]] — a entrelinha sem unidade
- [[escolher-o-elemento-html-de-texto-pelo-significado]] — a caixa-alta pertence ao CSS e a semântica ao HTML
- [[fonte-fluida-com-calc-e-clamp]] — o tamanho de texto e o espaçamento se ajustam juntos
