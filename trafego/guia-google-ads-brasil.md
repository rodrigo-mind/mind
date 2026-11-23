---
titulo: "Guia: Google Ads no Brasil"
tipo: guia
assunto: trafego
origem: fornecido-pelo-usuario
escopo: "Planejamento, auditoria e otimização de campanhas no Google Ads (Pesquisa, Performance Max, Shopping, YouTube, Demand Gen e Local), com mensuração, busca com IA, conta e categorias reguladas (módulos A a I)"
revisao_do_guia: novembro/2026
processado_em: 2026-11-23
revisar_ate: 2027-02-23
status: pesquisa-atual
---

# Guia do Claude Code: Google Ads – Brasil

> Manual de pesquisa e execução para o Claude Code planejar, auditar e otimizar campanhas no Google Ads (Pesquisa, Performance Max, Shopping, YouTube, Demand Gen e Local) para empresas brasileiras.
> **Regra nº 1: o Google Ads muda toda semana, e a automação por IA está substituindo controles manuais. Este guia diz O QUE pesquisar e COMO pensar. Antes de recomendar qualquer recurso, configuração ou regra, confirme na fonte atual.**
> Última revisão do guia: novembro/2026.
> Guias relacionados: `estrategia-gbp-seo-local.md` (Perfil da Empresa) e `guia-trafego-pago-meta-brasil.md` (Meta).

---

## Sumário

0. Como usar este guia
1. Protocolo de pesquisa atualizada (obrigatório)
2. Fontes por nível de confiança
3. Regras de conformidade e limites de atuação
4. Contexto brasileiro
5. Como o Google Ads funciona hoje (modelo mental)
6. Módulos
   - **A. Diagnóstico**: A1 Negócio e números · A2 Auditoria da conta · A3 Palavras-chave e intenção · A4 Concorrência
   - **B. Mensuração**: B1 Tag e ações de conversão · B2 Conversões otimizadas e consentimento · B3 Conversões offline e CRM · B4 Ligações e WhatsApp · B5 GA4 e atribuição · B6 Metas e valores
   - **C. Campanhas**: C1 Tipo de campanha · C2 Estrutura · C3 Pesquisa + AI Max · C4 Performance Max · C5 Shopping e Merchant Center · C6 YouTube e Demand Gen · C7 Lances e orçamento · C8 Segmentação e públicos · C9 Negócio local
   - **D. Anúncios e recursos**: D1 Anúncios de pesquisa · D2 Recursos (assets) · D3 Criativos visuais e vídeo · D4 Página de destino
   - **E. Busca com IA**: E1 Anúncios em AI Overviews e Modo IA
   - **F. Otimização e mensuração**: F1 KPIs e diagnóstico · F2 Termos de pesquisa e negativas · F3 Rotina · F4 Experimentos · F5 Relatórios · F6 ROI
   - **G. Conta, segurança e problemas**: G1 Acessos · G2 Verificação de anunciante · G3 Reprovações · G4 Suspensões · G5 Pagamentos · G6 Contas invadidas
   - **H. IA e automação**: H1 MCP oficial e Google Ads API · H2 Recomendações e aplicação automática · H3 Scripts e regras · H4 Relatórios automáticos
   - **I. Categorias reguladas**: I1 Política · I2 Apostas · I3 Saúde · I4 Serviços financeiros · I5 Marcas, menores e outros
7. Formato de entrega
8. Registro de atualizações
9. Checklist final

---

## 0. Como usar este guia

### 0.1 Variáveis da empresa

```
EMPRESA:          {{nome}}
SITE:             {{url}}  (plataforma: PHP próprio, WordPress, Shopify, Nuvemshop, VTEX...)
SEGMENTO:         {{ex.: loja de peças, clínica, serviço local, e-commerce, B2B}}
ONDE VENDE:       {{site | WhatsApp | ligação | loja física | marketplace}}
ÁREA:             {{cidade + raio | estado | Brasil inteiro}}
OBJETIVO:         {{vendas online | leads | ligações | visitas à loja | reconhecimento}}
TICKET MÉDIO:     {{R$}}
MARGEM:           {{% de margem de contribuição por venda}}
RECOMPRA/LTV:     {{compra 1x | recorrente; valor médio no ano}}
TAXA DE FECHAMENTO: {{% lead → venda, se for negócio de lead}}
ORÇAMENTO/MÊS:    {{R$}}
MERCHANT CENTER:  {{sim/não; nº de produtos; feed automático ou manual}}
RASTREAMENTO:     {{tag do Google? GTM? GA4? conversões otimizadas? CRM? nenhum}}
PERFIL DA EMPRESA NO GOOGLE: {{link — necessário para recursos de local}}
HISTÓRICO:        {{conta nova | conta antiga | já teve suspensão}}
CATEGORIA REGULADA? {{saúde, apostas, financeiro, política, álcool... ou não}}
CONCORRENTES:     {{3 a 5 nomes/sites}}
```

Se faltar alguma variável, pergunte. Se não houver ninguém para responder, faça a melhor suposição e escreva qual foi. **Margem e ticket são obrigatórios para qualquer meta de CPA/ROAS.** Sem eles, entregue as metas como faixas e explique o que falta.

### 0.2 Modos de uso
- **Auditoria completa** (conta existente): A → B → C → D → F, e então entregue o relatório da seção 7.
- **Lançamento** (conta/campanha nova): A1, A3, A4, B, C1–C2, depois o tipo de campanha escolhido, D.
- **Problema específico:** direto ao módulo (conta suspensa → G4; "PMax gastando em lixo" → C4 + F2; "conversões sumiram" → B1/B2).
- **Rotina semanal/mensal:** F1 + F2 + F3 + F5, mais o registro (seção 8).

---

## 1. Protocolo de pesquisa atualizada (obrigatório)

Faça isto **antes de cada módulo**:

1. **Pegue a data de hoje** (`date`) e use o ano atual nas buscas.
2. **Leia o registro** `atualizacoes-google-ads.md` (seção 8), se existir.
3. **Busque novidades do tema nos últimos 60–90 dias**:
   - `site:blog.google/products/ads-commerce {{tema}}`
   - `site:support.google.com/google-ads {{tema}}` (inclusive a página de "anúncios/novidades" da Central de Ajuda)
   - `site:developers.google.com/ads/blog {{tema}}` (mudanças de API e de mensuração)
   - `site:seroundtable.com "Google Ads" {{tema}}`
   - `site:searchengineland.com google ads {{tema}}`
   - `site:ppc.land google {{tema}}`
   - Em português: `"Google Ads" {{tema}} {{ano}}` e `site:blog.google/intl/pt-br {{tema}}`
4. **Confirme na Central de Ajuda** (`?hl=pt-BR`) se o recurso existe **no Brasil, em português e na conta do usuário**. Muitos recursos chegam primeiro em inglês/EUA ou só em beta.
5. **Se a fonte atual contradizer este guia, a fonte atual vence.** Registre a mudança na seção 8.
6. **Marque cada informação:**
   - `[OFICIAL]` = Google (Central de Ajuda, políticas, blog oficial, documentação)
   - `[TESTADO]` = teste ou estudo com dados e método
   - `[OPINIÃO]` = recomendação de especialista sem teste
   - `[ANTIGO]` = mais de 12 meses
   - `[EUA]` / `[BETA]` = recurso ainda não confirmado no Brasil/em português ou só em beta
7. **Não invente números** (CPC "médio", CTR "bom"). Benchmark só com URL + data + país + segmento. Sem isso, use os dados da conta e do Planejador de palavras-chave.
8. **Números divulgados pelo Google** (ex.: "+X% conversões com AI Max") são medições da própria empresa. Marque `[OFICIAL – autodeclarado]`.

---

## 2. Fontes por nível de confiança

### Nível 1: Oficial
- Central de Ajuda do Google Ads: https://support.google.com/google-ads/?hl=pt-BR
- Políticas de publicidade: https://support.google.com/adspolicy/?hl=pt-BR
- Blog Google Ads & Commerce: https://blog.google/products/ads-commerce/
- Blog do Google Brasil: https://blog.google/intl/pt-br/
- Google Ads Developer Blog: https://developers.google.com/ads/blog
- Documentação da Google Ads API: https://developers.google.com/google-ads/api/docs/start
- Servidor MCP oficial do Google Ads: https://developers.google.com/google-ads/api/docs/developer-toolkit/mcp-server
- Merchant Center (Ajuda): https://support.google.com/merchants/?hl=pt-BR
- Central de Transparência de Anúncios: https://adstransparency.google.com
- Google Skillshop (cursos e certificações): https://skillshop.withgoogle.com
- Think with Google Brasil (dados de comportamento): https://www.thinkwithgoogle.com/intl/pt-br/

