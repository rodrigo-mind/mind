---
titulo: "Guia: SEO no contexto brasileiro"
tipo: guia
assunto: trafego
origem: fornecido-pelo-usuario
escopo: "SEO (Google, Bing e buscas com IA) para sites brasileiros: diagnóstico, técnico, palavras-chave, conteúdo, autoridade, e-commerce, busca com IA, mensuração, quedas e operação (módulos A a K)"
revisao_do_guia: novembro/2026
processado_em: 2026-11-23
revisar_ate: 2027-02-23
status: pesquisa-atual
---

# Guia do Claude Code: SEO no Contexto Brasileiro

> Manual de pesquisa e execução para o Claude Code auditar, planejar e executar **SEO (Google, Bing e buscas com IA)** para sites brasileiros: técnico, conteúdo, autoridade, e-commerce, busca com IA e mensuração.
> **Regra nº 1: o Google atualiza sistemas e documentação o tempo todo, e há muita especulação sobre "o que o algoritmo quer". Este guia diz O QUE pesquisar e COMO pensar. Confirme sempre na documentação oficial e nos dados do próprio site.**
> Última revisão do guia: novembro/2026.

---

## Mapa dos guias

| Tema | Guia |
|---|---|
| **SEO (este guia)**: técnico, conteúdo, autoridade, e-commerce, busca com IA, mensuração | `guia-seo-brasil.md` |
| SEO local e Google Perfil da Empresa | `estrategia-gbp-seo-local.md` |
| Estratégia geral de marketing digital (central) | `guia-marketing-digital-brasil.md` |
| Google Ads (inclui anúncios no Modo IA e Merchant Center) | `guia-google-ads-brasil.md` |
| Meta Ads | `guia-trafego-pago-meta-brasil.md` |
| Redes sociais (inclui SEO social) | `guia-social-media-brasil.md` |

---

## Sumário

0. Como usar este guia
1. Protocolo de pesquisa atualizada (obrigatório)
2. Fontes por nível de confiança
3. Regras de conformidade e limites de atuação
4. Contexto brasileiro
5. Modelo mental: como a busca funciona em 2026
6. Módulos
   - **A. Diagnóstico**: A1 Objetivos e páginas que dão dinheiro · A2 Dados de base · A3 Página de resultados e concorrência · A4 Auditoria rápida (30 itens)
   - **B. SEO técnico**: B1 Rastreamento e indexação · B2 Arquitetura e URLs · B3 Velocidade e Core Web Vitals · B4 Mobile e acessibilidade · B5 Dados estruturados · B6 Idioma e internacionalização · B7 Segurança · B8 Migrações e redesign · B9 Rastreadores de IA e controles
   - **C. Palavras-chave**: C1 Fontes no Brasil · C2 Variações do português · C3 Intenção e página de resultados · C4 Agrupamento e mapeamento · C5 Priorização
   - **D. Conteúdo**: D1 Tipos de página por modelo de negócio · D2 Qualidade, experiência e confiança · D3 Otimização da página · D4 Conteúdo com IA · D5 Atualização e consolidação · D6 YMYL (saúde, finanças, jurídico)
   - **E. Autoridade e reputação**: E1 Links · E2 Menções e marca · E3 Reputação na busca · E4 PR digital no Brasil
   - **F. SEO local**
   - **G. SEO para e-commerce**: G1 Categorias e filtros · G2 Produtos · G3 Merchant Center e dados de produto · G4 Site próprio × marketplaces
   - **H. Busca com IA**: H1 Como funciona · H2 Como otimizar · H3 Como medir · H4 Decisões de bloqueio
   - **I. Mensuração**: I1 KPIs · I2 Acompanhamento de posições · I3 Dashboards · I4 ROI do SEO
   - **J. Atualizações, quedas e penalidades**: J1 Monitoramento · J2 Diagnóstico de queda · J3 Ações manuais e segurança · J4 Recuperação
   - **K. Operação**: K1 Rotina · K2 Ferramentas · K3 Trabalho com desenvolvimento · K4 Automações do Claude Code · K5 Base de conhecimento
7. Formato de entrega
8. Registro de atualizações
9. Checklist final

---

## 0. Como usar este guia

### 0.1 Variáveis do site

```
SITE:             {{https://www.exemplo.com.br}}
TECNOLOGIA:       {{PHP próprio + MySQL | WordPress | Shopify | Nuvemshop | VTEX | outro}}
HOSPEDAGEM:       {{empresa/plano; servidor no Brasil?; CDN?}}
MODELO:           {{negócio local | e-commerce | serviço/B2B | conteúdo/portal | SaaS | marketplace}}
MERCADO:          {{cidade/região | Brasil | Brasil + Portugal | América Latina}}
OBJETIVO:         {{leads | vendas | tráfego para anúncios | reconhecimento}}
PÁGINAS QUE DÃO DINHEIRO: {{serviços, categorias, produtos principais}}
ACESSOS:          {{Search Console? Bing Webmaster Tools? GA4? servidor/FTP? CMS?}}
HISTÓRICO:        {{migração recente? redesign? queda de tráfego? ação manual? site hackeado?}}
CONCORRENTES:     {{3 a 5 domínios}}
CATEGORIA YMYL?   {{saúde, finanças, jurídico, segurança... ou não}}
```

Se faltar alguma variável, pergunte. Se não houver ninguém para responder, faça a melhor suposição e escreva qual foi. **Sem acesso ao Search Console**, a análise fica limitada a ferramentas externas (estimativas). Diga isso no relatório.

### 0.2 Modos de uso
- **Auditoria completa:** A → B → C → D → E → H → I, e então entregue o relatório da seção 7.
- **Site novo:** B (base técnica) + C + D1/D3 + F/G (se aplicável) + I.
- **Migração/redesign:** B8 primeiro (antes de qualquer mudança).
- **Queda de tráfego:** J2 (depois o módulo da causa).
- **Plano de conteúdo:** C + D.
- **Rotina mensal:** K1 + I3 + registro (seção 8).

---

## 1. Protocolo de pesquisa atualizada (obrigatório)

Faça isto **antes de cada módulo**:

1. **Pegue a data de hoje** (`date`) e use o ano atual nas buscas.
2. **Leia o registro** `atualizacoes-seo.md` (seção 8), se existir.
3. **Confira as fontes oficiais de mudança:**
   - Google Search Status Dashboard: https://status.search.google.com (atualizações em andamento)
   - Histórico de atualizações de ranking: pesquisar "Google ranking release history"
   - Blog do Search Central: https://developers.google.com/search/blog (também `?hl=pt-br`)
   - Registro de alterações da documentação: pesquisar "Search Central documentation changelog"
   - Blog do Bing Webmaster: https://blogs.bing.com/webmaster
4. **Busque análises dos últimos 60–90 dias:**
   - `site:seroundtable.com {{tema}}`
   - `site:searchengineland.com {{tema}}`
   - `site:searchenginejournal.com {{tema}}`
   - em português: `"SEO" {{tema}} {{ano}}`
5. **Confirme no Search Console/dados do site** antes de concluir que algo "afetou o site".
6. **Se a fonte atual contradizer este guia, a fonte atual vence.** Registre na seção 8.
7. **Marque cada informação:**
   - `[OFICIAL]` = Google/Bing/OpenAI (documentação, blog, declaração de representante)
   - `[TESTADO]` = estudo com método e amostra divulgados
   - `[OPINIÃO]` = especialista/ferramenta sem método claro
   - `[CONTROVERSO]` = estudos sérios discordam
   - `[ANTIGO]` = mais de 12–24 meses
   - `[EUA]` = recurso/dado de fora do Brasil
8. **Cuidado com especulação:**
   - "fatores de ranking" com percentuais, "o Google odeia X", listas de "updates não confirmados"
   - volatilidade sem anúncio existe, e o próprio Google disse que pode fazer **atualizações periódicas sem comunicar**
   - só trate como fato o que for oficial ou estiver demonstrado nos dados do site
9. **Não invente números** (volume de busca, CTR "médio", "tempo para ranquear"). Volumes de ferramentas são estimativas e variam entre elas.

---

## 2. Fontes por nível de confiança

