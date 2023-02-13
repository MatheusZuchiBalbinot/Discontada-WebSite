<?php

    session_start();
    $searched_items_array = $_SESSION['searched_items_array'];
    print_r($searched_items_array);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='script.js'></script>
</head>
<body>
    <div class="container">

        <?php  include 'C:/xampp/htdocs/Projeto_01/templates/header.php'; ?>

        <div class="main">

            <div id="all_items">

            </div>

        </div>

        <?php  include 'C:/xampp/htdocs/Projeto_01/templates/footer.php'; ?>

    </div>

</body>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<script>

    var search = document.getElementById("search_bar_input");
    function search_data() {
        location.href = 'main.php?search=' + search.value;
        console.log(search);
    };

    const item_array = <?php echo json_encode($searched_items_array); ?>;
    const array_length = item_array.length / 6;
    for (var i = 0; i < array_length; i++){
        // console.log(array_length); == 5;
        console.log (i, i+6)
        if(i == 0){
            var b = item_array.splice(i,i+6);
        }
        else{
            var b = item_array.splice(i*6,i*6*2);
        }
        console.log(b);

        // const itemsDiv_all_items = document.getElementById("all_items");
        // const contents_all_items = [];

        // contents_all_items.push(
        //     `
        // <div style="width: auto; height: auto; background-color: red; margin: 2rem; flex: none; name="card ` + i + `;">
        //     <h4 style="padding: 0.7rem; text-align: center; background-color: green; color: white;"> Desconto de ` + item_array[] + `%  </h4>
        //     <img src="` + image_promotions + `" alt="Avatar" style="width:100%; height: 60%;">
        //     <h5> `+ name_promotions + ` </h5>
        //     <a> De: R$ ` + oldPrice_promotions + ` reais</a>
        //     <br>
        //     <a> Por: R$ ` + price_promotions + ` reais</a>
        //     <br>
        //     <a> Vendidos: ` + sales_promotions + `</a>
        // </div>
        
        // `
        // );

        // itemsDiv_all_items.innerHTML = contents_all_items.join('\n');
    }  

</script>
</html>