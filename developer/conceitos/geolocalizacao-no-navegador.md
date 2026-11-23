---
titulo: "Geolocalização no navegador (Geolocation API)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 38 (PDF p. 955-965)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Geolocalização no navegador

## Definição

A API de geolocalização dá a posição do usuário, **com a permissão dele**: o navegador pergunta antes.

- `navigator.geolocation.getCurrentPosition(sucesso, erro, opcoes)` não devolve a posição na hora. Chama a função de sucesso quando a posição estiver disponível, com latitude, longitude e **precisão** em metros.
- `watchPosition()` acompanha as mudanças de posição, e `clearWatch()` para de acompanhar.
- A função de erro recebe o motivo: permissão negada, posição indisponível ou tempo esgotado.
- O meio de obter a posição não é definido pela especificação. Pode ser GPS ou a rede: Wi-Fi próximo ou endereço IP.
- A **precisão varia muito**: num teste do autor pela rede, um serviço errou por cerca de 48 km.

## Por que importa

Serve para "lojas perto de você", cálculo de frete por proximidade ou preencher a cidade. Sempre como sugestão, nunca como dado garantido.

## Como se relaciona

Está na lista de APIs do navegador para conhecer. O SEO local, que é outra forma de "perto de mim", está no assunto de tráfego (diretrizes do Perfil da Empresa no Google).

## Notas do Claude

- Confiança média: li a introdução, `getCurrentPosition` e o trecho sobre precisão.
- Hoje, os navegadores só liberam a geolocalização em HTTPS (conhecimento meu).
- Pela LGPD, a localização é dado pessoal: peça só quando for útil, explique o motivo e não guarde sem necessidade (inferência minha).

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[apis-do-navegador-para-conhecer]] — a lista cita a geolocalização entre as APIs de dispositivos móveis
- [[modelo-de-seguranca-da-web-no-navegador]] — o acesso depende da permissão do usuário e de HTTPS
