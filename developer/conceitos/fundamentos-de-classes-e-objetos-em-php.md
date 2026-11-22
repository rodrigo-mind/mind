---
titulo: "Fundamentos de classes e objetos em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seções 11.2 e 11.3.1 a 11.3.3 (PDF p. 454-473)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Fundamentos de classes e objetos em PHP

## Definição

- **Classe** define a estrutura (propriedades e métodos); **objeto** é uma instância dela, criada com `new`. Cada objeto tem os seus valores: mudar a propriedade de um não altera os outros. O acesso usa a seta: `$objeto->propriedade` e `$objeto->metodo()`.
- **Métodos** são como funções: aceitam parâmetros, valores padrão, retorno (vários valores, em um vetor). Os objetos são passados por **referência**; os demais valores, por valor, salvo o `&`.
- **`$this`:** referência ao objeto atual, para chamar propriedades e métodos de dentro da classe. Convenção: `getNome()` para ler e `setNome($valor)` para gravar.
- **Construtor** `__construct()`: roda ao criar o objeto. No PHP 8, a **promoção de propriedades** declara e atribui no construtor: `public function __construct(public $cpu = "x") {}`. O **destrutor** `__destruct()` roda quando o objeto é desfeito (por exemplo, com `unset`).
- **Herança** com `extends`: a subclasse adota propriedades e métodos e pode **sobrescrevê-los** com o mesmo nome; `parent::metodo()` chama o da classe-mãe (não se usa `$this` para isso).
- **Sem sobrecarga de métodos:** o PHP não aceita dois métodos de mesmo nome com parâmetros diferentes. Simula-se com valores padrão, o operador `...`, `func_get_args()` ou checagem de tipo; o livro pede usar isso com parcimônia, porque a quantidade de casos fica deselegante.
- **Clonar:** `clone $objeto` cria uma cópia (para passar por valor ou duplicar).
- **Comparar:** `==` é verdadeiro para objetos da mesma classe com os mesmos valores; `===` só para a mesma instância (uma cópia clonada é igual, mas não idêntica).
- **Tipos de classe:** declarar `function f(Computador $c)` exige essa classe (o erro vem em tempo de execução); `$objeto instanceof Classe` testa à mão.

## Por que importa

É a base do restante da orientação a objetos do projeto.

## Como se relaciona

Ver visibilidade, static e final em PHP, interfaces, classes abstratas e traits, métodos mágicos do PHP e composição em vez de herança.

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — «Interfaces, classes abstratas, traits e classes anônimas em PHP» cita esta nota ao explicar suas relações
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[iteracao-de-objetos-em-php]] — «Iteração de objetos em PHP» cita esta nota ao explicar suas relações
- [[visibilidade-static-final-e-constantes-de-classe-em-php]] — «Visibilidade, static, final e constantes de classe em PHP» cita esta nota ao explicar suas relações
- [[metodos-magicos-e-constantes-magicas-do-php]] — «Métodos mágicos e constantes mágicas do PHP» cita esta nota ao explicar suas relações
- [[funcoes-de-classe-e-objeto-em-php]] — as funções de classe e objeto operam sobre o mesmo modelo
- [[tipos-de-objeto-heranca-de-tipos-comparacao-e-referencias]] — «Tipos de objeto, herança de tipos, comparação e referências» cita esta nota ao explicar suas relações
- [[null-void-e-propriedades-nao-inicializadas-em-php]] — a promoção de propriedades do construtor
- [[principios-de-projeto-orientado-a-objetos-resumo]] — a evolução dos objetos em PHP
- [[classes-e-prototipos-em-javascript]] — «Classes e protótipos em JavaScript» cita esta nota ao explicar suas relações
