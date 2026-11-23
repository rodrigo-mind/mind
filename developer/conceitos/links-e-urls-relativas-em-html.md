---
titulo: "Links e URLs relativas em HTML"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 8, seção Creating Hyperlinks (PDF p. 149-188)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Links e URLs relativas em HTML

## Definição

O elemento `a` cria hiperlinks; o destino fica em `href`. Atributos úteis: `target`, `rel`, `type`, `hreflang` e `media`. O HTML5 permite que `a` envolva também conteúdo de fluxo (blocos), e um `a` sem `href` é só um marcador de lugar.

- **Externo:** URL completa (`http://`, `https://`, `ftp://`) ou `mailto:` para e-mail.
- **Relativo:** sem protocolo, é resolvido a partir da URL do documento atual (ou do `base`, ver estrutura básica de um documento HTML5).
- **Interno:** `#id` leva ao elemento com aquele `id` e rola a página até ele; se não achar, o navegador procura um `name` igual.
- **`target`:** onde abrir. `_self` (padrão) usa a janela ou aba atual; `_blank` abre nova; `_parent` e `_top` se referem a frames.
- **Link de imagem:** `a` envolvendo um `img`.

## Por que importa

É a base da navegação; a escolha entre URL relativa e completa afeta a portabilidade do site entre domínios e pastas (por exemplo, entre o ambiente local e a hospedagem).

## Como se relaciona

Ver estrutura básica de um documento HTML5 e elementos de seção semânticos (o `nav` agrupa os links de navegação principais).

## Notas do Claude

O livro não menciona o risco de `target="_blank"` dar acesso à página de origem; navegadores atuais tratam isso, e o atributo `rel="noopener"` costuma ser recomendado por precaução (inferência minha, a conferir).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[estrutura-basica-de-um-documento-html5]] — «Estrutura básica de um documento HTML5» cita esta nota ao explicar suas relações
- [[elementos-de-secao-semanticos-html5]] — «Elementos de seção semânticos do HTML5» cita esta nota ao explicar suas relações
- [[regra-escape-a-saida-contra-xss]] — URLs de link montadas a partir de dados do usuário precisam ser validadas e escapadas
- [[navegacao-e-conteudo-no-dom]] — a navegação por âncora e a leitura do DOM trabalham sobre os mesmos elementos
- [[url-location-e-historico-de-navegacao]] — «URL, location e histórico de navegação» cita esta nota ao explicar suas relações
- [[fontes-web-e-font-face]] — o link e o preconnect ficam no head do documento
- [[imagens-e-mapas-de-imagem-em-html]] — «Imagens e mapas de imagem em HTML» cita esta nota ao explicar suas relações
- [[classe-url-e-urlsearchparams-em-javascript]] — «Classe URL e URLSearchParams em JavaScript» cita esta nota ao explicar suas relações
- [[The-Art-of-SEO-Mastering-Search-Engine-Optimization-(Eric-Enge-Stephan-Spencer) (pdf)]] — o livro defende links e URLs claros e rastreáveis pelos robôs de busca
- [[arquitetura-de-site-amigavel-a-buscadores]] — a estrutura de links e URLs depende de como os links são escritos
- [[problemas-tecnicos-de-plataforma-que-prejudicam-o-seo]] — URLs limpas e links rastreáveis são parte do problema tratado aqui
