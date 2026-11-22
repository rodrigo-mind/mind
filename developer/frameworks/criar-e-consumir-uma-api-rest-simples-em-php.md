---
titulo: "Criar e consumir uma API REST simples em PHP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 27, seção 27.2 (PDF p. 1041-1047)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Criar e consumir uma API REST simples em PHP

## Para que serve

Expor uma função do servidor por URL e consumi-la a partir de outro script, com JSON.

## Quando usar e quando não usar

Use o padrão como ponto de partida didático. Em produção, acrescente autenticação, validação de entrada e a lista de funções permitidas (ver regra de funções permitidas).

## O que perguntar ao usuário antes

- Que operações serão expostas? Quem poderá chamá-las?

## Passos

1. **Servidor:** leia os parâmetros da URL (os nomes são livres: no exemplo, `method` e `parameter`), converta o parâmetro de JSON em vetor com `json_decode`, confira se a função pode ser chamada, chame-a e devolva o resultado com `json_encode`.
2. **Cliente:** monte a URL com `urlencode(...)` e `json_encode(...)`, chame `file_get_contents` (exige `allow_url_fopen`), confira se o retorno não é `false`, e converta a resposta com `json_decode`.
3. **Validar o JSON (PHP 8.3):** `json_validate($texto, $profundidade, $flags)` devolve verdadeiro ou falso (a única flag é `JSON_INVALID_UTF8_IGNORE`); o motivo vem de `json_last_error()` (código, como 4 para erro de sintaxe) e `json_last_error_msg()`. Antes, era preciso confiar no JSON ou escrever uma função própria.
4. **Formato livre:** no REST tudo é definido por você (nomes dos parâmetros, formato dos dados), o que dá flexibilidade, mas exige disciplina.

## Saída esperada

Uma resposta JSON legível pelo cliente.

## Erros comuns

- Chamar `$metodo(...)` com qualquer nome vindo da URL (ver regra de funções permitidas).
- Esquecer `urlencode` ao montar a URL.
- Não tratar a falha de rede nem o JSON inválido.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
$permitidas = ['quadrado'];
$metodo = $_GET['method'] ?? '';
if (!in_array($metodo, $permitidas, true)) { http_response_code(404); exit; }
header('Content-Type: application/json');
echo json_encode(['resultado' => quadrado((int) ($_GET['n'] ?? 0))]);
```

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[servicos-web-rest-soap-e-wsdl]] — «Serviços web: REST, SOAP e WSDL» cita esta nota ao explicar suas relações
- [[fazer-requisicoes-http-com-streams-em-php]] — o cliente REST usa file_get_contents
- [[regra-registre-so-as-funcoes-permitidas-em-uma-api]] — a regra corrige o ponto fraco do exemplo
- [[usar-a-api-fetch]] — o navegador consome a API com fetch
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — «JSON em JavaScript: stringify, parse, toJSON, replacer e reviver» cita esta nota ao explicar suas relações
