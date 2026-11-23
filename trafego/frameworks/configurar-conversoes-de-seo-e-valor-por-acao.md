---
titulo: "Configurar conversões de SEO e valor por ação"
tipo: framework
origem: destilar
assunto: trafego
fontes:
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 11, p. 531-534"
  - "Eric Enge, Stephan Spencer e outros, The Art of SEO, cap. 11, p. 535-542"
confianca: alta
criado: 2026-11-23
atualizado: 2026-11-23
---

# Configurar conversões de SEO e valor por ação

## Para que serve
Ligar o tráfego orgânico ao que ele rende ao negócio, definindo o que conta como conversão, quanto vale cada uma e como medi-las no analytics.

## Quando usar e quando não usar
Antes de investir em SEO e sempre que o objetivo do site mudar. O livro avisa que o analytics não sabe o que você considera conversão até você definir.

## O que perguntar ao usuário antes
- Tipo de site (loja, B2B, blog, comunidade) e as ações que indicam avanço rumo à venda
- Dados de receita, margem e taxa de fechamento por origem
- Quem pode instalar código de rastreamento (normalmente um desenvolvedor)

## Passos
1. **Liste todas as conversões**, não só a compra: vendas ou receita (melhor ainda, margem; em sites de anúncio, o efeito na receita de anúncios), inscrição em e-mail, blog ou newsletter, cadastros em ferramentas, downloads, formulários de contato e ligações (com números exclusivos por origem), visitantes que compartilham, que linkam e que divulgam o site.
2. **Escolha as ações por tipo de site.** O livro sugere, por exemplo: loja (adicionar ao carrinho, finalizar compra, lista de desejos, enviar a um amigo); B2B (newsletter, formulário de contato, link de e-mail, com e-mails de vendas separados dos de suporte); blog (assinar o feed, comentar, compartilhar); comunidade (criar conta, publicar, comentar, votar).
3. **Atribua valor a cada ação.** Estime pela proporção que vira cliente. No exemplo do livro, se 100 pessoas se inscrevem, 10 compram e os pedidos somam US$ 200, cada inscrição vale US$ 2; refine com mais dados. Outro exemplo do livro: 100 downloads de um estudo e 2 clientes de um contrato de US$ 100 mil dão US$ 2 mil por download.
4. **Configure no analytics.**
   - Metas de página (alguém chegou à página de agradecimento) são simples; marque a confirmação da ação, e não o formulário, para não contar preenchimentos incompletos.
   - Eventos (clique em link, download, vídeo, elementos em Flash ou AJAX) exigem código no próprio elemento, melhor com apoio de desenvolvedor.
   - Em vendas com preços variados, o código fica na página de confirmação do pedido, com dados como valor total, produtos e frete.
5. **Segmente os resultados** por palavra-chave (cada vez mais obscurecida), origem de tráfego, página que converteu e página de entrada inicial; compare orgânico com outros canais (busca paga, e-mail, redes). Foque esforço onde a taxa de conversão é alta e há volume.
6. **Considere a atribuição.** As pessoas interagem com várias mídias antes de comprar (busca orgânica e depois anúncio; busca e compra em loja física; TV e depois busca). Segundo um estudo citado pelo livro, 30% das transações ocorreram de um a três dias depois da primeira visita. Como o rastreamento depende de cookies que se apagam, a atribuição é imperfeita: conte mais tipos de conversão e eventos de progresso para ver em que etapa a busca orgânica entra.

## Saída esperada
Uma lista de conversões com valor estimado, o plano de rastreamento (metas, eventos, páginas) e um relatório por origem e página.

## Erros comuns
- Considerar só a venda final como conversão.
- Marcar a conversão no formulário em vez da página de confirmação.
- Esquecer ações sem valor direto (inscrições, downloads) que antecipam compra.
- Mexer no código de eventos sem teste.

## Exemplo mínimo (inventado pelo Claude, não do livro)
Um estúdio de arquitetura define três conversões: pedido de orçamento (R$ 400 de valor estimado), download de catálogo (R$ 40) e ligação por número exclusivo do site (R$ 250). A página de agradecimento do formulário vira meta, e o telefone do site é diferente do usado em anúncios.

## Notas do Claude
O código de exemplo do livro usa uma versão antiga do rastreador (ga.js). A lógica é a mesma nas versões atuais, mas a implementação mudou; confirme a documentação atual.

## Conexões
- [[medir-resultados-de-seo-com-kpis-acionaveis]] — conversões e seu valor são a base dos resultados de negócio que os KPIs acompanham
- [[calcular-o-roi-do-seo]] — o ROI usa a taxa de conversão e o valor por conversão definidos no rastreamento
- [[metricas-acionaveis-e-de-vaidade]] — definir o que conta como conversão evita medir só números de vaidade
- [[trafego]] — centralizador do assunto, que reúne as notas de SEO e de tráfego orgânico
- [[mapa-the-art-of-seo]] — o mapa acompanha a destilação do livro de que esta nota veio
- [[estrategia-gbp-seo-local]] — complementa com a prática atual no Brasil: rastreia ligações, WhatsApp e agendamentos com UTM e eventos de conversão
- [[guia-google-ads-brasil]] — o módulo B (mensuração antes de otimizar) trata de conversões, que o framework de SEO também exige
- [[guia-trafego-pago-meta-brasil]] — o módulo B (pixel, API de conversões e WhatsApp) trata de conversões, que o framework de SEO também exige
