# Discontada-WebSite

Breve descrição do projeto:

O site proposto utiliza de HTML, CSS, JAVASCRIPT, PHP, MYSQL e um arquivo JSON, para simular um site de venda de tênis. O projeto roda no localhost usando o Xamp e o Apache, e conta com: uma página de registro e login com validação usando PHP conectado com o MYSQL, uma página principal denominada 'main' que conta com um header e um footer - que é comum a outras duas páginas, mas comentarei delas posteriormente -, no 'main' é possível visualizar os cards que foram criados consumindo o arquivo JSON, nessa página em específico, os elementos mostrados são os que possuem os 10 maiores desconstos e os 10 que estão sendo mais "vendidos". O Header comentado anteriormente contém: a logo do site, uma barra de pesquisa e, no canto superior direito, mostra o nome do usuário conectado, um ícone de logout, para o usuário sair da sessão e um ícone que leva ao carrinho.
Quando o usuário executar qualquer pesquisa na barra de pesquisa, ele será redirecionado para uma página diferente que leva no URL o que foi pesquisado, nessa página o usuário pode escolher a forma com que os itens pesquisados serão demonstrados, onde você pode ordenar: pelo mais barato, pelo mais caro, pelo com maior promoção e pelo mais vendido. Quando um item for adicionado ao carrinho aparecerá uma mensagem no canto inferior dizendo o nome do item que foi adicionado.
Ademais, cada cart possui também uma tela própria que é aberta em cima da sessão atual que permite ele colocar o item em destaque e colocar ele no carrinho, cada item colocado no carrinho poderá ser acessado quando o usuário clicar no ícone referente. Quando na aba de carrinho o usuário poderá ver o que foi colocado e, se quiser, poderá remover algum item selecionado, ele pode também, a qualquer momento, executar a compra de todos os itens do carrinho.
