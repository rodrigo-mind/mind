---
titulo: "Melhorar velocidade e experiência móvel de um site"
tipo: framework
origem: guia
assunto: trafego
guia: guia-seo-brasil
fontes:
  - "guia-seo-brasil, módulos B3, B4 e B5"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
revisar_ate: 2027-02-23
---

# Melhorar velocidade e experiência móvel de um site

## Passos
1. **Medir com dados reais** (campo, CrUX, Search Console), não só laboratório; confirmar os limites atuais de LCP, INP e CLS. Testar no celular em 4G lento.
2. **Imagens:** WebP ou AVIF, tamanho correto, `width` e `height` definidos, `loading="lazy"` abaixo da dobra e imagem principal sem lazy.
3. **CSS e JS:** remover o não usado, adiar o não crítico, cortar scripts de terceiros desnecessários (chats, widgets, pixels). **Fontes:** poucas, `font-display: swap`, hospedadas no site.
4. **Servidor:** cache de página, Brotli ou Gzip, HTTP/2 ou 3, CDN, TTFB baixo. **PHP e MySQL:** OPcache, índices nas colunas de WHERE e JOIN, cache de resultados, `Cache-Control` e `ETag`, miniaturas geradas no upload.
5. **Móvel:** o Google indexa principalmente a versão móvel, então conteúdo, links e dados estruturados devem ser iguais aos do desktop; áreas de toque adequadas, texto legível, sem intersticiais invasivos; `tel:` e `wa.me` clicáveis; acessibilidade (alt, contraste, títulos, rótulos, teclado).
6. **Dados estruturados:** confirmar a galeria atual (em 2026 houve descontinuações, e o destaque de FAQ deixou de aparecer em 07/05/2026, segundo o guia); usar Organization ou LocalBusiness, Product com Offer, BreadcrumbList, Article, VideoObject, validar no Teste de pesquisa aprimorada e gerar dinamicamente no PHP, sem dados inventados. Avaliações marcadas só se forem reais e coletadas no próprio site.

## Saída esperada
Relatório por modelo de página, correções priorizadas e trechos de configuração e código.

## Erros comuns
Otimizar só a nota de laboratório; lazy na imagem principal; marcar avaliação inexistente.

## Conexões
- [[preparar-um-site-para-busca-movel]] — versão do livro (2015) do preparo para o celular
- [[adicionar-marcacao-schema-org-a-um-site]] — base de dados estruturados, a atualizar com a galeria atual
- [[problemas-tecnicos-de-plataforma-que-prejudicam-o-seo]] — falhas técnicas que também afetam a velocidade
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — regra de imagens do projeto de desenvolvimento
- [[guia-seo-brasil]] — guia de que esta nota foi extraída; ele traz o detalhe completo do módulo
- [[trafego]] — centralizador do assunto
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias lista esta nota entre as extraídas dos guias de pesquisa atual
- [[head-site-veiculos-TEMPLATE-1]] — aplica preload da imagem principal, fontes próprias e Speculation Rules no head
