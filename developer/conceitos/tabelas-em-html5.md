---
titulo: "Tabelas em HTML5"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 11 (PDF p. 248-276)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tabelas em HTML5

## Definição

Para dados tabulares (e, no HTML5, **só** para isso: a tabela para layout de página foi proibida; use as tabelas do CSS, ou grade e flexbox). O navegador cuida de dimensionar colunas e linhas.

- **Mínimo:** `table`, `tr` (linha; o HTML é orientado a linhas) e `td` (célula). O atributo `border` da tabela só pode valer `1` ou vazio, e informa que se trata de dados tabulares (a aparência vem do CSS). Os atributos de aparência (`align`, `width`, `bgcolor`, `cellpadding`, `cellspacing`, `frame`, `rules`, `summary`) são obsoletos.
- **`th`:** célula de cabeçalho; o atributo `scope` ficou no `th`.
- **Estrutura:** `thead` (rótulos das colunas), `tbody` (corpo) e `tfoot` (rodapé; no HTML5 pode vir antes ou depois do `tbody`). Facilitam seletores de CSS robustos (em vez de depender de "o `th` que é filho único da linha").
- **Cuidado com seletores:** a maioria dos navegadores **insere um `tbody`** quando ele não existe; um seletor `table > tr` não casa, e devem-se usar `table > tbody > tr`, `table tr` ou `tbody > tr`.
- **Células irregulares:** `colspan` e `rowspan` (números inteiros), aplicados à célula superior esquerda da área; omitem-se as células que ela cobre. Não crie células sobrepostas.
- **Acessibilidade:** `headers` (em `td` e `th`) lista os `id` dos `th` associados, para leitores de tela.
- **`caption`:** legenda (uma por tabela, sempre exibida acima), sem tabelas dentro.
- **Colunas:** `colgroup` (com `span`, ou com filhos `col`) e `col` (que também aceita `span`) permitem estilizar colunas; os estilos de `colgroup` têm especificidade menor que os aplicados diretamente às células, e atingem as células de `thead` e `tfoot` também (as células irregulares contam na coluna onde começam).

## Por que importa

Dados tabulares bem marcados são fáceis de estilizar e acessíveis.

## Como se relaciona

Ver regra de não usar tabelas para layout, escolha do elemento mais específico e layout em grade com CSS Grid.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[layout-em-grade-css-grid]] — esta nota cita a ideia de «Layout em grade» na seção sobre como se relaciona
- [[regra-nao-use-tabelas-para-o-layout-da-pagina]] — «Não use tabelas para o layout da página» cita esta nota ao explicar suas relações
- [[modelo-relacional-juncoes-e-agregacoes]] — a grade de linhas e colunas lembra a tabela de dados
- [[selecao-de-elementos-no-dom]] — o tbody automático afeta os seletores
