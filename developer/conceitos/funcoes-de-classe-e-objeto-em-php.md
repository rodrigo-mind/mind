---
titulo: "Funções de classe e de objeto em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 5, seção The Class and Object Functions (PDF p. 197-210)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Funções de classe e de objeto em PHP

## Definição

Funções para inspecionar classes e objetos em tempo de execução, úteis quando não se conhece de antemão a classe com que se trabalha (plugins, por exemplo). Também se pode instanciar uma classe a partir de um texto (`new $nomeDaClasse`).

| Para saber... | Use |
|---|---|
| Se a classe existe | `class_exists()` (não garante que o construtor não exija argumentos; para isso, a API Reflection) |
| Todas as classes do processo | `get_declared_classes()` |
| A classe de um objeto | `get_class()` (desde o PHP 8.3, a chamada sem argumento está descontinuada) |
| Se um objeto é de uma família | o operador `instanceof` (o antigo `is_a()` ficou para trás) |
| O nome totalmente qualificado | `NomeDaClasse::class` e, no PHP 8, `$objeto::class` |
| Os métodos públicos | `get_class_methods()` |
| Se um método existe | `method_exists()` ou `is_callable([$objeto, 'metodo'])` |
| Propriedades | `get_class_vars()`, `get_object_vars()`; `get_mangled_object_vars()` inclui as privadas e protegidas |
| Herança | `get_parent_class()`, `is_subclass_of()` (não cobre interfaces) e `class_implements()` (SPL) |
| Chamar de forma dinâmica | `call_user_func()` e `call_user_func_array()` (os argumentos não vão por referência) |

## Por que importa

São o ponto de partida simples antes da API Reflection, mais poderosa. O autor lembra que, com nomes de classe que vêm de fora, é preciso verificar a existência da classe e dos métodos.

## Como se relaciona

A regra de não executar código enviado por usuários trata do risco desse recurso (ver regra não execute plugins de origem não confiável).

## Notas do Claude

Confiança média: li as funções de classe, de métodos, de propriedades e de herança; a API Reflection e os atributos (que fecham o capítulo) não foram lidos.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-nao-execute-plugins-de-origem-nao-confiavel]] — a regra trata do risco de instanciar classes por nome
- [[fundamentos-de-classes-e-objetos-em-php]] — as funções de classe e objeto operam sobre o mesmo modelo
- [[criar-instancias-por-clone-reflexao-e-serializacao]] — a reflexão e as funções de classe
