---
titulo: "Padrões de projeto (design patterns)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 7 (PDF p. 259-269)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrões de projeto

## Definição

Um padrão de projeto descreve um problema que se repete, a solução testada e as consequências de usá-la, dentro de um contexto. Para o autor, é a "memória tribal" da área. Um catálogo de padrões não é um livro de receitas: o código não se copia, porque os detalhes dependem da linguagem, do tipo de aplicação, do tamanho do projeto e do problema. Em geral, os padrões vêm de baixo para cima, da prática, e quem os descreve diz que os descobre, não que os inventa.

Um padrão tem quatro partes: nome, problema, solução e consequências. O formato da "Gangue dos Quatro" (GoF, o livro *Design Patterns*, de 1995) acrescenta: intenção, motivação, aplicabilidade, estrutura e interação, implementação, código de exemplo, usos conhecidos (a "regra de três": o padrão se confirma em pelo menos três usos públicos) e padrões relacionados.

## Por que importa

- **Definem um problema:** reconhecer o problema é mais difícil do que aplicar a solução, e é a causa do abuso (soluções aplicadas onde o problema não existe).
- **Definem uma solução** com análise das consequências.
- **Independem de linguagem**, em geral, e ajudam a mudar de linguagem.
- **Criam vocabulário:** dizer "vou usar um Composite" substitui uma explicação longa em uma reunião.
- **São testados**, facilitam a colaboração (um padrão abre as portas para outros) e promovem bom projeto orientado a objetos.
- **Aparecem em frameworks populares** (Zend, Laravel, Symfony), então entendê-los ajuda a ler esses frameworks.

## Cuidado específico do PHP

Cada requisição inicia uma nova execução do script, e não há processo que continua rodando entre requisições. Por isso, padrões que exigem inicialização pesada, como o controlador frontal (Front Controller), merecem cuidado em PHP.

## Como se relaciona

Os princípios de projeto por trás dos padrões estão em composição em vez de herança e em acoplamento e desacoplamento. Os padrões de geração de objetos estão em padrões de criação de objetos.

## Notas do Claude

O livro cita um panorama de padrões clássicos em PHP no site refactoring.guru; é indicação do revisor técnico, não verificada.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padroes-de-criacao-de-objetos]] — esta nota cita a ideia de «Padrões de criação de objetos» na seção sobre como se relaciona
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[acoplamento-e-desacoplamento]] — esta nota cita a ideia de «Acoplamento e desacoplamento» na seção sobre como se relaciona
- [[principios-solid]] — os padrões aplicam princípios como os SOLID, e o livro de PHP moderno os trata
- [[padrao-mvc-modelo-visao-controlador]] — «Padrão MVC» cita esta nota ao explicar suas relações
- [[padrao-interpreter-e-mini-linguagens]] — «Padrão Interpreter e mini-linguagens» cita esta nota ao explicar suas relações
- [[padrao-composite]] — «Padrão Composite» cita esta nota ao explicar suas relações
- [[padrao-visitor]] — é um dos padrões do catálogo dos Quatro
- [[o-que-os-padroes-de-projeto-oferecem-e-seus-limites]] — «O que os padrões de projeto oferecem» cita esta nota ao explicar suas relações
- [[principios-de-projeto-orientado-a-objetos-resumo]] — «Princípios de projeto orientado a objetos: resumo do livro» cita esta nota ao explicar suas relações
- [[padrao-builder]] — mais um padrão de criação
- [[padrao-strangler]] — padrão arquitetural
