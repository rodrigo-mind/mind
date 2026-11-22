---
titulo: "Fonte fluida com calc() e clamp()"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 2, seção 2.4.2 (PDF p. 84-87; impressa 54-55)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Fonte fluida com calc() e clamp()

## Para que serve

Fazer o tamanho da fonte (e, por herança, tudo o que está em `em`/`rem`) crescer e diminuir suavemente com a largura da tela, sem pontos de quebra (breakpoints) bruscos.

## Quando usar e quando não usar

Use no `font-size` da raiz, quando tudo o mais está em unidades relativas. Não use só unidades de viewport: escalam sem limite e ignoram a configuração de fonte do usuário.

## O que perguntar ao usuário antes

- Qual o menor e o maior tamanho de texto aceitável?
- A página inteira está em `em`/`rem`?

## Passos

1. Combine uma base relativa com um termo de viewport: `calc(0.5em + 1svw)`. A parte em `em` é um piso, e o `svw` é o fator responsivo (no exemplo do livro, de 11,75 px num celular pequeno a 20 px em 1200 px).
2. Prefira `clamp(mínimo, preferido, máximo)`, que limita o valor: `clamp(0.9rem, 0.6rem + 0.5svw, 1.5rem)` nunca sai do intervalo.
3. Aplique no `:root`; o resto da página, em `em`/`rem`, escala junto, sem nenhuma consulta de mídia.
4. As funções `min()` e `max()` escolhem o menor ou o maior dos valores dados.

## Saída esperada

Uma escala tipográfica contínua entre dois limites, com um só valor declarado.

## Erros comuns

- Usar só `vw` no tamanho da fonte: em 1200 px dá 24 px (grande demais) e em telas pequenas, 7,5 px.
- Esquecer o termo em `em` ou `rem`: o texto deixa de respeitar a configuração de fonte do navegador (o livro avisa que isso é acessibilidade).
- Escrever `calc(1em+10px)` sem espaços ao redor de `+` e `-` (obrigatórios).

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
:root { font-size: clamp(0.9rem, 0.6rem + 0.5svw, 1.5rem); }
```

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[unidades-de-viewport-em-css]] — o framework usa svw para a fonte fluida
- [[design-responsivo-mobile-first]] — a fonte fluida reduz o número de pontos de quebra
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — mantém o termo relativo por acessibilidade
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — as unidades cqi também usam clamp
- [[espacamento-de-texto-line-height-letter-spacing-e-text-transform]] — o tamanho de texto e o espaçamento se ajustam juntos
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
