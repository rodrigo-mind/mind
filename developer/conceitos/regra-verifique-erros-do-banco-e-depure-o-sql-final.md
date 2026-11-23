---
titulo: "Verifique erros do banco e depure o SQL que foi de fato enviado"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 23 (See No Evil), p. 284-291 (PDF)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Verifique erros do banco e depure o SQL que foi de fato enviado

## Regra

Assuma que qualquer chamada ao banco pode falhar: confira o retorno ou capture a exceção de cada conexão e consulta, registre o erro e mostre ao usuário uma mensagem amigável; e, ao depurar, olhe o texto SQL final, não o código que o monta.

## Por quê

- Ignorar erros deixa o usuário com uma tela branca ou uma exceção incompreensível (e o programador com o telefone tocando). Os erros mais comuns são de conexão (banco ou usuário errado, servidor fora do ar) e de sintaxe da consulta. Segundo o livro, estimativas dizem que até metade das linhas de uma aplicação robusta tratam erros (detectar, classificar, relatar e compensar).
- Depurar lendo o código que concatena o SQL é como montar um quebra-cabeça sem ver a figura da caixa: o exemplo do livro era a falta de espaço entre `Bugs` e `WHERE`, evidente ao se ver `SELECT * FROM BugsWHERE ...`.

## Como fazer

- Monte a consulta em uma variável, para examiná-la antes de executar.
- Envie o SQL a um lugar fora da saída da aplicação (arquivo de log, console do depurador).
- **Nunca** imprima o SQL em comentários HTML da página: qualquer usuário vê o fonte, e o SQL revela a estrutura do banco.
- Com ORM, onde o SQL é gerado em segundo plano, procure o log (muitos o enviam ao log de erros do servidor) ou monitore as consultas no próprio servidor de banco.
- Mensagens de sintaxe do MySQL indicam o trecho em que o analisador se perdeu (palavras-chave faltando, `WHERE` repetido, parêntese sem fechar).

## Quando não vale

Quando não há o que fazer em resposta ao erro (o `close()` de uma conexão perto do fim do programa), ou em linguagens com exceções, em que se pode deixar a exceção subir para quem é responsável por tratá-la.

## Notas do Claude

Em PHP, o equivalente é ativar o modo de exceções do PDO (`PDO::ERRMODE_EXCEPTION`) e tratar `PDOException` sem expor a mensagem ao usuário (ver acesso ao banco com PDO e não exiba erros na tela em produção; a conexão com PDO é inferência minha, o exemplo do livro usa Python). Confiança média: a seção final do capítulo, sobre leitura de mensagens de sintaxe, foi lida só no início.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[acesso-ao-banco-com-pdo]] — o PDO oferece o modo de exceções
- [[regra-nao-exiba-erros-na-tela-em-producao]] — registrar o erro e mostrar mensagem amigável
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — montar SQL por concatenação dificulta a depuração e abre o risco de injeção
- [[depurar-php-com-var-dump-e-xdebug]] — ambos tratam de depuração em PHP
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[mysqli-extensao-do-mysql-para-php]] — a verificação de erros vale também para o mysqli
