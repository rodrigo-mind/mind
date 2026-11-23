---
titulo: "Tipos de posicionamento em CSS: fixed, absolute, relative e sticky"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 6, seções 6.1 a 6.3 e 6.5 (PDF p. 183-209; impressa 153-179)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tipos de posicionamento em CSS

## Definição

O valor inicial de `position` é `static` (sem posicionamento). Qualquer outro valor torna o elemento **posicionado**; os tipos `fixed` e `absolute` o **retiram do fluxo** do documento (os outros elementos o ignoram no cálculo do layout).

- **`fixed`:** relativo ao **viewport**; permanece no lugar mesmo com a rolagem. As propriedades de deslocamento (`top`, `right`, `bottom`, `left`, ou o atalho `inset`, e as lógicas `inset-block`, `inset-inline`...) definem a distância de cada borda; definir os quatro lados define, implicitamente, a largura e a altura (por exemplo, `inset: 0` preenche o viewport). Dá para definir só os lados necessários, com `width` ou `height`. Cuidado com conteúdo que passa por trás do elemento fixo (compense com margem).
- **`absolute`:** igual, mas relativo ao **ancestral posicionado mais próximo** (o bloco contêiner); se nenhum ancestral é posicionado, vale o bloco contêiner inicial (do tamanho do viewport, ancorado no topo da página). Serve para menus suspensos, dicas (tooltips) e caixas de informação.
- **`relative`:** o elemento fica no lugar original (e o espaço que ocupava é preservado); `top` e `left` apenas o deslocam, sem mover os outros. Não se usa `inset` para mudar o tamanho (`bottom` é ignorado se há `top`). Na prática, o uso mais comum é **estabelecer o bloco contêiner** de um filho absoluto.
- **`sticky`:** híbrido entre `relative` e `fixed`: rola normalmente até um ponto (definido por `top`, por exemplo) e então "trava" na tela; fica sempre **dentro do pai** (o pai precisa ser mais alto que o elemento) e volta a rolar quando o pai sai. Exemplo: menu lateral.
- **Pseudoelementos:** podem ser posicionados em relação ao elemento, que vira o bloco contêiner.

## Por que importa

É a base de modais, menus suspensos e dicas, mas retirar elementos do fluxo traz responsabilidades (não vazar para fora da tela, não cobrir conteúdo).

## Como se relaciona

Veja construir um modal e um menu suspenso, contextos de empilhamento e z-index e fluxo normal do documento.

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[contextos-de-empilhamento-e-z-index]] — esta nota cita a ideia de «Contextos de empilhamento e z-index» na seção sobre como se relaciona
- [[construir-modal-e-menu-suspenso-com-posicionamento]] — o framework aplica fixed, absolute e relative
- [[fluxo-normal-do-documento]] — fixed e absolute retiram o elemento do fluxo
- [[modelo-de-caixa-do-css]] — as propriedades inset e o bloco contêiner dependem da caixa
- [[geometria-e-rolagem-do-documento]] — absolute usa o bloco contêiner e as coordenadas de viewport
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[transformacoes-em-css]] — o transform move sem mexer no fluxo, ao contrário do posicionamento
