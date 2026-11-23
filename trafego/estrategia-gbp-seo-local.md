---
titulo: "Guia: Google Business Profile e SEO local (Brasil)"
tipo: guia
assunto: trafego
origem: fornecido-pelo-usuario
escopo: "Perfil da Empresa no Google e SEO local para empresas brasileiras: diagnóstico, otimização do perfil, avaliações, conta e suspensões, citações, busca por IA e mensuração (25 módulos A a F)"
revisao_do_guia: não informada no guia
processado_em: 2026-11-23
revisar_ate: 2027-02-23
status: pesquisa-atual
---

# Guia do Claude Code: Google Business Profile + SEO Local (Brasil)

> Manual de pesquisa e execução para o Claude Code montar estratégias de Google Business Profile (GBP) e SEO local para empresas brasileiras.
> **Regra nº 1: este guia diz O QUE pesquisar e COMO pensar. As regras e recursos do Google mudam o tempo todo. Sempre confirme na fonte atual antes de recomendar.**

---

## Sumário

0. Como usar este guia
1. Protocolo de pesquisa atualizada (obrigatório)
2. Fontes por nível de confiança
3. Regras de conformidade e limites de atuação
4. Contexto brasileiro
5. Módulos
   - **A. Diagnóstico e pesquisa**: A1 Site · A2 Palavras-chave e intenção · A3 Local Rank Grid · A4 Concorrência por região
   - **B. Otimização e conversão**: B1 Perfil · B2 CRO no perfil · B3 Fotos e vídeos
   - **C. Reputação**: C1 Avaliações · C2 Sentimento e reputação · C3 Avaliações falsas · C4 Avaliações removidas · C5 Crises e reclamações
   - **D. Conta, segurança e problemas**: D1 Acessos · D2 Transferência e recuperação · D3 Alterações não autorizadas · D4 Suspensão e recursos · D5 Duplicados e conflitos · D6 Endereço, nome e rebranding · D7 Múltiplas unidades e franquias
   - **E. Autoridade e IA**: E1 Citações Brasil · E2 Link building local · E3 PR digital · E4 SEO para IA e buscas conversacionais
   - **F. Mensuração e automação**: F1 Rastreamento de leads · F2 Ligações, WhatsApp e agendamentos · F3 CRM e atendimento · F4 API e automações · F5 Dashboards · F6 ROI
6. Formato de entrega
7. Registro de atualizações
8. Checklist final

---

## 0. Como usar este guia

### 0.1 Variáveis da empresa

```
EMPRESA:        {{nome da empresa}}
SITE:           {{https://www.site-da-empresa.com.br}}
PERFIL GOOGLE:  {{link do Perfil da Empresa no Google / Maps}}
SEGMENTO:       {{ex.: loja de peças, oficina, clínica}}
CIDADE/REGIÃO:  {{cidade principal + bairros/cidades atendidas}}
TIPO:           {{loja física | atende no local do cliente | híbrido}}
UNIDADES:       {{1 | várias | franquia}}
HORÁRIO:        {{horário real de funcionamento}}
CONCORRENTES:   {{3 a 5 concorrentes locais, se souber}}
REDES:          {{Instagram, Facebook, WhatsApp, YouTube, TikTok, marketplaces...}}
FERRAMENTAS:    {{GA4, Search Console, CRM, call tracking, ferramenta de grid...}}
PROBLEMA ATUAL: {{ex.: perfil suspenso, avaliações falsas, queda no ranking, nenhum}}
```

Se alguma variável estiver vazia, pergunte antes de seguir. Se não houver ninguém para responder, faça a melhor suposição e escreva qual foi.

### 0.2 Modos de uso
- **Diagnóstico completo:** rode os módulos A, B, C1 e E1, e então entregue o relatório da seção 6.
- **Problema específico:** vá direto ao módulo (ex.: perfil suspenso → D4; avaliações falsas → C3).
- **Rotina mensal:** C2 + D3 + F5 + F6, mais uma atualização do registro (seção 7).

Sempre que um módulo depender de outro, avise e rode o módulo necessário antes.

---

## 1. Protocolo de pesquisa atualizada (obrigatório)

Faça isto **antes de cada módulo**:

1. **Pegue a data de hoje** (`date`) e use o ano atual nas buscas.
2. **Leia o registro** `atualizacoes-gbp.md` (seção 7), se existir.
3. **Busque novidades do tema nos últimos 90 dias**:
   - `"Google Business Profile" {{tema}} {{ano atual}}`
   - `site:seroundtable.com "Google Business Profile" {{tema}}`
   - `site:searchengineland.com {{tema}} local`
   - `site:sterlingsky.ca {{tema}}`
   - `site:whitespark.ca {{tema}}`
   - Em português: `"Perfil da Empresa no Google" {{tema}}`
4. **Confirme na fonte oficial** (support.google.com/business) se o recurso ou regra ainda existe **e se está disponível no Brasil**. Muitos recursos são lançados só nos EUA.
5. **Se a fonte atual contradizer este guia, a fonte atual vence.** Registre a mudança na seção 7.
6. **Marque cada informação:**
   - `[OFICIAL]` = regra/documentação do Google
   - `[TESTADO]` = estudo ou teste com dados
   - `[OPINIÃO]` = recomendação de especialista sem teste
   - `[ANTIGO]` = mais de 2 anos
   - `[EUA]` = recurso ainda não confirmado no Brasil
