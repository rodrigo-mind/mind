---
titulo: "Guia: Tráfego pago na Meta (Facebook, Instagram e WhatsApp) no Brasil"
tipo: guia
assunto: trafego
origem: fornecido-pelo-usuario
escopo: "Campanhas pagas na Meta: rastreamento (pixel e API de conversões), estrutura, criativos, WhatsApp, negócios locais, mensuração e problemas de conta (módulos A a H)"
revisao_do_guia: novembro/2026
processado_em: 2026-11-23
revisar_ate: 2027-02-23
status: pesquisa-atual
---

# Guia do Claude Code: Tráfego Pago na Meta (Facebook, Instagram e WhatsApp) – Brasil

> Manual de pesquisa e execução para o Claude Code planejar, auditar e otimizar campanhas pagas na Meta para empresas brasileiras.
> **Regra nº 1: a Meta muda o produto toda semana. Este guia diz O QUE pesquisar e COMO pensar. Antes de recomendar qualquer recurso, configuração ou regra, confirme na fonte atual.**
> Última revisão do guia: novembro/2026.

---

## Sumário

0. Como usar este guia
1. Protocolo de pesquisa atualizada (obrigatório)
2. Fontes por nível de confiança
3. Regras de conformidade e limites de atuação
4. Contexto brasileiro (impostos, pagamento, WhatsApp, sazonalidade)
5. Como a Meta entrega anúncios hoje (modelo mental)
6. Módulos
   - **A. Diagnóstico**: A1 Negócio e oferta · A2 Auditoria da conta · A3 Concorrência · A4 Público e mensagem
   - **B. Rastreamento e dados**: B1 Pixel + API de Conversões · B2 Conversões no WhatsApp · B3 Leads qualificados e CRM · B4 Atribuição e leitura dos números
   - **C. Campanhas**: C1 Objetivo e destino · C2 Estrutura · C3 Segmentação · C4 Orçamento e lances · C5 Advantage+ e automações
   - **D. Criativos**: D1 Estratégia criativa · D2 Produção com IA · D3 Testes · D4 Copy e oferta · D5 Página de destino e formulários
   - **E. WhatsApp e mensagens**: E1 Clique para o WhatsApp · E2 Atendimento e qualificação · E3 Mensagens de marketing · E4 Anúncios dentro do WhatsApp
   - **F. Negócios locais**: F1 Campanhas locais
   - **G. Mensuração e otimização**: G1 KPIs e diagnóstico · G2 Rotina de otimização · G3 Incrementalidade · G4 Relatórios · G5 ROI
   - **H. Conta, segurança e problemas**: H1 Portfólio e acessos · H2 Verificações · H3 Anúncios reprovados · H4 Contas restritas · H5 Contas invadidas · H6 Pagamentos
   - **I. IA e automação**: I1 Conectores de IA e Marketing API · I2 Regras automatizadas · I3 Relatórios automáticos
   - **J. Categorias reguladas**: J1 Política e temas sociais · J2 Apostas · J3 Saúde e estética · J4 Crédito, imóveis e emprego · J5 Menores, álcool e outros
7. Formato de entrega
8. Registro de atualizações
9. Checklist final

---

## 0. Como usar este guia

### 0.1 Variáveis da empresa

```
EMPRESA:          {{nome}}
SITE:             {{url}}  (plataforma: PHP próprio, WordPress, Shopify, Nuvemshop...)
SEGMENTO:         {{ex.: loja de peças, clínica, serviço local, e-commerce}}
ONDE VENDE:       {{site | WhatsApp | loja física | marketplace | ligação}}
ÁREA:             {{cidade + raio | estado | Brasil inteiro}}
OBJETIVO:         {{vendas | leads | visitas à loja | reconhecimento}}
TICKET MÉDIO:     {{R$}}
MARGEM:           {{% de margem de contribuição por venda}}
RECOMPRA/LTV:     {{compra 1x | recorrente; valor médio no ano}}
ORÇAMENTO/MÊS:    {{R$ — informar se já inclui impostos}}
PAGAMENTO META:   {{cartão (pós-pago) | Pix/boleto (pré-pago)}}
RASTREAMENTO:     {{Pixel? API de Conversões? GA4? CRM? nenhum}}
WHATSAPP:         {{app WhatsApp Business | API via parceiro | Cloud API}}
HISTÓRICO:        {{conta nova | conta antiga | já teve restrição/bloqueio}}
CATEGORIA REGULADA? {{saúde, apostas, crédito, imóveis, emprego, política, álcool... ou não}}
CONCORRENTES:     {{3 a 5 nomes ou páginas}}
```

Se faltar alguma variável, pergunte. Se não houver ninguém para responder, faça a melhor suposição e escreva qual foi. **Margem e ticket são obrigatórios para qualquer meta de custo.** Sem eles, entregue as metas como faixas e explique o que falta.

### 0.2 Modos de uso
- **Auditoria completa** (conta existente): A → B → C → D → G, e então entregue o relatório da seção 7.
- **Lançamento** (conta nova ou campanha nova): A1, A3, A4, B, C, D, E (se WhatsApp) e então o plano.
- **Problema específico:** direto ao módulo (conta bloqueada → H4; anúncio reprovado → H3; "o WhatsApp lota e ninguém compra" → E2 + G1).
- **Rotina semanal/mensal:** G1 + G2 + G4, mais o registro (seção 8).

---

## 1. Protocolo de pesquisa atualizada (obrigatório)

Faça isto **antes de cada módulo**:

1. **Pegue a data de hoje** (`date`) e use o ano atual nas buscas.
2. **Leia o registro** `atualizacoes-meta-ads.md` (seção 8), se existir.
3. **Busque novidades do tema nos últimos 60–90 dias**:
   - `site:jonloomer.com {{tema}}`
   - `site:ppc.land meta {{tema}}`
   - `site:socialmediaexaminer.com meta ads {{tema}}`
   - `site:developers.facebook.com/blog {{tema}}` (mudanças técnicas e de API)
   - `site:engineering.fb.com ads` (como o sistema funciona)
   - `site:about.fb.com/br {{tema}}` (anúncios da Meta para o Brasil)
   - Em português: `"Meta Ads" OR "Gerenciador de Anúncios" {{tema}} {{ano}}`
4. **Confirme na Central de Ajuda da Meta** se o recurso existe **e se está disponível no Brasil e na conta do usuário**. Recursos chegam em fases e por conta.
5. **Se a fonte atual contradizer este guia, a fonte atual vence.** Registre a mudança na seção 8.
6. **Marque cada informação:**
   - `[OFICIAL]` = Meta (Central de Ajuda, políticas, documentação, blog oficial)
   - `[TESTADO]` = teste ou estudo com dados e método
   - `[OPINIÃO]` = recomendação de especialista sem teste
   - `[ANTIGO]` = mais de 12 meses (em Meta, 1 ano já é muito)
   - `[EUA]` / `[FASE]` = recurso ainda não confirmado no Brasil ou liberado só para algumas contas
7. **Não invente números** (CPM, CPC, CPA "médio do mercado"). Benchmark só com URL + data + país. Sem isso, use os dados da própria conta.
8. **Números divulgados pela Meta** (ex.: "+X% conversões") são medições da própria empresa. Marque `[OFICIAL – autodeclarado]`.

---

## 2. Fontes por nível de confiança