### Nível 1: Oficial
- **Google Search Central** (documentação): https://developers.google.com/search/docs (`?hl=pt-br`)
  - Fundamentos da Pesquisa (Search Essentials) e **políticas de spam**
  - Guia de SEO para iniciantes (em português)
  - Guia de sistemas de classificação
  - Dados estruturados (galeria de tipos suportados)
  - Orientações sobre conteúdo útil e conteúdo gerado com IA
  - Recursos de IA na Pesquisa (AI Overviews/Modo IA) e o site
- **Diretrizes de avaliadores de qualidade** (Search Quality Rater Guidelines): mostram o que o Google considera qualidade (não são fatores diretos de ranking)
- **Central de Ajuda do Search Console:** https://support.google.com/webmasters
- **Search Central Live Brasil** (evento oficial; São Paulo em fev/2026) e os vídeos do canal Google Search Central
- **Bing Webmaster Tools** + Diretrizes do Bing + guia do Bing sobre AEO/GEO: https://www.bing.com/webmasters
- **OpenAI:** documentação dos rastreadores (OAI-SearchBot, GPTBot) e do Businesses in ChatGPT/Business Hub
- **Schema.org:** https://schema.org
- **Registro.br** (domínios .br): https://registro.br

### Nível 2: Dados
- Search Console, GA4, Bing Webmaster Tools **do próprio site** (a fonte mais importante)
- Google Trends (Brasil/estados), Planejador de palavras-chave do Google Ads
- PageSpeed Insights / Chrome UX Report (dados reais de usuários)
- StatCounter (participação dos buscadores no Brasil)
- Ferramentas de SEO com base de dados do Brasil (Semrush, Ahrefs, SE Ranking, Ubersuggest): **estimativas**
- Estudos de CTR/IA (Seer Interactive, Ahrefs, SparkToro, BrightLocal): verificar país e amostra

### Nível 3: Especialistas e notícias
- Search Engine Roundtable, Search Engine Land, Search Engine Journal
- Especialistas conhecidos por análises com dados (ex.: Aleyda Solís, Glenn Gabe, Lily Ray): `[OPINIÃO com dados]`
- Comunidade brasileira: blogs de agências e ferramentas, eventos de SEO no Brasil. Útil para o contexto local, mas confrontar com o Nível 1.

---

## 3. Regras de conformidade e limites de atuação

### 3.1 Políticas de spam do Google: nunca recomendar
Confirme a lista atual na documentação. Inclui, entre outros:
- **Cloaking** e **redirecionamentos enganosos**
- **Páginas de entrada (doorways):** muitas páginas quase iguais só para pegar variações (ex.: "dentista em [cidade]" × 200 cidades sem conteúdo real)
- **Abuso de conteúdo em escala:** muitas páginas geradas (por IA ou não) sem valor, para manipular a busca
- **Abuso de domínio expirado** e **abuso de reputação de site** (conteúdo de terceiros "alugado" em domínio forte)
- **Spam de links:** comprar/vender links que passam autoridade, redes de blogs (PBN), troca excessiva, links automáticos
- **Texto ou links ocultos, excesso de palavras-chave**
- **Conteúdo copiado** (scraping) e afiliado sem valor próprio
- **Avaliações falsas** ou marcação de avaliações que não são reais
- **Comprar ou manipular menções de marca** para influenciar respostas de IA. Um representante do Google alertou publicamente contra isso em 2026.

### 3.2 Leis brasileiras que tocam o SEO
- **CDC e Decreto 7.962/2013:** informações claras da empresa e das ofertas nas páginas (e-commerce: razão social, CNPJ, endereço, contato, políticas)
- **LGPD:** banners de cookies/consentimento, formulários, ferramentas de análise (mapas de calor) com aviso de privacidade
- **CONAR:** conteúdo patrocinado/afiliado identificado
- **Direitos autorais e marcas:** não copiar textos/imagens de concorrentes ou fabricantes sem permissão; comparativos verdadeiros
- **ECA Digital:** cuidado com conteúdo e coleta de dados de crianças e adolescentes
- **Áreas reguladas (YMYL):** conselhos profissionais, ANVISA, Banco Central/CVM (D6)

### 3.3 Limites do Claude Code
- **Nunca alterar o site em produção sem aprovação explícita.** Sempre: backup → ambiente de teste/cópia → validação → publicação → monitoramento.
- **Alterações de alto risco** (exigem aprovação específica e plano de reversão):
  - `robots.txt`
  - `noindex`
  - canonical em massa
  - redirecionamentos em massa
  - exclusão de páginas
  - mudança de URLs
  - migração de domínio/plataforma
- **Credenciais** (FTP, banco, APIs) só em `.env`, nunca no código ou em repositório público
- **Acesso a Search Console/Bing/GA4** via API: somente leitura por padrão
- Questões jurídicas (marca, direitos autorais, notificações): orientar a procurar um advogado

---

## 4. Contexto brasileiro

### 4.1 Buscadores (confirmar números atuais)
- O **Google** tem cerca de 88–92% das buscas no Brasil, conforme o mês e o recorte (StatCounter, 2026)
- O **Bing** tem cerca de 6–10% no total e participação bem maior no desktop (~16–18%). Importa também porque alimenta o **Copilot** e tem relação com as citações do **ChatGPT** (ver H).
- **Busca com IA no Brasil:**
  - AI Overviews
  - **Modo IA em português** desde 08/09/2025
  - anúncios no Modo IA previstos para o Brasil no 4º tri/2026 (ver o guia de Google Ads)
  - ChatGPT, Gemini, Copilot e Perplexity em português

### 4.2 Português do Brasil (impacta palavras-chave e conteúdo)
- **Regionalismos:** mandioca/aipim/macaxeira; biscoito/bolacha; mexerica/tangerina/bergamota; pão francês/cacetinho/carioquinha; semáforo/sinaleiro/farol
- **Informal e abreviações:** "vc", "q", "frete gratis", "zap" (WhatsApp)
- **Sem acento e com erros comuns** (o Google costuma entender, mas a página de resultados pode mudar; verifique)
- **Singular × plural, masculino × feminino** podem gerar resultados diferentes
- **Termos em inglês usados no Brasil** (notebook, smartphone, delivery, kit, skincare) × traduções
- **pt-BR × pt-PT:** se o site também mira Portugal, usar hreflang e adaptar vocabulário/ortografia (B6)

### 4.3 Página de resultados no Brasil
- **Marketplaces dominam** muitas buscas de produto (Mercado Livre, Amazon, Magalu, Shopee, Casas Bahia etc.). O site próprio precisa escolher bem onde competir (G4).
- **Reclame Aqui** aparece em buscas de marca ("[marca] é confiável", "[marca] reclame aqui"): é reputação na busca (E3)
- **Pacote local (Maps)** em buscas locais (ver o guia de GBP)
- **YouTube, vídeos curtos, "Perguntas relacionadas", Shopping (inclusive listagens gratuitas) e AI Overviews** ocupam espaço
- **Discover e Google Notícias** são relevantes para portais

### 4.4 Infraestrutura
- **Celular e conexões variáveis:** aparelhos mais simples e redes instáveis fora dos grandes centros. Velocidade e peso de página importam muito (B3).
- **Hospedagem:** servidor no Brasil ou CDN com ponto de presença no Brasil reduz a latência `[OPINIÃO consolidada]`
- **Domínio .com.br:** registro no Registro.br (exige CPF/CNPJ); passa sinal de país para usuários. Para mirar o Brasil, ccTLD ou um .com com conteúdo em pt-BR funcionam.

### 4.5 Comunidade e eventos
- O Google realiza o **Search Central Live** no Brasil (São Paulo em 24/02/2026), com palestrantes do Google
- Acompanhar o blog do Google Brasil e o Search Central em português

---

## 5. Modelo mental: como a busca funciona em 2026

Confirme na documentação oficial se algo mudou.

1. **Rastrear → indexar → classificar → exibir.** Sem rastreamento e indexação não há ranking nem citação em IA. A base técnica vem primeiro.
2. **Sistemas de classificação do Google** (ver o guia oficial de sistemas):
   - relevância, qualidade e utilidade
   - experiência na página
   - sistema de avaliações
   - detecção de spam
   - atualidade, quando a busca pede
   - os antigos "sistemas de conteúdo útil" foram incorporados aos sistemas principais `[OFICIAL]`
3. **Atualizações principais (core updates)** acontecem algumas vezes por ano:
   - **em 2026, houve em março, maio e novembro**, com várias atualizações de spam no meio
   - o Google disse que pode fazer **atualizações periódicas sem anunciar**
   - quedas e subidas em atualizações principais refletem uma reavaliação geral, não uma "penalidade"