7. **Não invente números.** Toda estatística precisa ter URL + data.

---

## 2. Fontes por nível de confiança

### Nível 1: Oficial (sempre vence)
- Central de Ajuda: https://support.google.com/business (`?hl=pt-BR`)
- Diretrizes: https://support.google.com/business/answer/3038177
- Ranking local: https://support.google.com/business/answer/7091
- **Google Business Profile Playbooks (2026):** guias oficiais de boas práticas, incluindo versões por setor. Procure o link no site/blog oficial do Google, não use encurtadores de terceiros.
- Search Central: https://developers.google.com/search/docs/appearance/establish-business-details?hl=pt-br
- Dados estruturados: https://developers.google.com/search/docs/appearance/structured-data/local-business
- API: https://developers.google.com/my-business

### Nível 2: Pesquisas com dados
- Whitespark – Local Search Ranking Factors: https://whitespark.ca/local-search-ranking-factors
- Whitespark – Guia de GBP: https://whitespark.ca/google-business-profile-guide/
- BrightLocal: https://www.brightlocal.com/learn/ e https://www.brightlocal.com/research/

### Nível 3: Testes e especialistas
- Sterling Sky: https://www.sterlingsky.ca/blog/
- Near Media: https://nearmedia.co
- LocalU: https://localu.org/blog

### Nível 4: Notícias (para saber o que mudou)
- Search Engine Roundtable: https://www.seroundtable.com
- Search Engine Land: https://searchengineland.com/google-business-profile
- Search Engine Journal: https://www.searchenginejournal.com/category/local-search/

### Brasil (legal e reputação)
- LGPD / ANPD: https://www.gov.br/anpd
- Reclame Aqui: https://www.reclameaqui.com.br
- Código de Defesa do Consumidor e Procon estadual

> Não navegue no fórum da comunidade do Google (support.google.com/business/community). Ele exige navegação interativa e gasta tokens sem retorno proporcional. Use os artigos de ajuda e as fontes acima.

---

## 3. Regras de conformidade e limites de atuação

### 3.1 Nunca recomendar (marque `[RISCO DE SUSPENSÃO]` se uma fonte sugerir)
- Palavra-chave no nome que não faz parte do nome real da empresa
- Endereço falso, coworking virtual ou caixa postal
- **Horário falso** (ex.: 24h para ranquear)
- Avaliações falsas, compradas, de funcionários ou incentivadas (desconto/brinde)
- Pedir avaliação só para clientes satisfeitos (*review gating*)
- Criar perfis duplicados para a mesma unidade
- Denunciar avaliações ou concorrentes que **não violam** as políticas
- Fotos de banco de imagem passando por fotos reais

### 3.2 Alterações que podem disparar revisão ou nova verificação
- Trocar o nome, o endereço, a área de atendimento ou a **categoria principal**
- Muitas alterações de uma vez

**Regra:** uma alteração sensível por vez. Aguarde a aprovação antes da próxima e documente data, antes e depois.

### 3.3 Limites do Claude Code
- O Claude Code **não acessa a conta do Google** do usuário. Ele pesquisa, analisa e **prepara** textos, códigos, checklists e recursos para o usuário executar.
- Qualquer ação que **escreva** no perfil via API (seção F4) só acontece com autorização explícita do usuário, e uma por vez.
- Se não conseguir abrir o Google Maps via fetch/curl, **tente uma vez**. Depois peça prints ao usuário e continue o que não depende do Maps.
- Em casos jurídicos (difamação, concorrência desleal, ameaças), oriente a procurar um **advogado**. Não dê parecer jurídico.

---

## 4. Contexto brasileiro (aplicar em todos os módulos)

### 4.1 Comportamento
- **WhatsApp é o principal canal de contato.** Toda estratégia deve levar ao WhatsApp.
  - Pesquise o estado atual do **número de WhatsApp no Perfil da Empresa** (houve novidades em 2026) e como ativar no Brasil.
- **Instagram é a "vitrine"** e é usado para pesquisar antes de comprar.
- **Reclame Aqui** pesa na decisão, principalmente em lojas online e serviços.
- Pagamentos importam: **Pix**, cartão e parcelamento nos atributos, na descrição e no site.

### 4.2 Linguagem
- Use termos reais do brasileiro, incluindo regionais e informais (ex.: "moto" e "motoca", "conserto" e "manutenção").
- Inclua buscas com bairro e "perto de mim" / "próximo" / "aberto agora".

### 4.3 Legal
- **LGPD:** contato só com cliente que forneceu os dados, sempre com opção de sair (opt-out). Nunca expor dados do cliente em respostas públicas.
- **CDC:** preços e ofertas claros e verdadeiros.
- **Documentos brasileiros que servem de prova** (verificação, recurso e mudança de endereço): Cartão CNPJ, alvará de funcionamento, conta de luz/água/telefone no endereço, nota fiscal, contrato de locação, fotos da fachada com placa.

### 4.4 Plataformas
Não sugira plataformas americanas sem uso no Brasil (Yelp, BBB, Angi, Nextdoor etc.).

---

## 5. Módulos

Cada módulo tem: **Objetivo · Pesquisar · Fazer · Entregar.**

---

### A. Diagnóstico e pesquisa

#### A1. Análise do site da empresa
**Objetivo:** ver se o site reforça o perfil e converte.

