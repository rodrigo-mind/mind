---
titulo: "Use métodos mágicos com cuidado e documente"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4, seções sobre interceptadores e destrutores (PDF p. 147-159)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Use métodos mágicos com cuidado e documente

## Regra

Só use `__get`, `__set`, `__call`, `__callStatic` e `__destruct` quando houver ganho claro, e documente na classe o que eles fazem.

## Por quê

- O livro avisa: métodos mágicos são arbitrários e inesperados, quebram as regras e têm custos escondidos.
- Classes que dependem de interceptadores devem dizer isso com clareza, porque editores avançados que apontam métodos ou propriedades ausentes podem se confundir.
- No exemplo do autor, um `__destruct()` grava o objeto no banco quando ele é destruído. Um desenvolvedor que não vê esse método testa a classe com dados de brincadeira, e eles vão parar no banco. A moral do livro é não confiar em mágica.

## Quando não vale

- `__construct`, `__toString` (útil em logs e relatórios de erro) e `__clone` (necessário para cópia profunda) são previsíveis e não entram nesta regra.
- Em delegação feita de propósito, como num Decorator, `__call` é aceitável se estiver documentado.

## Como verificar

Procure `function __get`, `__set`, `__call` e `__destruct` nas classes. Cada ocorrência deve ter um comentário no topo da classe explicando o que acontece (por exemplo, `@method` e `@property` em PHPDoc), e um `__destruct` não deve gravar dados.

## Notas do Claude

Dois detalhes do mesmo capítulo: o `__clone()` roda **na cópia** e não no original, e a cópia padrão é rasa (propriedades que são objetos continuam apontando para o mesmo objeto, e é preciso cloná-las dentro de `__clone()`). Desde o PHP 8, uma classe com `__toString()` implementa `Stringable` automaticamente. Detalhes em métodos mágicos e constantes mágicas do PHP.

## Conexões

- [[regra-nao-crie-propriedades-dinamicas]] — as propriedades via métodos mágicos são o caso aceitável de acesso dinâmico
- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[metodos-magicos-e-constantes-magicas-do-php]] — é a nota de referência dos métodos mágicos que a regra restringe
- [[padrao-decorator]] — `__call` é aceitável na delegação documentada do Decorator
- [[regra-encapsule-propriedades-como-privadas]] — interceptar propriedades com métodos mágicos pode furar o encapsulamento
