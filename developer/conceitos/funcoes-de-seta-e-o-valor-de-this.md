---
titulo: "Funções de seta e o valor de this"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 8, seções 8.1.3, 8.1.4 e 8.2.2 (PDF p. 199-238, seção indicada dentro do capítulo)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Funções de seta e o valor de this

## Definição

- **Função de seta:** sintaxe compacta com `=>`: `(a, b) => a + b`. Se o corpo é só um `return`, dispensa chaves e a palavra `return`. Não tem nome próprio e é uma expressão.
- **Diferença essencial:** a função de seta herda o `this` do ambiente em que foi definida, em vez de ter o seu. Também não tem `prototype`, então não serve como construtora.
- **`this` em funções comuns:** em uma invocação como método (`o.m()`), `this` é o objeto `o`. Uma função aninhada comum, chamada como função, **não** herda o `this` do método: ele é o objeto global (modo não estrito) ou `undefined` (modo estrito). O livro chama isso de falha da linguagem.
- **Soluções:** guardar `const self = this` no método e usá-lo na função aninhada; ou, em ES6, trocar a função aninhada por uma função de seta (as outras saídas, como `bind()`, não foram lidas).
- **Invocação condicional:** `f?.(x)` só chama `f` se não for `null` nem `undefined`.

## Por que importa

É a causa de um erro comum: usar `this` dentro de um `function` aninhado ou de um callback e receber `undefined`.

## Como se relaciona

Callbacks de eventos e de promessas são o caso típico (ver eventos no navegador e assincronia com callbacks e eventos).

## Notas do Claude

Confiança média: leitura dirigida do capítulo 8, sem as seções de `call`, `apply` e `bind`.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[parametros-opcionais-e-rest-em-javascript]] — «Parâmetros opcionais, padrão e rest em JavaScript» cita esta nota ao explicar suas relações
- [[eventos-no-navegador]] — esta nota cita a ideia de «Eventos no navegador» na seção sobre como se relaciona
- [[assincronia-com-callbacks-e-eventos]] — callbacks perdem o this se não forem funções de seta
- [[closures-em-javascript]] — ambos dependem do escopo léxico
- [[classes-e-prototipos-em-javascript]] — «Classes e protótipos em JavaScript» cita esta nota ao explicar suas relações
- [[modo-estrito-em-javascript]] — em modo estrito, this é undefined em chamadas simples