### Nível 2: Especialistas e notícias com método
- Search Engine Roundtable (atualizações diárias): https://www.seroundtable.com
- Search Engine Land (seção PPC): https://searchengineland.com
- PPC Land: https://ppc.land
- Blogs de ferramentas de PPC com dados agregados (ex.: Optmyzr, Adalysis): `[OPINIÃO]` até haver método claro

### Nível 3: Mercado brasileiro
- Meio & Mensagem: https://www.meioemensagem.com.br

### Brasil: legal e regulatório
- CONAR: http://www.conar.org.br
- ANPD (LGPD): https://www.gov.br/anpd
- TSE: https://www.tse.jus.br
- Secretaria de Prêmios e Apostas: https://www.gov.br/fazenda/pt-br/composicao/orgaos/secretaria-de-premios-e-apostas
- Conselhos profissionais (CFM, CFO, CFF, OAB etc.) e ANVISA, conforme o segmento

> Cuidado com tutoriais antigos: modificador de correspondência ampla (+palavra), anúncios de texto expandidos, Smart Shopping, campanhas só para ligação, "SKAG" para tudo. Muitas dessas táticas ou recursos foram descontinuados. Trate como `[ANTIGO]` e confronte com o Nível 1.

---

## 3. Regras de conformidade e limites de atuação

### 3.1 Nunca recomendar (marque `[RISCO DE SUSPENSÃO]` se uma fonte sugerir)
- **Burlar sistemas:** cloaking, redirecionamentos que escondem o destino, criar contas novas para contornar suspensão, usar contas de terceiros
- **Deturpação:** esconder informações da empresa, preços ou condições; ofertas falsas; falsa urgência; se passar por outra marca/órgão público
- **Promessas enganosas** (saúde, renda, investimento, "aprovação garantida")
- Usar **marca registrada de terceiros** de forma que viole a política ou a lei (texto do anúncio), ou se passar pelo concorrente
- **Páginas de destino** sem dados da empresa, sem política de privacidade, com pop-ups abusivos ou conteúdo diferente do anunciado
- Coletar dados sensíveis sem necessidade e sem base legal (LGPD)

### 3.2 Responsabilidade
- O anunciante responde pelos textos e imagens, **inclusive os gerados por IA** (recursos automáticos, AI Max, PMax). Revise tudo.
- **STF (art. 19 do Marco Civil):** desde 2025, as plataformas têm presunção de responsabilidade por conteúdo ilícito em anúncios pagos `[OFICIAL]`. Espere revisão mais rígida em categorias sensíveis. O anunciante continua respondendo pelo que anuncia (CDC, CONAR).

### 3.3 Limites do Claude Code
- Por padrão, o Claude Code **não acessa** a conta do Google Ads. Ele pesquisa, analisa exportações/prints e **prepara** estruturas, palavras-chave, anúncios, listas de negativas, códigos e checklists.
- Se o usuário conectar a conta (MCP oficial/API, ver H1):
  - **somente leitura** por padrão
  - **nunca** publique, pause, altere orçamento/lance, adicione palavra-chave ou aplique recomendação sem **autorização explícita a cada ação**
  - registre cada alteração em `log-alteracoes.md` (data, o quê, por quê)
- Casos jurídicos (marca, Procon, CONAR, processo): orientar a procurar um advogado.

---

## 4. Contexto brasileiro (aplicar em todos os módulos)

### 4.1 Impostos e cobrança
- **Reforma tributária:** em janeiro/2026, o Google comunicou aos anunciantes que a mudança na tributação (CBS/IBS) **não aumentaria o preço dos anúncios** `[OFICIAL – comunicado]`. A Meta, ao contrário, passou a repassar PIS/Cofins e ISS.
- **Pesquise a política atual** antes de cada plano: se houve repasse de impostos, qual é o fator de custo real e como aparece na nota fiscal.
- **Fórmula:** `custo real = custo do Google Ads × fator de impostos vigente` (hoje, confirmar se o fator é 1,00)
- **Comparando Google e Meta:** use sempre o **custo real** dos dois (a Meta tem fator 1,1383).

### 4.2 Pagamento
- Pesquisar os métodos disponíveis para contas brasileiras (cartão, boleto, Pix, pagamentos manuais/automáticos) e os prazos de compensação
- **Pagamento manual (pré-pago):** saldo acaba e os anúncios param. Configure alertas e recarga antecipada (boleto demora para compensar).
- Conta da empresa (CNPJ) e dados de faturamento idênticos aos do site e da verificação (G2)

### 4.3 Como o brasileiro busca
- **Celular primeiro:** a página, os anúncios e as ligações precisam funcionar no celular
- **Termos informais e regionais**, erros de digitação, com e sem acento (ex.: "peca de moto", "motoca", "conserto", "orçamento", "preço", "perto de mim", "aberto agora")
- **Buscas por WhatsApp:** "[serviço] whatsapp", "telefone [empresa]". Facilite o contato direto (B4).
- **Marketplaces dominam algumas buscas de produto** (Mercado Livre, Shopee, Amazon, Magalu): analise a página de resultados antes de definir a estratégia
- **Ofertas que pesam:** parcelamento sem juros, desconto no Pix, frete grátis/rápido, retirada na loja, garantia, troca fácil

### 4.4 Confiança
- O Google bloqueou centenas de milhões de anúncios no Brasil em 2025, e golpes com marcas e órgãos públicos são comuns
- **Sinais de empresa real:** CNPJ, endereço, telefone e WhatsApp na página; avaliações do Google (ver guia de GBP); selo de verificação de anunciante (G2); Reclame Aqui

### 4.5 Sazonalidade
- Calendário: volta às aulas, Carnaval, Páscoa, Dia das Mães, Dia dos Namorados (12/jun), festas juninas, Dia dos Pais, Dia do Cliente (15/set), Dia das Crianças, **Black Friday**, 13º salário e Natal, além das datas do segmento (ex.: IPVA, início do inverno, safra)
- Use **ajustes de sazonalidade** do lance inteligente só para picos curtos e previsíveis de conversão (C7)
- Use **exclusões de dados** quando o rastreamento quebrar (B1)

### 4.6 LGPD
- Política de privacidade informando o uso da tag do Google, cookies e conversões otimizadas
- Banner de consentimento conforme orientação jurídica atual. O **Modo de Consentimento** (Consent Mode) é obrigatório para tráfego do Espaço Econômico Europeu (EEE) e do Reino Unido. No Brasil, avalie com o jurídico e pesquise a exigência atual (B2).
- **Customer Match (lista de clientes):** só com base legal adequada; nunca lista comprada
- Formulários com o mínimo de campos e texto de consentimento claro

---

## 5. Como o Google Ads funciona hoje (modelo mental)

Confirme no protocolo da seção 1 se algo mudou. Em 2026, a lógica é esta:

- **A IA decide cada vez mais:** para quais buscas aparecer, qual texto mostrar, para qual página mandar e quanto pagar. O anunciante controla **objetivo, dados, recursos (textos/imagens/vídeos/feed), orçamento e limites** (negativas, exclusões de marca, URLs).
- **AI Max para campanhas de Pesquisa:**
  - pacote de IA dentro da campanha de Pesquisa: expansão de termos além das palavras-chave, personalização de texto e expansão de URL final
  - não é um tipo de campanha novo
  - a partir de 1º/09/2026, o Google passou a migrar automaticamente campanhas de Pesquisa elegíveis para o AI Max `[OFICIAL]`
- **Performance Max:** uma campanha para todo o inventário (Pesquisa, Shopping, YouTube, Display, Discover, Gmail, Maps), com cada vez mais transparência e controle:
  - relatório por canal
  - termos de pesquisa
  - negativas no nível da campanha
  - exclusões de marca
