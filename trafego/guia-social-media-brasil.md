---
titulo: "Guia: Gestão de redes sociais (orgânico) no Brasil"
tipo: guia
assunto: trafego
origem: fornecido-pelo-usuario
escopo: "Presença orgânica nas redes sociais: diagnóstico, estratégia, conteúdo, operação, comunidade, social commerce, influência, checklists por plataforma, reputação, mensuração e automação (módulos A a L)"
revisao_do_guia: novembro/2026
processado_em: 2026-11-23
revisar_ate: 2027-02-23
status: pesquisa-atual
---

# Guia do Claude Code: Gestão de Redes Sociais (Social Media) – Brasil

> Manual de pesquisa e execução para o Claude Code planejar, produzir, operar e medir a presença **orgânica** de empresas brasileiras nas redes sociais (Instagram, TikTok, YouTube, WhatsApp, Facebook, LinkedIn, Kwai e outras).
> **Regra nº 1: as plataformas mudam recursos e regras de distribuição o tempo todo, e há muito "update de algoritmo" inventado na internet. Este guia diz O QUE pesquisar e COMO pensar. Antes de afirmar como uma rede funciona, confirme na fonte oficial atual.**
> Última revisão do guia: novembro/2026.
> Guias relacionados: `estrategia-gbp-seo-local.md` (Google Perfil da Empresa), `guia-trafego-pago-meta-brasil.md` (Meta Ads), `guia-google-ads-brasil.md` (Google Ads).

---

## Sumário

0. Como usar este guia
1. Protocolo de pesquisa atualizada (obrigatório)
2. Fontes por nível de confiança
3. Regras de conformidade e limites de atuação
4. Contexto brasileiro
5. Como as redes distribuem conteúdo hoje (modelo mental)
6. Módulos
   - **A. Diagnóstico**: A1 Objetivos e números · A2 Auditoria de perfis · A3 Auditoria de conteúdo · A4 Concorrência e referências · A5 Público e escuta
   - **B. Estratégia**: B1 Escolha de plataformas · B2 Posicionamento e tom de voz · B3 Pilares de conteúdo · B4 Jornada e funil
   - **C. Conteúdo e produção**: C1 Formatos · C2 Roteiros e ganchos · C3 SEO social · C4 Produção enxuta · C5 IA na produção · C6 Acessibilidade · C7 Direitos (música, imagem, marca)
   - **D. Planejamento e operação**: D1 Calendário editorial · D2 Frequência · D3 Fluxo de produção e aprovação · D4 Ferramentas · D5 Reaproveitamento
   - **E. Comunidade e atendimento**: E1 Comentários e DMs · E2 Social selling e automações · E3 UGC e prova social · E4 Comunidades
   - **F. Social commerce**: F1 Instagram/Facebook · F2 TikTok Shop · F3 WhatsApp · F4 Lives de venda
   - **G. Influência e parcerias**: G1 Seleção de creators · G2 Contrato e briefing · G3 Anúncios de parceria · G4 Afiliados · G5 Embaixadores e funcionários
   - **H. Checklists por plataforma**: H1 Instagram · H2 TikTok · H3 YouTube · H4 WhatsApp · H5 Facebook · H6 LinkedIn · H7 Kwai · H8 Outras
   - **I. Reputação e crise**: I1 Monitoramento · I2 Gestão de crise · I3 Perfis falsos e golpes · I4 Contas invadidas ou bloqueadas
   - **J. Mensuração**: J1 KPIs · J2 Rastreamento e atribuição · J3 Testes · J4 Relatórios · J5 ROI do orgânico
   - **K. Integração com mídia paga e SEO local**
   - **L. Automação e IA**: L1 APIs e agendamento · L2 IA no atendimento · L3 Rotinas do Claude Code
   - **M. Gestão profissional**: M1 Contrato, escopo e acessos · M2 Onboarding de cliente
7. Formato de entrega
8. Registro de atualizações
9. Checklist final

---

## 0. Como usar este guia

### 0.1 Variáveis da empresa

```
EMPRESA:          {{nome}}
SEGMENTO:         {{ex.: loja de peças, clínica, restaurante, e-commerce, B2B}}
ÁREA:             {{bairro/cidade | estado | Brasil}}
OBJETIVO PRINCIPAL: {{reconhecimento | comunidade | leads | vendas | atendimento | recrutamento}}
ONDE VENDE:       {{loja física | WhatsApp | site | marketplace | TikTok Shop}}
PÚBLICO:          {{quem compra; idade aproximada; região; o que valoriza}}
REDES ATUAIS:     {{links de cada perfil}}
ACESSOS:          {{Meta Business Suite, TikTok, YouTube, LinkedIn... quem é dono}}
EQUIPE/RECURSOS:  {{quem grava, edita, responde; horas por semana; orçamento de produção}}
ROSTO DA MARCA:   {{dono, equipe, ninguém (só produto)}}
TOM DE VOZ:       {{ex.: técnico e próximo, divertido, premium}}
CONCORRENTES/REFERÊNCIAS: {{3 a 5 perfis}}
INFLUENCIADORES:  {{já trabalha? quais?}}
FERRAMENTAS:      {{agendador, design, edição, relatório}}
CATEGORIA REGULADA? {{saúde, apostas, financeiro, álcool, infantil, política... ou não}}
```

Se faltar alguma variável, pergunte. Se não houver ninguém para responder, faça a melhor suposição e escreva qual foi. **A capacidade real de produção (horas/semana) define a estratégia.** Um plano que a equipe não consegue executar é um plano errado.

### 0.2 Modos de uso
- **Diagnóstico completo:** A → B, e então entregue o relatório da seção 7.
- **Planejamento** (estratégia + calendário): A1, A5, B, C, D.
- **Rotina mensal:** D1 (próximo mês) + J1–J4 + I1, mais o registro (seção 8).
- **Problema específico:** crise → I2; perfil falso → I3; conta invadida → I4; alcance caiu → A3 + seção 5 + J3.
- **Campanha/data específica:** B4 + C + D1 + G (se houver creators).

---

## 1. Protocolo de pesquisa atualizada (obrigatório)

Faça isto **antes de cada módulo**:

1. **Pegue a data de hoje** (`date`) e use o ano atual nas buscas.
2. **Leia o registro** `atualizacoes-social.md` (seção 8), se existir.
3. **Busque novidades da plataforma/tema nos últimos 60–90 dias**:
   - **Instagram:** `site:creators.instagram.com`, `site:about.instagram.com`, posts/vídeos de Adam Mosseri (chefe do Instagram)
   - **TikTok:** `site:newsroom.tiktok.com` (inclusive `?lang=pt-BR`), TikTok Creator Academy, TikTok for Business
   - **YouTube:** `site:blog.youtube`, canal Creator Insider, Central de Ajuda do YouTube
   - **WhatsApp:** `site:whatsappbusiness.com/pt-br`, `site:blog.whatsapp.com`
   - **LinkedIn:** `site:news.linkedin.com`, LinkedIn Marketing Solutions blog
   - **Meta (geral):** `site:about.fb.com/br/news`
   - **Notícias:** `site:socialmediatoday.com {{tema}}`, `site:socialmediaexaminer.com {{tema}}`, `site:meioemensagem.com.br {{tema}}`
4. **Confirme se o recurso existe no Brasil e no tipo de conta** (comercial/criador/pessoal). Muitos recursos começam nos EUA.
5. **Se a fonte atual contradizer este guia, a fonte atual vence.** Registre a mudança na seção 8.
6. **Marque cada informação:**
   - `[OFICIAL]` = plataforma (blog, central de ajuda, declaração de executivo da plataforma)
   - `[TESTADO]` = estudo com dados e método
   - `[OPINIÃO]` = blog/ferramenta/especialista sem método claro
   - `[ANTIGO]` = mais de 12 meses
   - `[EUA]` / `[FASE]` = não confirmado no Brasil ou liberado aos poucos
