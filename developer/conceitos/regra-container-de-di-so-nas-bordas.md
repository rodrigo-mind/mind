---
titulo: "Use o contêiner de injeção de dependência só nas bordas do sistema"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seção Inversion of Control (PDF p. 455-458)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use o contêiner de injeção de dependência só nas bordas do sistema

## Regra

Peça as dependências no construtor (tipadas, em vez de escondidas no corpo dos métodos) e use o contêiner de DI apenas na inicialização e na montagem, nas bordas do sistema, e nunca o repasse para as classes buscarem objetos por conta própria.

## Por quê

Uma classe cujo construtor exige um repositório torna o requisito explícito na assinatura: as IDEs ajudam, e o teste fica mais fácil. O contêiner é configurado na fase de inicialização da requisição (por código ou arquivo de configuração, com atributos ou injeção automática, autowiring, por reflexão) e, depois, usado na fase de execução para obter os objetos concretos.

Passar o contêiner pelo sistema para que as classes peguem os objetos faz perder o benefício (requisitos claros nas assinaturas) e transforma o contêiner num Service Locator glorificado. O livro recomenda manter o grosso do sistema ignorante do contêiner, com componentes de responsabilidade estreita e acoplamento frouxo. Em projetos reais, indica a biblioteca PHP-DI e o microframework Slim.

## Quando não vale

Não há exceção no trecho lido.

## Como verificar

Procure classes que recebem o contêiner no construtor e chamam `get()` dentro dos métodos, e dependências obtidas por chamadas estáticas globais.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[registry-e-service-locator]] — a regra traz a alternativa preferida ao Registry
- [[front-controller-em-php]] — o contêiner de DI monta os componentes do controlador
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — o antipadrão do localizador de serviços
- [[principios-de-projeto-orientado-a-objetos-resumo]] — menos acoplamento reduz o uso do contêiner nas classes
