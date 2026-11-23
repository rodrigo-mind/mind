---
titulo: "Gerenciar dependências com o Composer"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 10"
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 38 (PDF p. 1313-1324)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Gerenciar dependências com o Composer

## Para que serve

Declarar as bibliotecas de que o projeto depende e deixar o Composer instalá-las, resolver as dependências delas e carregar as classes automaticamente. O livro lembra que um pacote costuma ter dependências próprias, e fazer isso à mão (baixar um arquivo compactado) quase sempre falha.

## Quando usar e quando não usar

Use quando o projeto precisa de bibliotecas de terceiros (envio de e-mail, registro de logs) ou quando quer o carregamento automático das próprias classes. O livro diz que escrever o próprio carregador automático é incomum e desaconselhado em projetos reais. Em hospedagem compartilhada com envio por FTP, é preciso rodar o Composer localmente e enviar a pasta `vendor` (inferência minha, a conferir na hospedagem).

## O que perguntar ao usuário antes

- Que funcionalidades precisam de biblioteca de terceiros?
- Em que versão do PHP o projeto roda?
- Qual pasta guarda as classes do projeto (por convenção, `src`)?

## Passos

1. Instale o Composer seguindo a documentação oficial.
2. Na raiz do projeto, crie o `composer.json` com `composer init` (assistente interativo) ou à mão.
3. Procure o pacote no Packagist (o repositório padrão) e adicione-o com `composer require vendor/pacote`. O Composer instala o pacote e suas dependências.
4. Configure o carregamento automático no padrão PSR-4: na chave `autoload`, associe um espaço de nomes raiz a uma pasta (por exemplo, `"PhpBook\\MyFirstProject": "src"`); as pastas seguintes correspondem aos níveis do espaço de nomes. Para as classes de teste, use `autoload-dev`.
5. Inclua `vendor/autoload.php` no ponto de entrada.
6. Escolha restrições de versão (nota abaixo) e separe as dependências: de produção (`require`) e de desenvolvimento (`require-dev`, com `--dev`).
7. Para atualizar, `composer update vendor/pacote`; em produção, instale com `composer install --no-dev`.

## Restrições de versão

O livro explica o versionamento semântico (maior, menor, correção). Uma versão maior pode quebrar a aplicação; menor e correção devem ser seguras.

| Sintaxe | Aceita |
|---|---|
| `^2.2.12` (circunflexo, o padrão do `composer require`) | 2.2.12 ou mais nova, até antes de 3.0.0 |
| `~2.2.12` (til) | Só a última parte muda: aceita 2.2.20 mas não 2.3.0 |
| `2.2.12` | Só essa versão |
| `>=2.2.12 <2.2.18` | Uma faixa explícita |
| `^7.4 \|\| ^8.0` | Mais de uma opção (ou) |
| `*` | Qualquer: o livro diz que é péssima ideia |

## Saída esperada

Um `composer.json` com dependências e carregamento automático, uma pasta `vendor` e um arquivo de travamento.

## Erros comuns

- Usar `*` como versão.
- Instalar as dependências de desenvolvimento em produção: o livro avisa que trazem risco de segurança e peso.
- Escrever um `require` por classe, o que o livro chama de "inchaço de require" em projetos sem carregamento automático (no exemplo do livro, um plugin popular de WordPress). Em WordPress o autor diz que o Composer não é adotado.
- O livro nota que a função `__autoload` foi removida do PHP 8; use `spl_autoload_register` ou o Composer.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```json
{
  "require": { "monolog/monolog": "^2.2" },
  "require-dev": { "phpunit/phpunit": "^9.5" },
  "autoload": { "psr-4": { "App\\": "src/" } }
}
```


## Notas do Claude

- Confirmado também por Wenz e Hauser (cap. 38): instalação com `curl -sS https://getcomposer.org/installer | php` (ou o instalador do Windows, que confere o OpenSSL), `composer.json` com as dependências, pasta `vendor/` e restrições de versão (como "pelo menos 3.0.0 e menos que 4.0.0"). Os capítulos 39 (extensões em C pelo PECL) e 40 (como contribuir com o PHP) foram lidos e não geraram notas, por estarem fora da stack.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-strict-types-em-todo-arquivo-php]] — o carregamento automático PSR-4 e os tipos estritos compõem o projeto PHP moderno
- [[carregamento-automatico-em-php]] — «Carregamento automático de classes em PHP» cita esta nota ao explicar suas relações
- [[namespaces-em-php]] — «Namespaces em PHP» cita esta nota ao explicar suas relações
- [[emails-mime-html-e-anexos]] — bibliotecas de e-mail se instalam com Composer
- [[ajax-e-websockets-com-php]] — o Ratchet se instala com Composer
- [[testes-unitarios-em-php-com-phpunit]] — o PHPUnit se instala e carrega pelo Composer
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — as bibliotecas de DI se instalam com Composer
- [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] — o pacote compartilhado se instala com Composer
- [[regra-use-require-para-arquivos-essenciais]] — o autoload do Composer é incluído com require_once
- [[xml-imagens-e-pdf-com-php]] — o Composer instala as bibliotecas de PDF
- [[criar-um-pacote-composer-e-versionar-com-semver]] — criar o próprio pacote é o passo seguinte ao uso do Composer
- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa acompanha a destilação do livro de que esta nota veio