### Nível 1: Oficial
- Central de Ajuda para Empresas: https://www.facebook.com/business/help
- Padrões de Publicidade: https://transparency.meta.com/pt-br/policies/ad-standards
- Anúncios sobre temas sociais, eleições ou política: https://transparency.meta.com/pt-br/policies/ad-standards/SIEP-advertising/SIEP/
- Biblioteca de Anúncios: https://www.facebook.com/ads/library/
- Meta Blueprint (cursos oficiais): https://www.facebookblueprint.com
- Documentação para desenvolvedores (Marketing API, API de Conversões, Pixel): https://developers.facebook.com/docs/marketing-apis
- API de Conversões para mensagens (WhatsApp/Messenger/Instagram): https://developers.facebook.com/docs/marketing-api/conversions-api/business-messaging
- Blog de desenvolvedores (mudanças de API e de métricas): https://developers.facebook.com/blog
- Engineering at Meta (Andromeda, GEM): https://engineering.fb.com
- Newsroom Brasil: https://about.fb.com/br/news/
- WhatsApp Business (produtos, preços, anúncios de clique para o WhatsApp): https://whatsappbusiness.com/pt-br/
- Preços da plataforma do WhatsApp: https://whatsappbusiness.com/pt-br/products/platform-pricing/

### Nível 2: Especialistas com método
- Jon Loomer (referência em Meta Ads; publica atualizações semanais): https://www.jonloomer.com
- Social Media Examiner: https://www.socialmediaexaminer.com

### Nível 3: Notícias do setor
- PPC Land: https://ppc.land
- Meio & Mensagem (mercado brasileiro): https://www.meioemensagem.com.br

### Brasil: legal e regulatório
- CONAR (autorregulamentação publicitária): http://www.conar.org.br
- ANPD (LGPD): https://www.gov.br/anpd
- TSE (propaganda eleitoral): https://www.tse.jus.br
- Secretaria de Prêmios e Apostas (bets): https://www.gov.br/fazenda/pt-br/composicao/orgaos/secretaria-de-premios-e-apostas
- Conselhos profissionais (CFM, CFO, CFF, CRMV, OAB etc.) e ANVISA, conforme o segmento

> Cuidado com cursos, "gurus" e posts de "hack". Muitos ensinam estruturas que funcionavam antes de 2024 (dezenas de conjuntos com interesses, "aquecer pixel", "conta contingência"). Trate como `[OPINIÃO]` e confronte com o Nível 1 e 2.

---

## 3. Regras de conformidade e limites de atuação

### 3.1 Nunca recomendar (marque `[RISCO DE BLOQUEIO]` se uma fonte sugerir)
- **Cloaking** (mostrar uma página para a revisão e outra para o usuário)
- **"Contingência"**: contas, perfis ou Portfólios comprados/alugados, ou criar contas novas para fugir de uma restrição (a Meta trata como burla e bloqueia tudo ligado)
- Uso de **celebridades, deepfakes** ou imagem de terceiros sem autorização
- Promessas de **resultado garantido** (saúde, emagrecimento, renda, investimento)
- Afirmar ou insinuar **atributos pessoais** do usuário ("Você está endividado?", "Sofre com ansiedade?")
- Antes/depois e alegações de saúde proibidas pela política ou pelo conselho profissional
- Notícia falsa, depoimento falso, falsa escassez, contagem regressiva falsa
- Coletar dados sensíveis em formulário sem necessidade e sem base legal (LGPD)
- Disparo em massa no WhatsApp para quem não deu permissão (opt-in)

### 3.2 Responsabilidade
- **O anunciante é responsável por todo o conteúdo, inclusive o gerado pelas ferramentas de IA da Meta.** Revise tudo que a IA criar antes de publicar. Confirme os termos atuais.
- **STF (art. 19 do Marco Civil):** desde 2025, as plataformas têm **presunção de responsabilidade** por conteúdo ilícito em **anúncios e impulsionamentos pagos** `[OFICIAL]`. Na prática, espere revisão mais rígida e mais reprovações em categorias sensíveis. O anunciante continua respondendo pelo que anuncia (CDC, CONAR).

### 3.3 Limites do Claude Code
- Por padrão, o Claude Code **não acessa** o Gerenciador de Anúncios. Ele pesquisa, analisa exportações/prints e **prepara** estruturas, textos, roteiros, códigos e checklists.
- Se o usuário conectar a conta (conector de IA da Meta ou Marketing API, ver I1):
  - comece **somente leitura**
  - **nunca** publique, pause, altere orçamento/lance ou crie campanha sem **autorização explícita a cada ação**
  - registre cada alteração (data, o quê, por quê) em `log-alteracoes.md`
- Casos jurídicos (processo, notificação de Procon/CONAR, crime): orientar a procurar um advogado.

---

## 4. Contexto brasileiro (aplicar em todos os módulos)

### 4.1 Impostos no anúncio (desde 1º/01/2026) `[OFICIAL]`
- A Meta passou a **repassar PIS/Cofins (9,25%) e ISS (2,9%)** no preço dos anúncios no Brasil.
- **Pós-pago (cartão):** os impostos vêm **por cima**. R$ 100 de anúncio = **R$ 113,83** cobrados.
- **Pré-pago (Pix/boleto):** os impostos saem **de dentro** do saldo. De R$ 100 depositados, cerca de R$ 87,85 viram mídia (100 ÷ 1,1383).
- **O Gerenciador de Anúncios mostra o gasto SEM impostos.** A nota fiscal mostra o total.
- A Meta orienta somar os impostos ao lance e ao limite de gastos no pós-pago.
- **Regra para todo cálculo deste guia:** `custo real = gasto do Gerenciador × 1,1383`
- Pesquise como a **reforma tributária (CBS/IBS)** está aparecendo nas notas e se a alíquota mudou.

### 4.2 Pagamento
- **Pré-pago acaba e a campanha para.** Configure alertas de saldo e uma recarga programada.
- **Falha de pagamento** no pós-pago é causa comum de restrição (ver H6).
- Conta da empresa paga com **cartão/conta da empresa (CNPJ)** sempre que possível.

### 4.3 WhatsApp é o centro
- Muitas vendas no Brasil começam no WhatsApp. Anúncios de **clique para o WhatsApp** são fortes no Brasil.
- **App WhatsApp Business x API (WhatsApp Business Platform):**
  - **App:** grátis, 1 número, poucos atendentes, **sem** envio de conversões para a Meta (sem otimização por venda)
  - **API (via parceiro/BSP ou Cloud API):** vários atendentes, CRM, automações, **API de Conversões** (otimização por lead qualificado/compra), cobrança por mensagem
- **Preços da API (pesquisar sempre, mudam a cada trimestre):** a cobrança é **por mensagem entregue**, por categoria (marketing, utilidade, autenticação, serviço). Pesquise também:
  - a janela gratuita de conversa após o clique em anúncio
  - a cobrança do **Meta Business Agent** (IA de atendimento lançada em 2026; terceiros relatam cobrança por tokens)
  - **Use somente a tabela oficial da Meta.** Calculadoras de parceiros são referência `[OPINIÃO]`.

### 4.4 Confiança (o brasileiro desconfia de golpe)
- A Meta processou anunciantes brasileiros por golpes com deepfake (2026), e o público está mais desconfiado.
- **Mostre sinais de empresa real:** CNPJ e endereço no site, avaliações do Google (ver guia de GBP), Reclame Aqui, rosto do dono/equipe, loja física, depoimentos reais.
- **Verificação de anunciante:** a Meta passou a exigir de forma gradual que anunciantes que atingem o Brasil informem e verifiquem **quem se beneficia e quem paga** pelos anúncios. Confira o status atual (H2).

### 4.5 Linguagem e oferta
- Português do Brasil, natural, regional quando fizer sentido (gírias e termos da região do público)
- Ofertas que pesam no Brasil: **parcelamento sem juros, desconto no Pix, frete grátis, entrega rápida, garantia, troca fácil**

### 4.6 Sazonalidade (CPM costuma subir em datas disputadas)
- Calendário a considerar: volta às aulas (jan/fev), Carnaval, Páscoa, Dia das Mães (maio), Dia dos Namorados (12/jun), festas juninas, Dia dos Pais (ago), Dia do Cliente (15/set), Dia das Crianças (12/out), **Black Friday (nov)**, 13º salário e Natal (nov/dez)
- Anos de eleição: mais disputa e regras extras (J1)
- Datas do segmento (ex.: início do inverno para peças de moto/carro, IPVA em jan–mar)
- **Pesquise as datas do ano atual** e planeje criativos com antecedência

