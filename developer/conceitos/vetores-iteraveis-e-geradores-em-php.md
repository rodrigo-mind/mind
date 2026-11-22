---
titulo: "Vetores, iteráveis e geradores em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 4, seção Arrays and iterables (EPUB)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Vetores, iteráveis e geradores em PHP

## Definição

- **Vetor (array):** a estrutura mais usada; chaves inteiras (começando em 0, se omitidas) ou de texto, com valores quaisquer; a desestruturação (`[$a, $b] = [1, 2]`) e funções como `range` e `str_split` ajudam. **Use as funções nativas de vetor** em vez de criar as suas.
- **Armadilha de desempenho:** chamar `array_merge` dentro de um laço reconstrói o vetor a cada volta e é muito mais lento. Acumule os vetores em uma lista e junte uma só vez no fim, com o operador de espalhamento (`array_merge(...$lista)`).
- **`iterable`:** tipo para parâmetros e retornos que aceita um vetor, um objeto que implementa `Traversable` ou `Iterator`, ou um **gerador**. Todos funcionam em um `foreach`.
- **Gerador:** função com `yield` que devolve valores um a um, retomando de onde parou a cada volta; pode devolver só valores ou chaves e valores. Úteis quando seria caro devolver tudo de uma vez (ler e filtrar um arquivo enorme, linha a linha, em vez de ter gigabytes na memória) e em provedores de dados do PHPUnit, mais legíveis que vetores multidimensionais aninhados.
- **DocBlocks de tipos:** o PHP não lê comentários DocBlock; só leem desenvolvedores, IDEs, ferramentas de análise estática e código que usa reflexão. Eles podem estar errados. Em PHP 8 só são necessários para vetores e iteráveis: use `array<int, string>` (chave e valor; mais informação é melhor) ou `string[]`, para o IDE completar e as ferramentas checarem.

## Por que importa

Evita código lento e documenta o conteúdo de vetores que a linguagem não descreve.

## Como se relaciona

Veja iteração de objetos em PHP e vetores e iteração em JavaScript (conceito análogo no outro lado).

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[iteracao-de-objetos-em-php]] — esta nota cita a ideia de «Iteração de objetos em PHP» na seção sobre como se relaciona
- [[vetores-e-iteracao-em-javascript]] — o equivalente em JavaScript
- [[trabalhar-com-arquivos-em-php]] — geradores leem arquivos grandes linha a linha
- [[spl-iteradores-e-classes-padrao-do-php]] — alternativa com geradores
