---
titulo: "Organize os z-index e posicione o mínimo possível"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 6, seções 6.4.3 e final do capítulo (PDF p. 203-206; impressa 173-176)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Organize os z-index e posicione o mínimo possível

## Regra

Guarde todos os valores de `z-index` em propriedades personalizadas, em um só lugar e em incrementos de 10 ou 100; crie contextos de empilhamento apenas com motivo; e use posicionamento só quando precisar empilhar um elemento sobre outro, preferindo o fluxo do documento, o flexbox e a grade.

## Por quê

- Sem uma lista central, as folhas de estilo viram uma "guerra de z-index": cada desenvolvedor dá um valor absurdo (999.999) por medo de que o componente apareça atrás de outro, e ninguém sabe qual valor usar no próximo. Variáveis mostram a ordem de prioridade num relance, e os incrementos deixam espaço para valores no meio.
- Um contexto de empilhamento criado sem necessidade em um elemento grande esconde de onde vem o comportamento estranho. Elementos independentes, como modais, devem ficar no nível superior do DOM (antes do fechamento do `</body>`), para não ficarem presos em contextos externos.
- Quanto mais se posiciona, mais complicada e difícil de depurar fica a página; se há dezenas de elementos posicionados, repense. O fluxo do documento resolve muitos casos de borda sozinho.

## Quando não vale

Modais, menus suspensos, dicas e elementos fixos ou grudentos precisam, sim, de posicionamento.

## Como verificar

Procure valores de `z-index` literais acima de 100 e `z-index` espalhado sem variáveis; conte os elementos com `position: absolute` e `fixed`.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[contextos-de-empilhamento-e-z-index]] — a regra evita a guerra de z-index
- [[propriedades-personalizadas-do-css]] — os z-index ficam em variáveis
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
