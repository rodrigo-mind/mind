---
titulo: Mapa de SQL Antipatterns
tipo: mapa-do-livro
origem: destilar
livro: SQL-Antipatterns-Volume-1-Avoiding-the-Pitfalls-of-Database-Programming-(Bill-Karwin).pdf
assunto: developer
criado: 2026-11-22
atualizado: 2026-11-22
---

# Mapa de SQL Antipatterns

## Tese

Os erros mais comuns no uso de SQL seguem padrões que se repetem, e conhecê-los permite evitá-los. Cada capítulo descreve um antipadrão com a mesma anatomia: o objetivo que levou à má solução, o antipadrão em si, como reconhecê-lo, os usos legítimos e a solução. O livro é organizado em modelagem lógica, modelagem física, consultas e desenvolvimento de aplicações, mais um bônus sobre chaves estrangeiras e um apêndice de normalização.

## Como aproveitar

- Vale destilar: cada antipadrão que afeta uma aplicação PHP com MySQL via PDO, em forma de regra (o que fazer no lugar, por quê, quando não vale, como verificar).
- Ignorar: histórias de abertura e exemplos em outros bancos ou linguagens, a não ser que ilustrem o ponto.
- Limites: segunda edição, 2022; exemplos em SQL padrão e Python, com trechos para MySQL. A stack de referência é PHP com PDO e MySQL, então os exemplos de código precisam de tradução. Numeração de páginas: a do leitor de PDF (a impressa fica 19 páginas atrás).

## Capítulos

| Cap. | Título | Páginas | Prioridade | Estado | Notas geradas |
|---|---|---|---|---|---|
| 1 | What's an Antipattern? | 20-27 | baixa | destilado | [[antipadrao-de-sql-o-que-e]] |
| 2 | Jaywalking | 28-39 | alta | destilado | [[regra-nao-guardar-lista-em-uma-coluna]] |
| 3 | Naive Trees | 40-59 | alta | destilado | [[regra-escolha-o-modelo-de-arvore-pelo-uso]] |
| 4 | ID Required | 60-71 | alta | destilado | [[regra-chave-primaria-sob-medida]] |
| 5 | Keyless Entry | 72-79 | alta | destilado | [[regra-declare-chaves-estrangeiras]] |
| 6 | Entity-Attribute-Value | 80-95 | alta | destilado | [[regra-nao-use-eav-modele-subtipos]] |
| 7 | Polymorphic Associations | 96-107 | alta | destilado | [[regra-nao-use-associacao-polimorfica]] |
| 8 | Multicolumn Attributes | 108-117 | media | destilado | [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]], [[valor-historico-em-tabela-de-associacao]] |
| 9 | Metadata Tribbles | 118-131 | media | destilado | [[regra-nao-crie-tabelas-ou-colunas-por-valor-de-dado]], [[particionamento-de-tabelas]] |
| 10 | Rounding Errors | 132-139 | alta | destilado | [[regra-use-numeric-para-valores-exatos]] |
| 11 | 31 Flavors | 140-149 | alta | destilado | [[regra-valores-permitidos-em-tabela-de-consulta]] |
| 12 | Phantom Files | 150-159 | media | destilado | [[imagens-e-arquivos-no-banco-ou-no-disco]] |
| 13 | Index Shotgun | 160-175 | alta | destilado | [[indices-com-o-metodo-mentor]] |
| 14 | Fear of the Unknown | 176-187 | alta | destilado | [[regra-trate-null-como-desconhecido]] |
| 15 | Ambiguous Groups | 188-199 | media | destilado | [[regra-siga-a-regra-do-valor-unico-no-group-by]], [[obter-a-linha-com-o-maior-valor-por-grupo]] |
| 16 | Random Selection | 200-209 | baixa | destilado | [[regra-nao-ordene-por-rand-em-tabelas-grandes]] |
| 17 | Poor Man's Search Engine | 210-223 | media | destilado | [[regra-nao-use-like-com-curinga-para-buscar-palavras]], [[implementar-busca-por-palavras-no-mysql]] |
| 18 | Spaghetti Query | 224-233 | media | destilado | [[regra-nao-resolva-um-problema-complexo-em-uma-consulta-so]], [[produto-cartesiano-nao-intencional]] |
| 19 | Implicit Columns | 234-243 | media | destilado | [[regra-nomeie-as-colunas-explicitamente]] |
| 20 | Readable Passwords | 244-257 | alta | destilado | [[regra-senha-com-hash-e-sal]] |
| 21 | SQL Injection | 258-275 | alta | destilado | [[regra-nunca-monte-sql-com-entrada-do-usuario]] |
| 22 | Pseudokey Neat-Freak | 276-283 | media | destilado | [[regra-nao-renumere-chaves-primarias-nem-reaproveite-ids]], [[numerar-linhas-do-resultado-com-row-number]] |
| 23 | See No Evil | 284-291 | media | destilado | [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] |
| 24 | Diplomatic Immunity | 292-305 | baixa | destilado | [[regra-trate-o-codigo-do-banco-como-codigo]] |
| 25 | Standard Operating Procedures | 306-319 | baixa | destilado | [[regra-prefira-logica-no-php-a-procedimentos-armazenados]] |
| 26 | Foreign Key Mistakes in Standard SQL | 320-331 | media | destilado | [[regra-confira-o-motor-innodb-nas-chaves-estrangeiras]] |
| 27 | Foreign Key Mistakes in MySQL | 332-339 | alta | destilado | [[regra-confira-o-motor-innodb-nas-chaves-estrangeiras]] |
| A1 | Rules of Normalization | 340-358 | media | destilado | [[formas-normais-resumo]], [[regra-normalize-primeiro-e-desnormalize-so-com-medicao]] |

