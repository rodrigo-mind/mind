---
titulo: "Guia: Marketing digital no Brasil (guia central)"
tipo: guia
assunto: trafego
origem: fornecido-pelo-usuario
escopo: "Estratégia de marketing digital para empresas brasileiras: estratégia, marca, canais, SEO e busca com IA, conteúdo e copywriting, conversão, CRM, e-mail, WhatsApp, dados, IA e situações específicas (módulos A a K)"
revisao_do_guia: novembro/2026
processado_em: 2026-11-23
revisar_ate: 2027-02-23
status: pesquisa-atual
---

# Guia do Claude Code: Marketing Digital – Brasil (Guia Central)

> Manual de pesquisa e execução para o Claude Code planejar, executar e medir **estratégias de marketing digital** para empresas brasileiras: estratégia, marca, SEO e busca com IA, conteúdo e copywriting, conversão, e-commerce e marketplaces, CRM, e-mail, WhatsApp, dados e mensuração.
> **Regra nº 1: estratégia antes de tática. Canais, algoritmos e leis mudam; os princípios de negócio (oferta, margem, cliente, posicionamento) mudam pouco. Pesquise o que muda e aplique o que não muda.**
> Última revisão do guia: novembro/2026.

---

## Mapa dos guias (este é o central)

| Tema | Guia |
|---|---|
| Estratégia, marca, SEO/busca com IA, conteúdo, conversão, e-commerce, CRM, e-mail, dados | **este guia** |
| Google Perfil da Empresa e SEO local | `estrategia-gbp-seo-local.md` |
| Meta Ads (Facebook, Instagram, WhatsApp) | `guia-trafego-pago-meta-brasil.md` |
| Google Ads | `guia-google-ads-brasil.md` |
| Redes sociais (orgânico) | `guia-social-media-brasil.md` |

Quando um módulo deste guia apontar para outro guia, siga o outro guia para os detalhes.

---

## Sumário

0. Como usar este guia
1. Protocolo de pesquisa atualizada (obrigatório)
2. Fontes por nível de confiança
3. Regras de conformidade e limites de atuação
4. Contexto brasileiro
5. Princípios e modelo mental
6. Módulos
   - **A. Estratégia**: A1 Diagnóstico do negócio · A2 Pesquisa de mercado e público · A3 Concorrência e posicionamento · A4 Proposta de valor e oferta · A5 Plano de marketing
   - **B. Marca e reputação**: B1 Plataforma de marca · B2 Marca × performance · B3 Reputação
   - **C. Aquisição e mix de canais**: C1 Matriz de canais · C2 Orçamento e alocação
   - **D. SEO e busca com IA**: D1 SEO técnico · D2 Palavras-chave e intenção · D3 Conteúdo útil · D4 SEO local · D5 Busca com IA (GEO) · D6 Autoridade, links e PR digital · D7 Atualizações do Google e quedas
   - **E. Conteúdo e copywriting**: E1 Estratégia de conteúdo · E2 Copywriting · E3 Vídeo · E4 Conteúdo com IA
   - **F. Conversão e vendas online**: F1 CRO do site e páginas · F2 Captura de leads · F3 E-commerce · F4 Marketplaces
   - **G. Relacionamento e retenção**: G1 CRM e funil de vendas · G2 E-mail marketing · G3 WhatsApp marketing · G4 Automação · G5 Fidelização e LTV · G6 Indicação
   - **H. Dados e mensuração**: H1 Plano de mensuração · H2 Dados primários e LGPD · H3 Atribuição e triangulação · H4 Dashboards · H5 Unit economics e ROI
   - **I. IA no marketing**: I1 Usos · I2 Agentes e conectores · I3 Governança
   - **J. Operação**: J1 Rituais · J2 Ferramentas · J3 Agência e fornecedores · J4 Base de conhecimento
   - **K. Situações específicas**: K1 Lançamento · K2 Negócio local · K3 E-commerce · K4 Serviços e B2B · K5 Datas sazonais · K6 Queda de vendas/tráfego
7. Formato de entrega
8. Registro de atualizações
9. Checklist final

---

## 0. Como usar este guia

### 0.1 Variáveis da empresa

```
EMPRESA:          {{nome}}
SITE:             {{url}} (plataforma: PHP próprio, WordPress, Shopify, Nuvemshop, VTEX...)
MODELO:           {{varejo local | e-commerce | serviço local | B2B | infoproduto | SaaS | marketplace}}
SEGMENTO:         {{ex.: peças de moto, clínica, restaurante}}
ÁREA:             {{bairro/cidade | estado | Brasil}}
CANAIS DE VENDA:  {{loja física | site | WhatsApp | marketplaces | TikTok Shop | representantes}}
TICKET MÉDIO:     {{R$}}
MARGEM DE CONTRIBUIÇÃO: {{%}}
RECOMPRA/LTV:     {{frequência e valor em 12 meses}}
FATURAMENTO/MÊS:  {{faixa}} (opcional, ajuda a dimensionar)
ORÇAMENTO DE MARKETING/MÊS: {{mídia + ferramentas + equipe}}
EQUIPE:           {{quem faz o quê; horas/semana}}
CANAIS ATUAIS:    {{SEO, Google Ads, Meta Ads, redes, e-mail, WhatsApp, marketplaces, GBP...}}
FERRAMENTAS:      {{GA4, Search Console, CRM, e-mail, ERP, plataforma de loja}}
DADOS DISPONÍVEIS:{{relatórios, exportações, CRM, planilhas}}
OBJETIVO 12 MESES:{{ex.: dobrar vendas online; abrir 2ª loja; reduzir dependência de marketplace}}
CONCORRENTES:     {{3 a 5}}
CATEGORIA REGULADA? {{saúde, financeiro, apostas, álcool, infantil... ou não}}
```

Se faltar alguma variável, pergunte. Se não houver ninguém para responder, faça a melhor suposição e escreva qual foi. **Sem margem e ticket não existe meta de custo séria.** Entregue faixas e diga o que falta.

### 0.2 Modos de uso
- **Plano de marketing completo:** A → B → C → H1, depois os módulos dos canais escolhidos, e então o relatório da seção 7.
- **Auditoria:** A1 + H (dados) + os canais ativos (C, D, F, G) + os guias específicos.
- **Problema específico:** queda de tráfego → D7/K6; vendas caíram → K6; e-mails no spam → G2; lançamento → K1; Black Friday → K5.
- **Rotina:** J1 (semanal/mensal/trimestral) + H4 + registro (seção 8).

---

## 1. Protocolo de pesquisa atualizada (obrigatório)

Faça isto **antes de cada módulo**:

1. **Pegue a data de hoje** (`date`) e use o ano atual nas buscas.
2. **Leia o registro** `atualizacoes-marketing.md` (seção 8), se existir.
3. **Busque novidades do tema nos últimos 90 dias** nas fontes da seção 2:
   - `site:developers.google.com/search {{tema}}` · `site:status.search.google.com` (atualizações do Google)
   - `site:searchengineland.com {{tema}}` · `site:searchenginejournal.com {{tema}}`
   - `site:meioemensagem.com.br {{tema}}` · `site:ecommercebrasil.com.br {{tema}}`
   - Em português: `"{{tema}}" Brasil {{ano}}`
4. **Confirme na fonte primária** (órgão oficial, plataforma, estudo original), e não só na notícia ou no post de blog que cita o estudo.
5. **Dados divergentes são normais.** Fontes diferentes medem coisas diferentes. Exemplo real de 2026:
   - a ABComm projetou o e-commerce brasileiro acima de R$ 258 bilhões
   - outro estudo (Confi/Neotrust) projetou R$ 462,5 bilhões para o mesmo ano

   Sempre informe **fonte, data, metodologia (o que entra na conta) e amostra**. Nunca misture números de fontes diferentes na mesma série.
