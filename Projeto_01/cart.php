<?php
    session_start();
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        header("Location: login.php");
    }
    else 
    {
        $login_true = $_SESSION['login'];
    }
    $searched_items_array = $_SESSION['searched_items_array']; 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Página de Carrinho </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='script.js'></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">

    <?php  include 'C:/xampp/htdocs/Projeto_01/templates/header.php'; ?>

        <div class="main">

            <div id="buy_screen"></div>

            <h1 id="cart_title"> Itens no carrinho:  </h1>
            <div id="cart_screen" style="flex:none; flex-wrap: wrap;"> 

            <div id="cart_items"> 

            </div>

            <div id="buy_cart_items">
                <button type="button" class="button_cart_items" onclick="buy_all_items()"> Comprar todos os itens do carrinho </button>
            <div>

        </div>



        </div>

    <?php  include 'C:/xampp/htdocs/Projeto_01/templates/footer.php'; ?>
    
</body>

<script>

    <?php $searched_items_array = $_SESSION['searched_items_array']; ?>
    const item_array = <?php echo json_encode($searched_items_array); ?>;

    const itemsDiv_cart = document.getElementById("cart_items");
    const contents_cart = [];

    var obj_item_array = JSON.parse(sessionStorage.obj_item_array);
    var obj_chosed_item_a = JSON.parse(sessionStorage.obj_chosed_item);

    let items_id = [];
    
    // console.log(obj_item_array); // Passa todos os itens pesquisados
    // console.log(obj_chosed_item); // Passa o id de todos os elementos clicados

    const buy_all_items_length = obj_chosed_item.length;
    const buy_all_items_prices = [];

    function buy_all_items() {
        let buy_all_items_sum = buy_all_items_prices.reduce((a, b) => a + b, 0)
        alert("O valor de contra de todos os produtos do carrinho é: " + buy_all_items_sum);
        };
    
    for(i = 0; i < obj_item_array.length; i++) {
        items_id.push(obj_item_array[i].id);
    }
    
    for(x = 0; x < obj_chosed_item.length; x++) {
        for(i = 0; i < obj_item_array.length; i++) {
            if(obj_chosed_item[x] == items_id[i]) {
                let id = obj_item_array[i].id;
                let name = obj_item_array[i].name;
                let image = obj_item_array[i].image;
                let price = obj_item_array[i].price;
                let oldPrice = obj_item_array[i].oldPrice;
                let discount_percent = obj_item_array[i].discount_percent;
                let sales = obj_item_array[i].sales;

                buy_all_items_prices.push(obj_item_array[i].price);

                contents_cart.push(
                    `
                        <div class="card" id="`+id+`" onclick='buy_screen()' style="width: 230px; height: auto; margin: 2rem; flex: none; name="card` + i + `">
                            <img src="` + image + `" class="image" id="`+id+`" alt="Avatar" style="width:100%; height: 60%; onclick="buy_screen()">
                            <h4 class="item_name" id="`+id+`" onclick='buy_screen()'> `+ name + ` </h4>
                            <div class="values" id="`+id+`" onclick="buy_screen()" >
                            <a class="oldPrice" id="`+id+`" > R$ ` + oldPrice + ` reais </a>
                            <br>
                            <span class="material-symbols-outlined" id="card_span_icon"> arrow_downward </span>
                            <a class="discount_percentage" id="`+id+`" > - ` + discount_percent + `%</a>
                            <br>
                            <a class="price" id="`+id+`" > R$ ` + price + ` reais</a>
                            </div>
                            <br>
                            <a class="sales_reviews" id="`+id+`" > Vendidos: ` + sales + `</a>
                            <br>

                        </div>
                    `
                
                    );
                itemsDiv_cart.innerHTML = contents_cart.join('\n');

        }
    }};
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</html>