7. **Desconfie de "atualização do algoritmo":**
   - muitos sites publicam listas mensais de "updates" e "pesos" de sinais que a plataforma nunca anunciou
   - o Instagram, por exemplo, anuncia recursos e políticas, não "atualizações de algoritmo" com data
   - só trate como fato o que vier da plataforma
8. **Não invente números** (taxa de engajamento "boa", "melhor horário"). Benchmark só com fonte + data + país + segmento. Sem isso, use os dados da própria conta.

---

## 2. Fontes por nível de confiança

### Nível 1: Oficial
- Instagram para Criadores: https://creators.instagram.com
- Central de Ajuda do Instagram: https://help.instagram.com
- Diretrizes da Comunidade (Meta): https://transparency.meta.com/pt-br/policies/community-standards/
- Diretrizes de recomendação (Instagram/Facebook): pesquisar a página atual de "diretrizes de recomendação"
- TikTok Newsroom: https://newsroom.tiktok.com
- TikTok Diretrizes da Comunidade: https://www.tiktok.com/community-guidelines
- TikTok Shop (Central do Vendedor Brasil): pesquisar o portal oficial atual
- Blog do YouTube: https://blog.youtube
- Central de Ajuda do YouTube: https://support.google.com/youtube
- WhatsApp Business: https://whatsappbusiness.com/pt-br/
- LinkedIn Notícias: https://news.linkedin.com
- Meta Newsroom Brasil: https://about.fb.com/br/news/

### Nível 2: Dados de mercado
- DataReportal – Digital Brazil (anual): https://datareportal.com/reports/digital-2026-brazil (verificar se há edição mais nova)
- Panorama Mobile Time/Opinion Box (uso de apps no Brasil): https://www.mobiletime.com.br
- Pesquisas do Cetic.br (TIC Domicílios): https://cetic.br

### Nível 3: Notícias e especialistas
- Social Media Today: https://www.socialmediatoday.com
- Social Media Examiner: https://www.socialmediaexaminer.com
- Meio & Mensagem: https://www.meioemensagem.com.br
- Blogs de ferramentas (mLabs, RD Station, Buffer, Hootsuite, Later, Metricool): úteis, mas `[OPINIÃO]` até a fonte oficial confirmar

### Brasil: legal e regulatório
- CONAR – Guia de Marketing e Publicidade por Influenciadores Digitais (edição 2026): http://www.conar.org.br
- ANPD (LGPD e fiscalização do ECA Digital): https://www.gov.br/anpd
- Código de Defesa do Consumidor e Procon estadual
- Secretaria de Prêmios e Apostas/Ministério da Fazenda (promoções comerciais com sorteio e apostas)
- TSE (conteúdo político)
- Conselhos profissionais (CFM, CFO, CRN, OAB, CRECI etc.) e ANVISA, conforme o segmento

---

## 3. Regras de conformidade e limites de atuação

### 3.1 Nunca recomendar
- **Comprar seguidores, curtidas, visualizações ou comentários**, usar bots, "grupos de engajamento" automatizados ou apps que pedem a senha
- **Repostar conteúdo de terceiros sem permissão e sem transformação** (risco de direitos autorais e de perder recomendação; ver seção 5)
- **Depoimentos, avaliações ou "clientes" falsos**; números inflados; antes/depois manipulado
- **Deepfake** ou uso de imagem/voz de pessoa real sem autorização
- **Sorteio sem verificar a exigência legal** (ver 3.4)
- Publicidade **não identificada** (ver 3.2)
- Expor dados de clientes (nome completo, placa, telefone, pedido, prontuário) em posts ou respostas
- Conteúdo que sexualize ou exponha menores, ou que direcione publicidade a eles (ver 3.3)

### 3.2 Publicidade e influenciadores (CONAR 2026)
- O CONAR publicou em maio/2026 a **nova edição do Guia de Marketing e Publicidade por Influenciadores Digitais**, que substitui a versão de 2020 `[OFICIAL]`
- **A identificação da publicidade deve ser clara, ostensiva e imediata**, não escondida entre hashtags ou no fim da legenda
- O CONAR recomenda priorizar as **ferramentas nativas das plataformas** de identificação de conteúdo pago (ex.: "Parceria paga") no lugar de "#publi"/"#publicidade"
- **Afiliados contam como publicidade:** remuneração por clique/venda caracteriza publicidade e precisa ser identificada
- **IA:** conteúdos, avatares e influenciadores virtuais criados com IA devem ser transparentes
- **Responsabilidade compartilhada:** marca, agência e creator respondem. Revisar contratos (G2).
- **Menores em publicidade:** exige autorização dos responsáveis e alvará judicial
- **Pesquisar sempre o texto atual do guia** antes de campanhas com creators

### 3.3 ECA Digital (Lei nº 15.211/2025) – em vigor desde 17/03/2026 `[OFICIAL]`
- Plataformas devem verificar idade; menores de 16 anos com contas vinculadas a um responsável; proibição de perfilamento de crianças e adolescentes para publicidade direcionada
- **Para marcas e gestores:**
  - não criar conteúdo/campanhas que mirem crianças e adolescentes de forma comercial abusiva
  - nunca monetizar/impulsionar conteúdo que retrate menores de forma sexualizada ou com linguagem adulta (proibido)
  - **influenciadores mirins:** pesquisar as exigências atuais (alvará judicial para conteúdo comercial recorrente)
  - fiscalização pela ANPD; multas altas
- Pesquisar o decreto regulamentador e as orientações da ANPD atuais

### 3.4 Promoções, sorteios e concursos
- **Promoção comercial com sorteio/vale-brinde/assemelhados** pode exigir **autorização prévia** do órgão federal competente (hoje ligado ao Ministério da Fazenda – Lei nº 5.768/1971 e normas posteriores)
- **Pesquisar a regra e o órgão atuais antes de qualquer sorteio**
- **"Concurso cultural"** (sem sorte, sem compra) tem regras próprias. Ainda assim, verificar se a mecânica não caracteriza sorteio.
- Respeitar também as regras de promoção de cada plataforma
- **Na dúvida: recomendar revisão jurídica**

### 3.5 Outras normas
- **CDC:** ofertas e preços claros; informação verdadeira; política de troca
- **LGPD:** dados coletados em DMs/formulários/sorteios só com finalidade clara; opt-in para mensagens de marketing; atenção a prints com dados de clientes
- **STF (art. 19 do Marco Civil):** desde 2025, as plataformas respondem com mais rigor por conteúdo ilícito, especialmente em impulsionamentos pagos. Espere moderação mais rígida.
- **Conteúdo político e eleitoral:** regras do TSE em anos eleitorais; empresas devem evitar conteúdo que possa ser entendido como propaganda eleitoral
- **Categorias reguladas** (saúde, estética, apostas, álcool, financeiro): regras do conselho profissional/órgão + política da plataforma
- **Profissão:** a Lei nº 15.325/2026 (profissional multimídia) inclui o gerenciamento de redes sociais entre as áreas de atuação. Pesquisar se há exigências práticas para quem presta o serviço.

### 3.6 Limites do Claude Code
- Por padrão, o Claude Code **não acessa nem publica** nas contas. Ele pesquisa, analisa exportações/prints e **prepara** estratégias, calendários, roteiros, legendas, respostas, relatórios e códigos.
- Com acesso via API/ferramenta (L1):
  - **somente leitura** por padrão
  - **nunca** publicar, apagar, responder publicamente, enviar DM ou alterar perfil sem **aprovação explícita a cada ação**
  - registrar em `log-alteracoes.md`
- **Respostas a clientes** (comentários/DMs/reclamações): o Claude Code sugere; uma pessoa aprova e envia
- **Crises com risco jurídico:** orientar a procurar um advogado

---

## 4. Contexto brasileiro (aplicar em todos os módulos)