### 4.7 LGPD
- Pixel/API de Conversões: política de privacidade no site informando o uso; banner de cookies/consentimento conforme orientação jurídica atual
- **Lista de clientes (público personalizado):** só com base legal adequada; informar na política de privacidade; nunca subir lista comprada
- Formulários: pedir só o necessário; texto de consentimento claro
- WhatsApp de marketing: só com **opt-in** e sempre com opção de sair

---

## 5. Como a Meta entrega anúncios hoje (modelo mental)

Confirme no protocolo da seção 1 se algo mudou. Em 2026, a lógica é esta:

- **Andromeda (recuperação):** escolhe, entre milhões de anúncios, quais podem disputar cada pessoa. Ela "lê" o **criativo** para decidir para quem ele serve. `[OFICIAL]`
- **GEM (classificação):** modelo grande que decide qual anúncio mostrar. `[OFICIAL]`
- **Consequências práticas** `[OPINIÃO consolidada entre especialistas]`:
  - **o criativo virou a principal segmentação**: conceitos diferentes alcançam pessoas diferentes
  - **a segmentação detalhada virou sugestão**: a Meta expande além dela quando acha melhor
  - **estruturas simples** (menos campanhas e conjuntos) aprendem mais rápido do que contas fragmentadas
  - **dados de conversão de qualidade** (B1–B3) são o combustível; sem eles, a IA otimiza para quem clica, não para quem compra
  - **mexer demais atrapalha**: alterações frequentes reiniciam o aprendizado
- **Advantage+ é o padrão** nas campanhas novas. Controles manuais além de certos limites podem desligar o "Advantage+" da campanha.
- **Visão contrária a registrar:** há especialistas que defendem começar com poucos anúncios e avaliar no conjunto, e não inundar a conta de variações. Apresente as duas visões e decida pelo volume de conversões e orçamento da conta.

---

## 6. Módulos

Cada módulo tem: **Objetivo · Pesquisar · Fazer · Entregar.**

---

### A. Diagnóstico

#### A1. Negócio, oferta e números (antes de qualquer campanha)
**Objetivo:** saber quanto se pode pagar por um cliente e se a oferta aguenta tráfego pago.

**Fazer:**
- **Margem de contribuição por venda** = preço − custo do produto − impostos da venda − taxas (cartão, marketplace, frete pago)
- **CPA máximo no Gerenciador** = margem de contribuição (R$) ÷ 1,1383
- **ROAS de equilíbrio no Gerenciador** = 1,1383 ÷ margem (%)
  - Exemplo: margem de 30% → ROAS mínimo ≈ 3,79 só para empatar
- **Negócio com recompra:** calcule também com o LTV de 6–12 meses e deixe claro qual meta usar
- **Leads/WhatsApp:** custo máximo por lead = CPA máximo × taxa de fechamento (lead → venda)
- **Avaliar a oferta:** é clara? tem motivo para agir agora? preço competitivo? prova social?
- **Se o ROAS de equilíbrio for inviável:** recomendar mexer na oferta (kit, ticket maior, recompra) antes de investir

**Entregar:** tabela de números (ticket, margem, CPA máximo, ROAS de equilíbrio, custo máximo por lead/conversa) + diagnóstico da oferta.

#### A2. Auditoria da conta
**Pesquisar:** nomes e locais atuais das telas (Portfólio empresarial / Business Manager, Qualidade da Conta, Gerenciador de Eventos).

**Pedir ao usuário:** prints ou exportação (CSV) dos últimos 90 dias por campanha, conjunto e anúncio, mais um print da Qualidade da Conta e do Gerenciador de Eventos.

**Analisar:**
- **Propriedade:** o Portfólio, a conta de anúncios, a Página, o Instagram, o Pixel/dataset e o WhatsApp estão no nome da **empresa**, ou da agência/freelancer?
- **Segurança:** 2+ administradores, verificação em duas etapas (H1)
- **Saúde:** restrições, anúncios reprovados, alertas na Qualidade da Conta
- **Rastreamento:** eventos ativos, duplicados, qualidade da correspondência (EMQ), API de Conversões ativa (B1)
- **Estrutura:** quantas campanhas/conjuntos ativos, fragmentação, orçamentos muito pequenos, conjuntos sempre em "aprendizado limitado"
- **Criativos:** quantos conceitos diferentes, idade dos anúncios, frequência, fadiga
- **Resultados:** custo real (× 1,1383) contra o CPA máximo do A1
- **Atribuição:** configuração usada e se os relatórios ainda pedem janelas descontinuadas (B4)

**Entregar:** tabela `Problema | Impacto | Correção | Esforço | Risco`.

#### A3. Concorrência (Biblioteca de Anúncios)
**Fazer:**
- Pesquisar os concorrentes e termos do segmento na **Biblioteca de Anúncios**, com país = Brasil
- **Anúncio ativo há muitas semanas = provável vencedor** (ninguém mantém anúncio que dá prejuízo)
- Anotar: formatos (vídeo, carrossel, imagem), ganchos dos 3 primeiros segundos, ofertas, CTA, destino (site, WhatsApp, formulário), quantas variações rodam
- Ver se usam rosto do dono, depoimento, demonstração, preço no anúncio
- Encontrar **lacunas**: ângulo que ninguém usa, objeção que ninguém responde

**Limite:** a Biblioteca não mostra resultados nem orçamento (exceto em anúncios políticos). Não invente desempenho.

**Entregar:** tabela `Concorrente | Anúncio (link) | Ativo desde | Formato | Gancho | Oferta | Destino` + 5 lacunas exploráveis.

#### A4. Público, dores e linguagem
**Objetivo:** gerar **ângulos criativos**. Como a segmentação é ampla, o público vira mensagem, não filtro.

**Fontes:**
- avaliações do Google, Reclame Aqui e marketplaces (da empresa e dos concorrentes)
- comentários nos posts e anúncios
- perguntas frequentes no WhatsApp (pedir ao usuário exemplos sem dados pessoais)
- vendedores/atendentes (o que o cliente pergunta antes de comprar)

**Fazer:**
- Mapear desejos, dores, objeções (preço, confiança, prazo, garantia), gatilhos de compra e **as palavras exatas** que o cliente usa
- Agrupar em 4–6 **segmentos de motivação** (ex.: "urgência: a moto parou", "economia", "qualidade/original", "quem compra para revender")
- Para cada segmento: promessa principal, prova, objeção a quebrar, formato ideal

**Entregar:** mapa de ângulos `Motivação | Dor | Palavras do cliente | Promessa | Prova | Formato`.

---

### B. Rastreamento e dados (fazer ANTES de escalar)

#### B1. Pixel + API de Conversões (site)
**Pesquisar:** opções atuais de configuração (integração nativa da plataforma, **API de Conversões em um clique**, Gateway, servidor próprio), eventos padrão e requisitos de desduplicação.

**Fazer:**
- Pixel no site + **API de Conversões** (navegador + servidor), com **desduplicação** (mesmo `event_name` + `event_id`)
- **Eventos mínimos:**
  - e-commerce: PageView, ViewContent, AddToCart, InitiateCheckout, Purchase (com `value` e `currency=BRL`)
  - leads: Lead + Contact (clique no WhatsApp/telefone)
- **Dados do cliente** (com hash, conforme a documentação): e-mail, telefone (com 55 + DDD), nome, cidade, CEP, `fbp`/`fbc`, IP e user agent
- Verificar o domínio no Portfólio
- **Conferir no Gerenciador de Eventos:** qualidade da correspondência (EMQ), atraso no envio, eventos duplicados, cobertura do servidor
- **Site em PHP próprio:** gerar o código de envio server-side (cURL para a Graph API) com `event_id` compartilhado com o Pixel. O token vai em `.env`, nunca no código público.
- LGPD: respeitar o consentimento do banner, se houver

