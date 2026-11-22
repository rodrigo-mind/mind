---
titulo: "Layout em grade (CSS Grid)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 5, seções 5.1 e 5.2 (p. 119-127, numeração impressa)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Layout em grade (CSS Grid)

## Definição

O Grid define um layout bidimensional de colunas e linhas e posiciona os elementos nele. Um elemento com `display: grid` vira um contêiner de grade (grid container) e seus filhos viram itens da grade. Alguns itens ocupam uma célula; outros abrangem várias linhas ou colunas. O tamanho pode ser definido com precisão ou ajustar-se ao conteúdo.

- `grid-template-columns` e `grid-template-rows` definem o tamanho das trilhas (colunas e linhas). A unidade `fr` (fração) reparte o espaço livre, como o fator de crescimento do flexbox: uma coluna de `2fr` é o dobro de uma de `1fr`. Podem-se misturar `px`, `em`, `%` e `fr` (`300px 1fr`).
- `repeat(4, auto)` abrevia várias trilhas iguais; `repeat(3, 2fr 1fr)` repete um padrão.
- `gap` define o espaçamento entre as células (antes, `grid-gap`; ambos funcionam). Aceita dois valores (vertical e horizontal).

## Partes da grade

| Termo | O que é |
|---|---|
| Linha da grade (grid line) | Linhas verticais e horizontais que estruturam a grade; o `gap` fica sobre elas |
| Trilha (grid track) | Espaço entre duas linhas adjacentes (linha ou coluna) |
| Célula (grid cell) | Um espaço onde se cruzam uma trilha horizontal e uma vertical |
| Área (grid area) | Região retangular de uma ou mais células |

## Por que importa

O livro compara: no flexbox foi preciso aninhar um contêiner dentro de outro para fazer colunas e linhas; na grade, um único contêiner define o formato da página e os itens ocupam as áreas desejadas. Nem toda célula precisa ser preenchida.

## Como se relaciona

Complementa o flexbox; os dois formam o mecanismo completo de layout, e o livro mostra como usá-los juntos.

## Notas do Claude

Confiança média: li a abertura, a grade básica e a anatomia; o posicionamento por linhas e por áreas nomeadas, a grade explícita e implícita e a combinação com flexbox não foram lidos.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[flexbox]] — «Layout com flexbox» cita esta nota ao explicar suas relações
- [[design-responsivo-mobile-first]] — o design responsivo usa a grade para o layout de cada faixa de largura
- [[elementos-de-secao-semanticos-html5]] — o layout da página em grade se apoia nessas regiões
- [[fluxo-normal-do-documento]] — a grade altera o fluxo normal
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — a camada layout usa grade e flexbox
- [[tabelas-em-html5]] — «Tabelas em HTML5» cita esta nota ao explicar suas relações
- [[regra-nao-use-tabelas-para-o-layout-da-pagina]] — «Não use tabelas para o layout da página» cita esta nota ao explicar suas relações
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