### 4.1 O cenário (confirmar os números da edição mais recente)
- O Brasil tinha cerca de **154 milhões de identidades de usuários de redes sociais em out/2026**, ~72% da população (DataReportal) `[TESTADO – metodologia própria]`
- **WhatsApp:** presente em praticamente todos os celulares; é canal de atendimento, venda, informação (Canais, Status, Comunidades) e também de "compartilhamento oculto" (conteúdo das redes repassado por WhatsApp)
- **Instagram:** principal vitrine e forte influência na decisão de compra
- **TikTok:** descoberta, entretenimento e busca; **TikTok Shop** lançado no Brasil em maio/2025, com crescimento acelerado e foco em lives e afiliados
- **YouTube:** alcance enorme, busca, conteúdo longo e Shorts
- **Facebook:** público mais velho, grupos locais, Marketplace
- **LinkedIn:** B2B, recrutamento, marca empregadora (dezenas de milhões de membros no Brasil)
- **Kwai:** relevante em parte do público (interior, classes C/D) `[confirmar dados atuais]`
- **Pinterest, Threads, X, Bluesky:** nichos. Avaliar caso a caso.

### 4.2 Cultura e linguagem
- **Humor, memes e trends** fazem parte da comunicação brasileira, mas use só quando combina com a marca e sem expor ninguém
- **Regionalismo:** sotaque, gírias, referências locais e festas regionais (São João, Parintins, Carnaval, rodeios) aproximam negócios locais
- **Rosto humano:** dono, equipe e clientes reais (com autorização) geram mais confiança que conteúdo genérico `[OPINIÃO consolidada]`
- **Futebol, novelas, reality shows:** grande conversa nacional. Cuidado com o uso de imagens, marcas e trechos protegidos por direito autoral (C7).

### 4.3 Calendário brasileiro
- Datas comerciais: volta às aulas, Carnaval, Páscoa, Dia das Mães, Dia dos Namorados (12/jun), festas juninas, Dia dos Pais, Dia do Cliente (15/set), Dia das Crianças, Black Friday, Natal
- Datas do segmento (ex.: Dia do Motociclista, Dia do Mecânico, datas de saúde, IPVA, safra)
- Eventos nacionais: Copa, Olimpíadas, eleições, BBB
- **Pesquise as datas do ano atual** (feriados móveis)

### 4.4 Confiança e golpes
- Golpes com **perfis falsos imitando marcas** e "falsas promoções" são comuns
- Mostrar sinais de empresa real (CNPJ, endereço, loja, equipe, avaliações do Google)
- Avisar os seguidores sobre os canais oficiais (I3)

### 4.5 Acessibilidade
- Legendas, texto alternativo e descrição de imagens ampliam o alcance e atendem à Lei Brasileira de Inclusão (C6)

---

## 5. Como as redes distribuem conteúdo hoje (modelo mental)

Confirme no protocolo da seção 1 se algo mudou. Em 2026, a lógica geral é esta:

- **A maior parte do alcance vem de recomendação** (pessoas que não seguem a conta), não só dos seguidores. Cada rede tem sistemas separados por área (feed, Stories, Reels/Explorar, busca).
- **Instagram** `[OFICIAL – declarações de Adam Mosseri]`:
  - os três sinais mais importantes citados: **tempo de visualização, curtidas por alcance e envios (compartilhamentos por DM) por alcance**
  - curtidas pesam um pouco mais para quem já segue; envios pesam mais para quem não segue
  - **Originalidade:** desde 30/04/2026, contas que publicam principalmente conteúdo de terceiros (Reels, fotos ou carrosséis) deixam de ser recomendadas. Voltam a ser elegíveis quando a maior parte das publicações dos últimos 30 dias é original. `[OFICIAL]`
  - Reels de até ~3 minutos podem ser recomendados para quem não segue; mais longos, não `[confirmar]`
  - **"Seu Algoritmo":** usuários podem ajustar os tópicos que veem. Conteúdo com tema claro ajuda a ser classificado.
  - Há relatos de **limite de hashtags por post** (5) desde dez/2025 `[confirmar]`
- **TikTok:**
  - recomendação baseada em interações, informações do vídeo e configurações
  - **busca** cada vez mais importante: o texto falado, o texto na tela, a legenda e a descrição ajudam a aparecer nas buscas `[OPINIÃO consolidada; confirmar]`
  - **Search Hubs** (posições pagas no topo da busca) e TikTok GO foram lançados em 2026 `[confirmar no Brasil]`
- **YouTube:**
  - obriga a declarar conteúdo realista alterado/sintético por IA e passou a **aplicar rótulos de IA automaticamente** e em locais mais visíveis desde maio/2026 `[OFICIAL]`
  - detecção de semelhança (rosto) para proteger contra deepfakes
- **Consequências práticas** `[OPINIÃO consolidada]`:
  - **conteúdo original e com tema claro** vence repost e conteúdo genérico
  - **retenção** (gancho + ritmo) e **compartilhamento** valem mais que curtida
  - **"SEO social":** palavras que o cliente busca, faladas e escritas (C3)
  - **consistência** possível > volume insustentável
  - seguidores são um ativo, mas **alcance por conteúdo** é o que move resultado

---

## 6. Módulos

Cada módulo tem: **Objetivo · Pesquisar · Fazer · Entregar.**

---

### A. Diagnóstico

#### A1. Objetivos e números do negócio
**Fazer:**
- Traduzir o objetivo em números: "mais vendas" → quantas conversas no WhatsApp/mês, quantos pedidos, quantos agendamentos
- Definir o **papel das redes** no funil: descoberta, confiança (prova social), atendimento, venda direta, recompra, recrutamento
- Levantar: ticket médio, margem, taxa de conversão do atendimento, origem atual dos clientes ("como nos conheceu?")
- **Definir 1 objetivo principal + 2 secundários** por trimestre

**Entregar:** objetivos SMART + KPIs ligados ao negócio (J1).

#### A2. Auditoria de perfis
**Analisar cada rede:**
- **Nome de usuário e nome do perfil:** marca + palavra-chave útil (ex.: "Peças para Motos | Araraquara"), se permitido e natural
- **Bio:** o que faz, para quem, onde, diferencial, CTA; link (com UTM, J2); botão de contato/WhatsApp
- **Categoria, tipo de conta** (comercial/criador), endereço, horário
- **Consistência com o Google Perfil da Empresa** (nome, telefone, endereço, horário, ver guia de GBP)
- **Destaques/fixados:** quem somos, produtos/serviços, preços/como comprar, avaliações, perguntas frequentes, localização
- **Verificação** (selo/assinatura de verificação, quando fizer sentido) e **segurança** (2FA, quem tem acesso, I4)
- **Perfis duplicados/abandonados** e perfis falsos (I3)

**Entregar:** tabela `Rede | Item | Situação | Correção` + bio reescrita para cada rede.

#### A3. Auditoria de conteúdo
**Pedir ao usuário:** exportação/prints dos insights dos últimos 90 dias (alcance, visualizações, retenção, envios, salvamentos, seguidores ganhos, visitas ao perfil, cliques no link/WhatsApp) por publicação.

**Analisar:**
- Top 10 e piores 10 por **alcance de não seguidores**, **envios**, **salvamentos** e **ações** (DM, link, WhatsApp). Não só curtidas.
- Formatos (Reels, carrossel, foto, Stories, lives) × desempenho
- **Ganchos dos 3 primeiros segundos** dos melhores vídeos
- **Originalidade:** % de conteúdo próprio × repost (risco da seção 5)
- Frequência real × planejada; buracos de publicação
- Temas/pilares que funcionam (B3)
- Qualidade técnica: áudio, luz, legenda, enquadramento vertical, texto legível

**Entregar:** relatório "o que funciona / o que não funciona / o que testar", com exemplos.

#### A4. Concorrência e referências
**Fazer:**
- Analisar 3–5 concorrentes locais/nacionais e 2–3 **referências fora do segmento** (boas ideias de formato)
- Anotar: formatos, frequência, ganchos, pilares, tom, uso de rosto humano, ofertas, interação nos comentários, creators
- **Biblioteca de Anúncios da Meta:** ver também o que eles impulsionam
- **Buscas nas redes:** pesquisar os termos do segmento (TikTok, Instagram, YouTube) e ver quem aparece
- **Lacunas:** perguntas que ninguém responde, formatos que ninguém usa, regiões sem presença forte

