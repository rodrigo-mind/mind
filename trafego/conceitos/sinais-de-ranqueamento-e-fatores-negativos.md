---
titulo: "Sinais de ranqueamento e fatores negativos"
tipo: conceito
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 2, p. 52-57"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 2, p. 63-65"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 11, p. 563-566, 582-586"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 7, p. 297-314"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 8, p. 388-405, 423-430"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Sinais de ranqueamento e fatores negativos

## Definição
Conjunto de sinais que o buscador pode combinar para calcular relevância e importância. O livro os separa assim:

**Análise do documento.** Procura os termos buscados nas áreas importantes (título, metadados, cabeçalhos, texto) e estima a qualidade (por exemplo, muitos erros de ortografia ou nível de leitura incompatível com o público sugerem pouco cuidado editorial). Soma a **conectividade semântica**: palavras associadas entre si, para entender o tema de uma página como uma pessoa faria.

**Análise de links.** Conta quem linka e o que diz do site, mas links não são iguais: um pode valer milhões de vezes mais que outro, conforme a autoridade da página e do site de origem e o tema. O livro explica a "vizinhança de links" (grupos de sites ligados entre si por tema) e o texto âncora: âncora com termo relevante pode ajudar mais que "clique aqui", mas 10 mil links com a mesma âncora comercial e poucos links diversos parecem artificiais e podem levar a penalidade. O contexto da página que linka também conta.

**Engajamento do usuário.** Cliques que voltam rápido à lista de resultados, taxa de rejeição, tempo no site e páginas por visita são indícios possíveis de qualidade, e o Google tem acesso a esses dados de várias fontes. O livro diz que o uso real é especulação dos autores e que pouco é público; o que importa é comparar o seu site com o dos concorrentes.

**Sinais sociais.** Havia forte correlação entre curtidas do Google+ e ranking num estudo de 2013, mas correlação não prova causa: bom conteúdo recebe links e curtidas. Outro estudo não achou impacto material. Representantes do Google negam que sinais sociais entrem no algoritmo.

**Lista dos fatores mais citados por especialistas** (pesquisa da Moz, em ordem decrescente de importância): autoridade de links do domínio; métricas de links da página; palavras-chave e conteúdo da página; características da página sem relação com palavras-chave; métricas de marca do domínio; dados de uso, tráfego e consulta; métricas sociais da página; uso de palavras-chave no domínio; características do domínio sem relação com palavras-chave.

**Fatores negativos:** muitos links de baixa qualidade que parecem artificiais (alvo do algoritmo Penguin), malware, cloaking (mostrar conteúdo diferente ao robô), venda ou anúncio de links, e páginas excepcionalmente lentas (a velocidade virou fator em 2010).

**Outros sinais possíveis:** ritmo de aquisição de links (um salto brusco pode indicar mais relevância ou spam, conforme a origem) e dados do usuário (localização, preferências e histórico de buscas, a "busca adaptativa").

**Como os buscadores avaliam um link (capítulo 7).** O livro parte do PageRank original: cada link é um voto, e cada página tem um PageRank inicial pequeno e repassa uma parte (que o livro estima em 85% a 90%) dividida entre seus links, com cálculo iterativo. A fórmula original tratava links internos e externos igual, o que gerou o medo de "vazamento" de PageRank; o Google corrigiu isso, e o livro recomenda linkar para outras páginas de qualidade. O algoritmo atual já não é o PageRank original. Além dele, pesam:
- **Texto âncora:** a âncora diz do que trata a página linkada. Já foi tão forte que permitiu "Google bombing", e hoje o abuso de âncoras é tratado como sinal artificial.
- **Relevância** do tema do link para a busca, **autoridade** (sites que a maioria das fontes do tema linka, a ideia de hubs e autoridades) e **confiança** (distância de um conjunto-semente de sites confiáveis; links para sites de spam reduzem a confiança).
- **Independência da fonte:** links do seu próprio site, ou de grupos de sites seus muito interligados, valem como internos; um site sem links independentes não tem poder de voto.
- **Vários links do mesmo domínio** têm valor decrescente, e links em todas as páginas de um site (sitewide) podem prejudicar.
- **Diversidade de fontes** (mídia nacional e local, blogs, universidades, sites relevantes de áreas próximas) protege contra mudanças de algoritmo e parece mais natural.
- **Fatores de tempo:** quando o link surgiu, sumiu e há quanto tempo existe, e a velocidade de aquisição.
- **Contexto:** links para a página que linka, links vizinhos, posição na página (corpo do texto vale mais que lista lateral), texto próximo, cabeçalho mais próximo, contexto da página e do site.
- **Extensões .edu e .gov não têm bônus automático**, segundo um responsável do Google citado no livro; a autoridade vem da análise de links por tema e por seção do site.
Os buscadores usam links para descobrir páginas, decidir o que indexar, definir a frequência de rastreamento (o Google disse que rastreia em ordem inversa de PageRank) e como desempate de ranking. Uma estimativa prática do valor de um link considera a relevância da página e do domínio, a autoridade, a posição do link e o número de links de saída da página (PageRank repassado = n/r para uma página com n de PageRank passável e r links).

