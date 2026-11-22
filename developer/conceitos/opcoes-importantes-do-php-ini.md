---
titulo: "Opções importantes do php.ini"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 34, seção 34.2 (PDF p. 1272-1279)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Opções importantes do php.ini

## Definição

Resumo do `php.ini-production` comentado pelo livro (valores de referência em dezembro de 2024; confira a versão em uso):

| Grupo | Opções e valor sugerido |
|---|---|
| Linguagem | `short_open_tag = Off` (não aceitar `<?`), `output_buffering = 4096`, `zlib.output_compression = Off`, `precision = 14`, `serialize_precision = -1` |
| Proteção | `disable_functions` (por exemplo, `phpinfo`, `system`), `disable_classes`, `open_basedir` (restringe as pastas acessíveis) |
| Limites | `max_execution_time = 30`, `max_input_time = 60`, `memory_limit = 128M`, `max_input_vars = 1000` |
| Erros | `display_errors = Off`, `display_startup_errors = Off`, `log_errors = On`, `error_log` (arquivo ou syslog), `error_reporting` (por exemplo, `E_ALL`) |
| Dados | `variables_order = "GPCS"`, `request_order = "GP"`, `post_max_size = 8M`, `default_charset = "UTF-8"`, `auto_prepend_file` e `auto_append_file` |
| Caminhos | `include_path`, `doc_root`, `extension_dir` |
| Upload | `file_uploads = On`, `upload_tmp_dir`, `upload_max_filesize = 2M`, `max_file_uploads = 20` |
| Wrappers | `allow_url_fopen = On`, `allow_url_include = Off` (obsoleta desde o PHP 7.4), `default_socket_timeout = 60` |
| Extensões | `extension=nome` (tirar o ponto e vírgula); `extension_dir` correto para a linha de comando |
| Data | `[Date]` `date.timezone` (por exemplo, `Europe/Berlin`; para o projeto, um fuso do Brasil, inferência minha) |

O livro lembra que, na prática, poucas opções precisam mudar, mas vale revisitar o arquivo de tempos em tempos, atrás de otimizações.

## Por que importa

Limites de upload (`upload_max_filesize`, `post_max_size`) e de memória e tempo explicam erros comuns de produção.

## Como se relaciona

Ver onde configurar o PHP e a regra de não exibir erros na produção; para uploads, regra de upload seguro em PHP.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[onde-configurar-o-php]] — «Onde configurar o PHP: php.ini, .htaccess e ini_set» cita esta nota ao explicar suas relações
- [[regra-upload-seguro-em-php]] — upload_max_filesize e post_max_size limitam os envios
- [[regra-sessoes-seguras-em-php]] — as opções de sessão ficam no php.ini
- [[streams-em-php]] — allow_url_fopen controla os fluxos de URL
- [[carregamento-de-arquivos-e-include-path]] — include_path é uma das opções
- [[enviar-email-com-mail-do-php]] — a seção mail function fica no php.ini
- [[niveis-de-erro-e-set-error-handler]] — «Níveis de erro e set_error_handler» cita esta nota ao explicar suas relações
