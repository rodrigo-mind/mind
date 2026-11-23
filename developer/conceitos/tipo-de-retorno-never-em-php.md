---
titulo: "Tipo de retorno never em PHP 8.1"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 12, seção Never return type (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Tipo de retorno never em PHP 8.1

## Definição

`never` marca uma função ou método que **nunca retorna** porque interrompe a execução: lança uma exceção, chama `exit` ou `die` (um redirecionamento HTTP que encerra o script) ou fica em laço contínuo (um daemon de servidor). Exemplos do livro: `throwException()`, `httpRedirect()` e um método de laço.

- É um **tipo de fundo** (bottom type): não há tipo mais específico, então um método com `never` não pode ser sobrescrito com outro tipo de retorno (regras de covariância).
- **Never é never:** o método não pode ter nenhum `return` (daria `TypeError`, fatal se não capturado), nem execução condicional que só às vezes encerra, nem `yield`. Essa rigidez dá certeza a desenvolvedores, IDEs e ferramentas de análise estática.
- Só serve como **tipo de retorno isolado**, como `void`: não vale para parâmetros nem em tipos união ou interseção.

## Por que importa

Documenta e faz cumprir que o fluxo termina ali, e o analisador sabe que o código seguinte é inalcançável.

## Como se relaciona

Veja null, void e propriedades não inicializadas em PHP, tipos de objeto e herança de tipos, e o tratamento de erros e exceções.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — esta nota cita a ideia de «Null, void e propriedades não inicializadas em PHP» na seção sobre como se relaciona
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — never é o tipo de fundo na covariância
- [[declaracoes-de-tipo-em-php-uniao-anulavel-mixed-e-dnf]] — `never` é um dos tipos de retorno listados na visão geral das declarações de tipo
- [[regra-nao-use-die-ou-exit-para-tratar-erros]] — `never` é o caso em que encerrar com exit é legítimo