**Entregar:** plano de eventos (tabela) + código pronto, quando aplicável + checklist de verificação.

#### B2. Conversões dentro do WhatsApp
**Pesquisar:** documentação atual da **API de Conversões para mensagens comerciais**, eventos aceitos, requisitos (WhatsApp Business Platform/API) e se a otimização por compra/lead qualificado está liberada.

**Fazer:**
- **Com o app comum:** não há envio de eventos. Medir manualmente (etiquetas + planilha) e otimizar por conversas.
- **Com a API (parceiro ou Cloud API):** enviar eventos das conversas para a Meta:
  - **Os nomes aceitos são diferentes dos do Pixel.** Integradores relatam o uso de `LeadSubmitted`, `QualifiedLead` e `Purchase` com `action_source = business_messaging`, e que `Lead` é recusado. **Confirme na documentação oficial atual.**
  - Disparar `QualifiedLead` quando o atendente qualificar e `Purchase` (com valor) quando fechar
- Verificar se o CRM/BSP do usuário já tem essa integração pronta (muitos têm)
- Depois de juntar eventos suficientes, testar otimização por lead qualificado/compra em vez de "conversas"

**Entregar:** recomendação app x API (custos e ganhos) + fluxo de eventos + quem configura.

#### B3. Leads qualificados, CRM e eventos offline
**Pesquisar:** recursos atuais para otimizar por qualidade de lead (leads de conversão para formulários, eventos em sequência/"sequenced events" para leads do site, eventos offline via API de Conversões).

**Fazer:**
- Todo lead com **origem** (campanha/anúncio via UTM ou ID do clique) gravada no CRM/planilha/sistema
- Definir estágios: novo → contatado → qualificado → venda (com valor)
- Enviar os estágios de volta para a Meta (API de Conversões / integração do CRM)
- **Sistema próprio (PHP/MySQL):** propor a tabela `leads` (origem, utm_*, fbclid, data, status, valor, data_venda) e o script que envia os eventos
- **Formulário instantâneo:** avaliar a opção de "maior intenção" e campos de qualificação; ligar ao CRM para retorno rápido

**Entregar:** desenho do funil de dados + estrutura de tabela/código, se for sistema próprio.

#### B4. Atribuição e leitura dos números
**Pesquisar (mudou muito em 2026):** a configuração padrão atual, os modelos de atribuição disponíveis e as janelas suportadas na API.

**O que se sabe (confirmar):**
- Em 12/01/2026, a Meta removeu as janelas de **7 e 28 dias de visualização** da API de Insights `[OFICIAL]`
- Ferramentas que pediam essas janelas passaram a receber **zero, sem erro**. Revise os conectores de relatório.
- Em março/2026, a atribuição por clique passou a exigir **clique no link**, e a "engage-through" substituiu a "engage-view" `[OFICIAL]`
- Algumas contas ganharam **atribuição personalizada** `[FASE]`

**Fazer:**
- Registrar a janela/modelo usado em cada relatório (comparar só igual com igual)
- **Fonte de verdade = vendas reais** (CRM/plataforma/caixa), não o número da Meta
- Comparar: resultados da Meta × GA4 × CRM. Explicar as diferenças, sem "escolher" a que agrada
- Calcular o **MER** (receita total ÷ investimento total em mídia, com impostos) como controle geral

**Entregar:** nota explicando como ler os números da conta + configuração recomendada dos relatórios.

---

### C. Campanhas

#### C1. Objetivo e local de conversão
**Pesquisar:** objetivos e locais de conversão disponíveis hoje e as metas de desempenho de cada um.

**Guia de decisão** (confirme se ainda vale):

| Situação | Objetivo | Local de conversão / meta |
|---|---|---|
| E-commerce com Pixel + API de Conversões funcionando | Vendas | Site, otimizando para compra (valor, se houver volume) |
| Venda acontece no WhatsApp, só app | Engajamento ou Vendas/Leads | Apps de mensagens → WhatsApp, otimizando para conversas |
| Venda no WhatsApp, API com eventos | Leads ou Vendas | WhatsApp, otimizando para lead qualificado/compra (B2) |
| Serviço com orçamento/visita | Leads | Formulário instantâneo (maior intenção) ou WhatsApp |
| Negócio local que fecha por telefone | Leads | Ligações |
| Marca nova, sem dados | Reconhecimento/Engajamento só se houver motivo; prefira já otimizar para a ação final | — |

- **Tráfego** quase nunca é a melhor escolha para vender: otimiza para cliques baratos
- **Impulsionar post** pelo Instagram é limitado; prefira o Gerenciador

**Entregar:** objetivo + local de conversão + meta de desempenho, com justificativa.

#### C2. Estrutura da conta
**Princípios** `[OPINIÃO consolidada; confirmar]`:
- **Poucas campanhas**, cada uma com um motivo real para existir: objetivo diferente, produto com margem muito diferente, região/país, ou teste controlado
- **Evitar** vários conjuntos com interesses diferentes, que agora alcançam as mesmas pessoas
- **Orçamento da campanha (Advantage campaign budget)** quando houver mais de um conjunto
- **Volume para aprender:** verifique a regra atual da fase de aprendizado (historicamente, ~50 eventos de otimização por semana por conjunto). Se o orçamento não permite, **suba no funil** (ex.: otimizar por iniciar checkout ou por lead) ou **consolide**.
- **Separar remarketing** só se houver motivo (a Meta já entrega para quem conhece a marca). Ver também as exclusões automáticas de clientes (C3).

**Estrutura inicial típica (adaptar):**
- **Campanha 1 – Principal:** 1 conjunto amplo (Advantage+), 4–8 conceitos criativos diferentes
- **Campanha 2 – Testes** (opcional, 10–20% do orçamento): novos conceitos; os vencedores migram para a principal
- **Campanha 3 – Local/WhatsApp** (se houver loja física ou atendimento regional)

**Entregar:** diagrama da estrutura com nomes padronizados. Exemplo: `[OBJ]_[PRODUTO]_[PUBLICO]_[DATA]` → `VENDAS_PECAS_AMPLO_2026-11`.

#### C3. Segmentação em 2026
**Pesquisar:** como a segmentação detalhada e as "sugestões de público" funcionam hoje; recursos como "Descreva seu público" (IA), regras de valor para públicos e exclusões automáticas de clientes.

**Fazer:**
- **Controles reais (restrições):** localização, idade mínima, idioma, exclusões. Use só quando for necessidade do negócio (ex.: entrega só na cidade, produto para maiores de 18).
- **Sugestões (a Meta pode ir além):** interesses, idade/gênero sugeridos, públicos semelhantes
- **Lista de clientes** (com base legal LGPD): como sinal e para excluir compradores recentes, quando fizer sentido
- **Regras de valor** (aumentar/diminuir lance para grupos de público): avaliar quando há diferença clara de valor entre clientes
- **Localização no Brasil:** atenção a "pessoas que moram ou estiveram recentemente" × "que estão viajando". Para negócio local, use raio ou lista de cidades/CEPs reais de atendimento.

**Entregar:** configuração recomendada + o que é restrição e o que é sugestão.

#### C4. Orçamento e lances
**Fazer:**
- **Orçamento mínimo coerente:** o orçamento diário do conjunto precisa permitir várias conversões por semana ao CPA esperado. Se não permitir, consolide ou suba no funil.
- **Distribuição inicial (exemplo):** 70–80% na campanha principal, 10–20% em testes, o restante em local/remarketing, se fizer sentido
- **Estratégias de lance:**
  - maior volume (padrão) para começar
  - **meta de custo por resultado** ou **meta de ROAS** quando houver histórico estável
  - **limite de lance** só para quem domina
