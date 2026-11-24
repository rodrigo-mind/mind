---
titulo: "Controlar o robô de busca: robots.txt, metatags, canonical e mapa do site"
tipo: conceito
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 182-186"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 6, p. 226-243"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Controlar o robô de busca: robots.txt, metatags, canonical e mapa do site

## Definição
Conjunto de instruções com que o site orienta o que o robô rastreia, indexa e valoriza:

- **robots.txt** (na raiz do domínio, em texto simples, nome em minúsculas): impede o rastreamento de áreas inteiras (partes não públicas, scripts, versões de impressão, ordenações). Cada subdomínio e cada protocolo (http e https) precisa do seu. Comandos: User-agent e Disallow; em alguns buscadores também crawl-delay, curingas (asterisco e cifrão), Allow e Sitemap. Cuidado: bloquear não impede a indexação (a URL pode aparecer sem descrição se outros sites linkarem para ela), e um erro de digitação pode bloquear o site todo; teste o arquivo.
- **Meta robots:** `noindex` tira a página do índice mas deixa o robô rastreá-la, de modo que ela ainda acumula e repassa autoridade; `nofollow` impede que os links da página repassem autoridade, mas não impede o rastreamento. O livro sugere noindex em páginas HTML de mapa do site, sem nofollow.
- **rel="nofollow" em links:** nasceu em 2005 contra spam em comentários e é recomendado para links pagos. Foi usado para "esculpir" o PageRank interno, mas desde 2009 a autoridade desses links é descartada, e não redistribuída; hoje o uso interno não traz o benefício esperado e pode parecer excesso de otimização.
- **Tag canônica (rel="canonical"):** diz ao buscador que a página é cópia de outra URL e que as métricas devem ir para ela, sem redirecionar o visitante. É sugestão, e não ordem: é mais fraca que o 301. Pode ir no cabeçalho HTTP (útil para PDFs). Melhor é eliminar o duplicado; a canônica é a alternativa quando isso não dá.
- **Mapa do site XML (Sitemap):** lista de URLs que se quer rastrear e indexar. Complementa o rastreamento por links, não o substitui, e não garante indexação. Inclui metadados (data de modificação, frequência) e ajuda a escolher a URL canônica. Inclua só a versão preferida de cada URL, sem duplicados, páginas de paginação, ordenações alternativas, páginas de baixo valor ou parâmetros de rastreamento. Existem versões para mobile, vídeo e imagem. Fica na raiz (ou no nível mais alto a rastrear) e pode ser anunciado com uma linha no robots.txt; atualize quando adicionar páginas novas (não precisa reenviar se o endereço do arquivo não mudou). Sites que mudam muito geram o arquivo automaticamente. Ele ajuda a diagnosticar problemas de indexação e duplicidade.
- **Outros mecanismos:** bloqueio por IP ou por agente de usuário (cuidado para não bloquear robôs legítimos; para verificar um robô, faça uma busca DNS reversa seguida de direta), iframes bloqueados no robots.txt, formulários, senhas e CAPTCHA (que impedem o acesso do robô) e remoção de URLs pelas ferramentas dos buscadores.

**Cloaking e conteúdo diferente para o robô.** Mostrar ao robô conteúdo diferente do dos visitantes é cloaking e viola as diretrizes; o Google afirmou que não existe "cloaking do bem", embora vários sites grandes façam variações. O que pesa é a intenção. Usos que o livro considera aceitáveis, com cautela: testes A/B (dar ao robô uma versão canônica fixa), conteúdo com registro e o programa First Click Free (liberar o texto ao robô, mas deixar o visitante vindo do buscador ler o primeiro artigo sem cadastro), navegação em Flash ou JavaScript acompanhada de links em HTML equivalentes, conteúdo padrão quando se personaliza por região ou resolução, e controle de duplicados. Para mostrar ao robô só o que ele deve ver, o livro cita cookies e IDs de sessão (o robô não usa cookies), mas lembra que IDs de sessão na URL geram URLs únicas e duplicadas.

## Por que importa
Essas ferramentas decidem o que entra no índice e para onde vai a autoridade. Usadas ao contrário (por exemplo, bloquear o que se quer ranquear) derrubam o tráfego.

## Como se relaciona
- Escolha de ferramenta em resolver-conteudo-duplicado-e-conteudo-fino.
- O 301 é tratado em implementar-redirecionamentos-301-sem-perder-autoridade.
- O rastreamento e a indexação estão em rastreamento-indexacao-e-ranqueamento e em eficiencia-de-rastreamento-e-erros-de-rastreamento.

## Notas do Claude
O livro avisa que o suporte a comandos como crawl-delay, Allow e Noindex no robots.txt varia entre buscadores e que o Noindex em robots.txt era informal em 2014; confira a documentação atual de cada buscador.

## Conexões
- [[arquitetura-de-site-amigavel-a-buscadores]] — robots.txt, noindex e canonical complementam a estrutura de links ao decidir o que o robô rastreia e indexa
- [[eficiencia-de-rastreamento-e-erros-de-rastreamento]] — robots.txt e metatags mal configurados aparecem como erros e páginas não rastreadas
- [[implementar-redirecionamentos-301-sem-perder-autoridade]] — o 301 é a alternativa mais forte à canonical para unificar URLs
- [[otimizacao-para-buscas-verticais-imagem-video-produtos-e-noticias]] — mapas do site de imagem, vídeo e notícia e a liberação de pastas de imagens dependem destes controles
- [[rastreamento-indexacao-e-ranqueamento]] — as instruções ao robô atuam sobre as etapas de rastreamento e indexação
- [[resolver-conteudo-duplicado-e-conteudo-fino]] — a canonical e o noindex são as ferramentas para tratar duplicados que não dá para eliminar
- [[preparar-um-site-para-busca-movel]] — URLs móveis separadas pedem mapa do site móvel e anotações, e CSS e JavaScript não podem ser bloqueados
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[guia-seo-brasil]] — o módulo B1 trata de robots.txt, sitemap, canonical e noindex, com os riscos de mudança em produção
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — explica o funcionamento de cada controle usado aqui
- [[otimizar-o-site-para-busca-com-ia-e-decidir-a-politica-de-rastreadores]] — o robots.txt é o mecanismo que aplica a política de rastreadores
- [[head-site-veiculos-TEMPLATE-1]] — aplica robots, canonical e noindex por tipo de página de uma loja de veículos
