---
titulo: "Tipos do elemento input em HTML5"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Adam Freeman, The Definitive Guide to HTML5, cap. 13 (PDF p. 305-344)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tipos do elemento input em HTML5

## Definição

O `input` se configura pelo atributo `type`, com 23 valores no HTML5 e cerca de 30 atributos, dos quais muitos só valem para certos tipos. O padrão (`type` omitido ou `text`) é uma caixa de texto de uma linha.

| Quero... | Use |
|---|---|
| Texto livre | `text`, com `size`, `maxlength`, `value` (valor inicial) e `placeholder` (dica) |
| Sugerir valores | elemento `datalist` e atributo `list` no `input` |
| Campo só para ler ou desabilitado | `readonly` e `disabled` |
| Ocultar o que se digita | `password` |
| Botões | `submit`, `reset` e `button` |
| Número | `number` (com `min`, `max`, `step`) |
| Faixa de valores | `range` |
| Verdadeiro ou falso | `checkbox` |
| Poucas opções fixas | `radio` |
| E-mail, telefone, URL | `email`, `tel`, `url` |
| Data e hora | `datetime`, `datetime-local`, `date`, `month`, `time`, `week` |
| Cor | `color` |
| Busca | `search` |
| Campo não exibido | `hidden` |
| Botão de imagem que envia | `image` |
| Enviar arquivo | `file`, com `enctype="multipart/form-data"` no formulário |

## Cuidados do livro

- **`readonly` com cautela:** o dado é enviado, mas não há dica visual de que o campo não é editável; o navegador apenas ignora as teclas, o que confunde.
- **`hidden`** só serve para dados escondidos por conveniência ou usabilidade, e não por serem sensíveis ou afetarem a segurança: o usuário os vê no HTML e o valor segue em texto claro. Dados sensíveis devem ficar no servidor, associados à requisição por identificador de sessão (em geral, um cookie).
- **`tel`** é o tipo com menos suporte; `email` e `url` dependem do navegador. Várias dessas validações são detalhadas no capítulo seguinte do livro.
- **Upload:** só funciona quando o formulário usa `enctype="multipart/form-data"`.

## Como se relaciona

Parte da estrutura de formulários em HTML5. A validação nativa usa atributos como `required`, `min`, `max` e `pattern`. Para o tratamento no servidor de uploads, ver upload seguro em PHP.

## Notas do Claude

Confiança média: li a tabela-resumo e os trechos de cautela; o detalhe dos atributos de cada tipo e o comportamento de cada navegador não foram lidos por inteiro. O livro é de 2011: tipos como `datetime` foram removidos de navegadores depois; confira a documentação atual.

## Conexões

- [[mapa-the-definitive-guide-to-html5]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[estrutura-de-formularios-html5]] — esta nota cita a ideia de «Estrutura de formulários em HTML5» na seção sobre como se relaciona
- [[outros-elementos-de-formulario-html5]] — os outros elementos completam os campos de entrada
- [[validacao-nativa-de-formularios-html5]] — os tipos email, url e number validam parte do formato por si mesmos
- [[regra-upload-seguro-em-php]] — o tipo file exige multipart/form-data, e o servidor deve tratar o upload com cuidado
- [[regra-nunca-confie-na-entrada-do-usuario]] — o campo oculto e o readonly podem ser forjados no envio
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