- **Display migrando para Demand Gen** (YouTube, Discover, Gmail, Display em um só tipo) `[confirmar status]`
- **Busca com IA:** anúncios dentro de AI Overviews e do Modo IA; previsão de chegada ao Brasil no 4º trimestre de 2026 (E1)
- **Consequências práticas** `[OPINIÃO consolidada entre especialistas]`:
  - **dados de conversão de qualidade são o principal controle**: o lance inteligente otimiza para o que você mede; se medir errado, ele otimiza errado
  - **valores reais** (receita, lucro, lead qualificado) valem mais que contagem de formulários
  - **termos de pesquisa e negativas** viraram a principal ferramenta de controle de qualidade
  - **estruturas mais consolidadas** dão mais dados ao algoritmo
  - **revisar todo conteúdo gerado por IA** (textos, URLs, imagens)

---

## 6. Módulos

Cada módulo tem: **Objetivo · Pesquisar · Fazer · Entregar.**

---

### A. Diagnóstico

#### A1. Negócio, oferta e números
**Objetivo:** saber quanto se pode pagar por clique, lead e venda.

**Fazer:**
- **Margem de contribuição por venda** = preço − custo do produto − impostos da venda − taxas (cartão, frete, marketplace)
- **CPA máximo** = margem de contribuição (R$) ÷ fator de impostos (4.1)
- **ROAS de equilíbrio** = fator de impostos ÷ margem (%). Exemplo: margem 30% e fator 1,00 → ROAS mínimo 3,33.
- **Leads:** custo máximo por lead = CPA máximo × taxa de fechamento
- **CPC máximo viável** ≈ CPA máximo × taxa de conversão esperada da página
- **Com recompra:** calcule também com o LTV de 6–12 meses e deixe claro qual meta usar
- **Avaliar a oferta e a concorrência na página de resultados:** se os CPCs estimados (A3) tornam o CPA inviável, recomendar ajustar a oferta, focar em termos de cauda longa/locais ou outro canal

**Entregar:** tabela de números (ticket, margem, CPA máximo, ROAS de equilíbrio, CPC máximo viável, custo máximo por lead).

#### A2. Auditoria da conta
**Pedir ao usuário:**
- exportação (CSV) ou acesso leitura dos últimos 90 dias: campanhas, grupos, palavras-chave, termos de pesquisa, anúncios/recursos, conversões, leilão
- prints: "Metas > Conversões", "Diagnóstico da conta", "Políticas", "Faturamento"

**Analisar:**
- **Propriedade e acessos:** a conta é da empresa? Está numa MCC da agência com a empresa como administradora? (G1)
- **Conversões:**
  - quais ações são **principais** (usadas no lance) × secundárias
  - duplicações (tag + GA4 importado contando igual)
  - micro-conversões contaminando o lance (clique em botão, tempo na página)
  - valores
  - status das conversões otimizadas
  - modo de consentimento
- **Estrutura:** campanhas fragmentadas, orçamento pulverizado, PMax e Pesquisa competindo sem estratégia de marca
- **Configurações:**
  - localização em **"Presença"** ou "Presença ou interesse"
  - idioma
  - redes (Pesquisa com parceiros de pesquisa/Display marcados sem querer)
  - programação de anúncios
  - rotação
- **Termos de pesquisa:** % de gasto em termos irrelevantes, buscas de marca de terceiros, termos de emprego/"grátis"/"como fazer"
- **AI Max/PMax:** foi migrado automaticamente? Expansão de URL ligada? Textos gerados por IA revisados?
- **Recomendações aplicadas automaticamente:** quais estão ligadas (H2)
- **Políticas:** anúncios reprovados/limitados; avisos na conta
- **Resultados:** custo real contra o CPA máximo do A1

**Entregar:** tabela `Problema | Impacto | Correção | Esforço | Risco`.

#### A3. Palavras-chave e intenção de busca
**Pesquisar:** recursos atuais do Planejador de palavras-chave e se o AI Brief/descrição em linguagem natural para o AI Max está disponível em português `[BETA]`.

**Fazer:**
1. **Fontes de termos:**
   - Planejador de palavras-chave (volumes e CPC estimado por região)
   - termos de pesquisa da própria conta
   - Search Console (consultas orgânicas)
   - autocompletar do Google
   - "As pessoas também perguntam"
   - perguntas do WhatsApp/atendimento
   - site e anúncios dos concorrentes
2. **Classificar a intenção:**
   - **Transacional/urgente** ("comprar", "preço", "orçamento", "perto de mim", "aberto agora", "entrega hoje") → prioridade máxima
   - **Comparação/investigação** ("melhor", "vale a pena", "x ou y", "avaliação") → páginas de comparação, prova social
   - **Informacional** ("como", "o que é") → normalmente negativar ou tratar como conteúdo/SEO; testar só com orçamento separado
   - **Marca própria** → campanha de marca (proteção barata)
   - **Marca de concorrente** → avaliar política, ética e custo; nunca usar a marca deles no texto do anúncio sem respaldo
   - **Navegacional/irrelevante** ("login", "emprego", "vagas", "grátis", "pdf", "download") → negativas
3. **Agrupar por tema** (produto/serviço + intenção), não por variação mínima
4. **Lista inicial de negativas** (F2)

**Entregar:** planilha `Termo | Intenção | Volume | CPC estimado | Tema/grupo | Página de destino | Prioridade` + lista de negativas inicial.

#### A4. Concorrência
**Fazer:**
- **Página de resultados real** das 10 buscas principais, no celular e na região do cliente (ou pedir prints): quem anuncia, que ofertas, se há Shopping, mapa, AI Overview, marketplaces
- **Central de Transparência de Anúncios:** anúncios ativos dos concorrentes (textos, formatos, regiões, histórico)
- **Leilão (Auction Insights)** da conta: parcela de impressões, sobreposição, taxa de superação
- **Site dos concorrentes:** oferta, preço, frete, prova social, velocidade
- **Lacunas:** ofertas, garantias, regiões ou termos que ninguém cobre bem

**Entregar:** tabela `Concorrente | Termos em que aparece | Oferta | Diferencial | Fraqueza` + oportunidades.

---

### B. Mensuração (fazer ANTES de otimizar)

#### B1. Tag do Google e ações de conversão
**Pesquisar:** a forma recomendada hoje (tag do Google/gtag, Google Tag Manager, integrações nativas de plataformas) e as mudanças recentes em metas de conversão.

**Fazer:**
- Uma tag do Google em todas as páginas (direta ou via GTM), com o **vinculador de conversões**
- **Ações principais** (entram no lance) = só o que tem valor real:
  - e-commerce: compra (com valor e `currency: BRL`, ID da transação para não duplicar)
  - leads: formulário enviado, clique no WhatsApp/ligação (B4), lead qualificado (B3)
- **Ações secundárias** (só observação): microações (ver página de preço, adicionar ao carrinho, rolar a página)
- **Evitar duplicação:** não contar a mesma compra pela tag e pelo GA4 importado ao mesmo tempo como principais
- **Testar:** fazer uma conversão de teste e conferir em "Metas > Conversões" (status, contagem, valor)
- **Exclusões de dados:** usar quando o rastreamento quebrar por um período (para o lance não aprender errado)
- **Site em PHP próprio:** gerar o código do evento de conversão (com valor dinâmico e ID da transação) e o `dataLayer`, se usar GTM

**Entregar:** plano de conversões `Ação | Principal/Secundária | Valor | Origem (tag/GA4/offline) | Status` + código pronto.

#### B2. Conversões otimizadas e modo de consentimento
**Pesquisar (mudou em 2026):**
- conversões otimizadas para web e para leads passaram a ser **uma única configuração liga/desliga** `[OFICIAL]`
- exigências atuais do modo de consentimento (v2) e o que muda para contas no Brasil
- mudanças de junho/2026 no uso dos sinais de consentimento pelo Google Ads

**Fazer:**
- Ativar as **conversões otimizadas** (dados do cliente com hash: e-mail, telefone com +55, nome, endereço)
- Aceitar os termos de processamento de dados
- Conferir o diagnóstico (taxa de correspondência) depois de alguns dias
- **Consentimento:**
  - se o site usa banner de cookies, implementar o modo de consentimento corretamente (parâmetros de anúncios e de dados do usuário)
  - se não usa, registrar a decisão jurídica
  - **cuidado:** consentimento mal configurado pode zerar a medição sem aviso

**Entregar:** checklist de configuração + teste + nota sobre consentimento.

#### B3. Conversões offline e CRM (lead qualificado e venda)
**Pesquisar (mudou em 2026):** desde 15/06/2026, novas integrações de importação de conversões offline e de conversões otimizadas para leads são feitas pelo **Data Manager** (interface ou API). A Google Ads API deixou de aceitar novos usuários para isso `[OFICIAL]`. Confirme o status atual e os conectores nativos (CRMs, planilhas, armazenamento em nuvem).