4. **E-E-A-T** (experiência, especialização, autoridade, confiança):
   - conceito das diretrizes de avaliadores, não um fator técnico único
   - na prática: conteúdo com experiência real, autoria clara, reputação da marca, fontes, transparência da empresa
   - mais exigente em YMYL
5. **A busca virou "busca em todo lugar"**: Google (com IA), Bing/Copilot, ChatGPT, Perplexity, YouTube, TikTok/Instagram, marketplaces, Maps
   - menos cliques por busca (AI Overviews e resultados sem clique), mas **visitantes mais decididos**
   - **ser citado** e **ser lembrado** (marca) passam a contar junto com o clique
6. **Marca importa:** sites com marca forte (buscas pelo nome, menções, avaliações) tendem a resistir melhor às atualizações `[TESTADO/OPINIÃO – estudos de 2026 apontam nessa direção]`
7. **Mensurar além do clique:**
   - impressões em IA
   - citações
   - buscas pela marca
   - conversões orgânicas
   - receita

---

## 6. Módulos

Cada módulo tem: **Objetivo · Pesquisar · Fazer · Entregar.**

---

### A. Diagnóstico

#### A1. Objetivos e páginas que dão dinheiro
**Fazer:**
- Listar as **páginas de negócio** (serviços, categorias, produtos principais, página de orçamento/contato) e o que cada uma gera (leads, vendas)
- Definir o **objetivo do SEO:** novos clientes, vendas, leads, redução de dependência de anúncios, autoridade
- Entender os limites: área de atendimento, estoque, capacidade

**Entregar:** lista de páginas prioritárias + objetivo do SEO em 1 parágrafo.

#### A2. Dados de base
**Fazer:**
- **Search Console:**
  - exportar 16 meses (cliques, impressões, CTR, posição) por página, consulta, país e dispositivo
  - separar **marca × não marca**
  - verificar indexação, Core Web Vitals, ações manuais, segurança, sitemaps
  - **relatório de desempenho em IA generativa**, se disponível
- **Bing Webmaster Tools:** cadastrar (dá para importar do Search Console); verificar o relatório de **AI Performance** (citações no Copilot/Bing)
- **GA4:** sessões e **conversões** do orgânico por página de entrada; tráfego de referência de IAs (chatgpt.com, perplexity.ai, gemini.google.com, copilot.microsoft.com)
- **Linha de base de posições** para 20–50 termos prioritários (I2)
- **Linha de base de visibilidade em IA** (H3)
- Anotar eventos: migrações, redesign, atualizações do Google, sazonalidade

**Entregar:** painel de base (números atuais) + anotações de eventos.

#### A3. Página de resultados e concorrência
**Fazer:**
- Para os 20–30 termos principais, analisar a **página de resultados real** (celular, Brasil, cidade quando local):
  - recursos presentes: AI Overview, Maps, Shopping, vídeos, "Perguntas relacionadas", marketplaces, Reclame Aqui, notícias
  - tipo de página que ranqueia (categoria, artigo, comparativo, ferramenta, vídeo)
  - quem ranqueia: concorrentes diretos, marketplaces, portais, fóruns
- **Comparar os concorrentes:** páginas que ranqueiam, conteúdo, estrutura, velocidade, dados estruturados, autoridade (links/menções), marca
- **Lacunas:** termos e tipos de conteúdo em que os concorrentes ranqueiam e o site não

**Entregar:** tabela `Termo | Intenção | Recursos na página de resultados | Tipo de página vencedora | Quem ranqueia | Oportunidade`.

#### A4. Auditoria rápida (30 itens)
Ver no detalhe os módulos B–E. Checklist rápido:

**Indexação e rastreamento**
- [ ] Site no Search Console (domínio) e no Bing Webmaster Tools
- [ ] Sitemap XML enviado e sem erros
- [ ] robots.txt sem bloquear páginas importantes, CSS ou JS
- [ ] Páginas importantes indexadas
- [ ] Sem versões duplicadas (http/https, www/sem www, barra final)

**Técnico e experiência**
- [ ] HTTPS em tudo
- [ ] Core Web Vitals aprovados no celular (dados reais)
- [ ] Sem erros 404/5xx relevantes
- [ ] Redirecionamentos 301 diretos (sem cadeias)
- [ ] Layout mobile ok; sem pop-ups invasivos
- [ ] Dados estruturados válidos (Organization/LocalBusiness, Product, Breadcrumb)

**Conteúdo e página**
- [ ] Title e meta description únicos e atraentes nas páginas de negócio
- [ ] H1 claro em cada página
- [ ] Conteúdo útil e próprio (sem texto copiado do fabricante/concorrente)
- [ ] Páginas de serviço/categoria com conteúdo suficiente
- [ ] Imagens otimizadas com texto alternativo
- [ ] Links internos para as páginas de negócio
- [ ] Sem páginas fracas em massa (tags, filtros, buscas internas indexadas)
- [ ] Autoria/sobre/contato/CNPJ visíveis

**Autoridade e reputação**
- [ ] Links de qualidade (sem padrão de compra)
- [ ] Marca buscada (Search Console: consultas de marca)
- [ ] Reputação na busca de marca (Reclame Aqui, avaliações)
- [ ] Perfil da Empresa no Google consistente (se local)

**Mensuração e segurança**
- [ ] Conversões do orgânico medidas no GA4
- [ ] Sem ações manuais ou problemas de segurança
- [ ] CMS/plugins/servidor atualizados

**Entregar:** checklist preenchido + top 10 problemas por impacto.

---

### B. SEO técnico

#### B1. Rastreamento e indexação
**Pesquisar:** documentação atual sobre robots.txt, sitemaps, canonical, noindex, renderização de JavaScript e orçamento de rastreamento.

**Fazer:**
- **robots.txt:** só bloquear o que não deve ser rastreado (áreas administrativas, carrinho, buscas internas infinitas); **nunca** CSS/JS necessários
- **Sitemaps:** só URLs canônicas, indexáveis e com status 200; `lastmod` real; separados por tipo em sites grandes
- **Canonical:** apontar para a versão principal; consistente com links internos e sitemap
- **noindex:** para páginas sem valor de busca (obrigado, login, filtros sem demanda, resultados de busca interna). Não usar noindex + bloqueio no robots ao mesmo tempo (o Google não vê o noindex).
- **Relatório de indexação do Search Console:**
  - "Rastreada, mas não indexada" e "Descoberta, mas não indexada" → qualidade/duplicidade/autoridade/links internos
  - "Soft 404" → página vazia/fraca
- **JavaScript:** conteúdo e links importantes no HTML renderizado. Teste com a Inspeção de URL.
- **Sites grandes (e-commerce/portais):** controlar URLs com parâmetros e filtros (G1); analisar os logs do servidor para ver onde o Googlebot gasta tempo

**Entregar:** lista de correções + arquivos prontos (robots.txt, sitemap) + regras de canonical/noindex.

#### B2. Arquitetura e URLs
**Fazer:**
- **Hierarquia lógica:** início → categorias/serviços → subcategorias → produtos/artigos (no máximo ~3–4 cliques da home para páginas importantes) `[OPINIÃO consolidada]`
- **URLs:**
  - curtas, descritivas, em minúsculas
  - palavras separadas por hífen
  - **sem acentos e sem "ç"** (ex.: `/servicos/troca-de-oleo`)
  - sem parâmetros desnecessários
- **Links internos:** menus, breadcrumbs, links contextuais no conteúdo, "relacionados". As páginas de negócio devem receber mais links internos.
- **Breadcrumbs** com dados estruturados
- **Páginas órfãs** (sem links internos): encontrar e ligar ou remover

**Entregar:** mapa da arquitetura (atual × proposto) + padrão de URLs + plano de links internos.

#### B3. Velocidade e Core Web Vitals
**Pesquisar:** métricas e limites atuais do Core Web Vitals (LCP, INP, CLS) e as ferramentas (PageSpeed Insights, CrUX, relatório do Search Console).

**Fazer:**
- **Priorizar os dados reais** (campo/CrUX), não só o teste de laboratório
- **Imagens:**
  - formatos modernos (WebP/AVIF)
  - tamanho correto
  - `width`/`height` definidos (evita CLS)
  - `loading="lazy"` abaixo da dobra
  - **imagem principal sem lazy** e com prioridade
