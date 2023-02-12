<?php 
    session_start();
    if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        header("Location: login.html");
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
    <script src='script.js'></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    
</head>
<body>


    <div class="container">

        <header> 

            <div class="header_n1">
                
                <img src='Images/Logotipo Online Shopping Azul Simples.png' onClick="location.href='main.php'" >
            </div>

            <div class="header_n2">
                <div class="search_box">
                    <!-- <span class="material-symbols-outlined" id="search_button" onclick=''> Search </span> -->
                        <div class="search_bar"> 
                            <form method="GET" name="form" action="main.php">
                                <input type="text" id="search_bar_input" name="data" placeholder= "O que você deseja? " onchange='search_data()'>
                                <button type='button'> submit </button>

                                <?php
                                    if(!empty($_GET['search']))
                                    {
                                        $search_value = $_GET['search'];
                                        $items = file_get_contents("items.json");
                                        $obj_items = json_decode($items);
                                        $variavel_sessão = [];

                                        for($x = 0; $x < count($obj_items); $x++)
                                        {

                                            $valor_a = $obj_items[$x]->name;    
                                            if(stripos($valor_a, $search_value) !== FALSE)
                                            {
                                                array_push($variavel_sessão, $valor_a);                                             
                                            }
                                            
                                        }

                                    print_r($variavel_sessão);
                                    $_SESSION['searched_items_array'] = $variavel_sessão;
                                    header("Location: searched_items.php");
                                    } 
                                    else 
                                    {
                                        echo "não tem nada";
                                    }
                                ?>
                            </form>

                        </div>
                </div>
                
            </div>

            <div class="header_n3">

                <?php
                    if(!empty($login_true))
                    {
                        echo "<a> Bem vindo <br> <i> $login_true </i>  </a>";
                    }
                ?>
                <span class='material-symbols-outlined' onClick="location.href='logout.php'"> Logout </span>
                <span class="material-symbols-outlined" onClick="location.href='cart.php'"> Shopping_cart </span>
            </div>
            
        </header>



        <div class="main">


            <div class="slider">

                <div class="slide">

                    <span class="material-symbols-outlined" id="previous_button" onclick="navigation_slider_previous()"> chevron_left </span>
                    <span class="material-symbols-outlined" id="next_button" onclick="navigation_slider_next()"> chevron_right </span>
                    
                    <div id="slider_image">

                    </div>
                </div>

            </div>

            <h1 id="promotions_title"> As 10 promoções mais quentes </h1>

            <div id="promotions">
                    
            </div>

            <h1 id="best_sellers_title"> Os 10 mais vendidos </h1>

            <div id="best_sellers"> </div>
        </div>  

        <footer>

            <ul id="customer_service">

                <li id="subtitle"> ATENDIMENTO AO CLIENTE </li>
                <li> Central de Ajuda</li>
                <li> Como Comprar</li>
                <li> Métodos de Pagamento</li>
                <li> Sobre Garantias</li>
                <li> Devoluções e Reembolso</li>
                <li> Contate-nos</li>
                <li> Reclamações </li>

            </ul>

            <ul id="about_discontada"> 

                <li id="subtitle"> SOBRE A DISCONTADA </li>
                <li> Sobre nós</li>
                <li> Nossas Políticas</li>
                <li> Política de Privacidade</li>
                <li> Ofertas Relâmpago</li>
                <li> Devoluções e Reembolso</li>
                <li> Imprensa</li>

            </ul>   

            <ul id="social_networks"> 

                <li id="subtitle"> REDES SOCIAIS </li>
                <li> Instagram </li>
                <li> Tiktok </li>
                <li> Twitter </li>
                <li> Facebook </li>
                <li> Linkedln</li>

            </ul>  


        </footer>




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