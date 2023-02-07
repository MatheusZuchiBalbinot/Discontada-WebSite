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
                
                <img src='Images/Logotipo Online Shopping Azul Simples.png' >
            </div>

            <div class="header_n2">
                <div class="search_box">

                    <span class="material-symbols-outlined" id="search_button"> Search </span>

                    <div class="search_bar"> 

                        <input type="text" class="search_bar_input" placeholder= "O que você deseja? ">
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
                <span class="material-symbols-outlined" onClick="location.href='cart.html'"> Shopping_cart </span>
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

            <h1 id="promotions_title"> Promoções mais quentes </h1>
            <div class="promotions">

                <div class="card", style="width: 200px; height: 250px; background-color: red; margin: 2rem;">
                    <h3 style="padding: 0.7rem; text-align: center; background-color: green; color: white;"> 23% DE DESCONTO </h3>
                    <img src="Images/Logotipo Online Shopping Azul Simples.png" alt="Avatar" style="width:100%; height: 60%;">
                    <h5> Item 1 </h5>
                    <a> R$ 200,00 reais</a>
                    <br>
                    <h11> 12x de 19,99</h11>
                    
                </div>
    
                <div id="card2", style="width: 200px; height: 250px; border: 1px solid gray; border-radius: 0.2rem; margin: 2rem;">
                    <h3 style="padding: 0.7rem; text-align: center; background-color: green; color: white;"> 17% DE DESCONTO </h3>
                    <img src="Images/Logotipo Online Shopping Azul Simples.png" alt="Avatar" style="width:100%; height: 60%;">
                    <h5> Item 2 </h5>
                    <a> R$ 200,00 reais</a>
                    <br>
                    <h11> 12x de 19,99</h11>
                </div>
    
                <div class="card3", style="width: 200px; height: 250px; background-color: red; margin: 2rem;">
                    <h3 style="padding: 0.7rem; text-align: center; background-color: green; color: white;"> 25% DE DESCONTO </h3>
                    <img src="Images/Logotipo Online Shopping Azul Simples.png" alt="Avatar" style="width:100%; height: 60%;">
                    <h5> Item 3 </h5>
                    <a> R$ 200,00 reais</a>
                    <br>
                    <h11> 12x de 19,99</h11>
                </div>

            </div>

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

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />



</html>