- **CSS/JS:** remover o que não é usado, adiar o não crítico, evitar bibliotecas pesadas e scripts de terceiros desnecessários (chats, widgets, pixels em excesso)
- **Fontes:** poucas, com `font-display: swap`, preferir hospedadas no próprio site
- **Servidor:**
  - cache de página
  - compressão (Brotli/Gzip)
  - HTTP/2 ou HTTP/3
  - CDN
  - tempo de resposta (TTFB) baixo
- **PHP/MySQL:**
  - OPcache ativo
  - consultas otimizadas (índices nas colunas usadas em WHERE/JOIN)
  - cache de resultados/páginas
  - cabeçalhos `Cache-Control`/`ETag` para arquivos estáticos
  - gerar miniaturas na hora do upload
- **Testar no celular, em rede 4G lenta**, que é a realidade de muitos usuários brasileiros

**Entregar:** relatório de desempenho por modelo de página + correções priorizadas + trechos de código/configuração (`.htaccess`, PHP, HTML).

#### B4. Mobile e acessibilidade
**Fazer:**
- O Google usa principalmente a versão **mobile** para indexar: conteúdo, links e dados estruturados iguais aos do desktop
- **Mobile:**
  - botões com área de toque adequada
  - texto legível sem zoom
  - sem pop-ups que cobrem o conteúdo (intersticiais invasivos)
- **Acessibilidade:**
  - texto alternativo
  - contraste
  - estrutura de títulos correta
  - formulários com rótulos
  - navegação por teclado
- WhatsApp/telefone clicáveis (`tel:`, `wa.me`)

**Entregar:** checklist mobile/acessibilidade com correções.

#### B5. Dados estruturados
**Pesquisar (mudou bastante em 2025–2026):** a galeria atual de dados estruturados suportados pelo Google e o registro de alterações. Já conhecido:
- em jun/2025, o Google descontinuou 7 tipos (Book Actions, Course Info, Claim Review, Estimated Salary, Learning Video, Special Announcement, Vehicle Listing) `[OFICIAL]`
- **os resultados em destaque de perguntas frequentes (FAQ) deixaram de aparecer em 07/05/2026**; a marcação pode continuar no site, mas não gera destaque `[OFICIAL]`

**Fazer (tipos que costumam valer a pena, confirmar):**
- **Organization** (logo, nome, contatos, perfis) ou **LocalBusiness** (e subtipos: AutoPartsStore, Dentist, Restaurant...) com NAP, horário, geo
- **Product + Offer** (preço em BRL, disponibilidade, condição), **MerchantReturnPolicy** e **OfferShippingDetails** (frete/devolução), **AggregateRating/Review** (só avaliações reais de clientes, coletadas no próprio site)
- **BreadcrumbList**
- **Article** (autor, data de publicação/atualização) para conteúdo editorial
- **VideoObject** para vídeos próprios
- **Event**, **Recipe**, **JobPosting** quando aplicável
- **Validar** no Teste de pesquisa aprimorada (Rich Results Test) e no validador do Schema.org
- **Gerar dinamicamente** no PHP a partir do banco de dados (sem dados inventados)
- **Os dados estruturados também ajudam buscadores e IAs a entender a entidade** (empresa, produtos) `[OPINIÃO consolidada]`, mesmo sem resultado em destaque

**Entregar:** JSON-LD pronto por modelo de página + código PHP para gerar.

#### B6. Idioma e internacionalização
**Fazer:**
- `<html lang="pt-BR">`
- **Só Brasil:** não precisa de hreflang
- **Brasil + Portugal** (ou outros países):
  - hreflang (`pt-BR`, `pt-PT`, `x-default`), recíproco e com URLs canônicas
  - adaptar vocabulário, ortografia, moeda, frete e meios de pagamento
  - não só trocar a bandeira
- **Não redirecionar automaticamente por IP** sem permitir escolha (pode impedir o Googlebot de ver as versões)

**Entregar:** recomendação de estrutura (subpastas, subdomínios, domínios) + tags hreflang.

#### B7. Segurança
**Fazer:**
- HTTPS válido em tudo; redirecionar http → https
- **CMS/plugins/servidor atualizados;** senhas fortes; 2FA no painel; backups automáticos
- **Monitorar:** Search Console (problemas de segurança), páginas estranhas indexadas (`site:dominio.com.br` + termos de spam: cassino, remédios), arquivos alterados
- **Site hackeado:** limpar, corrigir a falha, trocar as credenciais, pedir revisão no Search Console (J3)

**Entregar:** checklist de segurança + plano de resposta a invasão.

#### B8. Migrações e redesign
**Fazer (antes de qualquer migração):**
1. **Inventário completo** das URLs atuais: rastreamento + sitemap + Search Console + GA4 + links externos
2. **Mapa de redirecionamentos 301** URL a URL (antiga → nova mais equivalente). Nunca mandar tudo para a home.
3. **Manter:** conteúdo, títulos, dados estruturados, links internos e velocidade (ou melhorar)
4. **Ambiente de teste** bloqueado para buscadores (senha, não só robots.txt), sem esquecer de liberar ao publicar
5. **Publicação:**
   - aplicar os 301
   - atualizar o sitemap
   - verificar canonical/noindex/robots
   - inspecionar as URLs principais
   - mudança de endereço no Search Console (se trocar de domínio)
6. **Monitorar por 8–12 semanas:** erros 404, indexação, posições, tráfego e conversões
7. **Manter os redirecionamentos** por muito tempo (idealmente para sempre)

**Entregar:** plano de migração + planilha de redirecionamentos + checklist pré/pós.

#### B9. Rastreadores de IA e controles
**Pesquisar (obrigatório, muda rápido):**
- os nomes e o funcionamento atuais dos rastreadores:
  - Googlebot (Busca, incluindo AI Overviews/Modo IA)
  - Google-Extended (controle de uso em modelos/Gemini, que não afeta a Busca; confirmar)
  - Bingbot
  - OAI-SearchBot (busca do ChatGPT) × GPTBot (treinamento)
  - PerplexityBot
  - ClaudeBot etc.
- **controle no Search Console** (em teste em 2026) para incluir/excluir o conteúdo dos recursos de IA generativa da Busca, e seus efeitos
- **meta tags** `nosnippet`, `max-snippet`, `data-nosnippet`

**Fazer:**
- **Decidir a política com o usuário:**
  - **e-commerce, negócio local e serviços:** geralmente permitir os rastreadores de **busca** de IA (aparecer em respostas gera clientes)
  - **portais/conteúdo pago:** avaliar o equilíbrio entre visibilidade e proteção do conteúdo
- Separar rastreador de **busca** (traz visibilidade) de rastreador de **treinamento** (não traz visitas diretas)
- **llms.txt:** `[CONTROVERSO]`; sem benefício comprovado em estudos independentes. Não priorizar; se criar, que seja simples.
- Documentar a decisão e revisar a cada trimestre

**Entregar:** política de rastreadores + robots.txt correspondente + nota de impacto.

---

### C. Palavras-chave

#### C1. Fontes no Brasil
- **Search Console:** consultas reais (a melhor fonte para sites existentes)
- **Planejador de palavras-chave** (Google Ads): volumes e tendência por região do Brasil
- **Google Trends:** sazonalidade e comparação entre termos/regiões (estados)
- **Autocompletar, "Perguntas relacionadas", "Pesquisas relacionadas"**
- **Ferramentas de SEO** (base Brasil): volumes estimados, dificuldade, concorrentes. **Compare duas fontes**, porque os números variam.
- **Fontes qualitativas:**
  - perguntas no WhatsApp/atendimento/vendedores
  - avaliações (Google, Reclame Aqui, marketplaces)
  - comentários nas redes
  - buscas no YouTube/TikTok
  - buscas internas do site
  - buscas dentro dos marketplaces (autocompletar do Mercado Livre/Shopee)

#### C2. Variações do português
- Levantar **sinônimos regionais**, termos informais, com/sem acento, singular/plural, abreviações, termos em inglês usados no Brasil (4.2)
- **Verificar se a página de resultados muda** entre as variações:
  - se é igual, uma página atende
  - se muda muito, pode precisar de conteúdo/seção específica
