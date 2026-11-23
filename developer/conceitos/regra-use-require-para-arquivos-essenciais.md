---
titulo: "Use require_once para arquivos essenciais"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 4, seção 4.1.3 (PDF p. 145-148)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use require_once para arquivos essenciais

## Regra

Inclua configuração, conexão com o banco, funções e classes com `require_once`. Deixe `include` só para partes opcionais da página.

## Por quê

- Se o arquivo não for encontrado, `include()` só gera um aviso (`E_WARNING`) e o script segue, sem a configuração ou a conexão. `require()` gera erro e para.
- As versões `_once` verificam se o arquivo já foi incluído. Isso evita sobrescrever variáveis e o erro de declarar a mesma função duas vezes, porque uma função só pode ser declarada uma vez.

## Quando não vale

- Em partes visuais que podem faltar sem quebrar a página, como um banner.
- Em templates que devem ser incluídos várias vezes de propósito, como um item de lista dentro de um laço: aí o `_once` atrapalharia.

## Como verificar

Procure `include` e `include_once` (`grep -rnE '\binclude(_once)?\b' --include=*.php .`). Arquivos de configuração, conexão, funções e classes devem entrar por `require_once`.

## Notas do Claude

- O livro lembra: ao incluir dentro de um `if` ou laço, use chaves. Abrir arquivos por URL absoluta exige `allow_url_fopen`, e o projeto não deve fazer isso (ver a regra não abra URLs ou streams informados pelo usuário).
- Use caminhos absolutos a partir do arquivo atual (`require_once __DIR__ . '/config.php';`), para não depender do `include_path` nem da pasta de onde o script foi chamado (inferência minha).

## Conexões

- [[regra-omita-a-tag-de-fechamento-em-arquivos-so-php]] — arquivos incluídos devem omitir a tag de fechamento
- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[carregamento-de-arquivos-e-include-path]] — detalha include, require e include_path
- [[carregamento-automatico-em-php]] — o carregamento automático dispensa require por classe
- [[regra-nao-abra-urls-ou-streams-informados-pelo-usuario]] — incluir por URL exige allow_url_fopen e deve ser evitado
- [[gerenciar-dependencias-com-composer]] — o Composer gera o `vendor/autoload.php`, que se inclui com require_once
