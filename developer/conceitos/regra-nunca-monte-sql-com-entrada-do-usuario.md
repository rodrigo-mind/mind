---
titulo: "Nunca monte SQL juntando texto vindo do usuário (injeção de SQL)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 21 (SQL Injection), p. 258-275"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Nunca monte SQL juntando texto vindo do usuário

## Regra

Não interpole entrada do usuário (nem texto vindo do banco) em um comando SQL. Passe valores como parâmetros de uma consulta preparada, e, para o que não pode ser parâmetro, use listas de valores permitidos.

## Por quê

A injeção de SQL ocorre quando o conteúdo interpolado muda a sintaxe da consulta, por exemplo terminando o comando e executando outro. O livro lista as defesas, que devem ser usadas conforme o caso, pois não há técnica única ("não confie em ninguém"):

- **Filtrar a entrada:** converter para inteiro quando se espera um número, e usar expressão regular para aceitar apenas caracteres seguros, caindo em valor padrão se não casar.
- **Parametrizar valores dinâmicos:** um parâmetro substitui um único valor depois de o banco analisar o comando, então nenhuma entrada altera a sintaxe.
- **Cuidado com injeção de segunda ordem:** uma string guardada no banco (como o sobrenome O'Hara) também pode quebrar uma consulta posterior.
- **`IN` com vários itens:** crie um marcador para cada item, na quantidade da lista, e não uma única string separada por vírgulas.
- **Identificadores e palavras-chave** (coluna de ordenação, direção): parâmetros não servem; mapeie a escolha do usuário para valores fixos permitidos, com um padrão se a escolha for inválida.
- **Escapar (quoting):** só como último recurso, com a função madura da biblioteca de acesso, e nunca uma função caseira ou de outro propósito (como a de entidades HTML). O livro cita um caso raro em que a parametrização atrapalha o otimizador.

## Quando não vale

Não há exceção à regra de nunca confiar na entrada; apenas as técnicas diferem conforme o que se está inserindo (valor, identificador, lista).

## Como verificar

Procure no código concatenação ou interpolação de variáveis dentro de strings SQL, inclusive em `ORDER BY` e `IN`. Confira se todo valor externo vai como parâmetro e se os identificadores vêm de uma lista fixa.

## Notas do Claude

No PHP com PDO, a parametrização é `$pdo->prepare('... WHERE id = ?')` seguido de `execute([...])`, com `PDO::ATTR_EMULATE_PREPARES` desligado quando possível. Isso é inferência minha com base no checklist do projeto (prepared statements) e no conceito do livro; os exemplos do livro são em Python.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[acesso-ao-banco-com-pdo]] — o PDO com comandos preparados é a aplicação, em PHP, da defesa contra injeção de SQL
- [[validar-formularios-em-php]] — a validação do formulário precede o uso dos dados na consulta SQL
- [[owasp-top-10-2021]] — «OWASP Top 10» cita esta nota ao explicar suas relações
- [[regra-nunca-confie-na-entrada-do-usuario]] — a injeção de SQL é o caso mais grave de entrada não confiável
- [[sql-basico-para-aplicacoes-web]] — ao escrever INSERT e WHERE com dados do usuário, use consultas preparadas
- [[implementar-busca-por-palavras-no-mysql]] — o termo de busca digitado deve ir em parâmetro
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — montar SQL por concatenação dificulta a depuração e abre o risco de injeção
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[mysqli-extensao-do-mysql-para-php]] — o mysqli também permite consultas parametrizadas
- [[escapar-texto-conforme-o-destino-em-php]] — a alternativa ao escape de SQL é a consulta parametrizada
