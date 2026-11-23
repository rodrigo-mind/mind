---
titulo: "Serviços web: REST, SOAP e WSDL"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 27, seções 27.1 e 27.2 (PDF p. 1030-1041)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Serviços web: REST, SOAP e WSDL

## Definição

Serviços web permitem a comunicação entre máquinas: um servidor (o **consumidor**) lê e usa o serviço de outro (o **provedor**), de forma automática. Diferem das antigas chamadas remotas (RPC) por poderem ser simples mensagens sem resposta imediata e por serem interoperáveis, graças a padrões abertos. Na arquitetura orientada a serviços (SOA), o acoplamento é frouxo; o diretório de serviços (em que o provedor publica o serviço) existe, mas não é indispensável, e não teve sucesso.

- **REST** (Representational State Transfer, da tese de R. T. Fielding): tudo na internet é mapeado por URIs, e os verbos HTTP (GET, POST, PUT, DELETE) bastam. Qualquer GET já é um serviço REST. Hoje é o jeito mais comum de trocar dados entre aplicações, e o de melhor desempenho; o formato é quase sempre **JSON** (o XML também). No PHP não exige extensão. Problemas: não há formato definido para os dados na URL, e PUT e DELETE são pouco implementados. Segurança: SSL com certificados, HTTP Basic Auth e OAuth 2.
- **SOAP** (nome sem significado atual): envelope com o corpo da mensagem e um cabeçalho opcional (segurança); em geral por HTTP, mas pode ir por SMTP ou FTP.
- **WSDL:** descreve o serviço (métodos e mais); o servidor o gera, e o consumidor o usa para montar as mensagens SOAP automaticamente.
- **Problemas dos serviços web:** segurança (muitas soluções caseiras; um provedor grande usa só um identificador de desenvolvedor), desempenho (a sobrecarga do SOAP; `gzip` do HTTP ajuda, mas teste), e transações e processos (o exemplo da reserva de trem duplicada).
- **Implementações em PHP:** `PHP-SOAP` (padrão, extensão `soap`) e `nuSOAP` (arquivos PHP, gera WSDL dinamicamente).

## Por que importa

Dá o vocabulário para integrar o site com serviços externos e para expor dados a outros sistemas.

## Como se relaciona

A prática está em criar e consumir uma API REST simples em PHP e em SOAP em PHP.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[criar-e-consumir-uma-api-rest-simples-em-php]] — esta nota cita a ideia de «Criar e consumir uma API REST simples em PHP» na seção sobre como se relaciona
- [[soap-em-php-com-php-soap-e-nusoap]] — o framework pratica o SOAP
- [[acoplamento-e-desacoplamento]] — a SOA se baseia em acoplamento frouxo
- [[opcoes-de-autenticacao-em-php]] — o REST usa Basic Auth, SSL e OAuth para segurança
- [[xml-imagens-e-pdf-com-php]] — serviços web SOAP usam XML, tratado aqui
