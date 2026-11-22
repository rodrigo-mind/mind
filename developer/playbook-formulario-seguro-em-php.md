---
titulo: "Playbook de formulário seguro em PHP"
tipo: playbook
origem: destilar
assunto: developer
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Playbook de formulário seguro em PHP

## Objetivo

Construir, do HTML ao banco de dados, um formulário (contato, cadastro, comentário, pedido) que receba dados do visitante sem abrir brechas de segurança e sem perder dados, na stack de referência do projeto (PHP puro, MySQL via PDO, HTML e JavaScript sem frameworks, hospedagem compartilhada com FTP).

## Quando usar

Em qualquer formulário que envie dados ao servidor, e especialmente se grava no banco, envia e-mail, aceita upload ou exige login.

## O que o usuário precisa fornecer

- Os campos do formulário e o destino dos dados (banco, e-mail ou os dois).
- Se há upload de arquivos, login ou envio por JavaScript (`fetch`).
- Se o site usa HTTPS e como são feitas as sessões.

## Etapas

| Etapa | Framework ou nota | Livro | O que produz |
|---|---|---|---|
| 1. Marcar o formulário | Estrutura de formulários em HTML5; Tipos do elemento input | The Definitive Guide to HTML5 | `form` com `method="post"`, `label`, tipos de campo adequados, `enctype="multipart/form-data"` se houver upload |
| 2. Validar no navegador | Validação nativa de formulários em HTML5 | HTML5 | `required`, `pattern`, `min`, `max` e `type` para dar resposta rápida ao usuário |
| 3. Lembrar que isso não basta | Regra: a validação no navegador complementa e nunca substitui a do servidor | HTML5 e PHP and MySQL | decisão registrada de que o servidor valida tudo de novo |
| 4. Sessão e token CSRF | Regra de sessões seguras em PHP; Regra do token CSRF em formulários | PHP and MySQL | sessão configurada e um token oculto por formulário, conferido no envio |
| 5. Receber e validar no servidor | Validar formulários em PHP; Filtrar entrada com filter_input; Nunca confie na entrada do usuário; Use sempre a comparação idêntica (===); `strict_types` | PHP and MySQL e The Art of Modern PHP 8 | dados filtrados, tipados e conferidos, com mensagens de erro por campo |
| 6. Tratar o upload (se houver) | Regra de upload seguro em PHP; Imagens e arquivos no banco ou no disco | PHP and MySQL e SQL Antipatterns | arquivo validado por tipo e tamanho, renomeado e guardado fora da pasta pública |
| 7. Gravar no banco | Acesso ao banco com PDO; Nunca monte SQL com entrada do usuário; Nomeie as colunas explicitamente; Declare as chaves estrangeiras; Senha com hash e sal (se houver senha) | PHP and MySQL e SQL Antipatterns | consulta preparada, colunas nomeadas e senha com `password_hash` |
| 8. Enviar e-mail (se houver) | Enviar e-mail com mail() do PHP | PHP and MySQL | mensagem enviada, com os cabeçalhos validados |
| 9. Exibir de volta com escape | Regra de escapar a saída contra XSS; no navegador, não insira entrada do usuário com innerHTML | PHP and MySQL e JavaScript | todo valor exibido passa por `htmlspecialchars` (ou `textContent` no JavaScript) |
| 10. Envio sem recarregar (opcional) | Usar a API fetch | JavaScript | envio por `fetch` com tratamento de erro HTTP e do token CSRF |
| 11. Erros e registros | Não exiba erros na tela em produção; Verifique erros do banco e depure o SQL final | PHP and MySQL e SQL Antipatterns | erros no log, mensagem amigável ao usuário |
| 12. Testar | Testes unitários em PHP com PHPUnit; roteiro manual | PHP and MySQL | testes dos validadores e roteiro: caminho feliz, campo vazio, dado inválido, token CSRF errado e arquivo malicioso |

## Entregável

Uma pasta com o formulário e os arquivos de apoio, mais este checklist preenchido:

- [ ] Campos, rótulos e tipos definidos; `method="post"` e `enctype` corretos.
- [ ] Validação do navegador **e** do servidor, com as mesmas regras.
- [ ] Token CSRF gerado, enviado e conferido; sessão com cookie seguro.
- [ ] Consulta preparada; colunas nomeadas; senhas com hash.
- [ ] Upload (se houver): tipo, tamanho, nome novo, pasta protegida.
- [ ] Saída escapada em todo ponto.
- [ ] Erros no log, e não na tela.
- [ ] Roteiro de teste executado.

## Lacunas

- Proteção contra spam e abuso (captcha, limite de tentativas, campo-isca): não está nas notas.
- Conformidade com a LGPD (consentimento, retenção e exclusão de dados): não está nas notas; o centralizador de desenvolvimento a cita só como tema.
- Mensagens de erro e acessibilidade do formulário (foco, leitores de tela) além dos rótulos: pouco coberto.
- A injeção de cabeçalhos de e-mail é inferência registrada na nota de envio de e-mail, e não afirmação do livro.

## Notas do Claude

A ordem das etapas é uma proposta minha, que segue o caminho do dado (da tela ao banco e de volta). Alternativas razoáveis: começar pelo servidor (etapas 4 a 9) e só depois fazer o HTML, ou deixar o envio por `fetch` como padrão desde o início. O livro de HTML5 é de 2011 e o de PHP and MySQL, de 2024: confira a validação nativa dos navegadores atuais. Em hospedagem compartilhada com FTP, a pasta de uploads e o arquivo de credenciais devem ficar fora da pasta pública, quando o provedor permitir (ver o checklist do centralizador de desenvolvimento).

## Conexões

- [[developer]] — nota destilada ligada a este assunto: playbook de livro-base
- [[estrutura-de-formularios-html5]] — o playbook usa esta nota como etapa do processo
- [[tipos-do-elemento-input]] — o playbook usa esta nota como etapa do processo
- [[validacao-nativa-de-formularios-html5]] — o playbook usa esta nota como etapa do processo
- [[regra-validacao-no-navegador-nao-substitui-a-do-servidor]] — o playbook usa esta nota como etapa do processo
- [[regra-sessoes-seguras-em-php]] — o playbook usa esta nota como etapa do processo
- [[regra-token-csrf-em-formularios]] — o playbook usa esta nota como etapa do processo
- [[validar-formularios-em-php]] — o playbook usa esta nota como etapa do processo
- [[filtrar-entrada-com-filter-input]] — o playbook usa esta nota como etapa do processo
- [[regra-nunca-confie-na-entrada-do-usuario]] — o playbook usa esta nota como etapa do processo
- [[regra-use-sempre-a-comparacao-identica-em-php]] — o playbook usa esta nota como etapa do processo
- [[regra-strict-types-em-todo-arquivo-php]] — o playbook usa esta nota como etapa do processo
- [[regra-upload-seguro-em-php]] — o playbook usa esta nota como etapa do processo
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — o playbook usa esta nota como etapa do processo
- [[acesso-ao-banco-com-pdo]] — o playbook usa esta nota como etapa do processo
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — o playbook usa esta nota como etapa do processo
- [[regra-nomeie-as-colunas-explicitamente]] — o playbook usa esta nota como etapa do processo
- [[regra-declare-chaves-estrangeiras]] — o playbook usa esta nota como etapa do processo
- [[regra-senha-com-hash-e-sal]] — o playbook usa esta nota como etapa do processo
- [[enviar-email-com-mail-do-php]] — o playbook usa esta nota como etapa do processo
- [[regra-escape-a-saida-contra-xss]] — o playbook usa esta nota como etapa do processo
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — o playbook usa esta nota como etapa do processo
- [[usar-a-api-fetch]] — o playbook usa esta nota como etapa do processo
- [[regra-nao-exiba-erros-na-tela-em-producao]] — o playbook usa esta nota como etapa do processo
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — o playbook usa esta nota como etapa do processo
- [[testes-unitarios-em-php-com-phpunit]] — o playbook usa esta nota como etapa do processo
- [[owasp-top-10-2021]] — o playbook usa esta nota como etapa do processo
- [[playbook-pagina-responsiva-em-css]] — o formulário vive em uma página responsiva