6. **Se a fonte atual contradizer este guia, a fonte atual vence.** Registre na seção 8.
7. **Marque cada informação:**
   - `[OFICIAL]` = órgão público, lei, plataforma
   - `[TESTADO]` = estudo com método e amostra divulgados
   - `[OPINIÃO]` = especialista/blog/ferramenta sem método claro
   - `[CONTROVERSO]` = estudos sérios discordam
   - `[ANTIGO]` = mais de 12–24 meses, conforme o tema
   - `[EUA]` = dado ou recurso de fora do Brasil
8. **Cuidado com estatísticas "virais"** (ex.: "X% das marcas nunca aparecem em respostas de IA") sem estudo original acessível: não use, ou marque `[OPINIÃO]`.
9. **Não invente números.** Sem dado, diga que não há dado e proponha como medir.

---

## 2. Fontes por nível de confiança

### Nível 1: Oficial e dados públicos
- **Google Search Central** (SEO, políticas de spam, atualizações): https://developers.google.com/search · Status: https://status.search.google.com
- **Think with Google Brasil:** https://www.thinkwithgoogle.com/intl/pt-br/
- **IBGE:** https://www.ibge.gov.br (população, renda, PNAD TIC)
- **Cetic.br** (TIC Domicílios, TIC Empresas): https://cetic.br
- **Banco Central – Pix:** https://www.bcb.gov.br/estabilidadefinanceira/pix
- **ANPD (LGPD):** https://www.gov.br/anpd
- **Senacon / consumidor.gov.br / Procon**
- **CONAR:** http://www.conar.org.br
- **Planalto (legislação):** https://www.planalto.gov.br
- **Câmara e Senado** (projetos de lei, ex.: PL 2338/2023 sobre IA)
- Plataformas: ver os guias específicos (Meta, Google Ads, redes sociais, GBP)

### Nível 2: Pesquisas de mercado (com metodologia)
- DataReportal – Digital Brazil: https://datareportal.com
- ABComm (e-commerce): https://abcomm.org
- NielsenIQ (Ebit) e Neotrust/Confi (e-commerce)
- Sebrae (pequenos negócios): https://sebrae.com.br
- Opinion Box / Mobile Time (Panorama de apps): https://www.mobiletime.com.br
- Pesquisas anuais de marketing no Brasil (ex.: RD Station, Mundo do Marketing): verificar a metodologia
- SparkToro (comportamento de busca, zero-click): https://sparktoro.com
- Seer Interactive, Ahrefs, Semrush, SE Ranking (estudos de SEO/IA): verificar amostra e país

### Nível 3: Marketing baseado em evidências
- **Ehrenberg-Bass Institute** (como as marcas crescem: disponibilidade mental e física): https://marketingscience.info
- **IPA / Les Binet & Peter Field** (efeitos de marca × ativação; dados majoritariamente do Reino Unido `[EUA/UK]`)
- Artigos acadêmicos: Google Scholar, arXiv (verificar se há revisão por pares)

### Nível 4: Notícias e especialistas
- Search Engine Land, Search Engine Journal, Search Engine Roundtable
- Meio & Mensagem, Propmark, E-commerce Brasil, Mundo do Marketing
- Blogs de ferramentas (RD Station, Rock Content, HubSpot, Semrush, Nuvemshop): úteis, mas `[OPINIÃO]` até a fonte primária confirmar

---

## 3. Regras de conformidade e limites de atuação

### 3.1 Leis e normas que sempre se aplicam (pesquisar o texto atual)
- **Código de Defesa do Consumidor (Lei 8.078/1990):**
  - oferta vincula
  - proibida publicidade enganosa ou abusiva
  - **direito de arrependimento de 7 dias** em compras fora do estabelecimento (art. 49)
  - informação clara de preço
- **Decreto do Comércio Eletrônico (Decreto 7.962/2013):** informações obrigatórias no site (razão social, CNPJ, endereço, contato), resumo do contrato, atendimento facilitado, direito de arrependimento
- **LGPD (Lei 13.709/2018):** base legal para cada uso de dado; transparência; direitos do titular; segurança. A ANPD passou a ser agência reguladora em 2026 (confirmar) e fiscaliza também o ECA Digital.
- **ECA Digital (Lei 15.211/2025, em vigor desde 17/03/2026):** proteção de crianças e adolescentes; proibição de perfilamento para publicidade direcionada a menores
- **CONAR:** Código de Autorregulamentação Publicitária + Guia de Influenciadores (edição 2026): identificação ostensiva, afiliados, IA
- **Promoções com sorteio/vale-brinde:** podem exigir autorização prévia federal (Lei 5.768/1971 e normas). Pesquisar antes.
- **Marco Civil da Internet (art. 19, interpretação do STF de 2025):** maior responsabilidade das plataformas em conteúdo pago ilícito, com moderação mais rígida
- **Marcas e direitos autorais:** imagens, músicas, textos e marcas de terceiros
- **Regras setoriais:** conselhos profissionais (saúde, advocacia, imóveis), ANVISA, Banco Central/CVM (financeiro), SPA/Fazenda (apostas)
- **IA:** o **Marco Legal da IA (PL 2338/2023)** foi aprovado no Senado e estava em análise na Câmara em 2026. Pesquisar o status antes de afirmar qualquer obrigação.
- **Profissão:** Lei 15.325/2026 (profissional multimídia). Pesquisar os efeitos práticos.

### 3.2 Nunca recomendar
- Comprar listas de e-mail/WhatsApp, disparos sem consentimento, raspagem de dados pessoais
- Avaliações, depoimentos ou números falsos; falsa escassez; "de/por" com preço inflado
- Conteúdo gerado em massa só para manipular a busca (o Google trata como spam: "abuso de conteúdo em escala") ou compra de links
- Cloaking, contas "laranja", burla de bloqueio de plataformas
- Uso de imagem/voz de pessoas sem autorização; deepfake
- Coleta de dados sensíveis sem necessidade

### 3.3 Limites do Claude Code
- Por padrão, o Claude Code **não acessa** contas de ferramentas e plataformas. Ele pesquisa, analisa exportações e **prepara** planos, textos, códigos, automações e relatórios.
- Com conectores/APIs (I2):
  - **leitura primeiro**
  - qualquer ação (publicar, enviar e-mail/mensagem, alterar orçamento, editar site em produção) só com **aprovação explícita a cada ação**
  - registrar em `log-alteracoes.md`
- **Código para sites:** testar em ambiente de teste/cópia antes de produção; backup antes de alterar; nunca expor credenciais (usar `.env`)
- Questões jurídicas: orientar a procurar um advogado/contador

---

## 4. Contexto brasileiro

### 4.1 Digital
- **Redes sociais:** cerca de 154 milhões de identidades de usuários em out/2026, ~72% da população (DataReportal) `[TESTADO]`
- **Celular** é o principal dispositivo de compra e busca (a participação exata varia por fonte e ano)
- **WhatsApp** é canal de venda e atendimento para a maioria dos pequenos negócios
- **Busca com IA:** o Google lançou o **Modo IA em português** em 08/09/2025 `[OFICIAL]`; AI Overviews já fazem parte da busca brasileira
- Anúncios no Modo IA previstos para o Brasil no 4º trimestre de 2026 (ver o guia de Google Ads)

### 4.2 Comércio
- **E-commerce:**
  - a ABComm projetava mais de R$ 258 bilhões em 2026, com crescimento em torno de 10% ao ano
  - outras fontes calculam valores diferentes (ver 1.5)
- **Marketplaces** concentram boa parte das vendas: Mercado Livre, Shopee, Amazon, Magalu, TikTok Shop etc.
- **Social commerce e conversational commerce** (venda por WhatsApp, Instagram, TikTok Shop) crescem
- **Pagamentos:**
  - **Pix** é dominante
  - **Pix Automático** (pagamentos recorrentes) desde jun/2025 `[OFICIAL]`
  - **Pix Parcelado** previsto/em lançamento (confirmar status)
  - cartão parcelado sem juros é um hábito forte
  - boleto em queda
