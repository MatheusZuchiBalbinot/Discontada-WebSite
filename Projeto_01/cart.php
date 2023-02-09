<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Página de Carrinho </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='script.js'></script>
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
                <span class="material-symbols-outlined" onClick="location.href='cart.php'"> Shopping_cart </span>
            </div>
            
        </header>



        <div class="main">


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
</body>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</html>