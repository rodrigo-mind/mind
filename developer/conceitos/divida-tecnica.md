---
titulo: "Dívida técnica (technical debt) e código limpo"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Clean code overview"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Dívida técnica e código limpo

## Definição

Código que funciona pode falhar em outras medidas: facilidade de ler, de entender, de testar, cobertura de testes e facilidade de refatorar ou mudar. Quando essas medidas vão mal, o livro diz que o código tem muita dívida técnica: atalhos tomados para entregar rápido que, depois, custam mais para manter, como uma dívida com juros.

## Por que importa

A metáfora da dívida é fácil de explicar a clientes e donos de negócio. Com o tempo, o custo de manter código com muita dívida pode superar bastante o de código equivalente e bem escrito. Padrões de projeto (design patterns) são estratégias já provadas para cenários recorrentes e fáceis de outros desenvolvedores reconhecerem.

## Como se relaciona

Os princípios SOLID são um dos caminhos mais citados para reduzir a dívida. O uso de tipos estritos (regra strict types) também ajuda a ler e testar o código.

## Notas do Claude

O livro cita siglas de código limpo e brinca que usar siglas é um antipadrão; trate-as como guias, e não como regras absolutas.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-strict-types-em-todo-arquivo-php]] — esta nota cita a ideia de «Declare strict_types e tipos de parâmetro e retorno em todo arquivo PHP» na seção sobre como se relaciona
- [[principios-solid]] — os princípios são um caminho para reduzir a dívida técnica
- [[padrao-mvc-modelo-visao-controlador]] — a mistura de PHP, HTML e CSS em um arquivo cria dívida técnica
- [[depurar-php-com-var-dump-e-xdebug]] — código de depuração esquecido é uma forma de dívida
- [[regra-nao-resolva-um-problema-complexo-em-uma-consulta-so]] — consultas intrincadas viram dívida técnica
- [[biblioteca-de-padroes-e-fluxo-css-primeiro]] — evita o CSS só de acréscimos
- [[o-que-os-padroes-de-projeto-oferecem-e-seus-limites]] — excesso de abstração também gera dívida
- [[nomes-claros-e-linguagem-ubiqua-no-codigo]] — código difícil de ler é uma fonte de dívida técnica
- [[complexidade-ciclomatica]] — métodos complexos aumentam a dívida técnica
- [[padrao-strangler]] — é a estratégia para pagar a dívida de um sistema legado
- [[sintomas-de-um-projeto-php-que-degringola]] — a história do projeto que degringola é um caso de dívida técnica
