---
titulo: "Cookies HTTP: o que são, limites e mitos"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 14, seção 14.2 (PDF p. 646-649)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Cookies HTTP: o que são, limites e mitos

## Definição

O HTTP é um protocolo sem memória (stateless): nada fica guardado entre duas requisições. Cookies são um dos remédios: informação em texto que vai e volta entre servidor e navegador. O servidor envia um cabeçalho `Set-Cookie: Nome=valor`; o navegador pode guardar, rejeitar ou perguntar ao usuário; na próxima requisição ao mesmo servidor, devolve `Cookie: Nome=valor; Outro=valor`, e o servidor reconhece o usuário. A ideia veio da Netscape, em meados dos anos 1990. Cada navegador implementa o armazenamento do seu jeito (em geral, um banco em arquivo), e o cookie também pode ficar só na memória, desaparecendo ao reiniciar.

## Restrições

- Um cookie só é lido pelo servidor que o definiu, e pode ser associado a um domínio de segundo nível (`.php.net` com ponto inicial, lido também pelos subdomínios) e a um caminho (`/admin`).
- O tamanho: 4 KB por cookie (nome e valor juntos), no mínimo exigido ao navegador; as especificações antigas falam em 300 cookies no total e 20 por domínio, e os navegadores atuais são mais frouxos.

## O mito do "surfista transparente"

O mau nome vem em parte de um artigo de 1997 que afirmava que qualquer servidor podia ler todos os cookies do computador do cliente; a correção saiu dois meses depois, e a afirmação era falsa. Para os autores, é preciso separar os riscos reais do alarmismo.

## Como se relaciona

O uso em PHP está em criar e ler cookies em PHP. Para sessões, que dependem de cookies, ver sessões seguras em PHP; o armazenamento do lado do cliente em JavaScript está em armazenamento no navegador.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-sessoes-seguras-em-php]] — esta nota cita a ideia de «Use sessões PHP só com cookie e proteja o identificador» na seção sobre como se relaciona
- [[armazenamento-no-navegador]] — esta nota cita a ideia de «Armazenamento no navegador» na seção sobre como se relaciona
- [[criar-e-ler-cookies-em-php]] — esta nota cita a ideia de «Criar e ler cookies em PHP» na seção sobre como se relaciona
- [[cookies-no-javascript-document-cookie]] — o conceito de cookie e seus limites
