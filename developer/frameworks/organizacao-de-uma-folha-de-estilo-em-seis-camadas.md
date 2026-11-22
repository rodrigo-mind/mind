---
titulo: "Organização de uma folha de estilo em seis camadas"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 8, seção 8.2 (PDF p. 251-262; impressa 221-232)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Organização de uma folha de estilo em seis camadas

## Para que serve

Dar à folha de estilo uma estrutura previsível, em que a prioridade de cada tipo de regra é explícita (a proposta é de Stephanie Eckles, adaptada pelo autor). Nem todo projeto precisa de todas.

## Quando usar e quando não usar

Em sites de qualquer tamanho; o benefício cresce com a complexidade. Adapte à necessidade (o autor admite que é uma recomendação, não regra fixa).

## O que perguntar ao usuário antes

- O site tem layouts de página diferentes? Há um conjunto de módulos reutilizáveis?

## Passos

1. No **início** da folha, declare a ordem: `@layer reset, theme, global, layout, modules, utilities;` (do menor ao maior).
2. **`reset`:** correções dos estilos padrão do navegador: `box-sizing: border-box`, remover a margem do `body`, fontes herdadas em `button`, `input` e `textarea`, imagens e SVG com largura máxima e `display: block`, e a regra de movimento reduzido. Quase copiável entre projetos.
3. **`theme`:** propriedades personalizadas globais (as cores), `accent-color` (checkbox, radio, range, progress) e `color-scheme` (`light` ou `dark`). Propriedades específicas de um componente ficam com ele.
4. **`global` (base):** fonte, cor e fundo padrão, títulos e links; em geral seletores de tag.
5. **`layout`:** a estrutura de alto nível (cabeçalho, rodapé, barras laterais, colunas), com um conjunto por tipo de página, ativado por um ID ou classe com prefixo (`l-homepage`, `l-article`). IDs, em geral evitados, não são problema aqui, porque as camadas superiores os vencem; um ID só vale uma vez por página.
6. **`modules`:** a maior parte do código: unidades reutilizáveis (menu de navegação, cartão, modal, banner), cada uma com nome único e relativamente pequena; pode ter subcamadas.
7. **`utilities`:** classes de um único propósito (centralizar texto, esconder, arredondar), em geral uma declaração; como a camada tem alta prioridade, dispensam o `!important`. Não passe de uma dúzia.
8. Opcional: uma camada `states` (carregando, aberto e fechado), que o autor prefere manter junto dos módulos.

## Saída esperada

Folha de estilo com prioridades explícitas, sem guerra de especificidade.

## Erros comuns

- Declarar a ordem das camadas depois de usá-las (a primeira aparição decide).
- Deixar estilos fora de camadas (vencem tudo).
- Encher a camada de utilitários.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
@layer reset, theme, global, layout, modules, utilities;
@layer reset { *, ::before, ::after { box-sizing: border-box; } }
@layer utilities { .text-center { text-align: center; } }
```

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[camadas-da-cascata-em-css]] — o framework propõe as seis camadas
- [[regra-use-border-box-em-todos-os-elementos]] — o reset inclui o border-box
- [[propriedades-personalizadas-do-css]] — a camada theme guarda as variáveis
- [[layout-em-grade-css-grid]] — a camada layout usa grade e flexbox
- [[css-modular-modulos-variantes-e-bem]] — os módulos ficam na camada modules
- [[organizar-cores-com-propriedades-personalizadas]] — as cores globais ficam na camada theme
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
