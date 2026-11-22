---
titulo: "Design responsivo e abordagem mobile first"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 7, seção 7.1 e abertura (p. 179-185, numeração impressa)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Design responsivo e abordagem mobile first

## Definição

Servir o mesmo HTML e CSS a todos os usuários, e fazer o conteúdo se adaptar à largura da janela do navegador (viewport) ou, às vezes, à resolução. A alternativa antiga, dois sites (desktop e `m.`), quebra com a variedade de dispositivos e obriga a manter um site a mais. A técnica, popularizada por Ethan Marcotte, tem três princípios:

1. **Mobile first:** planeje a versão para celular antes de construir o layout de desktop, e depois acrescente melhorias progressivas para telas grandes. O celular impõe restrições (tela pequena, rede lenta, digitação trabalhosa, sem passar o mouse), e quem desenha primeiro para o desktop costuma falhar ao reduzir.
2. **A regra `@media` (consultas de mídia):** estilos que só valem sob certas condições, como a largura da tela.
3. **Layouts fluidos:** contêineres que escalam com a largura da janela.

Pontos de quebra (breakpoints) são as larguras em que os estilos mudam para o melhor layout. No exemplo do livro, o layout de celular tem cabeçalho, imagem de destaque e conteúdo, com um menu escondido atrás do ícone "hambúrguer"; num ponto de quebra médio, os itens do menu cabem em uma linha e o conteúdo vai para três colunas; num grande, aumentam as margens.

## Por que importa

- Pensar no conteúdo primeiro: coloque no HTML, primeiro, o conteúdo mais importante. Isso também ajuda a acessibilidade, pois um leitor de tela ou a navegação por teclado chega logo ao que interessa.
- O HTML tem de conter o necessário para todos os tamanhos de tela; só o CSS muda.

## Como se relaciona

Usa o flexbox e a grade para os layouts de cada faixa de largura. Imagens responsivas têm tratamento próprio (parte do capítulo que não foi lida).

## Notas do Claude

Confiança média: li a abertura e a seção "mobile first"; a implementação dos pontos de quebra, as consultas de mídia em detalhe e as imagens responsivas não foram lidas.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[layout-em-grade-css-grid]] — o design responsivo usa a grade para o layout de cada faixa de largura
- [[flexbox]] — o menu flexbox é o tipo de componente que se adapta por pontos de quebra
- [[metadados-do-documento-html]] — o atributo media usa o mesmo modelo das consultas de mídia
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — a fonte da raiz pode mudar por consulta de mídia e escalar a página
- [[fonte-fluida-com-calc-e-clamp]] — a fonte fluida reduz o número de pontos de quebra
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — complementa as consultas de mídia
- [[regra-prefira-consultas-de-conteiner-as-de-midia-nos-modulos]] — o @media segue válido para o layout geral
- [[imagens-e-mapas-de-imagem-em-html]] — imagens responsivas fazem parte do design responsivo
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