- **Frete e prazo** pesam muito na conversão; retirada na loja ajuda o negócio local

### 4.3 Consumidor
- Muito sensível a preço e condição de pagamento (parcelamento, desconto no Pix)
- **Desconfiança alta** por causa de golpes: CNPJ, endereço, avaliações, Reclame Aqui, rosto humano e atendimento rápido aumentam a conversão `[OPINIÃO consolidada]`
- Diversidade regional enorme (linguagem, renda, clima, datas, logística). Evite tratar "o Brasil" como um público só.

### 4.4 Mídia paga
- **Meta:** repassa PIS/Cofins + ISS desde jan/2026 (custo real ≈ gasto × 1,1383)
- **Google:** comunicou que não aumentaria preços com a reforma tributária
- Detalhes em cada guia

### 4.5 Sazonalidade
- Volta às aulas, Carnaval, Páscoa, Dia das Mães (2ª maior data do varejo), Dia dos Namorados, festas juninas, Dia dos Pais, Dia do Cliente, Dia das Crianças, **Black Friday**, 13º/Natal
- Datas do segmento
- Eventos (Copa, eleições)
- **Pesquisar o calendário do ano atual**

---

## 5. Princípios e modelo mental

1. **Negócio primeiro:** marketing existe para gerar **lucro e crescimento sustentável**, não seguidores, cliques ou "ROAS bonito". Toda meta volta para margem, CAC, LTV e caixa (H5).
2. **Estratégia → tática:** quem é o cliente, que problema resolvemos, por que nós (posicionamento), qual oferta. Só depois: canais e peças.
3. **Marca + performance** `[TESTADO – majoritariamente fora do Brasil]`:
   - ativação (curto prazo) gera vendas agora
   - marca (longo prazo) reduz o custo de aquisição futuro e aumenta o preço que o cliente aceita pagar
   - **disponibilidade mental** (ser lembrado na hora da compra) e **física** (ser fácil de achar e comprar) são os motores do crescimento (Ehrenberg-Bass)
   - adapte as proporções ao porte e ao momento da empresa; não aplique percentuais de outros países como regra
4. **A busca se fragmentou:**
   - Google (com AI Overviews/Modo IA), assistentes de IA (ChatGPT, Gemini, Copilot, Perplexity), redes sociais (busca no TikTok/Instagram/YouTube), marketplaces e Maps
   - as **buscas sem clique cresceram**
   - estratégia de visibilidade = estar presente e ser **citado** onde o cliente pergunta, não só "ranquear"
5. **Dados primários e consentimento:** cookies e rastreamento de terceiros perderam força. CRM, e-mail, WhatsApp com opt-in e vendas reais são o ativo da empresa.
6. **Mensurar por triangulação:** números das plataformas (autodeclarados) + GA4 + CRM/vendas reais + testes de incrementalidade. Nenhuma fonte sozinha é a verdade.
7. **Consistência e simplicidade:** poucos canais bem executados vencem muitos canais mal feitos. Capacidade real da equipe define o plano.
8. **Teste e aprendizado documentados:** hipótese → teste → resultado → decisão → registro (J4).

---

## 6. Módulos

Cada módulo tem: **Objetivo · Pesquisar · Fazer · Entregar.**

---

### A. Estratégia

#### A1. Diagnóstico do negócio
**Fazer:**
- **Modelo de negócio:** como ganha dinheiro, produtos/serviços que mais dão lucro (não só faturamento), sazonalidade, capacidade de atendimento/estoque
- **Unit economics:**
  - margem de contribuição por produto/serviço
  - CAC atual por canal (se houver dados)
  - LTV (12 meses)
  - payback (meses para recuperar o CAC)
- **Funil atual:** visitantes/contatos → leads → orçamentos → vendas (taxas de cada etapa)
- **Origem dos clientes** ("como nos conheceu?", CRM, vendas por canal)
- **Gargalo principal:** atrair? converter? atender? reter? margem?

**Entregar:** diagnóstico de 1 página + tabela de unit economics + gargalo principal.

#### A2. Pesquisa de mercado e público
**Pesquisar:** dados de mercado do segmento no Brasil/região (IBGE, Sebrae, associações setoriais, relatórios de mercado), tendências do segmento e da categoria.

**Fazer:**
- **Tamanho e tendência** do mercado local/nacional (com fonte e método)
- **Público:**
  - quem compra × quem usa × quem decide
  - motivações, dores, objeções, critérios de escolha
  - onde pesquisa e onde compra
- **"Trabalho a ser feito"** (o que o cliente quer resolver, não só o produto)
- **Fontes qualitativas:**
  - entrevistas com 5–10 clientes (roteiro pronto)
  - avaliações (Google, Reclame Aqui, marketplaces) da empresa e dos concorrentes
  - perguntas do WhatsApp/atendimento
  - comentários nas redes
  - buscas (D2)
- **Segmentar por motivação**, não só por demografia

**Entregar:** relatório de mercado + mapa de público (motivações, dores, objeções, linguagem) + roteiro de entrevista.

#### A3. Concorrência e posicionamento
**Fazer:**
- Mapear concorrentes **diretos** (mesmo produto), **indiretos** (outra solução) e **marketplaces**
- **Comparar:**
  - oferta, preço, condição de pagamento, frete/prazo, garantia
  - reputação (notas, Reclame Aqui)
  - presença por canal (site, SEO, Google Ads, Meta Ads – Biblioteca de Anúncios, redes, GBP, marketplaces)
  - mensagem principal
- **Mapa de posicionamento** (2 eixos relevantes para o cliente, ex.: preço × especialização; rapidez × atendimento)
- **Frase de posicionamento:** "Para [público] que [necessidade], [marca] é [categoria] que [diferencial], porque [prova]"

**Entregar:** tabela comparativa + mapa + posicionamento + 3 diferenciais defensáveis.

#### A4. Proposta de valor e oferta
**Fazer:**
- **Proposta de valor:** resultado para o cliente + prova + por que agora
- **Arquitetura de oferta:**
  - produto de entrada
  - principal
  - complementos (aumentar ticket)
  - recorrência (assinatura/Pix Automático, se fizer sentido)
- **Condições brasileiras:** parcelamento, desconto no Pix, frete grátis acima de X, retirada, garantia estendida, troca fácil
- **Preço:** coerente com o posicionamento e a margem (A1); simular o impacto de descontos na margem
- **Redução de risco:** garantia, teste, devolução simples (respeitando o CDC)

**Entregar:** proposta de valor + estrutura de ofertas + simulação de margem.

#### A5. Plano de marketing
**Fazer:**
- **Objetivos de 12 meses → metas trimestrais (OKRs)** ligadas a receita/lucro/clientes
- **Estratégia:** público prioritário, posicionamento, oferta, canais (C1), orçamento (C2)
- **Plano de 90 dias:** ações por semana/mês, responsáveis, entregas, métricas
- **Riscos e dependências** (ex.: dependência de um marketplace ou de um canal pago só)

**Entregar:** plano de marketing (seção 7).

---

### B. Marca e reputação

#### B1. Plataforma de marca
**Fazer:**
- Propósito (com cuidado para não ficar genérico), promessa, personalidade, tom de voz, valores praticados
- **Ativos distintivos:** cores, logo, slogan, personagem, som, rosto. Usar sempre igual em todos os canais para ser lembrado.
- **Identidade verbal:** palavras que usamos/evitamos; como falamos com o cliente

**Entregar:** manual de marca resumido (2–4 páginas).

#### B2. Marca × performance
**Fazer:**
- Definir o equilíbrio entre ações de **marca** (alcance, lembrança, conteúdo, patrocínio local, vídeo) e de **ativação** (ofertas, busca, remarketing), pelo porte e momento
- **Medir a marca:** buscas pelo nome da empresa (Search Console/Google Trends), tráfego direto, menções, share of search (buscas da marca ÷ buscas da categoria), lembrança em pesquisa simples com clientes
- Não cortar a marca só porque o retorno não aparece em 7 dias

