---
titulo: "Objetos como vetores associativos e cópia de objetos"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "David Flanagan, JavaScript, The Definitive Guide, 7ª ed., cap. 6, seções 6.3.1, 6.7 e 6.10 (PDF p. 147-172, seção indicada dentro do capítulo)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Objetos como vetores associativos e cópia de objetos

## Definição

- **Vetor associativo:** `objeto.propriedade` e `objeto["propriedade"]` são equivalentes; o segundo aceita texto calculado em tempo de execução, e por isso um objeto pode ter qualquer número de propriedades com nomes dinâmicos (ao contrário de C ou Java).
- **`Object.assign(alvo, ...fontes)`:** copia as propriedades próprias enumeráveis (incluindo `Symbol`) das fontes para o alvo, na ordem, e devolve o alvo; as fontes não mudam. Usa leitura e escrita comuns, então chama getters e setters em vez de copiá-los. Cuidado: `Object.assign(o, padroes)` **sobrescreve** o de `o`; para aplicar padrões, copie os padrões primeiro para um objeto novo e depois as propriedades de `o`, ou use o espalhamento (`{ ...padroes, ...o }`).
- **Sintaxe estendida do literal (ES6):** método abreviado (`area() { ... }`), nomes de propriedade calculados (`[expressao]: valor`) e espalhamento (`...`).

## Por que importa

Cópias e mesclagens de configuração são tarefas frequentes, e o erro de sobrescrever os valores do usuário com os padrões é comum.

## Como se relaciona

O espalhamento de vetores aparece em vetores e iteração em JavaScript.

## Notas do Claude

Confiança média: não li a herança por protótipos, os atributos de propriedades, nem a serialização JSON.

## Conexões

- [[mapa-javascript-the-definitive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[vetores-e-iteracao-em-javascript]] — o espalhamento vale para objetos e vetores
- [[usar-a-api-fetch]] — o corpo JSON do fetch vira objeto
- [[classes-e-prototipos-em-javascript]] — objetos e herança de propriedades
- [[typeof-delete-e-outros-operadores-de-javascript]] — delete e in em propriedades
- [[sets-e-maps-em-javascript]] — alternativa melhor aos objetos como mapas
- [[json-em-javascript-stringify-parse-tojson-replacer-e-reviver]] — cópia profunda por JSON
