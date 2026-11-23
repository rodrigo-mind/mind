---
titulo: Mapa de PHP 8 Objects, Patterns, and Practice
tipo: mapa-do-livro
origem: destilar
livro: PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra).pdf
assunto: developer
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapa de PHP 8 Objects, Patterns, and Practice

## Tese

Livro de Matt Zandstra (7ª edição, 2024) sobre programação orientada a objetos em PHP 8 e padrões de projeto, indo dos fundamentos de objetos às ferramentas (pacotes, testes), ao design e a padrões de geração de objetos, de estrutura, de tarefas, corporativos e de banco de dados.

## Como aproveitar

- Vale destilar: princípios de design orientado a objetos, os padrões mais úteis a sistemas web em PHP puro (fábricas, injeção de dependência, front controller, mapeamento de dados) e as ferramentas de teste.
- Ignorar: histórico do PHP e o apêndice do analisador simples.
- Limites: o livro é um volume de dois; os exemplos assumem PHP 8. A numeração das páginas abaixo é a do leitor de PDF (639 páginas).

## Capítulos

| Cap. | Título | Páginas | Prioridade | Estado | Notas geradas |
|---|---|---|---|---|---|
| 1 | PHP: Design and Management | 21-28 | baixa | destilado | [[sintomas-de-um-projeto-php-que-degringola]] |
| 2 | PHP and Objects | 29-36 | baixa | destilado | sem nota própria: a história do PHP com objetos entrou em [[sintomas-de-um-projeto-php-que-degringola]] |
| 3 | Object Basics | 37-96 | media | destilado | [[declaracoes-de-tipo-em-php-uniao-anulavel-mixed-e-dnf]] (o restante se sobrepõe a notas existentes, que ganharam esta fonte) |
| 4 | Advanced Features | 97-174 | media | destilado | [[tratar-erros-com-excecoes-em-php]], [[regra-nao-use-die-ou-exit-para-tratar-erros]], [[callbacks-funcoes-anonimas-e-closures-em-php]], [[regra-use-metodos-magicos-com-cuidado-e-documente]] |
| 5 | Object Tools | 175-228 | alta | destilado | [[namespaces-em-php]], [[carregamento-de-arquivos-e-include-path]], [[carregamento-automatico-em-php]], [[funcoes-de-classe-e-objeto-em-php]], [[regra-nao-execute-plugins-de-origem-nao-confiavel]] |
| 6 | Objects and Design | 229-258 | alta | destilado | [[responsabilidade-coesao-e-ortogonalidade]], [[regra-defina-a-responsabilidade-da-classe-em-25-palavras]], [[polimorfismo-no-lugar-de-condicionais]] |
| 7 | What Are Design Patterns? Why Use Them? | 259-269 | alta | destilado | [[padroes-de-projeto]] |
| 8 | Some Pattern Principles | 270-288 | alta | destilado | [[composicao-em-vez-de-heranca]], [[acoplamento-e-desacoplamento]] |
| 9 | Generating Objects | 289-351 | alta | destilado | [[padroes-de-criacao-de-objetos]] |
| 10 | Patterns for Flexible Object Programming | 352-384 | media | destilado | [[padrao-composite]], [[padrao-decorator]], [[padrao-facade]], [[regra-componentes-devem-expor-capacidades-nao-tipos]] |
| 11 | Performing and Representing Tasks | 385-442 | media | destilado | [[padrao-interpreter-e-mini-linguagens]], [[padrao-strategy]], [[padrao-observer]], [[padrao-visitor]], [[padrao-command]], [[padrao-null-object]] |
| 12 | Enterprise Patterns | 443-519 | alta | destilado | [[arquitetura-em-camadas]], [[registry-e-service-locator]], [[regra-container-de-di-so-nas-bordas]], [[front-controller-em-php]], [[controlador-de-pagina-page-controller]], [[visao-com-modelo-e-auxiliar-de-visao]], [[script-de-transacao-e-modelo-de-dominio]], [[request-e-response-como-objetos]] |
| 13 | Database Patterns | 520-587 | alta | destilado | [[mapeador-de-dados-data-mapper]], [[mapa-de-identidades-identity-map]], [[unidade-de-trabalho-unit-of-work]], [[objeto-de-identidade-identity-object]], [[padroes-de-banco-de-dados-visao-geral]] |
| 14 | Objects, Patterns, Practice (e demais) | 588-? | media | destilado | [[principios-de-projeto-orientado-a-objetos-resumo]], [[o-que-os-padroes-de-projeto-oferecem-e-seus-limites]], [[regra-faca-o-mais-simples-que-funcione-antes-de-aplicar-um-padrao]], [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] (capítulo 14, p. 588-596; o apêndice B, do analisador, não foi lido) |

Prioridade: `alta`, `media`, `baixa` ou `ignorar` (o usuário pode mudar). Estado: `pendente` ou `destilado`. Páginas: numeração do leitor de PDF, salvo indicação nas observações.

## Observações

- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulos 1 e 2 lidos (prosa). O 1 virou nota; o 2 é a história do suporte a objetos (PHP 3 a 8) e só entrou como contexto. Com isso, todos os capítulos do volume 1 estão destilados; segue sem leitura só o apêndice B.
- 2026-11-22: as páginas da tabela agora são as do leitor de PDF, localizadas pelas aberturas de capítulo no texto extraído (a impressa, em geral, é 14 a 18 páginas menor).
- 2026-11-22: mapa criado a partir do sumário; nenhum capítulo foi destilado. As páginas dos capítulos 11 a 14 não foram localizadas e estão marcadas com "?"; o livro tem apêndices (bibliografia, analisador simples) que não entram.
- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulos 3 e 4 lidos na prosa; as listagens de código foram puladas. Como eles se sobrepõem a notas de outros livros (Wenz e Hauser, Art of Modern PHP 8), Zandstra entrou como segunda fonte em 6 notas existentes, e só os temas sem nota viraram notas novas: tipos (união, `mixed`, DNF), exceções, callbacks e closures, e dois avisos (sobre `die` e sobre métodos mágicos). Leitura mais rápida nas seções de static, constantes e traits, que confirmam notas existentes.

