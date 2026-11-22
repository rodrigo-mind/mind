---
titulo: "Fontes variáveis em CSS"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 12, seção 12.5.2 (PDF p. 377-379; impressa 347-349)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Fontes variáveis em CSS

## Definição

Uma fonte variável traz toda uma faixa de variações em **um só arquivo**, normalmente bem menor que vários arquivos separados; por isso é a forma eficiente de ter vários pesos. A faixa é definida por **eixos de variação** (sempre uma sigla de quatro letras). Na regra `@font-face`, o `font-weight` leva dois valores (mínimo e máximo, por exemplo `300 800`), e então se usa qualquer peso da faixa, inclusive `650`.

Eixos registrados e a propriedade correspondente: `wght` (`font-weight`, 0 a 999), `ital` (`font-style: italic`, ligado ou desligado), `slnt` (`font-style: oblique`, ângulo de inclinação, em geral até uns 20 graus, que não troca as letras como o itálico), `wdth` (`font-stretch`, em porcentagem acima ou abaixo de 100%) e `opsz` (`font-optical-sizing`, `none` ou `auto`: reduz a diferença entre traços grossos e finos em tamanhos pequenos). A forma de baixo nível é `font-variation-settings: 'wght' 650`. Eixos personalizados (siglas em maiúsculas, como `'GRAD'`) só se ajustam por `font-variation-settings`, conforme a documentação da fonte. Poucas fontes usam mais de um ou dois eixos.

## Por que importa

Reduz o peso da página e dá controle fino de peso e largura.

## Como se relaciona

Ver fontes web e @font-face e a regra de carregar só as fontes necessárias.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fontes-web-e-font-face]] — «Fontes web e @font-face» cita esta nota ao explicar suas relações
- [[regra-carregue-so-as-fontes-necessarias-e-escolha-o-font-display]] — reduzem o peso da página