**Entregar:** tabela comparativa + 10 ideias de diferenciação.

#### A5. Público e escuta social
**Fontes:** comentários e DMs, perguntas no WhatsApp (sem dados pessoais), avaliações do Google/Reclame Aqui/marketplaces (da empresa e dos concorrentes), buscas nas redes e no Google, vendedores/atendentes.

**Fazer:**
- Mapear **dúvidas, dores, objeções, desejos e palavras exatas** do cliente
- Agrupar em 4–6 **motivações** (ex.: "urgência", "economia", "qualidade/original", "aprender a fazer")
- Identificar onde esse público passa tempo e que tipo de conteúdo consome

**Entregar:** mapa `Motivação | Dúvidas | Palavras do cliente | Conteúdos que respondem`.

---

### B. Estratégia

#### B1. Escolha de plataformas
**Fazer:** decidir **onde estar e com que intensidade**, pela matriz:

| Critério | Pergunta |
|---|---|
| Público | O cliente está lá (idade, região, classe, B2B/B2C)? |
| Objetivo | A rede serve ao objetivo (descoberta, venda, atendimento, recrutamento)? |
| Formato | A empresa consegue produzir o formato que a rede pede (vídeo vertical, vídeo longo, texto)? |
| Capacidade | Há horas/pessoas para manter com qualidade? |
| Concorrência | Há espaço ou está saturado? |

- **Regra prática:** 1–2 redes principais bem feitas + presença mínima nas demais (perfil completo, link para os canais principais) `[OPINIÃO]`
- **Negócio local típico:** Instagram + WhatsApp (+ Google Perfil da Empresa). TikTok/Kwai se houver quem grave vídeo. Facebook para público mais velho/grupos locais.
- **B2B:** LinkedIn + YouTube (+ Instagram para marca empregadora)
- **E-commerce:** Instagram + TikTok (+ TikTok Shop) + YouTube + WhatsApp

**Entregar:** matriz preenchida + decisão (principal, secundária, presença mínima, não usar).

#### B2. Posicionamento, tom de voz e identidade
**Fazer:**
- **Frase de posicionamento:** "Para [público] que [necessidade], somos [o quê] que [diferencial], porque [prova]"
- **Tom de voz:** 3–4 adjetivos com o que é e o que não é (ex.: "próximo, mas não infantil"); palavras que usamos/evitamos; como tratamos o cliente ("você", regionalismos)
- **Identidade visual:** cores, fontes, modelos de capa/carrossel, estilo de vídeo (legenda, cortes, música), consistentes com o site e o Perfil da Empresa
- **Guia de respostas:** como responder elogio, dúvida, reclamação, provocação

**Entregar:** manual de marca para redes (1–3 páginas) + modelos visuais sugeridos.

#### B3. Pilares de conteúdo
**Fazer:** definir 4–6 pilares ligados às motivações (A5) e ao objetivo (A1). Exemplo para negócio local:

| Pilar | Objetivo | Exemplos | % do mix |
|---|---|---|---|
| Educar (dúvidas reais) | Descoberta/busca | "Quando trocar a relação da moto?" | 30% |
| Provar (resultados, clientes, avaliações) | Confiança | Antes/depois real, depoimento, avaliação do Google | 20% |
| Bastidores e pessoas | Conexão | Equipe, dia a dia, chegada de mercadoria | 15% |
| Oferta e produto | Venda | Lançamento, promoção, kit, "chegou" | 20% |
| Comunidade e entretenimento | Alcance/compartilhamento | Trend adaptada, humor do segmento, evento local | 15% |

- Ajustar o % pelos dados (A3) e revisar a cada trimestre

**Entregar:** tabela de pilares com temas para 3 meses.

#### B4. Jornada e funil
**Fazer:**
- **Descoberta** (Reels/TikTok/Shorts, busca) → **consideração** (carrossel, Stories, destaques, avaliações, lives) → **conversão** (DM/WhatsApp, link, loja, TikTok Shop) → **pós-venda** (UGC, avaliação no Google, comunidade, recompra)
- Para cada etapa: formato, CTA e métrica
- **CTA para WhatsApp:** link com mensagem pré-preenchida por origem (J2)
- **Integração com o pago:** conteúdo orgânico vencedor vira anúncio (K)

**Entregar:** mapa da jornada com formatos, CTAs e métricas por etapa.

---

### C. Conteúdo e produção

#### C1. Formatos
**Pesquisar:** formatos, durações e proporções atuais de cada rede.

| Formato | Melhor para | Observações |
|---|---|---|
| Vídeo vertical curto (Reels, TikTok, Shorts, Kwai) | Descoberta, alcance | Gancho forte, legenda na tela, 15–90s na maioria dos casos `[OPINIÃO]` |
| Carrossel | Educar, salvar, compartilhar | 1ª imagem = promessa; última = CTA |
| Stories | Relacionamento, ofertas do dia, bastidores, enquetes | Para quem já segue |
| Lives | Venda, perguntas e respostas, lançamento | Divulgar antes; reaproveitar cortes |
| Vídeo longo (YouTube) | Busca, autoridade, decisão de compra | Título/thumbnail/capítulos |
| Texto/documento (LinkedIn, Threads) | B2B, opinião, autoridade | — |
| Canal do WhatsApp | Avisos, ofertas, novidades | Frequência baixa, conteúdo útil |

**Entregar:** formatos escolhidos por rede + especificações técnicas atuais.

#### C2. Roteiros e ganchos
**Fazer:**
- **Estrutura padrão de vídeo curto:**
  1. **gancho** (0–3s): promessa, problema, curiosidade, resultado
  2. **contexto** rápido
  3. **conteúdo** (passos, prova, demonstração)
  4. **CTA** (enviar para alguém, salvar, comentar palavra, chamar no WhatsApp)
- **Tipos de gancho:**
  - "Você está fazendo X errado"
  - "3 sinais de que…"
  - "Quanto custa…?"
  - "Olha o que chegou"
  - "Antes e depois"
  - pergunta real de cliente
  - demonstração visual sem fala
- **CTA de compartilhamento** ("manda pra quem tem moto") tem peso grande na recomendação para não seguidores (seção 5)
- **Escrever como se fala:** frases curtas, português do Brasil, termos do cliente
- **Carrossel:** capa com promessa clara → 1 ideia por lâmina → resumo → CTA

**Entregar:** 10 roteiros (gancho, falas/cenas, texto na tela, CTA, legenda) por mês, ligados aos pilares.

#### C3. SEO social (ser encontrado na busca das redes e do Google)
**Pesquisar:** como cada rede usa texto para busca hoje e se o conteúdo público de contas profissionais do Instagram aparece no Google `[confirmar]`.

**Fazer:**
- Palavra-chave principal **falada nos primeiros segundos, escrita na tela, na legenda e no título**
- **Nome do perfil** com termo de busca, quando natural (A2)
- **Legendas descritivas** (não só emojis); hashtags poucas e específicas (respeitar o limite atual)
- **Texto alternativo** nas imagens (C6)
- **YouTube:** título com o termo, descrição completa, capítulos, legendas revisadas
- **Termos locais:** cidade/bairro quando o negócio é local
- **Fonte de termos:** buscas sugeridas nas redes, autocompletar do Google, perguntas de clientes (A5)

**Entregar:** lista de 20–40 termos de busca por pilar + modelo de legenda otimizada.