**Fazer:**
- NAP (nome, endereço, telefone) igual ao do Perfil no Google, em todas as páginas (rodapé)
- Cidade/bairro no `<title>`, H1 e textos das páginas principais
- Uma página por serviço/categoria principal; páginas por região só com conteúdo real
- Página de contato com mapa, horário, WhatsApp e botão "Como chegar"
- CNPJ e razão social visíveis
- JSON-LD `LocalBusiness` (ou subtipo, ex.: `AutoPartsStore`) com nome, endereço, telefone, horário, geo e `sameAs`
- Horário do site igual ao do perfil
- Velocidade no celular, HTTPS, sitemap, robots.txt
- Search Console e GA4 instalados

**Entregar:** tabela `Problema | Impacto | Como corrigir | Esforço`, e código pronto se o site for PHP/HTML puro.

#### A2. Palavras-chave e intenção de busca local
**Objetivo:** descobrir como o cliente realmente busca e o que ele quer em cada busca.

**Pesquisar:**
- Mudanças recentes em buscas locais, AI Overviews e Ask Maps / Gemini no Maps
- Como o Google interpreta "perto de mim" e buscas sem a cidade

**Fazer:**
1. Levantar termos por: serviço/produto, problema ("moto não liga"), marca/modelo, bairro/cidade, "perto de mim", "aberto agora", "preço", "melhor".
2. Fontes de termos: autocompletar do Google, "As pessoas também perguntam", buscas relacionadas, Search Console (consultas reais), Google Trends (Brasil/estado), termos que aparecem nas avaliações dos concorrentes.
3. Classificar a **intenção**:
   - **Urgente/transacional** ("guincho agora", "peça X perto de mim") → foco em perfil + ligação/WhatsApp
   - **Comparação** ("melhor oficina em X") → avaliações, listas, prova social
   - **Informacional** ("como trocar relação da moto") → conteúdo no site/YouTube
   - **Navegacional** (nome da empresa) → perfil completo e sem erros
4. Ver o que o Google mostra para cada termo: pacote local? AI Overview? vídeos? marketplaces?

**Entregar:** tabela `Termo | Intenção | Volume (se houver fonte) | O que aparece no Google | Onde trabalhar (perfil/site/conteúdo)`.

#### A3. Rastreamento geográfico no Maps (Local Rank Grid)
**Objetivo:** ver a posição no Maps em vários pontos da cidade, não só de onde o dono pesquisa.

**Pesquisar:**
- Ferramentas atuais de grid e se funcionam bem no Brasil (ex.: Local Falcon, BrightLocal Local Search Grid, Whitespark Local Ranking Grids). Confira os preços atuais.
- Boas práticas de tamanho e espaçamento do grid por tipo de negócio

**Fazer:**
- Definir 3 a 5 termos principais (do A2)
- Definir o grid: tamanho e distância entre pontos de acordo com a área real de atendimento (bairro, cidade, região)
- Rodar a medição inicial e salvar
- Repetir mensalmente, com a mesma configuração, para comparar
- Ler o resultado: onde está forte, onde some, quais concorrentes dominam cada região

**Limite:** o Claude Code não faz grid sozinho. Peça ao usuário o export (CSV/print) da ferramenta e analise.

**Entregar:** leitura do mapa (zonas fortes/fracas), concorrentes por zona e ações por zona.

#### A4. Análise de concorrência por região e palavra-chave
**Objetivo:** entender quem ganha, onde e por quê.

**Fazer:** para cada termo principal e região, liste os 3 primeiros do Maps e compare:
- **Categorias:** principal e secundárias
- **Avaliações:** total, nota, **recência e frequência** (data das últimas e média por mês), % respondidas
- **Horário:** janelas em que a empresa está fechada e os concorrentes abertos. Estar aberto na hora da busca é um fator forte. Só recomende ampliar se for real.
- **Nome:** concorrentes com palavra-chave indevida no nome? (ver C3/D5 para denúncia)
- **Perfil:** fotos (quantidade e recência), produtos/serviços, postagens, atributos, links
- **Site do concorrente:** páginas de serviço, conteúdo local, dados estruturados
- **Listas locais e menções:** buscar "melhores [segmento] em [cidade]" e anotar quem é citado

**Regra do Maps:** se não abrir via fetch, peça print dos 3 primeiros do Maps + categorias visíveis. Enquanto espera, continue as outras análises.

**Entregar:** tabela `Item | Empresa | Conc. 1 | Conc. 2 | Conc. 3 | Gap` por termo/região.

---

### B. Otimização e conversão

#### B1. Otimização do perfil
**Pesquisar:** campos e recursos disponíveis hoje no Brasil (produtos, serviços, atributos, links, postagens, WhatsApp) e o que os Playbooks oficiais recomendam para o setor.

**Fazer:**
- Categoria principal mais específica + secundárias relevantes (com base no A4)
- Serviços e produtos com descrição, usando os termos do A2 sem exagero
- Descrição clara (o que faz, onde, diferenciais, formas de pagamento)
- Atributos (Pix, acessibilidade, etc.)
- Horário completo + horários especiais de feriados
- Links com UTM (ver F1)

**Entregar:** textos prontos para colar + lista de campos a preencher.

#### B2. Conversão (CRO) dentro do perfil
**Objetivo:** fazer quem vê o perfil ligar, chamar no WhatsApp, pedir rota ou agendar.