- **Negócio regional:** usar o termo da região do público (ex.: "aipim" no Sul/Rio, "macaxeira" no Nordeste)

#### C3. Intenção e página de resultados
- **Classificar:**
  - informacional ("como", "o que é")
  - comparação ("melhor", "x ou y", "vale a pena")
  - transacional ("comprar", "preço", "orçamento")
  - local ("perto de mim", "em [cidade]")
  - navegacional (marca)
- **A página de resultados define o formato:** se os 10 primeiros são categorias de loja, um artigo dificilmente vence; se são guias, uma página de produto dificilmente vence

#### C4. Agrupamento e mapeamento
- **Agrupar** termos que trazem a mesma página de resultados (mesma intenção) em um **grupo/tópico**
- **Uma página principal por grupo:** evitar duas páginas disputando o mesmo grupo (canibalização). Ver no Search Console as consultas em que várias URLs se alternam.
- **Mapa:** `Grupo → URL (existente ou a criar) → tipo de página → termo principal → termos secundários`

#### C5. Priorização
- **Valor para o negócio** (venda/lead) × **chance de ranquear** (concorrência, autoridade) × **volume** × **esforço**
- Começar pelas **páginas de negócio** e pela **cauda longa de alta intenção** (ex.: "kit relação cg 160 original preço"), depois os conteúdos de topo

**Entregar (C1–C5):** planilha `Termo | Variações | Volume (fonte) | Intenção | Recursos na página de resultados | Grupo | URL | Prioridade`.

---

### D. Conteúdo

#### D1. Tipos de página por modelo de negócio

| Modelo | Páginas prioritárias |
|---|---|
| Negócio local/serviço | Uma página por serviço; página por região **só com conteúdo real** (fotos, casos, informações locais); contato/orçamento; sobre (com equipe); avaliações; perguntas frequentes |
| E-commerce | Categorias e subcategorias (texto útil + filtros bem tratados); produtos (descrição própria, ficha técnica, fotos, avaliações, frete/troca); guias de compra; comparativos; páginas de marca |
| Serviços/B2B | Páginas de solução por problema/segmento; casos de sucesso com dados; preços (ou faixas); comparativos honestos; materiais aprofundados |
| Conteúdo/portal | Notícias com apuração; guias perenes; dados exclusivos; autoria e transparência editorial |

- **Conteúdos que costumam atrair cliente no Brasil:**
  - "quanto custa [serviço/produto]"
  - "[produto] vale a pena"
  - "melhor [produto] para [uso]"
  - "[a] ou [b]"
  - "como escolher [produto]"
  - "[problema]: o que fazer"
  - guias de compatibilidade (ex.: "peças que servem na moto X")

#### D2. Qualidade, experiência e confiança
**Pesquisar:** as orientações atuais do Google para conteúdo útil, confiável e feito para pessoas, e as perguntas de autoavaliação.

**Fazer:**
- **Experiência real:** fotos próprias, testes, casos, números internos, bastidores, "como fazemos"
- **Autoria:** nome, cargo/experiência, página do autor, revisão por especialista quando necessário
- **Responder de verdade:** a resposta principal logo no início; depois os detalhes, exemplos, exceções
- **Atualidade:** data de atualização real, preços/condições atualizados, informações legais corretas
- **Transparência da empresa:** sobre, contato, CNPJ, endereço, políticas, quem está por trás do site
- **Originalidade:** nada copiado de concorrentes/fabricantes. Reescrever com informação própria.
- **Perguntas para cada página:**
  - "isto é a melhor resposta para quem buscou?"
  - "um especialista confiaria?"
  - "o visitante sai satisfeito ou volta para a busca?"

#### D3. Otimização da página
**Fazer:**
- **Title:**
  - termo principal + benefício/diferencial + marca, se couber
  - único por página
  - atraente para o clique
  - exemplo: "Troca de Óleo de Moto em Araraquara | Em 30 min – Loja X"
- **Meta description:** resumo + motivo para clicar (o Google pode reescrever)
- **H1** claro; **H2/H3** organizando os subtemas (perguntas reais)
- **Introdução** que responde rápido; **listas e tabelas** quando ajudam
- **Imagens:** nome do arquivo descritivo, texto alternativo, compressão
- **Links internos** para/das páginas relacionadas, com texto-âncora descritivo
- **CTA** claro (orçamento, WhatsApp, comprar)
- **Dados estruturados** (B5)

**Entregar:** briefing de conteúdo por página (modelo na seção 7) + títulos/descrições prontos.

#### D4. Conteúdo com IA
**Pesquisar:** a posição atual do Google sobre conteúdo gerado com IA (o foco é a qualidade e o propósito, e o abuso em escala é spam) e as regras de rotulagem quando aplicável.

**Fazer:**
- **IA para:** pesquisa, estrutura, rascunhos, variações de títulos, resumos, revisão, dados estruturados, traduções
- **Humano para:** experiência real, dados próprios, checagem de fatos, tom, aprovação final
- **Nunca** gerar centenas de páginas parecidas (cidades, variações) sem valor real: é abuso de conteúdo em escala e páginas de entrada
- Registrar as fontes usadas

#### D5. Atualização e consolidação
**Fazer:**
- **Encontrar:**
  - páginas em queda (comparar períodos no Search Console)
  - páginas sem cliques/impressões há 12 meses
  - conteúdos duplicados ou que se canibalizam
- **Decidir por página:**
  - **atualizar** (melhorar e manter a URL)
  - **consolidar** (juntar em uma página mais forte + 301)
  - **manter** (tem valor para o usuário/conversão mesmo sem tráfego)
  - **remover** (sem valor; 404/410, ou 301 se houver equivalente)
- **Não apagar em massa** sem análise (links externos, conversões, valor para o usuário) e sem aprovação

**Entregar:** planilha `URL | Situação | Dados | Ação | Destino (se 301) | Prioridade`.

#### D6. YMYL (saúde, finanças, jurídico, segurança)
- **Exigência maior de confiança:**
  - autoria de profissionais (registro no conselho, quando aplicável)
  - revisão por especialista
  - fontes oficiais (Ministério da Saúde, ANVISA, Banco Central, legislação no Planalto)
  - data de revisão
- **Regras de conselhos profissionais** sobre publicidade e conteúdo (CFM, CFO, OAB etc.): pesquisar antes
- Nada de promessas de cura/resultado/ganho

---

### E. Autoridade e reputação

#### E1. Links
**Fazer:**
- **Analisar** o perfil atual (ferramenta de backlinks + relatório de links do Search Console): domínios que ligam, páginas mais ligadas, padrões suspeitos
- **Conquistar links reais (Brasil):**
  - fornecedores e marcas revendidas ("onde comprar", "revendedores autorizados")
  - associações comerciais, CDL, sindicatos, entidades do setor
  - imprensa local/regional/setorial
  - patrocínios e eventos locais
  - universidades/escolas técnicas (parcerias, palestras)
  - dados/estudos próprios, ferramentas úteis (calculadoras, tabelas)
  - entrevistas, podcasts
  - diretórios relevantes do segmento
- **Arquivo de rejeição (disavow):** só em caso de ação manual por links ou ataque claro e grande. Não é rotina `[OFICIAL – orientação do Google]`.
- **Nunca:** comprar links, PBN, "pacotes de backlinks", trocas em massa, comentários spam

**Entregar:** diagnóstico de links + lista priorizada de oportunidades + modelos de abordagem.

#### E2. Menções e marca
**Fazer:**
- Aumentar as **buscas pela marca** e as **menções** em fontes confiáveis (imprensa, avaliações, comunidades, vídeos): ajuda no Google e nas IAs
- **Consistência da entidade:** mesmo nome, descrição, endereço, contatos e perfis em todo lugar (site, GBP, redes, diretórios, Bing, Apple)
- **Página "Sobre" forte:** história, equipe, endereço, CNPJ, prêmios/certificações, imprensa
- **Não comprar/manipular menções** (3.1)

#### E3. Reputação na busca
**Fazer:**
- Pesquisar: "[marca]", "[marca] é confiável", "[marca] reclame aqui", "[marca] avaliações", "[marca] golpe"
- **Ações:**
  - responder e resolver no Reclame Aqui
  - avaliações do Google (ver o guia de GBP)
  - páginas próprias sobre garantia/segurança/políticas
  - perfis oficiais ocupando a página de resultados
  - alertas sobre perfis falsos (ver o guia de redes, I3)

