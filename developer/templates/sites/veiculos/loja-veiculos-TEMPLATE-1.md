---
titulo: "Template 1: estrutura de site para loja de veículos"
tipo: template
assunto: developer
criado: 2026-11-24
atualizado: 2026-11-24
---

# Template 1: estrutura de site para loja de veículos

Representação em caracteres da estrutura de diretórios de um site de loja de veículos (estoque, financiamento, painel administrativo e páginas institucionais). Nasceu da estrutura de um projeto real de loja de motos, generalizada: o que era específico de moto virou `veiculo`, o nome da loja virou `LOJA_DE_VEICULOS` e o que era de um produto à parte (acessórios) foi retirado. Os comentários após `#` explicam o papel de cada peça e as decisões que valem repetir em projetos novos.

Stack assumida: a do centralizador [[developer]] (PHP puro, MySQL via PDO, HTML/CSS/JS sem frameworks, hospedagem compartilhada, publicação por FTP).

## Estrutura

```
LOJA_DE_VEICULOS/                      # pasta-mãe: fica FORA do que o servidor publica
├── db-secrets.php                     # credenciais do banco; fora da pasta pública, nunca versionado
├── admin-secrets.php                  # usuários e hashes de senha do painel administrativo
└── public_html/                       # única pasta acessível por URL
    ├── .htaccess                      # regras globais: charset, bloqueio de listagem de pastas,
    │                                  # bloqueio de arquivos sensíveis, cabeçalhos de segurança
    │                                  # e rotas amigáveis (ex.: /estoque/veiculos/<slug>)
    ├── index.php                      # home: hero, destaques do estoque, avaliações, chamada p/ financiamento
    ├── robots.txt                     # orientação para buscadores (bloqueie admin e rotas internas)
    ├── sitemap.xml                    # mapa para indexação; precisa incluir cada veículo ativo
    ├── site.webmanifest               # metadados do site instalável (nome, cores, ícones)
    ├── favicon.ico / favicon.svg / favicon-96x96.png
    ├── apple-touch-icon.png           # ícones em vários tamanhos: o conjunto cobre navegador,
    ├── android-chrome-192x192.png     # iPhone e Android
    ├── android-chrome-512x512.png
    │
    ├── admin/                         # painel de quem opera a loja (cadastro de estoque, clientes, avaliações)
    │   ├── .htaccess                  # reforço de proteção da área administrativa
    │   ├── index.php                  # ponto de entrada: redireciona para login ou dashboard
    │   ├── login.php                  # login com sessão segura; senha só como hash
    │   ├── dashboard.php              # resumo: veículos ativos, simulações recebidas, pendências
    │   ├── assets/                    # CSS e JS do painel, separados dos do site público
    │   │   ├── scripts/               # um .js por tela: admin, avaliacoes, cadastrar-veiculo, estoque
    │   │   │   ├── admin.js
    │   │   │   ├── avaliacoes.js
    │   │   │   ├── cadastrar-veiculo.js
    │   │   │   └── estoque.js
    │   │   └── styles/                # um .css por tela, com o mesmo nome do .js correspondente
    │   │       ├── admin.css
    │   │       ├── avaliacoes.css
    │   │       ├── cadastrar-veiculo.css
    │   │       └── estoque.css
    │   ├── avaliacoes/                # moderação das avaliações de clientes exibidas no site
    │   │   └── index.php
    │   ├── clientes/                  # contatos e simulações de financiamento recebidos
    │   │   └── index.php
    │   ├── estoque/                   # lista de veículos: ativar, desativar, editar, excluir
    │   │   ├── index.php
    │   │   └── cadastrar-veiculo/     # formulário de cadastro com várias fotos
    │   │       └── index.php
    │   └── includes/                  # código interno do painel; acesso direto por URL negado
    │       ├── .htaccess              # "Require all denied": ninguém abre estes arquivos pelo navegador
    │       ├── auth.php               # funções de login e logout
    │       ├── guard.php              # incluído no topo de toda página do painel: barra quem não logou
    │       ├── slug-generator.php     # gera o endereço amigável do veículo (sem acento, sem duplicar)
    │       └── upload-handler.php     # valida e salva fotos (tipo real, tamanho máximo, nome aleatório)
    │
    ├── assets/                        # arquivos estáticos do site público
    │   ├── images/
    │   │   ├── logo-header.svg        # logo do cabeçalho em SVG: nítido em qualquer tamanho
    │   │   ├── loja-icone.png         # ícone da marca
    │   │   ├── loja-og.jpg            # imagem de pré-visualização ao compartilhar o link (redes e WhatsApp)
    │   │   ├── avaliacoes/            # prints e fotos enviados por clientes
    │   │   │   ├── .htaccess          # pasta de upload: bloqueia execução de código
    │   │   │   └── <imagens das avaliações: .jpg/.png, nomes aleatórios>
    │   │   ├── home/                  # imagens fixas da página inicial
    │   │   │   ├── aperto-maos.jpg
    │   │   │   ├── google-img.png     # selo/print de avaliações do Google (prova social)
    │   │   │   ├── hero-bg.jpg        # fundo da primeira dobra
    │   │   │   └── loja-veiculos-usados-seminovos-frente.jpg   # foto da loja; nome com termos de busca ajuda no SEO
    │   │   ├── sobre-nos/
    │   │   │   └── fachada.jpg
    │   │   └── veiculos/              # fotos do estoque, enviadas pelo painel
    │   │       ├── .htaccess          # upload: nunca executa código (duas camadas, serve a qualquer config de PHP)
    │   │       └── <fotos dos veículos: .jpg, nomes aleatórios>
    │   ├── scripts/                   # um .js por página, com o mesmo nome da página
    │   │   ├── components/            # peças repetidas em várias páginas
    │   │   │   ├── consent-tracking.js   # aviso de cookies; só dispara pixels/tags após o aceite (LGPD)
    │   │   │   └── header.js             # menu responsivo
    │   │   ├── estoque.js             # filtros e busca da listagem
    │   │   ├── financiamento.js       # simulador e envio do formulário
    │   │   ├── home.js
    │   │   └── veiculo.js             # galeria de fotos e botões da página do veículo
    │   └── styles/                    # um .css por página + componentes compartilhados
    │       ├── components/
    │       │   ├── footer.css
    │       │   └── header.css
    │       ├── estoque.css
    │       ├── financiamento.css
    │       ├── home.css
    │       ├── negociacao-garantia.css
    │       ├── sobre-nos.css
    │       └── veiculo.css
    │
    ├── estoque/                       # vitrine pública
    │   ├── index.php                  # listagem com filtros (marca, modelo, preço, ano)
    │   ├── api/
    │   │   └── search.php             # busca por texto; devolve JSON; ignora acento, espaço e traço ("CB 300" = "cb300")
    │   └── veiculos/
    │       ├── .htaccess              # só registra que a rota é tratada pelo .htaccess da raiz (uma fonte de verdade)
    │       └── veiculo.php            # página de um veículo, buscada por slug; slug inexistente = 404
    │
    ├── financiamento/                 # funil de crédito, o principal gerador de contato
    │   ├── index.php                  # simulador + cadastro
    │   ├── recebendo-chave.png
    │   ├── api/                       # endpoints chamados pelo JS; gravam no banco com prepared statements
    │   │   ├── salvar-cadastro-financiamento.php
    │   │   └── salvar-simulacao.php
    │   ├── whatsapp-financiamento/    # páginas-ponte: registram o clique e redirecionam ao WhatsApp,
    │   │   └── index.php              # o que permite medir a origem de cada contato
    │   └── whatsapp-simulacao/
    │       └── index.php
    │
    ├── hash/                          # utilitário isolado que gera o hash de uma senha nova
    │   └── index.php                  # sem banco, sem sessão, sem cache; REMOVA do servidor se não for usar
    │
    ├── includes/                      # código compartilhado do site; acesso direto por URL negado
    │   ├── .htaccess                  # "Require all denied"
    │   ├── 404.php                    # página de erro própria
    │   ├── config.php                 # URL do site, WhatsApp, telefone: dados que mudam por loja ficam aqui
    │   ├── db.php                     # conexão PDO única (getDB), lê o db-secrets.php
    │   ├── expurgo-lgpd.php           # rotina de limpeza de dados pessoais por prazo; só roda via cron (CLI), nunca por URL
    │   ├── footer.php
    │   ├── head.php                   # <head> único de todas as páginas (SEO, compartilhamento, desempenho); modelo em head-site-veiculos-TEMPLATE-1
    │   ├── header.php                 # cabeçalho visível da página (logo e menu), não confundir com o <head>
    │   ├── jsonld.php                 # monta os dados estruturados: loja, veículo e trilha de navegação
    │   ├── money.php                  # formatação de preço em reais, em um só lugar
    │   └── security.php               # cabeçalhos de segurança e política de conteúdo (CSP), incluído em toda página
    │
    ├── links/                         # página de "links rápidos" (bio de rede social), instalável como app (PWA)
    │   ├── index.html                 # estática, com noindex: não precisa de PHP nem de banco
    │   ├── manifest.json
    │   └── sw.js
    │
    ├── logs/                          # registros de erro do site
    │   └── .htaccess                  # negar acesso externo: log nunca pode ser público
    │
    ├── negociacao-garantia/           # página sobre condições de negociação e garantia
    │   └── index.php
    │
    ├── politica-de-privacidade/       # exigida pela LGPD; precisa bater com o que o expurgo realmente faz
    │   └── index.php
    │
    ├── sobre-nos/
    │   └── index.php
    │
    └── termos-uso/
        └── index.php
```

