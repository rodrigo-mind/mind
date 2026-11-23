---
titulo: "Áudio e vídeo em HTML5 (video, audio, source e track)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 34 (PDF p. 855-878)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Áudio e vídeo em HTML5

## Definição

O HTML5 toca áudio e vídeo no navegador sem plug-ins.

**Atributos de `<video>`:**

- `controls`: sem ele, o navegador não mostra os controles;
- `autoplay`: começa a tocar assim que puder;
- `loop` e `muted`;
- `width` e `height`;
- `poster`: imagem mostrada no lugar do vídeo até o usuário dar play;
- `preload`: `none`, `metadata` (só o suficiente para mostrar o primeiro quadro e a duração) ou `auto`. É uma preferência, que o navegador pode ignorar. Para economizar banda, combine `preload="none"` com `poster`.

**Formatos:** cada navegador suporta formatos diferentes. Por isso, use vários `<source src="..." type="...">` dentro do `<video>`, e o navegador escolhe o primeiro que conseguir tocar. `<track>` acrescenta legendas.

**`<audio>`:** tem os mesmos atributos de reprodução.

**Por script:** `play()`, `pause()`, `currentTime`, `volume` e eventos de mídia (ver efeitos sonoros com Audio e WebAudio).

## Por que importa

Vídeo institucional ou de produto no site do cliente, sem depender de plataforma externa.

## Como se relaciona

Imagens e outros conteúdos incorporados estão em imagens e mapas de imagem em HTML e em iframe, object, embed, progress e meter em HTML5. A API por JavaScript está em efeitos sonoros com Audio e WebAudio.

## Notas do Claude

- Confiança média: li a introdução e os atributos; as tabelas de formatos por navegador (de 2012) estão defasadas e não foram copiadas.
- Hoje, MP4 (H.264) toca em todos os navegadores atuais, e os navegadores só permitem `autoplay` com `muted` (conhecimento meu, a conferir).
- Vídeos pesados consomem a banda da hospedagem compartilhada. Para vídeos longos, um serviço externo costuma ser melhor (inferência minha).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[efeitos-sonoros-com-audio-e-webaudio]] — a API por JavaScript dos elementos de mídia está ali
- [[iframe-object-embed-progress-e-meter-em-html5]] — são outros conteúdos incorporados do HTML5
- [[imagens-e-mapas-de-imagem-em-html]] — é a contraparte para imagens, com o mesmo cuidado de carregamento
- [[otimizacao-para-buscas-verticais-imagem-video-produtos-e-noticias]] — a otimização de vídeo parte de como o vídeo é incorporado à página
