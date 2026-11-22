---
titulo: "Princípios SOLID, na leitura do livro"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Clean Code Acronyms"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Princípios SOLID, na leitura do livro

## Definição

O livro avisa que as definições são vagas e geram muita discussão, e apresenta a própria leitura, como "a opinião de uma pessoa":

| Letra | Princípio | Em termos práticos |
|---|---|---|
| S | Responsabilidade única | Reúna o que muda pelo mesmo motivo e separe o que muda por motivos diferentes. O "motivo" é uma mudança na especificação, e não no dado em execução. Tem a ver com separação de preocupações, e não só com classes minúsculas. |
| O | Aberto e fechado | Estenda o comportamento sem alterar o código existente: o PHP oferece herança e interfaces, e interfaces costumam ser melhores, porque a herança em excesso gera estruturas frágeis. |
| L | Substituição de Liskov | Quem usa uma interface não deve se confundir com uma implementação dela. Se for preciso testar o tipo da implementação (`instanceof`) numa dependência, o princípio foi quebrado. |
| I | Segregação de interfaces | Nenhum cliente deve ser forçado a depender de interfaces que não usa; prefira interfaces pequenas, e uma classe pode implementar várias. |
| D | Inversão de dependência | Dependa de abstrações, e não de implementações concretas; propriedades e parâmetros devem ser interfaces, classes abstratas ou escalares, quando possível. |

O exemplo do livro: uma classe que registra mensagens recebe um `LoggerInterface` (o padrão PSR-3 do PHP-FIG) e não sabe qual implementação existe, o que a deixa estável ao trocar o registro em desenvolvimento e em produção.

## Por que importa

Reduz o acoplamento e deixa o código mais testável e mais seguro de mudar, porque uma mudança numa parte da especificação afeta poucas classes.

## Como se relaciona

É um modo de pagar a dívida técnica e fundamenta a injeção de dependência, tratada em outro capítulo do livro (ainda não destilado).

## Notas do Claude

Confiança média: li com detalhe S, O, L e a definição de I; D está resumida na síntese do próprio livro. A seção de padrões de projeto do capítulo 7 não foi lida.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[divida-tecnica]] — os princípios são um caminho para reduzir a dívida técnica
- [[padroes-de-projeto]] — os padrões aplicam princípios como os SOLID, e o livro de PHP moderno os trata
- [[padroes-de-criacao-de-objetos]] — a inversão de dependência pede delegar a criação de objetos concretos
- [[responsabilidade-coesao-e-ortogonalidade]] — a responsabilidade única do SOLID é a mesma ideia de coesão
- [[testes-unitarios-em-php-com-phpunit]] — princípios SOLID facilitam o teste unitário
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — interfaces apoiam os princípios de inversão e substituição
- [[principios-de-projeto-orientado-a-objetos-resumo]] — comparar com os princípios SOLID
- [[nomes-claros-e-linguagem-ubiqua-no-codigo]] — ambos tratam de clareza e foco do código
- [[regra-use-tipos-de-retorno-precisos-em-vez-de-interfaces-vagas]] — ligada ao princípio de substituição de Liskov
- [[tipos-de-intersecao-em-php]] — interfaces pequenas combinadas atendem à segregação de interfaces
