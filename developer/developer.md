---
titulo: Desenvolvimento
tipo: centralizador
criado: 2026-11-22
atualizado: 2026-11-22
---

# Desenvolvimento

Centralizador do assunto **desenvolvimento**: a criação de sistemas, aplicativos, sites e automações. É o ponto de entrada para tudo no Mind que trata de construir e manter software. Livros, fichas de PDFs, conceitos, decisões, padrões e checklists sobre o tema se ligam a este arquivo, e ele aponta para eles.

## Por que o assunto está no Mind

Marketing, vendas e tráfego pago dependem de software: páginas de captura, formulários, rastreamento, checkout, painéis e automações. Saber como essas peças são construídas permite pedir, avaliar e corrigir o que o negócio usa. Este arquivo cuida do lado técnico. A estratégia (o que vender, para quem, com qual mensagem) fica nas notas de marketing e vendas.

## Escopo

**Dentro:**
- Sites e landing pages
- Sistemas web: painéis administrativos, lojas, gestão
- APIs, integrações e webhooks
- Aplicativos
- Automações e scripts
- Banco de dados
- Publicação, hospedagem e manutenção

**Fora:**
- Decisões de marketing e vendas em si. O código as executa, mas a estratégia mora nas notas de marketing.
- Design visual e identidade como disciplina. Entra aqui só o que afeta a implementação: responsividade, acessibilidade e desempenho. O design pode ganhar centralizador próprio.

## Stack de referência

É a base que o Mind assume ao falar de desenvolvimento. Ajuste este bloco quando a prática mudar.

| Camada | Referência |
|---|---|
| Back-end | PHP puro, sem framework |
| Banco de dados | MySQL, acesso via PDO |
| Front-end | HTML, CSS e JavaScript sem frameworks |
| Hospedagem | Hostinger (compartilhada) |
| Publicação | FTP |

Quando uma nota, livro ou agente sugerir outra stack, registrar como alternativa, com o motivo e o custo da troca. A referência só muda por decisão registrada aqui.

## Mapa do assunto

| Área | O que cobre |
|---|---|
| Requisitos e produto | Problema, público, escopo mínimo, priorização, histórias de uso |
| Arquitetura e modelagem | Estrutura de pastas, camadas, entidades e relações, telas e fluxos, decisões de projeto |
| Front-end | HTML semântico, CSS, JavaScript, responsividade, acessibilidade |
| Back-end | PHP, rotas, sessões, autenticação, formulários, APIs |
| Banco de dados | Modelagem, índices, consultas com PDO, migrações, backup |
| Segurança | Injeção de SQL, XSS, CSRF, senhas, uploads, permissões, LGPD |
| Publicação e infraestrutura | Hospedagem, domínio, SSL, FTP, ambientes, backup, logs |
| Qualidade | Testes, depuração, revisão de código, versionamento |
| Desempenho e SEO técnico | Velocidade, cache, imagens, Core Web Vitals, indexação |
| Rastreamento e integrações de marketing | Pixels, tags, conversões, webhooks, pagamentos, e-mail |
| Manutenção e evolução | Atualizações, dívida técnica, documentação, versões |
| Desenvolvimento com IA | Claude Code, como pedir código, revisar o que a IA gera, agentes especializados (diretriz [[creator-of-minds]]) |

## Fluxo para criar um sistema

1. **Problema e objetivo.** Qual dor resolve, para quem, e como saber que deu certo (uma métrica).
2. **Escopo mínimo.** O menor sistema que resolve o problema, e o que fica de fora por enquanto.
3. **Modelagem.** Entidades, relações, telas e fluxos antes de escrever código.
4. **Construção em fatias.** Cada fatia pequena, funcionando e testável, antes da próxima.
5. **Segurança e validação.** Passar pelo checklist abaixo.
6. **Testes.** Roteiro manual do caminho feliz e dos casos de erro (campo vazio, dado inválido, usuário sem permissão).
7. **Publicação.** Backup antes, envio, verificação depois.
8. **Operação.** Logs, backups periódicos, correções e evolução.

## Checklist antes de publicar

- Consultas ao banco com *prepared statements* (PDO), sem montar SQL com dado do usuário.
- Toda saída em HTML escapada (`htmlspecialchars`).
- Senhas com `password_hash` / `password_verify`.
- Formulários com proteção contra CSRF.
- Upload validado por tipo e tamanho, com o arquivo renomeado.
- Credenciais fora do código versionado e, quando a hospedagem permitir, fora da pasta pública.
- Erros não exibidos ao visitante em produção, mas registrados em log.
- HTTPS ativo e cookies de sessão configurados com segurança.
- Backup do banco e dos arquivos feito antes do envio.
- Teste rápido depois da publicação: páginas principais, login e um fluxo completo.

## O que alimenta este assunto

- **Livros e documentação:** PDFs e outros formatos entram por ficha (ver regra dos arquivos que não são `.md` no mind.md).
- **Conceitos:** uma ideia por nota (injeção de SQL, CSRF, índice de banco, cache).
- **Decisões de projeto:** contexto, decisão, alternativas descartadas e consequências.
- **Padrões e trechos reutilizáveis:** o trecho, quando usar e quando não usar.
- **Problemas resolvidos:** sintoma, causa e correção.
- **Checklists e roteiros:** publicação, revisão, testes.
- **Projetos:** um resumo por projeto, com stack, decisões e pendências.

## Como o Claude Code usa este arquivo

- Em pedidos para criar, revisar, depurar ou publicar sistema, app ou site, ler este arquivo e as notas ligadas a ele antes de responder.
- Dar prioridade ao que está no Mind sobre o conhecimento geral, e avisar quando a resposta vier só de conhecimento geral.
- Seguir a stack de referência. Se outra opção for melhor, propor com justificativa, sem trocar por conta própria.
- Aplicar o checklist de segurança a todo código novo e apontar o que ficou de fora.
- Código e arquivos entregues vão para `RESPOSTAS`, como qualquer resposta.
- Para criar um agente especializado em desenvolvimento, seguir a diretriz [[creator-of-minds]] e começar pelo conteúdo ligado a este arquivo.

## Conexões

