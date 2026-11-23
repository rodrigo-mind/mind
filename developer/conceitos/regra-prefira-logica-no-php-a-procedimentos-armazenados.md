---
titulo: "Prefira a lógica no PHP a procedimentos armazenados"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, vol. 1, cap. 25 Standard Operating Procedures (PDF p. 306-319)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Prefira a lógica no PHP a procedimentos armazenados

## Regra

Escreva a lógica de negócio e a montagem das consultas na aplicação (PHP). Não adote como política "todo SQL em procedimentos armazenados" (stored procedures).

## Por quê

- **O caso do livro:** uma startup com bons programadores PHP, 12 servidores de aplicação e um servidor MySQL. O banco estava sobrecarregado e os servidores PHP, quase parados. As chamadas aos procedimentos levavam mais de um segundo, quando o limite era 50 ms. Os procedimentos montavam consultas por partes, como SQL dinâmico, e só o desenvolvedor-chefe os entendia. A regra tinha sido imposta pelo fundador, que trabalhava assim com Oracle.
- **A origem do hábito:** concentrar a lógica no banco fazia sentido nas linguagens e na arquitetura de antes, quando muitas vezes só o administrador do banco sabia escrever SQL eficiente.
- **Os problemas:**
  - a linguagem de procedimentos é diferente em cada banco e confunde (por exemplo, o `DECLARE` do MySQL);
  - é difícil depurar, testar e saber quando recompilar;
  - alguns erros só aparecem quando o procedimento roda, às vezes já em produção;
  - concentra a carga num único servidor, que não escala como a aplicação.
- **A solução do livro:** uma arquitetura moderna, com a lógica na aplicação, que usa os recursos de vários servidores, as ferramentas, os depuradores e os testes que a equipe já domina, inclusive dublês (mocks).

## Quando não vale

O livro aponta casos de borda em que o procedimento é a melhor solução:

- uma tarefa com muitas consultas seguidas, em que a ida e volta entre a aplicação e o banco pesa;
- tarefas raras ou que rodam sem aplicação, como administração, auditoria de privilégios, limpeza e relatórios;
- consultas que exigem **privilégios elevados**: o administrador dá o privilégio ao procedimento, e os usuários só recebem permissão para executá-lo.

## Como verificar

Liste os procedimentos do banco (`SHOW PROCEDURE STATUS`). Os que têm regra de negócio ou montam SQL dinâmico devem ter um motivo dentre as exceções acima, ou ser migrados para o PHP.

## Notas do Claude

Na hospedagem compartilhada, nem sempre é possível criar procedimentos e gatilhos, o que reforça a regra para a stack do projeto (inferência minha, a conferir no plano).

## Conexões

- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[acesso-ao-banco-com-pdo]] — o PDO é o meio de manter a lógica das consultas no PHP
- [[regra-trate-o-codigo-do-banco-como-codigo]] — procedimentos armazenados também precisam de versão, documentação e testes
- [[arquitetura-em-camadas]] — a lógica de negócio pertence à camada de aplicação, e não ao banco
- [[script-de-transacao-e-modelo-de-dominio]] — são formas de organizar a lógica de negócio na aplicação
- [[mapa-sql-antipatterns]] — o mapa acompanha a destilação do livro de que esta nota veio
