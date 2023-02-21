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

        <h1 id="cart_title"> Itens no carrinho:  </h1>
        <div id="cart_screen" style="flex:none; flex-wrap: wrap;"> 

            <div id="cart_items"> 

            </div>

        </div>



        </div>

    <?php  include 'C:/xampp/htdocs/Projeto_01/templates/footer.php'; ?>
    
</body>

<script>

    <?php $searched_items_array = $_SESSION['searched_items_array']; ?>
    const item_array = <?php echo json_encode($searched_items_array); ?>;

    const itemsDiv_cart = document.getElementById("cart_items");
    const contents_cart = [];

    var obj_chosed_item = JSON.parse(sessionStorage.obj_chosed_item);

    let items_id = [];
    
    console.log(obj_item_array);
    console.log(obj_chosed_item);

    for(i = 0; i < item_array.length; i++) {
        items_id.push(item_array[i].id);
    }
    
    for(x = 0; x < obj.length; x++) {
        for(i = 0; i < item_array.length; i++) {
            if(obj[x] == items_id[i]) {
                let id = item_array[i].id;
                let name = item_array[i].name;
                let image = item_array[i].image;
                let price = item_array[i].price;
                let oldPrice = item_array[i].oldPrice;
                let discount_percent = item_array[i].discount_percent;
                let sales = item_array[i].sales;

                // console.log(id, name, image, price, discount_percent, sales);

                contents_cart.push(
                        `
                    <div class="card" onclick='buy_screen()' name="card` + i + `" style="margin: 2rem;">
                        <img src="` + image + `" class="image" alt="Avatar">
                        <div class="values" onclick="buy_screen()" >
                        <h4 class="item_name"> `+ name + ` </h4>
                        <a class="oldPrice"  > R$ ` + oldPrice + ` </a>
                        <br>
                        <span class="material-symbols-outlined"> arrow_downward </span>
                        <a class="discount_percentage"  > - ` + discount_percent + `%</a>
                        <br>
                        <a class="price" > R$ ` + price + `</a>
                        <br>
                        <br>
                        <a class="sales_reviews" > Vendidos: ` + sales + `</a>
                        <br>
                        </div>
                    </div>
                    `
                
                    );
                itemsDiv_cart.innerHTML = contents_cart.join('\n');

        }
    }};
</script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</html>