---
titulo: "Arquitetura de site amigável a buscadores"
tipo: conceito
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 4, p. 102-105, 112-114, 124"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 186-198, 250-252"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Arquitetura de site amigável a buscadores

## Definição
Conjunto de decisões de estrutura (organização das páginas e dos links internos, geralmente registrada num documento de arquitetura de informação) que ajudam pessoas e robôs de busca a descobrir as páginas e entender sobre o que são. Para o buscador, a navegação mostra quais páginas o site considera mais importantes e a que temas elas se ligam.

## Por que importa
Pontos que o livro destaca (todos de planejamento, antes de implementar):
- **Hierarquia alinhada às buscas.** A estrutura de páginas deve refletir como o usuário pensa sobre os produtos e as palavras-chave pesquisadas. As páginas "pai" das páginas de conversão tendem a ranquear para termos mais curtos.
- **Links entre conteúdos relacionados.** Ligar páginas que tratam de assuntos próximos ajuda o buscador a confiar mais no tema de cada página. O livro mostra grandes lojas fazendo isso de forma automática ("compre junto", "quem viu isto comprou").
- **Texto âncora descritivo**, sem "clique aqui" ou "mais", e sem repetir de forma mecânica a frase-chave exata em todo link; o link para a página inicial se chama "Início" ou equivalente.
- **Trilha de navegação (breadcrumb)** com texto descritivo, útil a usuários e buscadores.
- **Pouca profundidade.** Quantos cliques separam uma página da inicial indica sua importância; páginas a cinco ou seis cliques podem nem ser descobertas. Deixe a estrutura o mais plana possível sem prejudicar a experiência.
- **Evitar subdomínios desnecessários.** O buscador pode não aplicar ao subdomínio a confiança do domínio principal; prefira uma subpasta (site.com/conteudo).
- **Versão móvel**: decidir entre mesma URL (design responsivo ou serviço dinâmico) e URL separada.
- **Distribuição de autoridade em sites enormes.** Seções populares (blog, notícias) recebem links internos demais e áreas comerciais ficam à míngua; a solução são links que distribuam a autoridade, ou uma arquitetura bem plana com análise de relevância, que dá menos trabalho.
- **Não acumular autoridade**: ligar para sites bons de fora é saudável, segundo o livro.

**Complemento do capítulo 6 (estrutura e navegação).**
- **Analogia do arquivo.** Pense no site como um arquivo de gavetas: um só lugar para cada documento, com caminho claro (cada subdomínio vira um arquivo separado). Metas do livro: poucos cliques até qualquer página, no máximo cerca de 100 links por página e fluxo lógico da inicial para categorias e detalhes.
- **Como desenhar.** Liste todas as páginas de conteúdo; crie uma navegação de topo que comporte todos os tipos; comece pelo detalhe e suba até a estrutura (inverta o processo de cima para baixo); preencha a navegação intermediária (em sites pequenos pode nem existir); inclua páginas secundárias; monte um mapa visual até o último nível. A organização por categorias e por tema, de amplo a específico, reforça a relevância; técnicas como classificação por cartões (card sorting) e a distinção entre taxonomia e ontologia ajudam a ajustar a estrutura.
- **Raso x profundo.** Em sites com menos de 10 mil páginas, todo o conteúdo deve ficar a no máximo quatro cliques da página inicial ou do mapa do site; com 100 links por página, até milhões de páginas cabem em cinco ou seis cliques. Não force a estrutura plana se for ilógico, e não encha uma página de links (200 links repassam pouca autoridade a cada um).
- **Paginação.** Páginas numeradas não trazem relevância nova, geram duplicidade ou conteúdo fino e podem virar armadilhas para robôs. Soluções do livro: marcar a sequência com os elementos rel=next e rel=prev (o Google trata os links como links da série) ou criar uma página "ver tudo" e apontar as páginas numeradas para ela com a tag canônica (ver controlar-o-robo-de-busca-robots-txt-metatags-e-canonical), se ela carregar rápido; ou ainda reduzir a paginação com mais itens por página.
- **Navegação amigável.** Use navegação em texto HTML (se usar Flash ou JavaScript, ofereça links HTML equivalentes); evite "armadilhas de robô" (calendários e navegação por facetas que geram dezenas de milhares de páginas, laços de redirecionamento); não condicione o acesso a cookies ou IDs de sessão; formulários, buscas internas e áreas com login não são rastreados (o livro cita o programa First Click Free como saída para conteúdo restrito). Frames e iframes tratam o conteúdo como de outra página e fazem links apontar para a URL errada.
- **Servidor.** Quedas e sobrecarga prejudicam o rastreamento (os buscadores dão o benefício da dúvida, mas o conteúdo não é rastreado nesse período); IPs com histórico de spam são problema; redes de entrega de conteúdo (CDN) ajudam o desempenho.
- **Subdomínios e domínios:** ver regra-prefira-subpasta-a-subdominio-ou-dominio-separado.

## Como se relaciona
- Entrada do mapear-palavras-chave-a-urls-da-arquitetura e do auditar-um-site-existente-para-seo.
- Evita canibalizacao-de-palavras-chave e se apoia em problemas-tecnicos-de-plataforma-que-prejudicam-o-seo.

## Notas do Claude
Conselhos sobre âncora com palavras-chave e sobre "autoridade de link" refletem a época (2014); confira fontes atuais.

## Conexões
- [[auditar-um-site-existente-para-seo]] — a auditoria checa links internos, profundidade, subdomínios e demais pontos de estrutura que esta nota explica
- [[canibalizacao-de-palavras-chave]] — uma estrutura que mira o mesmo termo em várias páginas produz canibalização
- [[mapear-palavras-chave-a-urls-da-arquitetura]] — o mapeamento de termos a URLs depende de uma hierarquia desenhada conforme a busca
- [[problemas-tecnicos-de-plataforma-que-prejudicam-o-seo]] — estrutura e plataforma (CMS, servidor, URLs) são as duas frentes de decisão técnica do SEO
- [[rastreamento-indexacao-e-ranqueamento]] — links e profundidade importam porque o robô descobre as páginas seguindo links
- [[links-e-urls-relativas-em-html]] — a estrutura de links e URLs depende de como os links são escritos
- [[design-responsivo-mobile-first]] — a decisão de versão móvel (responsivo ou URL separada) faz parte da arquitetura
- [[elementos-de-secao-semanticos-html5]] — navegação e seções bem marcadas ajudam a expressar a estrutura da página
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — robots.txt, noindex e canonical complementam a estrutura de links ao decidir o que o robô rastreia e indexa
- [[regra-prefira-subpasta-a-subdominio-ou-dominio-separado]] — a escolha entre subpasta, subdomínio e domínio faz parte das decisões de estrutura
- [[preparar-um-site-para-busca-movel]] — a decisão de configuração móvel (mesma URL ou URL separada) faz parte da arquitetura
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — princípios de arquitetura, do livro
