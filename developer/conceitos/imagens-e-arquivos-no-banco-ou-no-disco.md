---
titulo: "Imagens e arquivos: no banco (BLOB) ou no disco (caminho)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 12 (Phantom Files), p. 150-159 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Imagens e arquivos: no banco (BLOB) ou no disco (caminho)

## Definição

Guardar imagens ou anexos de entidades (retrato de usuário, capturas de tela de um defeito) pode ser feito em uma coluna `BLOB` ou como arquivo no disco, com o caminho em um `VARCHAR`. O livro diz que não existe resposta única e critica a ideia de que arquivos externos são sempre melhores: decida com informação.

**Riscos de guardar só o caminho** (arquivos fora do banco não "obedecem" ao banco):
- `DELETE` não apaga o arquivo (ficam órfãos), e `ROLLBACK` não o restaura.
- O arquivo não segue o isolamento de transações: mudanças aparecem a outros clientes na hora.
- As ferramentas de backup do banco (como `mysqldump`) não incluem os arquivos: é um backup em dois passos, e é difícil sincronizar com a transação (a história do livro: 11 mil imagens perdidas porque a pasta não estava no backup).
- `GRANT` e `REVOKE` não valem para os arquivos.
- O caminho é só texto: o banco não verifica se existe, nem atualiza se o arquivo é movido.

**Vantagens do `BLOB`:** o apagamento, o `ROLLBACK`, o isolamento, o bloqueio, o backup e as permissões funcionam como em qualquer dado. Tamanhos do MySQL: `MEDIUMBLOB` até 16 MB e `LONGBLOB` até 4 GB. Dá para entregar a imagem direto de uma consulta, com o tipo de conteúdo correto na resposta HTTP.

**Vantagens de arquivos externos (usos legítimos):** o banco fica mais enxuto, o backup do banco é mais rápido e menor, e é mais fácil visualizar e editar em lote. Alguns bancos têm tipos que apontam para arquivos externos (`BFILE` no Oracle, `FILESTREAM` no SQL Server).

**Perguntas para decidir** (do livro): como se faz o backup e a restauração incluindo as imagens? Como se verifica depois de restaurar em outro servidor? Quem remove imagens sem referência? Quem pode ver cada imagem? E como se cancela uma troca de imagem?

## Por que importa

A escolha impacta backup, segurança e consistência de dados.

## Como se relaciona

Ver regra de upload seguro em PHP e trabalhar com arquivos em PHP; o particionamento vertical sugere guardar BLOBs em tabela à parte.

## Notas do Claude

No projeto (PHP e MySQL com deploy por FTP em hospedagem compartilhada), o mais comum é guardar o arquivo no disco e o caminho no banco; então vale incluir a pasta de uploads no backup, apagar o arquivo junto com a linha e guardar o arquivo fora da pasta pública, servindo-o por um script que confira a permissão (inferência minha).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[trabalhar-com-arquivos-em-php]] — esta nota cita a ideia de «Trabalhar com arquivos em PHP» na seção sobre como se relaciona
- [[particionamento-de-tabelas]] — separar BLOBs é um particionamento vertical
- [[regra-upload-seguro-em-php]] — o upload decide onde o arquivo vai parar
- [[transacoes-e-acid]] — arquivos externos não seguem transações
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
