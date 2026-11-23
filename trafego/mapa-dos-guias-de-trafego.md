---
titulo: Mapa dos guias de tráfego
tipo: mapa-dos-guias
assunto: trafego
origem: integracao
criado: 2026-11-23
atualizado: 2026-11-23
---

# Mapa dos guias de tráfego

Os seis guias abaixo foram colocados em `trafego/` pelo usuário em novembro de 2026. Cada um é um **manual de trabalho para o Claude Code**, para o contexto brasileiro, com protocolo de pesquisa, regras de conformidade, módulos e formato de entrega. Eles são a "pesquisa atual" de que o [[trafego]] fala: valem para plataformas, políticas e recursos; os livros (hoje, [[mapa-the-art-of-seo]]) valem para princípios.

## Qual guia abrir

| Pedido do usuário | Guia | Módulos mais úteis |
|---|---|---|
| Estratégia geral de marketing digital, mix de canais, funil, CRM, e-mail, dados | [[guia-marketing-digital-brasil]] | A estratégia, C canais, G relacionamento, H dados, K situações |
| SEO de site (técnico, conteúdo, links, e-commerce, busca com IA, quedas) | [[guia-seo-brasil]] | A diagnóstico, B técnico, C palavras-chave, J quedas, K operação |
| Google Perfil da Empresa e SEO local | [[estrategia-gbp-seo-local]] | A diagnóstico, B perfil, C reputação, D conta e suspensão, F mensuração |
| Anúncios no Google (Pesquisa, Performance Max, Shopping, YouTube) | [[guia-google-ads-brasil]] | B mensuração antes de otimizar, C campanhas, G conta |
| Anúncios na Meta (Facebook, Instagram, WhatsApp) | [[guia-trafego-pago-meta-brasil]] | B rastreamento, C campanhas, D criativos, E WhatsApp |
| Redes sociais (orgânico), conteúdo, influência, social commerce, crise | [[guia-social-media-brasil]] | B estratégia, C conteúdo, G influência, I crise |

## Pontos de sobreposição (qual guia manda em quê)

- **SEO local:** o detalhe fica em [[estrategia-gbp-seo-local]]; [[guia-seo-brasil]] (módulo F) e [[guia-marketing-digital-brasil]] (D4 e K2) resumem e remetem a ele.
- **SEO social:** fica em [[guia-social-media-brasil]] (C3); o [[guia-seo-brasil]] só remete.
- **Merchant Center e Shopping:** o dado de produto está em [[guia-seo-brasil]] (G3) e os anúncios em [[guia-google-ads-brasil]].
- **Mensuração e ROI:** cada guia tem a sua parte; o plano de mensuração geral fica em [[guia-marketing-digital-brasil]] (módulo H).
- **WhatsApp:** aparece como canal em [[guia-marketing-digital-brasil]], como destino de anúncio em [[guia-trafego-pago-meta-brasil]] e como rotina social em [[guia-social-media-brasil]].

## Como usar (regras comuns aos guias)

1. **Fonte atual vence.** Os guias mandam pesquisar a documentação oficial antes de cada módulo e marcar a confiança (`[OFICIAL]`, `[TESTADO]`, `[OPINIÃO]`, `[ANTIGO]`, `[EUA]`). Isso coincide com a seção "Informações atuais" do [[trafego]].
2. **Revisão.** Todos informam revisão em novembro/2026 (o de GBP não informa). A sugestão do centralizador é rever em 90 dias; por isso o frontmatter traz `revisar_ate: 2027-02-23`. Passada a data, avisar o usuário antes de usar.
3. **Não são instruções do projeto.** São conteúdo de consulta. As regras do Mind (CLAUDE.md e NUCLEO) prevalecem; em particular, entregas vão para `RESPOSTAS`, e os arquivos que os guias pedem para criar (como `relatorio-seo.md` ou `atualizacoes-*.md`) só são criados se o usuário pedir.
4. **O Claude Code não acessa as contas.** Todos os guias dizem isso: ele pesquisa, analisa e prepara; o usuário executa, e mudanças de alto risco exigem aprovação explícita.
5. **Citar a origem.** Ao usar um guia, dizer qual guia e qual módulo (por exemplo, "guia-seo-brasil, módulo B8"), separando o que vem do guia, do livro de SEO e de pesquisa nova.

