---
titulo: "Incluir arquivos em PHP: require, include e include_path"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 5, seções sobre organização por arquivos e Include Paths (PDF p. 186-192)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Incluir arquivos em PHP: require, include e include_path

## Definição

- `require` e `include` diferem só no tratamento de erro: um erro em arquivo incluído com `require` derruba o script inteiro; com `include`, gera um aviso e termina só a execução do arquivo incluído. O autor considera `require` e `require_once` a escolha segura para bibliotecas e `include` útil para modelos de página (templates).
- `_once` inclui o arquivo só se ainda não foi incluído, o que evita redefinir classes e funções. Há um pequeno custo de desempenho em relação a `require`: é um equilíbrio entre eficiência e conveniência. São instruções da linguagem, e não funções: os parênteses são dispensáveis.
- O **include_path** é a lista de diretórios onde o PHP procura um arquivo cujo caminho não existe a partir do diretório atual. Configura-se em `php.ini` (separados por dois-pontos no Unix e ponto e vírgula no Windows), no `httpd.conf`, no `.htaccess` do Apache (`php_value include_path ...`) ou, no próprio script, com `set_include_path()`. Em vez de sobrescrever, use `get_include_path()` e acrescente com `PATH_SEPARATOR`.

## Por que importa

O livro desaconselha caminhos relativos tortuosos (relativos ao contexto de chamada, e não ao arquivo) e caminhos absolutos fixos (que obrigam a reescrever tudo ao mudar de servidor). Com o `include_path`, é possível usar caminhos lógicos, como `business/User.php`, de qualquer lugar do projeto.

O autor nota que muitos sistemas modernos nem usam `require` por classe: usam carregamento automático e namespaces.

## Como se relaciona

O carregamento automático (ver carregamento automático em PHP) e o Composer substituem a maior parte dos `require` manuais.

## Notas do Claude

Em hospedagem compartilhada, o `.htaccess` é uma forma de definir o `include_path` quando não se tem acesso ao `php.ini`, como o livro observa. Uma alternativa, mais simples no projeto, é usar caminhos baseados em `__DIR__` (inferência minha, não do livro).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[carregamento-automatico-em-php]] — o autoload substitui a maior parte dos require manuais
- [[trabalhar-com-arquivos-em-php]] — include e include_path também lidam com caminhos de arquivos
- [[opcoes-importantes-do-php-ini]] — include_path é uma das opções
- [[regra-use-require-para-arquivos-essenciais]] — a regra escolhe, entre include e require, o certo para arquivos essenciais
