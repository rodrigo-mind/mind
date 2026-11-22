---
titulo: "Padrões de criação de objetos (Singleton, Factory Method, Abstract Factory, Prototype, Service Locator e Dependency Injection)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 9, abertura e seção do Singleton (PDF p. 289-300)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrões de criação de objetos

## Definição

Criar objetos é um ponto fraco do projeto orientado a objetos. Para ter flexibilidade (trabalhar com supertipos abstratos e trocar a classe concreta em tempo de execução), a instanciação é adiada, e é preciso uma estratégia para ela. O princípio que o capítulo propõe é "delegue a instanciação de objetos". Uma fábrica (factory) é uma classe ou método responsável por gerar objetos. O capítulo cobre seis padrões:

| Padrão | Ideia |
|---|---|
| Singleton | Uma classe especial que gera um, e só um, objeto |
| Factory Method | Uma hierarquia de classes criadoras |
| Abstract Factory | Agrupa a criação de produtos funcionalmente relacionados |
| Prototype | Gera objetos por clonagem (`clone`) |
| Service Locator | O sistema é consultado para entregar o objeto |
| Dependency Injection | O sistema entrega o objeto a quem precisa |

O exemplo do livro: uma classe que contrata funcionários (`NastyBoss`) cria um tipo concreto diretamente (`Minion`), e isso limita a flexibilidade; delegar a criação a um método de fábrica na classe `Employee` permite variar os tipos. Condicionais grandes de fábrica são comuns, e o livro nota que empurrar a decisão para o ponto da criação evita condicionais paralelas espalhadas pelo código.

## O Singleton (início)

O problema: variáveis globais prendem classes ao contexto e não alertam sobre colisões de nomes; mas é útil dar a todos acesso a um objeto, como as preferências da aplicação (DSN do banco, caminhos, URLs). As forças a resolver: o objeto deve estar disponível a qualquer objeto, não deve ficar numa variável global que se sobrescreve e deve existir uma única instância. O ponto de partida é controlar a instanciação com um construtor privado.

## Como se relaciona

É a resposta à pergunta que fica em composição em vez de herança ("de onde vêm os objetos?"). A injeção de dependência também tem um capítulo próprio em *The Art of Modern PHP 8* (capítulo 9, ainda não destilado).

## Notas do Claude

Confiança média: li a abertura do capítulo e o começo do Singleton; os demais padrões e o código de cada um não foram lidos. Hoje, muitos autores tratam o Singleton como armadilha por criar estado global (inferência minha, não do trecho lido).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[padroes-de-projeto]] — «Padrões de projeto» cita esta nota ao explicar suas relações
- [[principios-solid]] — a inversão de dependência pede delegar a criação de objetos concretos
- [[polimorfismo-no-lugar-de-condicionais]] — a escolha do objeto concreto ainda usa condicional, mas centralizada
- [[registry-e-service-locator]] — «Registry» cita esta nota ao explicar suas relações
- [[padroes-adapter-e-factory]] — «Padrões Adapter e Factory» cita esta nota ao explicar suas relações
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — static e new static aparecem nos padrões de criação
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — «Contêiner de injeção de dependências: como funciona» cita esta nota ao explicar suas relações
- [[regra-faca-o-mais-simples-que-funcione-antes-de-aplicar-um-padrao]] — «Faça o mais simples que funcione antes de aplicar um padrão» cita esta nota ao explicar suas relações
- [[padrao-builder]] — «Padrão Builder» cita esta nota ao explicar suas relações
- [[regra-evite-o-singleton-classico]] — trata o Singleton do outro livro
