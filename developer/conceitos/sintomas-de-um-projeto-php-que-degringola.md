---
titulo: "Sintomas de um projeto PHP que degringola (a evolução do desastre)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, vol. 1, cap. 1, seção The Problem (PDF p. 21-24), e cap. 2 (PDF p. 29-36)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Sintomas de um projeto PHP que degringola

## Definição

O autor conta a história típica de um projeto PHP que começa bem e azeda. O PHP é fácil demais: convida a escrever o código direto nas páginas e a juntar funções em arquivos incluídos de página em página. No começo, o site funciona e o cliente fica feliz. Os problemas aparecem na fase seguinte:

- **Lógica na página:** consultas ao banco, checagem de login e tratamento de formulário são copiados de página em página. Uma mudança "de um dia" leva três, porque é preciso alterar mais de 20 páginas, e alguma sempre fica esquecida.
- **Sem controle de versão:** um programador grava a sua versão por cima das mudanças de outro, e a perda só aparece dias depois.
- **Configuração fixa no código:** caminhos, nomes de banco e senhas espalhados pelos arquivos. Migrar de servidor, que levaria duas horas, leva oito, e alguém ainda depende de uma regra de `mod_rewrite` que ninguém documentou.
- **Sem testes:** uma correção feita às pressas, "só copiar e colar", derruba o carrinho de compras a noite inteira por causa de uma aspa esquecida.
- **Sem documentação:** quem chega ao time demora a entender o código.
- **Código que muda de função:** o negócio do cliente muda, o código passa a fazer o que não foi pensado para fazer e vira um bolo difícil de separar.

O autor diz que viu tudo isso acontecer muitas vezes. Projetos assim podem decidir o sucesso ou o fracasso de um negócio. A resposta do livro está no projeto orientado a objetos, nos padrões e nas práticas de controle de versão, testes, documentação e implantação.

**Contexto (cap. 2):** o suporte a objetos passou de remendo no PHP 3 a núcleo da linguagem no PHP 5 (2004). O PHP 7 (2015) trouxe declaração de tipos, e o PHP 8 (2020) trouxe atributos, argumentos nomeados, tipos de união e promoção no construtor.

## Por que importa

É uma lista de verificação para sistemas de clientes: cada sintoma aponta uma prática que falta.

## Como se relaciona

As respostas estão em front controller em PHP e arquitetura em camadas (tirar a lógica das páginas), na regra centralize as classes reutilizáveis em vez de copiar, em testes unitários em PHP com PHPUnit e em gerenciar dependências com Composer. O mesmo diagnóstico aparece em estilos de programação em PHP (procedural e orientado a objetos).

## Notas do Claude

- Para a stack do projeto, as correções mais baratas são (inferência minha): Git desde o primeiro dia, um `config.php` fora da pasta pública com os dados do banco, um `bootstrap.php` incluído por todas as páginas e funções de acesso ao banco num lugar só.
- Com deploy por FTP, o risco de sobrescrever arquivos alheios é maior. O Git ajuda a saber exatamente o que enviar (inferência minha).

## Conexões

- [[regra-trate-o-codigo-do-banco-como-codigo]] — a falta de versionamento do banco é um dos sintomas descritos
- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[front-controller-em-php]] — tirar a lógica das páginas passa por um ponto de entrada único
- [[arquitetura-em-camadas]] — separar camadas evita a lógica copiada em cada página
- [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] — o código copiado de página em página é o sintoma central
- [[testes-unitarios-em-php-com-phpunit]] — a falta de testes derrubou o carrinho no exemplo do livro
- [[divida-tecnica]] — os sintomas são a dívida técnica acumulada