**Fazer:**
- **Capturar o GCLID** (e demais identificadores) e os dados do lead no formulário/WhatsApp, e gravar no CRM/sistema
- **Estágios:** lead → qualificado → venda (com valor)
- **Enviar de volta ao Google** pelo Data Manager (conector, planilha programada ou API)
- **Trocar a meta principal** de "formulário enviado" para "lead qualificado"/"venda", quando houver volume
- **Sistema próprio (PHP/MySQL):**
  - tabela `leads` com `gclid`, `gbraid`, `wbraid`, `utm_*`, data/hora, status, valor, data_venda
  - script/rotina de exportação no formato do Data Manager
- Com recompra/LTV: avaliar ajustes de valor da conversão

**Entregar:** desenho do fluxo de dados + estrutura de tabela/código + passo a passo do Data Manager.

#### B4. Ligações e WhatsApp
**Pesquisar:**
- recursos de ligação atuais (os anúncios só para chamada foram descontinuados; o caminho é o recurso de ligação) `[OFICIAL]`
- rastreamento de ligações com número de encaminhamento do Google no Brasil
- se existe recurso de mensagem/WhatsApp nos anúncios no Brasil

**Fazer:**
- **Recurso de ligação** com conversão de ligação (duração mínima definida com o usuário, ex.: 60s)
- **Clique em telefone no site:** conversão via tag (clique em `tel:`)
- **WhatsApp no site:**
  - medir o clique (tag/GTM) em links `wa.me`/`api.whatsapp.com`
  - opção de página de redirecionamento própria que registra origem + GCLID antes de abrir o WhatsApp
  - mensagem pré-preenchida identificando a origem ("Olá, vi no Google…")
- **Venda fechada no WhatsApp:** registrar no CRM com o GCLID e importar como offline (B3)
- **Clique no WhatsApp é intenção, não venda:** usar como principal só enquanto não houver lead qualificado/venda medida

**Entregar:** configuração de ligações + código de rastreamento do WhatsApp + fluxo até a venda.

#### B5. GA4 e atribuição
**Pesquisar:** modelos de atribuição disponíveis hoje no Google Ads e no GA4, e a integração atual entre os dois.

**Fazer:**
- Vincular Google Ads ↔ GA4 (e Merchant Center ↔ Google Ads)
- Atribuição **baseada em dados** (padrão), se houver volume; entender as janelas de conversão de cada ação
- **Comparar:** Google Ads × GA4 × CRM. Explicar as diferenças (modelo, janela, data da conversão × do clique, consentimento).
- **Fonte de verdade = vendas reais** (CRM/plataforma)
- Calcular o **MER** (receita total ÷ investimento total em mídia de todos os canais, com impostos) como controle geral

**Entregar:** nota "como ler os números desta conta" + configuração recomendada.

#### B6. Metas, valores e aquisição de novos clientes
**Fazer:**
- Usar **valores reais** (receita ou, melhor ainda, margem) em vez de contagem simples, quando possível
- **Valores para leads:** valor estimado = ticket × taxa de fechamento (ajustar com o tempo)
- **Regras de valor** (por região, dispositivo, público): avaliar quando há diferença real de valor
- **Meta de aquisição de novos clientes** (PMax/Pesquisa/Shopping): lances maiores ou só novos clientes, com lista de clientes atual para o Google reconhecer quem já compra

**Entregar:** tabela de valores por conversão + configuração de novos clientes.

---

### C. Campanhas

#### C1. Escolha do tipo de campanha
**Pesquisar:** tipos de campanha e subtipos disponíveis hoje (e quais foram migrados/descontinuados).

**Guia de decisão** (confirmar se ainda vale):

| Situação | Começar com | Depois |
|---|---|---|
| Serviço/negócio com demanda de busca clara (encanador, oficina, clínica, advogado) | **Pesquisa** (com controle de termos) | PMax/local quando houver conversões medidas |
| E-commerce com catálogo | **Shopping/PMax com feed** + Pesquisa de marca e top categorias | Demand Gen/YouTube para demanda |
| Loja física / negócio local | Pesquisa local + recursos de local/ligação + PMax com metas de loja (se elegível) | YouTube local |
| Produto novo sem demanda de busca | **Demand Gen/YouTube** | Pesquisa quando a marca for buscada |
| App | Campanha para apps | — |
| B2B com ticket alto | Pesquisa + conversões offline (B3) | PMax com lead qualificado como meta |

- **Marca própria:** campanha de Pesquisa de marca, separada, quase sempre vale (barata, protege contra concorrentes). Definir a relação com PMax (exclusões de marca).
- **Rede de Display pura:** raramente para conversão direta; preferir Demand Gen/remarketing estruturado

**Entregar:** recomendação de tipos + ordem de lançamento + justificativa.

#### C2. Estrutura da conta
**Princípios** `[OPINIÃO consolidada; confirmar]`:
- **Consolidar:** cada campanha precisa de um motivo real (objetivo, orçamento, região, margem muito diferente, marca × não marca)
- **Grupos por tema** com páginas de destino específicas; evitar dezenas de grupos com poucas palavras e pouco volume
- **Volume para aprender:** o lance inteligente precisa de conversões. Se a campanha tem poucas conversões por mês, consolide ou use uma ação de conversão mais frequente (com valor proporcional).
- **Nomenclatura padrão:** `[TIPO]_[OBJETIVO]_[TEMA]_[REGIAO]` → `PESQ_LEADS_CONSERTO-MOTO_ARARAQUARA`

**Estrutura inicial típica de serviço local (adaptar):**
- `PESQ_MARCA`: nome da empresa
- `PESQ_SERVICOS`: 3–6 grupos por serviço/intenção
- `PMAX_LOCAL` ou `PMAX_LEADS`: depois de 30+ conversões medidas `[OPINIÃO]`

**Estrutura inicial típica de e-commerce:**
- `PESQ_MARCA`
- `PMAX_FEED` (ou Shopping), segmentado por margem/desempenho
- `PESQ_CATEGORIAS-TOP`: opcional, para controle de termos estratégicos

**Entregar:** diagrama da estrutura + nomes + orçamentos.

#### C3. Campanhas de Pesquisa + AI Max
**Pesquisar (muda todo mês):**
- controles atuais do AI Max: correspondência de termos/expansão, personalização de texto, expansão de URL final, inclusões/exclusões de marca, exclusões de URL, **AI Brief** (diretrizes em linguagem natural, beta em português)
- relatórios (termos, recursos vistos, página de destino)
- critérios da migração automática

**Fazer:**
- **Tipos de correspondência:**
  - **ampla + lance inteligente + boas negativas:** padrão atual recomendado pelo Google `[OFICIAL]`
  - **frase/exata:** para controle em contas pequenas, termos caros ou regulados
  - decidir pelo volume de conversões e pelo risco de termos ruins
- **AI Max (ligar, testar ou não ligar):**
  - testar via **experimento** (F4) quando possível
  - se ligar: revisar **textos gerados**, limitar a **expansão de URL** (excluir páginas que não convertem: blog, carreiras, políticas) e acompanhar os termos novos toda semana
  - se a campanha foi migrada automaticamente: auditar (termos, textos, URLs, compatibilidade do modelo de acompanhamento/UTMs)
- **Anúncios responsivos** (D1) + recursos (D2) em cada grupo
- **Configurações:**
  - redes (desmarcar a Rede de Display; parceiros de pesquisa conforme teste)
  - localização "Presença"
  - idioma (português; considere "todos" se o público usa o Google em outro idioma)
  - programação conforme o atendimento, se for por ligação

**Entregar:** estrutura de grupos + palavras-chave + negativas + configuração do AI Max + anúncios prontos.

#### C4. Performance Max
**Pesquisar:** controles e relatórios atuais do PMax:
- relatório de canais
- termos de pesquisa
- negativas no nível da campanha (e limites)
- exclusões de marca
- temas de pesquisa
- exclusões de público/posicionamento
- relatório de orçamento
- segmentação demográfica/dispositivo (beta)
- relatório de público