## Como usar este template

1. **Troque os nomes genéricos.** `LOJA_DE_VEICULOS` vira o nome da pasta do projeto, e `loja-*` nos nomes de imagem vira o nome da marca. Dados de contato e URL ficam só em `includes/config.php`.
2. **Mantenha duas camadas de arquivos.** O que o visitante abre vai dentro de `public_html/`. O que guarda segredo (`*-secrets.php`) fica um nível acima, onde nenhuma URL chega.
3. **Toda pasta de código interno** (`includes/`, `admin/includes/`) leva um `.htaccess` negando acesso direto, e todo arquivo dela checa uma constante de carga (ex.: `APP_LOADED`) antes de rodar.
4. **Toda pasta de upload** (`assets/images/veiculos/`, `assets/images/avaliacoes/`) leva um `.htaccess` que impede execução de PHP, e o `upload-handler.php` valida o tipo real do arquivo, limita o tamanho e troca o nome.
5. **Um arquivo `.js` e um `.css` por página**, com o mesmo nome da página. Peças repetidas vão para `components/`.
6. **Para outro tipo de veículo** (carros, caminhões, barcos), basta usar o nome do tipo nos textos e nos campos do banco. A estrutura de pastas não muda.
7. **Antes de publicar**, passe pelo checklist de segurança do [[developer]]. Itens que este template já favorece: credenciais fora da pasta pública, upload sem execução, logs fechados, rotina de expurgo de dados pessoais.
8. **Se a loja vender mais de uma linha de produto** (acessórios, peças), trate como projeto à parte ou como módulo novo em `admin/` e `estoque/`. Este template não traz isso.

## Conexões

- [[developer]] — centralizador do assunto: o template segue a stack de referência e o checklist de publicação dele
- [[operador-do-mind]] — prompt do Operador, que consulta este template ao receber tarefas de criar ou revisar o site de uma loja de veículos
- [[regra-upload-seguro-em-php]] — as pastas de upload sem execução e o upload-handler do template aplicam essa regra
- [[regra-senha-com-hash-e-sal]] — o login do painel e o utilitário hash/ do template guardam senha só como hash
- [[regra-sessoes-seguras-em-php]] — o login e o guard do painel dependem de sessão configurada com segurança
- [[acesso-ao-banco-com-pdo]] — o db.php do template concentra a conexão PDO usada pelas páginas e APIs
- [[head-site-veiculos-TEMPLATE-1]] — o `<head>` do site fica em includes/head.php; este template traz o modelo completo
