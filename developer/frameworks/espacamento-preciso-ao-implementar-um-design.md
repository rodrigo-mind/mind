---
titulo: "Espaçamento preciso ao implementar um design"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 12, seção 12.1 (PDF p. 356-363; impressa 326-333)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Espaçamento preciso ao implementar um design

## Para que serve

Aproximar o código das medidas de um design (em pixels, em geral) sem perder a flexibilidade das unidades relativas.

## Quando usar e quando não usar

Ao trabalhar com um mockup que traz medidas. Sem designer, ajuste "a olho", o que o autor também recomenda ("confie no seu olho").

## O que perguntar ao usuário antes

- Quais medidas o design especifica, e entre quais elementos?

## Passos

1. **Escolha a unidade por caso:** `em` ou `rem` para medidas pequenas junto de texto ou botões (que devem acompanhar o tamanho da fonte; 10 px = 0,625 em, 25 px = 1,5625 em); `px` para vãos grandes entre caixas, que não precisam escalar. Ponto de partida do autor: se o espaço deve mudar com a configuração de fonte, relativo; senão, px.
2. **Padding ou margem:** padding para o espaço **dentro** do contêiner (inclusive o fundo e o conteúdo); margem para o vão **entre** caixas com fundo; `gap` do flexbox entre os itens.
3. **Desconte o line-height:** o espaço entre duas linhas de texto inclui a meia-entrelinha de cada lado. Com `line-height: 1.4` e fonte de 16 px, a altura da linha é 22,4 px e sobram 3,2 px acima e abaixo; uma margem de 30 px produz 36,4 px visíveis. Subtraia (30 − 6 = 24 px = 1,5 em). No slogan de 31,2 px com entrelinha 1,4, cerca de 6 px sobram acima do texto; faltam só 89 px dos 95 px pedidos. Com margens colapsando (título e parágrafo), vale a maior.
4. **Em listas de itens em linha** (etiquetas, tags): o `padding` vertical de um elemento `inline` aumenta a caixa, mas **não a altura da linha**, e as caixas de linhas diferentes se sobrepõem ao quebrar; aumente o `line-height` do item. Em itens de flexbox ou `inline-block`, a linha cresce sozinha, mas é preciso margens horizontais e verticais e o item inteiro quebra de uma vez (o texto dentro não).
5. Em caso de dúvida, sente com o designer e edite valores nas DevTools até aprovar.

## Saída esperada

Espaços fiéis ao design, com tamanhos que se adaptam onde fizer sentido.

## Erros comuns

- Aplicar a medida do design como margem sem considerar o `line-height`.
- Converter tudo para `em`, ou nada.

## Notas do Claude

A propriedade `leading-trim`, mencionada como futura, não deve ser dada como disponível (inferência minha: conferir o nome atual na documentação). Ver também modelo de caixa do CSS e margens e colapso.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[espacamento-de-texto-line-height-letter-spacing-e-text-transform]] — «Espaçamento de texto: line-height, letter-spacing e text-transform» cita esta nota ao explicar suas relações
- [[contraste-visual-como-ferramenta-de-design]] — o espaçamento consistente forma os padrões
- [[regra-use-line-height-sem-unidade]] — o line-height entra na altura do conteúdo
- [[margens-negativas-e-colapso-de-margens]] — as margens do título e do parágrafo colapsam
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — a escolha entre em e px
- [[modelo-de-caixa-do-css]] — padding e margem são camadas da caixa
