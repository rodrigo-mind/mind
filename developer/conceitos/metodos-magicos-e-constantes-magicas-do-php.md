---
titulo: "Métodos mágicos e constantes mágicas do PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seções 11.3.10 e 11.4.2 a 11.4.4 (PDF p. 492-498 e 506-510)"
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 4 (PDF p. 147-164)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Métodos mágicos e constantes mágicas do PHP

## Definição

- **`__call($nome, $parametros)`:** captura as chamadas de métodos **não definidos** (todos eles; para tratar um só, é preciso comparar o nome).
- **`__get($nome)` e `__set($nome, $valor)`:** capturam a leitura e a gravação de propriedades inexistentes ou inacessíveis. Criar propriedades dinamicamente está obsoleto (deprecated) desde o PHP 8.2; para permitir, a classe precisa do atributo `#[\AllowDynamicProperties]`, porque o código com propriedades dinâmicas é mais difícil de entender.
- **`__toString()`:** devolve o texto quando o objeto é convertido em string (`echo $objeto`).
- **`__construct`, `__destruct`, `__sleep`, `__wakeup`:** ver fundamentos de classes e serialização de objetos.
- **`spl_autoload_register(função)`:** registra uma função chamada quando se usa uma classe ainda não carregada (o uso típico é incluir o arquivo da classe). Substitui o antigo `__autoload()`, removido no PHP 8.
- **Constantes mágicas:** `__METHOD__` (classe e método atuais), `__FUNCTION__`, `__CLASS__`, `__FILE__`, `__LINE__`; seu valor depende do contexto.

## Por que importa

Permitem interceptar acessos, converter objetos em texto e carregar classes sob demanda; usados com excesso tornam o código opaco.

## Como se relaciona

O autoload completo está em carregamento automático em PHP; ver também fundamentos de classes e objetos em PHP.


## Notas do Claude

- Zandstra (cap. 4) acrescenta: o operador `??` chama `isset()` implicitamente, o que aciona `__isset()`; `__clone()` roda na cópia, e a cópia padrão é rasa; uma classe com `__toString()` implementa `Stringable` (PHP 8). O autor pede cuidado com a "mágica" (ver a regra use métodos mágicos com cuidado e documente).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[fundamentos-de-classes-e-objetos-em-php]] — esta nota cita a ideia de «Fundamentos de classes e objetos em PHP» na seção sobre como se relaciona
- [[carregamento-automatico-em-php]] — spl_autoload_register é o autoload tratado ali
- [[serializacao-de-objetos-em-php]] — __sleep e __wakeup fazem parte da serialização
- [[regra-use-metodos-magicos-com-cuidado-e-documente]] — a regra orienta o uso dos métodos mágicos apresentados aqui
