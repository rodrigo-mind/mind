---
titulo: "Unidades relativas em CSS: em, rem e valores computados"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 2, seções 2.1 a 2.3 (PDF p. 65-81; impressa 35-51)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Unidades relativas em CSS: em, rem e valores computados

## Definição

Uma unidade **absoluta** (como `px`) sempre significa o mesmo; uma **relativa** muda conforme fatores externos. O CSS liga estilos e conteúdo só na hora da renderização (late binding), e o usuário pode redimensionar a janela ou trocar o tamanho da fonte; por isso as regras precisam valer em qualquer contexto, de um telefone de 4 polegadas a um monitor de 30. O pixel CSS não é o pixel físico do monitor (telas de alta resolução, por exemplo); 96 px equivalem a cerca de uma polegada.

- **`em`:** relativo ao tamanho da fonte **do próprio elemento**. Em `padding`, `width`, `border-radius` e semelhantes, escala junto se a fonte mudar. O navegador converte tudo para um valor absoluto, o **valor computado** (1,5 em com fonte de 16 px dá 24 px).
- **`em` em `font-size`:** como uma fonte não pode ser 1,2 vezes ela mesma, o `em` na propriedade `font-size` é relativo ao tamanho **herdado**. Num elemento com `font-size` e `padding` ambos em `1.2em`, o navegador calcula a fonte primeiro, e o `padding` usa o resultado: o mesmo valor declarado produz valores computados diferentes.
- **Problema da fonte que encolhe:** `em` aninhado em `font-size` se acumula. Listas aninhadas com `0.8em` ficam com 12,8 px, 10,24 px, 8,19 px... (o inverso, com valores acima de 1, cresce sem parar). A saída com `em` é uma regra extra (`ul ul { font-size: 1em }`), que é um conserto por sobreposição.
- **`rem` ("root em"):** relativo ao `font-size` do elemento raiz (`:root`, que tem a especificidade de uma classe). Vale o mesmo em qualquer ponto do documento, então listas aninhadas mantêm o tamanho. É um meio-termo entre o pixel e o `em`.
- **Conversão:** `em` desejado = tamanho em pixels desejado ÷ tamanho herdado (10 px sobre 12 px herdados = 0,8333 em). O padrão da maioria dos navegadores é 16 px (a palavra-chave `medium`).
- Zero não precisa de unidade em comprimentos e porcentagens (mas sim em ângulos e tempos).

## Por que importa

Com tudo em unidades relativas, mudar o `font-size` da raiz (por exemplo, por consulta de mídia) redimensiona a página toda, e o usuário que configura o tamanho padrão da fonte no navegador é respeitado (tamanhos em pixels ignoram essa configuração). Para o autor, vale a pena treinar a pensar em valores "difusos" e usar `em` primeiro, em vez de ficar convertendo pixels.

## Como se relaciona

As regras de uso estão em regra de fonte base e unidades relativas; as unidades de tela, em unidades de viewport. A herança de tamanhos segue herança no CSS.

## Notas do Claude

O livro cita como exemplo de componente que escala com `em`: define-se a fonte do componente (`1rem`) e todo o resto em `em`, e uma variante "grande" muda só o `font-size` (exemplo do livro: o painel).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-defina-a-fonte-base-na-raiz-e-use-unidades-relativas]] — a regra tira o uso prático dos conceitos
- [[heranca-no-css]] — o em de font-size depende do tamanho herdado
- [[unidades-de-viewport-em-css]] — são os dois grupos de unidades relativas
- [[controlar-css-por-javascript]] — o estilo computado converte unidades relativas em pixels
