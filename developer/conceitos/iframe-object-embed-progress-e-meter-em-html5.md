---
titulo: "iframe, object e embed em HTML5, progress e meter"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 15, seções Embedding Another HTML Document e Embedding Numeric Representations (PDF p. 377-389)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# iframe, object e embed em HTML5, progress e meter

## Definição

- **`iframe`:** embute outro documento HTML (`src`, `srcdoc` com HTML em linha, `name`, `width`, `height`). O `name` cria um contexto de navegação que links e formulários podem usar em `target`. Novos no HTML5: **`sandbox`** (sem valor, desativa scripts, formulários, plugins e links para outros contextos, e trata o conteúdo como de outra origem; valores liberam itens: `allow-forms`, `allow-scripts`, `allow-top-navigation`, `allow-same-origin`) e `seamless` (exibir como parte do documento); na época do livro, nenhum navegador principal os suportava.
- **`embed`** e **`object`** (com `param`): nasceram para plugins (o exemplo do livro embute um vídeo em Flash) e servem também para conteúdo nativo. `embed` usa `src`, `type`, `width` e `height`; `object` usa `data` e `type`, com `param` para os parâmetros, e permite **conteúdo reserva** dentro dele (mostrado quando o recurso falha; se não houver `type`, o navegador detecta a partir dos dados). O `object` pode embutir imagens, mapas de imagem e documentos HTML, mas o suporte é irregular; o livro recomenda os elementos mais específicos (`img`, `iframe`).
- **`progress`:** progresso de uma tarefa (`value` e `max`; sem `max`, a escala é de 0 a 1).
- **`meter`:** valor dentro de uma faixa (`min`, `max`, `low`, `high`, `optimum`); os navegadores só distinguem valores abaixo de `low` e acima de `high`.
- **Outros:** `audio`, `video`, `source`, `track` e `canvas` aparecem em capítulos posteriores.

## Por que importa

O `iframe` com `sandbox` é a defesa para conteúdo de terceiros embutido na página.

## Como se relaciona

Veja modelo de segurança da web no navegador e imagens e mapas de imagem em HTML.

## Notas do Claude

Plugins como o Flash não existem mais nos navegadores atuais (inferência minha, conhecimento geral); `sandbox` é amplamente suportado hoje e `seamless` nunca se firmou (a conferir).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[imagens-e-mapas-de-imagem-em-html]] — esta nota cita a ideia de «Imagens e mapas de imagem em HTML» na seção sobre como se relaciona
- [[modelo-de-seguranca-da-web-no-navegador]] — o sandbox restringe o conteúdo de terceiros
- [[validacao-nativa-de-formularios-html5]] — progress e meter aparecem em interfaces de formulário
- [[postmessage-messagechannel-e-mensagens-entre-janelas]] — o postMessage conversa com o conteúdo de iframes