- [[The-Definitive-Guide-to-HTML5-(Adam-Freeman) (pdf)]] — livro de referência para a área de front-end (HTML, CSS, JavaScript e DOM) da stack deste assunto
- [[creator-of-minds]] — é a diretriz que este arquivo manda seguir para criar agentes especializados em desenvolvimento
- [[CSS-in-Depth-Second-Edition-(Keith-J-Grant) (pdf)]] — livro de referência atual (2024) de CSS para a área de front-end, com layout, responsividade e desempenho
- [[JavaScript-The-Definitive-Guide-7th-Edition-(David-Flanagan) (pdf)]] — livro de referência de JavaScript (7ª edição, 2020) para a camada de front-end da stack, sem frameworks
- [[The-Art-of-Modern-PHP-8-(Joseph-Edmonds-Lorna-Jane-Mitchell) (epub)]] — livro de referência de PHP 8 moderno para a camada de back-end da stack
- [[PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra) (pdf)]] — livro de referência de PHP 8 orientado a objetos e padrões de projeto (7ª edição, 2024) para a camada de back-end da stack
- [[PHP-and-MySQL-The-Comprehensive-Guide-(Christian-Wenz-Tobias-Hauser) (pdf)]] — livro de referência de PHP e banco de dados (SQL, PDO e MySQL), a base do back-end e do banco da stack, com PHP puro e MySQL via PDO
- [[php-diretrizes-e-referencias]] — lista de fontes de referência de PHP (manual, PSR, OWASP, PHPStan, PHPUnit) que cobre segurança e PDO, onde os livros da biblioteca são fracos; escopo restrito a PHP vanilla, como a stack de referência daqui
- [[SQL-Antipatterns-Volume-1-Avoiding-the-Pitfalls-of-Database-Programming-(Bill-Karwin) (pdf)]] — referência de modelagem e consultas SQL para a área de banco de dados do mapa do assunto, com os erros comuns a evitar
- [[Building-a-StoryBrand-Clarify-Your-Message-So-Customers-Will-Listen-(Donald-Miller) (pdf)]] — o capítulo 12 trata de construir sites com mensagem clara, ligando a mensagem de marketing à implementação de sites e landing pages
- [[The-Lean-Startup-How-Todays-Entrepreneurs-Use-Continuous-Innovation-to-Create-Radically-Successful-Businesses-(Eric-Ries) (pdf)]] — livro de experimentos e produto mínimo, tema vizinho ao escopo mínimo e à construção em fatias do fluxo para criar um sistema; a confirmar na leitura
- [[estrategia]] — assuntos vizinhos: a implementação técnica fica em developer e a estratégia (o que dizer, para quem), aqui
- [[regra-sessoes-seguras-em-php]] — nota destilada (regra): Use sessões PHP só com cookie e proteja o identificador
- [[propriedades-readonly-em-php]] — nota destilada (conceito): Propriedades readonly em PHP 8.1
- [[regra-escolha-o-modelo-de-arvore-pelo-uso]] — nota destilada (regra): Escolha o modelo de árvore pelas consultas de que você precisa
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — nota destilada (regra): Nunca monte SQL juntando texto vindo do usuário
- [[regra-nao-use-associacao-polimorfica]] — nota destilada (regra): Não use uma chave estrangeira de duplo propósito
- [[regra-nao-use-eav-modele-subtipos]] — nota destilada (regra): Evite o modelo entidade-atributo-valor e modele os subtipos
- [[regra-senha-com-hash-e-sal]] — nota destilada (regra): Guarde senhas só como hash com sal, nunca em texto legível
- [[regra-strict-types-em-todo-arquivo-php]] — nota destilada (regra): Declare strict_types e tipos de parâmetro e retorno em todo arquivo PHP
- [[regra-chave-primaria-sob-medida]] — nota destilada (regra): Dê a cada tabela a chave primária que combina com ela
- [[regra-nao-guardar-lista-em-uma-coluna]] — nota destilada (regra): Não guarde uma lista de valores em uma só coluna
- [[enums-em-php]] — nota destilada (conceito): Enumerações em PHP 8.1
- [[regra-declare-chaves-estrangeiras]] — nota destilada (regra): Declare as chaves estrangeiras no banco
- [[regra-upload-seguro-em-php]] — nota destilada (regra): Trate arquivos enviados por upload como entrada não confiável
- [[regra-use-numeric-para-valores-exatos]] — nota destilada (regra): Use NUMERIC ou DECIMAL, e não FLOAT, para valores exatos como dinheiro
- [[regra-valores-permitidos-em-tabela-de-consulta]] — nota destilada (regra): Guarde os valores permitidos em uma tabela de consulta, e não na definição da coluna
- [[indices-com-o-metodo-mentor]] — nota destilada (framework): Índices com o método MENTOR
- [[acesso-ao-banco-com-pdo]] — nota destilada (framework): Acesso ao banco com PDO
- [[validar-formularios-em-php]] — nota destilada (framework): Validar formulários em PHP
- [[produto-minimo-viavel]] — o escopo mínimo e a construção em fatias do fluxo de desenvolvimento aplicam a mesma lógica do MVP
- [[site-que-conta-a-historia-do-cliente]] — sites e landing pages são parte do escopo do centralizador de desenvolvimento
- [[principios-solid]] — nota destilada (conceito): Princípios SOLID, na leitura do livro
- [[divida-tecnica]] — nota destilada (conceito): Dívida técnica
- [[regra-confira-o-motor-innodb-nas-chaves-estrangeiras]] — nota destilada (regra): No MySQL, confira o motor InnoDB e as colunas ao declarar chaves estrangeiras
- [[heranca-no-css]] — nota destilada (conceito): Herança no CSS
- [[regra-nunca-confie-na-entrada-do-usuario]] — nota destilada (regra): Nunca confie na entrada do usuário, nem na URL nem em campos ocultos
- [[regra-escape-a-saida-contra-xss]] — nota destilada (regra): Escape tudo que vai para o HTML
- [[layout-em-grade-css-grid]] — nota destilada (conceito): Layout em grade
- [[cascata-do-css]] — nota destilada (conceito): A cascata do CSS
- [[flexbox]] — nota destilada (conceito): Layout com flexbox
- [[opcoes-de-autenticacao-em-php]] — nota destilada (conceito): Opções de autenticação em PHP
- [[especificidade-de-seletores]] — nota destilada (conceito): Especificidade de seletores no CSS
- [[regra-mantenha-a-especificidade-baixa]] — nota destilada (regra): Mantenha a especificidade dos seletores baixa e evite !important por reflexo
- [[regra-trate-null-como-desconhecido]] — nota destilada (regra): Trate NULL como desconhecido, e não como zero, vazio ou falso
- [[owasp-top-10-2021]] — nota destilada (conceito): OWASP Top 10
- [[design-responsivo-mobile-first]] — nota destilada (conceito): Design responsivo e abordagem mobile first
- [[regra-token-csrf-em-formularios]] — nota destilada (regra): Proteja formulários que mudam dados com um token CSRF
- [[gerenciar-dependencias-com-composer]] — nota destilada (framework): Gerenciar dependências com o Composer
- [[filtrar-entrada-com-filter-input]] — nota destilada (framework): Filtrar e validar entrada com filter_input e filter_var
- [[padroes-de-criacao-de-objetos]] — nota destilada (conceito): Padrões de criação de objetos
- [[padroes-de-projeto]] — nota destilada (conceito): Padrões de projeto
- [[composicao-em-vez-de-heranca]] — nota destilada (conceito): Composição em vez de herança
- [[acoplamento-e-desacoplamento]] — nota destilada (conceito): Acoplamento e desacoplamento
- [[polimorfismo-no-lugar-de-condicionais]] — nota destilada (conceito): Polimorfismo no lugar de condicionais
- [[carregamento-automatico-em-php]] — nota destilada (conceito): Carregamento automático de classes em PHP
- [[funcoes-de-classe-e-objeto-em-php]] — nota destilada (conceito): Funções de classe e de objeto em PHP
- [[responsabilidade-coesao-e-ortogonalidade]] — nota destilada (conceito): Responsabilidade, coesão e ortogonalidade no projeto orientado a objetos
- [[regra-nao-execute-plugins-de-origem-nao-confiavel]] — nota destilada (regra): Não execute código de plugin enviado por usuários
- [[carregamento-de-arquivos-e-include-path]] — nota destilada (conceito): Incluir arquivos em PHP: require, include e include_path
- [[regra-defina-a-responsabilidade-da-classe-em-25-palavras]] — nota destilada (regra): Descreva a responsabilidade de cada classe em 25 palavras ou menos
- [[namespaces-em-php]] — nota destilada (conceito): Namespaces em PHP
- [[controlador-de-pagina-page-controller]] — nota destilada (conceito): Controlador de página
- [[mapeador-de-dados-data-mapper]] — nota destilada (conceito): Mapeador de dados
- [[regra-container-de-di-so-nas-bordas]] — nota destilada (regra): Use o contêiner de injeção de dependência só nas bordas do sistema
- [[front-controller-em-php]] — nota destilada (conceito): Controlador frontal
- [[request-e-response-como-objetos]] — nota destilada (conceito): Objetos de requisição e de resposta
- [[arquitetura-em-camadas]] — nota destilada (conceito): Arquitetura em camadas de aplicações corporativas
- [[padroes-de-banco-de-dados-visao-geral]] — nota destilada (conceito): Padrões de banco de dados em PHP
- [[objeto-de-identidade-identity-object]] — nota destilada (conceito): Objeto de identidade
- [[mapa-de-identidades-identity-map]] — nota destilada (conceito): Mapa de identidades
- [[registry-e-service-locator]] — nota destilada (conceito): Registry
- [[script-de-transacao-e-modelo-de-dominio]] — nota destilada (conceito): Script de transação
- [[unidade-de-trabalho-unit-of-work]] — nota destilada (conceito): Unidade de trabalho
- [[visao-com-modelo-e-auxiliar-de-visao]] — nota destilada (conceito): Visão com modelo
- [[regra-encadeie-promises-em-vez-de-aninhar]] — nota destilada (regra): Encadeie promises em vez de aninhar e trate os erros com catch
- [[assincronia-com-callbacks-e-eventos]] — nota destilada (conceito): Programação assíncrona com callbacks e eventos em JavaScript
- [[async-e-await]] — nota destilada (conceito): async e await em JavaScript
- [[modelo-de-seguranca-da-web-no-navegador]] — nota destilada (conceito): Modelo de segurança do JavaScript no navegador
- [[promises-em-javascript]] — nota destilada (conceito): Promises em JavaScript
- [[regra-fetch-so-rejeita-em-falha-de-rede]] — nota destilada (regra): Confira response.ok: o fetch só rejeita em falha de rede
- [[eventos-no-navegador]] — nota destilada (conceito): Eventos no navegador
- [[selecao-de-elementos-no-dom]] — nota destilada (conceito): Selecionar elementos do documento
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — nota destilada (regra): Nunca insira entrada do usuário no documento com innerHTML
- [[armazenamento-no-navegador]] — nota destilada (conceito): Armazenamento no navegador
- [[navegacao-e-conteudo-no-dom]] — nota destilada (conceito): Navegar pela árvore do DOM, atributos e conteúdo de elementos
- [[usar-a-api-fetch]] — nota destilada (framework): Usar a API fetch para requisições HTTP
- [[validacao-nativa-de-formularios-html5]] — nota destilada (conceito): Validação nativa de formulários em HTML5
- [[outros-elementos-de-formulario-html5]] — nota destilada (conceito): Outros elementos de formulário: select, optgroup, textarea e output
- [[estrutura-de-formularios-html5]] — nota destilada (conceito): Estrutura de formulários em HTML5
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — nota destilada (regra): A validação no navegador complementa, e nunca substitui, a do servidor
- [[tipos-do-elemento-input]] — nota destilada (conceito): Tipos do elemento input em HTML5
- [[transacoes-e-acid]] — nota destilada (conceito): Transações e o princípio ACID
- [[cookies-http]] — nota destilada (conceito): Cookies HTTP: o que são, limites e mitos
- [[sql-basico-para-aplicacoes-web]] — nota destilada (conceito): SQL básico para aplicações web: criar, inserir, consultar e filtrar
- [[regra-nao-guarde-dados-sensiveis-em-cookies]] — nota destilada (regra): Não guarde dados sensíveis em cookies
- [[modelo-relacional-juncoes-e-agregacoes]] — nota destilada (conceito): Modelo relacional, junções
- [[criar-e-ler-cookies-em-php]] — nota destilada (framework): Criar e ler cookies em PHP
- [[regra-prefira-igualdade-estrita-em-javascript]] — nota destilada (regra): Prefira === a == em JavaScript
- [[declaracao-de-variaveis-let-const-e-var]] — nota destilada (conceito): Declaração de variáveis: let, const e var
- [[objetos-como-vetores-associativos-e-copia-de-objetos]] — nota destilada (conceito): Objetos como vetores associativos e cópia de objetos
- [[modulos-no-node-commonjs]] — nota destilada (conceito): Módulos no Node
- [[closures-em-javascript]] — nota destilada (conceito): Closures em JavaScript
- [[parametros-opcionais-e-rest-em-javascript]] — nota destilada (conceito): Parâmetros opcionais, padrão e rest em JavaScript
- [[modulos-es6-em-javascript]] — nota destilada (conceito): Módulos ES6 em JavaScript
- [[funcoes-de-seta-e-o-valor-de-this]] — nota destilada (conceito): Funções de seta e o valor de this
- [[vetores-e-iteracao-em-javascript]] — nota destilada (conceito): Vetores
- [[usar-modulos-javascript-no-navegador]] — nota destilada (framework): Usar módulos JavaScript no navegador
- [[estrutura-basica-de-um-documento-html5]] — nota destilada (conceito): Estrutura básica de um documento HTML5
- [[elementos-de-secao-semanticos-html5]] — nota destilada (conceito): Elementos de seção semânticos do HTML5
- [[metadados-do-documento-html]] — nota destilada (conceito): Metadados do documento HTML: meta, link e style
- [[links-e-urls-relativas-em-html]] — nota destilada (conceito): Links e URLs relativas em HTML
- [[regra-carregue-scripts-com-defer-ou-async]] — nota destilada (regra): Carregue scripts externos com defer ou async
- [[escolher-o-elemento-html-de-texto-pelo-significado]] — nota destilada (framework): Escolher o elemento HTML de texto pelo significado
- [[modelo-de-caixa-do-css]] — nota destilada (conceito): Modelo de caixa do CSS e box-sizing
- [[fluxo-normal-do-documento]] — nota destilada (conceito): Fluxo normal do documento e a assimetria entre largura e altura
- [[regra-prefira-min-height-a-height-fixa]] — nota destilada (regra): Prefira min-height a height fixa
- [[altura-de-elementos-e-overflow]] — nota destilada (conceito): Altura de elementos e overflow
- [[regra-use-line-height-sem-unidade]] — nota destilada (regra): Use line-height sem unidade
- [[regra-use-border-box-em-todos-os-elementos]] — nota destilada (regra): Use border-box em todos os elementos
- [[unidades-relativas-em-css]] — nota destilada (conceito): Unidades relativas em CSS: em, rem e valores computados
- [[margens-negativas-e-colapso-de-margens]] — nota destilada (conceito): Margens negativas e colapso de margens
- [[regra-evite-numeros-magicos-no-css]] — nota destilada (regra): Evite números mágicos no CSS
- [[propriedades-logicas-do-css]] — nota destilada (conceito): Propriedades lógicas do CSS
- [[propriedades-personalizadas-do-css]] — nota destilada (conceito): Propriedades personalizadas do CSS
- [[unidades-de-viewport-em-css]] — nota destilada (conceito): Unidades de viewport em CSS
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — nota destilada (regra): Defina a fonte base na raiz e use unidades relativas
- [[centralizar-um-bloco-na-horizontal]] — nota destilada (framework): Centralizar um bloco na horizontal
- [[fonte-fluida-com-calc-e-clamp]] — nota destilada (framework): Fonte fluida com calc
- [[espacar-elementos-com-o-seletor-coruja]] — nota destilada (framework): Espaçar elementos com o seletor coruja lobotomizada
- [[criar-inserir-e-remover-nos-do-dom]] — nota destilada (conceito): Criar, inserir e remover nós do DOM
- [[controlar-css-por-javascript]] — nota destilada (conceito): Controlar CSS por JavaScript: classes, estilos em linha e estilos computados
- [[url-location-e-historico-de-navegacao]] — nota destilada (conceito): URL, location e histórico de navegação
- [[geometria-e-rolagem-do-documento]] — nota destilada (conceito): Geometria e rolagem do documento
- [[regra-leia-tamanho-e-posicao-com-getboundingclientrect]] — nota destilada (regra): Leia tamanho e posição com getBoundingClientRect
- [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]] — nota destilada (framework): Gerenciar o histórico em aplicações de uma página
- [[regra-use-funcoes-do-php-e-nao-comandos-do-sistema]] — nota destilada (regra): Use funções do PHP, e não comandos do sistema, para arquivos
- [[regra-trave-o-arquivo-ao-ler-e-gravar]] — nota destilada (regra): Trave o arquivo ao ler e gravar
- [[padroes-adapter-e-factory]] — nota destilada (conceito): Padrões Adapter e Factory
- [[emails-mime-html-e-anexos]] — nota destilada (conceito): E-mails MIME: HTML, texto alternativo e anexos
- [[padrao-mvc-modelo-visao-controlador]] — nota destilada (conceito): Padrão MVC
- [[trabalhar-com-arquivos-em-php]] — nota destilada (framework): Trabalhar com arquivos em PHP
- [[enviar-email-com-mail-do-php]] — nota destilada (framework): Enviar e-mail com mail
- [[streams-em-php]] — nota destilada (conceito): Streams em PHP: protocolos, contexto e metadados
- [[regra-registre-so-as-funcoes-permitidas-em-uma-api]] — nota destilada (regra): Registre só as funções permitidas em uma API
- [[filtros-de-stream-em-php]] — nota destilada (conceito): Filtros de stream em PHP
- [[regra-nao-abra-urls-ou-streams-informados-pelo-usuario]] — nota destilada (regra): Não abra URLs ou streams informados pelo usuário
- [[servicos-web-rest-soap-e-wsdl]] — nota destilada (conceito): Serviços web: REST, SOAP e WSDL
- [[fibers-em-php]] — nota destilada (conceito): Fibers em PHP
- [[ajax-e-websockets-com-php]] — nota destilada (conceito): Ajax e WebSockets com PHP
- [[php-e-javascript-ordem-de-execucao-e-troca-de-dados]] — nota destilada (conceito): PHP e JavaScript: ordem de execução e troca de dados
- [[criar-e-consumir-uma-api-rest-simples-em-php]] — nota destilada (framework): Criar e consumir uma API REST simples em PHP
- [[soap-em-php-com-php-soap-e-nusoap]] — nota destilada (framework): SOAP em PHP com PHP-SOAP e nuSOAP
- [[fazer-requisicoes-http-com-streams-em-php]] — nota destilada (framework): Fazer requisições HTTP com streams em PHP
- [[funcoes-do-apache-no-php]] — nota destilada (conceito): Funções do Apache no PHP
- [[regra-compare-o-retorno-de-strpos-com-estrito]] — nota destilada (regra): Regra: compare o retorno de strpos com === false
- [[regra-nao-exiba-erros-na-tela-em-producao]] — nota destilada (regra): Não exiba erros na tela em produção
- [[onde-configurar-o-php]] — nota destilada (conceito): Onde configurar o PHP: php.ini, .htaccess e ini_set
- [[opcoes-importantes-do-php-ini]] — nota destilada (conceito): Opções importantes do php.ini
- [[depurar-php-com-var-dump-e-xdebug]] — nota destilada (framework): Depurar PHP: echo, var_dump e Xdebug
- [[testes-unitarios-em-php-com-phpunit]] — nota destilada (framework): Testes unitários em PHP com PHPUnit
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — nota destilada (conceito): Interfaces, classes abstratas, traits e classes anônimas em PHP
- [[regra-encapsule-propriedades-como-privadas]] — nota destilada (regra): Encapsule as propriedades: privadas, com acesso por métodos
- [[niveis-de-erro-e-set-error-handler]] — nota destilada (conceito): Níveis de erro e set_error_handler
- [[fundamentos-de-classes-e-objetos-em-php]] — nota destilada (conceito): Fundamentos de classes e objetos em PHP
- [[iteracao-de-objetos-em-php]] — nota destilada (conceito): Iteração de objetos em PHP
- [[serializacao-de-objetos-em-php]] — nota destilada (conceito): Serialização de objetos em PHP
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — nota destilada (conceito): Visibilidade, static, final e constantes de classe em PHP
- [[metodos-magicos-e-constantes-magicas-do-php]] — nota destilada (conceito): Métodos mágicos e constantes mágicas do PHP
- [[regra-nao-crie-tabelas-ou-colunas-por-valor-de-dado]] — nota destilada (regra): Não crie tabelas ou colunas por valor de dado
- [[regra-siga-a-regra-do-valor-unico-no-group-by]] — nota destilada (regra): Siga a regra do valor único no GROUP BY
- [[particionamento-de-tabelas]] — nota destilada (conceito): Particionamento de tabelas: horizontal e vertical
- [[regra-nomeie-as-colunas-explicitamente]] — nota destilada (regra): Nomeie as colunas explicitamente
- [[regra-nao-resolva-um-problema-complexo-em-uma-consulta-so]] — nota destilada (regra): Não resolva um problema complexo em uma consulta só
- [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]] — nota destilada (regra): Não crie colunas numeradas para valores múltiplos
- [[regra-nao-use-like-com-curinga-para-buscar-palavras]] — nota destilada (regra): Não use LIKE com curinga para buscar palavras
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — nota destilada (conceito): Imagens e arquivos: no banco
- [[valor-historico-em-tabela-de-associacao]] — nota destilada (conceito): Valor histórico em tabela de associação não é redundância
- [[produto-cartesiano-nao-intencional]] — nota destilada (conceito): Produto cartesiano não intencional
- [[obter-a-linha-com-o-maior-valor-por-grupo]] — nota destilada (framework): Obter a linha com o maior valor por grupo
- [[implementar-busca-por-palavras-no-mysql]] — nota destilada (framework): Implementar busca por palavras no MySQL
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — nota destilada (regra): Verifique erros do banco e depure o SQL que foi de fato enviado
- [[formas-normais-resumo]] — nota destilada (conceito): Formas normais: resumo da 1FN à 6FN
- [[regra-nao-renumere-chaves-primarias-nem-reaproveite-ids]] — nota destilada (regra): Não renumere chaves primárias nem reaproveite IDs
- [[regra-normalize-primeiro-e-desnormalize-so-com-medicao]] — nota destilada (regra): Normalize primeiro e desnormalize só com medição
- [[numerar-linhas-do-resultado-com-row-number]] — nota destilada (conceito): Numerar linhas do resultado com ROW_NUMBER e GUIDs como chave
- [[regra-prefira-consultas-de-conteiner-as-de-midia-nos-modulos]] — nota destilada (regra): Prefira consultas de contêiner às de mídia nos módulos
- [[is-e-where-em-seletores-css]] — nota destilada (conceito): Os pseudoclasses :is
- [[regra-limite-o-aninhamento-a-tres-niveis]] — nota destilada (regra): Limite o aninhamento a três níveis e declare as propriedades primeiro
- [[regra-organize-os-z-index-e-posicione-o-minimo]] — nota destilada (regra): Organize os z-index e posicione o mínimo possível
- [[contextos-de-empilhamento-e-z-index]] — nota destilada (conceito): Contextos de empilhamento e z-index
- [[tipos-de-posicionamento-em-css]] — nota destilada (conceito): Tipos de posicionamento em CSS: fixed, absolute, relative e sticky
- [[consultas-de-estilo-de-conteiner]] — nota destilada (conceito): Consultas de estilo de contêiner
- [[aninhamento-de-css]] — nota destilada (conceito): Aninhamento de CSS
- [[camadas-da-cascata-em-css]] — nota destilada (conceito): Camadas da cascata
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — nota destilada (framework): Tornar um módulo responsivo ao seu contêiner
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — nota destilada (framework): Organização de uma folha de estilo em seis camadas
- [[construir-modal-e-menu-suspenso-com-posicionamento]] — nota destilada (framework): Construir um modal e um menu suspenso com posicionamento
- [[css-modular-modulos-variantes-e-bem]] — nota destilada (conceito): CSS modular: módulos, variantes e nomes
- [[regra-garanta-o-contraste-minimo-do-texto-wcag]] — nota destilada (regra): Garanta o contraste mínimo do texto
- [[escopo-em-css-com-scope]] — nota destilada (conceito): Escopo em CSS com @scope
- [[espacamento-de-texto-line-height-letter-spacing-e-text-transform]] — nota destilada (conceito): Espaçamento de texto: line-height, letter-spacing e text-transform
- [[regra-carregue-so-as-fontes-necessarias-e-escolha-o-font-display]] — nota destilada (regra): Carregue só as fontes necessárias e escolha o font-display
- [[contraste-visual-como-ferramenta-de-design]] — nota destilada (conceito): Contraste visual como ferramenta de design
- [[fontes-web-e-font-face]] — nota destilada (conceito): Fontes web e @font-face
- [[fontes-variaveis-em-css]] — nota destilada (conceito): Fontes variáveis em CSS
- [[regra-nao-altere-um-modulo-com-seletores-de-contexto]] — nota destilada (regra): Não altere um módulo com seletores de contexto
- [[notacoes-de-cor-em-css-e-oklch]] — nota destilada (conceito): Notações de cor em CSS: gamute, espaços de cor e OKLCH
- [[espacamento-preciso-ao-implementar-um-design]] — nota destilada (framework): Espaçamento preciso ao implementar um design
- [[biblioteca-de-padroes-e-fluxo-css-primeiro]] — nota destilada (framework): Biblioteca de padrões e fluxo CSS primeiro
- [[organizar-cores-com-propriedades-personalizadas]] — nota destilada (framework): Organizar cores com propriedades personalizadas
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — nota destilada (conceito): Contêiner de injeção de dependências: como funciona
- [[criar-instancias-por-clone-reflexao-e-serializacao]] — nota destilada (conceito): Criar instâncias por clone, reflexão e serialização
- [[regra-use-sempre-a-comparacao-identica-em-php]] — nota destilada (regra): Use sempre a comparação idêntica
- [[tipos-escalares-do-php-e-armadilhas]] — nota destilada (conceito): Tipos escalares do PHP e suas armadilhas
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — nota destilada (conceito): Null, void e propriedades não inicializadas em PHP
- [[vetores-iteraveis-e-geradores-em-php]] — nota destilada (conceito): Vetores, iteráveis e geradores em PHP
- [[regra-nao-desserialize-dados-nao-confiaveis]] — nota destilada (regra): Não desserialize dados não confiáveis
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — nota destilada (conceito): Tipos de objeto, herança de tipos, comparação e referências
- [[regra-nao-use-float-para-dinheiro]] — nota destilada (regra): Não use float para dinheiro
- [[padrao-facade]] — nota destilada (conceito): Padrão Facade
- [[padrao-interpreter-e-mini-linguagens]] — nota destilada (conceito): Padrão Interpreter e mini-linguagens
- [[padrao-decorator]] — nota destilada (conceito): Padrão Decorator
- [[padrao-composite]] — nota destilada (conceito): Padrão Composite
- [[regra-componentes-devem-expor-capacidades-nao-tipos]] — nota destilada (regra): Componentes devem expor capacidades, não tipos
- [[padrao-null-object]] — nota destilada (conceito): Padrão Null Object
- [[padrao-command]] — nota destilada (conceito): Padrão Command
- [[padrao-visitor]] — nota destilada (conceito): Padrão Visitor
- [[padrao-strategy]] — nota destilada (conceito): Padrão Strategy
- [[padrao-observer]] — nota destilada (conceito): Padrão Observer
- [[listas-e-figuras-em-html]] — nota destilada (conceito): Listas e figuras em HTML
- [[tabelas-em-html5]] — nota destilada (conceito): Tabelas em HTML5
- [[imagens-e-mapas-de-imagem-em-html]] — nota destilada (conceito): Imagens e mapas de imagem em HTML
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — nota destilada (regra): Sempre informe alt e as dimensões das imagens
- [[regra-nao-use-tabelas-para-o-layout-da-pagina]] — nota destilada (regra): Não use tabelas para o layout da página
- [[agrupar-conteudo-em-html]] — nota destilada (conceito): Agrupar conteúdo em HTML: p, div, pre, blockquote e hr
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — nota destilada (regra): Escolha o elemento HTML mais específico e use-o com consistência
- [[iframe-object-embed-progress-e-meter-em-html5]] — nota destilada (conceito): iframe, object e embed em HTML5, progress e meter
- [[o-que-os-padroes-de-projeto-oferecem-e-seus-limites]] — nota destilada (conceito): O que os padrões de projeto oferecem
- [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] — nota destilada (regra): Centralize as classes reutilizáveis em vez de copiá-las entre projetos
- [[principios-de-projeto-orientado-a-objetos-resumo]] — nota destilada (conceito): Princípios de projeto orientado a objetos: resumo do livro
- [[regra-faca-o-mais-simples-que-funcione-antes-de-aplicar-um-padrao]] — nota destilada (regra): Faça o mais simples que funcione antes de aplicar um padrão
- [[playbook-pagina-responsiva-em-css]] — nota destilada (playbook): Playbook de página responsiva em CSS
- [[playbook-formulario-seguro-em-php]] — nota destilada (playbook): Playbook de formulário seguro em PHP
- [[componentes-web-templates-elementos-customizados-e-shadow-dom]] — nota destilada (conceito): Componentes web: templates, elementos customizados e shadow DOM
- [[websockets-no-navegador]] — nota destilada (conceito): WebSockets no navegador
- [[workers-threads-no-navegador]] — nota destilada (conceito): Workers: threads no navegador
- [[server-sent-events-com-eventsource]] — nota destilada (conceito): Server-Sent Events com EventSource
- [[indexeddb-banco-de-objetos-no-navegador]] — nota destilada (conceito): IndexedDB: banco de objetos no navegador
- [[postmessage-messagechannel-e-mensagens-entre-janelas]] — nota destilada (conceito): postMessage, MessageChannel e mensagens entre janelas
- [[cookies-no-javascript-document-cookie]] — nota destilada (conceito): Cookies no JavaScript
- [[padrao-fluent-interface-fluente]] — nota destilada (conceito): Interface fluente
- [[regra-use-retorno-antecipado-em-vez-de-condicionais-aninhadas]] — nota destilada (regra): Use retorno antecipado em vez de condicionais aninhadas
- [[padrao-chain-of-responsibility]] — nota destilada (conceito): Padrão Chain of Responsibility
- [[imutabilidade-datetime-e-datetimeimmutable]] — nota destilada (conceito): Imutabilidade: DateTime e DateTimeImmutable
- [[nomes-claros-e-linguagem-ubiqua-no-codigo]] — nota destilada (conceito): Nomes claros e linguagem ubíqua no código
- [[padrao-strangler]] — nota destilada (conceito): Padrão Strangler
- [[regra-nao-repita-valores-use-constantes-nomeadas]] — nota destilada (regra): Não repita valores: use constantes nomeadas em vez de números e textos mágicos
- [[regra-evite-o-singleton-classico]] — nota destilada (regra): Regra: evite o Singleton clássico
- [[regra-use-tipos-de-retorno-precisos-em-vez-de-interfaces-vagas]] — nota destilada (regra): Use tipos de retorno precisos em vez de interfaces vagas
- [[padrao-builder]] — nota destilada (conceito): Padrão Builder
- [[complexidade-ciclomatica]] — nota destilada (conceito): Complexidade ciclomática
- [[tipos-de-intersecao-em-php]] — nota destilada (conceito): Tipos de interseção em PHP 8.1
- [[tipo-de-retorno-never-em-php]] — nota destilada (conceito): Tipo de retorno never em PHP 8.1
- [[constantes-final-em-php]] — nota destilada (conceito): Constantes final em PHP 8.1
- [[atributos-nativos-do-php-8]] — nota destilada (conceito): Atributos nativos do PHP 8
- [[reflection-api-do-php]] — nota destilada (conceito): Reflection API do PHP
- [[spl-iteradores-e-classes-padrao-do-php]] — nota destilada (conceito): SPL: iteradores e classes padrão do PHP
- [[classes-e-prototipos-em-javascript]] — nota destilada (conceito): Classes e protótipos em JavaScript
- [[classes-abstratas-e-hierarquias-de-classes-em-javascript]] — nota destilada (conceito): Classes abstratas e hierarquias de classes em JavaScript
- [[classes-com-a-palavra-class-em-javascript]] — nota destilada (conceito): Classes com a palavra class em JavaScript
- [[subclasses-com-extends-e-super-em-javascript]] — nota destilada (conceito): Subclasses com extends e super em JavaScript
- [[campos-publicos-privados-e-estaticos-em-classes-javascript]] — nota destilada (conceito): Campos públicos, privados e estáticos em classes JavaScript
- [[regra-prefira-delegacao-a-heranca-em-javascript]] — nota destilada (regra): Regra: prefira delegação à herança em JavaScript
- [[regra-nao-adicione-metodos-aos-prototipos-dos-tipos-nativos]] — nota destilada (regra): Regra: não adicione métodos aos protótipos dos tipos nativos
- [[regra-nunca-passe-texto-do-usuario-a-eval]] — nota destilada (regra): Regra: nunca passe texto vindo do usuário a eval
- [[condicionais-em-javascript-if-else-if-e-switch]] — nota destilada (conceito): Condicionais em JavaScript: if, else if e switch
- [[precedencia-associatividade-e-ordem-de-avaliacao-em-javascript]] — nota destilada (conceito): Precedência, associatividade e ordem de avaliação em JavaScript
- [[modo-estrito-em-javascript]] — nota destilada (conceito): Modo estrito em JavaScript
- [[regra-use-nullish-em-vez-de-ou-para-valores-padrao]] — nota destilada (regra): Regra: use ?? em vez de || para valores padrão
- [[acesso-condicional-e-invocacao-condicional-em-javascript]] — nota destilada (conceito): Acesso condicional e invocação condicional
- [[igualdade-comparacao-e-operador-mais-em-javascript]] — nota destilada (conceito): Igualdade, comparação e o operador + em JavaScript
- [[lacos-em-javascript-for-of-e-for-in]] — nota destilada (conceito): Laços em JavaScript: for, for/of e for/in
- [[typeof-delete-e-outros-operadores-de-javascript]] — nota destilada (conceito): typeof, delete e outros operadores de JavaScript
- [[eval-em-javascript]] — nota destilada (conceito): eval
- [[operadores-logicos-e-valores-padrao-em-javascript]] — nota destilada (conceito): Operadores lógicos, ?? e valores padrão em JavaScript
- [[excecoes-em-javascript-throw-e-try-catch-finally]] — nota destilada (conceito): Exceções em JavaScript: throw e try/catch/finally
- [[regra-use-for-of-e-nao-for-in-para-vetores]] — nota destilada (regra): Regra: use for/of, e não for/in, para percorrer vetores
- [[temporizadores-settimeout-e-setinterval]] — nota destilada (conceito): Temporizadores: setTimeout e setInterval
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — nota destilada (conceito): JSON em JavaScript: stringify, parse, toJSON, replacer e reviver
- [[internacionalizacao-com-intl-em-javascript]] — nota destilada (conceito): Internacionalização com Intl em JavaScript
- [[metodos-de-string-com-expressoes-regulares-em-javascript]] — nota destilada (conceito): Métodos de string com expressões regulares
- [[console-api-do-javascript]] — nota destilada (conceito): Console API do JavaScript
- [[datas-e-horas-com-date-em-javascript]] — nota destilada (conceito): Datas e horas com Date em JavaScript
- [[classe-url-e-urlsearchparams-em-javascript]] — nota destilada (conceito): Classe URL e URLSearchParams em JavaScript
- [[expressoes-regulares-em-javascript-sintaxe-e-flags]] — nota destilada (conceito): Expressões regulares em JavaScript: sintaxe e flags
- [[classes-de-erro-do-javascript-e-erros-personalizados]] — nota destilada (conceito): Classes de erro do JavaScript e erros personalizados
- [[sets-e-maps-em-javascript]] — nota destilada (conceito): Set, Map, WeakMap e WeakSet em JavaScript
- [[arrays-tipados-e-arraybuffer-em-javascript]] — nota destilada (conceito): Arrays tipados e ArrayBuffer em JavaScript
- [[regra-nao-reutilize-regex-global-em-lacos-sem-controlar-lastindex]] — nota destilada (regra): Regra: não reutilize uma regex com g ou y em laços sem controlar lastIndex
- [[regra-ordene-textos-para-pessoas-com-intl-collator]] — nota destilada (regra): Regra: ordene textos para pessoas com Intl.Collator
- [[trafego]] — o tráfego define o que medir e como nomear; este assunto implementa o rastreamento (Tag Manager, pixels, UTM, consentimento) nos sites e sistemas
- [[mapa-css-in-depth]] — mapa de destilação de livro-base deste assunto: Mapa de CSS in Depth, Second Edition
- [[mapa-javascript-the-definitive-guide]] — mapa de destilação de livro-base deste assunto: Mapa de JavaScript, The Definitive Guide (7ª edição)
- [[mapa-php-8-objects-patterns-and-practice]] — mapa de destilação de livro-base deste assunto: Mapa de PHP 8 Objects, Patterns, and Practice
- [[mapa-php-and-mysql-the-comprehensive-guide]] — mapa de destilação de livro-base deste assunto: Mapa de PHP and MySQL, The Comprehensive Guide
- [[mapa-sql-antipatterns]] — mapa de destilação de livro-base deste assunto: Mapa de SQL Antipatterns
- [[mapa-the-art-of-modern-php-8]] — mapa de destilação de livro-base deste assunto: Mapa de The Art of Modern PHP 8
- [[mapa-the-definitive-guide-to-html5]] — mapa de destilação de livro-base deste assunto: Mapa de The Definitive Guide to HTML5
- [[animacoes-com-keyframes-em-css]] — nota destilada (conceito): Animações com keyframes em CSS (@keyframes e animation)
- [[antipadrao-de-sql-o-que-e]] — nota destilada (conceito): Antipadrão de SQL, o que é e como o livro organiza cada um
- [[api-de-validacao-de-formularios-por-javascript]] — nota destilada (conceito): API de validação de formulários por JavaScript (checkValidity e setCustomValidity)
- [[apis-do-navegador-para-conhecer]] — nota destilada (conceito): APIs do navegador para conhecer (lista do fim do capítulo 15)
- [[aplicacoes-offline-appcache-e-service-workers]] — nota destilada (conceito): Aplicações offline (o AppCache do livro e o que o substituiu)
- [[atributos-globais-booleanos-e-data-em-html]] — nota destilada (conceito): Atributos globais, booleanos e data-* em HTML
- [[audio-e-video-em-html5]] — nota destilada (conceito): Áudio e vídeo em HTML5 (video, audio, source e track)
- [[callbacks-funcoes-anonimas-e-closures-em-php]] — nota destilada (conceito): Callbacks, funções anônimas e closures em PHP
- [[cors-requisicoes-entre-origens]] — nota destilada (conceito): CORS, requisições entre origens (cross-origin resource sharing)
- [[declaracoes-de-tipo-em-php-uniao-anulavel-mixed-e-dnf]] — nota destilada (conceito): Declarações de tipo em PHP (união, anulável, mixed e DNF)
- [[diferencas-entre-navegadores-e-deteccao-de-recursos]] — nota destilada (conceito): Diferenças entre navegadores e detecção de recursos
- [[efeitos-sonoros-com-audio-e-webaudio]] — nota destilada (conceito): Efeitos sonoros com Audio e WebAudio
- [[estilos-de-programacao-procedural-funcional-e-orientado-a-objetos]] — nota destilada (conceito): Estilos de programação em PHP (procedural, funcional e orientado a objetos)
- [[expressoes-regulares-em-php-com-preg]] — nota destilada (conceito): Expressões regulares em PHP com preg_match e preg_replace
- [[ferramentas-do-javascript-eslint-prettier-jest-e-empacotadores]] — nota destilada (conceito): Ferramentas do JavaScript (ESLint, Prettier, Jest, npm, empacotadores, Babel e TypeScript)
- [[filtros-mascaras-e-recortes-em-css]] — nota destilada (conceito): Filtros, máscaras e recortes em CSS (filter, mask, clip-path, shape-outside)
- [[funcoes-de-vetores-em-php]] — nota destilada (conceito): Funções de vetores em PHP (busca, ordenação e manipulação)
- [[geolocalizacao-no-navegador]] — nota destilada (conceito): Geolocalização no navegador (Geolocation API)
- [[gradientes-sombras-e-modos-de-mesclagem-em-css]] — nota destilada (conceito): Gradientes, sombras e modos de mesclagem em CSS (gradients, shadows, blend modes)
- [[iteradores-e-geradores-em-javascript]] — nota destilada (conceito): Iteradores e geradores em JavaScript (Symbol.iterator, function* e yield)
- [[match-e-switch-em-php]] — nota destilada (conceito): match e switch em PHP
- [[metaprogramacao-em-javascript]] — nota destilada (conceito): Metaprogramação em JavaScript (atributos de propriedade, Object.freeze, Reflect e Proxy)
- [[mysqli-extensao-do-mysql-para-php]] — nota destilada (conceito): mysqli, a extensão do MySQL para PHP (e quando preferir o PDO)
- [[node-js-javascript-fora-do-navegador]] — nota destilada (conceito): Node.js, JavaScript fora do navegador
- [[numeros-aleatorios-e-precisao-em-php]] — nota destilada (conceito): Números aleatórios e precisão decimal em PHP (Randomizer e BCMath)
- [[outros-bancos-de-dados-com-php]] — nota destilada (conceito): Outros bancos de dados com PHP (SQLite, SQL Server, Oracle, PostgreSQL e MongoDB)
- [[padrao-collection-colecao-tipada]] — nota destilada (conceito): Padrão Collection (coleção tipada) em PHP
- [[padrao-repository-repositorio]] — nota destilada (conceito): Padrão Repository (repositório) e entidades
- [[propagacao-e-cancelamento-de-eventos]] — nota destilada (conceito): Propagação e cancelamento de eventos (bubbling, capturing e delegação)
- [[seletores-css-atributos-combinadores-e-pseudoclasses]] — nota destilada (conceito): Seletores CSS (atributos, combinadores, pseudoclasses e pseudoelementos)
- [[sintomas-de-um-projeto-php-que-degringola]] — nota destilada (conceito): Sintomas de um projeto PHP que degringola (a evolução do desastre)
- [[svg-no-html-e-por-javascript]] — nota destilada (conceito): SVG no HTML e por JavaScript (scalable vector graphics)
- [[transformacoes-em-css]] — nota destilada (conceito): Transformações em CSS (transform, translate, rotate, scale)
- [[versoes-do-ecmascript-e-ambientes-do-javascript]] — nota destilada (conceito): Versões do ECMAScript e ambientes do JavaScript
- [[xml-imagens-e-pdf-com-php]] — nota destilada (conceito): XML, imagens e PDF com PHP (SimpleXML, DOM, GD e TCPDF)
- [[xmlhttprequest-estados-eventos-e-erros]] — nota destilada (conceito): XMLHttpRequest: estados, eventos e erros
- [[regra-anime-so-transform-e-opacity]] — nota destilada (regra): Anime só transform e opacity
- [[regra-chame-preventdefault-no-inicio-do-tratador]] — nota destilada (regra): Chame preventDefault no início do tratador
- [[regra-crie-elementos-svg-com-createelementns]] — nota destilada (regra): Crie elementos SVG com createElementNS
- [[regra-guarde-senhas-com-password-hash]] — nota destilada (regra): Guarde senhas com password_hash, nunca com md5 ou sha1
- [[regra-leia-superglobais-em-um-so-lugar]] — nota destilada (regra): Leia as superglobais em um só lugar
- [[regra-nao-crie-propriedades-dinamicas]] — nota destilada (regra): Não crie propriedades dinâmicas em objetos
- [[regra-nao-defina-tratadores-de-evento-em-atributos-html]] — nota destilada (regra): Não defina tratadores de evento em atributos HTML
- [[regra-nao-ordene-por-rand-em-tabelas-grandes]] — nota destilada (regra): Não ordene por RAND() em tabelas grandes
- [[regra-nao-quebre-a-linha-depois-de-return]] — nota destilada (regra): Não quebre a linha depois de return e use ponto e vírgula em JavaScript
- [[regra-nao-use-die-ou-exit-para-tratar-erros]] — nota destilada (regra): Não use die ou exit para tratar erros
- [[regra-nunca-silencie-excecoes]] — nota destilada (regra): Nunca silencie exceções
- [[regra-omita-a-tag-de-fechamento-em-arquivos-so-php]] — nota destilada (regra): Omita a tag de fechamento em arquivos só com PHP
- [[regra-prefira-logica-no-php-a-procedimentos-armazenados]] — nota destilada (regra): Prefira a lógica no PHP a procedimentos armazenados
- [[regra-respeite-prefers-reduced-motion]] — nota destilada (regra): Respeite a preferência de movimento reduzido (prefers-reduced-motion)
- [[regra-trate-o-codigo-do-banco-como-codigo]] — nota destilada (regra): Trate o código do banco como código (versionar, documentar e testar)
- [[regra-use-metodos-magicos-com-cuidado-e-documente]] — nota destilada (regra): Use métodos mágicos com cuidado e documente
- [[regra-use-require-para-arquivos-essenciais]] — nota destilada (regra): Use require_once para arquivos essenciais
- [[arrastar-e-soltar-com-a-api-nativa-do-html5]] — nota destilada (framework): Arrastar e soltar com a API nativa do HTML5 (drag and drop)
- [[converter-erros-em-excecoes-com-manipuladores-globais]] — nota destilada (framework): Converter erros em exceções com manipuladores globais (set_error_handler e set_exception_handler)
- [[criar-transicoes-em-css]] — nota destilada (framework): Criar transições em CSS (transition)
- [[criar-um-pacote-composer-e-versionar-com-semver]] — nota destilada (framework): Criar um pacote Composer e versionar com SemVer
- [[desenhar-graficos-com-canvas]] — nota destilada (framework): Desenhar gráficos com canvas (API 2D)
- [[diagnosticar-erros-de-ambiente-php]] — nota destilada (framework): Diagnosticar erros de ambiente PHP (404, 500, código-fonte na tela, extensão faltando)
- [[disparar-eventos-personalizados-com-customevent]] — nota destilada (framework): Disparar eventos personalizados com CustomEvent
- [[enviar-formulario-por-ajax-com-formdata]] — nota destilada (framework): Enviar formulário por Ajax com FormData
- [[escapar-texto-conforme-o-destino-em-php]] — nota destilada (framework): Escapar texto conforme o destino em PHP (HTML, URL, SQL e regex)
- [[registrar-tratadores-de-eventos-com-addeventlistener]] — nota destilada (framework): Registrar tratadores de eventos com addEventListener
- [[renderizar-templates-em-php-puro-com-buffer-de-saida]] — nota destilada (framework): Renderizar templates em PHP puro com buffer de saída
- [[trabalhar-com-datas-em-php-com-datetime]] — nota destilada (framework): Trabalhar com datas em PHP com DateTime
- [[tratar-erros-com-excecoes-em-php]] — nota destilada (framework): Tratar erros com exceções em PHP
- [[The-Art-of-SEO-Mastering-Search-Engine-Optimization-(Eric-Enge-Stephan-Spencer) (pdf)]] — livro de SEO cujos capítulos de implementação e site amigável cobrem o tema "Desempenho e SEO técnico" do assunto
- [[guia-google-ads-brasil]] — o rastreamento de conversões do módulo B é implementado pela área de desenvolvimento
- [[guia-trafego-pago-meta-brasil]] — pixel e API de conversões são implementados pela área de desenvolvimento
- [[mapa-dos-guias-de-trafego]] — implementa o rastreamento que os guias de mensuração exigem
- [[operador-do-mind]] — o Operador do Mind começa por este centralizador nas tarefas de construção
- [[loja-veiculos-TEMPLATE-1]] — template de estrutura de pastas para site de loja de veículos, em `developer/templates/sites/veiculos/`, comentado a partir de um projeto real
- [[head-site-veiculos-TEMPLATE-1]] — template do `<head>` de site de loja de veículos, em `developer/templates/sites/veiculos/`, com SEO, segurança e desempenho
