---
titulo: Estratégia
tipo: centralizador
criado: 2026-11-22
atualizado: 2026-11-22
---

# Estratégia

Centralizador do assunto **estratégia**: validar um negócio, posicionar um produto, definir a personalidade de uma marca e construir a mensagem que a comunica. É o ponto de entrada para tudo no Mind que trata desses temas. Os livros ficam em `biblioteca/` e entram aqui por suas fichas. As notas destiladas deles (frameworks, conceitos e regras) ficam nesta pasta e se ligam a este arquivo.

## Por que o assunto está no Mind

Copy, anúncio e venda funcionam melhor quando já se sabe para quem se fala, o que se promete e por que o cliente escolheria esta oferta. Este arquivo cuida dessa base. A execução (textos, campanhas, funis, tráfego pago) mora nas notas de copywriting, vendas e tráfego, quando existirem. A parte técnica fica em [[developer]].

## Escopo

**Dentro:**
- Validação de problema, cliente e solução, e aprendizado por experimentos
- Posicionamento de produto e oferta
- Marca: personalidade, arquétipos e voz
- Mensagem e narrativa de marca
- Proposta de valor
- Métricas e critérios para decidir (continuar, ajustar ou mudar de rumo)

**Fora:**
- Redação de anúncios, páginas e e-mails, e a mídia paga em si
- Processos de venda
- Implementação técnica, que fica em [[developer]]
- Identidade visual como disciplina (logo, paleta, tipografia)

## Mapa do assunto

| Área | O que cobre | Livro-base |
|---|---|---|
| Descoberta e validação | Hipóteses sobre cliente e problema, produto mínimo, aprendizado validado, decisão de continuar ou mudar de rumo | *The Lean Startup* (A Startup Enxuta), Eric Ries |
| Métricas e experimentos | Como medir o aprendizado e testar hipóteses a baixo custo | *The Lean Startup* (A Startup Enxuta), Eric Ries |
| Posicionamento | Alternativas do cliente, atributos únicos, valor, quem mais se beneficia, categoria de mercado | *Obviously Awesome*, April Dunford |
| Personalidade da marca | Arquétipos, motivações e a voz da marca | *The Hero and the Outlaw* (O Herói e o Fora da Lei), Margaret Mark e Carol Pearson |
| Mensagem e narrativa | Mensagem clara, com o cliente como protagonista | *Building a StoryBrand*, Donald Miller |

## Fluxo de partida

Ordem proposta de uso dos livros. É um ponto de partida: o playbook completo será montado depois da destilação (`/destilar playbook`), e a ordem pode mudar.

1. **Cliente e problema.** Quem é, o que dói, como resolve hoje e quais hipóteses precisam ser confirmadas.
2. **Validação.** Teste barato das hipóteses mais arriscadas, com um critério claro de sucesso.
3. **Posicionamento.** Contra o que o cliente compara, o que a oferta tem de único, o valor que isso gera, para quem e em qual categoria.
4. **Personalidade da marca.** O arquétipo e a voz que combinam com o posicionamento e com o cliente.
5. **Mensagem.** A história que coloca o cliente como protagonista e deixa claro o que oferecer e o que pedir.
6. **Medição e ajuste.** Voltar às métricas e decidir o que manter e o que mudar.

Entregável de referência: um **brief estratégico** com público e problema, hipóteses e testes, alternativas e diferenciais, frase de posicionamento, arquétipo e voz, mensagem, métricas e lacunas conhecidas.

## Como o Claude Code usa este arquivo

- Em pedidos de estratégia, posicionamento, marca, mensagem ou validação de ideia, ler este arquivo e as notas ligadas a ele (frameworks, conceitos e regras) antes de responder.
- Dizer qual framework de qual livro foi aplicado (livro e capítulo). Ao combinar frameworks, dizer a ordem e o motivo.
- Antes de aplicar um framework, pedir ao usuário os dados que ele exige: cliente, produto, concorrentes, resultados. Não inventar esses dados.
- Separar, em toda entrega, o que vem dos livros, o que é inferência do Claude e o que vem de pesquisa.
- Pesquisa na internet pode complementar. Ela vai para `RESPOSTAS` com fonte e data. Quando contradiz um livro, registrar a divergência com o prefixo `diverge:`, sem trocar o livro pela pesquisa em silêncio.
- Se o conteúdo ainda não foi destilado, usar o livro original pela ficha e avisar que a leitura é parcial.
- As notas geradas pelo `/destilar` (`origem: destilar`) são resumos rastreáveis. Em decisões importantes, conferir a fonte indicada (livro, capítulo e páginas).
- Entregas vão para `RESPOSTAS`, como qualquer resposta.
- Para criar um agente especializado em estratégia, seguir a diretriz [[creator-of-minds]] e começar pelas notas ligadas a este arquivo.

