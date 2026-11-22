---
titulo: "Padrão MVC (modelo, visão e controlador)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 12, seções 12.1 e 12.2 (PDF p. 550-563)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Padrão MVC (modelo, visão e controlador)

## Definição

Um padrão de projeto é uma solução com nome para um problema recorrente; a ideia vem da arquitetura (Christopher Alexander, *A Pattern Language*, 1977) e chegou à programação com o livro *Design Patterns* (1994) e com *Patterns of Enterprise Application Architecture*, de Martin Fowler. Os autores avisam que a eficácia dos padrões é difícil de provar: usá-los envolve alguma convicção.

O **MVC** separa uma aplicação web em três componentes:

- **Modelo (model):** os dados da aplicação (por exemplo, vindos do banco); existe uma variante, o modelo de visão (view model), feito para uma visão específica.
- **Visão (view):** exibe as informações, essencialmente modelos de HTML.
- **Controlador (controller):** recebe as requisições HTTP e controla as visões.

A visão não conhece os controladores, e o modelo não sabe a que visão pertence.

**O problema que resolve:** um único arquivo com PHP, HTML e CSS. Dados de conexão ao banco copiados em todo arquivo (um desastre se mudam; os `include` resolvem só isso), e equipes diferentes (interface, PHP, banco) pisando umas nas outras.

**Custo e momento:** a divisão em três aumenta o esforço inicial e se paga no longo prazo, pela reutilização; faz sentido a partir de certo tamanho, embora também sirva a aplicações pequenas.

Um exemplo do livro (Laminas): o modelo gera um número da sorte; o controlador cria o modelo e o passa à visão como `ViewModel`; a visão (`.phtml`) o exibe; uma configuração de **rotas** liga a URL ao controlador. Os nomes de pastas de visão usam hífen, para servidores que ignoram maiúsculas.

## Por que importa

Dá a estrutura que permite mudar a interface, a lógica e o banco de modo independente.

## Como se relaciona

Mais detalhes em arquitetura em camadas, controlador de página (page controller), front controller em PHP, visão com modelo e auxiliar de visão e padrões de projeto.

## Notas do Claude

O projeto usa PHP sem framework: o MVC pode ser aplicado só com pastas e arquivos (um `index.php` como controlador frontal, classes de modelo e arquivos de visão), sem instalar o Laminas (inferência minha).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[controlador-de-pagina-page-controller]] — esta nota cita a ideia de «Controlador de página» na seção sobre como se relaciona
- [[padroes-de-projeto]] — esta nota cita a ideia de «Padrões de projeto» na seção sobre como se relaciona
- [[visao-com-modelo-e-auxiliar-de-visao]] — esta nota cita a ideia de «Visão com modelo» na seção sobre como se relaciona
- [[arquitetura-em-camadas]] — o MVC é uma forma de separar camadas
- [[front-controller-em-php]] — o controlador frontal recebe as requisições do MVC
- [[divida-tecnica]] — a mistura de PHP, HTML e CSS em um arquivo cria dívida técnica
- [[padroes-adapter-e-factory]] — o exemplo do adaptador usa o modelo de uma aplicação MVC
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — o contêiner monta as peças de uma aplicação MVC
- [[padrao-command]] — o comando faz o papel de ação do controlador
- [[padrao-strangler]] — a visão e as rotas são o primeiro trecho a trocar
