---
titulo: "Controlador de página (Page Controller)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seção Page Controller (PDF p. 485-490)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Controlador de página (Page Controller)

## Definição

Padrão em que o controle fica associado a uma visão ou a um conjunto de visões, no caso mais simples dentro da própria página: um bloco PHP no topo trata a requisição e chama a lógica, e o HTML abaixo mostra o resultado. Se há erro, a página inclui outra (por exemplo, `error.php`) e termina com `exit()`, ou redireciona. O controle e a visão convivem no arquivo, mas rigidamente separados. Para sistemas maiores, o livro propõe uma classe base de controlador de página.

## Por que importa

É mais leve e exige pouco projeto antecipado do que o controlador frontal, ao custo de flexibilidade depois. O livro o associa a épocas em que o custo de um controlador frontal parecia exagerado para projetos pequenos. Com microframeworks maduros, o autor diz que o padrão é menos usado hoje, e sugere ir direto a roteamento, injeção de dependência e modelos desde o começo.

## Como se relaciona

Alternativa ao controlador frontal. A visão em si segue as regras de visão com modelo e auxiliar de visão.

## Notas do Claude

Confiança média: li a apresentação e o exemplo mais simples; a classe base do controlador de página não foi lida.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[front-controller-em-php]] — esta nota cita a ideia de «Controlador frontal» na seção sobre como se relaciona
- [[visao-com-modelo-e-auxiliar-de-visao]] — esta nota cita a ideia de «Visão com modelo» na seção sobre como se relaciona
- [[padrao-mvc-modelo-visao-controlador]] — «Padrão MVC» cita esta nota ao explicar suas relações
- [[padrao-command]] — «Padrão Command» cita esta nota ao explicar suas relações