- **Impostos:** todo orçamento e meta de custo deve considerar o fator 1,1383 (seção 4.1). No pós-pago, ajustar lance e limite diário.
- **Escalar:** aumentos graduais e espaçados, observando o custo real `[OPINIÃO]`; ou duplicar o vencedor em nova campanha. Pesquise a recomendação atual.
- **Pré-pago:** prever a recarga para nunca zerar (a pausa por falta de saldo derruba a entrega).

**Entregar:** plano de mídia mensal `Campanha | Objetivo | Orçamento/dia | Orçamento/mês (sem e com impostos) | Meta de custo`.

#### C5. Advantage+ e automações
**Pesquisar (muda todo mês):**
- tipos atuais de campanha Advantage+ (vendas, leads, app)
- **cada opção do Advantage+ criativo** (melhorias automáticas, imagem para vídeo, variações de texto, navegação por produtos, música, etc.)
- **opções de opt-out** e se a preferência fica salva
- termos que permitem à Meta fazer testes na entrega/criativos sem aviso prévio

**Fazer:**
- Revisar **cada melhoria automática de criativo** antes de ativar: algumas podem distorcer a marca ou gerar texto/imagem que viola política ou conselho profissional
- **Regra:** ativar o que não fere a marca nem a política; desativar o resto; documentar
- Posicionamentos **Advantage+** (automáticos) como padrão, com criativos nos formatos 9:16, 4:5 e 1:1 para cada posicionamento ficar bem
- Avaliar as recomendações da **pontuação de oportunidade**. **Não aceitar todas automaticamente**: cada uma passa pelo filtro "isso aumenta o lucro ou só o gasto?"

**Entregar:** tabela `Recurso Advantage+ | Ligar/Desligar | Motivo`.

---

### D. Criativos (a principal alavanca)

#### D1. Estratégia criativa
**Pesquisar:** recomendações atuais da Meta sobre diversidade criativa e especificações de formato.

**Fazer:**
- **Diversidade = conceitos diferentes**, não variações de cor/título. Cada conceito com ângulo (A4), formato e "personagem" diferentes.
- **Tipos de conceito:**
  - demonstração do produto/serviço
  - depoimento real de cliente
  - dono/especialista falando para a câmera
  - bastidores
  - comparação (sem citar concorrente de forma ilegal)
  - problema → solução
  - oferta direta
  - "unboxing"
  - perguntas frequentes
  - estilo UGC (conteúdo de cliente)
- **Formatos:** Reels/Stories 9:16 (prioridade), Feed 4:5, carrossel, imagem estática simples. Respeite as áreas seguras (texto fora das bordas).
- **Vídeo:**
  - gancho nos 3 primeiros segundos
  - legenda embutida (muita gente assiste sem som)
  - 15–30s para conversão, com variações curtas
  - CTA falado e escrito
- **Brasil:** gente real, sotaque e cenário locais, linguagem do cliente, preço/parcelamento quando ajudar
- **Volume:** defina a quantidade pelo orçamento. Contas pequenas: poucos conceitos fortes; contas maiores: renovação constante.
- **Fadiga:** acompanhar frequência, CTR e custo por anúncio ao longo do tempo; repor conceitos antes de cair

**Entregar:** 5–8 conceitos com: ângulo, formato, roteiro (vídeo) ou layout (imagem), texto principal, título, CTA.

#### D2. Produção com IA (ferramentas da Meta e externas)
**Pesquisar:** ferramentas de IA generativa disponíveis hoje no Gerenciador e no Meta Business Suite; agentes de IA da Meta (há relatos de novos agentes integrados ao Gerenciador em 2026); regras de rotulagem de conteúdo de IA.

**Fazer:**
- Usar IA para: variações de texto, redimensionamento, fundos, imagem → vídeo, legendas, tradução
- **Revisar 100%**: erros de português, promessas indevidas, produto deformado, mãos/rostos estranhos
- **Nunca:** pessoa real gerada por IA passando por cliente real, deepfake, imagem de celebridade
- Rotular conteúdo de IA quando a política ou a lei exigir (obrigatório em anúncios políticos; ver J1)

**Entregar:** lista do que gerar com IA + checklist de revisão.

#### D3. Testes criativos
**Pesquisar:** recursos atuais de teste (Teste A/B nativo, "direcionar entrega para este anúncio"/"Push delivery to this ad", relatórios de agrupamento de anúncios).

**Fazer:**
- **Uma hipótese por teste** (ex.: "depoimento converte melhor que demonstração")
- Testar **conceitos**, não detalhes
- **Critério definido antes:** gasto mínimo por anúncio (ex.: 1–2× o CPA alvo) ou número mínimo de conversões
- Avaliar **no conjunto** e no custo real, não só no CTR
- **Vencedor** vai para a campanha principal; **perdedor** é documentado (para não repetir)
- Manter `biblioteca-criativos.md`: conceito, hipótese, período, gasto, resultado, aprendizado

**Entregar:** plano de testes do mês + modelo da biblioteca.

#### D4. Copy e oferta
**Fazer:**
- **Texto principal:** primeira linha forte (aparece antes do "ver mais"), benefício claro, prova, oferta, CTA
- **Título:** a promessa ou a oferta em poucas palavras
- **Gatilhos brasileiros:** parcelamento, desconto no Pix, frete grátis/rápido, garantia, "loja em [cidade] desde [ano]", avaliação do Google
- **Evitar reprovação:**
  - sem atributos pessoais ("você que está…")
  - sem promessa de resultado
  - sem "clique aqui" enganoso
  - sem excesso de caixa alta/emoji
- **Coerência:** o que o anúncio promete tem que estar na página/no atendimento (senão o CPA explode e a Meta pode penalizar)

**Entregar:** 3 textos principais, 5 títulos e 3 CTAs por conceito.

#### D5. Página de destino e formulários
**Fazer:**
- **Página:**
  - carrega rápido no celular
  - mesma promessa do anúncio
  - preço/oferta visível
  - prova social
  - CNPJ/endereço
  - botão de WhatsApp
  - checkout simples
- **Mensuração:** Pixel + API de Conversões funcionando (B1); UTMs nos links do anúncio:
  `utm_source=meta&utm_medium=paid&utm_campaign={{campaign.name}}&utm_content={{ad.name}}`
  (confirme os parâmetros dinâmicos atuais)
- **Formulário instantâneo:**
  - poucos campos
  - pergunta de qualificação
  - opção de maior intenção
  - texto LGPD
  - integração imediata com CRM/WhatsApp (velocidade de contato importa)
- **Site PHP próprio:** sugerir melhorias de velocidade e o código de eventos/UTM

**Entregar:** checklist da página + lista de correções priorizadas.

---

### E. WhatsApp e mensagens

#### E1. Campanhas de clique para o WhatsApp
**Pesquisar:** configuração atual (objetivos que aceitam WhatsApp, mensagem pré-preenchida, perguntas frequentes/"ice breakers", número conectado), otimizações disponíveis e se a janela gratuita após o clique mudou.

**Fazer:**
- Conectar o número correto à Página/conta (app ou API)
- **Mensagem pré-preenchida** que identifica a campanha (ex.: "Olá! Vi o anúncio do kit relação") → facilita a medição manual
- **Saudação automática** + 3–4 perguntas frequentes como botões
- Otimizar por conversas → lead qualificado/compra quando houver eventos (B2)
- Horário de veiculação alinhado ao horário de atendimento, se o atendimento for humano e limitado `[OPINIÃO]`; com IA/atendimento 24h, rodar o dia todo

**Entregar:** configuração completa + textos da saudação e das perguntas frequentes.

#### E2. Atendimento, qualificação e fechamento
**Objetivo:** a maioria das contas "com WhatsApp cheio e pouca venda" tem problema no atendimento, não no anúncio.

