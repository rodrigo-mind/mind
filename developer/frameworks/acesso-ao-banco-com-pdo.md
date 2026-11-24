---
titulo: "Acesso ao banco com PDO (PHP Data Objects)"
tipo: framework
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL, cap. 18, p. 765-778"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Acesso ao banco com PDO

## Para que serve

Conectar o PHP a um banco (como o MySQL) por uma interface única e executar comandos com parâmetros, evitando montar SQL com texto do usuário. O PDO vem com o PHP, mas precisa do driver do banco (para MySQL, `pdo_mysql`).

## Quando usar e quando não usar

Use quando a aplicação pode um dia trocar de banco ou quando se quer a parametrização padrão. O livro pesa os argumentos contra qualquer camada de abstração: se não há plano de migrar de banco, a camada pode não valer; abstrações são mais lentas e ficam no mínimo denominador comum. Para o MySQL com PDO da stack do projeto, vale pelos comandos preparados.

## O que perguntar ao usuário antes

- Qual banco, host, nome do banco, usuário e senha (que devem ficar fora do código versionado)?
- Que comandos usarão dados do usuário?

## Passos

1. Monte o DSN (data source name), que descreve tipo de banco, servidor e base. Para MySQL: `mysql:dbname=nome;host=localhost`.
2. Crie `new PDO($dsn, $usuario, $senha)` dentro de um `try`/`catch (PDOException $e)`; em caso de erro, mostre uma mensagem protegida com `htmlspecialchars` e encerre.
3. Para comandos fixos sem entrada do usuário, `exec()` ou `query()` bastam. `query()` devolve um objeto que se percorre com `foreach`.
4. Para qualquer dado vindo do usuário, use um comando preparado com marcadores: `prepare()` com parâmetros nomeados (`:nome`, sem aspas) ou com `?`; depois `bindParam()` (que liga variáveis por referência) ou passe um vetor para `execute()` (com `?`, um vetor indexado).
5. Leia resultados com `fetch(PDO::FETCH_ASSOC)` (vetor associativo) ou `PDO::FETCH_OBJ` (objeto), em um laço `while`.
6. Para várias operações que precisam ocorrer juntas, use `beginTransaction()`, `commit()` e `rollBack()`.
7. Ao exibir dados na página, escape a saída com `htmlspecialchars`.

## Saída esperada

Código de acesso ao banco com conexão tratada, comandos preparados para toda entrada externa e saída escapada.

## Erros comuns

- Montar o comando com a entrada do usuário dentro da string: o livro mostra que um valor com apóstrofo quebra o SQL, e o capítulo de segurança trata de ataques piores. A função `addslashes()` não é opção.
- Não tratar erros de conexão.
- Esquecer o driver do banco.

## Exemplo mínimo (inventado pelo Claude, não do livro)

```php
$stmt = $db->prepare('SELECT id, nome FROM clientes WHERE email = :email');
$stmt->execute(['email' => $email]);
$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
```

## Notas do Claude

Segundo o checklist do projeto, as consultas devem usar comandos preparados. O livro também sugere `htmlspecialchars` na saída. Os exemplos do livro não configuram `PDO::ATTR_ERRMODE`; ao aplicar, é boa prática definir o modo de exceções (inferência minha, para que erros do banco não passem despercebidos).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: framework de livro-base
- [[regra-nunca-monte-sql-com-entrada-do-usuario]] — o PDO com comandos preparados é a aplicação, em PHP, da defesa contra injeção de SQL
- [[acoplamento-e-desacoplamento]] — «Acoplamento e desacoplamento» cita esta nota ao explicar suas relações
- [[mapeador-de-dados-data-mapper]] — «Mapeador de dados» cita esta nota ao explicar suas relações
- [[transacoes-e-acid]] — «Transações e o princípio ACID» cita esta nota ao explicar suas relações
- [[sql-basico-para-aplicacoes-web]] — «SQL básico para aplicações web: criar, inserir, consultar e filtrar» cita esta nota ao explicar suas relações
- [[padroes-adapter-e-factory]] — «Padrões Adapter e Factory» cita esta nota ao explicar suas relações
- [[trabalhar-com-arquivos-em-php]] — o banco é a alternativa a arquivos para dados estruturados
- [[regra-nao-exiba-erros-na-tela-em-producao]] — erros de conexão do PDO podem expor credenciais
- [[implementar-busca-por-palavras-no-mysql]] — a busca se executa com consulta preparada
- [[regra-nomeie-as-colunas-explicitamente]] — o fetch associativo sofre com nomes repetidos
- [[regra-verifique-erros-do-banco-e-depure-o-sql-final]] — o PDO oferece o modo de exceções
- [[playbook-formulario-seguro-em-php]] — é usada como etapa deste playbook, que a combina com notas de outros livros
- [[mysqli-extensao-do-mysql-para-php]] — o PDO é a escolha da stack; o mysqli se lê para manter código antigo
- [[padrao-repository-repositorio]] — o PDO é o que o repositório usa por baixo
- [[regra-nao-use-die-ou-exit-para-tratar-erros]] — o padrão `or die` ao conectar com PDO cai nesta regra
- [[escapar-texto-conforme-o-destino-em-php]] — o PDO é o caminho recomendado para valores em SQL
- [[tratar-erros-com-excecoes-em-php]] — o PDO lança exceções tratadas como neste framework
- [[outros-bancos-de-dados-com-php]] — o PDO é o caminho comum para vários bancos
- [[regra-nao-ordene-por-rand-em-tabelas-grandes]] — o PDO é o meio de aplicar a alternativa de sortear a posição
- [[regra-prefira-logica-no-php-a-procedimentos-armazenados]] — o acesso por PDO concentra a lógica na aplicação
- [[loja-veiculos-TEMPLATE-1]] — o template centraliza a conexão PDO em includes/db.php
