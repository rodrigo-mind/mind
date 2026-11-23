---
titulo: "Sempre informe alt e as dimensões das imagens"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 15, seção Embedding an Image (PDF p. 365-370)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Sempre informe alt e as dimensões das imagens

## Regra

Todo `img` deve ter `src`, `alt` e `width` e `height` reais da imagem.

## Por quê

- O `alt` é o conteúdo reserva quando a imagem não aparece (falha, formato não suportado, dispositivo sem imagens), e é o que as tecnologias assistivas leem.
- As imagens só carregam depois do HTML; sem `width` e `height`, o navegador não sabe o espaço a reservar e reposiciona o conteúdo quando ela chega, o que pode incomodar quem já começou a ler. Os atributos descrevem o tamanho do arquivo, não o que se deseja: não os use para redimensionar.

## Quando não vale

Imagens puramente decorativas costumam ter `alt` vazio (inferência minha; o livro não o trata no trecho lido).

## Como verificar

Procure `<img` sem `alt`, `width` ou `height`.

## Como se relaciona

Veja imagens e mapas de imagem em HTML.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[imagens-e-mapas-de-imagem-em-html]] — esta nota cita a ideia de «Imagens e mapas de imagem em HTML» na seção sobre como se relaciona
- [[regra-upload-seguro-em-php]] — o alt e as dimensões podem ser definidos no tratamento do upload
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[o-que-os-buscadores-leem-em-uma-pagina]] — o atributo alt é a principal pista textual que o buscador tem sobre uma imagem
- [[otimizar-os-elementos-de-uma-pagina-para-palavras-chave]] — o alt e o nome de arquivo das imagens fazem parte da otimização de página
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — regra de imagens do projeto de desenvolvimento
