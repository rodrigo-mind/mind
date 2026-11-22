---
titulo: "Regra: evite o Singleton clássico"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Singleton (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Evite o Singleton clássico

## Regra

Não use a classe com construtor privado e método estático `instance()` como forma de compartilhar objetos; injete a dependência e deixe o contêiner garantir a instância única.

## Por quê

O Singleton dá uma forma estática de trazer a classe de qualquer ponto do código, criando acoplamento global e **estado global**, que o PHP moderno abandonou, e dificulta os testes. Os contêineres de injeção de dependência já mantêm uma só instância por padrão, o que tira a vantagem do padrão. O autor o considera um antipadrão e cita o uso antigo na conexão com o banco (`Database::instance()->query(...)`), hoje em desuso. Há casos raros em que garantir uma única instância é útil. As "facades" do Laravel, que parecem singletons, são mais leves, mas também podem prejudicar a testabilidade e a modularização (e não são o padrão Facade).

## Quando não vale

Quando precisa mesmo garantir uma só instância e nenhuma alternativa serve (o autor usou em dados falsos de teste).

## Como verificar

Procure `private function __construct` com `static function instance()` e chamadas estáticas a conexões e serviços dentro de métodos.

## Notas do Claude

O livro de Zandstra também trata o Singleton, na nota de padrões de criação de objetos; as duas fontes convergem na ressalva do acoplamento global.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[padroes-de-criacao-de-objetos]] — trata o Singleton do outro livro
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — o contêiner garante a instância única sem o Singleton
- [[registry-e-service-locator]] — alternativas globais com problemas parecidos
- [[padrao-facade]] — as facades do Laravel não são o padrão Facade