**Fazer:**
- **Medir:** tempo da primeira resposta, % de conversas respondidas, % que viram orçamento, % que fecham
- **Roteiro:** saudação → entender a necessidade (2–3 perguntas) → oferta clara com preço → quebra de objeção → fechamento (link de pagamento/Pix) → pós-venda
- **Follow-up** de quem não respondeu (dentro das regras do WhatsApp e com respeito)
- **Etiquetas** no WhatsApp Business: origem (anúncio X), estágio, venda
- **Meta Business Agent / IA de atendimento:** pesquise disponibilidade, custo e integração atuais. Recomendar só com transferência para humano e revisão das respostas.

**Entregar:** roteiro de atendimento + modelo de mensagens + painel simples de métricas do atendimento.

#### E3. Mensagens de marketing no WhatsApp (remarketing por mensagem)
**Pesquisar:** regras e preços atuais das mensagens de marketing (modelos aprovados), limites por usuário e a API de mensagens de marketing com otimização.

**Fazer:**
- Só para contatos com **opt-in**, sempre com opção de sair
- Uso: recuperação de carrinho/orçamento, lançamento, oferta sazonal, pós-venda
- Calcular o custo por mensagem × taxa de conversão antes de escalar
- Frequência baixa e conteúdo relevante (bloqueios e denúncias derrubam a qualidade do número)

**Entregar:** calendário de mensagens + modelos para aprovação + cálculo de custo.

#### E4. Anúncios dentro do WhatsApp (Status/Canais)
**Pesquisar:** disponibilidade atual no Brasil, formatos, compra (pelo Gerenciador?) e resultados reportados.

**Fazer:** se disponível, testar com orçamento controlado como campanha separada e comparar o custo por conversa/lead com o Facebook/Instagram.

**Entregar:** recomendação testar/não testar + configuração.

---

### F. Negócios locais

#### F1. Campanhas para negócio local
**Fazer:**
- **Localização:** raio real de atendimento ou lista de bairros/cidades; excluir onde não entrega
- **Destino:** WhatsApp, ligação ou rota para a loja (confirme os recursos atuais de "visitas à loja"/locais)
- **Criativo local:** fachada, equipe, cidade/bairro no texto e no vídeo, sotaque local
- **Integração com o Perfil da Empresa no Google** (ver `estrategia-gbp-seo-local.md`): mesmas ofertas, mesma identidade, avaliações do Google como prova no anúncio
- **Medição de venda na loja:** pergunta "como nos conheceu?", cupom exclusivo do anúncio, eventos offline (B3)
- **Orçamento pequeno:** uma campanha, um conjunto, poucos conceitos fortes

**Entregar:** campanha local configurada + kit criativo local + método de medição na loja.

---

### G. Mensuração e otimização

#### G1. KPIs e árvore de diagnóstico
**Indicadores (sempre com custo real × 1,1383):**
- **Topo:** CPM, alcance, frequência, taxa de retenção do vídeo (3s, ThruPlay)
- **Meio:** CTR (link), CPC (link), taxa de conversão da página, custo por conversa iniciada, taxa de resposta no WhatsApp
- **Fundo:** custo por lead qualificado, CPA, ROAS, ticket médio
- **Negócio:** vendas reais atribuídas, MER, lucro

**Árvore de diagnóstico:**
- **CPM alto** → época disputada (4.6), criativo de baixa qualidade, público restrito demais, categoria disputada
- **CPM ok, CTR baixo** → gancho/criativo fraco, oferta pouco clara
- **CTR bom, pouca conversão no site** → página lenta, promessa diferente, preço, checkout, rastreamento quebrado (testar o evento!)
- **Muitas conversas, poucas vendas** → atendimento (E2), qualificação, oferta, ou otimização por conversa atraindo curiosos (passar para lead qualificado, B2)
- **Bom e depois cai** → fadiga criativa, saturação, mudanças demais, sazonalidade
- **Números da Meta ≠ vendas reais** → atribuição (B4), duplicação de eventos, eventos de baixa qualidade

**Entregar:** painel de KPIs com metas (do A1) + diagnóstico pela árvore.

#### G2. Rotina de otimização
- **Diário (5 min):** só ver se algo quebrou (gasto sem resultado, anúncio reprovado, saldo, evento parado). **Não otimizar todo dia.**
- **Semanal:**
  - custo real × meta
  - criativos: pausar os claramente ruins depois do gasto mínimo; subir conceitos novos
  - checar fadiga
- **Mensal:**
  - relatório (G4)
  - revisão de estrutura
  - aprendizados na biblioteca de criativos
  - atualização do registro (seção 8)
- **Respeite o aprendizado:** agrupe as alterações; evite mudanças grandes antes de ~1 semana ou do volume mínimo de conversões, exceto se algo estiver quebrado

**Entregar:** checklist diário/semanal/mensal.

#### G3. Incrementalidade (o anúncio realmente gera venda a mais?)
**Pesquisar:** testes de lift disponíveis na conta (lift de conversão, testes de geo) e requisitos mínimos.

**Fazer:**
- Se a conta tiver acesso: teste de lift oficial
- **Alternativa simples:** teste geográfico (pausar em uma cidade/região comparável por 2–4 semanas e comparar as vendas totais), com cuidado com a sazonalidade
- Documentar o método e o resultado; usar para calibrar a confiança no número da Meta

**Entregar:** desenho do teste + leitura do resultado.

#### G4. Relatórios e dashboards
**Fazer:**
- **Relatório mensal de 1 página:**
  - investimento (com e sem impostos)
  - resultados da Meta
  - vendas reais
  - CPA/ROAS real × meta
  - top 3 criativos
  - aprendizados
  - próximos passos
- **Fontes:** exportação do Gerenciador, Marketing API (I3), CRM, GA4
- **Ferramentas:** Looker Studio, planilha ou página PHP própria. Conferir se o conector **não usa janelas descontinuadas** (B4).
- Comparar com o mês anterior e com o mesmo mês do ano anterior (sazonalidade)

**Entregar:** modelo de relatório + estrutura do dashboard.

#### G5. ROI e desempenho comercial
**Fazer:**
- **Custo total:** mídia × 1,1383 + ferramentas (CRM, BSP, mensagens do WhatsApp, IA) + produção de criativo + gestão
- **Receita atribuída** pela fonte de verdade (CRM/vendas)
- **ROI** = (lucro bruto atribuído − custo total) ÷ custo total
- Com recompra: ROI em 90/180 dias usando o LTV
- Quando faltar dado: estimativa com **premissas explícitas** + o que medir para virar dado real

**Entregar:** cálculo de ROI + recomendação (escalar, manter, ajustar oferta, pausar).

---

### H. Conta, segurança e problemas

#### H1. Portfólio empresarial (Business Manager) e acessos
**Pesquisar:** nomes e papéis atuais (Portfólio empresarial, Central de Contas, acesso de parceiros).

**Fazer:**
- **A empresa é dona de tudo:** Portfólio, conta de anúncios, Página, Instagram, Pixel/dataset, catálogo, número de WhatsApp
- **Agência/freelancer:** entra como **parceiro**, nunca como dono
- **Pelo menos 2 administradores** de confiança, todos com **verificação em duas etapas**
- Remover ex-funcionários/ex-agências; revisar acessos a cada 3 meses
- E-mail do Portfólio = e-mail corporativo ativo

**Entregar:** tabela de ativos e acessos (atual × recomendado) + checklist de segurança.

#### H2. Verificações (empresa, anunciante, identidade)
**Pesquisar:** requisitos atuais de verificação no Brasil:
- verificação da empresa (CNPJ e documentos)
- verificação de anunciante: **quem se beneficia/quem paga**, exigida de forma gradual para anúncios que atingem o Brasil
- verificação de identidade de administradores
- autorização para anúncios políticos/temas sociais (J1)

**Fazer:**
- Preparar os documentos: Cartão CNPJ, contrato social, comprovante de endereço da empresa, documento do responsável, site com os mesmos dados
- **Nome, endereço e CNPJ idênticos** em todos os lugares
- Fazer a verificação **antes** de escalar (contas verificadas tendem a ter menos atrito) `[OPINIÃO]`