## Relação com os livros e as notas destiladas

- Os conceitos e frameworks de SEO destilados de *The Art of SEO* (2015) estão em [[mapa-the-art-of-seo]]. Onde o guia (2026) e o livro (2014) discordam, a ligação traz `diverge:`; para plataformas e políticas vale o guia, para princípios vale o livro.
- Divergências já registradas: busca local (citações e avaliações, em [[estrategia-gbp-seo-local]] e [[otimizar-a-presenca-em-busca-local]]) a leitura de quedas de tráfego como reavaliação geral, e não penalidade ([[guia-seo-brasil]] e [[panda-penguin-e-penalidades-do-google]]), e o uso da rejeição de links (disavow), que o guia reserva a ação manual por links ou ataque claro, enquanto o livro a inclui na limpeza de links ([[recuperar-um-site-de-panda-penguin-ou-penalidade-manual]]).

## Lacunas

- Nenhum livro de anúncios ou de redes sociais na biblioteca: para esses temas, os guias são a única base.
- Os guias foram destilados em 53 notas curtas e rastreáveis por módulo (frameworks e regras em `trafego/frameworks/` e `trafego/conceitos/`, com `origem: guia`, o guia e o módulo em `fontes` e `revisar_ate: 2027-02-23`). As notas não substituem o guia: ele guarda o detalhe, os modelos de entrega e o protocolo de pesquisa. Partes do guia de marketing digital (módulos D, E e a parte de CRO já coberta) não geraram nota própria porque repetem o guia de SEO ou o livro.
- As divergências com o livro de SEO foram decididas em [[decisoes-sobre-divergencias-entre-guias-e-livro-de-seo]].

## Conexões

