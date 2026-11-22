---
titulo: "Propriedades lógicas do CSS"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seções 3.1.2 e 3.1.3 (PDF p. 97-100; impressa 67-70)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Propriedades lógicas do CSS

## Definição

Em vez de lados fixos (cima, direita, baixo, esquerda) e de largura e altura, descrevem os elementos pelas direções do fluxo: **inline** (a direção em que o texto corre) e **block** (a direção em que caixas como parágrafos se empilham), com início (`start`) e fim (`end`). Em escrita da esquerda para a direita (como o português), inline é horizontal; em árabe e hebraico é invertido; em japonês vertical, os eixos se trocam.

| Clássica | Lógica |
|---|---|
| `width` / `height` | `inline-size` / `block-size` |
| `margin-top` / `margin-bottom` | `margin-block-start` / `margin-block-end` |
| `margin-left` / `margin-right` | `margin-inline-start` / `margin-inline-end` |
| `text-align: left` / `right` | `text-align: start` / `end` |
| `border-top-left-radius` | `border-start-start-radius` |

Atalhos novos, sem equivalente clássico: `margin-inline`, `margin-block`, `padding-inline`, `padding-block`, `border-inline`, `border-block` (definem os dois lados do eixo de uma vez). Clássicas e lógicas se sobrepõem na cascata, então se pode misturar, e as folhas de estilo padrão do navegador já usam lógicas.

## Por que importa

Fazem o layout acompanhar a língua e o modo de escrita sem reescrever o CSS. Mesmo em um só idioma, o autor aponta três razões: preparam para flexbox e grid (cujos eixos são lógicos), existem propriedades úteis sem equivalente clássico, e o código que você lê já as usa. Em sites de um só idioma é uma escolha sua, e às vezes se precisa da clássica (um estilo que não deve mudar com a direção).

## Como se relaciona

Ver centralizar um bloco na horizontal (usa `max-inline-size` e `margin-inline`) e flexbox.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[centralizar-um-bloco-na-horizontal]] — esta nota cita a ideia de «Centralizar um bloco na horizontal» na seção sobre como se relaciona
- [[flexbox]] — os eixos do flexbox seguem a mesma lógica de direções
