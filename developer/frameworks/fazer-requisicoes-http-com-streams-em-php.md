---
titulo: "Fazer requisições HTTP com streams em PHP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 26, seção 26.2.2 (PDF p. 1008-1014)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Fazer requisições HTTP com streams em PHP

## Para que serve

Ler uma página ou chamar um serviço externo (por exemplo, uma API) a partir do servidor, sem biblioteca.

## Quando usar e quando não usar

Use para requisições simples. Para APIs com autenticação e erros detalhados, uma biblioteca de HTTP costuma ser melhor (inferência minha).

## O que perguntar ao usuário antes

- Qual URL, método e dados? O servidor permite `allow_url_fopen`? Há OpenSSL para HTTPS?

## Passos

1. **GET:** `file_get_contents("https://...")` (devolve `false` em falha) ou `fopen("https://...", "r")` e `fread` em partes até `feof`. A função segue redirecionamentos.
2. **POST:** monte um contexto com `stream_context_create(["http" => ["method" => "POST", "header" => "Content-type: application/x-www-form-urlencoded", "content" => "campo=valor&..."]])` e chame `file_get_contents($url, false, $contexto)`. Os nomes dos campos e o destino vêm do `form` da página que se imita.
3. **Manual (sockets):** `fsockopen("tcp://host", 80, $erro, $mensagem, 30)` e escreva a requisição à mão com `fwrite` (linha `POST /caminho HTTP/1.1`, `Host`, `Content-length`, `Content-type`, linha em branco e os dados), lendo a resposta com `fgets`. Na resposta de exemplo do livro, vem um `302` com o cabeçalho `Location`: o redirecionamento não é seguido.
4. **Metadados:** `stream_get_meta_data()` mostra os cabeçalhos e o estado do fluxo.

## Saída esperada

O conteúdo remoto lido, ou `false` quando falha, tratado pelo código.

## Erros comuns

- Não conferir o retorno `false`.
- Depender do HTML de um site de terceiros (o livro avisa que o exemplo pode quebrar quando o site mudar).
- Abrir URLs informadas pelo usuário (ver regra de streams não confiáveis).

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
$ctx = stream_context_create(['http' => [
    'method' => 'POST',
    'header' => 'Content-type: application/x-www-form-urlencoded',
    'content' => http_build_query(['busca' => 'php']),
]]);
$resposta = file_get_contents('https://exemplo.com/busca', false, $ctx);
```

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[fibers-em-php]] — «Fibers em PHP» cita esta nota ao explicar suas relações
- [[streams-em-php]] — o framework aplica os fluxos http e https
- [[regra-nao-abra-urls-ou-streams-informados-pelo-usuario]] — a regra limita quais URLs abrir
- [[criar-e-consumir-uma-api-rest-simples-em-php]] — o cliente REST usa file_get_contents
- [[usar-a-api-fetch]] — é o equivalente no servidor do fetch no navegador
