---
titulo: "Trabalhar com arquivos em PHP"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 25, seções 25.1 e 25.2 (PDF p. 975-991)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Trabalhar com arquivos em PHP

## Para que serve

Ler, gravar, copiar e listar arquivos no servidor (registros, caches, dados simples). Em muitos casos o banco de dados é melhor (busca rápida, ordenação, SQL), mas arquivos servem para resultados rápidos, e até um CMS com banco precisa do sistema de arquivos.

## Quando usar e quando não usar

Use para texto simples e arquivos próprios do site. Para dados estruturados e consultados, prefira o banco.

## O que perguntar ao usuário antes

- O processo do PHP tem permissão de leitura e escrita na pasta? (Via (S)FTP se pode ajustar com `chmod`: dê só as permissões necessárias.)

## Passos

1. **Rápido:** `file_put_contents($arquivo, $dados)` grava (com `FILE_APPEND` acrescenta; com `LOCK_EX` pede trava exclusiva); `file_get_contents($arquivo)` lê tudo; `file()` devolve um vetor de linhas. Ao exibir, use `htmlspecialchars`.
2. **Com controle:** `$f = fopen($arquivo, $modo)`; `fwrite($f, ...)` devolve os bytes gravados ou `false`; `fclose($f)` sempre.
3. **Modos** (acrescente `+` para ler e escrever, `b` para binário): `r` só lê; `w` grava apagando o conteúdo; `a` grava no fim (acrescenta, mesmo após `fseek`); `c` grava sem apagar ao abrir; `x` cria um arquivo novo e **dá aviso se já existe**.
4. **Ler por partes:** `fgets($f, 4096)` uma linha por vez (informe o tamanho máximo; a linha vem com o fim de linha) até `feof($f)`; `fgetc` um caractere; `fseek`, `rewind` e `ftell` movem e leem a posição; `fpassthru` envia direto ao cliente.
5. **Informações:** `file_exists`, `is_file`, `is_dir`, `is_readable`, `is_writable`, `is_uploaded_file`, `is_link`, `is_executable`.
6. **Operações:** `copy`, `rename` (mover), `mkdir`, `rmdir` (pasta vazia), `unlink` (apagar arquivo).
7. **Listar pastas:** a classe `dir` (`read()` e `close()`) ou `opendir`, `readdir` e `closedir`.
8. **Caminhos:** `__FILE__` (o script atual), `__DIR__` (sua pasta), `dirname()` e `realpath()` (converte um caminho virtual em absoluto; devolve `false` se não existe). Arquivos novos são criados em relação à pasta atual, salvo caminho absoluto.

## Saída esperada

Dados gravados e lidos sem perda, com tratamento de falhas (o retorno `false`).

## Erros comuns

- Esquecer `fclose` ou ler um arquivo grande com `fgets` e um tamanho curto demais (a linha vem cortada).
- Gravar em um arquivo aberto em modo `r`.
- Ignorar permissões e receber erros de acesso (no Windows, o livro cita as ferramentas Filemon e Process Monitor).

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
file_put_contents('log.txt', date('c') . " acesso\n", FILE_APPEND | LOCK_EX);
```

## Notas do Claude

O `php.ini` tem `allow_url_fopen` (abrir URLs com as funções de arquivo, ligado por padrão), `auto_detect_line_endings` e o cache de `realpath()`. Com `allow_url_fopen`, caminhos montados a partir da entrada do usuário viram risco (inferência minha; ver nunca confie na entrada do usuário).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-upload-seguro-em-php]] — o upload termina em operações de arquivo
- [[carregamento-de-arquivos-e-include-path]] — include e include_path também lidam com caminhos de arquivos
- [[regra-use-funcoes-do-php-e-nao-comandos-do-sistema]] — a regra orienta a escolha das funções de arquivo
- [[regra-trave-o-arquivo-ao-ler-e-gravar]] — a regra trata do acesso concorrente a arquivos
- [[acesso-ao-banco-com-pdo]] — o banco é a alternativa a arquivos para dados estruturados
- [[streams-em-php]] — «Streams em PHP: protocolos, contexto e metadados» cita esta nota ao explicar suas relações
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — «Imagens e arquivos: no banco» cita esta nota ao explicar suas relações
- [[vetores-iteraveis-e-geradores-em-php]] — geradores leem arquivos grandes linha a linha
- [[spl-iteradores-e-classes-padrao-do-php]] — «SPL: iteradores e classes padrão do PHP» cita esta nota ao explicar suas relações