**Entregar:** divisão de esforço/orçamento + indicadores de marca.

#### B3. Reputação
**Fazer:**
- Avaliações do Google (ver o guia de GBP), Reclame Aqui, marketplaces, redes
- **Processo:** pedir avaliação a todos os clientes, responder tudo, corrigir as causas recorrentes na operação
- **Gestão de crise:** ver o guia de redes sociais (módulo I2)

**Entregar:** painel de reputação (notas, volume, tempo de resposta, temas).

---

### C. Aquisição e mix de canais

#### C1. Matriz de canais
**Pesquisar:** novos canais/formatos relevantes (ex.: anúncios em assistentes de IA, como os anúncios no ChatGPT lançados em 2026; confirmar a disponibilidade no Brasil), custo e maturidade no Brasil.

**Avaliar cada canal por:** intenção do público, custo, tempo até o resultado, capacidade da equipe, controle (próprio × alugado), escala.

| Canal | Papel típico | Guia/Módulo |
|---|---|---|
| SEO + busca com IA | Demanda existente, longo prazo, ativo próprio | D |
| Google Perfil da Empresa | Negócio local, Maps | `estrategia-gbp-seo-local.md` |
| Google Ads | Demanda existente (alta intenção), Shopping, YouTube | `guia-google-ads-brasil.md` |
| Meta Ads | Gerar demanda, WhatsApp, remarketing | `guia-trafego-pago-meta-brasil.md` |
| Redes sociais (orgânico) | Marca, comunidade, prova social, descoberta | `guia-social-media-brasil.md` |
| TikTok Ads/Shop, LinkedIn Ads, Pinterest Ads | Conforme o público | pesquisar caso a caso |
| Marketplaces (+ anúncios internos) | Venda com demanda pronta | F4 |
| E-mail e WhatsApp | Relacionamento, recompra (canal próprio) | G2, G3 |
| Parcerias, afiliados, creators | Alcance com confiança | guia de redes (G) |
| PR digital e mídia local | Autoridade, citações em IA | D6 |
| Offline (loja, eventos, rádio local, panfleto com QR) | Negócio local | medir com cupom/QR/UTM |

- **Regra:** começar pelos canais de **maior intenção e menor custo** (GBP, SEO local, Google Ads de alta intenção, WhatsApp, base de clientes) e depois expandir para geração de demanda `[OPINIÃO consolidada]`
- **Canais próprios** (site, base de e-mail/WhatsApp, comunidade) reduzem a dependência de plataformas

**Entregar:** matriz de canais com prioridade (agora / próximo trimestre / depois / não usar).

#### C2. Orçamento e alocação
**Fazer:**
- **Orçamento total** = mídia + ferramentas + produção + pessoas
- **Mídia com o custo real** (impostos de cada plataforma: Meta 1,1383; Google confirmar)
- **Distribuição inicial:** maior parte nos canais comprovados, 10–20% para testes `[OPINIÃO]`
- **Regras de realocação:** com base no custo real por venda/lead qualificado e na margem (H5), não no ROAS da plataforma
- **Sazonalidade:** reservar verba para datas fortes (K5)

**Entregar:** orçamento mensal por canal (sem e com impostos) + regras de realocação.

---

### D. SEO e busca com IA

#### D1. SEO técnico
**Pesquisar:** documentação atual do Google Search Central (rastreamento, indexação, Core Web Vitals, dados estruturados).

**Fazer:**
- Search Console configurado (propriedade de domínio), sitemap enviado, robots.txt correto
- **Indexação:** páginas importantes indexadas; sem duplicidade (canonical); sem páginas de baixa qualidade em massa
- **Velocidade e Core Web Vitals no celular:** imagens otimizadas (WebP/AVIF, lazy load), cache, CSS/JS enxutos
- **Estrutura:** URLs amigáveis, hierarquia de categorias, links internos, breadcrumbs
- **Dados estruturados:** Organization/LocalBusiness, Product (preço, disponibilidade, avaliações reais), Article, Breadcrumb
- HTTPS, sem erros 404/5xx relevantes, redirecionamentos 301 corretos
- **Rastreadores de IA:** decidir (com o usuário) se permite ou bloqueia os rastreadores de IA no robots.txt, entendendo o impacto (bloquear pode reduzir a citação em respostas de IA)
- **Site em PHP próprio:** entregar o código pronto (meta tags dinâmicas, sitemap.xml gerado do MySQL, JSON-LD, cabeçalhos de cache, compressão)

**Entregar:** auditoria técnica `Problema | Impacto | Correção | Esforço` + código.

#### D2. Palavras-chave e intenção (Brasil)
**Fazer:**
- **Fontes:**
  - Search Console (consultas reais)
  - Planejador de palavras-chave do Google
  - autocompletar
  - "As pessoas também perguntam"
  - Google Trends (Brasil/estado)
  - ferramentas de SEO (volumes estimados, com variação entre ferramentas)
  - perguntas de clientes (A2)
- **Linguagem real:** termos informais, regionais, sem acento, erros comuns, "preço", "perto de mim", "vale a pena", "melhor", "como"
- **Intenção:** informacional / comparação / transacional / local / navegacional, cada uma com o tipo de página certo
- **Prioridade:** potencial de negócio × dificuldade × relevância (não só volume)
- **Mapear termo → página** (evitar duas páginas disputando o mesmo termo)

**Entregar:** planilha `Termo | Intenção | Volume | Dificuldade | Valor para o negócio | Página | Prioridade`.

#### D3. Conteúdo útil e confiável
**Pesquisar:** as orientações atuais do Google sobre conteúdo útil, confiável e feito para pessoas, além das políticas de spam (abuso de conteúdo em escala, abuso de reputação de site, domínios expirados).

**Fazer:**
- **Conteúdo que só a empresa pode fazer:**
  - experiência real (fotos próprias, casos, dados internos, testes, bastidores)
  - autoria identificada
  - especialistas
- **Tipos de página:**
  - categorias/serviços (transacional)
  - guias de compra e comparativos (comparação)
  - respostas a dúvidas reais (informacional)
  - páginas locais com conteúdo real
  - estudos/dados próprios (autoridade, citação em IA)
- **Estrutura:**
  - resposta direta no começo
  - subtítulos claros
  - listas e tabelas
  - perguntas frequentes reais
  - atualização datada
- **Atualizar e consolidar** conteúdo antigo/fraco em vez de só publicar mais

**Entregar:** plano de conteúdo SEO de 3 meses + modelos de briefing de página.

#### D4. SEO local
→ Ver `estrategia-gbp-seo-local.md` (Perfil da Empresa, avaliações, citações, páginas locais, dados estruturados locais).

#### D5. Busca com IA (GEO/AEO)
**Pesquisar (muda muito rápido):**
- como AI Overviews/Modo IA, ChatGPT, Gemini, Copilot e Perplexity escolhem fontes e marcas hoje
- estudos recentes sobre citações
- ferramentas de monitoramento de visibilidade em IA
- anúncios em IA (ver o guia de Google Ads)

**O que os estudos indicam** (confirmar, pois estudos divergem):
- AI Overviews reduzem cliques nos resultados orgânicos (estudos de 2026 apontam quedas fortes de CTR; números variam por estudo) `[TESTADO]`
- as buscas sem clique cresceram `[TESTADO – EUA]`
- marcas com **muitas menções em fontes diferentes** (avaliações, imprensa, fóruns, comparativos) tendem a ser mais citadas `[TESTADO/OPINIÃO]`
- para o ChatGPT, há estudo indicando forte relação entre as citações e os resultados do **Bing** `[TESTADO – estudo de caso]`
- **llms.txt:** sem benefício comprovado de citação em estudo independente; outros afirmam o contrário sem método claro `[CONTROVERSO]`. Não priorize.

