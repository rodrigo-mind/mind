---
titulo: "SOAP em PHP com PHP-SOAP e nuSOAP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 27, seções 27.3 e 27.4 (PDF p. 1048-1063)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# SOAP em PHP com PHP-SOAP e nuSOAP

## Para que serve

Expor ou consumir serviços SOAP (o padrão de muitas integrações corporativas e de bancos), com ou sem WSDL.

## Quando usar e quando não usar

Use só se o parceiro exige SOAP. Para APIs novas, o REST com JSON é mais simples.

## O que perguntar ao usuário antes

- O parceiro fornece um WSDL? A extensão `soap` está ativa (confira com `phpinfo()`)?

## Passos

**PHP-SOAP (biblioteca padrão):**
1. Servidor: `new SoapServer(null, ["uri" => "..."])` (ou o endereço do WSDL no lugar de `null`), `addFunction("nome")` ou `setClass("Classe")`, e `handle()`. Erros se sinalizam com `throw new SoapFault("Client", "mensagem")`.
2. Cliente: `new SoapClient(null, ["location" => "...", "uri" => "..."])` e `__soapCall("nome", [params])` (com WSDL, `$cliente->nome($x)` direto); trate com `try ... catch (SoapFault $e)`, lendo `faultcode` e `faultstring`.
3. O PHP-SOAP **não gera** WSDL; escrevê-lo à mão dá trabalho (para o livro, uma lacuna).

**nuSOAP** (arquivos copiados ou instalados com Composer; a versão do livro é uma reescrita para PHP moderno):
1. Servidor: `new nusoap_server()`, `register("nome")`, e `service(file_get_contents("php://input"))`; erros com `soap_fault`.
2. Para WSDL, `configureWSDL("Nome", "namespace")` e tipos em `register` (`xsd:int`); o WSDL aparece com `?wsdl` na URL.
3. Cliente: `new nusoap_client($url, true)` e `call("nome", [params])`, conferindo `getError()` e `fault`.

## Saída esperada

Uma chamada SOAP funcionando nos dois lados, com tratamento de erro.

## Erros comuns

- Registrar várias funções num só serviço, o que prejudica a interoperabilidade com clientes que entendem só uma (aviso do livro sobre nuSOAP).
- Esquecer de ativar a extensão `soap`.

## Notas do Claude

Para o projeto (back-end simples em PHP puro), este framework é de consulta eventual.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[servicos-web-rest-soap-e-wsdl]] — o framework pratica o SOAP
