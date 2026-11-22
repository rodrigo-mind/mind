---
titulo: "Implementar busca por palavras no MySQL"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Bill Karwin, SQL Antipatterns, cap. 17, seção Solution: Use the Right Tool for the Job (PDF p. 213-222)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Implementar busca por palavras no MySQL

## Para que serve

Pesquisar rapidamente palavras em colunas de texto (resumo, descrição), ordenando por relevância quando possível.

## Quando usar e quando não usar

Use o índice de texto completo nativo para busca simples em uma só marca de banco. Para recursos avançados (muitos documentos, vários idiomas, análise), um mecanismo externo.

## O que perguntar ao usuário antes

- Quantos textos, e com que frequência mudam?
- Aceita-se depender do recurso de uma marca de banco?

## Passos

1. **Índice de texto completo (MySQL):** `ALTER TABLE Bugs ADD FULLTEXT INDEX bugfts (summary, description);` e consulta com `MATCH(summary, description) AGAINST ('crash')`. As colunas do `MATCH` devem ser as mesmas do índice e na mesma ordem. O modo booleano aceita operadores: `AGAINST ('+crash -save' IN BOOLEAN MODE)`.
2. **Outras marcas** (cada uma com sintaxe própria, aprender uma não ajuda nas outras): Oracle (`CONTEXT` e `CONTAINS()`, `CTXCAT`...), SQL Server (`CREATE FULLTEXT CATALOG` e `CONTAINS()` ou `FREETEXT()`), PostgreSQL (coluna `TSVECTOR`, índice GIN e operador `@@`), SQLite (tabela virtual FTS3 ou FTS4, que precisa estar compilada e exige copiar os dados).
3. **Mecanismos externos** (para resultado igual em qualquer banco): Sphinx Search, Apache Lucene (com o servidor Solr), Elasticsearch e OpenSearch. Não ficam sincronizados sozinhos com os dados: é preciso alimentar o índice a cada mudança.
4. **Índice invertido caseiro** (padrão SQL, sem extensões): uma tabela `Keywords (keyword_id, keyword único)` e uma tabela de associação `BugsKeywords` ligando palavras e textos. A primeira busca por uma palavra faz a busca cara (com `LIKE` ou expressão regular com limites de palavra) e grava o resultado; as próximas leem a associação. Um *trigger* de `INSERT` (e de `UPDATE`) mantém a associação para os textos novos. Uma coluna `num_searches` mostra as buscas mais pedidas.
5. **Teste vários** contra as necessidades do projeto: não há solução melhor para todos.

## Saída esperada

Busca rápida e precisa, que não varre a tabela inteira.

## Erros comuns

- Esquecer de manter o índice externo em sincronia.
- Usar colunas diferentes no `MATCH` e no índice.
- Voltar ao `LIKE` quando o volume cresce (ver a regra de LIKE com curinga).

## Exemplo mínimo (inventado pelo Claude, não do livro)

```sql
ALTER TABLE artigos ADD FULLTEXT INDEX ft_busca (titulo, texto);
SELECT id, titulo FROM artigos
WHERE MATCH(titulo, texto) AGAINST ('php +sessao' IN BOOLEAN MODE);
```

## Notas do Claude

O livro é anterior a mudanças recentes; confira os limites do `FULLTEXT` (tamanho mínimo da palavra, lista de palavras ignoradas) na documentação do MySQL em uso.

## Conexões

- [[mapa-sql-antipatterns]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-nao-use-like-com-curinga-para-buscar-palavras]] — o framework traz as alternativas
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — o termo de busca digitado deve ir em parâmetro
- [[acesso-ao-banco-com-pdo]] — a busca se executa com consulta preparada
