---
titulo: "Centralizar um bloco na horizontal (padrão do contêiner duplo)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seções 3.1.1 e 3.1.3 (PDF p. 95-99; impressa 65-69)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Centralizar um bloco na horizontal (contêiner duplo)

## Para que serve

Limitar a largura da coluna principal de uma página e centralizá-la, evitando linhas de texto longas demais (layout de uma coluna). O autor atribui o nome "padrão do contêiner duplo" a Brad Westfall.

## Quando usar e quando não usar

Use em blocos que devem ter largura máxima. Não funciona para centralizar na vertical: com margens `auto`, só as laterais se expandem no fluxo normal.

## O que perguntar ao usuário antes

- Qual a largura máxima da coluna?
- O cabeçalho deve alinhar com o conteúdo?

## Passos

1. O contêiner **externo** (por exemplo, `body` ou `header`) já ocupa a largura da tela; não precisa de estilo.
2. No **interno** (por exemplo, `div.container`), defina `max-width` (em vez de `width`, para poder encolher em telas estreitas e evitar rolagem horizontal) e margens laterais `auto`.
3. Para reaproveitar a largura, guarde-a em uma propriedade personalizada (`--largura-colunas: 1080px`) e use nos dois lugares (cabeçalho e conteúdo).
4. A versão com propriedades lógicas fica mais curta: `max-inline-size` e `margin-inline: auto`.
5. Repita o padrão no cabeçalho para alinhar com o conteúdo.

## Saída esperada

Coluna centralizada, no máximo com a largura definida, que preenche a tela em viewports menores.

## Erros comuns

- Usar `width` fixo: gera rolagem horizontal em telas estreitas.
- Adicionar `padding` ao contêiner e perder o alinhamento (ver regra do `border-box`).

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
.container { max-inline-size: 1080px; margin-inline: auto; }
```

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[fluxo-normal-do-documento]] — «Fluxo normal do documento e a assimetria entre largura e altura» cita esta nota ao explicar suas relações
- [[propriedades-logicas-do-css]] — «Propriedades lógicas do CSS» cita esta nota ao explicar suas relações
- [[propriedades-personalizadas-do-css]] — a largura do contêiner pode ficar numa variável
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
