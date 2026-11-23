---
titulo: "Antipadrão de SQL, o que é e como o livro organiza cada um"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, vol. 1, cap. 1 What's an Antipattern? (PDF p. 20-27)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Antipadrão de SQL

## Definição

Um **antipadrão** é uma técnica que tenta resolver um problema, mas costuma criar outros. É muito praticado, de várias formas que têm algo em comum, e as pessoas chegam a ele sozinhas, por um colega, por um livro ou por um artigo.

O livro organiza os antipadrões em quatro partes, seguindo as etapas do trabalho:

1. **Projeto lógico do banco:** quais informações guardar e como organizar e ligar as tabelas, colunas e relações.
2. **Projeto físico:** como implementar com os recursos do banco: definir tabelas e índices e escolher tipos de dados (DDL, como `CREATE` e `ALTER`).
3. **Consultas:** inserir e buscar dados (DML, como `SELECT`, `INSERT`, `UPDATE`, `DELETE`).
4. **Desenvolvimento de aplicações:** o jeito certo e o errado de usar SQL a partir de outra linguagem, como o PHP.

Além disso, há **mini-antipadrões** curtos entre os capítulos e um apêndice de teoria relacional, porque muitos antipadrões vêm de entender mal essa teoria.

**Estrutura de cada capítulo:**

- **Objetivo:** a tarefa que se quer resolver.
- **Antipadrão:** a solução comum e as consequências que não se previam.
- **Como reconhecer:** frases que denunciam o antipadrão.
- **Usos legítimos:** quando ele é aceitável.
- **Solução:** o caminho melhor.

## Por que importa

O formato serve de roteiro para revisar qualquer decisão de banco: qual é o objetivo, qual é a solução tentadora, que sinais mostram que ela é ruim e quando ela é aceitável.

## Como se relaciona

As notas de regra deste livro (por exemplo, a regra não ordene por RAND() em tabelas grandes) seguem esse formato. A teoria está em modelo relacional, junções e agregações.

## Notas do Claude

Os títulos dos capítulos são de propósito engraçados ou sugestivos, como manda a tradição de nomear padrões e antipadrões.

## Conexões

- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[modelo-relacional-juncoes-e-agregacoes]] — muitos antipadrões vêm de entender mal a teoria relacional
- [[regra-nao-guardar-lista-em-uma-coluna]] — é um dos antipadrões do projeto lógico, no formato do livro
- [[regra-nao-ordene-por-rand-em-tabelas-grandes]] — é um antipadrão de consulta que segue a estrutura descrita
- [[indices-com-o-metodo-mentor]] — trata do projeto físico, a segunda parte do livro
- [[sql-basico-para-aplicacoes-web]] — o SQL básico é o pré-requisito para entender os antipadrões de consulta
- [[regra-trate-o-codigo-do-banco-como-codigo]] — o antipadrão da imunidade diplomática está nesta organização
- [[mapa-sql-antipatterns]] — o mapa acompanha a destilação do livro de que esta nota veio