**Fazer:**
- **Pré-requisito:** conversões confiáveis e com valor (B1–B3). PMax sem boa medição gasta em tráfego barato e de baixa qualidade.
- **Grupos de recursos** por tema/categoria/público, com textos, imagens (quadradas, horizontais, verticais), logos e **vídeos próprios** (sem vídeo, o Google pode gerar automaticamente; revise ou forneça)
- **Sinais de público:** listas de clientes, visitantes, segmentos personalizados (são sugestões, não restrições)
- **Controles:**
  - negativas no nível da campanha
  - exclusões de marca (para não canibalizar a campanha de marca, se for a estratégia)
  - exclusão de URLs ruins na expansão de URL
  - exclusões de posicionamento na conta
- **Relatório de canais:** ver quanto vai para Pesquisa, Shopping, YouTube, Display, Discover, Gmail, Maps. Diagnosticar, não reagir no impulso.
- **Termos de pesquisa** toda semana (F2)
- **E-commerce:** PMax com feed. Segmentar por margem/desempenho (rótulos personalizados) em vez de uma campanha para tudo.

**Entregar:** estrutura de campanha/grupos de recursos + lista de recursos necessários + controles configurados.

#### C5. Shopping e Merchant Center
**Pesquisar:** requisitos atuais do Merchant Center no Brasil (atributos obrigatórios, parcelamento, frete, impostos, políticas de devolução, avaliações de produto, listagens gratuitas, AI Max para Shopping).

**Fazer:**
- **Feed de qualidade:**
  - títulos com o que o brasileiro busca (marca + produto + modelo + atributo; ex.: "Kit Relação Honda CG 160 Original Vaz")
  - descrições completas
  - GTIN/marca/MPN
  - imagens limpas
  - disponibilidade/preço sincronizados
- **Atributos importantes no Brasil:** parcelamento (atributo de parcelas, se suportado), frete (configurações de envio), condição, política de devolução
- **Listagens gratuitas** ativas
- **Diagnóstico do Merchant Center:** zerar reprovações e avisos
- **Rótulos personalizados:** margem (alta/média/baixa), mais vendidos, sazonais, estoque
- **Site em PHP próprio:** gerar o feed XML/CSV automático a partir do MySQL, com atualização programada (cron)
- Vincular Merchant Center ↔ Google Ads ↔ GA4

**Entregar:** auditoria do feed + correções + script de geração do feed (se aplicável).

#### C6. YouTube e Demand Gen
**Pesquisar:** formatos e objetivos atuais do Demand Gen (inclusive a migração de campanhas de Display), opções de vídeo (Shorts, in-stream, in-feed) e otimização para conversão.

**Fazer:**
- **Quando usar:** gerar demanda (produto novo, marca pouco buscada), remarketing visual, alcançar o público antes da busca
- **Criativos:**
  - vídeo vertical (Shorts) e horizontal
  - gancho nos 5 primeiros segundos (antes do "pular")
  - marca cedo
  - legenda
  - CTA claro
- **Públicos:** segmentos personalizados (termos que a pessoa buscou, sites/apps), listas de clientes, semelhantes (como sinais)
- **Medição:** conversões (inclusive visualizações engajadas), lift de marca/busca quando disponível. Não julgar só pelo último clique.

**Entregar:** plano de campanha + 3 roteiros de vídeo (15s, 30s, Shorts) + públicos.

#### C7. Lances e orçamento
**Pesquisar:** estratégias de lance atuais e mudanças recentes no comportamento do CPA/ROAS desejado em campanhas limitadas pelo orçamento (relatos de 2026 de que o Google passou a buscar volume mais perto da meta).

**Fazer:**
- **Conta/campanha nova sem conversões:**
  - Maximizar cliques com CPC máximo **ou** Maximizar conversões (com boa medição)
  - testar e migrar quando houver dados `[OPINIÃO]`
- **Com histórico estável:** CPA desejado ou ROAS desejado com base no A1 (não em desejo)
- **Orçamento coerente:**
  - orçamento diário ≥ alguns CPAs desejados
  - campanha "limitada pelo orçamento" com meta apertada não escala
  - entender que o gasto diário pode variar acima do orçamento diário, dentro do limite mensal (confirmar a regra atual)
- **Ajuste de metas:** mudanças graduais e espaçadas; cada mudança grande reinicia o aprendizado `[OPINIÃO]`
- **Ajustes de sazonalidade** (picos curtos e previsíveis) e **exclusões de dados** (rastreamento quebrado)
- **Portfólio de lances:** só com motivo claro

**Entregar:** estratégia de lance por campanha + orçamento mensal + critérios para mudar a estratégia.

#### C8. Segmentação e públicos
**Fazer:**
- **Localização:**
  - **"Presença: pessoas que estão ou costumam estar nos locais segmentados"** para negócio local (evita clique de quem só "se interessa" pela cidade)
  - raio/cidades/CEPs reais de atendimento
  - excluir onde não atende
- **Idioma e dispositivos:** conforme o público; ajustes de dispositivo só com dados
- **Públicos:**
  - **observação** (para ver dados) × **segmentação** (restringe)
  - na Pesquisa, normalmente observação
  - listas de clientes (Customer Match, com base legal LGPD)
  - visitantes do site
  - segmentos personalizados
- **Exclusões:** clientes atuais (quando o objetivo é novos clientes), funcionários, faixas que não compram (com dados)
- **Demografia:** só excluir com dados ou exigência legal/política

**Entregar:** configuração de localização + lista de públicos (observação/segmentação/exclusão).

#### C9. Negócio local no Google Ads
**Pesquisar:** recursos atuais para negócio local no Brasil:
- recurso de local vinculado ao Perfil da Empresa
- PMax com metas de visita à loja (elegibilidade)
- anúncios no Maps/Waze (houve expansão de anúncios do Waze via PMax em 2026; confirmar se inclui o Brasil)
- se anúncios de serviços locais existem no Brasil

**Fazer:**
- **Vincular o Perfil da Empresa no Google** à conta e ativar o recurso de local (endereço, rota, horário nos anúncios). Ver `estrategia-gbp-seo-local.md` para o perfil estar otimizado.
- Recurso de ligação + conversões de ligação (B4)
- Pesquisa com termos locais ("[serviço] [bairro/cidade]", "perto de mim")
- **Visitas à loja:** só se a conta for elegível; senão, medir por ligação/rota/WhatsApp, cupom e pergunta "como nos conheceu?"
- **Coerência com o GBP:** mesmo nome, horário, telefone e ofertas

**Entregar:** configuração local + lista de termos locais + método de medição na loja.

---

### D. Anúncios e recursos

#### D1. Anúncios de pesquisa responsivos
**Fazer:**
- **Até 15 títulos e 4 descrições**, com variedade real:
  - benefício
  - oferta
  - prova
  - diferencial
  - localização
  - CTA
  - termo principal
- **Brasil:** parcelamento, Pix, frete, "atendimento pelo WhatsApp", "loja em [cidade] desde [ano]", nota no Google
- **Fixar títulos** só quando necessário (marca, exigência legal/regulatória). Fixar demais reduz a performance.
- **"Força do anúncio" não é desempenho:** use como checklist, não como meta
- **Textos gerados por IA** (recursos automáticos/AI Max): revisar e remover o que for impreciso ou violar política/regra de conselho
- Coerência total com a página de destino

**Entregar:** 15 títulos + 4 descrições por grupo, revisados contra as políticas.

#### D2. Recursos (assets)
**Pesquisar:** recursos disponíveis hoje no Brasil e quais estão sendo criados automaticamente.

**Fazer:**
- **Sitelinks** (4–8, para páginas úteis: serviços, preços, contato, avaliações, ofertas)
- **Frases de destaque** ("Parcelamos em até 10x", "Desconto no Pix", "Entrega no mesmo dia")
- **Snippets estruturados** (serviços, marcas, modelos)
- **Ligação, local, preço, promoção, imagem, logotipo, nome da empresa**
- Revisar os **recursos automáticos** e remover os ruins

**Entregar:** lista completa de recursos prontos.

#### D3. Criativos visuais e vídeo (PMax, Demand Gen, YouTube)
**Fazer:**
- Imagens próprias (produto, equipe, loja, serviço sendo feito) nos formatos exigidos; evitar texto excessivo
- **Vídeos próprios** em vertical, horizontal e quadrado; versões curtas
- Revisar criativos gerados por IA (imagem/vídeo automático): produto deformado, texto errado, promessa indevida
- Renovar criativos com base no relatório de recursos (desempenho por recurso e por canal)