**Entregar:** checklist de documentos + passo a passo atual.

#### H3. Anúncios reprovados
**Fazer:**
1. Ler **qual política** foi citada na reprovação
2. Comparar o anúncio (texto, imagem, vídeo, **página de destino**) com a política
3. **Se violou:** corrigir e editar (não criar dezenas de cópias, que aumentam o risco na conta)
4. **Se não violou:** pedir nova análise com explicação curta
5. **Motivos comuns no Brasil:**
   - atributos pessoais
   - saúde/estética
   - promessa de renda
   - antes/depois
   - página com problema (sem política de privacidade, sem dados da empresa, pop-ups)
   - uso de marca de terceiros
6. Registrar o padrão para não repetir

**Entregar:** diagnóstico da reprovação + versão corrigida + texto do pedido de revisão.

#### H4. Contas restritas ou bloqueadas
**Pesquisar (sempre, muda muito):** o processo atual de contestação na **Qualidade da Conta**, os tipos de restrição (conta de anúncios, perfil, Portfólio, Página), as exigências de verificação de identidade e relatos recentes de ondas de bloqueio automático.

**Fazer:**
1. **Identificar exatamente o que está restrito** (perfil pessoal, conta de anúncios, Portfólio, Página) e o motivo informado
2. **Mapear as causas prováveis:**
   - falha de pagamento
   - violações acumuladas
   - login suspeito/invasão
   - verificação pendente
   - ativo ligado a contas restritas
   - burla (contas novas para contornar)
3. **Corrigir a causa** (pagamento, segurança, anúncios) antes de contestar
4. **Contestar pelo canal oficial**, uma vez, com informações claras; guardar prints e datas
5. **Nunca** comprar/alugar contas ou criar Portfólios novos para "fugir": isso transforma um problema resolvível em bloqueio permanente
6. Se houver suporte da Meta (chat para anunciantes, gerente de conta), usar com o caso documentado
7. **Prevenção:** H1, H2, H3 e H6 em dia

**Entregar:** diagnóstico + plano de contestação + texto do recurso + plano de prevenção.

#### H5. Contas invadidas (hackeadas)
**Pesquisar:** o fluxo oficial atual de recuperação de contas invadidas (Facebook/Instagram/Central de Contas).

**Fazer:**
1. Recuperar o perfil/conta pelo fluxo oficial
2. Remover administradores e parceiros desconhecidos do Portfólio
3. Verificar anúncios, cobranças e métodos de pagamento estranhos; avisar o banco/cartão
4. Trocar as senhas, ativar a verificação em duas etapas e revisar os e-mails ligados
5. Documentar tudo (pode ser necessário em contestações)

**Entregar:** passo a passo de emergência + checklist pós-recuperação.

#### H6. Pagamentos e faturamento
**Fazer:**
- **Pós-pago:** cartão com limite folgado; acompanhar o limite de cobrança automático; evitar recusas (geram restrição)
- **Pré-pago:** recarga antes de acabar; alertas
- **Notas fiscais:** onde baixar; conferir se os impostos (4.1) estão corretos
- **Orçamento interno** sempre com impostos

**Entregar:** checklist financeiro + alerta de saldo/limite.

---

### I. IA e automação

#### I1. Conectores de IA da Meta e Marketing API (Claude Code com acesso à conta)
**Pesquisar (obrigatório):**
- se existe **conector oficial da Meta para ferramentas de IA** (há relatos de conectores de IA e de uso com Claude em 2026), como configurar, permissões e riscos
- **Marketing API:** níveis de acesso atuais, permissões, versão da Graph API, limites de taxa
- mudanças recentes na API de Insights (B4)

**Regras:**
- Credenciais/tokens em `.env`, fora do código e de repositórios públicos; tokens com o **mínimo de permissão**
- **Fase 1:** somente leitura (relatórios, diagnóstico)
- **Fase 2 (opcional):** escrita, com aprovação explícita **a cada ação** e registro em `log-alteracoes.md`
- **Nunca** automatizar aumento de orçamento sem um teto definido pelo usuário

**Entregar:** viabilidade + passo a passo de acesso + script inicial de leitura (ex.: Python ou PHP).

#### I2. Regras automatizadas no Gerenciador
- Prefira **regras de alerta** (notificação) a regras que pausam/alteram sozinhas
- **Exemplos:**
  - "gasto > 2× CPA alvo e 0 conversões → avisar"
  - "frequência > X em 7 dias → avisar"
  - "saldo pré-pago < R$ Y → avisar"
- Revisar as regras todo mês

**Entregar:** lista de regras com condições e ações.

#### I3. Relatórios automáticos
- Script semanal que puxa os dados (API ou export), aplica o fator de impostos, cruza com as vendas (CRM) e gera o relatório (G4)
- Usar **só** janelas/modelos de atribuição suportados
- Saída: Markdown/HTML/planilha + alertas de anomalia (queda de conversões, evento parado, CPM fora da curva)

**Entregar:** script + modelo de saída + instruções de agendamento (cron).

---

### J. Categorias reguladas

> Em qualquer categoria abaixo: **pesquisar a política da Meta + a lei/norma brasileira atual** antes de criar qualquer anúncio. Na dúvida, recomendar revisão jurídica.

#### J1. Política, eleições e temas sociais
- Anúncios sobre temas sociais, eleições ou política no Brasil exigem **autorização** (identidade, CPF, endereço no Brasil) e rótulo **"Pago por"/"Propaganda Eleitoral"** `[OFICIAL]`
- **Ficam na Biblioteca de Anúncios por 7 anos** `[OFICIAL]`
- **Eleições 2026:**
  - a Meta proibiu anúncios políticos no WhatsApp
  - em 15/10/2026, o TSE determinou que só anunciantes autorizados (candidatos, partidos, federações, coligações) veiculassem propaganda eleitoral
  - houve suspensão desses anúncios no período de silêncio eleitoral
- **"Tema social" é amplo:** campanhas de empresas sobre meio ambiente, direitos, economia etc. podem cair na categoria. Verificar antes.
- Conteúdo de IA em anúncio político: **rotulagem obrigatória** (regras do TSE e da Meta)
- **Próximas eleições:** pesquisar as resoluções novas do TSE e o plano da Meta para o pleito

#### J2. Apostas (bets)
- Só operadores **autorizados pela SPA/Ministério da Fazenda**; conferir a lista oficial atual
- **Desde 17/07/2026:** toda publicidade de apostas deve trazer uma das advertências oficiais `[OFICIAL]`:
  - "Ministério da Fazenda adverte: Apostar pode causar dependência"
  - "Ministério da Fazenda adverte: Apostar faz você perder dinheiro"
  - "Ministério da Fazenda adverte: Aposta não é investimento"
- **Proibido:**
  - promessa de ganho fácil
  - publicidade de bets não autorizadas
  - mirar menores (as redes devem bloquear esse conteúdo para menores de 18)
- **Normas:** Portaria SPA/MF nº 1.964/2026 e Portaria Interministerial MF/SECOM/MJSP nº 73/2026, além das regras e da autorização prévia da Meta para jogos de azar

#### J3. Saúde, estética, suplementos e medicamentos
- **Conselhos profissionais** (CFM, CFO, CFF, CREFITO, CRN etc.) têm regras próprias de publicidade. Pesquisar a resolução vigente do conselho do cliente (ex.: regras de publicidade médica do CFM).
- **ANVISA:** medicamentos, suplementos, cosméticos com alegações
- **Meta:** sem atributos pessoais, sem antes/depois proibido, sem promessa de resultado, restrições de idade
- **Deepfakes de médicos** foram alvo de processos da Meta no Brasil: **jamais** usar imagem de profissional sem autorização

