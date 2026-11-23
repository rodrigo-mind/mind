---
titulo: "Eventos no navegador (event handling)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 15, seção 15.2 (PDF p. 444-454)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Eventos no navegador

## Definição

Os programas JavaScript do navegador seguem um modelo assíncrono dirigido por eventos: o navegador gera um evento quando algo acontece (o documento termina de carregar, o usuário clica ou aperta uma tecla) e chama as funções registradas. Os termos do livro:

- **Tipo do evento:** a string que diz o que ocorreu (`mousemove`, `keydown`, `load`).
- **Alvo do evento:** o objeto em que ocorreu (`Window`, `Document`, `Element`, ou um `Worker`).
- **Tratador (handler ou listener):** a função que responde, registrada junto ao navegador com tipo e alvo.
- **Objeto do evento:** recebido pelo tratador, com `type`, `target` e detalhes próprios do tipo (coordenadas do mouse, tecla).
- **Propagação:** em eventos de elementos HTML, o evento sobe pela árvore do documento (bubbling): é disparado no elemento, depois nos que o contêm, até o documento. Isso permite registrar um só tratador em um contêiner. Um tratador pode interromper a propagação. A captura (capturing) permite a contêineres interceptar o evento antes do alvo.
- **Ação padrão:** alguns eventos têm uma ação padrão (seguir um link ao clicar), que um tratador pode cancelar pelo método do objeto do evento.

## Categorias

Eventos dependentes de dispositivo (`mousedown`, `touchstart`, `keydown`), independentes (`click`, `input`, `pointerdown`), de interface (`focus`, `change`, `submit`) e de mudança de estado (`load`, `DOMContentLoaded`).

## Como se relaciona

O registro com `addEventListener()` aparece em programação assíncrona com callbacks e eventos. Como registrar tratadores está em registrar tratadores de eventos com addEventListener; fases, delegação e cancelamento estão em propagação e cancelamento de eventos; eventos próprios estão em disparar eventos personalizados com CustomEvent. Na seção 15.15.6, o livro lista outros eventos úteis: `online` e `offline` na janela, `visibilitychange` no documento (troca de aba, com `document.visibilityState`) e os de arrastar e soltar (`dragstart`, `dragover`, `drop`), necessários para receber arquivos arrastados da área de trabalho. A segurança do navegador tem sua nota (ver modelo de segurança do navegador).

## Notas do Claude

A seção 15.2 foi lida por inteiro; os detalhes de registro, propagação e eventos personalizados ficaram nas notas próprias, para não repetir.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[assincronia-com-callbacks-e-eventos]] — os eventos do navegador são a forma de assincronia por callbacks
- [[modelo-de-seguranca-da-web-no-navegador]] — o modelo de segurança também trata de XSS em tratadores injetados
- [[selecao-de-elementos-no-dom]] — «Selecionar elementos do documento» cita esta nota ao explicar suas relações
- [[funcoes-de-seta-e-o-valor-de-this]] — «Funções de seta e o valor de this» cita esta nota ao explicar suas relações
- [[regra-carregue-scripts-com-defer-ou-async]] — o script precisa que o DOM esteja pronto para registrar eventos
- [[controlar-css-por-javascript]] — «Controlar CSS por JavaScript: classes, estilos em linha e estilos computados» cita esta nota ao explicar suas relações
- [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]] — hashchange e popstate são eventos de janela
- [[construir-modal-e-menu-suspenso-com-posicionamento]] — o JavaScript do modal responde a eventos de clique
- [[padrao-observer]] — o modelo de eventos é um Observer
- [[server-sent-events-com-eventsource]] — as mensagens chegam como eventos do navegador
- [[efeitos-sonoros-com-audio-e-webaudio]] — os elementos de áudio e vídeo disparam eventos próprios nesse modelo
- [[propagacao-e-cancelamento-de-eventos]] — as fases e o cancelamento estão detalhados em nota própria
- [[regra-nao-defina-tratadores-de-evento-em-atributos-html]] — a nota de eventos apresenta o modelo que a regra pede para usar
- [[disparar-eventos-personalizados-com-customevent]] — eventos próprios usam o mesmo modelo
- [[registrar-tratadores-de-eventos-com-addeventlistener]] — o registro prático dos tratadores está neste framework
- [[arrastar-e-soltar-com-a-api-nativa-do-html5]] — os eventos de arrastar fazem parte do modelo de eventos
- [[criar-transicoes-em-css]] — o `transitionend` é um dos eventos do navegador