**Entregar:** lista de criativos necessários por grupo de recursos + roteiros.

#### D4. Página de destino
**Fazer:**
- **Velocidade no celular** (Core Web Vitals); mesma promessa do anúncio
- Preço/oferta visível, prova social, **CNPJ/endereço/telefone/WhatsApp**, política de privacidade
- **Página por serviço/categoria**, com o termo principal no H1
- Formulário curto; botão de WhatsApp e ligação; checkout simples
- **UTMs/modelo de acompanhamento** compatíveis com AI Max e expansão de URL; conferir o GCLID chegando
- **Site em PHP próprio:** sugerir as melhorias de velocidade e entregar o código de conversão/UTM/GCLID

**Entregar:** checklist da página + correções priorizadas.

---

### E. Busca com IA

#### E1. Anúncios em AI Overviews e no Modo IA
**Pesquisar (obrigatório, muda rápido):**
- se os anúncios em AI Overviews e no Modo IA **já estão ativos no Brasil e em português** (o Google planejava expandir para o Brasil no 4º trimestre de 2026)
- quais tipos de campanha são elegíveis (AI Max, PMax, correspondência ampla, Shopping)
- categorias excluídas (há relatos de exclusão de saúde, finanças, apostas, álcool, política)
- se há opção de opt-out
- relatórios disponíveis

**Fazer:**
- Garantir a elegibilidade: campanhas com AI Max/PMax/ampla e bons recursos
- Conteúdo da página que responde perguntas completas (buscas no Modo IA são mais longas e conversacionais)
- Feed rico (Shopping), com atributos completos
- Acompanhar as mudanças de CTR/CPC/conversão após o lançamento no Brasil e registrar na seção 8
- Integrar com a estratégia de SEO/GBP (visibilidade orgânica em IA)

**Entregar:** status no Brasil + checklist de elegibilidade + o que monitorar.

---

### F. Otimização e mensuração

#### F1. KPIs e árvore de diagnóstico
**Indicadores (sempre com o custo real):**
- **Visibilidade:** impressões, parcela de impressões (perdida por orçamento × por classificação), posição no topo
- **Clique:** CTR, CPC, termos de pesquisa
- **Conversão:** taxa de conversão, custo por conversão, valor, ROAS
- **Negócio:** leads qualificados, vendas reais, CPA real, MER, lucro

**Árvore de diagnóstico:**
- **Poucas impressões** → orçamento, lance/meta apertada, palavras com pouco volume, reprovação, segmentação restrita
- **Parcela perdida por orçamento alta** → aumentar o orçamento (se o CPA está bom) ou concentrar nos termos melhores
- **Parcela perdida por classificação** → qualidade do anúncio/página, lance, relevância
- **CTR baixo** → anúncio fraco, termo pouco relevante, oferta pior que a do concorrente
- **Cliques sem conversão** → termos ruins (F2), página (D4), rastreamento quebrado (testar!), oferta/preço
- **Conversões boas no Google, vendas ruins no caixa** → conversão errada como principal (B1), leads ruins (B3), atendimento
- **Queda repentina** → rastreamento, consentimento, reprovação, mudança de lance/orçamento, concorrente novo, sazonalidade, migração automática (AI Max)

**Entregar:** painel de KPIs com metas + diagnóstico pela árvore.

#### F2. Termos de pesquisa e negativas
**Fazer (semanal no início, depois quinzenal):**
- Revisar os termos de **Pesquisa, AI Max, PMax e Shopping**
- **Negativar:**
  - irrelevantes
  - emprego ("vagas", "trabalhe conosco")
  - "grátis"/"pdf"/"download"
  - DIY ("como fazer", quando não serve)
  - regiões não atendidas
  - produtos que não vende
  - marcas que não trabalha
- **Listas de negativas compartilhadas** por tema (aplicar em várias campanhas, inclusive PMax)
- **Termos bons** viram palavra-chave/grupo/página de destino dedicada
- **Cuidado:** não negativar demais, para não bloquear termos que convertem

**Entregar:** lista de negativas (com nível: conta, campanha ou grupo) + termos para promover.

#### F3. Rotina de otimização
- **Diário (5 min):** algo quebrou? (gasto sem conversão fora do normal, reprovações, pagamento, conversões zeradas)
- **Semanal:** termos de pesquisa e negativas, custo real × meta, recursos com desempenho baixo, recomendações (H2)
- **Mensal:**
  - relatório (F5)
  - revisão de metas de lance
  - estrutura
  - feed
  - leilão
  - registro (seção 8)
- **Respeitar o aprendizado:** agrupar as mudanças; evitar mexer em lance/meta toda semana

**Entregar:** checklist diário/semanal/mensal.

#### F4. Experimentos e incrementalidade
**Pesquisar:** tipos de experimento disponíveis (experimentos de campanha, de AI Max, de recursos, de vídeo) e estudos de lift (conversão, marca, busca) com os requisitos atuais.

**Fazer:**
- **Uma hipótese por experimento** (ex.: "AI Max ligado melhora o CPA sem piorar a qualidade do lead")
- Dividir o tráfego (ex.: 50/50), com duração e critério de sucesso definidos antes
- **Incrementalidade:** estudos de lift (se elegível) ou testes geográficos (pausar em região comparável), com cuidado com a sazonalidade
- Documentar em `experimentos.md`: hipótese, período, resultado, decisão

**Entregar:** plano de experimentos + modelo de registro.

#### F5. Relatórios e dashboards
**Fazer:**
- **Relatório mensal de 1 página:**
  - investimento (com o fator de impostos)
  - conversões e valor
  - leads qualificados/vendas reais
  - CPA/ROAS real × meta
  - top termos e top recursos
  - aprendizados
  - próximos passos
- **Fontes:** Google Ads (relatórios/API), GA4, CRM, Merchant Center
- **Ferramentas:** Looker Studio, planilha ou página PHP própria
- **Comparar Google × Meta** (ver o guia da Meta) pelo custo real e pelas vendas reais

**Entregar:** modelo de relatório + estrutura do dashboard.

#### F6. ROI e desempenho comercial
**Fazer:**
- **Custo total:** mídia (× fator de impostos) + ferramentas + produção + gestão
- **Receita/lucro atribuídos** pela fonte de verdade
- **ROI** = (lucro bruto atribuído − custo total) ÷ custo total
- Com recompra: ROI em 90/180 dias usando o LTV
- Quando faltar dado: estimativa com **premissas explícitas** + o que medir para virar dado real

**Entregar:** cálculo de ROI + recomendação (escalar, manter, ajustar, pausar).

---

### G. Conta, segurança e problemas

#### G1. Acessos e propriedade
**Fazer:**
- **A empresa é dona da conta** (e do Merchant Center, GA4, GTM, Perfil da Empresa). Agência acessa via MCC ou como usuário, nunca como dona única.
- Pelo menos 2 administradores com **verificação em duas etapas**
- Remover ex-funcionários/ex-agências; revisar acessos a cada 3 meses
- E-mail corporativo ativo como administrador

**Entregar:** tabela de ativos e acessos (atual × recomendado).

#### G2. Verificação de anunciante
**Pesquisar:** requisitos atuais da verificação de anunciante do Google para o Brasil (identidade, operações comerciais, documentos aceitos, prazos) e verificações específicas por categoria (serviços financeiros, saúde, apostas etc.).

**Fazer:**
- Preparar os documentos: Cartão CNPJ, contrato social, comprovante de endereço, documento do responsável
- **Dados idênticos** em conta, faturamento, site e documentos
- Responder dentro do prazo (o não cumprimento pode pausar a conta)

**Entregar:** checklist de documentos + passo a passo atual.

#### G3. Anúncios reprovados ou limitados
**Fazer:**
1. Ler a **política citada** (e se o problema está no anúncio, no recurso ou na página de destino)
2. **Se violou:** corrigir e reenviar
3. **Se não violou:** contestar com uma explicação curta
4. **Motivos comuns:**
   - página com problema (destino não funcional, sem dados da empresa)
   - marca registrada
   - saúde
   - serviços financeiros
   - conteúdo editorial (caixa alta, pontuação, símbolos)
   - deturpação
5. Registrar o padrão para não repetir

**Entregar:** diagnóstico + versão corrigida + texto da contestação.

#### G4. Contas suspensas
**Pesquisar (sempre):** os motivos de suspensão atuais e o processo de recurso.

