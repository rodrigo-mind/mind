---
titulo: "Programação assíncrona com callbacks e eventos em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 13, seção 13.1 (PDF p. 359-364)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Programação assíncrona com callbacks e eventos

## Definição

Programas reais são, em grande parte, assíncronos: param de calcular para esperar dados ou um evento. No navegador, os programas esperam o usuário clicar ou tocar; em servidores JavaScript, esperam requisições da rede. O livro nota que, apesar disso, nenhum recurso do núcleo da linguagem é assíncrono em si: as fontes de assincronia vêm do navegador e do Node.

No nível mais básico, a assincronia se faz com **callbacks**: uma função que você escreve e passa a outra, que a chama quando uma condição ocorre ou um evento acontece. Formas:

- **Temporizadores:** `setTimeout(funcao, milissegundos)` chama a função uma vez e esquece dela; `setInterval()` a chama repetidamente.
- **Eventos:** o navegador chama os tratadores (event handlers ou listeners) registrados com `addEventListener("click", funcao)`. O tratador recebe um objeto de evento com detalhes. Também se pode atribuir uma função a uma propriedade como `onload`, mas `addEventListener()` é mais flexível, pois admite vários tratadores.
- **Rede:** o `XMLHttpRequest` (nome sem ligação especial com XML) trata a resposta por tratadores de `onload`, `onerror` e `ontimeout`; no Node, `fs.readFile()` recebe um callback com dois parâmetros. A convenção do livro: o callback recebe o erro como primeiro argumento (ou `null`) e o resultado como segundo.

Uma função assíncrona não pode devolver o resultado de forma síncrona: quem a chama passa um callback para receber o resultado ou o erro.

## Por que importa

Callbacks dentro de callbacks levam a código muito indentado e difícil de ler, e quebram o tratamento de exceções: uma exceção em código assíncrono não consegue voltar a quem iniciou a operação. As promessas e o `async`/`await` resolvem isso (ver promises e async e await).

## Como se relaciona

O `XMLHttpRequest` foi substituído, no navegador moderno, pela API `fetch()`, baseada em promessas.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[promises-em-javascript]] — as promessas resolvem os problemas dos callbacks aninhados e das exceções
- [[eventos-no-navegador]] — os eventos do navegador são a forma de assincronia por callbacks
- [[funcoes-de-seta-e-o-valor-de-this]] — callbacks perdem o this se não forem funções de seta
- [[ajax-e-websockets-com-php]] — os eventos do WebSocket seguem o modelo de callbacks
- [[websockets-no-navegador]] — os eventos open, message e close seguem o modelo de eventos
- [[workers-threads-no-navegador]] — a comunicação é por eventos assíncronos
- [[temporizadores-settimeout-e-setinterval]] — os temporizadores são callbacks assíncronos
- [[xmlhttprequest-estados-eventos-e-erros]] — o XMLHttpRequest é a assincronia por eventos na prática
