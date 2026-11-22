---
titulo: "Não resolva um problema complexo em uma consulta só"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 18 (Spaghetti Query), p. 224-233 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não resolva um problema complexo em uma consulta só

## Regra

Divida um relatório complexo em várias consultas simples em vez de uma consulta monstro; escolha, entre duas consultas que dão o mesmo resultado, a mais simples (a lei da parcimônia).

## Por quê

- A consulta única com vários `JOIN` produz **produtos cartesianos** que multiplicam as contagens e levam a números sem sentido (ver produto cartesiano não intencional).
- Fica difícil de escrever, de alterar quando o chefe pede mais um campo, de depurar e de explicar em uma revisão de código; quem a escreveu a mantém para sempre.
- O banco otimiza e executa mais fácil e confiavelmente consultas simples; o custo de uma consulta monstro pode crescer exponencialmente. Menos consultas só é melhor se tiverem complexidade igual.
- No exemplo do livro, o relatório "quantos produtos, quantos desenvolvedores corrigiram defeitos, média por desenvolvedor, quantos defeitos corrigidos foram relatados por clientes" vira quatro consultas curtas, cada uma correta.

## Quando não vale

Se uma ferramenta de relatório ou componente só aceita **uma** consulta como fonte, pode-se ser obrigado a fazer uma consulta complexa (e, se for impossível, faça vários relatórios). Também quando se precisa do resultado combinado ordenado, que é mais eficiente o banco ordenar.

## Como verificar

Procure consultas com muitos `JOIN` e agregações, `DISTINCT` acrescentado "para consertar" contagens e frases como "trabalho nesta consulta há um dia inteiro".

## Notas do Claude

Também se pode gerar SQL com SQL (o livro menciona, na seção seguinte, que não li por inteiro).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[produto-cartesiano-nao-intencional]] — explica o principal defeito da consulta única
- [[divida-tecnica]] — consultas intrincadas viram dívida técnica
- [[regra-faca-o-mais-simples-que-funcione-antes-de-aplicar-um-padrao]] — a lei da parcimônia também vale para consultas SQL
