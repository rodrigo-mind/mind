---
titulo: "Não execute código de plugin enviado por usuários"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 5, seção The Class and Object Functions (PDF p. 197-200)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não execute código de plugin enviado por usuários

## Regra

Se o sistema carrega classes a partir de um nome vindo de configuração ou da requisição, valide esse nome e nunca rode automaticamente código enviado por usuários. Plugins só entram por quem administra o sistema.

## Por quê

Instanciar uma classe a partir de um texto (`new $classe`) permite extensões e plugins, mas qualquer plugin instalado roda com os mesmos privilégios do código principal: um autor malicioso poderia fazer um estrago.

O livro recomenda:

- verificar que a classe existe e tem os métodos esperados antes de usá-la;
- tratar todo dado externo como não confiável; no caso de caminho de arquivo, escapar ou remover pontos e separadores de diretório, para impedir que alguém mude de diretório e inclua um arquivo inesperado;
- manter um diretório de plugins, com arquivos instalados pelo administrador (direta ou por um ambiente gerenciador protegido por senha), que revisa o código ou o obtém de um repositório confiável, como faz a plataforma de blogs WordPress.

## Quando não vale

O livro observa que as técnicas de extensão cobrem, em geral, o dono da instalação (com permissão de escrita), e não os usuários externos.

## Como verificar

Procure `new $variavel`, `include`/`require` com variável e carregamento de arquivos de uma pasta onde usuários podem gravar.

## Notas do Claude

Combina com a regra de nunca confiar na entrada do usuário do livro de PHP e MySQL.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[funcoes-de-classe-e-objeto-em-php]] — a regra trata do risco de instanciar classes por nome
- [[regra-nunca-confie-na-entrada-do-usuario]] — ambas tratam dados externos como não confiáveis
