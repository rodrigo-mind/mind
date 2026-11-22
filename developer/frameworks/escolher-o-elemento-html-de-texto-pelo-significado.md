---
titulo: "Escolher o elemento HTML de texto pelo significado"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 8, seções Annotating Content, Citations, Language e Other Text Elements (PDF p. 149-188)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Escolher o elemento HTML de texto pelo significado

## Para que serve

Marcar trechos de texto com o elemento que descreve o que eles **são**, e não como aparecem. O autor conclui que se deve escolher o elemento pelo significado, nunca pelo estilo padrão, porque o CSS pode mudar a aparência de qualquer um, e marcar errado produz resultados estranhos para quem lê e para tecnologias assistivas.

## Quando usar e quando não usar

Use sempre que marcar texto. Para só aplicar classe ou estilo sem significado, use `span`.

## O que perguntar ao usuário antes

- O que esse trecho é: ênfase, importância, termo estrangeiro, correção, citação, definição, data?

## Passos

1. Procure o elemento pelo papel:

| O trecho é... | Elemento |
|---|---|
| destacado sem ênfase (palavra-chave, nome de produto) | `b` |
| com ênfase de fala (muda o sentido da frase) | `em` |
| de natureza diferente (termo estrangeiro ou técnico, pensamento) | `i` |
| importante | `strong` |
| incorreto ou desatualizado | `s` |
| letras miúdas (avisos, ressalvas) | `small` |
| sobrescrito ou subscrito | `sup`, `sub` |
| código, saída de programa, variável, entrada do usuário | `code`, `samp`, `var`, `kbd` |
| sigla, com a forma completa no `title` | `abbr` |
| termo sendo definido | `dfn` |
| citação curta de outra fonte (URL no atributo `cite`) | `q` |
| título de uma obra citada (livro, filme); não é nome de pessoa | `cite` |
| relevante em outro contexto (destaque) | `mark` |
| texto inserido ou removido (com `datetime` e `cite` opcionais) | `ins`, `del` |
| data ou hora (valor legível por máquina em `datetime`) | `time` |
| texto com direção de leitura diferente | `bdo` (com `dir`), `bdi` (isola texto de direção desconhecida) |
| anotação fonética em línguas asiáticas | `ruby`, `rt`, `rp` |

2. Quebras de linha: `br` só quando a quebra faz parte do conteúdo (versos, endereços), nunca para separar parágrafos; `wbr` sugere ao navegador onde pode quebrar uma palavra longa.
3. Se nenhum serve e só falta um gancho de estilo, use `span` com uma classe.

## Saída esperada

Texto marcado com semântica correta, estilizado depois por CSS.

## Erros comuns

- Usar `u` (sublinhado): parece link e confunde o usuário; evite.
- Usar `br` para criar parágrafos.
- Usar `cite` para nome de pessoa (no HTML5, é só para títulos de obras).
- Escolher `b` ou `i` só pela aparência quando o certo seria `strong` ou `em`.

## Notas do Claude

Capítulo lido inteiro; os elementos de entrada/saída de computador (`code`, `samp`, `var`, `kbd`) saíram truncados na extração e foram descritos pelo resumo do capítulo. O livro é de 2011: confira `pubdate` e outros atributos na documentação atual.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[elementos-de-secao-semanticos-html5]] — ambos escolhem elementos pelo significado
- [[heranca-no-css]] — a aparência padrão dos elementos é alterada por CSS
- [[estrutura-de-formularios-html5]] — o rótulo e os campos também são marcação semântica
- [[espacamento-de-texto-line-height-letter-spacing-e-text-transform]] — a caixa-alta pertence ao CSS e a semântica ao HTML
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — «Escolha o elemento HTML mais específico e use-o com consistência» cita esta nota ao explicar suas relações