**Fazer:**
1. **Identificar o motivo informado.** Os mais comuns:
   - burlar sistemas
   - pagamento suspeito
   - deturpação
   - saldo não pago
   - verificação não concluída
   - conta ligada a outra suspensa
2. **Corrigir a causa antes do recurso:**
   - site com dados completos da empresa, políticas (privacidade, troca, entrega), preços e condições claros
   - pagamento regular
   - verificação concluída
3. **Enviar o recurso pelo canal oficial**, com informações claras e documentos; guardar prints e datas
4. **Nunca** criar conta nova para contornar (a suspensão se estende e vira permanente)
5. Esgotado o recurso, avaliar o suporte (chat/telefone para anunciantes) com o caso documentado

**Entregar:** diagnóstico + correções no site + texto do recurso + plano de prevenção.

#### G5. Pagamentos e faturamento
**Fazer:**
- Método adequado (automático com cartão/débito, ou manual com boleto/Pix, conforme disponível)
- **Manual:** recarga antes de acabar; prever a compensação do boleto
- **Notas fiscais:** onde baixar; conferir os tributos (4.1)
- Evitar recusas e chargebacks (causam suspensão)

**Entregar:** checklist financeiro + alertas.

#### G6. Contas invadidas
**Fazer:**
1. Recuperar a Conta Google pelo fluxo oficial
2. Remover usuários desconhecidos da conta de anúncios/MCC
3. Pausar campanhas estranhas
4. Revisar os pagamentos e avisar o banco
5. Contatar o suporte do Google Ads sobre a cobrança indevida
6. Trocar as senhas, ativar a verificação em duas etapas e documentar tudo

**Entregar:** passo a passo de emergência + checklist pós-recuperação.

---

### H. IA e automação

#### H1. MCP oficial e Google Ads API (Claude Code com acesso à conta)
**Pesquisar (obrigatório):**
- **Servidor MCP oficial do Google Ads** (código aberto, lançado em out/2025): o que expõe hoje. Era **somente leitura**: descoberta de contas, relatórios e consultas GAQL.
- Como instalar (local ou Cloud Run) e autenticar (OAuth, token de desenvolvedor, projeto no Google Cloud)
- **Skills/ferramentas oficiais para agentes** da Google Ads API (há um pacote para Claude Code com validação de GAQL, geração de código e diagnóstico de conversões offline). Confirme o comando e o repositório oficiais atuais.
- Níveis de acesso do token de desenvolvedor e as **Políticas do Google Ads para Desenvolvedores** (atualizadas em 2026)
- **Desconfie de MCPs de terceiros** que pedem acesso total: avaliar segurança, permissões e quem armazena os tokens antes de recomendar

**Regras:**
- Credenciais em `.env`/gerenciador de segredos, nunca no código ou em repositório público; permissões mínimas
- **Fase 1:** somente leitura (auditoria A2, relatórios F5, termos de pesquisa F2)
- **Fase 2 (opcional):** escrita via API/scripts, com aprovação explícita **a cada ação**, teto de orçamento definido pelo usuário e registro em `log-alteracoes.md`
- Conversões offline: usar o **Data Manager** (B3), não a importação antiga pela Google Ads API

**Entregar:** viabilidade + passo a passo de instalação + consultas GAQL iniciais (campanhas, termos de pesquisa, conversões, leilão).

#### H2. Recomendações e aplicação automática
**Pesquisar:** a página de recomendações e a "aplicação automática" atuais, a pontuação de otimização e assistentes de IA no produto (ex.: assistentes/"Advisor" no Google Ads e no GA4).

**Fazer:**
- **Desligar a aplicação automática** de recomendações que mudam orçamento, lance, palavras-chave ou correspondência sem revisão `[OPINIÃO forte entre especialistas]`
- Avaliar cada recomendação: "aumenta o lucro ou só o gasto?"
- **A pontuação de otimização não é meta de desempenho**
- Usar os assistentes de IA para diagnóstico, mas validar os dados antes de agir

**Entregar:** lista de recomendações (aceitar/recusar + motivo) + configuração da aplicação automática.

#### H3. Scripts e regras automatizadas
**Fazer:**
- **Google Ads Scripts (JavaScript)** para alertas:
  - gasto sem conversão
  - queda de conversões
  - anúncios reprovados
  - links quebrados
  - orçamento acabando
  - termos novos caros
- **Regras automatizadas:** preferir notificações a ações automáticas
- Testar em modo de visualização antes de agendar

**Entregar:** scripts prontos + instruções de agendamento.

#### H4. Relatórios automáticos
- Script/rotina semanal (API/MCP ou exportação programada) que cruza o Google Ads com o CRM/vendas, aplica o fator de impostos e gera o relatório (F5)
- **Alertas de anomalia:** conversões zeradas, CPC fora da curva, gasto acima do ritmo

**Entregar:** script + modelo de saída + cron.

---

### I. Categorias reguladas

> Em qualquer categoria abaixo: **pesquisar a política do Google + a lei/norma brasileira atual** antes de criar anúncios. Na dúvida, recomendar revisão jurídica.

#### I1. Política e eleições
- **Desde 2024, o Google não permite anúncios políticos no Brasil**, e manteve a proibição nas eleições de 2026 `[OFICIAL]`
- **Ampla:** inclui eleições, partidos, candidatos, cargos eletivos, propostas de governo, projetos de lei e direito ao voto. Cuidado com campanhas de empresas sobre temas legislativos.
- Pesquise se a política mudou para os próximos pleitos

#### I2. Apostas (bets)
- **Google:** política de jogos de azar e apostas com **certificação** para o Brasil. Pesquise os requisitos atuais.
- **Lei:** só operadores autorizados pela SPA/Ministério da Fazenda
- **Desde 17/07/2026, advertências obrigatórias** em toda publicidade (Portaria SPA/MF nº 1.964/2026 e Portaria Interministerial nº 73/2026)
- **Proibido:** mirar menores, prometer ganho fácil, anunciar operador não autorizado

#### I3. Saúde
- **Google:** políticas de cuidados de saúde e medicamentos (certificações para farmácias, restrições para tratamentos, termos proibidos)
- **Conselhos profissionais** (CFM, CFO, CFF etc.) e **ANVISA**
- **Termos de pesquisa:** cuidado com segmentação baseada em condições de saúde e com termos sensíveis

#### I4. Serviços financeiros
- **Pesquisar:** se o Google exige **verificação de serviços financeiros** para anunciar no Brasil (crédito, empréstimos, investimentos, cripto) e os requisitos de divulgação (taxas, CET, autorização do Banco Central/CVM)
- Golpes com marcas de bancos e órgãos públicos são comuns: nunca imitar identidade visual de instituições

#### I5. Marcas, menores, álcool e outros
- **Marcas registradas:**
  - lances em palavras de marca de terceiros × uso da marca no texto do anúncio (o uso no texto pode ser restrito mediante reclamação do titular)
  - no Brasil, há decisões judiciais sobre concorrência desleal em links patrocinados: **recomendar avaliação jurídica** antes de usar marca de concorrente
- **ECA Digital (Lei nº 15.211/2025):** pesquisar as regras de publicidade e perfilamento envolvendo menores
- **Álcool:** idade mínima, regras do CONAR e do Google
- **Outros** (pesquisar caso a caso): armas, tabaco/vape, conteúdo adulto, encontros, serviços de recuperação de dados/"desbloqueio", serviços governamentais (2ª via de documentos), chaveiros/assistência técnica (categorias com verificação extra em alguns países)

---

## 7. Formato de entrega

### 7.1 Auditoria/plano completo → `relatorio-google-ads.md`
1. **Diagnóstico Executivo:** até 5 gargalos em Números, Mensuração, Estrutura, Termos/Anúncios e Página (impacto + por quê, em 1 linha)
2. **Números do negócio:** ticket, margem, CPA máximo, ROAS de equilíbrio, CPC máximo viável (com o fator de impostos)
3. **Alertas de conformidade e risco de conta:** políticas, categoria regulada, verificação, propriedade, segurança, pagamento
4. **Status da mensuração:** tag, conversões principais, conversões otimizadas, consentimento, offline/Data Manager, ligações/WhatsApp, GA4 (✅/⚠️/❌) + correções
5. **Plano de Ação em 3 Fases:**
   - **Fase 1 – Semana 1 (Base):** acessos, verificação, mensuração (B1–B4), negativas urgentes, configurações erradas (localização, redes), aplicação automática desligada
   - **Fase 2 – Mês 1 (Estrutura):** estrutura consolidada (C2), campanhas (C3–C9), anúncios e recursos (D), feed (C5), página (D4), experimento do AI Max (F4)
   - **Fase 3 – Contínuo:** termos de pesquisa (F2), rotina (F3), criativos, relatórios (F5), ROI (F6), registro de atualizações
