---
titulo: "Padrão Strangler (substituir um sistema legado aos poucos)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Strangler (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Strangler (substituir um sistema legado aos poucos)

## Definição

Padrão arquitetural para trocar um sistema legado sem jogá-lo fora de uma vez. Em vez de substituir tudo por um sistema novo que nunca atendeu uma requisição real, cobre-se o legado com uma camada fina de código moderno e substitui-se aos poucos, por cenário ou funcionalidade. Exemplo do livro: trocar primeiro a camada de visão ou de rotas por algo moderno (ainda com o legado gerando os dados) e depois partes inteiras, como o checkout de uma loja, deixando por último as páginas menos importantes. Provavelmente sobrarão restos do legado. A fonte citada pelo livro é o artigo de Martin Fowler sobre a "strangler fig application".

## Por que importa

Preserva a estabilidade já testada do legado e reduz o risco da migração.

## Como se relaciona

Veja dívida técnica, padrão MVC, padrão Facade e padrão Adapter (as camadas finas sobre o legado).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-facade]] — esta nota cita a ideia de «Padrão Facade» na seção sobre como se relaciona
- [[divida-tecnica]] — é a estratégia para pagar a dívida de um sistema legado
- [[padrao-mvc-modelo-visao-controlador]] — a visão e as rotas são o primeiro trecho a trocar
- [[padroes-de-projeto]] — padrão arquitetural
