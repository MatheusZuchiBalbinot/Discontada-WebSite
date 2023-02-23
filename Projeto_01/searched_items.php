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
                <button type="button" class="config_button" onclick="searched_item_config()"> Ordenar por <span class="material-symbols-outlined" id="menu_icon" style="margin-left: 0.5rem;  ">menu</span></button>
                <div id="config_select_buttons" onclick="searched_item_config()" style="padding: 1vw;"> 
                        <input type="radio" name="radio-btn" id="lower_value"> Ordenar pelo mais barato </input>
                        <br>
                        <input type="radio" name="radio-btn" id="highiest_value"> Ordenar pelo mais caro </input>
                        <br>
                        <input type="radio" name="radio-btn" id="best_seller"> Ordenar pelo mais vendido </input>
                        <br>
                        <input type="radio" name="radio-btn" id="biggest_discount"> Ordenar pelo maior desconto </input>
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

    let obj = [];
    obj = item_array;

    function searched_item_config() {
        if(document.getElementById('lower_value').checked == true) {
                for(let i = 0; i < obj_item_array.length; i++) {
                
                obj = obj_item_array.sort((a, b) => {
                    if (a.price < b.price) {
                        return -1;
                    }
                });
            } 
            document.getElementById('lower_value').checked = true;
            window.location.reload();
        };
        if(document.getElementById('highiest_value').checked) {
            for(let i = 0; i < obj_item_array.length; i++) {
            
            obj = obj_item_array.sort((a, b) => {
                if (a.price > b.price) {
                    return -1;
                }
                });
            } 
            document.getElementById('highiest_value').checked = true;
            window.location.reload();
        };
        if(document.getElementById('best_seller').checked) {
            for(let i = 0; i < obj_item_array.length; i++) {
            
            obj = obj_item_array.sort((a, b) => {
                if (a.sales > b.sales) {
                    return -1;
                }
                });
            } 
            document.getElementById('best_seller').checked = true;
            window.location.reload();
        };
        if(document.getElementById('biggest_discount').checked) {
            for(let i = 0; i < obj_item_array.length; i++) {
            
            obj = obj_item_array.sort((a, b) => {
                if (a.discount_percent > b.discount_percent) {
                    return -1;
                }

                });
            } 
            document.getElementById('biggest_discount').checked = true;
            window.location.reload();
        };
        var obj_storage = obj;
        sessionStorage.setItem("obj_storage", JSON.stringify(obj_storage));
        // console.log(obj_storage);
    }

    function search_items() {

        var obj_storage = JSON.parse(sessionStorage.obj_storage);

        const itemsDiv_all_items = document.getElementById("all_items");
        const contents_all_items = [];


        for (var i = 0; i < item_array.length; i++){

            if(main_items_dict.includes(item_array[i].id) != true) {
                main_items_dict.push(item_array[i].id);
                // console.log(main_items_dict); // Está correto, o problema é o ID que está sendo adicionado errado;
            }

            let id = obj_storage[i].id;
            let name = obj_storage[i].name;
            let image = obj_storage[i].image;
            let oldPrice = obj_storage[i].oldPrice;
            let price = obj_storage[i].price;
            let discount = obj_storage[i].discount_percent;
            let sales = obj_storage[i].sales;


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