6. **Plano de mídia:** campanhas, orçamentos (com e sem o fator de impostos), estratégia de lance e metas
7. **Kit Copy-Paste:**
   - palavras-chave por grupo
   - lista de negativas
   - 15 títulos + 4 descrições por grupo
   - sitelinks, frases de destaque e snippets
   - roteiros de vídeo (se PMax/YouTube)
   - tudo checado contra as políticas (seção 3 e I)
8. **Kit técnico:** código de conversão/GCLID/WhatsApp para o site, estrutura de dados para conversões offline, feed (se aplicável), consultas GAQL/scripts
9. **Painel de KPIs** com metas
10. **Fontes:** URLs com data e marcação (`[OFICIAL]`, `[TESTADO]`, `[OPINIÃO]`, `[ANTIGO]`, `[EUA]`/`[BETA]`)

### 7.2 Módulo específico → `modulo-{{codigo}}-{{tema}}.md`
Ex.: `modulo-G4-conta-suspensa.md`. Estrutura: situação → causa provável → passo a passo → textos/código prontos → fontes.

### 7.3 Estilo
- Português do Brasil, linguagem simples, tópicos curtos
- Primeiro o que fazer, depois o porquê
- Todo texto de anúncio pronto para copiar, respeitando os limites de caracteres atuais
- Valores em R$, dizendo se incluem impostos

---

## 8. Registro de atualizações

Mantenha `atualizacoes-google-ads.md`. Toda novidade encontrada no protocolo da seção 1 entra lá:

```
## {{AAAA-MM-DD}}
- O que mudou: ...
- Disponível no Brasil / em português / na conta? sim / não / beta / não confirmado
- Fonte: URL (data) [marcação]
- Impacto neste guia: seção X precisa ser revisada
- Ação na conta: nenhuma / revisar configuração Y
```

**Mudanças já conhecidas para conferir** (ponto de partida; confirme o status atual):
- 2024–2026: anúncios políticos proibidos no Brasil (mantido para 2026)
- 2025: PMax ganhou negativas no nível da campanha, relatório de canais, termos de pesquisa e mais relatórios; anúncios só para chamada descontinuados (migrar para o recurso de ligação)
- Jan/2026: o Google comunicou que a reforma tributária não aumentaria o preço dos anúncios no Brasil
- 2026: conversões otimizadas para web e leads unificadas em uma configuração; mudanças no uso de sinais de consentimento (jun/2026)
- 15/06/2026: importação de conversões offline/leads migrada para o Data Manager para novos usuários da API
- 01/09/2026: início da migração automática de campanhas de Pesquisa elegíveis para o AI Max
- Set/2026: AI Brief (beta) e novos relatórios do AI Max, inclusive em português
- 2026: Display migrando para Demand Gen; mudanças no lance inteligente em campanhas limitadas pelo orçamento; expansão de anúncios do Waze via PMax
- Out/2026: anúncios no Modo IA expandidos; Brasil previsto para o 4º trimestre de 2026

Quando uma mudança contradizer este guia, avise o usuário e sugira a atualização da seção.

---

## 9. Checklist final

- [ ] Protocolo de pesquisa (seção 1) feito para cada módulo usado
- [ ] Recursos confirmados como disponíveis no Brasil/em português/na conta (ou marcados `[EUA]`/`[BETA]`)
- [ ] Números do negócio calculados com o fator de impostos vigente
- [ ] Conversões principais = só ações com valor real; sem duplicação; testadas
- [ ] Localização em "Presença" (negócio local) e redes conferidas
- [ ] Termos de pesquisa revisados e negativas aplicadas (inclusive PMax/AI Max)
- [ ] Textos, imagens e URLs gerados por IA revisados
- [ ] Aplicação automática de recomendações sob controle
- [ ] Nenhuma recomendação de burla, deturpação ou promessa enganosa; categoria regulada verificada
- [ ] Conta, Merchant Center, GA4 e GTM no nome da empresa; acessos e segurança revisados
- [ ] LGPD respeitada (consentimento, Customer Match, formulários)
- [ ] Toda ação na conta depende de aprovação explícita do usuário
- [ ] Benchmarks só com fonte, data e país; números do Google marcados como autodeclarados
- [ ] Novidades registradas em `atualizacoes-google-ads.md`

## Conexões
- [[avaliar-valor-e-dificuldade-de-uma-palavra-chave]] — o livro sugere testar termos com anúncios pagos para estimar volume e conversão, e o guia traz o método atual de campanha
- [[configurar-conversoes-de-seo-e-valor-por-acao]] — o módulo B (mensuração antes de otimizar) trata de conversões, que o framework de SEO também exige
- [[otimizacao-para-buscas-verticais-imagem-video-produtos-e-noticias]] — o módulo C5 atualiza o Shopping e o Merchant Center descritos no livro (2014)
- [[guia-seo-brasil]] — o guia de SEO trata de Merchant Center e dados de produto
- [[guia-trafego-pago-meta-brasil]] — o guia de Meta cobre o outro grande canal de anúncios
- [[guia-social-media-brasil]] — o orgânico das redes fica no guia de social media
- [[developer]] — o rastreamento de conversões do módulo B é implementado pela área de desenvolvimento
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias diz quando abrir este guia e como ele se relaciona com os outros
- [[trafego]] — centralizador do assunto; este guia é pesquisa atual para o tema
- [[estrategia-gbp-seo-local]] — o guia de Google Ads cobre campanhas de anúncio, incluindo as locais
- [[guia-marketing-digital-brasil]] — a matriz de canais (C) remete ao guia de Google Ads
- [[regra-acesso-a-conta-de-anuncios-somente-leitura-e-autorizacao-a-cada-acao]] — nota derivada deste guia: Acesso à conta de anúncios: leitura por padrão e autorização a cada ação
- [[regra-revise-todo-conteudo-gerado-por-ia-em-anuncios]] — nota derivada deste guia: Revise todo conteúdo gerado por IA nos anúncios
- [[regra-desligue-a-aplicacao-automatica-de-recomendacoes]] — nota derivada deste guia: Desligue a aplicação automática de recomendações
- [[regra-nunca-burle-as-politicas-nem-engane-nos-anuncios]] — nota derivada deste guia: Nunca burle as políticas nem engane nos anúncios
- [[revisar-termos-de-pesquisa-e-negativas-e-manter-a-rotina-de-otimizacao]] — nota derivada deste guia: Revisar termos de pesquisa e negativas e manter a rotina de otimização
- [[planejar-as-conversoes-de-uma-conta-de-google-ads]] — nota derivada deste guia: Planejar as conversões de uma conta de Google Ads
- [[medir-ligacoes-e-whatsapp-em-campanhas]] — nota derivada deste guia: Medir ligações e WhatsApp em campanhas
- [[criar-anuncios-responsivos-e-recursos-para-o-mercado-brasileiro]] — nota derivada deste guia: Criar anúncios responsivos e recursos para o mercado brasileiro
- [[calcular-os-limites-de-custo-de-uma-campanha-de-anuncios]] — nota derivada deste guia: Calcular os limites de custo de uma campanha de anúncios
- [[anunciar-em-categorias-reguladas-no-brasil]] — nota derivada deste guia: Anunciar em categorias reguladas no Brasil
- [[definir-lances-orcamento-e-segmentacao-no-google-ads]] — nota derivada deste guia: Definir lances, orçamento e segmentação no Google Ads
- [[configurar-pesquisa-com-ai-max-e-performance-max]] — nota derivada deste guia: Configurar Pesquisa com AI Max e Performance Max
- [[auditar-uma-conta-de-google-ads]] — nota derivada deste guia: Auditar uma conta de Google Ads
- [[montar-o-feed-do-merchant-center-para-o-brasil]] — nota derivada deste guia: Montar o feed do Merchant Center para o Brasil
- [[escolher-o-tipo-de-campanha-e-estruturar-uma-conta-de-google-ads]] — nota derivada deste guia: Escolher o tipo de campanha e estruturar uma conta de Google Ads
