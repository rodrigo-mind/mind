---
titulo: "Serialização de objetos em PHP"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Christian Wenz e Tobias Hauser, PHP and MySQL: The Comprehensive Guide, cap. 11, seção 11.4.7 (PDF p. 514-517)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Serialização de objetos em PHP

## Definição

Para guardar ou enviar um objeto como texto (por exemplo, em um cookie), `serialize($objeto)` o converte em string e `unserialize($texto)` o reconstrói; a classe precisa existir na hora de reconstruir. O livro manda não editar o texto serializado à mão: qualquer pequena alteração estraga a desserialização.

Os métodos `__sleep()` (devolve um vetor com os nomes das propriedades que serão mantidas) e `__wakeup()` (reatribui valores ou refaz a conexão com o banco ao reconstruir) controlam o que vai e o que volta. As propriedades fora da lista voltam ao valor padrão da classe.

## Por que importa

Aparece em sessões (que guardam dados serializados) e em arquivos de dados simples.

## Como se relaciona

O exemplo do livro de visitas em arquivo usa `serialize` (ver trave o arquivo ao ler e gravar); sessões em regra de sessões seguras.

## Notas do Claude

Não use `unserialize` em dados que o usuário possa alterar (cookies, campos, arquivos enviados): a reconstrução de objetos arbitrários pode executar código (o livro *The Art of Modern PHP 8* confirma o risco e manda usar `allowed_classes` ou JSON; ver não desserialize dados não confiáveis). Para dados vindos de fora, prefira JSON (ver criar e consumir uma API REST simples).

## Conexões

- [[mapa-php-and-mysql-the-comprehensive-guide]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[regra-sessoes-seguras-em-php]] — esta nota cita a ideia de «Use sessões PHP só com cookie e proteja o identificador» na seção sobre como se relaciona
- [[metodos-magicos-e-constantes-magicas-do-php]] — __sleep e __wakeup fazem parte da serialização
- [[regra-trave-o-arquivo-ao-ler-e-gravar]] — o exemplo de livro de visitas usa serialize
- [[regra-nunca-confie-na-entrada-do-usuario]] — desserializar dados externos é perigoso
- [[criar-instancias-por-clone-reflexao-e-serializacao]] — «Criar instâncias por clone, reflexão e serialização» cita esta nota ao explicar suas relações
- [[regra-nao-desserialize-dados-nao-confiaveis]] — corrige e confirma o alerta daquela nota
