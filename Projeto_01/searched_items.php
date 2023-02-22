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
                    <input type="radio" id="lower_value"> Ordenar pelo mais barato </input>
                    <br>
                    <input type="radio" id="highiest_value"> Ordenar pelo mais caro </input>
                    <br>
                    <input type="radio" id="best_seller"> Ordenar pelo mais vendido </input>
                    <br>
                    <input type="radio" id="biggest_discount"> Ordenar pelo maior desconto </input>
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

            if(main_items_dict.includes(item_array[i].id) != true) {
                main_items_dict.push(item_array[i].id);
                // console.log(main_items_dict); // Está correto, o problema é o ID que está sendo adicionado errado;
            }

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

    var obj_item_array = item_array;
    sessionStorage.setItem("obj_item_array", JSON.stringify(obj_item_array));
search_items();

</script>
</html>