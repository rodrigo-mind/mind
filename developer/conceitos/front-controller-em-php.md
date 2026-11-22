---
titulo: "Controlador frontal (Front Controller)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seção Front Controller (PDF p. 458-475)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Controlador frontal (Front Controller)

## Definição

Um ponto central de entrada para todas as requisições do sistema, que as interpreta, escolhe a ação a executar e delega a uma visão a apresentação do resultado. É o oposto do PHP antigo, com vários pontos de entrada. Já foi controverso, hoje é quase onipresente.

## Por que importa

Quando as requisições são tratadas em vários pontos, as operações comuns (autenticação, tradução, acesso a dados) se duplicam por copiar e colar, e alterações se desencontram. Também fica difícil controlar a progressão de uma visão para outra. O controlador centraliza a lógica de apresentação e é extensível: acrescentar uma ação ou visão é simples. Custos: muito desenho prévio e carregar a configuração em toda requisição (que dá para aliviar com cache).

## Componentes do exemplo do livro

- **`index.php`:** poucas linhas, que carregam o autoloader do Composer e chamam o controlador.
- **Controlador (Controller):** inicializa e trata a requisição.
- **ApplicationHelper:** carrega a configuração e monta o contêiner e os serviços.
- **CommandResolver:** converte a requisição em uma ação, por uma estratégia lógica (mapa de caminhos para classes de comando, em arquivo `.ini`) ou física (olhar os arquivos). Verifica que a classe existe e estende `Command`, ou lança exceção.
- **Command:** a ação; seu construtor é `final`, sem argumentos. Os comandos devem ficar livres de lógica de aplicação: interpretam a requisição, acionam o domínio e deixam dados para a apresentação; se fizerem mais, viram um script de transação emaranhado.
- **Request e Response:** objetos próprios em vez de ler `$_GET`/`$_POST` direto: evitam globais, permitem filtrar a entrada e rodar pela linha de comando ou em testes. O livro cita o padrão PSR-7 e pacotes (Slim, Nyholm/psr7) que o seguem. A saída (código de resposta, cabeçalhos e corpo) é encapsulada na resposta.
- **ViewManager:** localiza o modelo e o inclui com os dados, usando buffer de saída.

## Roteamento mais flexível

O livro propõe trocar o mapa de comandos por um componente de rotas: ações com uma assinatura fixa (requisição, gerenciador de visão, resposta e, opcionalmente, um vetor de curingas), que podem ser métodos de uma classe, funções anônimas ou comandos, obtidos pelo contêiner de DI; e caminhos com curingas, como `/view-company/{companyId}`. Roteadores de frameworks (Slim, Symfony) fazem isso e mais, com cache.

## Como se relaciona

Para o controle de fluxo e de visões, o livro apresenta o Application Controller (de leitura apenas inicial). O Page Controller é a alternativa mais leve (ver controlador de página). Complementa a arquitetura em camadas e o uso de contêiner de DI (ver registry e regra do contêiner).

## Notas do Claude

Para a stack do projeto (PHP puro e hospedagem compartilhada), um `index.php` único com roteamento simples costuma bastar; a decisão entre controlador frontal e de página deve considerar o tamanho do sistema (inferência minha, a partir do livro).

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[controlador-de-pagina-page-controller]] — «Controlador de página» cita esta nota ao explicar suas relações
- [[request-e-response-como-objetos]] — «Objetos de requisição e de resposta» cita esta nota ao explicar suas relações
- [[arquitetura-em-camadas]] — «Arquitetura em camadas de aplicações corporativas» cita esta nota ao explicar suas relações
- [[visao-com-modelo-e-auxiliar-de-visao]] — «Visão com modelo» cita esta nota ao explicar suas relações
- [[regra-container-de-di-so-nas-bordas]] — o contêiner de DI monta os componentes do controlador
- [[gerenciar-o-historico-em-aplicacoes-de-uma-pagina]] — as rotas de uma página de aplicação lembram um controlador frontal no cliente
- [[padrao-mvc-modelo-visao-controlador]] — o controlador frontal recebe as requisições do MVC
- [[padrao-decorator]] — o pipeline de requisição lembra os filtros do controlador frontal
- [[padrao-command]] — é a versão simplificada do controlador frontal
