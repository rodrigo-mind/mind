---
titulo: "Enviar formulário por Ajax com FormData"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 33 (PDF p. 831-854)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Enviar formulário por Ajax com FormData

## Para que serve

Enviar um formulário ao servidor sem recarregar a página. No envio comum, o navegador mostra a resposta como página nova; com Ajax, o usuário continua na página enquanto o servidor processa.

## Quando usar e quando não usar

- **Use** em formulários de contato, pedidos, filtros e uploads com barra de progresso.
- Mantenha o formulário funcionando sem JavaScript sempre que possível (inferência minha, fora do livro).

## O que perguntar ao usuário antes

- Para qual URL (script PHP) o formulário vai, e com que método?
- O servidor devolve HTML, JSON ou XML?
- Há upload de arquivo? Precisa mostrar o progresso?

## Passos

1. No tratador do botão ou do `submit`, chame `event.preventDefault()` **logo no início** (ver a regra chame preventDefault no início do tratador).
2. Reúna os dados com `new FormData(form)`. Passando o elemento `<form>`, todos os campos são coletados. Também é possível criar um `FormData` vazio e incluir campos com `append(nome, valor)`, por exemplo para enviar só parte deles. Montar a string `nome=valor&...` à mão também funciona, mas dá mais trabalho.
3. Para **arquivos**, basta que o formulário tenha um `<input type="file">`: o `FormData` inclui o conteúdo do arquivo escolhido.
4. Para enviar **JSON**, converta um objeto com `JSON.stringify()` e envie a string.
5. Envie com `XMLHttpRequest`: `open("POST", url)` e depois `send(dados)`.
6. Para mostrar o **progresso do envio**, registre `progress` e `load` em `xhr.upload` (um `XMLHttpRequestUpload`) e alimente um `<progress>`. O navegador não informa progresso em envios pequenos: teste com um arquivo grande.
7. Trate a resposta conforme o formato:
   - HTML: insira com cuidado (ver a regra nunca insira entrada do usuário com innerHTML);
   - XML: use `responseXML` e os métodos do DOM;
   - JSON: use `JSON.parse(responseText)`.
   O livro recomenda JSON: é mais compacto que o XML e vira um objeto JavaScript direto.

## Saída esperada

O formulário é enviado em segundo plano, a resposta aparece na própria página e, se houver arquivo, o progresso aparece numa barra.

## Erros comuns

- Pôr o `preventDefault()` no fim do tratador: se o script falhar antes, o formulário é enviado do jeito normal e o erro some da tela antes de ser lido.
- Achar que a requisição deu certo só porque terminou. Confira o código HTTP (ver XMLHttpRequest: estados, eventos e erros).
- Testar o progresso do envio com arquivos pequenos e concluir que ele não funciona.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```js
const form = document.querySelector("#pedido");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  const xhr = new XMLHttpRequest();
  xhr.upload.addEventListener("progress", (ev) => {
    if (ev.lengthComputable) barra.value = ev.loaded / ev.total;
  });
  xhr.addEventListener("load", () => {
    if (xhr.status === 200) msg.textContent = JSON.parse(xhr.responseText).mensagem;
  });
  xhr.open("POST", "/pedido.php");
  xhr.send(new FormData(form));
});
```

## Notas do Claude

- O livro é de 2012: os avisos sobre Opera e Internet Explorer sem `FormData` estão defasados. Hoje, para requisições comuns, prefira `fetch` (ver usar a API fetch), que aceita `FormData` no `body`. O `XMLHttpRequest` continua útil para o **progresso de upload**, que o `fetch` não oferece de forma simples (inferência minha, a conferir na documentação atual).
- No PHP, um `FormData` chega em `$_POST` e `$_FILES`, como um formulário comum. Um corpo JSON não chega em `$_POST`: leia com `json_decode(file_get_contents('php://input'), true)` (inferência minha, fora do livro). Valide tudo no servidor (ver validar formulários em PHP e a regra de upload seguro em PHP).
- O servidor de exemplo do livro é em Node.js e o próprio autor avisa que não serve para produção.

## Conexões

- [[regra-chame-preventdefault-no-inicio-do-tratador]] — a regra é o primeiro passo do envio por Ajax
- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[usar-a-api-fetch]] — o fetch aceita FormData e é a opção atual
- [[xmlhttprequest-estados-eventos-e-erros]] — o envio usa XMLHttpRequest e seus eventos de progresso
- [[regra-upload-seguro-em-php]] — o PHP que recebe o arquivo deve validá-lo
- [[validar-formularios-em-php]] — o servidor valida tudo, mesmo no envio por Ajax
- [[regra-nunca-insira-entrada-do-usuario-com-innerhtml]] — a resposta em HTML deve ser inserida com cuidado
- [[arrastar-e-soltar-com-a-api-nativa-do-html5]] — o upload de arquivos soltos usa FormData
