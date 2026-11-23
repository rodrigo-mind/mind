---
titulo: "Otimizar os elementos de uma página para palavras-chave"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 206-216"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 219-221"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Otimizar os elementos de uma página para palavras-chave

## Para que serve
Colocar as palavras-chave pesquisadas nos lugares certos de uma página (título, descrição, cabeçalhos, texto, imagens) sem cair em repetição forçada, de modo que a página seja entendida pelo buscador e atraente para quem clica.

## Quando usar e quando não usar
Depois de mapear termos a URLs (ver mapear-palavras-chave-a-urls-da-arquitetura). O livro avisa que a contagem de repetições deixou de ser critério: páginas com 61 repetições não vencem páginas com 60, e o excesso (keyword stuffing) pode levar a desvalorização. O ponto de partida é a qualidade para o leitor.

## O que perguntar ao usuário antes
- Qual é a palavra-chave principal e as variações de cada página
- Quem escreve o conteúdo e se ele conhece o básico de SEO
- Se o CMS permite alterar títulos, descrições e cabeçalhos por página

## Passos
1. **Título da página (title tag).** É o único elemento de metadados que influencia diretamente a relevância. Regras do livro: palavras-chave no começo (e a marca no fim, a menos que a marca seja forte e o clique pese mais); cerca de 50 caracteres (o Google corta por largura em pixels e pode reescrever o título se achar que não descreve a página); frases relevantes mais longas valem mais, desde que fiquem exatas; um divisor entre marca e descrição (barra vertical, hífen etc.); foco em clique e conversão, testando com anúncios se houver estabilidade de volume; refletir a intenção do buscador (pesquisa ou compra); escrever para pessoas; manter um padrão por seção. Não use o mesmo termo no título de duas páginas.
2. **Meta descrição.** Não é fator de ranking; serve para descrever a página, funcionar como anúncio curto e exibir os termos buscados (em negrito). Sete regras: dizer a verdade; ser curta (cerca de 140 caracteres para caber no Google); escrever como um anúncio; considerar que quem clica no orgânico tem outra motivação que quem clica no pago; incluir as palavras-chave; e não escrever descrição em todas as páginas: em catálogos enormes de cauda longa pode ser melhor deixar o buscador extrair o trecho que contém o termo buscado.
3. **Cabeçalhos (H1, H2, H3).** O buscador mostra leve preferência por palavras-chave neles, com mais peso ao nível mais alto presente. O H1 funciona como rótulo da página inteira, complementar ao título; o estilo visual (tamanho) pouco importa. Nem toda página precisa de H1, mas deve ter um cabeçalho de topo claro; o título do artigo costuma ser o melhor H1.
4. **Texto.** Escreva conteúdo semanticamente rico, que cubra o tema com sinônimos e assuntos relacionados; a palavra principal vai no título e no cabeçalho principal, e pode aparecer no corpo. Repetir a mesma frase vira sinal de má qualidade. O livro menciona TF-IDF (frequência de um termo na página comparada à de outras páginas do tema), mas desaconselha olhar só para ele.
5. **Segmentação da página.** O Google lê o layout da página e dá mais peso ao conteúdo principal que a barras laterais e rodapé; marcar a área principal com HTML5 ajuda.
6. **Coocorrência e completude.** Uma página sobre uma pessoa deve citar os fatos que se esperam dela; a ausência pode sinalizar página fraca. Linke para outros recursos (do site e de terceiros) que respondam perguntas seguintes, em vez de querer responder tudo numa só página. Em páginas de loja, combine descrição única e bem estruturada com acesso a refinamentos (marcas, tipos relacionados) e páginas institucionais.
7. **Imagens.** Nomes de arquivo descritivos (abe-lincoln.jpg em vez de uma sequência de números) e texto alternativo (alt) fiel à imagem, entre aspas; imagem como link não substitui um link de texto com âncora rica. Negrito deixou de ter efeito.
8. **Conteúdo gerado em escala (CMS e textos automáticos).** Foque em receitas para gerar títulos e cabeçalhos únicos (a extração automática de um resumo de menos de 55 caracteres, distinto dos outros) e treine os redatores: o título é o elemento mais importante, depois o primeiro cabeçalho e o corpo; use sinônimos e conceitos relacionados; a qualidade e a experiência vêm antes das palavras-chave.
9. **Cauda longa nas páginas.** Uma página de pedido de pizza só com título, telefone e formulário não compete na cauda longa: acrescente conteúdo útil (tipos, ingredientes). Para páginas de várias cidades, escreva conteúdo diferente em cada uma (preferências e direções locais) para não gerar duplicidade nem canibalização.
10. **Estrutura do conteúdo e extensão.** Não há tamanho ideal: depende do tema; textos longos podem aparecer em seções de artigos aprofundados do Google. Fonte legível, contraste e layout limpo ajudam a ser lido e linkado.

## Saída esperada
Para cada página: título, meta descrição (ou decisão de omitir), H1, esboço de cabeçalhos, termos e sinônimos, nomes e alt das imagens.

## Erros comuns
- Colocar a mesma palavra-chave em vários títulos (ver canibalizacao-de-palavras-chave).
- Escrever o título "para máquina".
- Usar uma meta descrição genérica igual em todas as páginas (o livro sugere omitir se não der para ser única).
- Priorizar densidade de palavras-chave.

## Notas do Claude
Limites de caracteres e a aparência dos resultados mudaram desde 2014; confira ferramentas de pré-visualização atuais. Para termos de marca em CMS grandes, o ajuste do padrão de título por seção costuma render mais do que ajustes página a página.

## Conexões
- [[canibalizacao-de-palavras-chave]] — repetir o mesmo termo no título de várias páginas gera canibalização
- [[mapear-palavras-chave-a-urls-da-arquitetura]] — o mapa de termos por URL diz qual termo vai no título e nos cabeçalhos de cada página
- [[otimizar-a-presenca-em-busca-local]] — títulos e cabeçalhos das páginas de unidade levam nome, tipo de negócio e localização
- [[intencao-de-busca-e-coocorrencia-de-termos]] — o título e o texto devem responder à intenção do buscador e usar termos relacionados
- [[o-que-os-buscadores-leem-em-uma-pagina]] — o framework aplica o que o robô lê (título, meta descrição, alt) na otimização da página
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[estrategia-gbp-seo-local]] — complementa com a prática atual no Brasil: pede cidade ou bairro no título e no H1 das páginas principais
- [[metadados-do-documento-html]] — título e meta descrição são os metadados que o framework otimiza para SEO
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — o alt e o nome de arquivo das imagens fazem parte da otimização de página
- [[guia-seo-brasil]] — o módulo D3 atualiza a otimização de título, descrição e cabeçalhos
- [[produzir-e-operar-conteudo-de-redes-sociais]] — a lógica de palavra-chave no título e no texto vale também nas redes
- [[criar-anuncios-responsivos-e-recursos-para-o-mercado-brasileiro]] — a página de destino também precisa de título, H1 e conteúdo otimizados
- [[planejar-o-conteudo-de-seo-para-o-publico-brasileiro]] — otimização da página, do livro
