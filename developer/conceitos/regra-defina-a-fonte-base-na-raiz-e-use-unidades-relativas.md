---
titulo: "Defina a fonte base na raiz e use unidades relativas"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 2, seções 2.2.2, 2.3 e quadro de acessibilidade (PDF p. 73-78; impressa 43-48)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Defina a fonte base na raiz e use unidades relativas

## Regra

Estabeleça o tamanho da fonte padrão no elemento raiz (`:root`, em `rem`/`em` ou %) e, a partir daí, use `rem` para tamanhos de fonte, `px` para bordas e `em` ou `rem` para a maioria do resto (paddings, margens, raio de borda). Não reduza a raiz para 62,5% só para facilitar a conta.

## Por quê

- **Acessibilidade:** quem tem baixa visão muda o tamanho padrão da fonte no navegador, e isso só afeta fontes em unidades relativas ou porcentagem, não as em pixels.
- **Previsibilidade:** o `rem` evita o acúmulo do `em` na fonte; o `em` em `padding` e `margin` ainda escala quando a fonte do elemento muda; o pixel é bom para bordas finas.
- **O truque dos 62,5%** (10 px na raiz, 1,4 rem = 14 px) é um antipadrão: obriga a sobrescrever o tamanho em toda parte (10 px é pequeno demais para texto), multiplica os pontos de manutenção e mantém a cabeça pensando em pixels. Em vez disso, escreva o tamanho que quer na raiz: 14 px sobre 16 px herdados é `0.875`.

## Quando não vale

São preferências do autor, mudam entre projetos: ele diz que são ferramentas, e às vezes outra serve melhor (por exemplo, se o raio de borda não deve escalar, defina-o em `rem`). Com um designer, fale em pixels, mas converta uma vez e trabalhe relativo.

## Como verificar

Procure `font-size` em `px` e confira se não há `html { font-size: 62.5% }`; mude o tamanho padrão do navegador e veja se o texto acompanha.

## Notas do Claude

Combina com design responsivo mobile-first: com tudo relativo, um par de consultas de mídia no `:root` pode substituir dezenas de outras.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[unidades-relativas-em-css]] — a regra tira o uso prático dos conceitos
- [[design-responsivo-mobile-first]] — a fonte da raiz pode mudar por consulta de mídia e escalar a página
- [[fonte-fluida-com-calc-e-clamp]] — mantém o termo relativo por acessibilidade
- [[construir-modal-e-menu-suspenso-com-posicionamento]] — as dimensões do modal em unidades relativas
- [[espacamento-preciso-ao-implementar-um-design]] — a escolha entre em e px
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
