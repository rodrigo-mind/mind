---
titulo: Tráfego
tipo: centralizador
criado: 2026-11-22
atualizado: 2026-11-23
---

# Tráfego

Centralizador do assunto **tráfego**: como levar pessoas até a oferta e medir o que acontece depois. Cobre tráfego pago, orgânico, social e direto, e a gestão de redes sociais. É o ponto de entrada para tudo no Mind sobre campanhas, anúncios, canais e medição.

Este assunto muda mais rápido que [[estrategia]]. Plataformas, formatos, regras e preços envelhecem em meses. Por isso, aqui a pesquisa atual pesa tanto quanto os livros (ver "Informações atuais").

## Por que o assunto está no Mind

[[estrategia]] define para quem se fala e o que se promete. Tráfego leva essa promessa até o público e mede o resultado. [[developer]] garante que o rastreamento funcione no site e nos sistemas. Este arquivo une as três pontas, para que uma campanha nasça da estratégia e termine em dados confiáveis.

## Escopo

**Dentro:**
- Tráfego pago: anúncios em buscadores, redes sociais e outras plataformas (estrutura de campanha, públicos, criativos, orçamento, lances, testes)
- Tráfego orgânico: busca (SEO) e conteúdo que atrai sem pagar mídia
- Social: presença e gestão de redes sociais (calendário editorial, formatos, comunidade, atendimento nas redes)
- Tráfego direto e canais próprios: quem chega digitando o endereço ou pela marca, e relacionamento por e-mail e WhatsApp
- Planejamento de campanhas: objetivo, plano de mídia, orçamento e prazo de teste
- Anúncios: estrutura, ângulo e criativo, a partir da mensagem definida em [[estrategia]]
- Medição: o que medir e por quê, atribuição, relatórios e decisão de manter, ajustar ou parar

**Fora:**
- Posicionamento, marca e mensagem de base: ficam em [[estrategia]]
- Implementação técnica do rastreamento (instalar e configurar Tag Manager, pixels, eventos e API de conversões): fica em [[developer]]
- Redação aprofundada de anúncios, páginas e e-mails: assunto de copywriting, quando existir
- Processo de venda e atendimento comercial

## Mapa do assunto

| Área | O que cobre | Base hoje |
|---|---|---|
| Tráfego pago | Plataformas de anúncio, estrutura de campanha, públicos, orçamento, lances, testes | Sem livro. Guias de pesquisa atual: [[guia-google-ads-brasil]] e [[guia-trafego-pago-meta-brasil]] |
| Tráfego orgânico | SEO e conteúdo | Livro *The Art of SEO* destilado em notas (ver [[mapa-the-art-of-seo]]), mais [[guia-seo-brasil]] e [[estrategia-gbp-seo-local]] para o contexto atual do Brasil |
| Social e gestão de redes | Calendário editorial, formatos, comunidade, atendimento | Sem livro. [[guia-social-media-brasil]] e a nota [[avaliar-uma-rede-social-e-medir-resultados-para-seo]] |
| Tráfego direto e canais próprios | Marca e endereço direto, e-mail, WhatsApp, lista de contatos | Sem livro. [[guia-marketing-digital-brasil]] (CRM, e-mail e WhatsApp) |
| Campanhas e anúncios | Plano, público, ângulo, criativo, orçamento e teste | Notas de [[estrategia]] (posicionamento, mensagem, marca), [[planejar-uma-campanha-de-marketing-de-conteudo]] e os guias de anúncios |
| Medição e otimização | Métricas, atribuição, relatórios, decisão sobre o que manter ou mudar | Métricas e experimentos de [[estrategia]], notas de SEO como [[medir-resultados-de-seo-com-kpis-acionaveis]] e [[calcular-o-roi-do-seo]], e os guias. A parte técnica fica em [[developer]] |

Para escolher qual dos seis guias abrir, ver [[mapa-dos-guias-de-trafego]].

## Conexão com estratégia

Antes de montar qualquer campanha, ler em [[estrategia]]:
- o brief estratégico, se existir;
- o posicionamento (alternativas do cliente, valor e quem mais se importa), que define público e ângulo do anúncio;
- a mensagem e a voz da marca, que viram texto e criativo;
- hipóteses e experimentos, que viram teste de campanha com critério de sucesso.

Se algo disso faltar, o Claude Code avisa e propõe montar essa base antes de gastar verba.

## Conexão com developer

