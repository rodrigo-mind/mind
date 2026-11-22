---
titulo: "Objeto de identidade (Identity Object)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 13, seção The Identity Object (PDF p. 568-575)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Objeto de identidade (Identity Object)

## Definição

Um objeto que encapsula os critérios de uma consulta (também chamado de Data Transfer Object por Alur e outros), desacoplando o sistema da sintaxe do banco. Em vez de criar um método para cada consulta (`EventMapper::findBySpaceId()`), o cliente monta os critérios (por exemplo, homens com mais de 30 e menos de 40 anos e menos de 1,80 m), e o objeto é passado ao método que constrói o SQL.

## Por que importa

É difícil prever o que o cliente vai querer buscar. Adicionar métodos ao mapeador caso a caso é pouco flexível e duplica consultas parecidas; usar vetores de filtros e ordenação exige validar e incorporar tudo. Combinações de condições em tempo de execução são o ganho; o limite é que só dá para filtrar por campos que o código prevê.

## Como funciona

Um conjunto de métodos de configuração dos critérios, com uma classe base que gerencia as operações comuns e garante um tipo único para todos os objetos de critério. O livro mostra, ao fim, uma construção encadeada como `->field('name')`.

## Como se relaciona

Trabalha com o mapeador de dados e com as fábricas de consulta (seleção e atualização), que montam o SQL a partir do objeto.

## Notas do Claude

Confiança média: li o problema e o início da implementação; as classes de campo e de comparação e as fábricas de consulta não foram lidas.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[mapeador-de-dados-data-mapper]] — «Mapeador de dados» cita esta nota ao explicar suas relações
- [[padroes-de-banco-de-dados-visao-geral]] — «Padrões de banco de dados em PHP» cita esta nota ao explicar suas relações
