---
titulo: "Números aleatórios e precisão decimal em PHP (Randomizer e BCMath)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, The Comprehensive Guide, cap. 9, seções 9.1.4 e 9.1.7 (PDF p. 395-402)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Números aleatórios e precisão decimal em PHP

## Definição

**Números aleatórios:**

- `rand(min, max)` e `srand()` são as funções antigas; `getrandmax()` dá o limite superior.
- `mt_rand()` usa o algoritmo Mersenne Twister e dá números "mais confiavelmente aleatórios" e mais rápidos. Desde o PHP 7.1, `srand()` é apelido de `mt_srand()`.
- **PHP 8.2:** a classe `Random\Randomizer` traz `getInt(min, max)`, `getFloat(min, max)`, `getBytes(tamanho)`, `shuffleArray()` e `pickArrayKeys(vetor, quantidade)`.

**Precisão decimal:**

- Os operadores e as funções matemáticas comuns não têm precisão arbitrária nas casas decimais.
- A extensão **BCMath** calcula com números guardados como strings, que é o único jeito de ter alta precisão. Em versões modernas, ela costuma vir instalada (confira com `phpinfo()`).
- A precisão se define em três níveis: `bcmath.scale` no `php.ini` (padrão 0, sem casas decimais), `bcscale()` no script, ou o último parâmetro de cada função.
- Funções: `bcadd`, `bcsub`, `bcmul`, `bcdiv`, `bcmod`, `bcpow`, `bcsqrt`, `bccomp` (comparar) e `bcpowmod`.
- As casas além da precisão são **cortadas**, e não arredondadas.

## Por que importa

- Para dinheiro, os centavos não podem ter erro de arredondamento.
- Para senhas temporárias, tokens e códigos de verificação, o aleatório precisa ser imprevisível.

## Como se relaciona

A alternativa mais simples para dinheiro está na regra não use float para dinheiro (guardar em centavos, como inteiro). Tokens de formulário estão na regra token CSRF em formulários.

## Notas do Claude

- O livro cita senhas geradas como uso dos números aleatórios, mas não separa o aleatório comum do criptográfico. Isso é conhecimento meu: para tokens, senhas e códigos, use `random_int()` e `random_bytes()`, que usam a fonte segura do sistema. `rand()` e `mt_rand()` são previsíveis. O `Randomizer` sem argumento usa o motor seguro.
- Como o BCMath corta em vez de arredondar, passe uma casa extra e arredonde no fim, ou trabalhe em centavos (inferência minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-nao-use-float-para-dinheiro]] — o BCMath é a alternativa para cálculo decimal exato
- [[regra-use-numeric-para-valores-exatos]] — é a regra equivalente no banco, enquanto o BCMath resolve no PHP
- [[regra-token-csrf-em-formularios]] — tokens precisam de números aleatórios imprevisíveis
- [[regra-guarde-senhas-com-password-hash]] — senhas temporárias e tokens pedem aleatório seguro, não rand()
- [[regra-nao-ordene-por-rand-em-tabelas-grandes]] — o aleatório seguro serve também para sortear posições