O tráfego define **o que medir e como nomear**. [[developer]] cuida de **instalar e fazer funcionar** nos sites e sistemas (PHP e JavaScript puros, em hospedagem simples). Pontos de ligação:
- Google Tag Manager: contêiner, tags, gatilhos e variáveis
- Pixels das plataformas de anúncio e API de conversões (envio pelo servidor)
- Eventos e conversões: compra, cadastro, clique em WhatsApp
- UTM e padrão de nomes de campanha
- Analytics para visitas e conversões
- Consentimento de cookies e LGPD
- Páginas de destino: velocidade, formulários e links de contato
- Integração com planilhas ou CRM

## Fluxo de partida

Ponto de partida, a ajustar depois dos livros e das pesquisas:

1. **Brief estratégico.** Vem de [[estrategia]].
2. **Objetivo e métrica.** O que a campanha precisa provar, e com que número.
3. **Canal e público.** Onde está o cliente de melhor ajuste e como alcançá-lo.
4. **Mensagem e criativo.** Ângulo e formatos, a partir da mensagem da estratégia.
5. **Rastreamento pronto antes de gastar.** Pedir ao [[developer]] o que for preciso.
6. **Teste pequeno.** Orçamento e prazo definidos, com um critério claro de sucesso.
7. **Medir e decidir.** Manter, ajustar ou parar, com base nos números.
8. **Registrar o aprendizado.** O que funcionou e o que não funcionou, com data.

Entregável de referência: um **plano de campanha** com objetivo e métrica, público, canal, mensagem e criativos, orçamento e prazo do teste, rastreamento necessário, critério de decisão e lacunas conhecidas.

## Informações atuais

- Regras, formatos, limites, políticas, preços e nomes de recursos das plataformas mudam. Sobre eles, o Claude Code pesquisa na internet antes de afirmar, prefere as páginas oficiais de cada plataforma e informa fonte e data.
- A pesquisa vai para `RESPOSTAS`. Só entra na base quando o usuário a promove, como nota curta com fonte, data de verificação e data para revisar (sugestão: 90 dias).
- Dos livros, usar os princípios (público, oferta, teste, medição). Os detalhes de plataforma são conferidos na pesquisa atual.
- Se a pesquisa contradiz um livro ou nota anterior, registrar a divergência com o prefixo `diverge:`, sem trocar um pelo outro em silêncio.
- Nota com data de revisão vencida: avisar o usuário antes de usá-la.

## Como o Claude Code usa este arquivo

- Em pedidos de campanha, anúncio, plano de mídia, redes sociais, SEO, métricas ou rastreamento, ler este arquivo, [[estrategia]], [[developer]] e as notas ligadas a eles antes de responder.
- Dizer de onde vem cada coisa: livro (qual e capítulo), nota atual (fonte e data) ou inferência do Claude.
- Pedir os dados que faltam (verba, público, histórico de resultados, acesso ao analytics). Não inventar números nem prometer resultado.
- Entregas vão para `RESPOSTAS`, como qualquer resposta.
- Para criar um agente especializado em tráfego, seguir a diretriz [[creator-of-minds]] e começar pelas notas ligadas a este arquivo.

## Como este assunto cresce

1. **Livro de tráfego ou anúncios:** coloque em `biblioteca/` e rode `/destilar <livro>`. As notas destiladas ficam nesta pasta; depois rode `/integrar` para ligá-las.
2. **Pesquisa atual:** o Claude Code pesquisa e grava em `RESPOSTAS`. O que vale guardar é promovido a nota nesta pasta, com fonte, data e prazo de revisão. Os guias de `trafego/` já são pesquisa atual promovida (revisão em novembro/2026; rever até 2027-02-23).
3. **Quando houver volume:** separar por canal (pago, orgânico, social, direto) em notas próprias.
4. **Quando houver base:** `/destilar playbook <tema>` junta frameworks e notas em um processo (por exemplo, a primeira campanha).

## Lacunas conhecidas

- Nenhum livro de anúncios (Google Ads e Meta) nem de redes sociais na biblioteca: para esses temas, só há os guias de pesquisa atual
- Os guias foram destilados em notas por módulo (origem `guia`, revisão até 2027-02-23); o livro de SEO (2015) está defasado em plataformas e algoritmos, e as divergências com os guias (2026) estão marcadas com `diverge:` e decididas em [[decisoes-sobre-divergencias-entre-guias-e-livro-de-seo]]
- Rastreamento (Tag Manager, pixel, API de conversões, UTM, consentimento) ainda sem notas em [[developer]]
- Redação de anúncios (copywriting) e funil de vendas: assuntos próprios, ainda sem centralizador