**Fazer:**
- **Base:** SEO técnico (D1) e conteúdo útil (D3). Página que não é encontrada não é citada.
- **Ser citável:**
  - respostas claras e completas
  - dados próprios
  - comparativos honestos
  - preços/condições atualizados
  - perguntas frequentes reais
  - informações da empresa consistentes
- **Presença fora do site:**
  - avaliações (Google, Reclame Aqui, marketplaces)
  - imprensa local/setorial
  - listas "melhores de [cidade/categoria]"
  - YouTube
  - fóruns e comunidades
  - Bing Places e Bing Webmaster Tools
  - Apple Business Connect
- **Medir:**
  - registro mensal de perguntas-chave em cada IA ("melhor [categoria] em [cidade]", "[produto] vale a pena?"): a marca aparece? é citada com link? o que dizem?
  - tráfego de referência de IAs no GA4
- **Não prometer "ranking em IA":** é visibilidade probabilística

**Entregar:** diagnóstico de visibilidade em IA (perguntas × presença) + plano de ações + planilha de monitoramento mensal.

#### D6. Autoridade, links e PR digital
**Fazer:**
- **Links e menções reais:**
  - fornecedores e marcas parceiras ("onde comprar")
  - associações comerciais/CDL
  - imprensa local e setorial
  - patrocínios e eventos
  - estudos/dados próprios
  - participações em podcasts/lives
  - diretórios relevantes
- **PR digital:**
  - pautas com dados, histórias locais e datas
  - lista de jornalistas/criadores
  - release curto
  - acompanhamento
- **Nunca:** comprar links, redes de blogs (PBN), trocas em massa

**Entregar:** lista priorizada de oportunidades + 3 pautas + modelo de abordagem.

#### D7. Atualizações do Google e quedas de tráfego
**Pesquisar:** atualizações recentes no painel de status da Busca do Google e a análise de especialistas (houve atualizações principais em 2026, como a de março, com grande volatilidade).

**Fazer:**
1. **Confirmar a queda real:** Search Console (cliques, impressões, posição, por página/consulta/país/dispositivo), GA4, sazonalidade, comparação com o ano anterior
2. **Separar as causas:**
   - técnica (indexação, erro, migração, robots)
   - atualização do Google (datas coincidem?)
   - mudança na página de resultados (AI Overview, mais anúncios, vídeos, marketplaces)
   - concorrência
   - demanda (Google Trends)
3. **Não reagir no impulso** (ex.: apagar conteúdo em massa) antes do fim da atualização e da análise
4. **Plano:** corrigir problemas técnicos; melhorar/consolidar as páginas afetadas (D3); fortalecer a marca e as menções (D5, D6); diversificar os canais (C1)

**Entregar:** diagnóstico da queda + plano de recuperação.

---

### E. Conteúdo e copywriting

#### E1. Estratégia de conteúdo
**Fazer:**
- **Pilares ligados ao funil e ao público** (A2): educar, comparar/decidir, provar, bastidores/marca, oferta
- **Um conteúdo "mãe"** (guia, vídeo, estudo) → derivados para site, redes, e-mail, WhatsApp, GBP
- **Calendário integrado** (site + redes + e-mail + datas sazonais)
- Detalhes de redes: `guia-social-media-brasil.md`

**Entregar:** estratégia de conteúdo + calendário trimestral.

#### E2. Copywriting
**Fazer:**
- **Base:** público (A2), dor/desejo, promessa, prova, oferta, CTA
- **Estruturas úteis** (escolher pela situação):
  - AIDA (atenção-interesse-desejo-ação)
  - PAS (problema-agitação-solução)
  - Antes-Depois-Ponte
  - 4Ps (promessa, imagem, prova, proposta)
  - FAB (característica-vantagem-benefício)
- **Regras:**
  - uma ideia principal por peça
  - linguagem do cliente (palavras exatas)
  - benefício concreto
  - prova específica (números reais, depoimentos autorizados)
  - objeções respondidas
  - CTA claro
- **Brasil:** português natural; regionalismos quando fizer sentido; condições de pagamento claras
- **Conformidade:** sem promessas que o CDC/CONAR/conselhos proíbem; sem falsa urgência; claims comprováveis
- **Testar** títulos/ganchos (F1, guias de mídia)

**Entregar:** textos prontos (página, anúncio, e-mail, WhatsApp, post) + variações para teste.

#### E3. Vídeo
**Fazer:**
- Vídeo curto (descoberta/anúncios) + vídeo longo no YouTube (busca, decisão de compra, autoridade)
- **Roteiro:** gancho, conteúdo, prova, CTA; legenda; título/descrição com termos de busca
- Reaproveitar: cortes, trechos para anúncios, transcrição para artigo

**Entregar:** pauta de vídeos + roteiros.

#### E4. Conteúdo com IA
**Pesquisar:** as políticas atuais do Google sobre conteúdo gerado com IA (o foco é a qualidade e o abuso em escala, não a ferramenta), as regras de rotulagem de cada plataforma e as regras do CONAR para IA.

**Fazer:**
- **IA para:** pesquisa, estrutura, rascunho, variações, revisão, tradução, resumo
- **Humano para:**
  - experiência real
  - dados próprios
  - checagem de fatos
  - tom de voz
  - aprovação final
- **Rotular** quando a plataforma/norma exigir (conteúdo realista sintético, avatares)
- **Nunca** publicar em massa conteúdo genérico só para ranquear
- **Registrar as fontes** usadas no conteúdo

**Entregar:** fluxo de produção com IA + checklist de revisão.

---

### F. Conversão e vendas online

#### F1. CRO do site e páginas de destino
**Fazer:**
- **Diagnóstico:**
  - GA4 (funil, abandono por etapa, dispositivo)
  - mapas de calor/gravações (ex.: Microsoft Clarity, com aviso de privacidade)
  - testes de usuário simples (5 pessoas)
- **Básico que converte no Brasil:**
  - velocidade no celular
  - proposta clara acima da dobra
  - preço e condições (parcelas, Pix)
  - frete/prazo visível cedo (calculadora por CEP)
  - prova social
  - CNPJ/endereço/telefone/WhatsApp
  - selos de segurança reais
  - política de troca clara
- **Formulários curtos;** botão de WhatsApp com mensagem pré-preenchida e origem (H1)
- **Testes A/B:** uma hipótese por vez, volume mínimo, duração completa (semanas inteiras); se o tráfego for pequeno, melhorias baseadas em pesquisa em vez de testes estatísticos

**Entregar:** auditoria de conversão + lista priorizada (impacto × esforço) + hipóteses de teste.

#### F2. Captura e qualificação de leads
**Fazer:**
- **Iscas úteis:** orçamento, diagnóstico, guia, cupom, lista de espera, simulador/calculadora
- **Campos mínimos** + qualificação (1–2 perguntas)
- **Consentimento LGPD** claro (finalidade; opt-in separado para marketing)
- **Velocidade de contato:** lead respondido rápido converte mais `[OPINIÃO consolidada]`. Integrar formulário → CRM/WhatsApp.
- **Origem/UTM/IDs de clique** gravados com o lead (H1)

**Entregar:** fluxo de captura + formulários + integração (código, se for site próprio).

#### F3. E-commerce
**Fazer:**
- **Catálogo:** fotos reais, descrições completas, variações, estoque, preço/parcelamento, avaliações de compradores
- **Checkout:**
  - poucos passos
  - compra como convidado
  - Pix (com desconto, se a margem permitir), cartão parcelado, outros meios relevantes
  - cálculo de frete cedo
- **Pós-compra:** e-mail/WhatsApp de confirmação, rastreio, entrega, pedido de avaliação, recompra (G4)
- **Recuperação:** carrinho/Pix não pago/boleto não pago (G4)
- **Conformidade:** Decreto 7.962/2013 (informações obrigatórias), direito de arrependimento, política de troca/devolução
- **Feeds:** Google Merchant Center (ver o guia de Google Ads) e catálogo da Meta

