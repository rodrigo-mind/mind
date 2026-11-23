---
titulo: "Acoplamento e desacoplamento (coupling and decoupling)"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Matt Zandstra, PHP 8 Objects, Patterns, and Practice, cap. 8, seção Decoupling (PDF p. 278-283)"
confianca: media
criado: 2026-11-22
atualizado: 2026-11-22
---

# Acoplamento e desacoplamento

## Definição

Há acoplamento forte quando uma mudança em um componente exige muitas mudanças em outros. O objetivo é o contrário: componentes independentes, que mudam sem efeito dominó. Reutilização é um dos objetivos da orientação a objetos, e o acoplamento forte é o seu inimigo.

Dois focos do livro:

- **Lógica duplicada:** quando a mesma lógica de custo aparece em duas classes irmãs, uma mudança em uma exige a mesma mudança na outra. Concentrar a lógica em um tipo (a estratégia) a deixa em um só lugar.
- **Dependência da plataforma:** a dependência de um banco de dados é inevitável, o problema é espalhar o código que fala com o banco pelo projeto. O remédio é agrupar esse código atrás de uma interface limpa, escondendo a implementação. O livro cita o projeto DBAL (camada de abstração de banco), em que uma chamada devolve uma implementação concreta de uma interface de driver conforme os parâmetros de configuração.

## Por que importa

No exemplo do livro, um sistema que precisa notificar um administrador por e-mail ou por mensagem de texto não deve chamar as classes de envio diretamente. A classe cliente (`RegistrationMgr`) trabalha com um tipo `Notifier`, e a escolha do notificador concreto fica numa configuração flexível. Trocar o meio de notificação deixa de exigir mudanças em muitos lugares.

## Como se relaciona

É o complemento de composição em vez de herança. A regra de acesso ao banco com PDO é uma aplicação em PHP da ideia de agrupar o acesso a dados atrás de um ponto único (ver acesso ao banco com PDO).

## Notas do Claude

Confiança média: li o problema, o exemplo do banco e o início do exemplo de notificação; o restante do capítulo 8 (acoplamento e coesão, ortogonalidade e os conselhos finais) não foi lido.

## Conexões

- [[mapa-php-8-objects-patterns-and-practice]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[padroes-de-projeto]] — «Padrões de projeto» cita esta nota ao explicar suas relações
- [[composicao-em-vez-de-heranca]] — esta nota cita a ideia de «Composição em vez de herança» na seção sobre como se relaciona
- [[acesso-ao-banco-com-pdo]] — esta nota cita a ideia de «Acesso ao banco com PDO» na seção sobre como se relaciona
- [[responsabilidade-coesao-e-ortogonalidade]] — «Responsabilidade, coesão e ortogonalidade no projeto orientado a objetos» cita esta nota ao explicar suas relações
- [[mapeador-de-dados-data-mapper]] — o mapeador isola o modelo do banco, aplicando o desacoplamento
- [[padroes-adapter-e-factory]] — «Padrões Adapter e Factory» cita esta nota ao explicar suas relações
- [[servicos-web-rest-soap-e-wsdl]] — a SOA se baseia em acoplamento frouxo
- [[testes-unitarios-em-php-com-phpunit]] — código desacoplado é mais fácil de testar e de simular com mocks
- [[interfaces-classes-abstratas-traits-e-classes-anonimas-em-php]] — programar para interfaces reduz o acoplamento
- [[conteiner-de-injecao-de-dependencias-como-funciona]] — «Contêiner de injeção de dependências: como funciona» cita esta nota ao explicar suas relações
- [[padrao-facade]] — «Padrão Facade» cita esta nota ao explicar suas relações
- [[padrao-observer]] — «Padrão Observer» cita esta nota ao explicar suas relações
- [[principios-de-projeto-orientado-a-objetos-resumo]] — «Princípios de projeto orientado a objetos: resumo do livro» cita esta nota ao explicar suas relações
- [[regra-centralize-as-classes-reutilizaveis-em-vez-de-copiar]] — cópias entre projetos são acoplamento em escala maior
- [[disparar-eventos-personalizados-com-customevent]] — eventos próprios são um meio de desacoplar módulos do front-end
