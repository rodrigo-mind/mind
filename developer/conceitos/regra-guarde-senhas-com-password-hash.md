---
titulo: "Guarde senhas com password_hash, nunca com md5 ou sha1"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 7, seção 7.8.3 (PDF p. 339-341)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Guarde senhas com password_hash, nunca com md5 ou sha1

## Regra

Gere o hash de senhas com `password_hash($senha, PASSWORD_DEFAULT)` e confira com `password_verify()`. Não use `md5()`, `sha1()`, `hash()` nem `crypt()` com sal próprio para senhas.

## Por quê

- Segundo o livro, `password_hash()` usa bcrypt por padrão, e aceita Argon2i (PHP 7.2) e Argon2id (7.3). Ele recomenda deixar o sal aleatório padrão, em vez de definir um sal próprio.
- O livro apresenta `md5()` e `sha1()` como funções de hash para textos e arquivos, mas não explica por que não servem para senhas. Isso é complemento meu: elas são rápidas demais, e por isso fáceis de quebrar por força bruta, e não têm sal embutido.

## Quando não vale

`md5_file()` e `hash('sha256', ...)` continuam úteis para conferir a integridade de arquivos ou gerar chaves de cache. Só não servem para senhas.

## Como verificar

- Procure `md5(`, `sha1(` e `hash(` perto de "senha" ou "password" nos `.php`. Não deve haver nenhum.
- A coluna da senha no banco deve ser `VARCHAR(255)`, para caber hashes futuros (inferência minha).
- O login deve usar `password_verify()`, e não comparação com `===`.

## Notas do Claude

- Confiança média porque o livro só lista as funções, sem argumentar contra MD5 e SHA-1 para senhas.
- Use `password_needs_rehash()` no login para atualizar hashes antigos (conhecimento meu, a conferir no manual).
- diverge: na mesma seção, o livro sugere gerar IDs únicos com `md5(uniqid())` para sessões próprias. Para tokens e IDs de sessão, prefira `bin2hex(random_bytes(16))`, que é criptograficamente seguro (conhecimento meu). Ver números aleatórios e precisão em PHP e a regra sessões seguras em PHP.
- Ligado a opções de autenticação em PHP.

## Conexões

- [[numeros-aleatorios-e-precisao-em-php]] — a mesma atenção ao aleatório seguro vale para tokens de sessão
- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-senha-com-hash-e-sal]] — diverge: o SQL Antipatterns mostra hash SHA-256 com sal manual e recomenda no mínimo SHA-256, enquanto aqui se usa `password_hash`, que cuida de sal e custo
- [[opcoes-de-autenticacao-em-php]] — a senha guardada é parte da autenticação em PHP
- [[regra-sessoes-seguras-em-php]] — o identificador de sessão pede aleatório seguro, e não `md5(uniqid())`
- [[owasp-top-10-2021]] — senhas fracas se enquadram nas falhas de criptografia e de autenticação
