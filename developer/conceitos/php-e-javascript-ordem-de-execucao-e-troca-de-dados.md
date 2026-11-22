---
titulo: "PHP e JavaScript: ordem de execução e troca de dados"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 28, seções 28.1 e 28.2 (PDF p. 1064-1079)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# PHP e JavaScript: ordem de execução e troca de dados

## Definição

O PHP roda no servidor e gera HTML; só depois o navegador pode executar o JavaScript, de modo completamente independente. Quando o JavaScript roda, o PHP já terminou: ele não tem acesso às variáveis do PHP, e o interpretador não sabe que o PHP existiu. Assim, toda informação que o JavaScript deve ter precisa estar no HTML ou no script gerado.

- **PHP para JavaScript:** o PHP gera código JavaScript que contém o valor (`var versao = "8.3.12";`). Cuidado com caracteres especiais que quebram o código gerado: aspas e as sequências de escape (`\n`, `\r`, `\t`); o exemplo do livro usa `addslashes()` e uma troca das quebras de linha por `\n`.
- **JavaScript para PHP:** o PHP não vê o JavaScript, mas o **próximo** script PHP vê o que for enviado: por exemplo, `location.href = "script.php?v=" + encodeURIComponent(valor)`. O `encodeURIComponent` é essencial e muitas vezes esquecido. Para não recarregar a página, o livro cita iframes ocultos e imagens (técnicas antigas); a forma moderna é usar `fetch` (ver usar a API fetch).
- **JSON:** é o formato de troca: `JSON.parse` e `JSON.stringify` no JavaScript; `json_decode` e `json_encode` no PHP.

## Por que importa

É a causa de confusões comuns, como tentar ler `$variavel` do PHP dentro do script do navegador.

## Como se relaciona

Ver Ajax e WebSockets com PHP, usar a API fetch e a regra de escapar a saída contra XSS.

## Notas do Claude

Para passar dados do PHP ao JavaScript, `json_encode` (com as flags de escape de HTML do PHP) é mais seguro e simples do que `addslashes` e trocas manuais, e o conteúdo do usuário em um `<script>` é um ponto clássico de XSS (inferência minha, a conferir; ver regra de escapar a saída). O livro aborda o `addslashes` só pelo problema de aspas.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[ajax-e-websockets-com-php]] — esta nota cita a ideia de «Ajax e WebSockets com PHP» na seção sobre como se relaciona
- [[regra-escape-a-saida-contra-xss]] — dados do PHP em script exigem escape
- [[promises-em-javascript]] — o retorno do fetch usa promessas