## Conexões

- [[estrategia]] — fornece o brief, o posicionamento e a mensagem de que toda campanha de tráfego parte
- [[developer]] — implementa o rastreamento (Tag Manager, pixels, UTM, consentimento) que o tráfego define
- [[creator-of-minds]] — diretriz que este arquivo manda seguir para criar um agente especializado em tráfego
- [[The-Art-of-SEO-Mastering-Search-Engine-Optimization-(Eric-Enge-Stephan-Spencer) (pdf)]] — ficha do livro de SEO, base de princípios do tráfego orgânico (a divergência antiga, de a tabela dizer "sem livro", foi resolvida)
- [[mapa-the-art-of-seo]] — mapa de The Art of SEO, com o andamento da destilação e as notas geradas
- [[arquitetura-de-site-amigavel-a-buscadores]] — nota destilada (conceito): Arquitetura de site amigável a buscadores
- [[canibalizacao-de-palavras-chave]] — nota destilada (conceito): Canibalização de palavras-chave
- [[cauda-longa-da-demanda-de-busca]] — nota destilada (conceito): Cauda longa da demanda de busca
- [[eficiencia-de-rastreamento-e-erros-de-rastreamento]] — nota destilada (conceito): Eficiência de rastreamento e erros de rastreamento
- [[intencao-de-busca-e-coocorrencia-de-termos]] — nota destilada (conceito): Intenção de busca e coocorrência de termos
- [[kpis-de-saude-da-cauda-longa-e-espaco-na-pagina-de-resultados]] — nota destilada (conceito): KPIs de saúde da cauda longa e espaço na página de resultados
- [[o-que-os-buscadores-leem-em-uma-pagina]] — nota destilada (conceito): O que os buscadores leem (e não leem) em uma página
- [[pagina-de-resultados-verticais-e-personalizacao]] — nota destilada (conceito): Página de resultados: respostas diretas, verticais e personalização
- [[problemas-tecnicos-de-plataforma-que-prejudicam-o-seo]] — nota destilada (conceito): Problemas técnicos de plataforma que prejudicam o SEO
- [[rastreamento-indexacao-e-ranqueamento]] — nota destilada (conceito): Rastreamento, indexação e ranqueamento
- [[sinais-de-ranqueamento-e-fatores-negativos]] — nota destilada (conceito): Sinais de ranqueamento e fatores negativos
- [[usos-estrategicos-do-seo]] — nota destilada (conceito): Usos estratégicos do SEO
- [[auditar-um-site-existente-para-seo]] — nota destilada (framework): Auditar um site existente para SEO
- [[avaliar-valor-e-dificuldade-de-uma-palavra-chave]] — nota destilada (framework): Avaliar valor e dificuldade de uma palavra-chave
- [[calcular-o-roi-do-seo]] — nota destilada (framework): Calcular o ROI do SEO
- [[configurar-conversoes-de-seo-e-valor-por-acao]] — nota destilada (framework): Configurar conversões de SEO e valor por ação
- [[encontrar-palavras-chave-de-cauda-longa]] — nota destilada (framework): Encontrar palavras-chave de cauda longa
- [[mapear-palavras-chave-a-urls-da-arquitetura]] — nota destilada (framework): Mapear palavras-chave a URLs da arquitetura
- [[medir-resultados-de-seo-com-kpis-acionaveis]] — nota destilada (framework): Medir resultados de SEO com KPIs acionáveis
- [[pesquisar-com-operadores-avancados-de-busca]] — nota destilada (framework): Pesquisar com operadores avançados de busca
- [[pesquisar-palavras-chave]] — nota destilada (framework): Pesquisar palavras-chave para SEO
- [[planejar-a-estrategia-de-seo-com-swot-e-smart]] — nota destilada (framework): Planejar a estratégia de SEO com SWOT e SMART
- [[registrar-linha-de-base-e-historico-de-mudancas-de-seo]] — nota destilada (framework): Registrar a linha de base e o histórico de mudanças de SEO
- [[regra-acompanhe-o-trafego-e-nao-apenas-a-posicao-no-ranking]] — nota destilada (regra): Acompanhe o tráfego e as conversões, e não só a posição no ranking
- [[regra-prepare-o-conteudo-sazonal-com-antecedencia-e-mantenha-a-url]] — nota destilada (regra): Prepare o conteúdo sazonal com antecedência e mantenha a URL
- [[adicionar-marcacao-schema-org-a-um-site]] — nota destilada (framework): Adicionar marcação Schema.org a um site
- [[avaliar-uma-rede-social-e-medir-resultados-para-seo]] — nota destilada (framework): Avaliar uma rede social e medir resultados para SEO
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — nota destilada (conceito): Controlar o robô de busca: robots.txt, metatags, canonical e mapa do site
- [[fazer-outreach-com-influenciadores]] — nota destilada (framework): Fazer outreach com influenciadores
- [[implementar-redirecionamentos-301-sem-perder-autoridade]] — nota destilada (framework): Implementar redirecionamentos 301 sem perder autoridade
- [[migrar-dominio-redesenhar-ou-trocar-servidor-sem-perder-seo]] — nota destilada (framework): Migrar domínio, redesenhar ou trocar de servidor sem perder SEO
- [[otimizacao-para-buscas-verticais-imagem-video-produtos-e-noticias]] — nota destilada (conceito): Otimização para buscas verticais: imagem, vídeo, produtos, notícias e blog
- [[otimizar-a-presenca-em-busca-local]] — nota destilada (framework): Otimizar a presença em busca local
- [[otimizar-os-elementos-de-uma-pagina-para-palavras-chave]] — nota destilada (framework): Otimizar os elementos de uma página para palavras-chave
- [[panda-penguin-e-penalidades-do-google]] — nota destilada (conceito): Panda, Penguin e penalidades do Google
- [[planejar-uma-campanha-de-marketing-de-conteudo]] — nota destilada (framework): Planejar uma campanha de marketing de conteúdo
- [[preparar-um-site-para-busca-movel]] — nota destilada (framework): Preparar um site para a busca móvel
- [[publicar-conteudo-em-sites-de-terceiros]] — nota destilada (framework): Publicar conteúdo em sites de terceiros (guest post e sindicação)
- [[recuperar-um-site-de-panda-penguin-ou-penalidade-manual]] — nota destilada (framework): Recuperar um site de Panda, Penguin ou penalidade manual
- [[regra-ganhe-links-nao-os-compre-troque-nem-fabrique]] — nota destilada (regra): Ganhe links; não os compre, troque em volume nem os fabrique
- [[regra-prefira-subpasta-a-subdominio-ou-dominio-separado]] — nota destilada (regra): Prefira subpasta a subdomínio ou domínio separado
- [[resolver-conteudo-duplicado-e-conteudo-fino]] — nota destilada (framework): Resolver conteúdo duplicado e conteúdo fino
- [[segmentar-um-site-por-pais-e-idioma]] — nota destilada (framework): Segmentar um site por país e idioma
- [[estrategia-gbp-seo-local]] — guia de Google Business Profile e SEO local para o Brasil, que atualiza o tema de busca local
- [[mapa-dos-guias-de-trafego]] — mapa dos seis guias de pesquisa atual (SEO, SEO local, marketing digital, Google Ads, Meta e redes sociais): quando abrir cada um
- [[guia-seo-brasil]] — guia de pesquisa atual: SEO no contexto brasileiro
- [[guia-marketing-digital-brasil]] — guia de pesquisa atual: Marketing digital no Brasil (guia central)
- [[guia-google-ads-brasil]] — guia de pesquisa atual: Google Ads no Brasil
- [[guia-trafego-pago-meta-brasil]] — guia de pesquisa atual: Tráfego pago na Meta (Facebook, Instagram e WhatsApp) no Brasil
- [[guia-social-media-brasil]] — guia de pesquisa atual: Gestão de redes sociais (orgânico) no Brasil
- [[decisoes-sobre-divergencias-entre-guias-e-livro-de-seo]] — nota extraída de um guia de pesquisa atual: Decisões sobre as divergências entre os guias e o livro de SEO
- [[regra-nao-viole-as-diretrizes-do-perfil-da-empresa-no-google]] — nota extraída de um guia de pesquisa atual: Não viole as diretrizes do Perfil da Empresa no Google
- [[regra-acesso-a-conta-de-anuncios-somente-leitura-e-autorizacao-a-cada-acao]] — nota extraída de um guia de pesquisa atual: Acesso à conta de anúncios: leitura por padrão e autorização a cada ação
- [[como-a-meta-entrega-anuncios-e-aplicar-o-fator-de-impostos]] — nota extraída de um guia de pesquisa atual: Como a Meta entrega anúncios e como aplicar o fator de impostos
- [[regra-revise-todo-conteudo-gerado-por-ia-em-anuncios]] — nota extraída de um guia de pesquisa atual: Revise todo conteúdo gerado por IA nos anúncios
- [[regra-desligue-a-aplicacao-automatica-de-recomendacoes]] — nota extraída de um guia de pesquisa atual: Desligue a aplicação automática de recomendações
- [[regra-nao-gere-paginas-em-massa-sem-valor-real]] — nota extraída de um guia de pesquisa atual: Não gere páginas em massa sem valor real
- [[regra-nunca-burle-as-politicas-nem-engane-nos-anuncios]] — nota extraída de um guia de pesquisa atual: Nunca burle as políticas nem engane nos anúncios
- [[regra-respeite-direitos-promocoes-menores-e-publicidade-nas-redes]] — nota extraída de um guia de pesquisa atual: Respeite direitos, promoções, menores e identificação de publicidade nas redes
- [[regra-trate-dados-pessoais-e-ia-com-governanca-no-marketing]] — nota extraída de um guia de pesquisa atual: Trate dados pessoais e IA com governança no marketing
- [[diagnosticar-o-negocio-e-calcular-unit-economics]] — nota extraída de um guia de pesquisa atual: Diagnosticar o negócio e calcular unit economics
- [[rodar-campanhas-de-whatsapp-e-de-negocio-local-na-meta]] — nota extraída de um guia de pesquisa atual: Rodar campanhas de WhatsApp e de negócio local na Meta
- [[conquistar-links-e-reputacao-de-marca-no-brasil]] — nota extraída de um guia de pesquisa atual: Conquistar links e reputação de marca no Brasil
- [[definir-estrategia-posicionamento-e-oferta-no-marketing-digital]] — nota extraída de um guia de pesquisa atual: Definir estratégia, posicionamento e oferta no marketing digital
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — nota extraída de um guia de pesquisa atual: Corrigir rastreamento, indexação e arquitetura de URLs
- [[gerir-avaliacoes-e-reputacao-no-google]] — nota extraída de um guia de pesquisa atual: Gerir avaliações e reputação no Google
- [[construir-presenca-local-autoridade-e-visibilidade-em-ia]] — nota extraída de um guia de pesquisa atual: Construir presença local, autoridade e visibilidade em IA
- [[produzir-e-operar-conteudo-de-redes-sociais]] — nota extraída de um guia de pesquisa atual: Produzir e operar conteúdo de redes sociais
- [[montar-o-plano-de-mensuracao-e-triangular-a-atribuicao]] — nota extraída de um guia de pesquisa atual: Montar o plano de mensuração e triangular a atribuição
- [[configurar-pixel-api-de-conversoes-e-eventos-de-whatsapp-na-meta]] — nota extraída de um guia de pesquisa atual: Configurar Pixel, API de Conversões e eventos de WhatsApp na Meta
- [[gerir-reputacao-crise-e-seguranca-das-contas-nas-redes]] — nota extraída de um guia de pesquisa atual: Gerir reputação, crise e segurança das contas nas redes
- [[analisar-busca-local-concorrentes-e-posicao-no-mapa]] — nota extraída de um guia de pesquisa atual: Analisar busca local, concorrentes e posição no mapa
- [[otimizar-conversao-de-site-loja-virtual-e-marketplaces]] — nota extraída de um guia de pesquisa atual: Otimizar conversão de site, loja virtual e marketplaces
- [[medir-redes-sociais-integrar-ao-pago-e-gerir-como-agencia]] — nota extraída de um guia de pesquisa atual: Medir redes sociais, integrar ao pago e gerir como agência
- [[otimizar-o-perfil-da-empresa-no-google-e-converter-visitas]] — nota extraída de um guia de pesquisa atual: Otimizar o Perfil da Empresa no Google e converter visitas
- [[revisar-termos-de-pesquisa-e-negativas-e-manter-a-rotina-de-otimizacao]] — nota extraída de um guia de pesquisa atual: Revisar termos de pesquisa e negativas e manter a rotina de otimização
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — nota extraída de um guia de pesquisa atual: Planejar as conversões de uma conta de Google Ads
- [[diagnosticar-queda-de-trafego-organico]] — nota extraída de um guia de pesquisa atual: Diagnosticar queda de tráfego orgânico
- [[medir-ligacoes-e-whatsapp-em-campanhas]] — nota extraída de um guia de pesquisa atual: Medir ligações e WhatsApp em campanhas
- [[diagnosticar-e-otimizar-campanhas-da-meta-e-cuidar-da-conta]] — nota extraída de um guia de pesquisa atual: Diagnosticar e otimizar campanhas da Meta e cuidar da conta
- [[criar-anuncios-responsivos-e-recursos-para-o-mercado-brasileiro]] — nota extraída de um guia de pesquisa atual: Criar anúncios responsivos e recursos para o mercado brasileiro
- [[calcular-os-limites-de-custo-de-uma-campanha-de-anuncios]] — nota extraída de um guia de pesquisa atual: Calcular os limites de custo de uma campanha de anúncios
- [[anunciar-em-categorias-reguladas-no-brasil]] — nota extraída de um guia de pesquisa atual: Anunciar em categorias reguladas no Brasil
- [[criar-e-testar-criativos-de-anuncios-na-meta]] — nota extraída de um guia de pesquisa atual: Criar e testar criativos de anúncios na Meta
- [[operar-o-marketing-digital-rituais-ferramentas-e-fornecedores]] — nota extraída de um guia de pesquisa atual: Operar o marketing digital: rituais, ferramentas e fornecedores
- [[medir-e-operar-o-seo-no-dia-a-dia-com-o-claude-code]] — nota extraída de um guia de pesquisa atual: Medir e operar o SEO no dia a dia com o Claude Code
- [[anunciar-em-categorias-reguladas-na-meta]] — nota extraída de um guia de pesquisa atual: Anunciar em categorias reguladas na Meta
- [[planejar-datas-sazonais-e-reagir-a-queda-de-vendas]] — nota extraída de um guia de pesquisa atual: Planejar datas sazonais e reagir a queda de vendas
- [[definir-lances-orcamento-e-segmentacao-no-google-ads]] — nota extraída de um guia de pesquisa atual: Definir lances, orçamento e segmentação no Google Ads
- [[escolher-o-mix-de-canais-e-orcar-o-marketing-digital]] — nota extraída de um guia de pesquisa atual: Escolher o mix de canais e orçar o marketing digital
- [[escolher-objetivo-estruturar-e-orcar-campanhas-na-meta]] — nota extraída de um guia de pesquisa atual: Escolher objetivo, estruturar e orçar campanhas na Meta
- [[medir-leads-e-roi-do-perfil-da-empresa-no-google]] — nota extraída de um guia de pesquisa atual: Medir leads e ROI do Perfil da Empresa no Google
- [[planejar-a-estrategia-de-redes-sociais-para-o-brasil]] — nota extraída de um guia de pesquisa atual: Planejar a estratégia de redes sociais para o Brasil
- [[planejar-seo-de-e-commerce-no-brasil]] — nota extraída de um guia de pesquisa atual: Planejar SEO de e-commerce no Brasil
- [[vender-pelas-redes-e-trabalhar-com-influenciadores-no-brasil]] — nota extraída de um guia de pesquisa atual: Vender pelas redes e trabalhar com influenciadores no Brasil
- [[planejar-o-conteudo-de-seo-para-o-publico-brasileiro]] — nota extraída de um guia de pesquisa atual: Planejar o conteúdo de SEO para o público brasileiro
- [[montar-crm-e-mail-whatsapp-e-automacoes-de-retencao]] — nota extraída de um guia de pesquisa atual: Montar CRM, e-mail, WhatsApp e automações de retenção
- [[proteger-a-conta-e-resolver-problemas-do-perfil-da-empresa]] — nota extraída de um guia de pesquisa atual: Proteger a conta e resolver problemas do Perfil da Empresa
- [[configurar-pesquisa-com-ai-max-e-performance-max]] — nota extraída de um guia de pesquisa atual: Configurar Pesquisa com AI Max e Performance Max
- [[auditar-uma-conta-de-google-ads]] — nota extraída de um guia de pesquisa atual: Auditar uma conta de Google Ads
- [[otimizar-o-site-para-busca-com-ia-e-decidir-a-politica-de-rastreadores]] — nota extraída de um guia de pesquisa atual: Otimizar o site para busca com IA e decidir a política de rastreadores
- [[montar-o-feed-do-merchant-center-para-o-brasil]] — nota extraída de um guia de pesquisa atual: Montar o feed do Merchant Center para o Brasil
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — nota extraída de um guia de pesquisa atual: Melhorar velocidade e experiência móvel de um site
- [[escolher-o-tipo-de-campanha-e-estruturar-uma-conta-de-google-ads]] — nota extraída de um guia de pesquisa atual: Escolher o tipo de campanha e estruturar uma conta de Google Ads
- [[operador-do-mind]] — o Operador do Mind consulta este centralizador em tarefas de canais, anúncios, SEO e medição