**Entregar:** mapa da página de resultados da marca + plano de reputação.

#### E4. PR digital no Brasil
**Fazer:**
- **Pautas:**
  - dados próprios (ex.: "peças mais procuradas no inverno na região")
  - histórias locais
  - datas sazonais
  - especialistas disponíveis para entrevista
- **Lista:** jornais e portais regionais, sites setoriais, criadores do nicho, assessorias
- Release curto, com dados e imagens; acompanhamento educado

**Entregar:** 3 pautas + lista de veículos + modelo de e-mail.

---

### F. SEO local
→ Ver `estrategia-gbp-seo-local.md`. No site, além do guia de GBP:
- Página de contato com NAP, mapa, horário e WhatsApp
- Páginas de serviço com a cidade/bairro de forma natural
- **Páginas por região só com conteúdo real** (evitar páginas de entrada)
- **LocalBusiness** em JSON-LD (B5)
- Consistência total com o Perfil da Empresa no Google

---

### G. SEO para e-commerce

#### G1. Categorias e filtros
**Fazer:**
- **Categorias** são as páginas de maior potencial: título, H1 e um texto útil curto (como escolher, principais marcas, dúvidas). Não "textão" escondido.
- **Navegação por filtros (cor, tamanho, preço, marca):**
  - indexar **só as combinações com demanda de busca real** (ex.: "tênis de corrida masculino"), com URL limpa e conteúdo próprio
  - demais filtros: canonical para a categoria e/ou noindex, ou parâmetros não rastreáveis
  - evitar milhões de URLs
- **Paginação:** links rastreáveis para as páginas seguintes; cada página com URL própria; não canonizar todas para a página 1. Rolagem infinita precisa de páginas paginadas acessíveis.
- **Ordenação** (menor preço etc.) não deve gerar URLs indexáveis

#### G2. Produtos
**Fazer:**
- **Título do produto** com o que o cliente busca (marca + produto + modelo + atributo-chave)
- **Descrição própria** (não copiada do fabricante), ficha técnica, compatibilidade, fotos próprias/360°, vídeo
- **Avaliações e perguntas** de clientes reais
- **Preço, parcelamento, Pix, frete e prazo** visíveis
- **Fora de estoque:**
  - se volta → manter a página com a informação e alternativas
  - se descontinuado → 301 para o substituto/categoria mais próxima, ou 404/410 se não houver equivalente
- **Variações** (cor/tamanho): decidir entre uma URL com seletor ou URLs separadas (só se houver demanda distinta), com canonical coerente

#### G3. Merchant Center e dados de produto
- **Listagens gratuitas** no Google Shopping/Busca: feed do Merchant Center (ver o guia de Google Ads)
- Dados estruturados **Product/Offer/frete/devolução** consistentes com o feed e a página
- Diagnóstico do Merchant Center sem reprovações

#### G4. Site próprio × marketplaces
- **Em buscas de produto genérico**, marketplaces costumam dominar. O site próprio ganha mais em:
  - marca própria
  - categorias de nicho
  - cauda longa (modelo/compatibilidade)
  - conteúdo de decisão
  - local ("[produto] em [cidade]")
- **Estratégia combinada:** vender nos marketplaces (demanda pronta) + site próprio com conteúdo, marca e recompra
- **SEO dentro do marketplace:** títulos, atributos, fotos, reputação. Cada marketplace tem a sua busca (pesquisar as regras atuais).

**Entregar (G1–G4):** auditoria de e-commerce + regras de indexação de filtros + modelos de título/descrição + estratégia site × marketplace.

---

### H. Busca com IA

#### H1. Como funciona (confirmar, muda rápido)
- **AI Overviews e Modo IA (Google):**
  - usam o índice da Busca
  - o Modo IA faz várias buscas relacionadas ("fan-out") para montar a resposta e mostra links
  - estar indexado e ranquear bem para as subperguntas aumenta a chance de citação `[OFICIAL/TESTADO]`
- **Copilot (Microsoft):** usa o Bing
- **ChatGPT:** usa busca na web (há estudos que mostram forte relação entre as citações e os resultados do Bing) e os próprios rastreadores `[TESTADO – estudos de caso]`
- **Perplexity e outros:** índices e rastreadores próprios + parceiros
- **Todos favorecem:**
  - conteúdo claro, completo e atual
  - fontes com reputação
  - presença consistente da marca em vários lugares (avaliações, imprensa, comparativos, fóruns)
  - `[OPINIÃO consolidada]`

#### H2. Como otimizar
- **Base:** SEO técnico (B), conteúdo útil (D), autoridade (E). Página não indexada não é citada.
- **Indexado no Google e no Bing** (cadastrar e enviar o sitemap no Bing Webmaster Tools)
- **Conteúdo "citável":**
  - resposta direta no início
  - definições claras
  - listas e tabelas
  - dados próprios com fonte
  - comparativos honestos
  - preços/condições atualizados
  - perguntas reais respondidas
- **Cobrir as subperguntas** de um tema (o que o Modo IA pesquisa em paralelo): custo, prazo, prós/contras, alternativas, como escolher, problemas comuns
- **Entidade consistente:** dados da empresa iguais em site, GBP, Bing Places, Apple Business Connect, redes, diretórios
- **Presença fora do site:** avaliações, imprensa, YouTube, listas "melhores de", comunidades
- **Não usar truques:** texto escondido para IAs, menções compradas, conteúdo em massa

#### H3. Como medir
**Pesquisar:** os relatórios disponíveis hoje e o que mostram.

- **Search Console:**
  - relatório de **desempenho em IA generativa** (AI Overviews e Modo IA)
  - lançado em jun/2026, com dados a partir de 18/05/2026
  - **mostra impressões, páginas, países e dispositivos, sem cliques e sem consultas** `[OFICIAL]`
  - confirmar se mudou
- **Bing Webmaster Tools – AI Performance:**
  - citações no Copilot/resumos de IA do Bing e parceiros
  - consultas de base (grounding queries)
  - páginas citadas
  - em 2026, ganhou intenções, tópicos e participação nas citações `[OFICIAL]`
- **ChatGPT – Business Hub (Businesses in ChatGPT):**
  - lançado em beta em 10/11/2026, com menções e cliques
  - **no lançamento, perfis locais só para endereços dos EUA** `[EUA]`
  - acompanhar a chegada ao Brasil
- **GA4:** tráfego de referência de IAs (chatgpt.com, perplexity.ai, gemini.google.com, copilot.microsoft.com etc.) e as conversões desse tráfego
- **Monitoramento manual mensal:**
  - 20–30 perguntas-chave em cada IA
  - a marca aparece? é citada com link? o que diz? quem aparece no lugar?
  - registrar em planilha
- **Ferramentas pagas de visibilidade em IA:** úteis para escala, mas `[OPINIÃO]` sobre a metodologia

#### H4. Decisões de bloqueio
- **Excluir o site dos recursos de IA** (controle do Search Console/`nosnippet`) pode reduzir a visibilidade. Avaliar o custo × benefício com o usuário (ver B9).
- **Bloquear rastreadores de treinamento** não costuma afetar a busca; **bloquear rastreadores de busca de IA** reduz a chance de citação

**Entregar (H1–H4):** diagnóstico de visibilidade em IA + plano de ações + planilha de monitoramento + política de rastreadores.

---

### I. Mensuração

#### I1. KPIs
- **Visibilidade:**
  - impressões e posição média por grupo de páginas
  - termos no top 3/top 10
  - impressões em IA (Search Console)
  - citações (Bing)
- **Tráfego:** cliques orgânicos **não marca** (o crescimento real do SEO) e de marca (força da marca); CTR por tipo de página
- **Negócio:** conversões e receita do orgânico (GA4/CRM), leads/vendas por página de entrada
- **Saúde:** páginas indexadas × enviadas, Core Web Vitals aprovados, erros
- **Marca:** buscas pelo nome (Search Console/Trends)
- **Cuidado:**
  - menos cliques com mais conversões pode ser normal na era da IA
  - olhe o funil inteiro

#### I2. Acompanhamento de posições
- Ferramenta de rastreamento com **localização no Brasil** (e cidade, para local) e **celular**
- 20–100 termos prioritários, por grupo
- **Posição é indicador, não objetivo:** a página de resultados muda (IA, Maps, Shopping)

