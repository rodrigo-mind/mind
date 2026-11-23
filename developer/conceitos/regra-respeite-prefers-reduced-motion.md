---
titulo: "Respeite a preferência de movimento reduzido (prefers-reduced-motion)"
tipo: regra
origem: destilar
assunto: developer
fontes:
  - "Keith J. Grant, CSS in Depth, 2ª ed., cap. 15, quadro Accessibility, Reduced motion (PDF p. 444-445), e cap. 8 (estilos de reset)"
confianca: alta
criado: 2026-11-22
atualizado: 2026-11-22
---

# Respeite a preferência de movimento reduzido

## Regra

Todo site com transições ou animações deve desligá-las quando o usuário pedir movimento reduzido, com a media query `prefers-reduced-motion: reduce`.

## Por quê

Algumas pessoas têm distúrbios vestibulares, em geral um problema no ouvido interno, que causam desconforto com movimento na tela. Os sistemas operacionais permitem pedir menos movimento, e o CSS consegue ler esse pedido.

## Quando não vale

Animações essenciais para entender o conteúdo, como um indicador de carregamento, podem continuar, mas de forma mais discreta (inferência minha).

## Como verificar

O CSS base deve ter o bloco abaixo, que o livro sugere pôr nos estilos de reset:

```css
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
```

Para testar, ative "reduzir movimento" no sistema operacional ou emule a opção nas ferramentas do navegador.

## Notas do Claude

O livro usa `0.01ms`, e não `0`, para que os eventos de fim de animação e de transição continuem disparando. O motivo é inferência minha.

## Conexões

- [[animacoes-com-keyframes-em-css]] — a regra se aplica às animações com keyframes
- [[developer]] — nota destilada ligada a este assunto: regra de livro-base
- [[criar-transicoes-em-css]] — o passo final das transições é respeitar esta regra
- [[regra-garanta-o-contraste-minimo-do-texto-wcag]] — ambas são regras de acessibilidade da apresentação
- [[mapa-css-in-depth]] — o mapa acompanha a destilação do livro de que esta nota veio
