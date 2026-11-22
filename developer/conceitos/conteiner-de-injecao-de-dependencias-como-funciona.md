---
titulo: "Contêiner de injeção de dependências: como funciona"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 9, seções Inversion of control container e Dependency injection and the service locator (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Contêiner de injeção de dependências: como funciona

## Definição

Um contêiner de injeção de dependências (DI) é uma fábrica global da aplicação que une configuração e gerenciamento de instâncias. Martin Fowler o chama de "contêiner de inversão de controle": em vez de o seu código chamar a biblioteca, o framework chama o seu código; dá para trocar peças por implementações próprias de interfaces padrão (por exemplo, configurar um logger próprio para toda classe que pede `LoggerInterface`). O livro constrói um **contêiner de brinquedo** (só didático) para mostrar que o conceito é simples:

- **Localizador de serviços** (`ServiceLocator`) que cumpre a interface padrão **PSR-11** (`ContainerInterface`, com `get($id)` e `has($id)`; `has` verdadeiro garante que `get` não lança "não encontrado"). Guarda um mapa de **IDs** para o nome de classe (os IDs podem ser o nome da interface, o da classe ou um texto qualquer como "maths"; o mesmo serviço pode ter vários IDs).
- **Fábrica de serviços** (`ServiceFactory`), que cria cada serviço sob demanda e **guarda uma só instância por classe**: usa **reflexão** para ler os tipos dos parâmetros do construtor e instancia, de forma recursiva, toda a árvore de dependências.
- Uma fábrica do contêiner que monta as definições (aqui, fixas no código). Em testes: obter por interface e por classe dá a mesma instância; `has` devolve verdadeiro e falso corretamente.

Por que usar: uma aplicação real tem muitos objetos, e criar todos a cada requisição é desperdício; o contêiner só cria os usados. Para produção, use uma biblioteca madura (Symfony DependencyInjection, PHP-DI) ou o contêiner do framework. Um contêiner real traz o que o de brinquedo não tem: fábricas e fechamentos, várias instâncias de uma classe, serviços privados, **autowiring** (configurar classes automaticamente), injeção por *setter* ou por atributos e contêineres embrulhados.

## Por que importa

Mostra a lógica por trás de qualquer contêiner e por que o código das classes não deve conhecê-lo.

## Como se relaciona

Ver registry e service locator, a regra de usar o contêiner de DI só nas bordas, acoplamento e desacoplamento e padrões de criação de objetos.

## Notas do Claude

O livro também alerta para o antipadrão do localizador de serviços (usar o contêiner dentro das classes), já coberto pela regra citada. O projeto, em PHP sem framework, pode montar as dependências à mão no controlador frontal, sem contêiner, enquanto o grafo for pequeno (inferência minha).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padroes-de-criacao-de-objetos]] — esta nota cita a ideia de «Padrões de criação de objetos» na seção sobre como se relaciona
- [[acoplamento-e-desacoplamento]] — esta nota cita a ideia de «Acoplamento e desacoplamento» na seção sobre como se relaciona
- [[registry-e-service-locator]] — o contêiner é um localizador de serviços
- [[regra-container-de-di-so-nas-bordas]] — o antipadrão do localizador de serviços
- [[gerenciar-dependencias-com-composer]] — as bibliotecas de DI se instalam com Composer
- [[carregamento-automatico-em-php]] — o autowiring se apoia em classes carregadas automaticamente
- [[padrao-mvc-modelo-visao-controlador]] — o contêiner monta as peças de uma aplicação MVC
- [[padrao-strategy]] — a dependência do analisador deve ser injetada
- [[regra-evite-o-singleton-classico]] — o contêiner garante a instância única sem o Singleton
- [[reflection-api-do-php]] — contêineres usam reflexão para descobrir dependências