**Evidências sobre sinais sociais e engajamento (capítulo 8).** Estudos de correlação (da Moz e da Searchmetrics) mostraram forte relação entre sinais sociais e ranking, mas o livro repete que correlação não prova causa: conteúdo bom tende a ganhar links e compartilhamentos. Testes citados: o Bing experimentou usar curtidas do Facebook e recuou (um dirigente disse que o sentido de uma curtida é ambíguo); o Google indexa só uma parte pequena do conteúdo do Facebook e do Twitter (cerca de 59% das postagens de 85 perfis influentes e uma fração baixa dos tuítes) e os links dessas redes são nofollow; e um experimento com compartilhamentos no Google+ não mostrou mudança de ranking, embora o Google+ afetasse muito a busca personalizada e as páginas de marca. Conclusão do livro: as redes não são fator direto de ranking (salvo personalização), mas importam de forma indireta.
Os buscadores têm muitas fontes de dados de uso (resultados de busca, navegadores, anúncios contextuais, barras de ferramentas, sistemas de celular, análise de sites, encurtador de URLs, e-mail, pagamentos) e sinais possíveis: taxa de cliques, clique em outros resultados, novas buscas, taxa de rejeição, tempo na página e no site, páginas por visita, visitas repetidas, impressão e favoritos, rolagem. Sinais de voto: lista de bloqueio do Chrome (usada no Panda 2.0), +1, buscas e menções à marca. Análise de documento como indício de qualidade: erros de ortografia, nível de leitura, excesso de palavras-chave sem sinônimos, densidade de anúncios acima da dobra, "sameness" (assunto igual ao de milhares de páginas sem autoridade nem ponto de vista único) e velocidade da página, que o Google anunciou como fator em 2010, mas afetando só cerca de 1% dos resultados; só pesa se o site for muito lento.

**Como estimar o valor de um link (cap. 11).** Não há resposta simples; o livro sugere olhar, em ordem de importância: onde a página que linka ranqueia para o termo que você quer; onde ela e o domínio ranqueiam para termos competitivos de seus títulos; para quantas frases o domínio ranqueia entre os 20 primeiros (poucas pode indicar excesso de otimização); se o site vende links (pode perder o poder de repassar autoridade e ser penalizado, até retroativamente); a relevância do tema; a data do último rastreamento (cache recente indica importância); e quantos links apontam para a própria página e quanto tráfego ela tem. Secundários: links para concorrentes bem ranqueados, a autoridade do domínio por métricas de terceiros, quantidade de links de saída na página (menos links dá mais peso a cada um) e métricas como Domain Authority, Page Authority, Citation Flow e Trust Flow. O livro avisa que o PageRank público deixou de ser atualizado, e que evitar sites de autoridade média pode custar links relevantes.

**Crescimento de links e conteúdo ao longo do tempo (cap. 11).** O buscador observa padrões: com que frequência o site ganha páginas e é atualizado, e se os links novos crescem, estagnam ou caem. Ganho súbito e desproporcional de links, como milhares de links novos em uma semana para um site local pequeno sem fato noticioso, tende a chamar atenção e pode levar a uma revisão manual.

## Por que importa
Mostra onde investir e o que evitar: links de qualidade e relevantes, conteúdo com qualidade editorial, experiência rápida e consistente. Também previne o erro de perseguir sinais não comprovados (como curtidas).

## Como se relaciona
- Faz parte do funcionamento descrito em rastreamento-indexacao-e-ranqueamento.
- A avaliação de links tem a seção "Como os buscadores avaliam um link" nesta nota e a regra regra-ganhe-links-nao-os-compre-troque-nem-fabrique; o planejamento de conteúdo para ganhar links está em planejar-uma-campanha-de-marketing-de-conteudo.
- A parte de engajamento se liga a regra-acompanhe-o-trafego-e-nao-apenas-a-posicao-no-ranking.

## Notas do Claude
O livro tem data de 2014: Google+ foi encerrado, e a lista da Moz e o papel dos sinais sociais são dessa época. Os fatores mudam; o que se mantém é a lógica de relevância, importância (autoridade) e qualidade.

## Conexões
- [[rastreamento-indexacao-e-ranqueamento]] — os sinais compõem a relevância e a importância que definem a ordem dos resultados
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[panda-penguin-e-penalidades-do-google]] — as penalidades são o lado negativo dos sinais de qualidade e de links
- [[regra-ganhe-links-nao-os-compre-troque-nem-fabrique]] — explica por que links comprados ou fabricados perdem valor como sinal
- [[preparar-um-site-para-busca-movel]] — a velocidade da página é um dos sinais de qualidade que pesam em especial no celular
- [[avaliar-uma-rede-social-e-medir-resultados-para-seo]] — reúne as evidências de que sinais sociais não são fator direto de ranking
