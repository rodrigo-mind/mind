---
titulo: "Não guarde dados sensíveis em cookies"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 14, seção 14.3.1 (PDF p. 655-656)"
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.12 (PDF p. 554-557)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não guarde dados sensíveis em cookies

## Regra

Não ponha senhas, números financeiros ou outras informações sensíveis em cookies, nem cifradas. Guarde-as no servidor, ligadas ao usuário por um identificador de sessão.

## Por quê

- O livro de PHP diz que esconder dados sensíveis em cookies, cifrados ou não, não é aconselhável; o certo é guardar esses dados só no servidor (ver sessões).
- O livro de JavaScript acrescenta que cookies não usam criptografia e não são seguros em si, e que nenhum armazenamento do cliente deve guardar senhas ou números de contas financeiras.
- Quando for preciso um cookie com algum dado protegido, use os parâmetros `secure` (só HTTPS) e `httponly` (invisível ao JavaScript), que reduzem, mas não eliminam, o risco.

## Quando não vale

Não há exceção no texto; o identificador de sessão é o único "segredo" que costuma ir no cookie, e ele precisa das proteções de cookie de sessão.

## Como verificar

Procure `setcookie` com campos como senha, e-mail ou documento, e confirme `secure`, `httponly` e `samesite` nos cookies de sessão.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[criar-e-ler-cookies-em-php]] — a regra limita o que se grava com setcookie
- [[armazenamento-no-navegador]] — o livro de JavaScript dá o mesmo aviso sobre armazenamento do cliente
- [[regra-nunca-confie-na-entrada-do-usuario]] — o cookie vem do cliente e pode ser alterado
- [[cookies-no-javascript-document-cookie]] — cookies não são seguros nem criptografados
