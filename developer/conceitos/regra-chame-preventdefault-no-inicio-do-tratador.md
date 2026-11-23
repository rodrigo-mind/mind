---
titulo: "Chame preventDefault no início do tratador"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 33 (PDF p. 831-854)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Chame preventDefault no início do tratador

## Regra

Quando um tratador vai cancelar a ação padrão (enviar um formulário, seguir um link), chame `event.preventDefault()` na primeira linha, e não no fim.

## Por quê

Se o script der um erro não capturado antes de chegar ao `preventDefault()`, a execução para e o navegador faz a ação padrão: envia o formulário e troca de página. Isso acontece tão rápido que não dá para ler o erro no console. Chamando o cancelamento primeiro, a falha fica visível.

## Quando não vale

Quando o cancelamento depende de uma condição, como na validação: só cancela se o formulário for inválido. Aí a chamada precisa vir depois do teste. Mantenha o teste curto e antes de qualquer código que possa falhar (inferência minha).

## Como verificar

Nos tratadores de `submit` e de `click` em links e botões que fazem Ajax, `preventDefault()` deve ser a primeira instrução.

## Notas do Claude

Para depurar, também ajuda marcar "Preserve log" (manter o registro) no console do navegador, para o erro não sumir na troca de página (inferência minha, fora do livro).

## Conexões

- [[propagacao-e-cancelamento-de-eventos]] — a regra se apoia no que preventDefault cancela
- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[enviar-formulario-por-ajax-com-formdata]] — o passo 1 do envio por Ajax aplica esta regra
- [[registrar-tratadores-de-eventos-com-addeventlistener]] — preventDefault é parte do corpo do tratador
- [[xmlhttprequest-estados-eventos-e-erros]] — o erro que a regra evita ocorre no código que monta a requisição
