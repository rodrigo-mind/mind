---
titulo: "Anime só transform e opacity"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 16, seção 16.3 sobre desempenho (PDF p. 479-482)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Anime só transform e opacity

## Regra

Em transições e animações, mude só `transform` e `opacity`. Se não der, mude propriedades que só exigem repintura (como as cores). Evite animar o que muda o layout (`width`, `height`, `top`, `left`, `margin`).

## Por quê

O navegador desenha a página em três etapas:

1. **Layout:** calcula o tamanho e a posição de cada elemento. Mudar tamanho ou posição obriga a recalcular os vizinhos (reflow).
2. **Pintura:** preenche os pixels em camadas. Mudar uma cor exige repintar, mas não refazer o layout.
3. **Composição:** junta as camadas na imagem final.

`opacity` e `transform` permitem pôr o elemento numa camada própria, desenhada pela placa de vídeo (GPU), e só passam pela composição. Numa animação, a tela é redesenhada umas 60 vezes por segundo, então cada etapa poupada conta. Animar `left` num elemento grande ou complexo, ou em muitos elementos ao mesmo tempo, fica visivelmente mais lento.

## Quando não vale

Mudanças únicas, sem animação: aí a diferença em geral não se nota.

## Como verificar

- Procure `transition` e `@keyframes` no CSS e confira as propriedades usadas: em vez de `left` ou `top`, deve haver `transform: translate()`; em vez de `width` ou `height`, `transform: scale()` quando o efeito permitir.
- Use a aba de desempenho das ferramentas do navegador para ver repinturas.

## Notas do Claude

Sobre `will-change: transform`: o livro diz para usar só se aparecer animação travando ou piscando, porque consome mais recursos. Teste antes e depois, e só mantenha se melhorar. O livro também atualiza um artigo citado: hoje, até as transformações 2D usam a GPU.

## Conexões

- [[animacoes-com-keyframes-em-css]] — a regra vale também para as animações com keyframes
- [[gradientes-sombras-e-modos-de-mesclagem-em-css]] — sombras e gradientes são exemplos do que custa repintura
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[transformacoes-em-css]] — transform é uma das propriedades baratas de animar
- [[criar-transicoes-em-css]] — a regra orienta que propriedades usar nas transições
- [[mapa-css-in-depth]] — o mapa acompanha a destilação do livro de que esta nota veio