**Pesquisar:** fatores de conversão no estudo da Whitespark e nos Playbooks; botões disponíveis hoje nas postagens e no perfil.

**Fazer:**
- Primeira impressão: nota, avaliações recentes, foto de capa/logo, primeiras fotos
- Botões certos ativos: ligar, WhatsApp, site, agendamento, rota
- Postagens com oferta clara e chamada para ação (CTA). Confira se o Google aceita link `wa.me`. Se não aceitar, use "Saiba mais" para uma página do site com botão de WhatsApp.
- Respostas às avaliações que vendem (mostram atendimento, sem dados pessoais)
- Produtos/serviços com preço "a partir de", quando fizer sentido
- Testar mudanças **uma por vez** e medir pelo F1/F2

**Entregar:** lista de melhorias por impacto + 4 ideias de postagens com foco em clique no WhatsApp.

#### B3. Fotos e vídeos
**Pesquisar:** regras atuais de conteúdo de fotos e vídeos do Google; testes sobre fotos e ranking (ex.: geotag em fotos é um mito comum; confira o teste da Sterling Sky).

**Fazer:**
- **Tipos:** fachada (para quem chega reconhecer), interior, equipe, produtos, serviço sendo feito, antes/depois
- **Padrão:** fotos reais, bem iluminadas, horizontais e verticais, sem texto excessivo ou logo gigante
- **Rotina:** fotos novas toda semana/quinzena
- **Vídeos curtos:** reaproveitar Reels/TikTok, quando permitido
- **Monitorar fotos de clientes:** denunciar só as impróprias ou que não são da empresa
- **Separar:** vídeo de verificação (D4) é diferente de vídeo de divulgação

**Entregar:** pauta de fotos/vídeos por mês + checklist de qualidade.

---

### C. Reputação

#### C1. Estratégia de avaliações
**Pesquisar:** políticas atuais de avaliações; dados recentes da BrightLocal (Local Consumer Review Survey); teorias atuais sobre filtragem de avaliações (ex.: QR code apontando direto para o link de avaliação; marque como `[OPINIÃO]` até haver teste).

**Fazer:**
- Fluxo: pós-venda → WhatsApp → link direto de avaliação, enviado para **todos** os clientes
- Meta de **frequência** (constância vale mais que picos)
- Pedir que o cliente comente o serviço/produto (sem ditar palavras-chave)
- Responder todas em até 48h

**Entregar:**
- 2 modelos de pedido via WhatsApp, com opt-out (ex.: *"Se não quiser mais receber mensagens, responda SAIR."*)
- 3 modelos de resposta (5, 3 e 1 estrela), sem dados pessoais

#### C2. Análise de sentimento e reputação digital
**Objetivo:** entender o que elogiam e o que reclamam, na empresa e nos concorrentes.

**Fazer:**
- Juntar avaliações (Google, Facebook, Reclame Aqui, marketplaces). O usuário pode exportar ou colar.
- Classificar por tema: atendimento, preço, prazo, qualidade, estoque, pós-venda
- Classificar o sentimento por tema (positivo/neutro/negativo) e a evolução mês a mês
- Comparar com os concorrentes: onde a empresa é melhor (usar em marketing) e onde é pior (corrigir na operação)
- Monitorar menções da marca na web e nas redes (ver E3)

**Entregar:** resumo `Tema | % positivo | % negativo | Exemplo | Ação`, com nota da reputação por plataforma.

#### C3. Identificação e denúncia de avaliações falsas
**Pesquisar:** o processo atual de denúncia e a ferramenta de gerenciamento de avaliações do Google; o que conta como violação.

**Fazer:**
- **Sinais de avaliação falsa:** várias em poucos dias, perfis sem histórico ou com avaliações só em outra cidade/país, textos genéricos ou repetidos, os mesmos autores avaliando concorrentes, ex-funcionário ou concorrente identificado
- Também vale para **concorrentes com avaliações falsas positivas**
- Denunciar **só** o que viola a política, citando qual regra foi violada
- Documentar: print, data, link do autor, padrão encontrado
- Se a denúncia for negada, usar o recurso/apelação disponível no processo atual
- Casos graves (difamação, ataque organizado): orientar a procurar um advogado

**Entregar:** planilha de evidências + texto da denúncia por avaliação.

#### C4. Recuperação de avaliações removidas indevidamente
**Pesquisar:** por que o Google filtra avaliações hoje (filtro automático, picos, mesma rede Wi-Fi, links diretos, etc.) e se existe um caminho oficial de contestação no momento.

**Fazer:**
- Confirmar se a avaliação sumiu para todos ou só está oculta (pedir ao cliente para ver se aparece logado na conta dele)
- Identificar a causa provável (pico de avaliações, pedido feito na loja pelo Wi-Fi da loja, avaliador novo)
- Ver se há canal de contestação ativo e preparar o texto
- Ajustar o processo para evitar novas remoções (envio espaçado, cliente avaliando da própria rede)
- Deixar claro ao usuário que **não há garantia** de recuperação

**Entregar:** diagnóstico da causa provável + ajustes no fluxo do C1.

#### C5. Gestão de crises e atendimento de reclamações
**Objetivo:** responder rápido e certo quando há uma avalanche de avaliações negativas, um caso viral ou uma reclamação séria.

