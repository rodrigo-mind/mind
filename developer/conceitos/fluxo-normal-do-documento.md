---
titulo: "Fluxo normal do documento e a assimetria entre largura e altura"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 3, seção 3.1 (PDF p. 94-98; impressa 64-68)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Fluxo normal do documento

## Definição

Comportamento padrão do layout: elementos **inline** correm junto com o texto, da esquerda para a direita, e quebram a linha ao chegar à borda do contêiner; elementos **de bloco** ficam cada um em sua linha, com quebra antes e depois, e preenchem a largura do contêiner mesmo se a largura for reduzida.

A largura e a altura são fundamentalmente diferentes: o fluxo foi feito para **largura limitada e altura ilimitada**. A largura do pai determina a dos filhos, e a altura dos filhos determina a do pai. Por isso se usam abordagens diferentes para cada uma.

Como construir: comece **de fora para dentro**: posicione os contêineres maiores antes dos menores. Elementos de bloco já ocupam a largura toda; em geral não precisa de `width: 100%`, e sim de reduzi-la.

## Por que importa

É a base de que o modelo de caixa, o flexbox e a grade partem; boa parte dos "bugs" de layout vem de lutar contra o fluxo.

## Como se relaciona

Ver modelo de caixa do CSS, altura de elementos e overflow, e centralizar um bloco na horizontal.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[altura-de-elementos-e-overflow]] — esta nota cita a ideia de «Altura de elementos e overflow» na seção sobre como se relaciona
- [[centralizar-um-bloco-na-horizontal]] — esta nota cita a ideia de «Centralizar um bloco na horizontal» na seção sobre como se relaciona
- [[modelo-de-caixa-do-css]] — o modelo de caixa define o tamanho de cada elemento no fluxo
- [[flexbox]] — o flexbox altera o fluxo normal
- [[layout-em-grade-css-grid]] — a grade altera o fluxo normal
- [[tipos-de-posicionamento-em-css]] — fixed e absolute retiram o elemento do fluxo
- [[agrupar-conteudo-em-html]] — parágrafos e divs são elementos de bloco do fluxo normal
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[filtros-mascaras-e-recortes-em-css]] — os elementos flutuantes que saem do fluxo ganham contorno por `shape-outside`
