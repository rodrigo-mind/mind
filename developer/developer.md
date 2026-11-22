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
| Desenvolvimento com IA | Claude Code, como pedir código, revisar o que a IA gera, agentes especializados (diretriz creators-of-minds) |

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
- Para criar um agente especializado em desenvolvimento, seguir a diretriz creators-of-minds e começar pelo conteúdo ligado a este arquivo.

## Conexões

- [[The-Definitive-Guide-to-HTML5-(Adam-Freeman) (pdf)]] — livro de referência para a área de front-end (HTML, CSS, JavaScript e DOM) da stack deste assunto
- [[creator-of-minds]] — é a diretriz que este arquivo manda seguir para criar agentes especializados em desenvolvimento
- [[CSS-in-Depth-Second-Edition-(Keith-J-Grant) (pdf)]] — livro de referência atual (2024) de CSS para a área de front-end, com layout, responsividade e desempenho
- [[JavaScript-The-Definitive-Guide-7th-Edition-(David-Flanagan) (pdf)]] — livro de referência de JavaScript (7ª edição, 2020) para a camada de front-end da stack, sem frameworks
- [[The-Art-of-Modern-PHP-8-(Joseph-Edmonds-Lorna-Jane-Mitchell) (epub)]] — livro de referência de PHP 8 moderno para a camada de back-end da stack
- [[PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra) (pdf)]] — livro de referência de PHP 8 orientado a objetos e padrões de projeto (7ª edição, 2024) para a camada de back-end da stack
- [[php-diretrizes-e-referencias]] — lista de fontes de referência de PHP (manual, PSR, OWASP, PHPStan, PHPUnit) que cobre segurança e PDO, onde os livros da biblioteca são fracos; escopo restrito a PHP vanilla, como a stack de referência daqui