**Fazer:**
- **Classificar:** reclamação legítima, ataque/avaliações falsas (→ C3), caso viral nas redes
- **Plano de 24h:** quem responde, mensagem base, levar para o privado, não apagar nem discutir em público
- **Reclame Aqui:** responder, resolver e pedir avaliação da solução
- **Pós-crise:** corrigir a causa na operação e retomar o fluxo de avaliações (C1)
- Resposta pública: educada, curta, sem dados pessoais, oferecendo canal direto

**Entregar:** manual de crise de 1 página + modelos de resposta (Google, Instagram, Reclame Aqui).

---

### D. Conta, segurança e problemas

#### D1. Gestão de propriedade, permissões e acessos
**Pesquisar:** os papéis de acesso atuais (proprietário principal, proprietário, administrador) e o que cada um pode fazer.

**Fazer:**
- Mapear quem tem acesso hoje (pedir print da tela de pessoas e acesso)
- **Regras recomendadas:**
  - proprietário principal = conta Google da empresa, não de funcionário ou agência
  - agência/freelancer = papel de administrador, nunca proprietário principal
  - remover ex-funcionários e ex-agências
  - verificação em duas etapas na conta proprietária
- Registrar quem tem acesso e revisar a cada 3 meses

**Entregar:** tabela de acessos atual x recomendado + checklist de segurança.

#### D2. Transferência de propriedade e recuperação de contas
**Pesquisar:** o processo atual de solicitar acesso a um perfil que outra pessoa controla, os prazos de resposta do dono atual e o que fazer se ele não responder.

**Fazer:**
- **Transferência amigável:** passo a passo para o dono atual adicionar o novo e transferir a propriedade principal
- **Perfil "sequestrado" ou criado por terceiro:** fluxo oficial de solicitação de acesso, guardando provas (CNPJ, documentos, e-mails)
- **Conta Google perdida:** recuperação da conta Google primeiro (fluxo oficial), depois do perfil
- Nunca recomendar criar um perfil novo para "fugir" do problema (gera duplicado, ver D5)

**Entregar:** passo a passo do caso + lista de documentos.

#### D3. Monitoramento de alterações não autorizadas
**Pesquisar:** como o Google mostra hoje as atualizações sugeridas por usuários e pelo próprio Google; opções de alerta (painel, e-mail, API, ferramentas).

**Fazer:**
- Guardar um **"retrato oficial"** do perfil (nome, categorias, endereço, telefone, site, horário, atributos)
- Revisão semanal comparando com o retrato
- Alertas por e-mail ativos na conta
- Com acesso à API (F4): script que compara os dados e avisa quando algo muda
- Ao encontrar uma alteração indevida: reverter, documentar e verificar se o site/dados estruturados confirmam a informação certa

**Entregar:** arquivo do retrato oficial + checklist semanal (ou script, se houver API).

#### D4. Suspensão, desativação, recursos e contestações
**Pesquisar (sempre, pois muda muito):**
- Tipos atuais de restrição (suspensão, desativação, perfil limitado/sem verificação) e como identificar cada um
- Formulário/processo atual de recurso e quantas tentativas são permitidas
- **Verificação por vídeo:** o que o vídeo precisa mostrar e os motivos comuns de recusa

**Fazer:**
1. **Identificar a causa provável:** nome com palavra-chave, endereço inválido, categoria errada, alteração sensível recente, duplicado, área de atendimento errada
2. **Corrigir antes de recorrer** (sem fazer outras alterações durante o recurso)
3. **Juntar provas** (seção 4.3): Cartão CNPJ, alvará, conta no endereço, fotos da fachada com placa, vídeo
4. **Vídeo de verificação** (roteiro contínuo, sem cortes): rua/placa da rua → fachada com o nome → entrada → interior/área de trabalho → algo que só o dono teria (chave abrindo a porta, ferramentas, documentos)
5. Escrever o recurso: curto, objetivo, explicando o negócio e listando as provas
6. Registrar datas e respostas

**Entregar:** diagnóstico da causa + checklist de provas + roteiro de vídeo + texto do recurso.

#### D5. Perfis duplicados e conflitos de localização
**Pesquisar:** o processo atual para denunciar duplicados, juntar perfis e corrigir o pino no mapa.

**Fazer:**
- Buscar duplicados: variações de nome, telefone antigo, endereço antigo
- Duplicado **verificado** na sua conta: processo de remoção/junção pelo painel
- Duplicado **não verificado** ou criado por terceiros: denunciar pelo Maps
- **Pino errado:** corrigir pelo painel; conferir também no Apple Maps, Bing e Waze
- **Dois negócios no mesmo endereço:** verificar se ambos podem existir (diretrizes) e diferenciar bem (nome, entrada, sala, categorias)
- **Concorrente com duplicado ou spam:** denunciar via sugestão de edição ou formulário de denúncia oficial

**Entregar:** lista de duplicados/conflitos + ação para cada um.

#### D6. Mudança de endereço, nome e rebranding
**Pesquisar:** o procedimento atual de mudança (o que acontece com as avaliações; quando marcar como "mudou de endereço" e quando fechar e abrir um novo).

**Fazer:**
- **Antes:** retrato do perfil atual, documentos do novo endereço/nome, fotos da nova fachada
- **Ordem sugerida:**
  1. Atualizar o site e os dados estruturados
  2. Atualizar o perfil (uma alteração sensível por vez)
  3. Atualizar redes e citações (E1)