#### I3. Dashboards
- **Looker Studio** com conectores do Search Console e do GA4 (ou planilha/página PHP própria)
- **Sites grandes:** exportação em massa do Search Console para BigQuery
- **Painéis:**
  - visão geral (marca/não marca)
  - páginas de negócio
  - conteúdo
  - técnico
  - IA
- **Anotações:** atualizações do Google, publicações, migrações, campanhas

#### I4. ROI do SEO
- **Receita/lucro do orgânico** (conversões × margem) ÷ custo (equipe, conteúdo, ferramentas, desenvolvimento)
- **Comparação opcional:** quanto custaria o mesmo tráfego no Google Ads `[OPINIÃO]` (é só referência, não é receita)
- **Horizonte:** SEO costuma levar meses. Mostrar a evolução trimestral.

**Entregar (I1–I4):** painel de KPIs + modelo de relatório mensal + cálculo de ROI.

---

### J. Atualizações, quedas e penalidades

#### J1. Monitoramento
- Painel de status da Busca do Google + histórico de atualizações + notícias (seção 1)
- **Em 2026:**
  - atualizações principais em **março** (27/03–08/04), **maio** (21/05–02/06) e **novembro** (início em 10/11)
  - atualizações de spam em março, junho e agosto
  - atualização principal do Discover em fevereiro
  - `[OFICIAL – confirmar o calendário atual]`
- Anotar as datas no dashboard (I3)

#### J2. Diagnóstico de queda
1. **Confirmar a queda real:**
   - Search Console (cliques **e** impressões)
   - comparar com o ano anterior (sazonalidade)
   - separar marca × não marca, páginas, dispositivos, países
2. **Isolar o padrão:** o site todo? uma seção? um modelo de página? algumas consultas?
3. **Causas possíveis:**
   - **técnica:** noindex/robots por engano, erros 5xx, migração, canonical, site lento ou fora do ar, mudança de tema/plugin
   - **atualização do Google:** a queda coincide com uma atualização principal/spam? Aguardar o fim da atualização para analisar.
   - **página de resultados mudou:** entrou AI Overview, mais anúncios, vídeos, marketplaces. A posição se mantém, mas os cliques caem.
   - **concorrência:** um concorrente novo/melhor
   - **demanda:** a busca caiu (Google Trends)
   - **segurança:** invasão ou spam injetado
   - **manual:** ação manual no Search Console
   - **rastreamento/medição:** GA4 quebrado (a queda não existe de verdade)
4. **Não reagir no impulso** (apagar conteúdo em massa, trocar URLs)

#### J3. Ações manuais e segurança
- **Search Console > Ações manuais / Problemas de segurança**
- **Se houver ação manual:** entender o tipo, corrigir **tudo** (não só exemplos), documentar o que foi feito e pedir reconsideração
- **Site hackeado:** limpar, corrigir a falha, revisar os usuários, pedir revisão

#### J4. Recuperação após atualização principal
- **Comparar** as páginas que perderam com as que ganharam (dentro e fora do site)
- **Melhorar a qualidade de verdade** (D2):
  - experiência real
  - utilidade
  - atualidade
  - excesso de anúncios/pop-ups
  - conteúdo fraco em escala
  - transparência
  - reputação
- **Consolidar** conteúdo fraco (D5); fortalecer a marca e as menções (E)
- **Recuperação pode levar meses** (às vezes só na próxima atualização principal)
- **Diversificar canais** (ver o guia central)

**Entregar (J1–J4):** diagnóstico da queda + causa provável com evidências + plano de recuperação com prazos.

---

### K. Operação

#### K1. Rotina
- **Semanal (15–30 min):**
  - Search Console (erros, quedas anormais, ações manuais/segurança)
  - status de atualizações do Google
  - publicação/atualização de conteúdo do plano
- **Mensal:**
  - relatório (I3)
  - posições
  - visibilidade em IA (H3)
  - indexação
  - Core Web Vitals
  - novas oportunidades de palavras-chave
  - links conquistados
  - registro de atualizações
- **Trimestral:**
  - auditoria rápida (A4)
  - revisão da estratégia e do mapa de palavras-chave
  - política de rastreadores (B9)
  - consolidação de conteúdo (D5)

#### K2. Ferramentas
**Pesquisar:** preços e recursos atuais.

- **Gratuitas e essenciais:**
  - Search Console
  - Bing Webmaster Tools
  - GA4
  - PageSpeed Insights
  - Teste de pesquisa aprimorada e validador do Schema.org
  - Google Trends
  - Planejador de palavras-chave
- **Rastreadores de site:** Screaming Frog (versão gratuita até um limite de URLs), Sitebulb ou script próprio
- **Ferramentas de mercado** (pagas): Semrush, Ahrefs, SE Ranking, Ubersuggest. Escolher uma com boa base de dados do Brasil.
- **Monitoramento de posições e de visibilidade em IA:** avaliar custo × uso

#### K3. Trabalho com desenvolvimento
- **Toda tarefa técnica como chamado** com: problema, impacto, URLs de exemplo, solução esperada, **critério de aceite** e como testar
- **SEO participa antes** de mudanças de layout, CMS, URLs, migrações
- **Ambiente de teste + checklist** antes de publicar (B8)

#### K4. Automações do Claude Code
- **Scripts úteis** (Python ou PHP, com aprovação para rodar em produção):
  - rastreador simples (status, title, meta description, H1, canonical, noindex, links internos, imagens sem texto alternativo)
  - extração da **API do Search Console** (consultas/páginas, comparação de períodos, canibalização)
  - **API do PageSpeed Insights** em lote
  - **análise de logs** do servidor (onde o Googlebot/Bingbot/rastreadores de IA passam)
  - **geração de sitemap XML** a partir do MySQL
  - **geração de JSON-LD** dinâmico
  - validação de redirecionamentos (antes/depois de migração)
- Saída em CSV/Markdown + resumo de ações
- **Credenciais em `.env`; somente leitura** nas APIs; nada é publicado sem aprovação

#### K5. Base de conhecimento
- Registrar na base de conhecimento do projeto (ex.: vault de notas em Markdown):
  - mapa de palavras-chave
  - decisões técnicas (robots, canonical, rastreadores de IA)
  - histórico de mudanças no site
  - atualizações do Google e o efeito observado
  - testes e resultados
- O Claude Code **lê a base antes** de propor mudanças e **atualiza depois** (com aprovação)

---

## 7. Formato de entrega

### 7.1 Auditoria + plano → `relatorio-seo.md`
1. **Resumo executivo:** situação atual (dados de base), 5 maiores problemas, 5 maiores oportunidades, impacto esperado
2. **Alertas críticos:** indexação, segurança, ações manuais, riscos de spam, riscos de migração
3. **Diagnóstico técnico** (B) com prioridades
4. **Palavras-chave e mapa de páginas** (C)
5. **Conteúdo:** criar / atualizar / consolidar / remover (D)
6. **Autoridade e reputação** (E)
7. **Busca com IA:** diagnóstico e plano (H)
8. **Plano de 90 dias em 3 fases:**
   - **Fase 1 – Semanas 1–2 (Base):** acessos (Search Console, Bing, GA4), correções críticas de indexação/segurança/velocidade, sitemap/robots, medição de conversões
   - **Fase 2 – Mês 1–2 (Páginas de negócio):** otimizar as páginas que dão dinheiro, dados estruturados, links internos, consolidação de conteúdo fraco, conteúdos de alta intenção
   - **Fase 3 – Mês 3 e contínuo:** plano de conteúdo, autoridade/PR, visibilidade em IA, rotina mensal, revisão trimestral
9. **Kit prático:**
   - títulos e meta descriptions prontos para as páginas de negócio
   - JSON-LD por modelo de página
   - robots.txt e política de rastreadores
   - planilha de redirecionamentos (se houver)
   - 5 briefings de conteúdo (modelo abaixo)
   - chamados técnicos com critérios de aceite
10. **KPIs e metas** (I1)
11. **Fontes:** URLs com data e marcação (`[OFICIAL]`, `[TESTADO]`, `[OPINIÃO]`, `[CONTROVERSO]`, `[ANTIGO]`, `[EUA]`)

