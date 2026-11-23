---
titulo: "Arrastar e soltar com a API nativa do HTML5 (drag and drop)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 37 (PDF p. 938-954)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Arrastar e soltar com a API nativa do HTML5

## Para que serve

Deixar o usuário arrastar elementos da página para uma área (reordenar itens, mover cartões) ou soltar arquivos da área de trabalho, sem bibliotecas como o jQuery.

## Quando usar e quando não usar

- **Use** para arrastar com o mouse, principalmente para soltar arquivos num campo de upload.
- Em telas de toque, a API nativa funciona mal (inferência minha). Ofereça sempre uma alternativa por clique ou teclado, como botões de subir e descer.

## O que perguntar ao usuário antes

- O que pode ser arrastado, e para onde?
- O que acontece ao soltar: mover o item, enviar o arquivo, salvar a nova ordem no servidor?

## Passos

1. Marque o que pode ser arrastado com `draggable="true"`. O autor recomenda declarar sempre, mesmo que o navegador já trate imagens e links como arrastáveis.
2. No elemento arrastado, ouça `dragstart` (o arrasto começou; por exemplo, guarde o id em `event.dataTransfer`), `drag` e `dragend` (por exemplo, para remover uma classe de destaque).
3. Na área de destino, ouça `dragenter` e `dragover` e chame `event.preventDefault()` nos dois. **Sem isso, o navegador não aceita o soltar** e mostra o cursor de proibido.
4. Ouça `drop` na área de destino, chame `preventDefault()` e leia os dados (`event.dataTransfer.getData(...)`, ou `event.dataTransfer.files` para arquivos da área de trabalho).
5. Dê retorno visual com classes CSS, em `dragenter` e `dragleave`.

## Saída esperada

Itens arrastáveis, uma área que aceita o soltar e a ação executada no `drop`.

## Erros comuns

- Esquecer o `preventDefault()` em `dragover`: a área nunca aceita o soltar.
- Não cancelar a ação padrão no `drop` de arquivos: o navegador abre o arquivo na aba.
- Confiar no tipo do arquivo informado pelo navegador: valide no servidor (ver a regra de upload seguro em PHP).

## Exemplo mínimo (inventado pelo Claude, não do livro)

```js
const area = document.querySelector("#area-upload");
area.addEventListener("dragover", (e) => e.preventDefault());
area.addEventListener("drop", (e) => {
  e.preventDefault();
  const dados = new FormData();
  for (const arq of e.dataTransfer.files) dados.append("fotos[]", arq);
  fetch("/upload.php", { method: "POST", body: dados });
});
```

## Notas do Claude

Confiança média: li a sequência de eventos e o exemplo de área de destino; a transferência de dados detalhada foi só folheada. O envio do `FormData` está em enviar formulário por Ajax com FormData e em usar a API fetch.

## Conexões

- [[atributos-globais-booleanos-e-data-em-html]] — o arrasto depende do atributo global `draggable`
- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[eventos-no-navegador]] — usa os eventos do ciclo de arrasto
- [[propagacao-e-cancelamento-de-eventos]] — `preventDefault` em dragover e drop decide se o soltar é aceito
- [[enviar-formulario-por-ajax-com-formdata]] — os arquivos soltos seguem num FormData
- [[regra-upload-seguro-em-php]] — o servidor deve validar os arquivos recebidos
