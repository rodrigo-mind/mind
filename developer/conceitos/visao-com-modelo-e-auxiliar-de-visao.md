---
titulo: "Visão com modelo (Template View) e auxiliar de visão (View Helper)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seção Template View and View Helper (PDF p. 494-497)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Visão com modelo (Template View) e auxiliar de visão (View Helper)

## Definição

A Template View é o que o PHP dá por padrão: HTML misturado com código. É uma bênção e uma maldição, porque convida a juntar lógica de aplicação e de exibição. Programar a visão em PHP é, em grande parte, questão de contenção: se algo não é estritamente exibição, trate o código com a maior desconfiança. Por isso muitos preferem um mecanismo de modelos como o Twig. O View Helper (Alur e outros) é uma classe auxiliar, específica de uma visão ou compartilhada, que faz as tarefas que exigem mais que um pouco de código, em geral formatação.

## Por que importa

Páginas com muito código são difíceis para quem trabalha com a apresentação, prendem à interface (não se troca a visão sem portar a lógica), são mais difíceis de testar, escondem riscos de segurança (consultas e tratamento de entrada espalhados entre tabelas e formulários) e duplicam código de página em página.

A solução é tratar a lógica fora e deixar as visões como receptoras passivas de dados. Chamadas de volta ao sistema a partir da visão devem ser mínimas: podem ter custos ocultos de desempenho ou efeitos colaterais. O auxiliar serve para formatação, e consultar o sistema cabe a uma ação do controlador.

## Como se relaciona

É a camada de visão da arquitetura em camadas; o controlador frontal usa um gerenciador de visão para invocar o modelo. A regra de escapar a saída (XSS) vale em todo modelo de visão.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[controlador-de-pagina-page-controller]] — «Controlador de página» cita esta nota ao explicar suas relações
- [[front-controller-em-php]] — esta nota cita a ideia de «Controlador frontal» na seção sobre como se relaciona
- [[arquitetura-em-camadas]] — a visão é uma das camadas
- [[regra-escape-a-saida-contra-xss]] — todo modelo de visão deve escapar a saída
- [[padrao-mvc-modelo-visao-controlador]] — «Padrão MVC» cita esta nota ao explicar suas relações
- [[renderizar-templates-em-php-puro-com-buffer-de-saida]] — ambos tratam da camada de visão; este usa buffer de saída em PHP puro
