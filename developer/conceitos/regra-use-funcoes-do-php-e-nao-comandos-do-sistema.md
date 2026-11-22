---
titulo: "Use funções do PHP, e não comandos do sistema, para arquivos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 25, seção 25.2.2 (PDF p. 987-989)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use funções do PHP, e não comandos do sistema, para arquivos

## Regra

Para copiar, mover, criar e apagar arquivos e pastas, use `copy()`, `rename()`, `mkdir()`, `rmdir()` e `unlink()` em vez de `system("cp ...")`, `exec()`, `shell_exec()` ou o operador de crases.

## Por quê

Chamar o sistema operacional é caro em desempenho, abre riscos de segurança e prende o código a um sistema (um `cp` não existe no Windows), jogando fora a portabilidade do PHP. O livro conta o caso de um artigo que ensinava a copiar arquivos com `system()`, que ele classifica como o jeito errado, porque o PHP já oferece tudo o que se faz na linha de comando.

## Quando não vale

Quando não há função equivalente do PHP para o comando necessário (e, mesmo então, o livro pede que o comando seja independente de sistema e nunca use dados do usuário sem tratamento, inferência minha sobre esta ressalva).

## Como verificar

Procure `system(`, `exec(`, `shell_exec(`, `passthru(` e crases no código, e veja se existe função nativa para a tarefa.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[trabalhar-com-arquivos-em-php]] — a regra orienta a escolha das funções de arquivo
- [[owasp-top-10-2021]] — a execução de comandos do sistema é um risco de injeção