## Conexões

- [[developer]] — acompanha a destilação de um livro-base deste assunto
- [[PHP-8-Objects-Patterns-and-Practice-Volume-1-(Matt-Zandstra) (pdf)]] — o mapa acompanha a destilação do livro representado por esta ficha
- 2026-11-22: primeiro lote, com o capítulo 7 por inteiro, o capítulo 8 até o desacoplamento e a abertura e o início do Singleton do capítulo 9. Os capítulos 8 e 9 ficam em parte; os demais padrões de criação (Factory Method, Abstract Factory, Prototype, Service Locator e Dependency Injection) e a segunda metade do capítulo 8 são os próximos naturais.
- [[padroes-de-projeto]] — o mapa do livro lista esta nota como gerada pela destilação
- [[composicao-em-vez-de-heranca]] — o mapa do livro lista esta nota como gerada pela destilação
- [[acoplamento-e-desacoplamento]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padroes-de-criacao-de-objetos]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: segundo lote, com os capítulos 5 (até as funções de classe e objeto) e 6 (até o polimorfismo). Ficam sem leitura a API Reflection e os atributos (fim do 5), e o encapsulamento e a UML (fim do 6); por isso os dois capítulos entram como destilados em parte. Próximos: capítulos 12 e 13.
- [[namespaces-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[carregamento-de-arquivos-e-include-path]] — o mapa do livro lista esta nota como gerada pela destilação
- [[carregamento-automatico-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[funcoes-de-classe-e-objeto-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-execute-plugins-de-origem-nao-confiavel]] — o mapa do livro lista esta nota como gerada pela destilação
- [[responsabilidade-coesao-e-ortogonalidade]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-defina-a-responsabilidade-da-classe-em-25-palavras]] — o mapa do livro lista esta nota como gerada pela destilação
- [[polimorfismo-no-lugar-de-condicionais]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: terceiro lote, com os capítulos 12 e 13. No 12, o Application Controller foi lido só no início e fica sem nota própria; no 13, o carregamento tardio, as fábricas de objetos de domínio e de consulta e o montador de objetos não foram lidos por inteiro, e o Identity Object só em parte. Por isso os dois capítulos entram como destilados em parte. Os capítulos 3, 4, 10, 11 e 14 e o restante dos 5, 6, 8 e 9 seguem pendentes.
- [[arquitetura-em-camadas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[registry-e-service-locator]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-container-de-di-so-nas-bordas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[front-controller-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[controlador-de-pagina-page-controller]] — o mapa do livro lista esta nota como gerada pela destilação
- [[visao-com-modelo-e-auxiliar-de-visao]] — o mapa do livro lista esta nota como gerada pela destilação
- [[script-de-transacao-e-modelo-de-dominio]] — o mapa do livro lista esta nota como gerada pela destilação
- [[request-e-response-como-objetos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapeador-de-dados-data-mapper]] — o mapa do livro lista esta nota como gerada pela destilação
- [[mapa-de-identidades-identity-map]] — o mapa do livro lista esta nota como gerada pela destilação
- [[unidade-de-trabalho-unit-of-work]] — o mapa do livro lista esta nota como gerada pela destilação
- [[objeto-de-identidade-identity-object]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padroes-de-banco-de-dados-visao-geral]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: lote com os capítulos 10 e 11 (padrões de estrutura e de tarefas), lidos por inteiro. Do capítulo 11, o analisador do apêndice B (parsing da MarkLogic) não foi lido. Restam, de prioridade média, os capítulos 3, 4 (sobrepõem-se a notas já feitas de outros livros) e 14.
- [[padrao-composite]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-decorator]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-facade]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-componentes-devem-expor-capacidades-nao-tipos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-interpreter-e-mini-linguagens]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-strategy]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-observer]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-visitor]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-command]] — o mapa do livro lista esta nota como gerada pela destilação
- [[padrao-null-object]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: capítulo 14 (recapitulação, p. 588-596) lido por inteiro: é um resumo de princípios, não um capítulo de práticas de teste ou versionamento (esses ficam para o volume 2, que não está na biblioteca). O apêndice B (analisador da mini-linguagem, p. 600-631) segue sem leitura. Restam, de prioridade média, só os capítulos 3 e 4, que se sobrepõem a notas de outros livros.
- [[principios-de-projeto-orientado-a-objetos-resumo]] — o mapa do livro lista esta nota como gerada pela destilação
- [[o-que-os-padroes-de-projeto-oferecem-e-seus-limites]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-faca-o-mais-simples-que-funcione-antes-de-aplicar-um-padrao]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] — o mapa do livro lista esta nota como gerada pela destilação
- [[callbacks-funcoes-anonimas-e-closures-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[declaracoes-de-tipo-em-php-uniao-anulavel-mixed-e-dnf]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-use-die-ou-exit-para-tratar-erros]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nunca-silencie-excecoes]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-metodos-magicos-com-cuidado-e-documente]] — o mapa do livro lista esta nota como gerada pela destilação
- [[tratar-erros-com-excecoes-em-php]] — o mapa do livro lista esta nota como gerada pela destilação
- [[sintomas-de-um-projeto-php-que-degringola]] — o mapa do livro lista esta nota como gerada pela destilação
