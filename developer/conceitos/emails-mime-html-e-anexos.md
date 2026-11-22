---
titulo: "E-mails MIME: HTML, texto alternativo e anexos"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 16, seção 16.2.2 (PDF p. 725-734)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# E-mails MIME: HTML, texto alternativo e anexos

## Definição

MIME (Multipurpose Internet Mail Extensions) descreve a estrutura de e-mails com formatos especiais e anexos. Montar um e-mail MIME exige dois cuidados: cabeçalhos especiais e uma construção própria do corpo.

- **Cabeçalhos:** `MIME-Version: 1.0` e `Content-Type` com a variante `multipart/mixed` (tipos diferentes na mesma mensagem, como texto e anexo; todas as partes aparecem) ou `multipart/alternative` (versões alternativas do mesmo conteúdo, como texto e HTML; o programa de e-mail escolhe qual mostrar).
- **Partes e separador:** as partes são separadas por uma cadeia (boundary) que não pode aparecer por acaso no texto (use um valor longo e aleatório); cada linha-separadora começa com dois hifens, e a última também termina com dois.
- **Anexos:** o conteúdo vai codificado em Base64 (`base64_encode`), com `Content-Transfer-Encoding: base64` e `Content-Disposition: attachment`.
- **Imagem dentro do HTML:** ou URL absoluta externa, ou incorporada à mensagem, referenciada por `cid:ID` (o `Content-ID` da parte da imagem, com `Content-Disposition: inline`); para ela não aparecer também como anexo, use `multipart/alternative`.

## Por que importa

É o que torna possível e-mail colorido e com arquivos. O livro adverte: e-mails HTML ocupam mais espaço e foram um canal de vírus, então muitos usuários os leem como texto ou nem os abrem. Se o HTML for indispensável, use `multipart/alternative` e inclua sempre a versão em texto. O trabalho é demorado, e o livro recomenda bibliotecas externas.

## Como se relaciona

Parte de enviar e-mail com mail() do PHP.

## Notas do Claude

Para o projeto, uma biblioteca de envio (como PHPMailer, via Composer) trata MIME e SMTP autenticado melhor que montar cabeçalhos à mão; é inferência minha, o livro só diz que bibliotecas externas poupam trabalho (ver gerenciar dependências com Composer).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[enviar-email-com-mail-do-php]] — o e-mail com HTML e anexos estende o envio simples
- [[gerenciar-dependencias-com-composer]] — bibliotecas de e-mail se instalam com Composer
