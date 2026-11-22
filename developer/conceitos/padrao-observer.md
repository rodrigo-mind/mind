---
titulo: "Padrão Observer (observador)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 11, seção The Observer Pattern (PDF p. 406-417)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Observer

## Definição

Separa um **sujeito** (a classe central) dos **observadores**, que precisam ser avisados quando algo acontece. O problema do exemplo: uma classe `Login` que, a cada pedido do marketing (registrar IP), da segurança (avisar falhas) ou de parceiros (definir um cookie), ganha mais uma chamada e fica amarrada ao sistema; para reaproveitá-la em outro produto, seria preciso limpar linha a linha (o caminho do copiar e colar).

- **Mecanismo:** o sujeito implementa uma interface (`Observable`) com `attach()`, `detach()` e `notify()`, e guarda uma lista de observadores; os observadores (interface `Observer`, método `update()`) se registram. Ao ocorrer o evento, o sujeito chama `notify()`.
- **Que dados passar:** o observador consulta o sujeito (por exemplo, `getStatus()`), o que o prende ao tipo do sujeito; opções: especializar a interface (`ObservableLogin`), ou deixar cada observador **conferir o tipo** do sujeito e se registrar sozinho (uma classe-base `LoginObserver` com um método modelo `doUpdate()`); ou passar o estado no próprio `update()` (rápido, mas ruim se o estado é grande).
- **SPL:** o PHP traz `SplSubject`, `SplObserver` e `SplObjectStorage` (guarda os objetos, com `attach` e `detach`, e se percorre com `foreach`); o livro mostra o mesmo exemplo com eles.

## Por que importa

Dá ganchos (hooks) para eventos do sistema sem acoplar o sujeito aos comportamentos adicionais.

## Como se relaciona

Veja acoplamento e desacoplamento, padrão Strategy e padrão Command.

## Notas do Claude

O mesmo conceito, com outro nome, é o sistema de eventos (listeners) de frameworks e o `addEventListener` do JavaScript (ver eventos no navegador; inferência minha).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-visitor]] — «Padrão Visitor» cita esta nota ao explicar suas relações
- [[padrao-command]] — esta nota cita a ideia de «Padrão Command» na seção sobre como se relaciona
- [[acoplamento-e-desacoplamento]] — esta nota cita a ideia de «Acoplamento e desacoplamento» na seção sobre como se relaciona
- [[eventos-no-navegador]] — o modelo de eventos é um Observer
- [[padrao-chain-of-responsibility]] — «Padrão Chain of Responsibility» cita esta nota ao explicar suas relações
- [[spl-iteradores-e-classes-padrao-do-php]] — «SPL: iteradores e classes padrão do PHP» cita esta nota ao explicar suas relações