Prioridade: `alta`, `media`, `baixa` ou `ignorar` (o usuário pode mudar). Estado: `pendente` ou `destilado`. Páginas: numeração do leitor de PDF; os limites vêm da localização das aberturas de capítulo no texto extraído.

## Observações

- 2026-11-22 (destilação feita no Claude.ai, fora do Claude Code): capítulos 1, 16, 24 e 25 lidos (prosa; o código de exemplo em Python e SQL foi folheado). Com isso, todos os capítulos do livro estão destilados.
- 2026-11-22: primeiro lote, com os capítulos 2 a 7, 10, 11, 13, 20 e 21, que são os que mais afetam a stack. Li o texto sem os longos exemplos de código, focando em objetivo, antipadrão, usos legítimos e solução; alguns capítulos (3, 6, 13 e 20) foram lidos só em parte (a enumeração de caminho, as formas de modelar subtipos além da herança de tabela única, e o final do capítulo de senhas). Criadas 10 regras e 1 framework.
- 2026-11-22: próximos naturais: capítulo 14 (NULL), capítulo 27 (erros de chave estrangeira no MySQL), capítulo 26, o 17 (busca) e o apêndice de normalização.

## Conexões

- [[regra-nao-guardar-lista-em-uma-coluna]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-escolha-o-modelo-de-arvore-pelo-uso]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-chave-primaria-sob-medida]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-declare-chaves-estrangeiras]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-use-eav-modele-subtipos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-use-associacao-polimorfica]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-use-numeric-para-valores-exatos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-valores-permitidos-em-tabela-de-consulta]] — o mapa do livro lista esta nota como gerada pela destilação
- [[indices-com-o-metodo-mentor]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-senha-com-hash-e-sal]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — acompanha a destilação de um livro-base deste assunto
- [[SQL-Antipatterns-Volume-1-Avoiding-the-Pitfalls-of-Database-Programming-(Bill-Karwin) (pdf)]] — o mapa acompanha a destilação do livro representado por esta ficha
- 2026-11-22: segundo lote, com os capítulos 14, 26 e 27 (leitura parcial, notas de confiança média). O capítulo 15 (grupos ambíguos) foi começado, mas o trecho da solução não foi lido, e continua pendente.
- [[regra-trate-null-como-desconhecido]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-confira-o-motor-innodb-nas-chaves-estrangeiras]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: segundo lote, com os capítulos 8, 9, 12, 15, 17, 18 e 19 (prioridade média), lidos por inteiro (no 15, a parte final sobre SQL portável e, no 18, a seção sobre SQL gerado por SQL foram lidas só no início). Páginas do leitor de PDF.
- [[regra-nao-crie-colunas-numeradas-para-valores-multiplos]] — o mapa do livro lista esta nota como gerada pela destilação
- [[valor-historico-em-tabela-de-associacao]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-crie-tabelas-ou-colunas-por-valor-de-dado]] — o mapa do livro lista esta nota como gerada pela destilação
- [[particionamento-de-tabelas]] — o mapa do livro lista esta nota como gerada pela destilação
- [[imagens-e-arquivos-no-banco-ou-no-disco]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-siga-a-regra-do-valor-unico-no-group-by]] — o mapa do livro lista esta nota como gerada pela destilação
- [[obter-a-linha-com-o-maior-valor-por-grupo]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-use-like-com-curinga-para-buscar-palavras]] — o mapa do livro lista esta nota como gerada pela destilação
- [[implementar-busca-por-palavras-no-mysql]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nao-resolva-um-problema-complexo-em-uma-consulta-so]] — o mapa do livro lista esta nota como gerada pela destilação
- [[produto-cartesiano-nao-intencional]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-nomeie-as-colunas-explicitamente]] — o mapa do livro lista esta nota como gerada pela destilação
- 2026-11-22: terceiro lote, com os capítulos 22 e 23 e o apêndice 1 (normalização), todos de prioridade média. O 22 e o apêndice foram lidos por inteiro; do 23, li até o início do mini-antipadrão de mensagens de sintaxe (p. 291). Ficam pendentes só capítulos de prioridade baixa (1, 16, 24, 25).
- [[regra-nao-renumere-chaves-primarias-nem-reaproveite-ids]] — o mapa do livro lista esta nota como gerada pela destilação
- [[numerar-linhas-do-resultado-com-row-number]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — o mapa do livro lista esta nota como gerada pela destilação
- [[formas-normais-resumo]] — o mapa do livro lista esta nota como gerada pela destilação
- [[regra-normalize-primeiro-e-desnormalize-so-com-medicao]] — o mapa do livro lista esta nota como gerada pela destilação
