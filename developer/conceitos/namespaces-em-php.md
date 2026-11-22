---
titulo: "Namespaces em PHP (espaços de nomes)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 5, seção PHP and Packages (PDF p. 175-186)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Namespaces em PHP

## Definição

Um namespace (espaço de nomes) é um "balde" onde se colocam classes, funções e constantes, que podem ser usados sem qualificação dentro dele; de fora, é preciso importá-lo ou referenciá-lo. Surgiram no PHP 5.3, para resolver dois problemas: a colisão de nomes (duas classes com o mesmo nome fazem o PHP parar com erro fatal) e o antigo remédio de prefixar o nome da classe com o caminho do pacote e sublinhados (`XML_RPC_Server`), que deixava os nomes enormes.

## Regras e sintaxe

- A palavra `namespace` deve ser a primeira instrução do arquivo. Níveis aninhados se separam por barra invertida: `popp\ch05\util`. O autor sugere começar por um identificador da organização (o autor inverte o domínio, como em Java) ou do projeto, e depois o pacote.
- Dentro do namespace, o nome sem qualificação (`Debug::helloWorld()`) resolve nele. De fora, um nome relativo procura abaixo do namespace atual, e por isso falha; a barra inicial (`\popp\ch05\util\Debug`) começa pela raiz.
- `use` importa e dá apelido a um namespace ou a uma classe: `use popp\ch05\util\Debug;`. Se já existe uma classe de mesmo nome, o PHP dá erro fatal; resolve-se com apelido explícito: `use ...\Debug as CoreDebug;`.
- Para acessar uma classe da raiz global (como `Exception`) de dentro de um namespace, ponha uma barra antes do nome: `\Exception`.
- A constante `__NAMESPACE__` mostra o namespace atual.
- Dá para declarar vários namespaces no mesmo arquivo (com chaves), mas os padrões oficiais de código do PHP desencorajam; a boa prática é um namespace por arquivo. Não se pode misturar as duas sintaxes no mesmo arquivo.
- `Classe::class` devolve o nome totalmente qualificado (desde o PHP 5.5); desde o PHP 8, `$objeto::class` também.

## Por que importa

Evita colisões entre o código do projeto e as bibliotecas e substitui os nomes longos com sublinhados. Mesmo com namespaces, organize as classes no sistema de arquivos, com as pastas espelhando o namespace.

## Como se relaciona

Namespaces e carregamento automático andam juntos: o padrão PSR-4 (ver gerenciar dependências com o Composer) associa um namespace raiz a uma pasta. Ver também carregamento automático em PHP.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[carregamento-automatico-em-php]] — «Carregamento automático de classes em PHP» cita esta nota ao explicar suas relações
- [[gerenciar-dependencias-com-composer]] — esta nota cita a ideia de «Gerenciar dependências com o Composer» na seção sobre como se relaciona
