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
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Discontada Shoes </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script type="text/javascript" src='script.js'></script>
    <script type="text/javascript" src="searched_items.php"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    
</head>
<body>


    <div class="container">


    <?php  include 'C:/xampp/htdocs/Projeto_01/templates/header.php'; ?>

        <div class="main">

            <div id="buy_screen"></div>

            <div class="slider">

                <div class="slide">

                    
                    <div id="slider_image">

                    </div>
                    <span class="material-symbols-outlined" id="previous_button" onclick="navigation_slider_previous()"> chevron_left </span>
                    <span class="material-symbols-outlined" id="next_button" onclick="navigation_slider_next()"> chevron_right </span>
                </div>

            </div>

            <h1 id="promotions_title"> As 10 promoções mais quentes </h1>

            <div id="promotions">
                    
            </div>

            <h1 id="best_sellers_title"> Os 10 mais vendidos </h1>

            <div id="best_sellers"> </div>
        </div>  

        <?php  include 'C:/xampp/htdocs/Projeto_01/templates/footer.php'; ?>




    </div>
    
</body>

<script>
    var search = document.getElementById("search_bar_input");
    function search_data() {
        location.href = 'main.php?search=' + search.value;
        console.log(search);
    };

</script>


<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</html>