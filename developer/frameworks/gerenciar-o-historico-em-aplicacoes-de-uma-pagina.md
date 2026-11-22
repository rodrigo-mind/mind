---
titulo: "Gerenciar o histórico em aplicações de uma página"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.10.3 e quadro do clone estruturado (PDF p. 427-594, capítulo 15)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Gerenciar o histórico em aplicações de uma página

## Para que serve

Fazer o botão Voltar e Avançar funcionar, e os endereços serem compartilháveis, em aplicações que mostram novos estados sem carregar um documento novo.

## Quando usar e quando não usar

Use quando a interface muda de estado por JavaScript. Não é preciso em páginas comuns, em que cada link carrega um documento.

## O que perguntar ao usuário antes

- Que estados da aplicação devem poder ser voltados e marcados como favoritos?
- Dá para resumir cada estado em um texto curto ou em um objeto?

## Passos

Duas técnicas:

1. **Fragmento (`hashchange`)**, a mais simples:
   - codifique cada estado em um texto curto no `location.hash`;
   - ao interagir, **não desenhe o estado direto**: grave o texto no `hash`, o que gera uma entrada no histórico e dispara `hashchange`;
   - no tratador de `hashchange`, leia o `hash`, converta em estado e desenhe a tela. Voltar e Avançar disparam o mesmo evento.
2. **`history.pushState()` e `popstate`**, mais robusta:
   - ao entrar em novo estado, chame `history.pushState(objetoDeEstado, "", url)`: o 1º argumento guarda o estado necessário para restaurar a tela; o 2º (título) é ignorado pelos navegadores, passe `""`; o 3º é a URL mostrada (relativa à atual), que torna o estado favoritável;
   - ao carregar a aplicação, chame `history.replaceState()` com o estado inicial (ele **substitui** a entrada atual em vez de acrescentar);
   - no evento `popstate` (Voltar e Avançar), use `event.state` (uma cópia do objeto) para restaurar a tela;
   - quem abre um favorito não dispara `popstate`: restaure o estado lendo a URL.

## Saída esperada

Estados de aplicação navegáveis pelo histórico, com URLs que reabrem o estado.

## Erros comuns

- Desenhar o estado e esquecer de registrá-lo no histórico.
- Guardar em `pushState` instâncias de classes: o **clone estruturado** perde o protótipo (vira objeto comum), e não aceita funções nem elementos do DOM.
- Esperar `popstate` ao abrir um favorito.

## Notas do Claude

O clone estruturado serializa mais tipos que `JSON.stringify` (`Map`, `Set`, `Date`, expressões regulares, vetores tipados e referências circulares), mas não copia protótipo, getters e setters nem propriedades não enumeráveis (o livro usa o mesmo algoritmo em outras APIs do navegador). Um exemplo de jogo de adivinhação está no livro e não foi lido por inteiro.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[url-location-e-historico-de-navegacao]] — «URL, location e histórico de navegação» cita esta nota ao explicar suas relações
- [[eventos-no-navegador]] — hashchange e popstate são eventos de janela
- [[armazenamento-no-navegador]] — o clone estruturado também é usado em outras APIs de armazenamento
- [[front-controller-em-php]] — as rotas de uma página de aplicação lembram um controlador frontal no cliente
- [[indexeddb-banco-de-objetos-no-navegador]] — ambos usam o clone estruturado
