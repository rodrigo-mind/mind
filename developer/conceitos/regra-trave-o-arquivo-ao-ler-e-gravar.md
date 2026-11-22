---
titulo: "Trave o arquivo ao ler e gravar (flock)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 25, seção 25.3.1 (PDF p. 995-997)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Trave o arquivo ao ler e gravar (flock)

## Regra

Quando um script lê um arquivo e depois o regrava (ou vários acessos podem gravar ao mesmo tempo), bloqueie-o com `flock()` durante a operação.

## Por quê

Sem trava, dois acessos paralelos se intercalam: A lê, B lê, A grava, B grava; a entrada de A se perde porque B leu o arquivo antes dela. O exemplo do livro é um livro de visitas em arquivo, em que cada entrada é gravada antes das antigas (por isso o arquivo se reescreve inteiro, e não se acrescenta ao fim).

## Quando não vale

Nem todo sistema de arquivos suporta travas (o livro cita o antigo FAT). Para gravações só de acréscimo, `file_put_contents` com `FILE_APPEND | LOCK_EX` trava na própria chamada.

## Como verificar

Procure leituras seguidas de gravações no mesmo arquivo; confira se há `flock($f, LOCK_EX)` após abrir e `LOCK_UN` ao terminar (o arquivo deve ser aberto com `fopen`).

## Notas do Claude

O exemplo do livro guarda cada entrada com `serialize()` e `base64_encode()`, e as lê com `unserialize()`. Como o arquivo é próprio do site, funciona, mas `unserialize` sobre dados que um usuário possa alterar é perigoso (inferência minha, a conferir); para dados de formulário, prefira JSON ou banco de dados.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[trabalhar-com-arquivos-em-php]] — a regra trata do acesso concorrente a arquivos
- [[transacoes-e-acid]] — é o análogo, em arquivos, do isolamento das transações
- [[serializacao-de-objetos-em-php]] — o exemplo de livro de visitas usa serialize
- [[regra-nao-desserialize-dados-nao-confiaveis]] — o exemplo do livro de visitas usa serialize