**Entregar:** auditoria da loja + correções priorizadas + automações pós-compra.

#### F4. Marketplaces
**Pesquisar:** regras, taxas/comissões, programas de frete/logística, anúncios internos e reputação atuais de cada marketplace relevante (Mercado Livre, Shopee, Amazon, Magalu, TikTok Shop etc.).

**Fazer:**
- **Decidir o papel:** canal principal, complementar, liquidação, aquisição de clientes que depois compram direto?
- **Conta:** margem real por marketplace (comissão, frete, anúncios, impostos, devoluções)
- **Anúncios:**
  - títulos com os termos de busca do marketplace
  - fotos e ficha técnica completas
  - preço competitivo
  - reputação (prazo, atendimento, avaliações)
- **Anúncios patrocinados** do marketplace: com meta de margem, não de faturamento
- **Riscos:** dependência, guerra de preço, regras que mudam. Equilibrar com o canal próprio.
- **Respeitar as regras** sobre levar clientes para fora do marketplace (geralmente proibido)

**Entregar:** análise de viabilidade/margem por marketplace + plano de otimização.

---

### G. Relacionamento e retenção

#### G1. CRM e funil de vendas
**Fazer:**
- **Estágios claros:** lead → contato → qualificado → proposta → venda/perda (com motivo)
- **Campos:** origem, UTM, ID de clique (gclid/fbclid), produto de interesse, valor, responsável, datas
- **SLA:** tempo máximo para o primeiro contato; follow-ups definidos
- **Integração com as mídias:** enviar leads qualificados/vendas de volta para Google e Meta (ver os guias)
- **Sistema próprio (PHP/MySQL):** modelagem das tabelas `clientes`, `leads`, `oportunidades`, `interacoes` e os scripts de exportação

**Entregar:** desenho do funil + campos + regras + (opcional) estrutura de banco de dados.

#### G2. E-mail marketing
**Pesquisar (exigências mudaram 2024–2026):** os requisitos atuais do Gmail, Yahoo e Microsoft (Outlook/Hotmail) para remetentes em massa:
- SPF, DKIM e DMARC alinhados
- descadastro com um clique
- taxa de spam baixa (o Gmail cita mantê-la abaixo de 0,3%)
- registro PTR em IP próprio

Pesquise também como a aplicação ficou mais rígida (rejeições permanentes para quem não cumpre).

**Fazer:**
- **Autenticação do domínio:** SPF, DKIM, DMARC (começar monitorando e evoluir a política); subdomínio para marketing, se fizer sentido
- **Base:**
  - só com consentimento (opt-in)
  - double opt-in quando possível
  - limpeza periódica (inativos, rejeições)
  - nunca lista comprada
- **Conteúdo:** útil, segmentado, com descadastro visível; assunto claro (sem enganar)
- **Automações:**
  - boas-vindas
  - carrinho/Pix não pago
  - pós-compra
  - pedido de avaliação
  - recompra/reposição
  - reativação
  - aniversário
- **Métricas:** entregabilidade, cliques, conversão, receita por e-mail, descadastros, reclamações de spam. A taxa de abertura ficou pouco confiável por recursos de privacidade.

**Entregar:** checklist de entregabilidade (com os registros DNS sugeridos) + fluxos de automação + modelos de e-mail.

#### G3. WhatsApp marketing
→ Ver `guia-trafego-pago-meta-brasil.md` (seção 4.3 e módulos E) para app × API, preços, mensagens de marketing e IA de atendimento.

**Regras centrais:**
- opt-in
- frequência baixa e relevante
- opção de sair
- segmentação
- atendimento rápido
- etiquetas de origem

#### G4. Automação de marketing
**Fazer:**
- Mapear as jornadas: captação → nutrição → venda → pós-venda → recompra → reativação
- **Gatilhos:** comportamento (visitou, abandonou, comprou, não abriu), tempo, dados do CRM
- **Canais:** e-mail, WhatsApp (com opt-in), remarketing (ver os guias de mídia)
- Começar com 3–5 automações de maior impacto (geralmente: boas-vindas, abandono, pós-compra/avaliação, recompra)

**Entregar:** mapa de automações + textos + regras de disparo.

#### G5. Fidelização e LTV
**Fazer:**
- **Segmentação RFM** (recência, frequência, valor) da base de clientes
- **Ações por segmento:** VIP, recorrentes, em risco, inativos
- **Programa de fidelidade** simples (pontos, cashback, benefícios), com custo calculado na margem
- **Recorrência:** assinatura/reposição programada (Pix Automático, cartão recorrente), quando o produto permitir
- **Experiência:** entrega, atendimento, embalagem e pós-venda geram recompra e indicação

**Entregar:** análise RFM (com dados exportados) + plano de retenção.

#### G6. Indicação
**Fazer:**
- Programa "indique e ganhe" com benefício para quem indica e para quem é indicado
- Cupom/link único por cliente para medir
- Momento certo de pedir (após entrega/avaliação positiva)
- Regras claras e conformes (promoções com sorteio exigem verificação jurídica)

**Entregar:** regulamento simples + mensagens + método de medição.

---

### H. Dados e mensuração

#### H1. Plano de mensuração
**Fazer:**
- **Objetivos → KPIs → eventos:** definir o que medir em cada etapa do funil
- **Ferramentas base:**
  - GA4
  - Google Tag Manager
  - Search Console
  - pixels/APIs de conversão (ver os guias de mídia)
  - CRM
  - plataforma de loja
- **Eventos principais:** lead, clique no WhatsApp, ligação, início de checkout, compra (com valor), cadastro
- **Padrão de UTMs** (minúsculas, sem acento, dicionário fixo):
  - `utm_source`: google, meta, instagram, tiktok, email, whatsapp, gbp, parceiro-x
  - `utm_medium`: cpc, paid-social, social, email, referral, organic-local
  - `utm_campaign`: `{{ano-mes}}_{{objetivo}}_{{tema}}`
  - `utm_content`: peça/anúncio/post
- **WhatsApp:** página de redirecionamento que registra a origem + mensagem pré-preenchida
- **Offline:** cupom por canal, QR com UTM, "como nos conheceu?"
- **Documentar** em `plano-de-mensuracao.md`

**Entregar:** plano de mensuração + dicionário de UTMs + código (GTM/PHP) quando necessário.

#### H2. Dados primários e LGPD
**Fazer:**
- **Inventário de dados:** o que coleta, onde fica, para quê, base legal, quem acessa, por quanto tempo
- **Política de privacidade** e de cookies atualizadas; banner de consentimento conforme orientação jurídica
- **Consentimento separado** para marketing (e-mail/WhatsApp); fácil de revogar
- **Segurança:** acessos mínimos, senhas fortes, 2FA, backups; cuidado com planilhas compartilhadas
- **Uso nas mídias** (listas de clientes, conversões otimizadas): só com base legal e transparência
- **Encarregado (DPO)** e canal para os titulares, conforme a regra aplicável ao porte da empresa (pesquisar)

**Entregar:** inventário de dados + checklist LGPD de marketing.

#### H3. Atribuição e triangulação
**Fazer:**
- **Quatro visões, comparadas:**
  1. relatórios das plataformas (Google, Meta), que são autodeclarados
  2. GA4
  3. CRM/vendas reais (fonte de verdade)
  4. testes de incrementalidade (lift, geo, pausa controlada)
- **MER (eficiência total)** = receita total ÷ investimento total em marketing (com impostos), acompanhado ao longo do tempo
- **Modelos de mix de mídia (MMM):** para orçamentos maiores, avaliar ferramentas abertas (ex.: Meridian do Google) ou parceiros. Pesquisar o status e os requisitos de dados.
- **Explicar as diferenças** entre os números, sem "escolher" o mais bonito

