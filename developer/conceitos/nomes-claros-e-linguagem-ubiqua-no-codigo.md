---
titulo: "Nomes claros e linguagem ubíqua no código"
tipo: conceito
origem: destilar
assunto: developer
fontes:
  - "Joseph Edmonds e Lorna Jane Mitchell, The Art of Modern PHP 8, cap. 7, seção Clear naming, Ubiquitous language, More smaller methods e Self-documenting (EPUB, sem páginas)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Nomes claros e linguagem ubíqua no código

## Definição

O livro resume o código limpo na ideia de escrever para ser entendido (KICK, sigla que o autor admite ter inventado). Os pontos:

- **Nomes completos e descritivos** para variáveis, classes e métodos; alguns caracteres a mais custam pouco (o autocompletar da IDE ajuda) e poupam a decifração depois. Evite siglas e seja "chato": sem vocabulário próprio, de modo que qualquer leitor saiba o que o item é ou faz. No exemplo do livro, `$isDME` não diz nada, ao contrário de `$isDebugModeEnabled`.
- **Linguagem ubíqua** (ubiquitous language, termo do projeto orientado ao domínio): use no código o mesmo jargão que o cliente usa nas conversas, nas especificações e nas reuniões. Se o cliente fala em "leads", a classe é `LeadEntity`, e não `EnquiryEntity`. As siglas do cliente devem ser desdobradas no código (por exemplo, `RequestForProposalEntity` para RFP).
- **Mais métodos, menores**, com nomes que começam por verbo (`getItem`, `validateItem`, `saveItem`) ou por `is`/`has`/`can` quando devolvem um booleano; a regra se quebra quando faz sentido (interfaces fluentes).
- **Código autodocumentado:** com nomes assim, os docblocks explicativos tornam-se quase dispensáveis.

## Por que importa

Reduz o tempo de compreensão, facilita a conversa com o cliente e a manutenção.

## Como se relaciona

Veja dívida técnica, princípios SOLID, retorno antecipado e complexidade ciclomática, e tipos de objeto e herança de tipos.

## Conexões

- [[mapa-the-art-of-modern-php-8]] — o mapa do livro lista esta nota como gerada pela destilação
- [[developer]] — nota destilada ligada a este assunto: conceito de livro-base
- [[complexidade-ciclomatica]] — esta nota cita a ideia de «Complexidade ciclomática» na seção sobre como se relaciona
- [[divida-tecnica]] — código difícil de ler é uma fonte de dívida técnica
- [[principios-solid]] — ambos tratam de clareza e foco do código
- [[regra-nao-repita-valores-use-constantes-nomeadas]] — constantes nomeadas também documentam o código
- [[regra-use-retorno-antecipado-em-vez-de-condicionais-aninhadas]] — as duas melhoram a legibilidade
