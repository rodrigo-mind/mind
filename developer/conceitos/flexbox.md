---
titulo: "Layout com flexbox (Flexible Box Layout)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 4, seções 4.1 e 4.2 (p. 93-100, numeração impressa)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Layout com flexbox

## Definição

Método para dispor elementos em linha ou coluna. Com `display: flex`, o elemento vira um contêiner flex (flex container) e seus filhos diretos viram itens flex (flex items). Por padrão, os itens ficam lado a lado, da esquerda para a direita, na mesma linha, com a mesma altura (a do conteúdo). Ao contrário de `inline` ou `inline-block`, o contêiner flex controla o layout dos filhos. Há também `display: inline-flex`, que o livro diz ser raramente necessário.

Os itens ficam ao longo do eixo principal (main axis, que vai de "início principal" a "fim principal") e o eixo transversal (cross axis) é perpendicular. A direção dos eixos pode ser mudada.

## Por que importa

Resolve problemas antes difíceis: centralização vertical e colunas de mesma altura. O livro avisa que são mais de uma dúzia de propriedades novas, mas que poucas fazem o trabalho pesado; as outras ajustam alinhamento e espaçamento.

## Como usar (exemplo do livro: menu de navegação)

- O contêiner é a lista (`ul`), e os itens, os `li`. Use o combinador de filho direto (`>`) para atingir só os filhos.
- Ponha o preenchimento nos links (`a`), e não nos `li`, e deixe os links com `display: block`, para que toda a área do botão seja clicável.
- Para o espaço entre itens, use `gap` (a propriedade própria do flexbox) ou margens.
- Uma margem `auto` num item flex absorve o espaço livre; por exemplo, `margin-left: auto` empurra o último item para a direita.

## Como se relaciona

O flexbox cuida de uma dimensão (linha ou coluna). O layout em grade (grid) cuida de duas e se combina com ele. O design responsivo usa os dois com consultas de mídia.

## Notas do Claude

Confiança média: li a abertura e a construção do menu; o dimensionamento dos itens (`flex-grow`, `flex-shrink`, `flex-basis`), o alinhamento (`justify-content`, `align-items`) e o guia de referência do final do capítulo não foram lidos.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[layout-em-grade-css-grid]] — esta nota cita a ideia de «Layout em grade» na seção sobre como se relaciona
- [[design-responsivo-mobile-first]] — o menu flexbox é o tipo de componente que se adapta por pontos de quebra
- [[elementos-de-secao-semanticos-html5]] — o layout da página em flexbox se apoia nessas regiões
- [[fluxo-normal-do-documento]] — o flexbox altera o fluxo normal
- [[propriedades-logicas-do-css]] — os eixos do flexbox seguem a mesma lógica de direções
- [[altura-de-elementos-e-overflow]] — colunas de mesma altura se fazem com flexbox
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — o contêiner que é item de flexbox precisa de largura definida
- [[regra-nao-use-tabelas-para-o-layout-da-pagina]] — o flexbox é uma alternativa para layout
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
