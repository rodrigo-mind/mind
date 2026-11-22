---
titulo: "Consultas de estilo de contêiner (style queries)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 10, seção 10.4 (PDF p. 312-316; impressa 282-286)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Consultas de estilo de contêiner (style queries)

## Definição

Além da largura, um módulo pode responder a **valores de propriedades personalizadas** do contêiner: `@container style(--tema: dark) { ... }`. Não é preciso definir um contêiner explícito, porque não há contenção de tamanho; vale o valor herdado da propriedade. Exemplo do livro: um cartão de corrida que vira horizontal quando o ancestral define `--sidebar: true`, desacoplando o módulo do seletor do contexto (em vez de `.sidebar .cartao`).

**Suporte limitado:** no momento do livro (meados de 2024), só Chrome e Edge (desde março de 2023); Firefox e Safari não; é considerado experimental e pode mudar. Use só como melhoria progressiva.

## Por que importa

Permite variações de contexto sem acoplar o módulo ao lugar da página.

## Como se relaciona

Estende tornar um módulo responsivo ao seu contêiner e propriedades personalizadas do CSS.

## Notas do Claude

Confiança média: li a definição, o exemplo e o aviso de suporte, mas não os parágrafos finais sobre as vantagens sobre outras abordagens.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[propriedades-personalizadas-do-css]] — esta nota cita a ideia de «Propriedades personalizadas do CSS» na seção sobre como se relaciona
- [[tornar-um-modulo-responsivo-ao-seu-conteiner]] — esta nota cita a ideia de «Tornar um módulo responsivo ao seu contêiner» na seção sobre como se relaciona
- [[organizar-cores-com-propriedades-personalizadas]] — o modo escuro pode usar consultas de estilo
