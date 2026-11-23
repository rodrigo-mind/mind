---
titulo: Mapa de The Art of Modern PHP 8
tipo: mapa-do-livro
origem: destilar
livro: The-Art-of-Modern-PHP-8-(Joseph-Edmonds-Lorna-Jane-Mitchell).epub
assunto: developer
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapa de The Art of Modern PHP 8

## Tese

Livro de 2021 sobre PHP moderno: programação orientada a objetos, o sistema de tipos do PHP 8, padrões e código limpo, injeção de dependência, Composer e as novidades do PHP 8.1. Os exemplos são em PHP puro, com `strict_types`.

## Como aproveitar

- Vale destilar: tipos e modo estrito, enums e readonly, padrões de código limpo, injeção de dependência e Composer.
- Ignorar: instruções de instalação e links para o repositório do livro.
- Limites: de 2021, até o PHP 8.1; recursos de versões mais novas não aparecem. O arquivo é EPUB e não tem páginas: a coluna Páginas traz "n/a" (a unidade é o capítulo). Convertido para texto fora do projeto.

## Capítulos

| Cap. | Título | Páginas | Prioridade | Estado | Notas geradas |
|---|---|---|---|---|---|
| 1 | Object-Oriented PHP | n/a | media | destilado | [[estilos-de-programacao-procedural-funcional-e-orientado-a-objetos]], [[regra-nao-crie-propriedades-dinamicas]] |
| 2 | Inheritance and Composition, Encapsulation and Visibility, Interfaces and Concretions | n/a | media | destilado | sem nota nova: confirma notas existentes, que ganharam esta fonte |
| 3 | Advanced OOP Features | n/a | media | destilado | [[converter-erros-em-excecoes-com-manipuladores-globais]], [[regra-nunca-silencie-excecoes]] (SPL, reflexão e atributos não foram relidos: já têm notas de outro livro) |
| 4 | Scalar, Arrays, and Special Types | n/a | media | destilado | [[tipos-escalares-do-php-e-armadilhas]], [[regra-nao-use-float-para-dinheiro]], [[regra-use-sempre-a-comparacao-identica-em-php]], [[vetores-iteraveis-e-geradores-em-php]], [[null-void-e-propriedades-nao-inicializadas-em-php]] |
| 5 | Object Types, Interfaces, and Unions | n/a | media | destilado | [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]], [[criar-instancias-por-clone-reflexao-e-serializacao]], [[regra-nao-desserialize-dados-nao-confiaveis]] |
| 6 | Parameter, Property, and Return Types | n/a | alta | destilado | [[regra-strict-types-em-todo-arquivo-php]] |
| 7 | Design Patterns and Clean Code | n/a | alta | destilado | [[divida-tecnica]], [[principios-solid]], [[nomes-claros-e-linguagem-ubiqua-no-codigo]], [[complexidade-ciclomatica]], [[regra-use-retorno-antecipado-em-vez-de-condicionais-aninhadas]], [[regra-nao-repita-valores-use-constantes-nomeadas]], [[imutabilidade-datetime-e-datetimeimmutable]], [[regra-use-tipos-de-retorno-precisos-em-vez-de-interfaces-vagas]], [[padrao-builder]], [[padrao-fluent-interface-fluente]], [[padrao-chain-of-responsibility]], [[padrao-strangler]], [[regra-evite-o-singleton-classico]] |
| 8 | Model, View, Controller (MVC) Example | n/a | media | destilado | [[padrao-repository-repositorio]], [[padrao-collection-colecao-tipada]], [[renderizar-templates-em-php-puro-com-buffer-de-saida]], [[regra-leia-superglobais-em-um-so-lugar]] |
| 9 | Dependency Injection Example | n/a | media | destilado | [[conteiner-de-injecao-de-dependencias-como-funciona]] (a seção final sobre o antipadrão do localizador de serviços foi lida só até o início; já coberta por outra nota) |
| 10 | Composer For Dependencies | n/a | alta | destilado | [[gerenciar-dependencias-com-composer]] |
| 11 | Creating Your Own Composer Package | n/a | baixa | destilado | [[criar-um-pacote-composer-e-versionar-com-semver]] |
| 12 | The Awesomeness That Is 8.1 | n/a | alta | destilado | [[enums-em-php]], [[propriedades-readonly-em-php]], [[tipos-de-intersecao-em-php]], [[tipo-de-retorno-never-em-php]], [[constantes-final-em-php]] |

Prioridade: `alta`, `media`, `baixa` ou `ignorar` (o usuário pode mudar). Estado: `pendente` ou `destilado`. Páginas: numeração do leitor de PDF, salvo indicação nas observações.

## Observações

- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulo 11 (criar um pacote Composer, executáveis, tags e SemVer) lido por inteiro na prosa. Registrada uma divergência: o livro chama o autoload de PSR-12, mas é PSR-4. Com isso, todos os capítulos do livro estão destilados.
- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulos 1, 2, 3 e 8 lidos na prosa (o EPUB foi convertido para texto fora do projeto; o código dos exemplos só foi lido onde virou nota). A parte de SPL, reflexão e atributos do capítulo 3 foi só folheada, por já ter notas de Wenz e Hauser. Os autores entraram como fonte em 7 notas existentes. Os capítulos 2 e 3 trazem nomes de projetos e frameworks de 2021; as recomendações de bibliotecas não foram conferidas.
- 2026-11-22: primeiro lote, com o capítulo 6 (lido até a variância de tipos) e a primeira metade do capítulo 12 (enums e readonly). Do capítulo 12 ficam pendentes tipos de interseção, o tipo `never` e constantes `final`. A variância (covariância e contravariância) do capítulo 6 foi lida, mas não virou nota, por ser avançada para a stack do projeto. Próximos naturais: capítulo 7 (código limpo), capítulo 10 (Composer) e os capítulos 4 e 5 (tipos).

## Conexões

- [[regra-strict-types-em-todo-arquivo-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[enums-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[propriedades-readonly-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — acompanha a destilação de um livro-base deste assunto
- [[The-Art-of-Modern-PHP-8-(Joseph-Edmonds-Lorna-Jane-Mitchell) (epub)]] — o mapa acompanha a destilação do livro representado por esta ficha
- 2026-11-22: segundo lote, com o capítulo 10 por inteiro e o início do capítulo 7 (dívida técnica e SOLID). A seção de padrões de projeto do capítulo 7 ficou sem leitura; por isso o 7 foi marcado como destilado só em parte.
- [[divida-tecnica]] — o mapa do livro lista esta nota como gerada pela destilação
- [[principios-solid]] — o mapa do livro lista esta nota como gerada pela destilação
- [[gerenciar-dependencias-com-composer]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: terceiro lote, com os capítulos 4, 5 e 9 (prioridade média), lidos por inteiro (exceto o final do 9, sobre o antipadrão do localizador de serviços, já tratado por outra nota). Os capítulos 1, 2, 3 e 8 (POO básica, herança e composição, recursos avançados e MVC) se sobrepõem a notas já existentes de outros livros e ficam pendentes. O livro é um EPUB, sem páginas: as fontes citam o capítulo e a seção.
- [[tipos-escalares-do-php-e-armadilhas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-use-float-para-dinheiro]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-sempre-a-comparacao-identica-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[vetores-iteraveis-e-geradores-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — o mapa do livro lista esta nota como gerada pela destilação
- [[criar-instancias-por-clone-reflexao-e-serializacao]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-desserialize-dados-nao-confiaveis]] — o mapa do livro lista esta nota como gerada pela destilação
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: capítulo 7 lido por inteiro (SOLID, código limpo e padrões). Os padrões Factory, Adapter, Facade, Decorator, Iterator, Strategy, Observer e MVC já tinham notas e não foram duplicados; entraram o código limpo (nomes, ciclomática, retorno antecipado, constantes, imutabilidade, tipos) e os padrões Builder, Fluent, Chain of Responsibility, Strangler e o aviso contra o Singleton. O livro não dá exemplos próprios de código para os padrões, só links para projetos de código aberto, que não foram lidos. O fim do capítulo 12 (tipos de interseção, `never`, constantes `final`) segue pendente.
- [[nomes-claros-e-linguagem-ubiqua-no-codigo]] — o mapa do livro lista esta nota como gerada pela destilação
- [[complexidade-ciclomatica]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-retorno-antecipado-em-vez-de-condicionais-aninhadas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-repita-valores-use-constantes-nomeadas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[imutabilidade-datetime-e-datetimeimmutable]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-tipos-de-retorno-precisos-em-vez-de-interfaces-vagas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-builder]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-fluent-interface-fluente]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-chain-of-responsibility]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-strangler]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-evite-o-singleton-classico]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: fim do capítulo 12 lido (interseção, `never`, constantes `final`). O capítulo 12 está completo; o `clone` e as propriedades readonly mutáveis já estavam cobertos.
- [[tipos-de-intersecao-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[tipo-de-retorno-never-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[constantes-final-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[estilos-de-programacao-procedural-funcional-e-orientado-a-objetos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-collection-colecao-tipada]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-repository-repositorio]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-leia-superglobais-em-um-so-lugar]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-crie-propriedades-dinamicas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nunca-silencie-excecoes]] — o mapa do livro lista esta nota como gerada pela destilação
- [[converter-erros-em-excecoes-com-manipuladores-globais]] — o mapa do livro lista esta nota como gerada pela destilação
- [[renderizar-templates-em-php-puro-com-buffer-de-saida]] — o mapa do livro lista esta nota como gerada pela destilação
- [[tratar-erros-com-excecoes-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[criar-um-pacote-composer-e-versionar-com-semver]] — o mapa do livro lista esta nota como gerada pela destilação
