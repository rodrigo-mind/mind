---
titulo: "Carregamento automático de classes em PHP (autoload)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 5, seção Autoload (PDF p. 192-197)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Carregamento automático de classes em PHP (autoload)

## Definição

Mecanismo em que o PHP, ao encontrar uma classe desconhecida, aciona uma função registrada para localizar e incluir o arquivo dela. Para funcionar bem, cada classe fica em seu próprio arquivo, com pastas correspondentes ao namespace.

- `spl_autoload_register()` sem argumentos ativa o comportamento padrão (`spl_autoload()`): procura um arquivo com o nome da classe em minúsculas e extensão `.php` ou `.inc`, trocando as barras do namespace por pastas. Se os arquivos mantêm as maiúsculas (`Writer.php`), é preciso registrar uma função própria.
- Uma função própria recebe o nome da classe, já normalizado para o nome totalmente qualificado e sem barra inicial, e tenta incluir o arquivo. Para o estilo PEAR (`XML_RPC_Server`), troca-se cada sublinhado por `DIRECTORY_SEPARATOR`; para namespaces, cada barra invertida.
- `file_exists()` não considera o `include_path`; use `stream_resolve_include_path()`, que devolve o caminho absoluto ou `false`.
- `spl_autoload_register()` empilha funções: o PHP as chama em ordem até uma ter sucesso. Isso permite que partes do sistema e bibliotecas registrem suas estratégias sem sobrescrever as outras, e `spl_autoload_unregister()` remove uma.
- A função antiga `__autoload()` foi descontinuada no PHP 7.2 e removida no PHP 8.

## Por que importa

Elimina dezenas de `require` e, combinado com namespaces, organiza o projeto. O autor diz que o carregador do Composer faz exatamente isso, juntando o `include_path` e a lógica de nomes.

## Como se relaciona

Veja namespaces em PHP, incluir arquivos em PHP e gerenciar dependências com o Composer, onde o PSR-4 padroniza a convenção.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[namespaces-em-php]] — esta nota cita a ideia de «Namespaces em PHP» na seção sobre como se relaciona
- [[gerenciar-dependencias-com-composer]] — esta nota cita a ideia de «Gerenciar dependências com o Composer» na seção sobre como se relaciona
- [[carregamento-de-arquivos-e-include-path]] — o autoload substitui a maior parte dos require manuais
- [[testes-unitarios-em-php-com-phpunit]] — o PHPUnit usa o autoload com --bootstrap
- [[metodos-magicos-e-constantes-magicas-do-php]] — spl_autoload_register é o autoload tratado ali
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — o autowiring se apoia em classes carregadas automaticamente
- [[estilos-de-programacao-procedural-funcional-e-orientado-a-objetos]] — o carregamento automático é o que torna prática a organização em classes
- [[regra-use-require-para-arquivos-essenciais]] — o autoload evita uma longa lista de require
- [[criar-um-pacote-composer-e-versionar-com-semver]] — o autoload PSR-4 é configurado no composer.json do pacote
