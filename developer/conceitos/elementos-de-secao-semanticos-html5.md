---
titulo: "Elementos de seção semânticos do HTML5"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 10 (PDF p. 215-247)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Elementos de seção semânticos do HTML5

## Definição

O HTML5 acrescentou elementos que dão estrutura e significado às partes da página (a maioria é novidade; vale o juízo e a coerência para usá-los):

- **`h1` a `h6`:** títulos hierárquicos que formam o esboço (outline) do documento. Raramente se passa de dois ou três níveis. Pular níveis confunde o usuário, que espera a hierarquia.
- **`hgroup`:** agrupa títulos para que um subtítulo não apareça como seção no esboço; só o primeiro título do grupo conta.
- **`section`:** seção temática, do tipo que entraria no sumário; título opcional.
- **`article`:** conteúdo autocontido, que poderia circular sozinho (notícia, post, comentário); pode aninhar.
- **`aside`:** conteúdo apenas tangencial, como um quadro lateral.
- **`nav`:** bloco com as principais ligações de navegação (para outras páginas ou partes da mesma); nem todo link precisa estar em um `nav`.
- **`header` e `footer`:** cabeçalho e rodapé; filhos diretos de `body` valem para o documento todo, dentro de uma seção valem para ela. O `header` do documento não é o `head`.
- **`address`:** contato do documento (filho de `body`) ou do `article` (descendente dele); não serve para endereços de clientes no conteúdo.
- **`details` e `summary`:** seção que o usuário expande; `open` a deixa aberta ao carregar.

## Por que importa

Substituem uma sopa de `div` por estrutura que ferramentas, buscadores e leitores de tela entendem.

## Como se relaciona

Estende a estrutura básica de um documento HTML5; os links de `nav` seguem links e URLs relativas em HTML.

## Notas do Claude

Segundo o livro, em 2011 o suporte era desigual: Chrome e Firefox mudavam o estilo de títulos dentro de `section`, e Opera e Safari não derivavam a hierarquia. Hoje, por inferência minha (a conferir), o algoritmo de esboço implícito não é implementado pelos navegadores, e o `hgroup` foi redefinido; então use `h1` a `h6` explícitos e coerentes, e `section`, `article`, `nav`, `aside`, `header`, `footer` e `main` pelo significado.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[estrutura-basica-de-um-documento-html5]] — esta nota cita a ideia de «Estrutura básica de um documento HTML5» na seção sobre como se relaciona
- [[links-e-urls-relativas-em-html]] — esta nota cita a ideia de «Links e URLs relativas em HTML» na seção sobre como se relaciona
- [[escolher-o-elemento-html-de-texto-pelo-significado]] — ambos escolhem elementos pelo significado
- [[layout-em-grade-css-grid]] — o layout da página em grade se apoia nessas regiões
- [[flexbox]] — o layout da página em flexbox se apoia nessas regiões
- [[modelo-de-caixa-do-css]] — a caixa de cada seção semântica segue o mesmo modelo
- [[construir-modal-e-menu-suspenso-com-posicionamento]] — o elemento dialog é a alternativa nativa de modal
- [[contraste-visual-como-ferramenta-de-design]] — a hierarquia de importância reflete a estrutura da página
- [[listas-e-figuras-em-html]] — «Listas e figuras em HTML» cita esta nota ao explicar suas relações
- [[agrupar-conteudo-em-html]] — «Agrupar conteúdo em HTML: p, div, pre, blockquote e hr» cita esta nota ao explicar suas relações
- [[regra-escolha-o-elemento-html-mais-especifico-e-seja-consistente]] — «Escolha o elemento HTML mais específico e use-o com consistência» cita esta nota ao explicar suas relações
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[The-Art-of-SEO-Mastering-Search-Engine-Optimization-(Eric-Enge-Stephan-Spencer) (pdf)]] — o livro trata da estrutura de página que ajuda o buscador a entender o conteúdo
- [[arquitetura-de-site-amigavel-a-buscadores]] — navegação e seções bem marcadas ajudam a expressar a estrutura da página
