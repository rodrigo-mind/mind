---
titulo: "Carregue scripts externos com defer ou async"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 7, seção Using the Scripting Elements (PDF p. 115-148)"
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 26 (PDF p. 640-665)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Carregue scripts externos com defer ou async

## Regra

Em `<script src>`, use `defer` quando o script precisa do HTML já processado e da ordem de execução, e `async` quando é independente (estatísticas, por exemplo). Sem nenhum dos dois, o navegador para tudo para baixar e executar o script.

## Por quê

Por padrão, o navegador interrompe o processamento do HTML ao achar um `script`, baixa e executa o arquivo, e só então continua. Um script que procura um elemento da página que ainda não foi lido não o encontra, e o efeito se perde. Soluções do livro: colocar o script no fim do documento, ou (HTML5) usar `defer`, que adia a execução até o documento ser processado. O `async` executa o script assim que carregado, enquanto o resto do HTML continua, o que melhora o desempenho, mas **não garante a ordem**: não serve a scripts que dependem de outros.

## Quando não vale

`defer` e `async` só funcionam com `src` (script externo). Script em linha (inline) executa na hora.

## Como verificar

Em cada `script src` do projeto, confira se tem `defer` ou `async` (ou se está no fim do `body`) e se nenhum `async` depende de outro script. Sempre feche com `</script>`: uma tag autofechada faz o navegador ignorar o elemento.

## Notas do Claude

Módulos (`type="module"`) já se comportam como `defer` (ver usar módulos JavaScript no navegador). O elemento `noscript` mostra conteúdo alternativo a quem não tem JavaScript.

- Do cap. 26 do mesmo livro: `document.readyState` vai de `loading` para `interactive` e depois `complete`, e o evento `readystatechange` avisa cada mudança. Serve para rodar código quando o documento estiver pronto.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[usar-modulos-javascript-no-navegador]] — módulos se comportam como defer por padrão
- [[eventos-no-navegador]] — o script precisa que o DOM esteja pronto para registrar eventos
- [[selecao-de-elementos-no-dom]] — um script só acha elementos que o navegador já leu
- [[playbook-pagina-responsiva-em-css]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[efeitos-sonoros-com-audio-e-webaudio]] — o script que toca som precisa estar carregado antes do gesto do usuário
