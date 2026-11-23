---
titulo: "Propriedades personalizadas do CSS (variáveis CSS)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 2, seção 2.6 (PDF p. 87-93; impressa 57-61)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Propriedades personalizadas do CSS (variáveis CSS)

## Definição

Declaram-se como qualquer propriedade, mas com nome iniciado por dois hifens (`--cor-marca: #0a64a4`), dentro de um bloco de declaração; usa-se com `var(--cor-marca)`. A função aceita um segundo parâmetro, o valor reserva (fallback), usado se a variável não existe. Se o resultado for inválido para a propriedade (uma cor em `padding`), a propriedade volta ao valor inicial.

- **Fonte única de verdade:** definir cores e fontes uma vez em `:root` (vale para a página toda) e reutilizar; mudar em um só lugar.
- **Cascata e herança:** diferente das variáveis de pré-processadores (Sass, Less), as propriedades personalizadas **cascateiam e herdam**, então podem ter valores diferentes em partes diferentes da página, em tempo de execução. Exemplo do livro: um painel que usa `--cor-texto` e `--cor-fundo`; um contêiner escuro redefine as duas, e o painel dentro dele fica escuro sem nenhuma classe nova.

## Por que importa

Dão temas, variantes de componentes e valores compartilhados (como a largura máxima do contêiner) sem repetição e sem JavaScript.

## Como se relaciona

Dependem de cascata do CSS e herança no CSS. A função `calc()` pode combinar variáveis (ver regra de números mágicos).

## Notas do Claude

Para o projeto (CSS puro, sem pré-processador), são a ferramenta natural de tema (inferência minha).

## Conexões

- [[mapa-css-in-depth]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[cascata-do-css]] — as variáveis cascateiam como qualquer propriedade
- [[heranca-no-css]] — as variáveis são herdadas pelos descendentes
- [[centralizar-um-bloco-na-horizontal]] — a largura do contêiner pode ficar numa variável
- [[regra-evite-numeros-magicos-no-css]] — calc com variáveis substitui o número mágico
- [[consultas-de-estilo-de-conteiner]] — «Consultas de estilo de contêiner» cita esta nota ao explicar suas relações
- [[regra-organize-os-z-index-e-posicione-o-minimo]] — os z-index ficam em variáveis
- [[organizacao-de-uma-folha-de-estilo-em-seis-camadas]] — a camada theme guarda as variáveis
- [[organizar-cores-com-propriedades-personalizadas]] — aplica as variáveis CSS às cores
- [[listas-e-figuras-em-html]] — os contadores de CSS são o outro recurso das listas personalizadas
- [[criar-transicoes-em-css]] — `@property` registra variáveis que passam a poder transicionar