## Como este assunto cresce

1. Coloque o livro em `biblioteca/` e rode `/integrar`: nasce a ficha, ligada a este arquivo.
2. Rode `/destilar <livro>` quantas vezes for preciso. Cada execução lê um lote de capítulos e grava notas em `frameworks/` e `conceitos/`, e o andamento fica em `mapas/`.
3. Rode `/integrar` de novo para ligar as notas novas.
4. Quando houver frameworks de mais de um livro, rode `/destilar playbook <tema>` para juntá-los em um processo.

Cada nota é curta, trata de uma ideia, está em palavras próprias e indica o livro e o capítulo de origem.

## Lacunas conhecidas

Ainda sem livro dedicado na biblioteca:
- Pesquisa de cliente e de mercado (como entrevistar, como dimensionar)
- Preço e modelo de negócio
- Concorrência e análise de mercado

## Conexões

- [[posicionamento-como-contexto]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito de que o posicionamento é definir o contexto do produto
- [[armadilhas-do-posicionamento-padrao]] — nota destilada de Obviously Awesome, ligada a este assunto: as duas formas de ficar preso ao posicionamento padrão
- [[alternativas-competitivas]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do que o cliente faria sem o produto
- [[atributos-unicos]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do que a oferta tem e as alternativas não
- [[mercado-alvo-caracteristicas]] — nota destilada de Obviously Awesome, ligada a este assunto: perfil dos clientes que mais valorizam o produto
- [[categoria-de-mercado]] — nota destilada de Obviously Awesome, ligada a este assunto: o quadro de referência que o cliente usa para entender a oferta
- [[tendencias-relevantes]] — nota destilada de Obviously Awesome, ligada a este assunto: componente opcional que dá urgência ao produto
- [[regra-nao-usar-declaracao-de-posicionamento]] — nota destilada de Obviously Awesome, ligada a este assunto: regra contra usar a declaração de posicionamento como método
- [[regra-alternativas-pelo-olhar-do-cliente]] — nota destilada de Obviously Awesome, ligada a este assunto: regra de listar concorrentes pelo olhar do cliente
- [[regra-provar-atributos-com-fatos]] — nota destilada de Obviously Awesome, ligada a este assunto: regra de provar atributos e valor com fatos
- [[componentes-do-posicionamento]] — nota destilada de Obviously Awesome, ligada a este assunto: framework dos cinco (mais um) componentes do posicionamento
- [[listar-alternativas-competitivas]] — nota destilada de Obviously Awesome, ligada a este assunto: framework do passo 4 do livro de posicionamento
- [[isolar-atributos-unicos]] — nota destilada de Obviously Awesome, ligada a este assunto: framework do passo 5 do livro de posicionamento
- [[mapa-obviously-awesome]] — acompanha a destilação do livro de posicionamento deste assunto
- [[Obviously-Awesome-(April-Dunford) (pdf)]] — livro-base de posicionamento do assunto
- [[The-Lean-Startup-How-Todays-Entrepreneurs-Use-Continuous-Innovation-to-Create-Radically-Successful-Businesses-(Eric-Ries) (pdf)]] — livro-base de descoberta, validação e métricas do assunto
- [[The-Hero-and-the-Outlaw-Building-Extraordinary-Brands-Through-the-Power-of-Archetypes-(Margaret-Mark-Carol-S-Pearson) (pdf)]] — livro-base de personalidade e arquétipos de marca do assunto
- [[Building-a-StoryBrand-Clarify-Your-Message-So-Customers-Will-Listen-(Donald-Miller) (pdf)]] — livro-base de mensagem e narrativa do assunto
- [[developer]] — assuntos vizinhos: a implementação técnica fica em developer e a estratégia (o que dizer, para quem), aqui
- [[creator-of-minds]] — esta diretriz é a que o centralizador manda seguir para criar agentes de estratégia
- [[clientes-de-melhor-ajuste]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do livro de posicionamento
- [[estilo-big-fish-small-pond]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do livro de posicionamento
- [[estilo-create-a-new-game]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do livro de posicionamento
- [[estilo-head-to-head]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do livro de posicionamento
- [[estilos-de-posicionamento]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do livro de posicionamento
- [[regra-posicionar-para-clientes-nao-para-investidores]] — nota destilada de Obviously Awesome, ligada a este assunto: regra do livro de posicionamento
- [[regra-segmento-estreito-para-meta-de-curto-prazo]] — nota destilada de Obviously Awesome, ligada a este assunto: regra do livro de posicionamento
- [[valor-do-produto]] — nota destilada de Obviously Awesome, ligada a este assunto: conceito do livro de posicionamento
- [[determinar-quem-se-importa-muito]] — nota destilada de Obviously Awesome, ligada a este assunto: framework do livro de posicionamento
- [[entender-clientes-que-amam-o-produto]] — nota destilada de Obviously Awesome, ligada a este assunto: framework do livro de posicionamento
- [[escolher-quadro-de-referencia-de-mercado]] — nota destilada de Obviously Awesome, ligada a este assunto: framework do livro de posicionamento
- [[mapear-atributos-para-temas-de-valor]] — nota destilada de Obviously Awesome, ligada a este assunto: framework do livro de posicionamento
- [[teste-do-grunhido]] — nota destilada (conceito): Teste do grunhido
- [[guia-empatia-e-autoridade]] — nota destilada (conceito): O guia: empatia e autoridade
- [[tipos-de-pivo]] — nota destilada (conceito): Tipos de pivô
- [[hipoteses-de-valor-e-de-crescimento]] — nota destilada (conceito): Hipóteses de valor e de crescimento
- [[regra-nao-construir-alem-do-necessario-para-aprender]] — nota destilada (regra): Não construa nada além do necessário para aprender
- [[produto-minimo-viavel]] — nota destilada (conceito): Produto mínimo viável
- [[o-que-esta-em-jogo]] — nota destilada (conceito): O que está em jogo: o fracasso que o cliente evita
- [[ruido-e-clareza-da-mensagem]] — nota destilada (conceito): Ruído e clareza da mensagem
- [[sair-do-predio]] — nota destilada (conceito): Sair do prédio
- [[metricas-acionaveis-e-de-vaidade]] — nota destilada (conceito): Métricas acionáveis e métricas de vaidade
- [[regra-um-arquetipo-so]] — nota destilada (regra): Defina um só arquétipo para a marca e aprofunde-o
- [[vazio-narrativo]] — nota destilada (conceito): Vazio narrativo
- [[saltos-de-fe]] — nota destilada (conceito): Suposições de salto de fé
- [[analise-de-coortes]] — nota destilada (conceito): Análise de coortes
- [[historia-de-marca-e-recompensa-ao-espectador]] — nota destilada (conceito): História de marca e recompensa ao espectador
- [[motores-de-crescimento]] — nota destilada (conceito): Motores de crescimento
- [[cliente-como-heroi]] — nota destilada (conceito): O cliente é o herói e a marca é o guia
- [[regra-cortar-o-que-nao-serve-a-historia-do-cliente]] — nota destilada (regra): Corte tudo o que não serve à história do cliente
- [[banco-da-marca]] — nota destilada (conceito): Banco da marca
- [[tipos-de-mvp]] — nota destilada (conceito): Tipos de MVP
- [[teatro-do-sucesso]] — nota destilada (conceito): Teatro do sucesso
- [[arquetipo-fora-da-lei]] — nota destilada (conceito): O arquétipo do Fora da Lei em marcas
- [[obstaculos-ao-lancar-mvp]] — nota destilada (conceito): Obstáculos ao lançar um MVP
- [[desejo-do-cliente]] — nota destilada (conceito): O desejo do cliente e a lacuna da história
- [[chamada-para-acao]] — nota destilada (conceito): Chamada para ação
- [[arquetipo-do-cliente]] — nota destilada (conceito): Arquétipo do cliente
- [[adotantes-iniciais]] — nota destilada (conceito): Adotantes iniciais
- [[regra-vender-solucao-do-problema-interno]] — nota destilada (regra): Venda a solução do problema interno, não só do externo
- [[tres-niveis-de-problema]] — nota destilada (conceito): Os três níveis de problema do cliente e o vilão
- [[arquetipo-heroi]] — nota destilada (conceito): O arquétipo do Herói em marcas
- [[pivo]] — nota destilada (conceito): Pivô
- [[final-de-sucesso]] — nota destilada (conceito): O final de sucesso: onde a marca leva o cliente
- [[plano-do-guia]] — nota destilada (conceito): O plano do guia
- [[regra-usar-arquetipos-com-etica]] — nota destilada (regra): Use arquétipos com consciência e sem manipular o cliente
- [[teste-dividido]] — nota destilada (conceito): Teste dividido
- [[identidade-aspiracional]] — nota destilada (conceito): Identidade aspiracional e transformação do cliente
- [[arquetipos-de-marca]] — nota destilada (conceito): Arquétipos de marca
- [[ciclo-construir-medir-aprender]] — nota destilada (conceito): Ciclo construir-medir-aprender
- [[os-doze-arquetipos]] — nota destilada (conceito): Os doze arquétipos de marca
- [[aprendizado-validado]] — nota destilada (conceito): Aprendizado validado
- [[regra-medir-comportamento-nao-opiniao]] — nota destilada (regra): Teste hipóteses pelo comportamento do cliente, não pela opinião
- [[descobrir-o-arquetipo-da-marca]] — nota destilada (framework): Descobrir o arquétipo da marca, o método da alcachofra
- [[historia-de-vendas-a-partir-do-posicionamento]] — nota destilada (framework): História de vendas a partir do posicionamento
- [[acompanhar-o-posicionamento-ao-longo-do-tempo]] — nota destilada (framework): Acompanhar o posicionamento ao longo do tempo
- [[identificar-saltos-de-fe]] — nota destilada (framework): Identificar os saltos de fé
- [[depoimentos-de-transformacao]] — nota destilada (framework): Depoimentos de transformação
- [[brandscript-sb7]] — nota destilada (framework): BrandScript SB7
- [[gerador-de-leads-e-lista-de-emails]] — nota destilada (framework): Gerador de leads e lista de e-mails
- [[preparar-a-equipe-de-posicionamento]] — nota destilada (framework): Preparar a equipe de posicionamento
- [[campanha-de-emails-automatica]] — nota destilada (framework): Campanha automática de e-mails
- [[construir-mvp]] — nota destilada (framework): Construir um MVP
- [[escolher-e-ajustar-motor-de-crescimento]] — nota destilada (framework): Escolher e ajustar o motor de crescimento
- [[registrar-o-posicionamento]] — nota destilada (framework): Registrar o posicionamento
- [[sistema-de-indicacoes]] — nota destilada (framework): Sistema de indicações
- [[experimento-de-startup]] — nota destilada (framework): Experimento de startup
- [[frase-unica-one-liner]] — nota destilada (framework): Frase única da empresa
- [[site-que-conta-a-historia-do-cliente]] — nota destilada (framework): Site que conta a história do cliente
- [[reuniao-pivotar-ou-perseverar]] — nota destilada (framework): Reunião de pivotar ou perseverar
- [[contabilidade-da-inovacao]] — nota destilada (framework): Contabilidade da inovação
- [[definicao-de-startup-e-de-empreendedor]] — nota destilada (conceito): Definição de startup e de empreendedor
- [[regra-nao-viole-a-essencia-da-categoria]] — nota destilada (regra): Não viole a essência da categoria
- [[regra-a-lideranca-deve-construir-o-sistema-de-experimentacao]] — nota destilada (regra): A liderança deve construir o sistema de experimentação
- [[essencia-da-categoria]] — nota destilada (conceito): Essência da categoria
- [[etica-do-marketing-arquetipico]] — nota destilada (conceito): Ética do marketing arquetípico
- [[regra-ancore-o-significado-do-arquetipo-em-um-beneficio-real]] — nota destilada (regra): Ancore o significado do arquétipo em um benefício real do produto
- [[marketing-pos-moderno-e-gestao-do-significado]] — nota destilada (conceito): Marketing pós-moderno e a gestão do significado
- [[coerencia-entre-a-marca-e-a-cultura-da-organizacao]] — nota destilada (conceito): Coerência entre a marca e a cultura da organização
- [[os-cinco-principios-do-lean-startup]] — nota destilada (conceito): Os cinco princípios do Lean Startup
- [[diagnosticar-sinais-de-posicionamento-fraco]] — nota destilada (framework): Diagnosticar sinais de posicionamento fraco
- [[diagnosticar-o-arquetipo-da-cultura-da-organizacao]] — nota destilada (framework): Diagnosticar o arquétipo da cultura da organização
- [[descobrir-a-essencia-da-categoria]] — nota destilada (framework): Descobrir a essência da categoria
- [[playbook-posicionamento-de-produto]] — nota destilada (playbook): Playbook de posicionamento de produto
- [[trafego]] — centralizador que leva a promessa definida aqui até o público e mede o resultado, partindo do brief, do posicionamento e da mensagem da estratégia
- [[usos-estrategicos-do-seo]] — o uso para marca e mensagem precisa dialogar com o posicionamento do negócio
- [[planejar-a-estrategia-de-seo-com-swot-e-smart]] — o público, a marca e a mensagem que a estratégia de SEO considera vêm da estratégia do negócio
- [[guia-marketing-digital-brasil]] — os módulos A e B (diagnóstico, posicionamento, proposta de valor e marca) tratam do que o assunto estratégia define
- [[mapa-building-a-storybrand]] — acompanha a destilação de um livro-base deste assunto
- [[mapa-the-lean-startup]] — acompanha a destilação de um livro-base deste assunto
- [[mapa-the-hero-and-the-outlaw]] — acompanha a destilação de um livro-base deste assunto
- [[mapa-dos-guias-de-trafego]] — define o posicionamento e a mensagem de que os guias de canal partem
- [[mapa-the-art-of-seo]] — define o público, a marca e a mensagem de que o planejamento de SEO parte
- [[operador-do-mind]] — o Operador do Mind consulta este centralizador em tarefas de posicionamento, oferta e mensagem
