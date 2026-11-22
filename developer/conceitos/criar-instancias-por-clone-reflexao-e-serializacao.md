---
titulo: "Criar instâncias por clone, reflexão e serialização"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 5, seção Making new objects (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Criar instâncias por clone, reflexão e serialização

## Definição

Além de `new`, há outras formas de obter um objeto novo, com igualdade que nem sempre se mantém:

- **`clone`:** copia uma instância existente e dispara `__clone()`, que **não faz a cópia**, só dá a chance de corrigir os efeitos indesejados (como estado e recursos).
- **Reflexão:** `ReflectionClass::newInstance()`, `newInstanceArgs()` e `newInstanceWithoutConstructor()` (que ignora o construtor; usada por bibliotecas como o Doctrine, com risco, porque o construtor garante a validade do objeto). Em geral não são para uso comum.
- **Serialização:** `serialize`/`unserialize`, e os métodos `__serialize()` (devolve os dados a guardar, sem recursos) e `__unserialize()` (restaura os dados e reabre recursos). Não são serializados objetos internos do PHP, propriedades estáticas e recursos.

## Por que importa

O objeto novo pode diferir do original (um ponteiro de arquivo diferente, um estado diferente).

## Como se relaciona

Para a segurança da serialização, ver a regra de não desserializar dados não confiáveis; para as bases, tipos de objeto, herança de tipos, comparação e referências, e serialização de objetos em PHP.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[serializacao-de-objetos-em-php]] — esta nota cita a ideia de «Serialização de objetos em PHP» na seção sobre como se relaciona
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — esta nota cita a ideia de «Tipos de objeto, herança de tipos, comparação e referências» na seção sobre como se relaciona
- [[regra-nao-desserialize-dados-nao-confiaveis]] — a regra de segurança da serialização
- [[funcoes-de-classe-e-objeto-em-php]] — a reflexão e as funções de classe
- [[reflection-api-do-php]] — «Reflection API do PHP» cita esta nota ao explicar suas relações
