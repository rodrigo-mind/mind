---
titulo: "Registry (Service Locator) e a preferência pela injeção de dependência"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seção Creating and Discovering Object Instances (PDF p. 449-455)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Registry (Service Locator) e a preferência pela injeção de dependência

## Definição

Registry (também conhecido como Service Locator) é uma classe que dá acesso global a objetos e dados compartilhados por métodos estáticos, ou como Singleton. Resolve o problema de levar a informação obtida em uma camada (por exemplo, a configuração lida pelo controlador) a uma camada distante, sem repassá-la de objeto em objeto, o que força classes a mudar de interface só para retransmitir o contexto. A analogia do livro *The Pragmatic Programmer*: o quadro de avisos de uma delegacia, onde um turno deixa provas para o seguinte. Um Registry também pode esconder a complexidade da montagem (por exemplo, criar um objeto que depende de outro configurado).

## Por que importa

O livro dá o resumo das críticas:

- Prende os componentes ao sistema e cria dependências escondidas no corpo dos métodos, em vez de expostas nas assinaturas. Isso gera acoplamento forte e dificulta entender as interdependências.
- A crítica de que atrapalha os testes é em parte injusta, pois dá para desenhar o Registry para receber objetos de teste.

O autor diz que, em edições anteriores, o capítulo se apoiava no Registry, mas que hoje prefere a Inversão de Controle (IoC), por meio de um contêiner de injeção de dependência: componentes mais independentes e requisitos claros, ao custo de configuração inicial.

## Como se relaciona

A alternativa é a injeção de dependência, na qual a classe declara o que precisa no construtor, o que ajuda IDEs e testes (ver a regra do contêiner nas bordas). Os padrões de criação do capítulo 9 (Singleton e Service Locator) estão em padrões de criação de objetos.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padroes-de-criacao-de-objetos]] — esta nota cita a ideia de «Padrões de criação de objetos» na seção sobre como se relaciona
- [[regra-container-de-di-so-nas-bordas]] — a regra traz a alternativa preferida ao Registry
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — o contêiner é um localizador de serviços
- [[regra-evite-o-singleton-classico]] — alternativas globais com problemas parecidos