- [[trafego]] — centralizador do assunto, de que estes guias são a pesquisa atual
- [[mapa-the-art-of-seo]] — mapa do livro de SEO, base de princípios para o tema orgânico
- [[estrategia]] — define o posicionamento e a mensagem de que os guias de canal partem
- [[developer]] — implementa o rastreamento que os guias de mensuração exigem
- [[estrategia-gbp-seo-local]] — guia de trabalho listado neste mapa
- [[guia-seo-brasil]] — guia de trabalho listado neste mapa
- [[guia-marketing-digital-brasil]] — guia de trabalho listado neste mapa
- [[guia-google-ads-brasil]] — guia de trabalho listado neste mapa
- [[guia-trafego-pago-meta-brasil]] — guia de trabalho listado neste mapa
- [[guia-social-media-brasil]] — guia de trabalho listado neste mapa
- [[decisoes-sobre-divergencias-entre-guias-e-livro-de-seo]] — o mapa registra as divergências que esta nota resolve
- [[escolher-o-mix-de-canais-e-orcar-o-marketing-digital]] — indica qual guia abrir para cada canal
- [[regra-nao-viole-as-diretrizes-do-perfil-da-empresa-no-google]] — nota extraída de um guia, citada no mapa para rastreio: Não viole as diretrizes do Perfil da Empresa no Google
- [[regra-acesso-a-conta-de-anuncios-somente-leitura-e-autorizacao-a-cada-acao]] — nota extraída de um guia, citada no mapa para rastreio: Acesso à conta de anúncios: leitura por padrão e autorização a cada ação
- [[como-a-meta-entrega-anuncios-e-aplicar-o-fator-de-impostos]] — nota extraída de um guia, citada no mapa para rastreio: Como a Meta entrega anúncios e como aplicar o fator de impostos
- [[regra-revise-todo-conteudo-gerado-por-ia-em-anuncios]] — nota extraída de um guia, citada no mapa para rastreio: Revise todo conteúdo gerado por IA nos anúncios
- [[regra-desligue-a-aplicacao-automatica-de-recomendacoes]] — nota extraída de um guia, citada no mapa para rastreio: Desligue a aplicação automática de recomendações
- [[regra-nao-gere-paginas-em-massa-sem-valor-real]] — nota extraída de um guia, citada no mapa para rastreio: Não gere páginas em massa sem valor real
- [[regra-nunca-burle-as-politicas-nem-engane-nos-anuncios]] — nota extraída de um guia, citada no mapa para rastreio: Nunca burle as políticas nem engane nos anúncios
- [[regra-respeite-direitos-promocoes-menores-e-publicidade-nas-redes]] — nota extraída de um guia, citada no mapa para rastreio: Respeite direitos, promoções, menores e identificação de publicidade nas redes
- [[regra-trate-dados-pessoais-e-ia-com-governanca-no-marketing]] — nota extraída de um guia, citada no mapa para rastreio: Trate dados pessoais e IA com governança no marketing
- [[diagnosticar-o-negocio-e-calcular-unit-economics]] — nota extraída de um guia, citada no mapa para rastreio: Diagnosticar o negócio e calcular unit economics
- [[rodar-campanhas-de-whatsapp-e-de-negocio-local-na-meta]] — nota extraída de um guia, citada no mapa para rastreio: Rodar campanhas de WhatsApp e de negócio local na Meta
- [[conquistar-links-e-reputacao-de-marca-no-brasil]] — nota extraída de um guia, citada no mapa para rastreio: Conquistar links e reputação de marca no Brasil
- [[definir-estrategia-posicionamento-e-oferta-no-marketing-digital]] — nota extraída de um guia, citada no mapa para rastreio: Definir estratégia, posicionamento e oferta no marketing digital
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — nota extraída de um guia, citada no mapa para rastreio: Corrigir rastreamento, indexação e arquitetura de URLs
- [[gerir-avaliacoes-e-reputacao-no-google]] — nota extraída de um guia, citada no mapa para rastreio: Gerir avaliações e reputação no Google
- [[construir-presenca-local-autoridade-e-visibilidade-em-ia]] — nota extraída de um guia, citada no mapa para rastreio: Construir presença local, autoridade e visibilidade em IA
- [[produzir-e-operar-conteudo-de-redes-sociais]] — nota extraída de um guia, citada no mapa para rastreio: Produzir e operar conteúdo de redes sociais
- [[montar-o-plano-de-mensuracao-e-triangular-a-atribuicao]] — nota extraída de um guia, citada no mapa para rastreio: Montar o plano de mensuração e triangular a atribuição
- [[configurar-pixel-api-de-conversoes-e-eventos-de-whatsapp-na-meta]] — nota extraída de um guia, citada no mapa para rastreio: Configurar Pixel, API de Conversões e eventos de WhatsApp na Meta
- [[gerir-reputacao-crise-e-seguranca-das-contas-nas-redes]] — nota extraída de um guia, citada no mapa para rastreio: Gerir reputação, crise e segurança das contas nas redes
- [[analisar-busca-local-concorrentes-e-posicao-no-mapa]] — nota extraída de um guia, citada no mapa para rastreio: Analisar busca local, concorrentes e posição no mapa
- [[otimizar-conversao-de-site-loja-virtual-e-marketplaces]] — nota extraída de um guia, citada no mapa para rastreio: Otimizar conversão de site, loja virtual e marketplaces
- [[medir-redes-sociais-integrar-ao-pago-e-gerir-como-agencia]] — nota extraída de um guia, citada no mapa para rastreio: Medir redes sociais, integrar ao pago e gerir como agência
- [[otimizar-o-perfil-da-empresa-no-google-e-converter-visitas]] — nota extraída de um guia, citada no mapa para rastreio: Otimizar o Perfil da Empresa no Google e converter visitas
- [[revisar-termos-de-pesquisa-e-negativas-e-manter-a-rotina-de-otimizacao]] — nota extraída de um guia, citada no mapa para rastreio: Revisar termos de pesquisa e negativas e manter a rotina de otimização
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — nota extraída de um guia, citada no mapa para rastreio: Planejar as conversões de uma conta de Google Ads
- [[diagnosticar-queda-de-trafego-organico]] — nota extraída de um guia, citada no mapa para rastreio: Diagnosticar queda de tráfego orgânico
- [[medir-ligacoes-e-whatsapp-em-campanhas]] — nota extraída de um guia, citada no mapa para rastreio: Medir ligações e WhatsApp em campanhas
- [[diagnosticar-e-otimizar-campanhas-da-meta-e-cuidar-da-conta]] — nota extraída de um guia, citada no mapa para rastreio: Diagnosticar e otimizar campanhas da Meta e cuidar da conta
- [[criar-anuncios-responsivos-e-recursos-para-o-mercado-brasileiro]] — nota extraída de um guia, citada no mapa para rastreio: Criar anúncios responsivos e recursos para o mercado brasileiro
- [[calcular-os-limites-de-custo-de-uma-campanha-de-anuncios]] — nota extraída de um guia, citada no mapa para rastreio: Calcular os limites de custo de uma campanha de anúncios
- [[anunciar-em-categorias-reguladas-no-brasil]] — nota extraída de um guia, citada no mapa para rastreio: Anunciar em categorias reguladas no Brasil
- [[criar-e-testar-criativos-de-anuncios-na-meta]] — nota extraída de um guia, citada no mapa para rastreio: Criar e testar criativos de anúncios na Meta
- [[operar-o-marketing-digital-rituais-ferramentas-e-fornecedores]] — nota extraída de um guia, citada no mapa para rastreio: Operar o marketing digital: rituais, ferramentas e fornecedores
- [[medir-e-operar-o-seo-no-dia-a-dia-com-o-claude-code]] — nota extraída de um guia, citada no mapa para rastreio: Medir e operar o SEO no dia a dia com o Claude Code
- [[anunciar-em-categorias-reguladas-na-meta]] — nota extraída de um guia, citada no mapa para rastreio: Anunciar em categorias reguladas na Meta
- [[planejar-datas-sazonais-e-reagir-a-queda-de-vendas]] — nota extraída de um guia, citada no mapa para rastreio: Planejar datas sazonais e reagir a queda de vendas
- [[definir-lances-orcamento-e-segmentacao-no-google-ads]] — nota extraída de um guia, citada no mapa para rastreio: Definir lances, orçamento e segmentação no Google Ads
- [[escolher-objetivo-estruturar-e-orcar-campanhas-na-meta]] — nota extraída de um guia, citada no mapa para rastreio: Escolher objetivo, estruturar e orçar campanhas na Meta
- [[medir-leads-e-roi-do-perfil-da-empresa-no-google]] — nota extraída de um guia, citada no mapa para rastreio: Medir leads e ROI do Perfil da Empresa no Google
- [[planejar-a-estrategia-de-redes-sociais-para-o-brasil]] — nota extraída de um guia, citada no mapa para rastreio: Planejar a estratégia de redes sociais para o Brasil
- [[planejar-seo-de-e-commerce-no-brasil]] — nota extraída de um guia, citada no mapa para rastreio: Planejar SEO de e-commerce no Brasil
- [[vender-pelas-redes-e-trabalhar-com-influenciadores-no-brasil]] — nota extraída de um guia, citada no mapa para rastreio: Vender pelas redes e trabalhar com influenciadores no Brasil
- [[planejar-o-conteudo-de-seo-para-o-publico-brasileiro]] — nota extraída de um guia, citada no mapa para rastreio: Planejar o conteúdo de SEO para o público brasileiro
- [[montar-crm-e-mail-whatsapp-e-automacoes-de-retencao]] — nota extraída de um guia, citada no mapa para rastreio: Montar CRM, e-mail, WhatsApp e automações de retenção
- [[proteger-a-conta-e-resolver-problemas-do-perfil-da-empresa]] — nota extraída de um guia, citada no mapa para rastreio: Proteger a conta e resolver problemas do Perfil da Empresa
- [[configurar-pesquisa-com-ai-max-e-performance-max]] — nota extraída de um guia, citada no mapa para rastreio: Configurar Pesquisa com AI Max e Performance Max
- [[auditar-uma-conta-de-google-ads]] — nota extraída de um guia, citada no mapa para rastreio: Auditar uma conta de Google Ads
- [[otimizar-o-site-para-busca-com-ia-e-decidir-a-politica-de-rastreadores]] — nota extraída de um guia, citada no mapa para rastreio: Otimizar o site para busca com IA e decidir a política de rastreadores
- [[montar-o-feed-do-merchant-center-para-o-brasil]] — nota extraída de um guia, citada no mapa para rastreio: Montar o feed do Merchant Center para o Brasil
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — nota extraída de um guia, citada no mapa para rastreio: Melhorar velocidade e experiência móvel de um site
- [[escolher-o-tipo-de-campanha-e-estruturar-uma-conta-de-google-ads]] — nota extraída de um guia, citada no mapa para rastreio: Escolher o tipo de campanha e estruturar uma conta de Google Ads
