---
titulo: "Responsabilidade, coesão e ortogonalidade no projeto orientado a objetos"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 6, seções Defining Code Design e Choosing Your Classes (PDF p. 229-246)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Responsabilidade, coesão e ortogonalidade

## Definição

O livro compara duas versões de uma ferramenta que lê e grava parâmetros em arquivos de texto e XML.

- **Procedural:** funções `readParams` e `writeParams` testam a extensão do arquivo cada uma por conta própria. O código de controle assume a decisão sobre o formato, duas vezes; um novo formato exige mexer nas duas funções, mantendo-as em sincronia.
- **Orientada a objetos:** uma classe abstrata `ParamHandler`, com subclasses para texto e XML, e um método estático que testa a extensão uma só vez e devolve a subclasse certa. O código cliente só conhece o tipo abstrato e os métodos `read()` e `write()`.

Daí, quatro ideias:

- **Responsabilidade:** o objeto, e não o código cliente, assume o detalhe da implementação.
- **Coesão:** o grau em que procedimentos próximos se relacionam. As classes de parâmetros reúnem o trabalho com XML num só contexto (alta coesão); o código procedural espalha-o em funções.
- **Acoplamento forte:** partes que exigem mudanças em cascata, como os dois testes de extensão.
- **Ortogonalidade** (do livro *The Pragmatic Programmer*): componentes com responsabilidades bem definidas e independentes do resto. Promove reutilização, torna as mudanças localizadas e reduz o alcance de bugs.

O livro avisa que não há nada automático: dá para enfiar todo o exemplo procedural numa classe mal pensada.

## Por que importa

A presença de classes não garante projeto orientado a objetos. O que importa é a distribuição de responsabilidades.

## Como se relaciona

É a base para acoplamento e desacoplamento, para composição em vez de herança e para a regra de definir a responsabilidade da classe em poucas palavras.

## Notas do Claude

Observação do livro: pôr o método estático de criação na classe pai é cômodo, mas limita o tipo aos filhos conhecidos. Os capítulos sobre criação de objetos tratam disso (ver padrões de criação de objetos).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[acoplamento-e-desacoplamento]] — esta nota cita a ideia de «Acoplamento e desacoplamento» na seção sobre como se relaciona
- [[regra-defina-a-responsabilidade-da-classe-em-25-palavras]] — a regra dá o critério prático de responsabilidade
- [[principios-solid]] — a responsabilidade única do SOLID é a mesma ideia de coesão
- [[regra-encapsule-propriedades-como-privadas]] — o encapsulamento sustenta a coesão da classe
