---
titulo: "Streams em PHP: protocolos, contexto e metadados"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 26, seção 26.2 (PDF p. 1003-1015)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Streams em PHP

## Definição

Um stream é um fluxo de dados que o PHP processa com uma interface padronizada, no mesmo estilo que as funções de arquivo (`fopen`, `file_get_contents`...). O tipo do fluxo se indica por um prefixo, como em uma URL (parecido com o DSN do banco de dados); `file://` é o padrão e pode ser omitido.

| Prefixo | O que acessa |
|---|---|
| `file://` | arquivos locais ou de rede |
| `http://`, `https://` | arquivos por HTTP e HTTPS |
| `ftp://`, `ftps://` | arquivos por FTP (com usuário e senha na URL) |
| `tcp://`, `ssl://`, `udp://` | conexões de rede |
| `php://stdin`, `stdout`, `stderr`, `input`, `output` | entrada e saída do PHP (`php://input` traz os dados do corpo POST) |
| `php://filter` | aplica filtros (ver filtros de stream) |
| `compress.zlib://`, `compress.bzip2://` | dados compactados em gzip e bzip2 |

- **Contexto:** `stream_context_create([ "http" => [...] ])` define opções do tipo de fluxo (método, cabeçalhos, conteúdo da requisição) e se passa às funções de arquivo.
- **Metadados:** `stream_get_meta_data($f)` devolve um vetor com informações do fluxo (variam conforme o tipo).
- **SSL e SFTP:** exigem OpenSSL (no Windows, `extension=openssl` no `php.ini`).
- **FTP:** com um fluxo `ftp://`, os modos `rb`, `wb`, `xb` e `ab` baixam, criam e acrescentam; há também as funções específicas `ftp_connect`, `ftp_login`, `ftp_get` e `ftp_close` (que pedem configuração no Linux).
- **Compressão:** `compress.zlib://` funciona em todos os sistemas; o bzip2 exige a extensão `bz2`. No exemplo do livro, um arquivo de 362 bytes caiu para 84 em gzip.

## Por que importa

Uma só forma de acessar arquivos locais, remotos e compactados simplifica o código.

## Como se relaciona

Estende trabalhar com arquivos em PHP. As requisições HTTP estão em fazer requisições HTTP com streams; os filtros, em filtros de stream em PHP.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[filtros-de-stream-em-php]] — esta nota cita a ideia de «Filtros de stream em PHP» na seção sobre como se relaciona
- [[trabalhar-com-arquivos-em-php]] — esta nota cita a ideia de «Trabalhar com arquivos em PHP» na seção sobre como se relaciona
- [[fazer-requisicoes-http-com-streams-em-php]] — o framework aplica os fluxos http e https
- [[opcoes-importantes-do-php-ini]] — allow_url_fopen controla os fluxos de URL
