---
titulo: "XML, imagens e PDF com PHP (SimpleXML, DOM, GD e TCPDF)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, caps. 29 a 31 (PDF p. 1089-1187)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# XML, imagens e PDF com PHP

## Definição

**XML (cap. 29):**

- Um documento XML é **bem formado** quando segue a sintaxe, e **válido** quando também segue um DTD ou um esquema. O HTML5, na escrita comum, não é XML válido. Os nomes das tags devem descrever os dados.
- O PHP oferece várias interfaces:
  - **SimpleXML** (`simplexml_load_file`, `simplexml_load_string`): lê e altera de forma simples, como objetos;
  - **DOM** (`DOMDocument`): o modelo completo, com o mesmo modelo de nós do navegador;
  - **XPath**: busca nós por caminho;
  - **XMLReader** e **XMLWriter**: leem e escrevem em fluxo, sem carregar tudo na memória;
  - **SAX** (`xml_parser_create`): a interface antiga, baseada em eventos.
- A biblioteca `libxml` também valida (DTD, XML Schema, RELAX NG), e o XSLT transforma um XML em outro formato.

**Imagens com GD (cap. 30):**

- A biblioteca GD 2 gera e altera imagens: miniaturas, gráficos, captchas.
- No Linux, compilar GD com suporte a JPEG e TrueType dá trabalho. Em muitas hospedagens e pacotes, ela já vem ativada (confira em `phpinfo()`).
- Funções: `imagecreatetruecolor()`, `imagecreatefromjpeg()`, `imagecopyresized()` (redimensionar), `imagettftext()` (texto com fonte TrueType), `imagepng()` e `imagejpeg()` (gravar ou enviar).
- O livro lembra de liberar as imagens da memória ao terminar.

**PDF (cap. 31):**

- O `pdfLib` passou a ter licença comercial e deixou de ser a opção rápida.
- As alternativas livres são **FPDF** e **TCPDF**, esta mais usada, e o livro cita também o Haru. As duas instalam pelo Composer.
- No exemplo do livro, o `HTML2PDF`, construído sobre o TCPDF, converte HTML em PDF.

## Por que importa

São tarefas comuns em sistemas de clientes: ler um feed ou uma nota fiscal em XML, gerar miniaturas de fotos enviadas e emitir orçamentos ou recibos em PDF.

## Como se relaciona

O upload das imagens está na regra de upload seguro em PHP e em imagens e arquivos no banco ou no disco. A instalação das bibliotecas está em gerenciar dependências com Composer. O DOM do XML é o mesmo modelo de navegação e conteúdo no DOM do navegador.

## Notas do Claude

- Confiança média: li a introdução e as seções de apresentação de cada interface ou biblioteca; os exemplos de código foram folheados.
- Para miniaturas, `imagecopyresampled()` dá resultado melhor que `imagecopyresized()`, que o livro usa (conhecimento meu).
- Ao ler XML de fora, cuidado com entidades externas (XXE): carregue com as opções padrão do PHP 8, sem `LIBXML_NOENT` (conhecimento meu, a conferir no manual).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-upload-seguro-em-php]] — as imagens enviadas por upload passam pela GD e exigem validação
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — miniaturas geradas com GD são arquivos guardados no disco
- [[gerenciar-dependencias-com-composer]] — FPDF e TCPDF se instalam pelo Composer
- [[servicos-web-rest-soap-e-wsdl]] — o XML é o formato do SOAP e de muitos serviços web
- [[navegacao-e-conteudo-no-dom]] — o DOM do XML usa o mesmo modelo de nós do navegador