#### J4. Crédito, serviços financeiros, imóveis e emprego
- **Pesquisar:** se a Meta exige **categoria especial de anúncio** para essas áreas no Brasil (limita idade, gênero, CEP e segmentação detalhada)
- Crédito/financeiro: informações obrigatórias (CET, taxas), sem promessas enganosas; atenção a golpes com o nome de instituições/governo (comuns no Brasil)
- Emprego: sem discriminação (idade, gênero, etc.)

#### J5. Menores, álcool e outros
- **ECA Digital (Lei nº 15.211/2025):** pesquisar as regras atuais de publicidade e perfilamento envolvendo crianças e adolescentes
- **Álcool:** idade mínima, regras do CONAR e da Meta
- **Outros com restrição** (pesquisar caso a caso): armas, tabaco/vape, cripto, produtos adultos, encontros

---

## 7. Formato de entrega

### 7.1 Auditoria/plano completo → `relatorio-meta-ads.md`
1. **Diagnóstico Executivo:** até 5 gargalos em Oferta/Números, Rastreamento, Estrutura, Criativos e Atendimento (impacto + por quê, em 1 linha)
2. **Números do negócio:** ticket, margem, CPA máximo, ROAS de equilíbrio, custo máximo por lead/conversa (todos com o fator de impostos)
3. **Alertas de conformidade e risco de conta:** políticas, categoria regulada, propriedade dos ativos, segurança, pagamento
4. **Status do rastreamento:** Pixel, API de Conversões, WhatsApp, CRM (✅/⚠️/❌) + correções
5. **Plano de Ação em 3 Fases:**
   - **Fase 1 – Semana 1 (Base):** acessos e segurança, verificação, rastreamento (B1–B3), números (A1), correções de página
   - **Fase 2 – Mês 1 (Estrutura + Criativos):** estrutura simplificada (C2), configuração (C1–C5), 5–8 conceitos (D1), WhatsApp (E1–E2), plano de testes (D3)
   - **Fase 3 – Contínuo:** rotina (G2), renovação criativa, relatórios (G4), ROI (G5), registro de atualizações
6. **Plano de mídia:** campanhas, orçamentos (sem e com impostos), metas de custo
7. **Kit Criativo Copy-Paste:**
   - 5 conceitos com roteiro de vídeo (15–30s) ou layout
   - 3 textos principais + 5 títulos por conceito
   - textos sem violação de política (checados contra a seção 3 e J)
8. **Kit WhatsApp:**
   - mensagem pré-preenchida
   - saudação + 4 perguntas frequentes
   - roteiro de qualificação/fechamento
   - 2 modelos de follow-up com opt-out
9. **Painel de KPIs** com metas
10. **Fontes:** URLs com data e marcação (`[OFICIAL]`, `[TESTADO]`, `[OPINIÃO]`, `[ANTIGO]`, `[EUA]`/`[FASE]`)

### 7.2 Módulo específico → `modulo-{{codigo}}-{{tema}}.md`
Ex.: `modulo-H4-conta-restrita.md`. Estrutura: situação → causa provável → passo a passo → textos/código prontos → fontes.

### 7.3 Estilo
- Português do Brasil, linguagem simples, tópicos curtos
- Primeiro o que fazer, depois o porquê
- Todo texto para anúncio/cliente pronto para copiar
- Valores em R$, sempre dizendo se incluem impostos

---

## 8. Registro de atualizações

Mantenha `atualizacoes-meta-ads.md`. Toda novidade encontrada no protocolo da seção 1 entra lá:

```
## {{AAAA-MM-DD}}
- O que mudou: ...
- Disponível no Brasil / na conta? sim / não / em fases / não confirmado
- Fonte: URL (data) [marcação]
- Impacto neste guia: seção X precisa ser revisada
- Ação na conta: nenhuma / revisar configuração Y
```

**Mudanças já conhecidas para conferir** (ponto de partida; confirme o status atual):
- 01/01/2026: repasse de PIS/Cofins + ISS nos anúncios no Brasil; CBS/IBS nas notas
- 12/01/2026: fim das janelas de 7 e 28 dias de visualização na API de Insights
- Mar/2026: atribuição por clique exige clique no link; "engage-through" no lugar de "engage-view"
- Mar–out/2026: mudanças no Advantage+ criativo (opt-out salvo; novos recursos de IA; possíveis testes da Meta sem aviso)
- Jun/2026: lançamento do Meta Business Agent (WhatsApp, Messenger, Instagram)
- Jul/2026: novas regras de publicidade de apostas (advertências obrigatórias desde 17/07)
- Out/2026: exclusões automáticas de clientes; nova geração do Andromeda; determinação do TSE sobre anúncios eleitorais
- Out/2026: mudança de preços das mensagens de serviço da API do WhatsApp

Quando uma mudança contradizer este guia, avise o usuário e sugira a atualização da seção.

---

## 9. Checklist final

- [ ] Protocolo de pesquisa (seção 1) feito para cada módulo usado
- [ ] Recursos confirmados como disponíveis no Brasil/na conta (ou marcados `[EUA]`/`[FASE]`)
- [ ] Números do negócio calculados com o fator de impostos (1,1383)
- [ ] Nenhuma recomendação de cloaking, contingência, deepfake, atributo pessoal ou promessa de resultado
- [ ] Categoria regulada verificada (Meta + lei brasileira + conselho)
- [ ] Ativos no nome da empresa; acessos e segurança revisados
- [ ] Rastreamento validado antes de escalar
- [ ] Criativos com conceitos realmente diferentes; textos checados contra as políticas
- [ ] LGPD respeitada (lista de clientes, formulários, WhatsApp com opt-in/opt-out)
- [ ] Toda ação na conta depende de aprovação explícita do usuário
- [ ] Benchmarks só com fonte, data e país; números da Meta marcados como autodeclarados
- [ ] Novidades registradas em `atualizacoes-meta-ads.md`

## Conexões
- [[configurar-conversoes-de-seo-e-valor-por-acao]] — o módulo B (pixel, API de conversões e WhatsApp) trata de conversões, que o framework de SEO também exige
- [[guia-social-media-brasil]] — o orgânico das redes e o anúncio de parceria ficam no guia de social media
- [[guia-google-ads-brasil]] — o guia de Google Ads cobre o outro grande canal de anúncios
- [[estrategia-gbp-seo-local]] — as campanhas locais (módulo F) combinam com o perfil local
- [[developer]] — pixel e API de conversões são implementados pela área de desenvolvimento
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias diz quando abrir este guia e como ele se relaciona com os outros
- [[trafego]] — centralizador do assunto; este guia é pesquisa atual para o tema
- [[guia-marketing-digital-brasil]] — a matriz de canais (C) remete ao guia de Meta
- [[como-a-meta-entrega-anuncios-e-aplicar-o-fator-de-impostos]] — nota derivada deste guia: Como a Meta entrega anúncios e como aplicar o fator de impostos
- [[rodar-campanhas-de-whatsapp-e-de-negocio-local-na-meta]] — nota derivada deste guia: Rodar campanhas de WhatsApp e de negócio local na Meta
- [[configurar-pixel-api-de-conversoes-e-eventos-de-whatsapp-na-meta]] — nota derivada deste guia: Configurar Pixel, API de Conversões e eventos de WhatsApp na Meta
- [[diagnosticar-e-otimizar-campanhas-da-meta-e-cuidar-da-conta]] — nota derivada deste guia: Diagnosticar e otimizar campanhas da Meta e cuidar da conta
- [[calcular-os-limites-de-custo-de-uma-campanha-de-anuncios]] — nota derivada deste guia: Calcular os limites de custo de uma campanha de anúncios
- [[criar-e-testar-criativos-de-anuncios-na-meta]] — nota derivada deste guia: Criar e testar criativos de anúncios na Meta
- [[anunciar-em-categorias-reguladas-na-meta]] — nota derivada deste guia: Anunciar em categorias reguladas na Meta
- [[escolher-objetivo-estruturar-e-orcar-campanhas-na-meta]] — nota derivada deste guia: Escolher objetivo, estruturar e orçar campanhas na Meta
