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
    <title> Item pesquisado </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='script.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">

        <?php  include 'C:/xampp/htdocs/Projeto_01/templates/header.php'; ?>

        <div class="main">
            <div id="buy_screen"></div>

            <h1 id="all_items_title"> Itens encontrados:  </h1>

            <div id="controller_options"> 
                <button type="button" class="config_button"> Ordenar por <span class="material-symbols-outlined" id="menu_icon" style="margin-left: 0.5rem;  ">menu</span></button>
                <div id="config_select_buttons" style="padding: 1vw;"> 
                    <input type="radio"> Ordenar pelo mais barato </input>
                    <br>
                    <input type="radio"> Ordenar pelo mais caro </input>
                    <br>
                    <input type="radio"> Ordenar pelo mais vendido </input>
                    <br>
                    <input type="radio"> Ordenar pelo maior desconto </input>
                </div>
            </div>
            
            <div id="all_items" style="display:flex; flex:none;">

            </div>

        </div>

        <?php  include 'C:/xampp/htdocs/Projeto_01/templates/footer.php'; ?>

    </div>

</body>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<script>
    <?php $searched_items_array = $_SESSION['searched_items_array']; ?>
    var search = document.getElementById("search_bar_input");
    function search_data() {
        location.href = 'searched_items.php?search=' + search.value;
        console.log(search);
    };
    const item_array = <?php echo json_encode($searched_items_array); ?>;
    function search_items() {

        const itemsDiv_all_items = document.getElementById("all_items");
        const contents_all_items = [];

        for (var i = 0; i < item_array.length; i++){
            let id = item_array[i].id;
            let name = item_array[i].name;
            let image = item_array[i].image;
            let oldPrice = item_array[i].oldPrice;
            let price = item_array[i].price;
            let discount = item_array[i].discount_percent;
            let sales = item_array[i].sales;

            contents_all_items.push(
                `
            <div class="card" id="`+id+`" onclick='buy_screen()' style="width: 230px; height: auto; margin: 2rem; flex: none; name="card` + i + `">
                <img src="` + image + `" class="image" id="`+id+`" alt="Avatar" style="width:100%; height: 60%; onclick="buy_screen()">
                <h4 class="item_name" id="`+id+`" onclick='buy_screen()'> `+ name + ` </h4>
                <div class="values" id="`+id+`" onclick="buy_screen()" >
                <a class="oldPrice" id="`+id+`" > R$ ` + oldPrice + ` reais </a>
                <br>
                <span class="material-symbols-outlined" id="card_span_icon"> arrow_downward </span>
                <a class="discount_percentage" id="`+id+`" > - ` + discount + `%</a>
                <br>
                <a class="price" id="`+id+`" > R$ ` + price + ` reais</a>
                </div>
                <br>
                <a class="sales_reviews" id="`+id+`" > Vendidos: ` + sales + `</a>
                <br>

            </div>
            `
            
            );
        }
        itemsDiv_all_items.innerHTML = contents_all_items.join('\n');
    };

    const chosed_item_dict = [];

    function buy_screen() {

            document.addEventListener('click', (e) => {
            var clicked_item = e.target.id;
            for(var i = 0; i < item_array.length; i++) {
                if(item_array[i].id == clicked_item) {
                    var buy_screen_div = document.getElementById("buy_screen").innerHTML = `<div id="screen"  style="width: 50vw; height: 80vh; background-color: white; color: black; position: fixed; box-shadow: 0 0 0 99999px rgba(0, 0, 0, .8); z-index: 1; justify-content: center; left: 25vw; padding: 0; margin: 0;"></div> `;
                    var screen_location =  document.getElementById("screen");

                    const itemsDiv_screen = document.getElementById("screen");
                    const contents_screen = [];


                    if(chosed_item_dict.includes(item_array[i].id) != true) {

                        chosed_item_dict.push(item_array[i].id);

                    }

                    contents_screen.push(
                        `
                    <div class="searched_card" onclick='buy_screen()' name="card` + i + `">
                        <img src="` + item_array[i].image + `" class="searched_image" alt="Avatar">
                        <div class="searched_values" onclick="buy_screen()" >
                        <h4 class="searched_item_name"> `+ item_array[i].name + ` </h4>
                        <a class="searched_oldPrice"  > R$ ` + item_array[i].oldPrice + ` </a>
                        <br>
                        <span class="material-symbols-outlined" id="card_span_icon"> arrow_downward </span>
                        <a class="searched_discount_percentage"  > - ` + item_array[i].discount_percent + `%</a>
                        <br>
                        <a class="searched_price" > R$ ` + item_array[i].price + `</a>
                        <br>
                        <a class="searched_price" > Ou 4x de R$ ` + (item_array[i].price/4).toFixed(2) + `</a>
                        <br>
                        <a class="searched_sales_reviews" > Vendidos: ` + item_array[i].sales + `</a>
                        <br>
                        <div id="clicked_screen_buttons"> 
                            <button id="add_cart_clicked_screen_button" onclick='add_in_cart()' '>Adicionar ao carrinho</button>
                            <button type="button" id="skip_clicked_screen_button" onclick='document.getElementById("screen").style.display="none" '> Sair </button>
                        </div>
                        </div>
                    </div>
                    `
                
                    );
                itemsDiv_screen.innerHTML = contents_screen.join('\n');
                }
            }
            }); 
    };

    function add_in_cart() {
        console.log(chosed_item_dict);
        var chosed_item_dict_related = chosed_item_dict;
        sessionStorage.setItem("chosed_item_dict_related", JSON.stringify(chosed_item_dict_related));
    }
search_items();

</script>
</html>