- **Rebranding:** o nome novo precisa estar na fachada, no site e nos documentos antes de mudar no perfil
- Monitorar o ranking (A3) por 30 a 60 dias depois

**Entregar:** checklist da mudança em ordem + lista de plataformas a atualizar.

#### D7. Múltiplas unidades e franquias
**Pesquisar:** regras atuais para várias unidades (verificação em massa, grupos de locais, códigos de loja, padrão de nomes).

**Fazer:**
- Organizar as unidades em um grupo, com códigos de loja padronizados
- **Padrão de nome:** marca igual em todas; diferenciar só se o nome real da unidade for diferente
- Uma página no site por unidade, com NAP, horário, fotos e JSON-LD próprios
- **Franquias:** definir quem é dono do perfil (franqueadora x franqueado) e documentar em contrato
- Respostas a avaliações com padrão da marca + toque local
- Relatório por unidade e ranking entre unidades (F5)

**Entregar:** estrutura de contas/grupos + padrão de nomes e páginas + modelo de relatório por unidade.

---

### E. Autoridade e IA

#### E1. Citações e ecossistema Brasil
**Regras:**
- Citações pesam pouco no ranking hoje. O foco é **consistência do NAP** em poucos diretórios bons.
- **Confira se cada diretório está ativo** antes de recomendar.

**Mapas e IAs:** Apple Business Connect (Apple Maps/Siri), Bing Places (Bing/Copilot; pode influenciar outras IAs), Waze.

**Diretórios BR (conferir se estão ativos):** Apontador, Solutudo, TeleListas, GuiaMais, Reclame Aqui, Associação Comercial e CDL da cidade, portais de nicho (Doctoralia, GetNinjas, iFood, Mercado Livre/Shopee/OLX, conforme o segmento).

**Canais próprios e busca social:**
- WhatsApp Business (catálogo, mensagem automática, etiquetas)
- Facebook (NAP igual)
- Instagram, TikTok e YouTube Shorts: palavras-chave locais na bio, nas legendas e na fala dos vídeos, localização nos posts

**Entregar:** tabela `Plataforma | Status (ativo/inativo) | Empresa cadastrada? | NAP correto? | Ação`.

#### E2. Link building local e autoridade digital
**Pesquisar:** o que funciona hoje em links locais (Sterling Sky, Whitespark, Near Media).

**Fazer:** levantar oportunidades reais e locais:
- Associação Comercial, CDL, sindicatos e entidades do setor
- Fornecedores e marcas que a empresa revende (página "onde comprar")
- Patrocínios locais (time, evento, escola, ação social)
- Imprensa e blogs da cidade
- Parcerias com negócios complementares (não concorrentes)
- Conteúdo útil que outros sites citariam (guia local, dados, calendário)

**Nunca:** comprar links em massa, redes de blogs (PBN), troca de links em excesso.

**Entregar:** lista priorizada `Oportunidade | Tipo | Como conseguir | Esforço`.

#### E3. Relações públicas digitais e menções de marca
**Fazer:**
- Monitorar menções da marca (Google Alerts, busca nas redes, Reclame Aqui)
- Pautas para a imprensa local: inauguração, aniversário, ação social, dado curioso do setor, dica sazonal
- Entrar nas listas "melhores [segmento] em [cidade]" (contatar os autores com motivos reais)
- Menções sem link: pedir educadamente a inclusão do link

**Entregar:** lista de veículos/listas locais + 3 pautas prontas + modelo de e-mail de contato.

#### E4. SEO para buscas conversacionais e IA
**Pesquisar (muda rápido):**
- Como Gemini (Maps e Busca), AI Overviews/AI Mode, ChatGPT, Copilot e Perplexity escolhem negócios locais hoje
- Fatores de "visibilidade em IA" no estudo da Whitespark

**Fazer:**
- **Dados consistentes** em todo lugar (perfil, site, Bing, Apple, redes)
- Conteúdo no site que responde perguntas reais e completas ("quanto custa", "quanto tempo leva", "atende no sábado?")
- Seção de perguntas frequentes no site, com dados estruturados quando aplicável
- Avaliações ricas em detalhes (o C1 incentiva o cliente a comentar o serviço)
- Menções em listas e na imprensa (E3)
- **Teste manual:** pedir ao usuário que pergunte ao Gemini/ChatGPT "qual o melhor [segmento] em [cidade]?" e registrar quem aparece, todo mês

**Entregar:** lista de perguntas a responder no site + plano de presença + registro mensal do teste em IA.

---

### F. Mensuração e automação

#### F1. Rastreamento de leads e conversões pelo perfil
**Fazer:**
- **UTM em todos os links do perfil:**
  - Site: `?utm_source=google&utm_medium=organic&utm_campaign=gbp`
  - Mesmo padrão para links de agendamento/produtos; com várias unidades, adicionar `&utm_content={{unidade}}`
- **GA4:** eventos de clique em WhatsApp, telefone e formulário, marcados como conversão
- **WhatsApp rastreável** (o link `wa.me` não carrega UTM):
  - opção 1: página de redirecionamento no site (ex.: `/whatsapp?origem=gbp`) que registra o clique e redireciona para o `wa.me`
  - opção 2: mensagem pré-preenchida diferente por origem (`?text=Olá, vi no Google`)
- Desempenho nativo do perfil (ligações, rotas, cliques no site, mensagens): exportar todo mês

**Entregar:** links prontos + código da página de redirecionamento (PHP, se for o caso) + lista de eventos GA4.

