---
titulo: "Arquitetura em camadas de aplicações corporativas"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 12, seção Architecture Overview (PDF p. 443-448)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Arquitetura em camadas

## Definição

Uma aplicação corporativa típica se divide em camadas (tiers), com responsabilidades distintas:

| Camada | Papel |
|---|---|
| Visão (view) | A interface que o usuário vê; apresenta o resultado e oferece o meio para a próxima requisição |
| Comando e controle | Processa a requisição, delega à lógica de negócio o que for preciso e escolhe a visão mais adequada |
| Lógica de negócio | Faz as contas e monta os dados, resolve o problema do negócio |
| Dados | Isola o resto do sistema dos detalhes de guardar e obter informação persistente |

As duas primeiras costumam formar a camada de apresentação, mas o papel de exibir deve ficar estritamente separado do de tratar requisições e acionar a lógica. A divisão não é rígida; camadas podem se juntar.

## Por que importa

- **Desacoplamento:** se a lógica independe da visão, dá para acrescentar uma interface (linha de comando para administradores, versão para celular, API REST) sem reescrever. Mudar a forma de armazenar também afeta pouco as outras camadas.
- **Teste:** aplicações web são difíceis de testar; com camadas, cada uma pode ser trocada por objetos de teste (stubs ou mocks) que fazem o papel dela.
- **Menos duplicação e mudanças verticais:** um recurso novo exige mudanças "verticais", uma em cada camada, e não "horizontais" espalhadas por dezenas de páginas.

## Como se relaciona

Os padrões do capítulo se distribuem por camadas: controlador frontal e de página, visão com modelo, script de transação e modelo de domínio (ver controlador frontal e demais notas do capítulo). O acesso aos dados fica nos padrões de banco de dados.

## Notas do Claude

Os exemplos do livro usam um sistema fictício de listagem de eventos ("Woo"), simplificado e sem tratamento de erros; as notas deste capítulo trazem a ideia, e não o código.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[front-controller-em-php]] — esta nota cita a ideia de «Controlador frontal» na seção sobre como se relaciona
- [[script-de-transacao-e-modelo-de-dominio]] — esta nota cita a ideia de «Script de transação» na seção sobre como se relaciona
- [[visao-com-modelo-e-auxiliar-de-visao]] — a visão é uma das camadas
- [[padroes-de-banco-de-dados-visao-geral]] — a camada de dados é detalhada nos padrões de banco de dados
- [[padrao-mvc-modelo-visao-controlador]] — o MVC é uma forma de separar camadas
- [[padrao-facade]] — é o ponto de entrada de uma camada
