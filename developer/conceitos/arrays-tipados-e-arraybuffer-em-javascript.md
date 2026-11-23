---
titulo: "Arrays tipados e ArrayBuffer em JavaScript"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.2 (PDF p. 285-344, capítulo 11)"
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 11, seção 11.2.5 (PDF p. 297-298)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Arrays tipados e `ArrayBuffer` em JavaScript

## Definição

Arrays tipados (ES6, vindos do WebGL) aproximam-se dos arrays de linguagens de baixo nível. Tecnicamente não são arrays (`Array.isArray` dá `false`), mas implementam os métodos de array. Diferenças: elementos **só numéricos**, de tipo e tamanho escolhidos (inteiros com e sem sinal e ponto flutuante, de 8 a 64 bits); **tamanho fixo** definido na criação; elementos iniciam em 0.

- **Onze construtores:** `Int8Array`, `Uint8Array`, `Uint8ClampedArray` (limita a 0 e 255 em vez de "dar a volta"; exigido pela API de pixels do `<canvas>`), `Int16Array`, `Uint16Array`, `Int32Array`, `Uint32Array`, `BigInt64Array`, `BigUint64Array`, `Float32Array` e `Float64Array` (o número comum). `BYTES_PER_ELEMENT` dá o tamanho em bytes.
- **Criar:** `new Uint8Array(1024)`; `Uint8ClampedArray.of(255, 255, 255, 0)`; `Tipo.from(iterável numérico)` (também copia mudando o tipo). Valores que não cabem são truncados **sem aviso** (`Uint8Array.of(1.23, 2.99, 45000)` dá `[1, 2, 200]`).
- **`ArrayBuffer`:** bloco opaco de memória (`new ArrayBuffer(1024*1024)`, `byteLength`); não se lê nem se grava diretamente, mas vários arrays tipados podem ser **visões** do mesmo buffer: `new Uint8Array(buffer, deslocamentoEmBytes, comprimentoEmElementos)` (o deslocamento deve ser múltiplo do tamanho do tipo). Todo array tipado tem um buffer, mesmo implícito (`.buffer`, `.byteOffset`, `.byteLength`; vale `length * BYTES_PER_ELEMENT === byteLength`).
- **Uso:** índices `[]` comuns; no exemplo do crivo de Eratóstenes, trocar `Array` por `Uint8Array` deu código mais de quatro vezes mais rápido e com oito vezes menos memória, nos testes do autor. Métodos que mudam o tamanho (`push`, `pop`, `shift`, `unshift`, `splice`) não existem; `sort`, `reverse`, `fill` existem; `map` e `slice` devolvem o mesmo tipo.
- **`DataView` e ordem dos bytes (endianness):** os arrays tipados usam a ordem de bytes da máquina (hoje quase sempre little-endian), mas protocolos de rede e formatos de arquivo costumam usar big-endian. Para dados externos, use só `Int8Array`/`Uint8Array` para ver bytes soltos e leia valores de vários bytes com `DataView` (`new DataView(buffer, deslocamento, tamanho)`): `getInt32(posicao, littleEndian)`, `setUint32(posicao, valor, littleEndian)` e os demais tipos. Sem o argumento, ou com `false`, vale big-endian.
- **Métodos próprios:** `set(origem, deslocamento)` copia elementos de um array (rápido entre arrays tipados); **`subarray()`** devolve uma **visão** que compartilha memória, ao contrário de `slice()`, que copia. Cuidado: indexar um `ArrayBuffer` com número (`buffer[0]`) cria uma propriedade comum e não acessa os bytes.

## Por que importa

Dados binários e desempenho em imagens, áudio e rede.

## Como se relaciona

Veja Web Workers (transferência de `ArrayBuffer`), postMessage e MessageChannel, WebSockets no navegador (mensagens binárias) e vetores e iteração em JavaScript.

## Notas do Claude

Seção 11.2 lida por inteiro, incluindo a 11.2.5 (`DataView`). Para a stack do projeto, o uso mais provável é ler um arquivo enviado pelo usuário no navegador (inferência minha).

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[websockets-no-navegador]] — esta nota cita a ideia de «WebSockets no navegador» na seção sobre como se relaciona
- [[workers-threads-no-navegador]] — ArrayBuffers podem ser transferidos a workers
- [[postmessage-messagechannel-e-mensagens-entre-janelas]] — transferência de ArrayBuffer sem cópia
- [[vetores-e-iteracao-em-javascript]] — comparação com vetores comuns
