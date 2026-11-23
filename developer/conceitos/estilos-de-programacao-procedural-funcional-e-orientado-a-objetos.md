---
titulo: "Estilos de programação em PHP (procedural, funcional e orientado a objetos)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 1, seção What is OOP? (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Estilos de programação em PHP

## Definição

- **Procedural:** uma lista longa de instruções, lida de cima para baixo, com muito trabalho no escopo global e chamadas a funções globais. Em geral há um arquivo `.php` público por tipo de página, e vários scripts ficam acessíveis na pasta pública.
  - Vantagem: é rápido de escrever, como um fluxo de pensamento.
  - Desvantagens: difícil reaproveitar trechos, muitas variáveis globais (depuração difícil) e só dá para testar o sistema inteiro, de ponta a ponta.
  - O livro diz que serve para scripts pequenos (até umas 200 linhas), mas que a maioria dos desenvolvedores PHP já não o considera boa ideia para projetos completos. O WordPress é a exceção famosa.
- **Funcional:** constrói o código com **funções puras**, que dão sempre o mesmo resultado para a mesma entrada e não mexem em nada de fora. São fáceis de entender e de testar e não dependem de outro código. Os autores nunca viram um projeto PHP puramente funcional, mas o estilo aparece dentro de código OO e procedural, por meio de callables, closures, funções anônimas, funções de seta e `__invoke`.
- **Orientado a objetos (OO):** o programa inteiro é feito de objetos. O código no escopo global é mínimo e só inicializa a aplicação. No exemplo do Symfony, um único `index.php` público instancia o núcleo, que cuida de tudo. É o caminho que o PHP moderno seguiu, e todos os frameworks modernos usam MVC com um controlador frontal.

## Por que importa

Ajuda a decidir a estrutura de um sistema: um script avulso pode ser procedural, mas um sistema que vai crescer pede classes, um ponto de entrada único e testes por partes.

## Como se relaciona

O ponto de entrada único está em front controller em PHP e padrão MVC. As funções anônimas estão em callbacks, funções anônimas e closures em PHP. A organização das classes por pasta está em namespaces em PHP e carregamento automático em PHP (PSR-4, que o livro recomenda seguir).

## Notas do Claude

- Para a stack do projeto (PHP puro na Hostinger), um meio-termo viável: páginas com pouca lógica, que chamam classes com PDO, validação e regras de negócio. Assim dá para testar as classes e migrar aos poucos para um `index.php` único (inferência minha).
- O livro recomenda ler a documentação oficial, mas evitar os comentários dos leitores, muitos antigos e fora de contexto.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[front-controller-em-php]] — o ponto de entrada único é a marca do estilo orientado a objetos descrito
- [[padrao-mvc-modelo-visao-controlador]] — os frameworks modernos seguem MVC com controlador frontal
- [[fundamentos-de-classes-e-objetos-em-php]] — o estilo OO se apoia nos fundamentos de classes e objetos
- [[callbacks-funcoes-anonimas-e-closures-em-php]] — o estilo funcional aparece em PHP por callables, closures e funções de seta
- [[carregamento-automatico-em-php]] — a organização OO das classes por pasta segue o carregamento automático PSR-4
- [[php-e-javascript-ordem-de-execucao-e-troca-de-dados]] — o estilo procedural mistura PHP e HTML numa página, tema da ordem de execução
