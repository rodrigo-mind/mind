---
titulo: "Efeitos sonoros com Audio e WebAudio"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.9 (PDF p. 524-526)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Efeitos sonoros com Audio e WebAudio

## Definição

- **`<audio>` e `<video>`:** elementos com API própria: `play()`, `pause()`, `volume`, `playbackRate` e `currentTime` (pular para um ponto). Também disparam eventos próprios, como `playing`, `waiting` e `volumechange`. O livro não os detalha.
- **Construtor `Audio()`:** cria um elemento de áudio sem colocá-lo na página (`new Audio("clique.mp3")`) e o toca com `play()`. Para sons que se sobrepõem, como cliques rápidos, toque uma cópia a cada vez (`som.cloneNode().play()`). As cópias fora do documento são liberadas da memória quando terminam.
- **WebAudio:** sintetiza sons ligando objetos `AudioNode` (fontes, transformações, destino) numa rede, como cabos de um sintetizador. Exige noções de música eletrônica e processamento de sinal, e o livro só mostra um exemplo.

## Por que importa

Dá retorno sonoro numa interface (aviso de pedido novo num painel, por exemplo) sem biblioteca.

## Como se relaciona

Os eventos de mídia seguem o modelo de eventos no navegador.

## Notas do Claude

Inferência minha: os navegadores costumam bloquear som que não venha de um gesto do usuário. Toque o som dentro de um tratador de clique e trate a promessa devolvida por `play()`, que pode ser rejeitada.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[eventos-no-navegador]] — os eventos de mídia (`playing`, `volumechange`) seguem o modelo de eventos
- [[regra-carregue-scripts-com-defer-ou-async]] — o som tocado por um tratador de clique depende de o script já estar carregado
- [[audio-e-video-em-html5]] — os elementos de áudio e vídeo têm a API detalhada na nota de efeitos sonoros