#### C4. Produção enxuta
**Fazer:**
- **Gravação em lote:** 1 dia/turno por semana ou quinzena para vários vídeos
- **Kit mínimo:** celular, microfone de lapela, luz (janela/ring light), tripé
- **Áudio limpo importa mais que imagem perfeita** `[OPINIÃO consolidada]`
- **Modelos:** capas, carrosséis, legendas e vinhetas reutilizáveis
- **Edição:** apps de edição atuais (pesquisar termos de uso e se adicionam marca d'água)
- **Banco de pautas** sempre cheio (perguntas de clientes viram pauta)

**Entregar:** fluxo de produção semanal + checklist de gravação.

#### C5. IA na produção
**Fazer:**
- **Usar IA para:** ideias, roteiros, variações de gancho, legendas, títulos, corte de vídeos longos em curtos, legendas automáticas, tradução, resumo de comentários
- **Revisar tudo:** português, fatos, promessas, adequação à marca e às normas (CONAR, conselhos)
- **Declarar o uso de IA** quando a plataforma exigir (ex.: conteúdo realista alterado/sintético no YouTube; rótulos de IA da Meta/TikTok) e quando o CONAR exigir (avatares/influenciadores virtuais)
- **Nunca:** gerar "clientes" falsos, deepfake de pessoas reais, imagens que enganem sobre o produto
- **Originalidade:** IA para apoiar o conteúdo próprio, não para produzir em massa conteúdo genérico/repetido (risco de perder recomendação)

**Entregar:** lista de usos de IA aprovados + checklist de revisão + regra de rotulagem.

#### C6. Acessibilidade
- **Legendas** em todos os vídeos (revisadas)
- **Texto alternativo** em imagens e carrosséis
- Bom contraste e fonte legível; não depender só de cor
- Descrever a imagem na legenda quando o conteúdo for visual

**Entregar:** checklist de acessibilidade.

#### C7. Direitos: música, imagem e marca
**Fazer:**
- **Música:** contas comerciais devem usar a **biblioteca de áudio comercial/licenciada** da plataforma. Trends com música comercial podem não estar disponíveis ou gerar bloqueio. Pesquisar as regras atuais.
- **Imagem de pessoas** (clientes, funcionários): **autorização de uso de imagem por escrito**, com prazo e finalidade
- **Menores:** autorização dos responsáveis e regras do ECA Digital/CONAR (3.2, 3.3)
- **Conteúdo de terceiros** (vídeos, fotos, memes): pedir permissão e creditar; transformar de verdade
- **Marcas de terceiros** (montadoras, times, emissoras): cuidado com logos e trechos protegidos

**Entregar:** modelo de termo de autorização de imagem + regras de uso de música e de conteúdo de terceiros.

---

### D. Planejamento e operação

#### D1. Calendário editorial
**Fazer:**
- **Mensal:** distribuir os pilares (B3) e formatos (C1) por rede e dia
- Datas brasileiras e do segmento (4.3), lançamentos, estoque, eventos locais
- Espaço para **conteúdo reativo** (trends, notícias do setor), cerca de 10–20% `[OPINIÃO]`
- **Colunas:** data, rede, formato, pilar, tema, gancho, roteiro (link), CTA, responsável, status, link publicado, resultado

**Entregar:** calendário do mês (planilha) + temas do trimestre.

#### D2. Frequência
- **Consistência possível > volume insustentável**
- Definir pela capacidade (0.1). Exemplo de mínimo viável para negócio local: 3 vídeos curtos/semana + Stories na maioria dos dias + 1 carrossel/semana `[OPINIÃO]`
- **Testar a frequência** e ver o efeito no alcance por post (J3)
- Não publicar por publicar: post fraco consome a atenção da audiência

**Entregar:** frequência por rede + justificativa.

#### D3. Fluxo de produção e aprovação
**Fazer:**
- **Etapas:** pauta → roteiro → aprovação → gravação → edição → revisão (marca, português, normas) → agendamento → publicação → primeira hora de interação → resposta a comentários/DMs → registro do resultado
- **Prazos:** aprovação com antecedência (ex.: semana seguinte aprovada até quinta)
- **Responsáveis** claros (quem aprova o quê)
- **Checklist de publicação:** legenda, palavra-chave, CTA, marcação de parceria (se houver), música licenciada, acessibilidade, link/UTM

**Entregar:** fluxo com responsáveis + checklist de publicação.

#### D4. Ferramentas
**Pesquisar:** ferramentas e preços atuais.

- **Nativas:** Meta Business Suite, TikTok Studio, YouTube Studio, LinkedIn
- **Agendadores/relatórios usados no Brasil:** mLabs, Etus, Reportei; internacionais: Buffer, Hootsuite, Metricool, Later
- **Design/edição:** Canva, editores de vídeo móveis
- **Organização:** planilha/Trello/Notion para calendário e banco de pautas
- **Critérios:**
  - publica em todas as redes escolhidas?
  - relatório em português?
  - aprovação do cliente?
  - preço?
  - segurança (acesso por API oficial, sem pedir senha)?

**Entregar:** recomendação de ferramentas com custo mensal.

#### D5. Reaproveitamento
**Fazer:**
- **Um conteúdo "mãe"** (live, vídeo longo, artigo) vira vários: cortes, carrossel, Stories, post no LinkedIn, mensagem no Canal do WhatsApp, post no Perfil da Empresa no Google
- **Publicar o arquivo original em cada rede** (sem marca d'água de outra plataforma) `[OPINIÃO consolidada]`
- **Adaptar** formato, texto e duração a cada rede

**Entregar:** matriz de reaproveitamento.

---

### E. Comunidade e atendimento

#### E1. Comentários e DMs
**Fazer:**
- **Tempo de resposta:** definir uma meta (ex.: comentários em até 24h, DMs no horário comercial em até 1–2h)
- **Primeira hora após publicar:** responder comentários para estimular a conversa `[OPINIÃO]`
- **Respostas:**
  - personalizadas (não copiar e colar igual)
  - levar dúvidas de compra para o WhatsApp/DM
  - nunca expor dados do cliente
- **Moderação:** filtros de palavras ocultas, regras para ofensas/golpes/spam; **não apagar críticas legítimas** (I2)
- **Biblioteca de respostas** (B2): perguntas frequentes, preço, prazo, localização, reclamação, elogio

**Entregar:** guia de atendimento nas redes + biblioteca de respostas.

#### E2. Social selling e automações
**Pesquisar:** recursos e regras atuais de automação de DM (ferramentas oficiais e parceiros aprovados da Meta/TikTok), respostas automáticas e "comente palavra X para receber".

**Fazer:**
- Automações **só por ferramentas oficiais/parceiros aprovados** (sem apps que pedem senha)
- **"Comente X que eu te mando":** entregar o prometido, sem spam; registrar a origem; levar para o WhatsApp com consentimento
- **Roteiro de venda pela DM/WhatsApp:** entender a necessidade → recomendação → preço/condição → fechamento (Pix/link) → pós-venda
- **LGPD:** opt-in para mensagens de marketing; opção de sair

**Entregar:** fluxos de automação + roteiro de venda + mensagens prontas.

#### E3. UGC e prova social
**Fazer:**
- Incentivar clientes a postar e marcar (embalagem, cartão, QR code, incentivo permitido)
- **Repostar só com permissão**, creditando, e com conteúdo original suficiente na conta (seção 5)
- **Avaliações do Google** viram conteúdo (print sem dados sensíveis + resposta), integrado ao guia de GBP
- Depoimentos em vídeo com autorização (C7)

**Entregar:** programa de UGC + modelo de pedido de autorização.

#### E4. Comunidades
**Fazer:**
- **Canal do WhatsApp:** novidades e ofertas, frequência baixa
- **Comunidades/grupos do WhatsApp:** clientes fiéis, avisos (regras claras, moderação)
- **Canal de transmissão do Instagram**, grupos do Facebook (locais/nicho), lives recorrentes
- **Eventos presenciais** (encontros, oficinas) que viram conteúdo

**Entregar:** plano de comunidade com regras e frequência.

---

### F. Social commerce

#### F1. Instagram e Facebook
**Pesquisar:** recursos de venda disponíveis hoje no Brasil (marcação de produtos, catálogo, loja, checkout, Marketplace do Facebook).

**Fazer:** catálogo conectado, quando disponível; marcação de produtos; destaques "como comprar"; link para WhatsApp/site com UTM.

**Entregar:** configuração recomendada + fluxo de compra.

#### F2. TikTok Shop
**Pesquisar (muda rápido):**
- requisitos atuais para vendedores no Brasil (CNPJ, categorias, logística, taxas/comissões)
- programa de afiliados
- regras de lives
- políticas de produtos proibidos

**Fazer:**
- **Avaliar o encaixe:** produto visual, preço de impulso, margem para comissão de afiliados, logística
- **Conteúdo:** vídeos de demonstração, lives, afiliados (com identificação como publicidade, CONAR 2026)
- **Operação:** estoque, prazo, atendimento, avaliações na loja
- Comparar com os marketplaces em que a empresa já vende

**Entregar:** análise de viabilidade + plano de lançamento (se viável).

#### F3. WhatsApp
**Pesquisar:** catálogo, carrinho, pagamentos e recursos atuais do WhatsApp Business no Brasil.

**Fazer:**
- **Catálogo atualizado** (fotos, preços, descrições)
- **Respostas rápidas, etiquetas, mensagem de ausência**
- **Link do WhatsApp com mensagem pré-preenchida** por origem (J2)
- Ver o guia da Meta para o app × API e a IA de atendimento

**Entregar:** checklist do WhatsApp Business + mensagens prontas.

#### F4. Lives de venda
**Fazer:**
- **Roteiro:** abertura → oferta da live (exclusiva, com prazo real) → demonstração → perguntas → reforço da oferta → fechamento
- **Divulgação antes** (Stories, Canal do WhatsApp, posts); horário com base nos dados do público
- **Operação:** quem apresenta, quem responde comentários, quem fecha vendas, estoque separado
- **Reaproveitar os cortes** depois

**Entregar:** roteiro de live + checklist operacional.

---

### G. Influência e parcerias

#### G1. Seleção de creators
**Fazer:**
- **Micro e nano creators locais** tendem a ter mais confiança e custo menor para negócios locais `[OPINIÃO consolidada]`
- **Critérios:**
  - público na região certa (pedir prints dos dados demográficos)
  - engajamento real (comentários de verdade)
  - qualidade e tom do conteúdo
  - histórico de "publis" (identificadas?)
  - polêmicas
  - concorrentes já divulgados
- **Sinais de público falso:** picos de seguidores, comentários genéricos, alcance muito baixo para o número de seguidores
- **Brand safety:** revisar os últimos meses de conteúdo

**Entregar:** lista de 5–10 creators com análise + recomendação.

#### G2. Contrato e briefing (CONAR 2026)
**Fazer:**
- **Contrato com:**
  - entregáveis, prazos, aprovação, pagamento
  - **direito de uso do conteúdo** (prazo, onde, se pode virar anúncio)
  - exclusividade
  - **identificação publicitária** com a ferramenta nativa de parceria + menção clara
  - **uso de IA**
  - **regras para menores**
  - compliance com o CONAR/CDC
  - métricas a entregar (prints)
- **Briefing:** objetivo, mensagem principal, o que pode e o que não pode, prova, CTA, links/cupons rastreáveis, liberdade criativa (o creator conhece o público dele)
- Pesquisar o texto atual do guia do CONAR antes de fechar

**Entregar:** modelo de briefing + checklist de cláusulas para revisão jurídica.

#### G3. Anúncios de parceria
**Fazer:**
- Usar o conteúdo do creator como anúncio (anúncios de parceria da Meta, Spark Ads do TikTok), com autorização e prazo combinados
- Integrar ao `guia-trafego-pago-meta-brasil.md` (criativos e medição)

**Entregar:** plano de impulsionamento do conteúdo de creators.

#### G4. Afiliados
**Fazer:**
- **Afiliados são publicidade** (CONAR 2026): exigir identificação
- Programa com comissão clara, links/cupons rastreáveis, material de apoio, regras do que pode ser dito
- TikTok Shop e marketplaces têm programas próprios (F2)

**Entregar:** regras do programa + kit para afiliados.

#### G5. Embaixadores e funcionários
**Fazer:**
- Funcionários e o dono como rosto da marca (vídeos, LinkedIn)
- **Regras:** autorização de imagem, o que pode ser dito, identificação quando houver incentivo
- Clientes fiéis como embaixadores (benefícios, identificação quando houver contrapartida)

**Entregar:** programa de embaixadores + regras.

---

### H. Checklists por plataforma

> Antes de usar qualquer checklist: **protocolo da seção 1** (recursos e regras mudam).

#### H1. Instagram
- Conta profissional; bio + link com UTM + botão de contato/WhatsApp
- Destaques organizados; posts fixados (quem somos, oferta, prova)
- **Mix:** Reels (descoberta), carrossel (educar/salvar), Stories (relação), lives
- **Originalidade** (regra de 2026) e **envios** como sinal importante
- Testar com **Reels de teste** (mostrados primeiro para não seguidores), se disponível
- Ferramenta de "Parceria paga" em publis
- Palavras ocultas/moderação; respostas rápidas na DM

#### H2. TikTok
- Conta comercial; bio + link; categoria
- Vídeos nativos, com ritmo, legenda na tela, palavra-chave falada (busca)
- Trends adaptadas à marca (com áudio liberado para contas comerciais)
- Lives; TikTok Shop, se viável (F2)
- Identificação de conteúdo comercial (configuração de divulgação de conteúdo)

#### H3. YouTube
- Canal com nome, descrição, links, playlists por tema
- **Shorts** (descoberta) + **vídeos longos** (busca/decisão): títulos com termos de busca, thumbnails claras, capítulos, legendas
- **Declarar conteúdo realista alterado/sintético** (IA)
- Comentários fixados com CTA

#### H4. WhatsApp
- WhatsApp Business com perfil completo (endereço, horário, site, catálogo)
- **Canal do WhatsApp** (novidades/ofertas); Status com ofertas e bastidores
- Comunidades/grupos com regras
- Respostas rápidas, etiquetas, mensagem de saudação/ausência
- **LGPD:** só contatos com permissão para mensagens de marketing

#### H5. Facebook
- Página completa (igual ao Perfil da Empresa no Google)
- Grupos locais/nicho (participar com valor, sem spam); Marketplace, se fizer sentido
- Reaproveitar Reels e lives

#### H6. LinkedIn
- Página da empresa + **perfil do dono/líderes** (normalmente com mais alcance que a página) `[OPINIÃO]`
- Conteúdo: bastidores do negócio, cases, aprendizados, vagas, marca empregadora
- Formatos: texto, documento/carrossel, vídeo curto

#### H7. Kwai
- Avaliar se o público-alvo está lá (dados atuais)
- Reaproveitar vídeos verticais (arquivo original), com adaptação

#### H8. Outras (Pinterest, Threads, X, Bluesky)
- **Pinterest:** decoração, moda, receitas, DIY, casamento (busca visual de longo prazo)
- **Threads/X/Bluesky:** conversa e opinião; avaliar se o público e a capacidade justificam

---

### I. Reputação e crise

#### I1. Monitoramento e escuta
**Fazer:**
- Monitorar menções da marca, do dono e de produtos (busca nas redes, alertas, ferramentas)
- Monitorar **Reclame Aqui** e **avaliações do Google** (guia de GBP)
- Relatório mensal de sentimento: elogios, reclamações, temas recorrentes

**Entregar:** rotina de monitoramento + modelo de relatório de sentimento.

#### I2. Gestão de crise
**Fazer:**
- **Níveis:**
  - **1:** reclamação isolada → atendimento normal
  - **2:** várias reclamações iguais/repercussão local → resposta pública + correção
  - **3:** viral/imprensa/risco jurídico → comitê, resposta oficial, jurídico
- **Primeiras 2–24 horas:**
  - pausar posts agendados
  - entender os fatos
  - nota curta e humana ("estamos apurando e voltamos até X")
  - levar casos individuais para o privado
  - não discutir em público
  - não apagar críticas legítimas
- **Depois:** corrigir a causa, comunicar o que mudou, retomar a programação com cuidado
- **Ataques/difamação/golpes:** documentar (prints com data e link), denunciar na plataforma, orientar a buscar um advogado

**Entregar:** manual de crise de 1 página + modelos de nota (níveis 2 e 3) + lista de contatos.

#### I3. Perfis falsos e golpes
**Fazer:**
- Buscar periodicamente perfis que imitam a marca (nome parecido, logo, "promoção")
- **Denunciar** por falsificação de identidade/marca nos canais oficiais (com documentos da empresa)
- **Avisar os seguidores:** quais são os perfis e telefones oficiais; que a empresa não pede Pix/dados por DM
- **Verificação** da conta, quando disponível e viável

**Entregar:** checklist de proteção + post de aviso pronto.

#### I4. Contas invadidas ou bloqueadas
**Pesquisar:** fluxos oficiais atuais de recuperação (Meta Central de Contas, TikTok, YouTube/Google).

**Fazer:**
- **Prevenção:** 2FA em todas as contas; e-mail e telefone de recuperação atualizados; acessos pela ferramenta de gestão (não compartilhar senha); revisar acessos a cada 3 meses
- **Invasão:**
  1. fluxo oficial de recuperação
  2. avisar os seguidores por outros canais
  3. remover acessos estranhos
  4. revisar publicações/DMs enviadas
- **Bloqueio/restrição:** ler o motivo, corrigir e contestar pelo canal oficial; nunca comprar "serviço de desbloqueio"

**Entregar:** passo a passo de emergência + checklist de segurança.

---

### J. Mensuração

#### J1. KPIs por objetivo
| Objetivo | KPIs principais | Cuidado |
|---|---|---|
| Alcance/descoberta | Alcance de não seguidores, visualizações, retenção, envios | Seguidores sozinhos dizem pouco |
| Comunidade | Comentários reais, respostas, salvamentos, membros do canal/grupo | Curtida ≠ relacionamento |
| Leads/vendas | Visitas ao perfil, cliques no link/WhatsApp, conversas, pedidos, vendas | Medir até a venda (J2) |
| Atendimento | Tempo de resposta, % respondidas, satisfação | — |
| Reputação | Sentimento, reclamações resolvidas, nota no Google/Reclame Aqui | — |

**Entregar:** painel de KPIs com metas por trimestre.

#### J2. Rastreamento e atribuição
**Fazer:**
- **UTM** em todos os links (bio, Stories, YouTube):
  `utm_source=instagram&utm_medium=social&utm_campaign={{campanha}}&utm_content={{post}}`
- **WhatsApp:** mensagem pré-preenchida por origem ("Olá! Vim pelo Instagram"), etiquetas no WhatsApp Business ou página de redirecionamento própria que registra a origem (site PHP)
- **Cupons por canal/creator**
- Pergunta "como nos conheceu?" no atendimento/caixa
- GA4 para o tráfego do site; CRM/planilha para conversas e vendas

**Entregar:** padrão de UTMs + links prontos + código de redirecionamento (se aplicável).

#### J3. Testes
**Fazer:**
- **Uma variável por teste:** gancho, formato, duração, horário, CTA, capa
- **Ferramentas de teste** da plataforma (ex.: Reels de teste no Instagram), quando disponíveis
- Comparar a média de várias publicações, não um post isolado
- Registrar em `testes-social.md`: hipótese, período, resultado, aprendizado

**Entregar:** plano de testes do mês.

#### J4. Relatórios
**Fazer:**
- **Relatório mensal de 1 página:**
  - objetivo e KPIs × meta
  - top 3 conteúdos (por que funcionaram)
  - piores 3 (por quê)
  - crescimento
  - conversas/leads/vendas atribuídos
  - sentimento
  - aprendizados
  - plano do próximo mês
- **Fontes:** insights nativos, ferramenta de relatório (D4), GA4, CRM/planilha

**Entregar:** modelo de relatório + exemplo preenchido.

#### J5. ROI do orgânico
**Fazer:**
- **Custo:** horas da equipe × custo/hora + ferramentas + produção + creators
- **Resultado:** leads/vendas atribuídos (J2) × margem
- **ROI** = (lucro atribuído − custo) ÷ custo
- Incluir valor indireto com cuidado (prova social que ajuda o pago e o Google), sem inflar

**Entregar:** cálculo de ROI com premissas explícitas.

---

### K. Integração com mídia paga e SEO local
- **Orgânico como laboratório:** conteúdos com alto envio/retenção viram anúncios (ver `guia-trafego-pago-meta-brasil.md`, módulo D)
- **Creators:** anúncios de parceria/Spark Ads (G3)
- **Google Perfil da Empresa:** postar novidades/ofertas também no perfil; avaliações do Google como conteúdo; mesmo NAP e horário (ver `estrategia-gbp-seo-local.md`)
- **YouTube:** vídeos que respondem dúvidas reforçam o Google Ads (públicos de remarketing) e o SEO
- **Calendário único:** orgânico, pago e ofertas alinhados

---

### L. Automação e IA

#### L1. APIs e agendamento
**Pesquisar:** APIs oficiais atuais e requisitos de acesso (Instagram/Facebook via Graph API, TikTok Content Posting API, YouTube Data API, LinkedIn API) e as ferramentas parceiras.

**Regras:**
- Acesso só por API oficial/parceiros (nunca por senha compartilhada)
- Credenciais em `.env`; permissões mínimas
- **Fase 1:** leitura (insights, comentários para análise)
- **Fase 2:** agendamento/publicação **com aprovação explícita** de cada post

**Entregar:** viabilidade + configuração + scripts de leitura de insights.

#### L2. IA no atendimento (DM e WhatsApp)
**Pesquisar:** agentes de IA oficiais atuais (ex.: Meta Business Agent no WhatsApp/Messenger/Instagram, lançado em 2026), custos, disponibilidade no Brasil e regras de transparência.

**Fazer:**
- Usar para perguntas frequentes, triagem e horário fora do expediente
- **Sempre** com transferência para humano, revisão das respostas e transparência de que é atendimento automatizado
- Não deixar a IA prometer preço/prazo/condição sem base atualizada

**Entregar:** escopo da IA + base de conhecimento + regras de transferência.

#### L3. Rotinas do Claude Code
- **Mensal:** gerar o calendário (D1), 10 roteiros (C2), legendas otimizadas (C3), plano de testes (J3)
- **Semanal:** resumir comentários/DMs (exportados, sem dados pessoais) em temas e dúvidas → novas pautas
- **Mensal:** ler as exportações de insights e gerar o relatório (J4)
- **Trimestral:** revisar a estratégia (B), pilares e registro (seção 8)
- Tudo como **proposta** para aprovação humana

---

### M. Gestão profissional (agência/freelancer)

#### M1. Contrato, escopo e acessos
**Fazer:**
- **Escopo claro:** redes, quantidade e tipos de conteúdo/mês, quem grava, rodadas de revisão, atendimento a comentários/DMs (sim/não, horários), relatórios, impulsionamento (verba separada), creators
- **O cliente é dono das contas.** O acesso é dado pela ferramenta de gestão (ex.: parceiro no Meta Business Suite), nunca como dono único.
- **Responsabilidades:** aprovação do conteúdo, veracidade das ofertas, autorizações de imagem, conformidade (CONAR/CDC/LGPD)
- **Profissão:** pesquisar se a Lei nº 15.325/2026 (profissional multimídia) traz exigências práticas para contratos/registro
- **Saída do contrato:** devolução de acessos, arquivos e senhas

**Entregar:** checklist de cláusulas para revisão jurídica + modelo de escopo.

#### M2. Onboarding de cliente
**Checklist:**
1. Variáveis da seção 0.1 preenchidas
2. Acessos concedidos corretamente + 2FA
3. Manual de marca/tom de voz (B2)
4. Banco de fotos/vídeos/logos
5. Contatos para aprovação e crise
6. Diagnóstico (A) e estratégia (B) aprovados
7. Calendário do primeiro mês
8. Metas e formato do relatório combinados

**Entregar:** checklist de onboarding + cronograma do primeiro mês.

---

## 7. Formato de entrega

### 7.1 Diagnóstico + estratégia → `relatorio-social-media.md`
1. **Diagnóstico Executivo:** até 5 gargalos em Perfis, Conteúdo, Frequência/Capacidade, Atendimento e Mensuração (impacto + por quê, em 1 linha)
2. **Alertas de conformidade e risco:** CONAR, LGPD, ECA Digital, sorteios, direitos, segurança das contas
3. **Estratégia:** plataformas (B1), posicionamento e tom (B2), pilares (B3), jornada (B4)
4. **Plano de Ação em 3 Fases:**
   - **Fase 1 – Semana 1 (Base):** segurança/acessos, perfis e bios otimizados (A2), destaques, links com UTM, WhatsApp Business ajustado, biblioteca de respostas
   - **Fase 2 – Mês 1 (Operação):** calendário (D1), primeiros roteiros (C2), fluxo de produção (D3), testes (J3), creators (G), se houver
   - **Fase 3 – Contínuo:** produção e publicação, comunidade (E), monitoramento (I1), relatórios (J4), revisão trimestral
5. **Calendário do primeiro mês** (tabela)
6. **Kit Prático Copy-Paste:**
   - bios reescritas por rede
   - 10 roteiros de vídeo curto (gancho, cenas, texto na tela, CTA)
   - 4 roteiros de carrossel
   - 10 legendas otimizadas (SEO social)
   - biblioteca de respostas (elogio, dúvida de preço, prazo, localização, reclamação)
   - post de aviso de canais oficiais (golpes)
   - nota de crise (níveis 2 e 3)
7. **Painel de KPIs** com metas
8. **Fontes:** URLs com data e marcação (`[OFICIAL]`, `[TESTADO]`, `[OPINIÃO]`, `[ANTIGO]`, `[EUA]`/`[FASE]`)

### 7.2 Entregas mensais
- `calendario-{{AAAA-MM}}.md`/planilha
- `roteiros-{{AAAA-MM}}.md`
- `relatorio-{{AAAA-MM}}.md`

### 7.3 Módulo específico → `modulo-{{codigo}}-{{tema}}.md`
Ex.: `modulo-I2-crise.md`. Estrutura: situação → diagnóstico → passo a passo → textos prontos → fontes.

### 7.4 Estilo
- Português do Brasil, linguagem simples, tópicos curtos
- Primeiro o que fazer, depois o porquê
- Textos para publicação prontos para copiar, no tom de voz da marca
- Sem promessas de "viralizar"

---

## 8. Registro de atualizações

Mantenha `atualizacoes-social.md`. Toda novidade encontrada no protocolo da seção 1 entra lá:

```
## {{AAAA-MM-DD}}
- Plataforma:
- O que mudou: ...
- Disponível no Brasil / no tipo de conta? sim / não / em fases / não confirmado
- Fonte: URL (data) [marcação]
- Impacto neste guia: seção X precisa ser revisada
- Ação: nenhuma / ajustar estratégia Y
```

**Mudanças já conhecidas para conferir** (ponto de partida; confirme o status atual):
- Mai/2025: TikTok Shop lançado no Brasil (forte crescimento no 1º ano, lives e afiliados)
- Jan/2025: Mosseri cita tempo de visualização, curtidas por alcance e envios por alcance como os principais sinais do Instagram
- Dez/2025: "Seu Algoritmo" no Instagram (controle de tópicos pelo usuário); relatos de limite de hashtags por post
- Jan/2026: Lei nº 15.325/2026 (profissional multimídia, inclui gerenciamento de redes sociais)
- 17/03/2026: ECA Digital em vigor (verificação de idade, contas de menores de 16 vinculadas, proibição de perfilamento de menores para publicidade)
- 30/04/2026: Instagram estende a penalidade de originalidade (sem recomendação) a fotos e carrosséis
- Mai/2026: novo Guia do CONAR para influenciadores (vigência a partir de junho/2026): identificação ostensiva, ferramentas nativas, afiliados, IA, menores
- Mai/2026: YouTube amplia e automatiza os rótulos de conteúdo gerado por IA
- Mai/2026: TikTok lança Search Hubs e TikTok GO (posições e reservas na busca) `[confirmar no Brasil]`
- Jun/2026: Meta Business Agent (IA de atendimento) no WhatsApp, Messenger e Instagram

Quando uma mudança contradizer este guia, avise o usuário e sugira a atualização da seção.

---

## 9. Checklist final

- [ ] Protocolo de pesquisa (seção 1) feito para cada módulo/plataforma usada
- [ ] "Updates de algoritmo" só aceitos com fonte oficial
- [ ] Estratégia compatível com a capacidade real de produção
- [ ] Perfis completos e consistentes com o Google Perfil da Empresa
- [ ] Conteúdo majoritariamente original; reposts só com permissão e transformação
- [ ] Publicidade e afiliados identificados conforme o CONAR 2026 (ferramenta nativa + clareza)
- [ ] ECA Digital respeitado (menores, perfilamento, alvarás)
- [ ] Sorteios/promoções verificados juridicamente
- [ ] Autorizações de imagem e música licenciada
- [ ] LGPD respeitada (dados de clientes, opt-in, respostas sem dados pessoais)
- [ ] Contas com 2FA e acessos corretos; plano de crise pronto
- [ ] UTMs/rastreamento até a conversa/venda
- [ ] Toda publicação/resposta/ação na conta depende de aprovação humana
- [ ] Benchmarks só com fonte, data e país
- [ ] Novidades registradas em `atualizacoes-social.md`

## Conexões
- [[avaliar-uma-rede-social-e-medir-resultados-para-seo]] — o framework avalia redes por experimento e métricas, e o guia traz plataformas, KPIs e rotina atuais
- [[planejar-uma-campanha-de-marketing-de-conteudo]] — os pilares de conteúdo e o calendário se apoiam no método de campanha de conteúdo do livro
- [[fazer-outreach-com-influenciadores]] — o módulo G (creators e parcerias) atualiza o trabalho com influenciadores, com as regras de publicidade de 2026
- [[guia-trafego-pago-meta-brasil]] — o guia de Meta trata do impulsionamento pago do conteúdo
- [[estrategia-gbp-seo-local]] — o módulo K liga redes sociais ao perfil local
- [[guia-seo-brasil]] — o SEO social liga as redes à busca
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias diz quando abrir este guia e como ele se relaciona com os outros
- [[trafego]] — centralizador do assunto; este guia é pesquisa atual para o tema
- [[guia-google-ads-brasil]] — o orgânico das redes fica no guia de social media
- [[guia-marketing-digital-brasil]] — a matriz de canais (C) remete ao guia de redes sociais
- [[regra-respeite-direitos-promocoes-menores-e-publicidade-nas-redes]] — nota derivada deste guia: Respeite direitos, promoções, menores e identificação de publicidade nas redes
- [[produzir-e-operar-conteudo-de-redes-sociais]] — nota derivada deste guia: Produzir e operar conteúdo de redes sociais
- [[gerir-reputacao-crise-e-seguranca-das-contas-nas-redes]] — nota derivada deste guia: Gerir reputação, crise e segurança das contas nas redes
- [[medir-redes-sociais-integrar-ao-pago-e-gerir-como-agencia]] — nota derivada deste guia: Medir redes sociais, integrar ao pago e gerir como agência
- [[planejar-a-estrategia-de-redes-sociais-para-o-brasil]] — nota derivada deste guia: Planejar a estratégia de redes sociais para o Brasil
- [[vender-pelas-redes-e-trabalhar-com-influenciadores-no-brasil]] — nota derivada deste guia: Vender pelas redes e trabalhar com influenciadores no Brasil