#### F2. Mensuração de ligações, WhatsApp e agendamentos
**Pesquisar:** a recomendação atual para usar número de rastreamento no perfil sem prejudicar a consistência do NAP (ex.: número rastreado como principal e número real como adicional); ferramentas de call tracking com números brasileiros (DDD local).

**Fazer:**
- **Ligações:** número rastreado só para o perfil, ou contagem pelo desempenho nativo do Google
- **WhatsApp:** contagem pela página de redirecionamento (F1) + etiqueta "Google" no WhatsApp Business para as conversas vindas do perfil
- **Agendamentos:** link com UTM + origem registrada no sistema de agenda
- **Rotina simples** se não houver ferramenta: atendente pergunta "como nos conheceu?" e registra

**Entregar:** plano de medição por canal (ferramenta, custo, como registrar).

#### F3. Integração com CRM e ferramentas de atendimento
**Fazer:**
- Mapear o que a empresa usa (CRM, planilha, sistema próprio, WhatsApp Business/API)
- Garantir que todo lead tenha o campo **origem** (Google Perfil, site, Instagram, indicação)
- Pós-venda automático → pedido de avaliação (C1), respeitando a LGPD
- Notificação de nova avaliação → responsável responde em até 48h
- Se o sistema for próprio (PHP/MySQL): propor tabela de leads com origem, UTM, data, status e valor

**Entregar:** fluxo de integração (desenho simples) + estrutura de dados/código se for sistema próprio.

#### F4. Google Business Profile API e automações
**Pesquisar (obrigatório):** a documentação atual em developers.google.com/my-business, quais APIs existem hoje (dados do local, avaliações, desempenho, postagens), como pedir acesso (exige aprovação) e as cotas.

**Possíveis automações (confirmar se a API atual permite):**
- Exportar o desempenho mensal para o dashboard (F5)
- Listar avaliações novas e alertar quem responde
- Monitorar alterações nos dados (D3)
- Publicar postagens programadas
- Gerenciar várias unidades em lote (D7)

**Regras:**
- Credenciais em arquivo `.env`, nunca no código ou em repositório público
- Qualquer escrita no perfil via API só com autorização explícita do usuário
- Começar com leitura; escrita só depois de testada

**Entregar:** viabilidade (o que dá para automatizar hoje) + passo a passo do acesso + script inicial de leitura.

#### F5. Dashboards e relatórios automatizados
**Fazer:** definir os indicadores mensais:
- **Visibilidade:** posição no grid (A3), impressões do perfil
- **Ações:** ligações, cliques no WhatsApp, rotas, cliques no site, agendamentos
- **Reputação:** nota, avaliações novas no mês, % respondidas, tempo de resposta
- **Resultado:** leads por origem, vendas e faturamento vindos do perfil (F6)

**Ferramenta:** a mais simples que o usuário já usa (Looker Studio, planilha ou página PHP própria). Comparar mês a mês e com o mesmo mês do ano anterior.

**Entregar:** lista de indicadores + estrutura do dashboard + modelo de relatório mensal de 1 página.

#### F6. Análise de ROI e desempenho comercial
**Fazer:**
- **Custos:** horas da equipe, ferramentas, agência/freelancer, fotos
- **Receita atribuída:** leads do perfil (F1/F2/F3) × taxa de fechamento × ticket médio
- **ROI** = (receita atribuída − custo) ÷ custo
- Quando faltar dado, mostrar a **estimativa com as premissas explícitas** e o que precisa ser medido para virar dado real
- Comparar com outros canais (anúncios, Instagram, marketplaces)

**Entregar:** cálculo de ROI com premissas + recomendação de onde investir mais.

---

## 6. Formato de entrega

### 6.1 Diagnóstico completo → `relatorio-gbp-seo-local.md`
1. **Diagnóstico Executivo:** até 5 gargalos em Site, Perfil, Concorrência e Reputação (impacto + por quê, em 1 linha)
2. **Alertas de Conformidade:** riscos de suspensão + alterações que podem disparar revisão (seção 3.2)
3. **Plano de Ação em 3 Fases:**
   - **Fase 1 – Semana 1 (Quick Wins):** categorias secundárias, serviços, horários + feriados, atributos, fotos, links com UTM. Categoria principal só se necessário, isolada.
   - **Fase 2 – Mês 1:** correções no site com JSON-LD pronto, citações (E1), medição (F1/F2), acessos (D1)
   - **Fase 3 – Contínuo:** avaliações (C1), fotos (B3), postagens, grid mensal (A3), relatório mensal (F5)
4. **Kit Prático Copy-Paste:**
   - 2 pedidos de avaliação via WhatsApp (com opt-out)
   - 3 respostas a avaliações (5, 3 e 1 estrela)
   - 4 postagens com foco em clique no WhatsApp
5. **Fontes:** URLs com data e marcação (`[OFICIAL]`, `[TESTADO]`, `[OPINIÃO]`, `[ANTIGO]`, `[EUA]`)

### 6.2 Módulo específico → `modulo-{{codigo}}-{{tema}}.md`
Ex.: `modulo-D4-suspensao.md`. Estrutura: situação → causa provável → passo a passo → textos/código prontos → fontes.

### 6.3 Estilo
- Português do Brasil, linguagem simples, tópicos curtos
- Primeiro o que fazer, depois o porquê
- Todo texto para o cliente final pronto para copiar

