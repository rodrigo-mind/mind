---
titulo: "Trate o código do banco como código (versionar, documentar e testar)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, vol. 1, cap. 24 Diplomatic Immunity (PDF p. 292-305)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Trate o código do banco como código

## Regra

Esquema, migrações, dados iniciais e consultas do banco seguem as mesmas práticas do resto do código: ficam no controle de versão (Git), têm documentação e têm testes.

## Por quê

- O livro chama de "imunidade diplomática" o antipadrão de achar que o código do banco está dispensado dessas práticas, só porque o SQL é diferente das outras linguagens ou porque as ferramentas são menos práticas.
- Sem documentação do esquema, ninguém sabe que dados são sensíveis, e é preciso tratar tudo como sensível.
- Sem um processo para implantar mudanças no esquema, os bancos de desenvolvimento e de produção ficam diferentes.
- O banco é a base da aplicação, e a qualidade conta.

**O que fazer:**

- **Documentar:**
  - o diagrama entidade-relacionamento, o documento mais importante;
  - as tabelas, colunas e views, inclusive a unidade de medida das colunas de valores;
  - as relações, principalmente as que não têm chave estrangeira declarada;
  - os gatilhos, os procedimentos (como uma API) e a segurança (usuários e privilégios).
- **Versionar:** tudo o que for preciso para reconstruir e reimplantar: os scripts de criação do esquema, os dados iniciais (bootstrap), os diagramas e os scripts de manutenção. Use o mesmo repositório da aplicação, para que as versões combinem. **Migrações** automatizam a atualização do esquema de um banco para a versão nova.
- **Testar:** o esquema (as tabelas, colunas e restrições existem), as consultas e os dados de teste.

**Teste do código "temporário":** apague-o na hora. Se você hesitar, é porque vale guardar, e então vai para o controle de versão.

## Quando não vale

Testes únicos e provas de conceito que serão de fato descartados (o critério acima).

## Como verificar

- O repositório tem uma pasta (por exemplo, `banco/`) com o esquema em SQL e as migrações numeradas.
- Um banco novo pode ser criado do zero só com esses arquivos.

## Notas do Claude

- Para a stack do projeto, sem framework: arquivos `banco/001-criar-tabelas.sql`, `banco/002-adicionar-coluna.sql`... aplicados em ordem, e uma tabela `migracoes` que registra quais já rodaram. O `mysqldump --no-data` ajuda a conferir se produção e desenvolvimento estão iguais (inferência minha).
- Não versione dumps com dados reais de clientes nem senhas (inferência minha).

## Conexões

- [[regra-prefira-logica-no-php-a-procedimentos-armazenados]] — os procedimentos que restarem no banco seguem esta regra
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[antipadrao-de-sql-o-que-e]] — é um dos antipadrões do livro, na parte de desenvolvimento de aplicações
- [[sintomas-de-um-projeto-php-que-degringola]] — a falta de controle de versão aparece também no banco
- [[mapa-sql-antipatterns]] — o mapa acompanha a destilação do livro de que esta nota veio
