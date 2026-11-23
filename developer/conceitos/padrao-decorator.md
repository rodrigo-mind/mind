---
titulo: "Padrão Decorator (decorador)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 10, seção The Decorator Pattern (PDF p. 370-379)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão Decorator

## Definição

Usa **composição e delegação** para modificar o funcionamento de um componente em tempo de execução, em vez de embutir cada variação em uma hierarquia de herança. O decorador herda do mesmo tipo do componente, guarda uma referência a outro objeto desse tipo e, ao executar uma operação, chama a mesma operação no objeto guardado antes ou depois da sua ação. Assim se monta um **encadeamento (pipeline)**.

O problema que resolve: com herança, `Plains` com diamantes e `Plains` poluída exigem `PollutedDiamondPlains`, e o número de classes explode (mais com `Forest`). Com decoradores (`DiamondDecorator`, `PollutionDecorator`), combina-se qualquer coisa: `new PollutionDecorator(new DiamondDecorator(new Plains()))`, e o cliente só conhece o tipo `Tile`.

Exemplo clássico em aplicações web: antes de processar uma requisição, autenticar, registrar e estruturar os dados: `ProcessRequest` (abstrata), `MainProcess` (o componente), `DecorateProcess` (decorador abstrato) e decoradores `AuthenticateRequest`, `LogRequest`, `StructureRequest`, combináveis em qualquer ordem. É uma instância do padrão Interceptador de Filtros (Intercepting Filter), e a biblioteca de entrada e saída de Java (buffering, compressão) usa o mesmo conceito.

**Consequências:** composição e herança atuam ao mesmo tempo (o decorador herda a interface, mas só envolve outro objeto); mantenha a interface **enxuta**, porque os decoradores têm de delegar todos os métodos públicos; fazer um decorador sem o tipo comum (só pela interface) permite delegação automática com `__call`, mas perde a checagem de tipos.

## Por que importa

É o padrão por trás de camadas de middleware em frameworks (autenticação, registro, cache).

## Como se relaciona

Veja padrão Composite (estrutura parecida), composição em vez de herança e padrão Facade.

## Notas do Claude

A associação com o middleware dos frameworks atuais é inferência minha, pelo exemplo do pipeline de requisição.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padrao-facade]] — esta nota cita a ideia de «Padrão Facade» na seção sobre como se relaciona
- [[padrao-composite]] — esta nota cita a ideia de «Padrão Composite» na seção sobre como se relaciona
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[front-controller-em-php]] — o pipeline de requisição lembra os filtros do controlador frontal
- [[padrao-chain-of-responsibility]] — «Padrão Chain of Responsibility» cita esta nota ao explicar suas relações
- [[regra-use-metodos-magicos-com-cuidado-e-documente]] — o Decorator pode usar __call para delegar, de forma documentada
