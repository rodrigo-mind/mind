---
titulo: "Padrão Composite (composto)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 10, seção The Composite Pattern (PDF p. 353-370)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Composite

## Definição

Agrega objetos semelhantes de modo que **um objeto individual e uma coleção deles sejam indistinguíveis para o cliente**. Exemplo do livro: em um jogo de estratégia, uma unidade (`Archer`) e um exército (`Army`, que contém unidades e outros exércitos) têm o mesmo tipo `Unit` e o mesmo método `bombardStrength()`; o exército o calcula percorrendo os filhos. Sem o padrão, cada novo agrupamento (exército, transportador de tropas) exigiria alterar todos os métodos (ataque, defesa, movimento) para tratar listas.

- **Estrutura:** uma só hierarquia, com duas responsabilidades: as operações comuns (a que o cliente chama) e a gestão de filhos (`addUnit`, `removeUnit`). As classes que contêm outras são os **compostos**; as que não podem conter, as **folhas**.
- **Onde pôr `add` e `remove`:** no tipo base (a versão clássica), as folhas ficam com métodos que lançam exceção ("o contrato mente"); a alternativa é separar um tipo `CompositeUnit` com a gestão de filhos, e o cliente consulta um método como `getComposite()` (que devolve `null` por padrão e o próprio composto em `CompositeUnit`) antes de adicionar. Troca-se transparência por segurança. Ao verificar duplicatas, use `in_array()` com o terceiro argumento verdadeiro (comparação estrita de referência).
- **Benefícios:** flexibilidade (novos tipos sem mudar o contexto), simplicidade para o cliente, alcance implícito (mover um exército altera toda a subárvore) e explícito (árvores são fáceis de percorrer; ver o padrão Visitor).
- **Custos:** a simplicidade custa segurança de tipos (impedir que cavalaria embarque em um transportador exige verificação manual; use um método de **capacidade** como `canBoardVehicle()`, e não `instanceof`: componentes devem conhecer capacidades, não tipos); chamadas em cascata podem ser caras (considere guardar valores calculados, com cuidado para não ficarem velhos, o que pode exigir referências para o pai); funciona melhor quando os componentes são intercambiáveis; e **não combina bem com banco relacional** (a estrutura em árvore se alcança por cascata de referências), mas combina bem com XML, JSON e bancos NoSQL.

## Por que importa

Modela invoices com itens, listas de tarefas com subtarefas e árvores de páginas e seções.

## Como se relaciona

Veja padrão Decorator e padrão Visitor (que percorre o composto), composição em vez de herança e padrões de projeto.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-interpreter-e-mini-linguagens]] — «Padrão Interpreter e mini-linguagens» cita esta nota ao explicar suas relações
- [[padrao-decorator]] — «Padrão Decorator» cita esta nota ao explicar suas relações
- [[padroes-de-projeto]] — esta nota cita a ideia de «Padrões de projeto» na seção sobre como se relaciona
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[padrao-visitor]] — esta nota cita a ideia de «Padrão Visitor» na seção sobre como se relaciona
- [[regra-componentes-devem-expor-capacidades-nao-tipos]] — «Componentes devem expor capacidades, não tipos» cita esta nota ao explicar suas relações
- [[padrao-null-object]] — «Padrão Null Object» cita esta nota ao explicar suas relações
- [[mapeador-de-dados-data-mapper]] — o composto é difícil de gravar em banco relacional