**Entregar:** nota metodológica + painel com as quatro visões.

#### H4. Dashboards e relatórios
**Fazer:**
- **Painel executivo (1 página):**
  - receita
  - novos clientes
  - CAC
  - MER
  - LTV/recompra
  - leads qualificados
  - conversão
  - reputação
- **Painéis por canal** (detalhe nos guias específicos)
- **Ferramenta:** a que a empresa usa (Looker Studio, planilha, página PHP própria)
- **Relatório mensal:**
  - o que aconteceu
  - por quê
  - o que aprendemos
  - o que faremos
  - riscos

**Entregar:** estrutura do dashboard + modelo de relatório mensal.

#### H5. Unit economics e ROI
**Fazer:**
- **CAC por canal** = custo total do canal (mídia com impostos + ferramentas + produção + pessoas) ÷ novos clientes do canal
- **LTV** = margem de contribuição média por cliente em 12 meses (ou no horizonte definido)
- **LTV:CAC** e **payback** (meses)
- **ROI de marketing** = (lucro bruto incremental − custo) ÷ custo
- Estimativas com premissas explícitas e o que medir para torná-las reais

**Entregar:** planilha/tabela de unit economics por canal + recomendações.

---

### I. IA no marketing

#### I1. Usos de IA
- **Pesquisa e análise:** resumir avaliações/comentários, analisar concorrentes, classificar termos de busca, explorar dados exportados
- **Criação:** roteiros, textos, variações, imagens/vídeos (com revisão e rotulagem quando exigida)
- **Operação:** relatórios, automações, atendimento (com transferência para humano)
- **Sempre:** revisão humana, checagem de fatos, conformidade (CDC, CONAR, LGPD), sem dados pessoais desnecessários em ferramentas externas

#### I2. Agentes e conectores
**Pesquisar:** os conectores/MCPs oficiais atuais e as permissões. Exemplos:
- servidor MCP oficial do Google Ads (leitura)
- conectores de IA da Meta
- APIs do GA4/Search Console
- CRMs e plataformas de e-mail

**Regras:**
- leitura primeiro
- credenciais em `.env`
- permissões mínimas
- aprovação explícita para qualquer ação
- registro das ações
- desconfiar de conectores de terceiros que pedem acesso total

#### I3. Governança de IA
- Política interna simples:
  - o que pode/não pode ir para ferramentas de IA (dados de clientes, contratos, dados financeiros)
  - quem revisa
  - quando rotular
- **Acompanhar o Marco Legal da IA (PL 2338/2023)** e as regras do CONAR/plataformas
- Registrar quais conteúdos usaram IA

**Entregar:** política de uso de IA (1 página).

---

### J. Operação

#### J1. Rituais
- **Semanal (30 min):**
  - números da semana
  - o que quebrou
  - prioridades
  - testes em andamento
- **Mensal (1–2h):**
  - relatório (H4)
  - realocação de orçamento (C2)
  - calendário do próximo mês
  - aprendizados
- **Trimestral (meio dia):**
  - revisão da estratégia (A)
  - OKRs
  - canais
  - oferta
  - registro de atualizações (seção 8)

#### J2. Ferramentas
**Pesquisar:** as opções e os preços atuais, com preferência para as que têm suporte e dados no Brasil.

- **Essenciais (muitas gratuitas):** GA4, Search Console, Tag Manager, Google Perfil da Empresa, Meta Business Suite, WhatsApp Business
- **Conforme a necessidade:**
  - CRM (RD Station CRM, HubSpot, Pipedrive, sistema próprio)
  - e-mail/automação (RD Station Marketing, Brevo, Mailchimp etc.)
  - agendamento/relatórios de redes (mLabs, Etus, Reportei)
  - SEO (Semrush, Ahrefs, SE Ranking, Ubersuggest)
  - loja (Nuvemshop, Shopify, VTEX, WooCommerce)
  - ERP
- **Critérios:** custo × uso real, integração, dados no Brasil/LGPD, facilidade para a equipe

**Entregar:** stack recomendado com custo mensal e o que cada ferramenta resolve.

#### J3. Agência e fornecedores
- **A empresa é dona** de todas as contas, domínios, dados e criativos; fornecedores entram como parceiros/usuários
- **Escopo, entregáveis, metas, relatórios e prazos** claros em contrato
- Acesso por convite (nunca senha compartilhada); revogar ao final
- Ver também `guia-social-media-brasil.md` (módulo M)

#### J4. Base de conhecimento
- Registrar no repositório/base de conhecimento do projeto (ex.: um vault de notas em Markdown):
  - decisões e motivos
  - testes e resultados (`testes.md`)
  - aprendizados por canal
  - personas e linguagem do cliente
  - ofertas e resultados
  - registro de atualizações (seção 8)
- **Formato:** uma nota por assunto, com data, fonte e links entre as notas relacionadas
- O Claude Code deve **ler a base antes** de propor algo e **atualizá-la depois** (com aprovação)

---

### K. Situações específicas

#### K1. Lançamento de produto/serviço/negócio
- **Antes:**
  - pesquisa (A2)
  - oferta (A4)
  - página (F1)
  - mensuração (H1)
  - lista de espera/base (G2/G3)
  - conteúdo de aquecimento
  - creators/parceiros
- **Lançamento:**
  - base própria primeiro
  - mídia paga com metas claras
  - PR/menções
  - prova social rápida (primeiras avaliações)
- **Depois:** aprendizados, ajuste de oferta, campanha de prova social

#### K2. Negócio local
- **Prioridade:**
  1. GBP + avaliações (guia de GBP)
  2. site simples e rápido com páginas de serviço
  3. WhatsApp bem atendido
  4. Google Ads de alta intenção
  5. redes com rosto humano
  6. Meta Ads local
  7. parcerias locais
- Medir com ligação/WhatsApp/rota/cupom/"como nos conheceu?"

#### K3. E-commerce
- **Prioridade:**
  1. margem e oferta
  2. loja rápida e confiável (F1/F3)
  3. mensuração
  4. Shopping/PMax + Pesquisa de marca
  5. Meta para demanda/remarketing
  6. e-mail/WhatsApp de recuperação e recompra
  7. marketplaces com margem calculada
  8. SEO de categorias e conteúdo de decisão

#### K4. Serviços e B2B
- **Prioridade:**
  1. posicionamento claro (nicho)
  2. site com casos e provas
  3. SEO e conteúdo de decisão
  4. Google Ads de alta intenção
  5. LinkedIn (dono/equipe)
  6. CRM com funil e follow-up
  7. conversões offline nas mídias
  8. indicação

#### K5. Datas sazonais (ex.: Black Friday)
- **60–90 dias antes:**
  - planejar oferta e margem
  - estoque/capacidade
  - criativos
  - base de leads (lista VIP)
  - testar a página
- **30 dias antes:** aquecimento, aumento gradual de mídia, conteúdo
- **Na data:**
  - comunicação com a base
  - mídia com orçamento reservado
  - atendimento reforçado
  - monitorar estoque e site
- **Depois:**
  - pós-venda
  - pedido de avaliação
  - recompra
  - relatório de aprendizados
- **Conformidade:** preço "de" real (praticado antes), sem maquiagem de desconto (CDC/Procon)

#### K6. Queda de vendas ou de tráfego
1. **Confirmar** com os dados (vendas reais, não só a plataforma), comparando com o ano anterior
2. **Isolar:** qual canal? qual produto? qual região? qual etapa do funil (tráfego, conversão, ticket, recompra)?
3. **Causas comuns:**
   - rastreamento quebrado
   - site lento/fora do ar
   - mudança de preço/estoque/frete
   - atualização do Google (D7)
   - mudança de algoritmo/política de plataforma
   - concorrente novo/promoção
   - sazonalidade
   - reputação
   - atendimento
4. **Plano:** correções rápidas → testes → ajustes estruturais; comunicar ao responsável com dados