---

## 7. Registro de atualizações

Mantenha um arquivo `atualizacoes-gbp.md`. Toda novidade encontrada no protocolo da seção 1 entra lá:

```
## {{AAAA-MM-DD}}
- O que mudou: ...
- Disponível no Brasil? sim / não / não confirmado
- Fonte: URL (data do artigo) [marcação]
- Impacto neste guia: seção X precisa ser revisada
```

Quando uma mudança contradizer este guia, avise o usuário e sugira a atualização da seção.

---

## 8. Checklist final

- [ ] Protocolo de pesquisa (seção 1) feito para cada módulo usado
- [ ] Recursos confirmados como disponíveis no Brasil (ou marcados `[EUA]`)
- [ ] Nenhuma recomendação contraria as diretrizes (horário falso, review gating, nome com palavra-chave etc.)
- [ ] Alterações de risco sinalizadas e isoladas
- [ ] Todo número com fonte e data; estimativas com premissas explícitas
- [ ] Nenhuma plataforma americana sem uso no Brasil; diretórios conferidos como ativos
- [ ] LGPD respeitada (opt-out, sem dados pessoais em respostas)
- [ ] NAP e horário iguais em todas as recomendações
- [ ] Ações que dependem do usuário estão claras (o Claude Code não acessa a conta)
- [ ] Novidades registradas em `atualizacoes-gbp.md`

## Conexões
- [[otimizar-a-presenca-em-busca-local]] — o guia atualiza para o Brasil e para os dias de hoje o método de busca local do livro (perfil, NAP, avaliações, citações); diverge: o guia diz que citações pesam pouco hoje e proíbe pedir avaliação só a clientes satisfeitos, enquanto o livro (2014) trata citações e links locais como fator de ranking crescente e sugere buscar clientes satisfeitos
- [[adicionar-marcacao-schema-org-a-um-site]] — o guia pede JSON-LD de negócio local no site, aplicação da marcação estruturada
- [[pesquisar-palavras-chave]] — o guia detalha a pesquisa de termos e de intenção para buscas locais
- [[intencao-de-busca-e-coocorrencia-de-termos]] — o guia classifica as buscas locais por intenção (urgente, comparação, informacional, navegacional)
- [[configurar-conversoes-de-seo-e-valor-por-acao]] — o guia rastreia ligações, WhatsApp e agendamentos com UTM e eventos de conversão
- [[calcular-o-roi-do-seo]] — o guia calcula o ROI do perfil com receita atribuída, taxa de fechamento e ticket
- [[medir-resultados-de-seo-com-kpis-acionaveis]] — o guia define indicadores mensais de visibilidade, ações, reputação e resultado
- [[regra-ganhe-links-nao-os-compre-troque-nem-fabrique]] — o guia também proíbe comprar links e redes de blogs no link building local
- [[otimizar-os-elementos-de-uma-pagina-para-palavras-chave]] — o guia pede cidade ou bairro no título e no H1 das páginas principais
- [[trafego]] — o guia aplica o assunto de tráfego orgânico à busca local e traz a regra de confirmar sempre na fonte atual
- [[mapa-the-art-of-seo]] — o livro mapeado é a base de SEO que o guia atualiza para a busca local
- [[guia-seo-brasil]] — o guia de SEO cobre o SEO do site, e o módulo F dele remete a este guia
- [[guia-marketing-digital-brasil]] — o guia central cobre a estratégia geral e remete a este para o negócio local
- [[guia-google-ads-brasil]] — o guia de Google Ads cobre campanhas de anúncio, incluindo as locais
- [[guia-trafego-pago-meta-brasil]] — o guia de Meta cobre campanhas locais na Meta
- [[guia-social-media-brasil]] — o guia de redes sociais trata da presença orgânica ligada ao perfil local
- [[mapa-dos-guias-de-trafego]] — o mapa dos guias diz quando abrir este guia e como ele se relaciona com os outros
- [[decisoes-sobre-divergencias-entre-guias-e-livro-de-seo]] — nota derivada deste guia: Decisões sobre as divergências entre os guias e o livro de SEO
- [[regra-nao-viole-as-diretrizes-do-perfil-da-empresa-no-google]] — nota derivada deste guia: Não viole as diretrizes do Perfil da Empresa no Google
- [[gerir-avaliacoes-e-reputacao-no-google]] — nota derivada deste guia: Gerir avaliações e reputação no Google
- [[construir-presenca-local-autoridade-e-visibilidade-em-ia]] — nota derivada deste guia: Construir presença local, autoridade e visibilidade em IA
- [[analisar-busca-local-concorrentes-e-posicao-no-mapa]] — nota derivada deste guia: Analisar busca local, concorrentes e posição no mapa
- [[otimizar-o-perfil-da-empresa-no-google-e-converter-visitas]] — nota derivada deste guia: Otimizar o Perfil da Empresa no Google e converter visitas
- [[medir-ligacoes-e-whatsapp-em-campanhas]] — nota derivada deste guia: Medir ligações e WhatsApp em campanhas
- [[medir-leads-e-roi-do-perfil-da-empresa-no-google]] — nota derivada deste guia: Medir leads e ROI do Perfil da Empresa no Google
- [[proteger-a-conta-e-resolver-problemas-do-perfil-da-empresa]] — nota derivada deste guia: Proteger a conta e resolver problemas do Perfil da Empresa
