---
titulo: "Opções de autenticação em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 33, p. 1232-1244"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Opções de autenticação em PHP

## Definição

Autenticação é reconhecer o usuário; autorização é conceder direitos a ele. Na web costumam ocorrer no mesmo passo, mas autorização pode envolver papéis. O livro apresenta quatro opções:

| Opção | Como funciona | Observação |
|---|---|---|
| Autenticação do servidor web | No Apache, um `.htaccess` na pasta protegida aponta para um arquivo de senhas (`htpasswd`) e exige `valid-user`. O servidor responde 401 e o navegador pede usuário e senha. | O método Basic envia as credenciais sem criptografia na rede; Digest usa criptografia, mas não funciona em navegadores antigos. É preciso `AllowOverride AuthConfig`, e o arquivo de senhas não pode ser acessível de fora. O IIS usa contas do Windows. |
| HTTP manual | O script envia `WWW-Authenticate` e status 401 e lê `$_SERVER["PHP_AUTH_USER"]` e `PHP_AUTH_PW`. | Independe do servidor e é rápido; o exemplo do livro compara a senha com um texto fixo, o que serve só para teste. |
| Sessões | O login grava uma variável na sessão. | É a opção que costuma ser usada quando também há autorização; independe do ambiente. |
| Padrões (OIDC, OAuth) | Vários aplicativos fazem login em um provedor de identidade central. | Útil quando se quer um login único. |

## Por que importa

Escolher o método certo evita reinventar controle de acesso: para áreas administrativas simples em hospedagem Apache, o `.htaccess` basta; para usuários de verdade, sessões com senha em hash.

## Como se relaciona

O login por sessão depende das práticas de sessão seguras e do hash de senhas (regras sessões seguras em PHP e senha com hash e sal).

## Notas do Claude

Confiança média: li a introdução e as três primeiras opções; a parte sobre sessões e OAuth do capítulo (a partir da p. 1245) não foi lida. O Basic só deve ser usado com HTTPS (inferência minha, coerente com o checklist).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-sessoes-seguras-em-php]] — esta nota cita a ideia de «Use sessões PHP só com cookie e proteja o identificador» na seção sobre como se relaciona
- [[regra-senha-com-hash-e-sal]] — o login por sessão depende de senhas guardadas com hash
- [[servicos-web-rest-soap-e-wsdl]] — o REST usa Basic Auth, SSL e OAuth para segurança
- [[regra-guarde-senhas-com-password-hash]] — as opções de autenticação dependem de guardar a senha com `password_hash`
