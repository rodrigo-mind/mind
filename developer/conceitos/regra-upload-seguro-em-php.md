---
titulo: "Trate arquivos enviados por upload como entrada não confiável"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 13, seção 13.5, p. 625-630"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Trate arquivos enviados por upload como entrada não confiável

## Regra

Receba uploads com `POST` e `enctype="multipart/form-data"`, use só o nome base do arquivo, mova-o com `move_uploaded_file()` e confira o tamanho no próprio PHP.

## Por quê

- Os dados do arquivo ficam em `$_FILES`: `error`, `name` (nome original, no navegador do usuário), `size`, `tmp_name` e `type` (tipo MIME informado pelo navegador). O livro diz para só confiar em um nome sem caminho com `basename()`.
- O arquivo temporário é apagado quando o script termina; é preciso copiá-lo para um lugar permanente.
- O valor de `tmp_name` pode ser falsificado para fazer o script processar um arquivo indevido (o exemplo clássico é `/etc/passwd`). `is_uploaded_file()` verifica que o arquivo veio mesmo de um upload, e `move_uploaded_file()` faz essa verificação ao mover.
- O campo oculto `MAX_FILE_SIZE` não funciona e um atacante pode manipulá-lo; confira `$_FILES[...]["size"]` você mesmo. O livro prefere esse controle ao `upload_max_filesize`, que descarta o arquivo depois de transferido.
- Defina o diretório temporário (`upload_tmp_dir`) e garanta permissão de escrita na pasta de destino. Outras opções úteis: `post_max_size`, que corta o script de destino se for excedido, e `max_file_uploads`.

## Quando não vale

Não há exceção no texto lido.

## Como verificar

Confira se o código usa `move_uploaded_file`, se checa tamanho e se grava o arquivo com o nome definido pelo servidor, e não pelo usuário.

## Notas do Claude

O livro não cobre a validação do tipo real do arquivo nem a renomeação para evitar execução de código; o checklist do projeto pede tipo e tamanho validados e o arquivo renomeado. Como o tipo MIME vem do navegador, valide o conteúdo no servidor (inferência minha). Confiança média: li o essencial da seção.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-sessoes-seguras-em-php]] — ambos tratam dados externos como não confiáveis, no upload e na sessão
- [[tipos-do-elemento-input]] — o tipo file exige multipart/form-data, e o servidor deve tratar o upload com cuidado
- [[trabalhar-com-arquivos-em-php]] — o upload termina em operações de arquivo
- [[opcoes-importantes-do-php-ini]] — upload_max_filesize e post_max_size limitam os envios
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — o upload decide onde o arquivo vai parar
- [[regra-sempre-informe-alt-e-as-dimensoes-das-imagens]] — o alt e as dimensões podem ser definidos no tratamento do upload
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
