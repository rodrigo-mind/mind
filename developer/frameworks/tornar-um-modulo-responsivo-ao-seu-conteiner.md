---
titulo: "Tornar um módulo responsivo ao seu contêiner (container queries)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 10, seções 10.1 a 10.3 (PDF p. 299-312; impressa 269-282)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tornar um módulo responsivo ao seu contêiner

## Para que serve

Fazer um módulo (por exemplo, um cartão de mídia com imagem e texto) se adaptar à **largura do espaço que o contém**, e não à janela. Com `@media`, um módulo em uma barra lateral estreita continua achando que cabe (a janela é larga); as consultas de contêiner resolvem sem código extra para cada contexto.

## Quando usar e quando não usar

Em módulos reutilizáveis, quase sempre melhor que `@media` (para o autor). `@media` continua servindo à estrutura geral da página. Suportadas em todos os navegadores principais desde o início de 2023; confira os dados atuais.

## O que perguntar ao usuário antes

- Onde o módulo pode aparecer (coluna principal, barra lateral, dentro de outro módulo)?
- Os contêineres têm largura definida?

## Passos

1. **Defina o contêiner:** `container-type: inline-size` e, de preferência, um nome (`container-name: layout`), ou o atalho `container: layout / inline-size`. O nome é obrigatório no atalho; sem nome, a consulta usa o primeiro contêiner acima.
2. **Consulte:** `@container layout (min-width: 450px) { ... }` (ou `(width >= 450px)`, ou `not (...)`); dentro dela, estilize **descendentes** do contêiner (o próprio contêiner não pode ser estilizado por sua consulta).
3. **Tipos de contêiner:** `inline-size` (só a largura; o que se usa quase sempre), `size` (largura e altura; exige altura definida de fora, senão vale zero) e `normal` (não é contêiner).
4. **Largura conhecida:** itens de flexbox precisam de `flex-basis` ou `flex-grow`, senão o contêiner tem largura zero.
5. **Nomes:** a consulta procura o contêiner mais próximo com o nome; um contêiner pode ter vários nomes; use nomes comuns (`layout`) para a maioria e nomes especiais só quando preciso.
6. **Estratégia:** faça contêiner o elemento que recebe outros módulos (o corpo do módulo de mídia) e as regiões de layout.
7. **Unidades relativas ao contêiner:** `cqw`, `cqh`, `cqi`, `cqb`, `cqmin`, `cqmax` (1% da largura, da altura, do eixo inline, do block, do menor e do maior), úteis em `clamp()` para fontes e imagens (por exemplo, fonte de `3.5cqi` entre 1 e 1,8 rem). Não exigem `@container`, só o contêiner.

## Saída esperada

Módulos que mudam de layout de acordo com o espaço disponível, em qualquer lugar da página.

## Erros comuns

- Tentar estilizar o próprio contêiner dentro da consulta.
- Usar `container-type: size` sem altura definida.
- Esquecer de dar largura ao contêiner que é item de flexbox.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```css
.l-pagina { container: layout / inline-size; }
@container layout (width >= 450px) {
  .midia { display: flex; gap: 1em; }
}
```

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[consultas-de-estilo-de-conteiner]] — «Consultas de estilo de contêiner» cita esta nota ao explicar suas relações
- [[design-responsivo-mobile-first]] — complementa as consultas de mídia
- [[flexbox]] — o contêiner que é item de flexbox precisa de largura definida
- [[unidades-de-viewport-em-css]] — as unidades cq são o equivalente relativo ao contêiner
- [[fonte-fluida-com-calc-e-clamp]] — as unidades cqi também usam clamp
- [[regra-prefira-consultas-de-conteiner-as-de-midia-nos-modulos]] — o framework mostra como aplicar
- [[css-modular-modulos-variantes-e-bem]] — os módulos usam consultas de contêiner
