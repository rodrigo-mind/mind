---
titulo: "Padrões de banco de dados em PHP (visão geral)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 13, abertura e Summary (PDF p. 520-587)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrões de banco de dados em PHP (visão geral)

## Definição

Resumo do capítulo 13, que agrupa os padrões que ajudam a persistir objetos de um modelo de domínio:

| Padrão | Para que serve |
|---|---|
| Data Mapper | Classes especializadas que mapeiam objetos do modelo de domínio de e para o banco relacional |
| Identity Map | Acompanha os objetos para evitar instâncias duplicadas e idas desnecessárias ao banco |
| Unit of Work | Automatiza o salvamento: só atualiza o que mudou e só insere o que é novo |
| Lazy Load | Adia a criação de objetos, e até as consultas, até serem necessários |
| Domain Object Factory | Encapsula a criação de objetos de domínio |
| Identity Object | Permite montar critérios de consulta sem referência ao banco |
| Fábricas de consulta (seleção e atualização) | Encapsulam a lógica de construção do SQL |
| Domain Object Assembler | Um controlador que gerencia o processo de alto nível de guardar e recuperar |

## Por que importa

Para o autor, a escolha depende do problema: ele gravita para o Data Mapper com Identity Object, quer automação, mas precisa poder sair do sistema e ir ao manual (otimizar um SQL ou fazer uma junção entre tabelas). Um bom teste de um framework, ou de um sistema próprio, é a facilidade de encaixar uma gambiarra sem degradar a integridade do conjunto. Mesmo frameworks de mapeamento objeto-relacional podem não fazer exatamente o que se quer.

## Como se relaciona

Veja mapeador de dados, mapa de identidades, unidade de trabalho e objeto de identidade, os quatro com nota própria. O carregamento tardio e as demais fábricas não foram lidos por inteiro.

## Notas do Claude

Confiança média: a tabela segue o resumo do capítulo; só os quatro padrões com nota própria foram lidos com detalhe.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[mapeador-de-dados-data-mapper]] — esta nota cita a ideia de «Mapeador de dados» na seção sobre como se relaciona
- [[objeto-de-identidade-identity-object]] — esta nota cita a ideia de «Objeto de identidade» na seção sobre como se relaciona
- [[mapa-de-identidades-identity-map]] — esta nota cita a ideia de «Mapa de identidades» na seção sobre como se relaciona
- [[unidade-de-trabalho-unit-of-work]] — esta nota cita a ideia de «Unidade de trabalho» na seção sobre como se relaciona
- [[arquitetura-em-camadas]] — a camada de dados é detalhada nos padrões de banco de dados
- [[iteracao-de-objetos-em-php]] — resultados de banco costumam ser percorridos como iteráveis