---

## 7. Formato de entrega

### 7.1 Plano de marketing digital → `plano-marketing-digital.md`
1. **Resumo executivo** (1 página): situação, gargalo principal, estratégia, metas, orçamento, próximos 90 dias
2. **Diagnóstico:** negócio e unit economics (A1), mercado e público (A2), concorrência e posicionamento (A3), canais atuais e dados (H)
3. **Estratégia:** posicionamento, proposta de valor e oferta (A4), marca (B), mix de canais (C1), orçamento (C2)
4. **Plano de 90 dias em 3 fases:**
   - **Fase 1 – Semanas 1–2 (Base):** mensuração (H1), LGPD (H2), correções críticas de site/conversão (F1, D1), acessos e propriedade das contas, GBP e reputação (B3)
   - **Fase 2 – Mês 1–2 (Canais prioritários):** execução dos canais escolhidos, seguindo os guias específicos; automações essenciais (G4); conteúdo (E)
   - **Fase 3 – Mês 3 e contínuo (Escala e aprendizado):** testes, realocação de orçamento, retenção (G5), indicação (G6), rituais (J1)
5. **Metas e KPIs** (painel executivo, H4) com valores-alvo
6. **Kit prático:** proposta de valor e mensagens principais, textos-base (página, anúncio, e-mail, WhatsApp), roteiro de entrevista com clientes, dicionário de UTMs, checklist de entregabilidade de e-mail, modelo de relatório mensal
7. **Riscos e dependências**
8. **Fontes:** URLs com data e marcação (`[OFICIAL]`, `[TESTADO]`, `[OPINIÃO]`, `[CONTROVERSO]`, `[ANTIGO]`, `[EUA]`)

### 7.2 Entregas recorrentes
- `relatorio-{{AAAA-MM}}.md` (H4)
- `testes.md` (registro de testes)
- `atualizacoes-marketing.md` (seção 8)

### 7.3 Módulo específico → `modulo-{{codigo}}-{{tema}}.md`
Ex.: `modulo-D7-queda-trafego.md`. Estrutura: situação → diagnóstico → plano → textos/código prontos → fontes.

### 7.4 Estilo
- Português do Brasil, linguagem simples, tópicos curtos
- Primeiro o que fazer, depois o porquê
- Valores em R$, dizendo se incluem impostos
- Sem promessas de resultado garantido

---

## 8. Registro de atualizações

Mantenha `atualizacoes-marketing.md`. Toda novidade encontrada no protocolo da seção 1 entra lá:

```
## {{AAAA-MM-DD}}
- Tema: (SEO, IA, e-mail, lei, e-commerce, pagamento...)
- O que mudou: ...
- Vale no Brasil? sim / não / não confirmado
- Fonte: URL (data) [marcação]
- Impacto: seção X deste guia / guia Y precisa ser revisado
- Ação: nenhuma / ajustar Z
```

**Mudanças já conhecidas para conferir** (ponto de partida; confirme o status atual):
- 2024–2026: Gmail, Yahoo e Microsoft endurecem as exigências para remetentes em massa (SPF/DKIM/DMARC, descadastro com um clique, taxa de spam baixa); aplicação mais rígida a partir do fim de 2025
- Jun/2025: Pix Automático lançado; Pix Parcelado previsto para 2026 (confirmar)
- 08/09/2025: Modo IA do Google em português no Brasil
- 2025–2026: estudos apontam queda relevante de CTR com AI Overviews e aumento de buscas sem clique `[TESTADO – majoritariamente EUA]`
- Jan/2026: Meta repassa impostos nos anúncios no Brasil; Google comunica que não aumentará preços
- 2026: ANPD transformada em agência reguladora (confirmar a lei e as competências)
- Mar/2026: ECA Digital em vigor; atualização principal do Google (março) com grande volatilidade
- Mai/2026: novo Guia do CONAR para influenciadores (vigência em junho)
- 2026: PL 2338/2023 (Marco Legal da IA) em análise na Câmara
- 2026: anúncios em assistentes de IA (ChatGPT) e no Modo IA do Google (Brasil previsto para o 4º tri/2026)

Quando uma mudança contradizer este guia ou os guias específicos, avise o usuário e sugira a atualização.

---

## 9. Checklist final

- [ ] Protocolo de pesquisa (seção 1) feito; dados com fonte, data e metodologia
- [ ] Dados divergentes explicados (sem misturar fontes)
- [ ] Estratégia ligada a margem, CAC, LTV e caixa (não a métricas de vaidade)
- [ ] Posicionamento e oferta definidos antes dos canais
- [ ] Mix de canais compatível com o orçamento e a capacidade da equipe
- [ ] Custo real das mídias (impostos) considerado
- [ ] Mensuração e UTMs definidas antes de escalar; triangulação dos números
- [ ] LGPD, CDC, Decreto do e-commerce, CONAR e ECA Digital respeitados
- [ ] E-mail com SPF/DKIM/DMARC e descadastro com um clique
- [ ] Conteúdo útil e original; IA com revisão humana e rotulagem quando exigida
- [ ] Contas e dados no nome da empresa; acessos seguros
- [ ] Toda ação em plataformas/sites depende de aprovação explícita
- [ ] Guias específicos consultados para cada canal
- [ ] Aprendizados registrados na base de conhecimento e em `atualizacoes-marketing.md`

## Conexões
- [[estrategia]] — os módulos A e B (diagnóstico, posicionamento, proposta de valor e marca) tratam do que o assunto estratégia define
- [[planejar-uma-campanha-de-marketing-de-conteudo]] — o módulo E trata de estratégia de conteúdo e se complementa com o método do livro
- [[guia-seo-brasil]] — o módulo D resume o SEO e remete ao guia de SEO para o detalhe
- [[estrategia-gbp-seo-local]] — os módulos D4 e K2 remetem ao guia de busca local
- [[guia-google-ads-brasil]] — a matriz de canais (C) remete ao guia de Google Ads
- [[guia-trafego-pago-meta-brasil]] — a matriz de canais (C) remete ao guia de Meta
- [[guia-social-media-brasil]] — a matriz de canais (C) remete ao guia de redes sociais
- [[calcular-o-roi-do-seo]] — o módulo H5 (unit economics e ROI) trata do cálculo de retorno em visão geral
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias diz quando abrir este guia e como ele se relaciona com os outros
- [[trafego]] — centralizador do assunto; este guia é pesquisa atual para o tema
- [[regra-trate-dados-pessoais-e-ia-com-governanca-no-marketing]] — nota derivada deste guia: Trate dados pessoais e IA com governança no marketing
- [[diagnosticar-o-negocio-e-calcular-unit-economics]] — nota derivada deste guia: Diagnosticar o negócio e calcular unit economics
- [[definir-estrategia-posicionamento-e-oferta-no-marketing-digital]] — nota derivada deste guia: Definir estratégia, posicionamento e oferta no marketing digital
- [[montar-o-plano-de-mensuracao-e-triangular-a-atribuicao]] — nota derivada deste guia: Montar o plano de mensuração e triangular a atribuição
- [[otimizar-conversao-de-site-loja-virtual-e-marketplaces]] — nota derivada deste guia: Otimizar conversão de site, loja virtual e marketplaces
- [[operar-o-marketing-digital-rituais-ferramentas-e-fornecedores]] — nota derivada deste guia: Operar o marketing digital: rituais, ferramentas e fornecedores
- [[planejar-datas-sazonais-e-reagir-a-queda-de-vendas]] — nota derivada deste guia: Planejar datas sazonais e reagir a queda de vendas
- [[escolher-o-mix-de-canais-e-orcar-o-marketing-digital]] — nota derivada deste guia: Escolher o mix de canais e orçar o marketing digital
- [[montar-crm-e-mail-whatsapp-e-automacoes-de-retencao]] — nota derivada deste guia: Montar CRM, e-mail, WhatsApp e automações de retenção