### 7.2 Modelo de briefing de conteúdo
```
URL: (nova ou existente)
Objetivo da página: (venda/lead/informação)
Termo principal / termos secundários / variações regionais:
Intenção e o que a página de resultados mostra:
Público e dúvidas reais a responder:
Estrutura sugerida (H1, H2, H3):
Diferencial (experiência, dados, fotos, exemplos próprios):
Links internos (de onde vêm / para onde vão):
Dados estruturados:
CTA:
Fontes oficiais a citar:
Autor/revisor:
```

### 7.3 Módulo específico → `modulo-{{codigo}}-{{tema}}.md`
Ex.: `modulo-B8-migracao.md`, `modulo-J2-queda.md`.

### 7.4 Estilo
- Português do Brasil, linguagem simples, tópicos curtos
- Primeiro o que fazer, depois o porquê
- Código pronto para PHP/HTML quando o site for próprio
- Sem promessas de posição ou prazo garantidos

---

## 8. Registro de atualizações

Mantenha `atualizacoes-seo.md`. Toda novidade encontrada no protocolo da seção 1 entra lá:

```
## {{AAAA-MM-DD}}
- O que mudou: (atualização, recurso, documentação, relatório, política)
- Vale no Brasil/português? sim / não / não confirmado
- Fonte: URL (data) [marcação]
- Efeito observado no site: (dados do Search Console, se houver)
- Impacto neste guia: seção X precisa ser revisada
- Ação: nenhuma / ajustar Y
```

**Mudanças já conhecidas para conferir** (ponto de partida; confirme o status atual):
- Jun/2025: Google descontinua 7 tipos de dados estruturados (Book Actions, Course Info, Claim Review, Estimated Salary, Learning Video, Special Announcement, Vehicle Listing)
- 08/09/2025: Modo IA do Google em português no Brasil
- Nov/2025 → jan/2026: mais remoções de dados estruturados/recursos (ex.: Practice Problem) no Search Console
- Fev/2026: atualização principal do Discover; Bing lança o relatório AI Performance (citações em IA) em prévia pública
- 24/02/2026: Search Central Live em São Paulo
- Mar/2026: atualização de spam (24–25/03) e atualização principal (27/03–08/04)
- 07/05/2026: resultados em destaque de perguntas frequentes (FAQ) deixam de aparecer; ferramentas removidas em junho
- 21/05–02/06/2026: atualização principal de maio
- 03/06/2026: Search Console lança os relatórios de desempenho em IA generativa (dados desde 18/05/2026; impressões, sem cliques/consultas) e testa o controle para excluir conteúdo dos recursos de IA
- Jun/2026: Bing adiciona intenções, tópicos, participação nas citações e comparação ao relatório de IA; atualização de spam (24–26/06)
- Ago/2026: atualização de spam; relatório de IA do Search Console se expande para mais países
- 10/11/2026: atualização principal de novembro; OpenAI lança o Businesses in ChatGPT/Business Hub (beta; perfis locais só nos EUA no início)

Quando uma mudança contradizer este guia ou os guias relacionados, avise o usuário e sugira a atualização.

---

## 9. Checklist final

- [ ] Protocolo de pesquisa feito; mudanças recentes do Google/Bing/IA conferidas
- [ ] Conclusões baseadas nos dados do próprio site (Search Console, GA4, Bing), não só em ferramentas externas
- [ ] Nenhuma recomendação contra as políticas de spam (páginas de entrada, conteúdo em escala, links/menções comprados)
- [ ] Alterações de alto risco (robots, noindex, canonical, redirecionamentos, exclusões, migrações) com aprovação e plano de reversão
- [ ] Palavras-chave com variações do português do Brasil e intenção validada na página de resultados real
- [ ] Páginas de negócio priorizadas
- [ ] Conteúdo com experiência real, autoria e transparência da empresa (YMYL com revisão de especialista)
- [ ] Dados estruturados só com tipos suportados e dados reais
- [ ] Site indexado no Google **e** no Bing; política de rastreadores de IA decidida
- [ ] Visibilidade em IA medida (Search Console, Bing, GA4, monitoramento manual)
- [ ] Conversões orgânicas medidas; KPIs de marca × não marca
- [ ] LGPD, CDC e Decreto do e-commerce respeitados nas páginas
- [ ] Código testado em ambiente de teste; credenciais seguras
- [ ] Novidades registradas em `atualizacoes-seo.md`

## Conexões
- [[auditar-um-site-existente-para-seo]] — a auditoria rápida de 30 itens (módulo A4) atualiza o roteiro de auditoria do livro
- [[pesquisar-palavras-chave]] — o módulo C traz as fontes e as variações do português do Brasil para a pesquisa de palavras-chave
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — o módulo B1 trata de robots.txt, sitemap, canonical e noindex, com os riscos de mudança em produção
- [[migrar-dominio-redesenhar-ou-trocar-servidor-sem-perder-seo]] — o módulo B8 atualiza o roteiro de migração e redesign
- [[adicionar-marcacao-schema-org-a-um-site]] — o módulo B5 trata dos dados estruturados suportados hoje
- [[segmentar-um-site-por-pais-e-idioma]] — o módulo B6 trata de hreflang para pt-BR e pt-PT
- [[preparar-um-site-para-busca-movel]] — os módulos B3 e B4 atualizam velocidade e mobile (Core Web Vitals)
- [[regra-ganhe-links-nao-os-compre-troque-nem-fabrique]] — as políticas de spam de links (seção 3.1 e módulo E1) reforçam a regra
- [[medir-resultados-de-seo-com-kpis-acionaveis]] — o módulo I define KPIs, painéis e ROI do SEO
- [[recuperar-um-site-de-panda-penguin-ou-penalidade-manual]] — o módulo J trata de diagnóstico de queda, ação manual e recuperação
- [[panda-penguin-e-penalidades-do-google]] — diverge: o guia trata quedas em atualizações principais como reavaliação geral, e não penalidade, e reserva a rejeição de links a ação manual por links ou a ataque claro, enquanto o livro descreve Panda e Penguin como penalidades e inclui a rejeição na limpeza
- [[otimizar-os-elementos-de-uma-pagina-para-palavras-chave]] — o módulo D3 atualiza a otimização de título, descrição e cabeçalhos
- [[estrategia-gbp-seo-local]] — o módulo F do guia de SEO remete ao guia de busca local para o detalhe
- [[guia-marketing-digital-brasil]] — o guia central de marketing digital cobre o SEO em visão de estratégia
- [[guia-google-ads-brasil]] — Merchant Center e anúncios no Modo IA estão no guia de Google Ads
- [[guia-social-media-brasil]] — o SEO social fica no guia de redes sociais
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias diz quando abrir este guia e como ele se relaciona com os outros
- [[trafego]] — centralizador do assunto; este guia é pesquisa atual para o tema
- [[decisoes-sobre-divergencias-entre-guias-e-livro-de-seo]] — nota derivada deste guia: Decisões sobre as divergências entre os guias e o livro de SEO
- [[regra-nao-gere-paginas-em-massa-sem-valor-real]] — nota derivada deste guia: Não gere páginas em massa sem valor real
- [[conquistar-links-e-reputacao-de-marca-no-brasil]] — nota derivada deste guia: Conquistar links e reputação de marca no Brasil
- [[corrigir-rastreamento-indexacao-e-arquitetura-de-urls]] — nota derivada deste guia: Corrigir rastreamento, indexação e arquitetura de URLs
- [[diagnosticar-queda-de-trafego-organico]] — nota derivada deste guia: Diagnosticar queda de tráfego orgânico
- [[medir-e-operar-o-seo-no-dia-a-dia-com-o-claude-code]] — nota derivada deste guia: Medir e operar o SEO no dia a dia com o Claude Code
- [[planejar-seo-de-e-commerce-no-brasil]] — nota derivada deste guia: Planejar SEO de e-commerce no Brasil
- [[planejar-o-conteudo-de-seo-para-o-publico-brasileiro]] — nota derivada deste guia: Planejar o conteúdo de SEO para o público brasileiro
- [[otimizar-o-site-para-busca-com-ia-e-decidir-a-politica-de-rastreadores]] — nota derivada deste guia: Otimizar o site para busca com IA e decidir a política de rastreadores
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — nota derivada deste guia: Melhorar velocidade e experiência móvel de um site
- [[head-site-veiculos-TEMPLATE-1]] — as decisões de canonical, noindex, hreflang, dados estruturados e produto fora de estoque deste guia viram regras por tipo de página no template do head
