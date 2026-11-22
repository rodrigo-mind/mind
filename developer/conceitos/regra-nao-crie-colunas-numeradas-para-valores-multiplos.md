---
titulo: "Não crie colunas numeradas para valores múltiplos"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 8 (Multicolumn Attributes), p. 108-117 (PDF)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Não crie colunas numeradas para valores múltiplos

## Regra

Quando um atributo pode ter vários valores do mesmo tipo (etiquetas, telefones, contatos), não crie colunas `tag1`, `tag2`, `tag3`; crie uma tabela dependente com uma coluna e uma linha por valor, ligada à tabela-mãe por chave estrangeira.

## Por quê

Com colunas numeradas, tudo fica difícil:
- **Buscar:** é preciso testar todas as colunas (`tag1 = 'x' OR tag2 = 'x' OR tag3 = 'x'`; ou `'x' IN (tag1, tag2, tag3)`), e para dois valores o `AND` de duas listas de `OR`.
- **Inserir e remover:** não se sabe qual coluna está livre: exige ler a linha antes (e há risco de conflito entre dois clientes) ou expressões complexas com `CASE`, `COALESCE` e `NULLIF`.
- **Unicidade:** o banco não impede o mesmo valor em duas colunas.
- **Crescimento:** quantas colunas bastam? Acrescentar uma coluna a uma tabela cheia custa (bloqueio, cópia da tabela) e obriga a rever todas as consultas e aplicações que usam a tabela.

A solução é uma tabela como `Tags (bug_id, tag, PRIMARY KEY (bug_id, tag))`: a busca vira `JOIN ... WHERE tag = 'x'` (para dois valores, dois joins com apelidos), inserir e apagar são `INSERT` e `DELETE` de uma linha, a chave primária impede a duplicata, e não há limite de valores. O livro nota que é o mesmo objetivo e a mesma solução do jaywalking (lista em uma coluna).

## Quando não vale

Se as colunas têm **papéis diferentes** (quem relatou, quem corrige, quem verifica um defeito), elas são atributos logicamente distintos e é válido ter colunas comuns; para relatar todos os envolvidos, aceita-se a complexidade. Também se pode criar a tabela dependente com uma coluna de papel (com os riscos da modelagem EAV).

## Como verificar

Procure colunas com sufixo numérico (`tel1`, `tel2`, `tag3`), formulários com um limite fixo arbitrário de valores e perguntas como "quantos no máximo?".

## Notas do Claude

Ver também não guardar lista em uma coluna e declare chaves estrangeiras (a tabela dependente precisa delas).

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[regra-nao-guardar-lista-em-uma-coluna]] — é o mesmo objetivo e a mesma solução de uma relação um para muitos
- [[regra-declare-chaves-estrangeiras]] — a tabela dependente precisa da chave estrangeira
- [[regra-nao-use-eav-modele-subtipos]] — a tabela de papéis pode cair no modelo EAV
- [[regra-nao-crie-tabelas-ou-colunas-por-valor-de-dado]] — as duas trocam linhas por colunas
- [[formas-normais-resumo]] — a 1FN proíbe colunas semelhantes
