<?php

    if(isset($_POST['submit']))
    {
        include_once('config.php');

        $login = $_POST['login'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        $insert = mysqli_query($connection, "INSERT INTO user_data(login, password, password_confirm) VALUES('$login','$password', '$password_confirm') ");  
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='login.css'>
    <title> Página de Registro </title>
</head>
<body>
</body>

<script>
    document.write('\
    <div class="container">\
        <div class="login_form">\
        \
            <div class="image">\
                <img src="Images/Logotipo(black mode).png">\
            </div>\
            <form class="login_inputs" action="register.php" method="POST">\
                <h1> Registrar </h1>\
                <label for="login" class="lgn_label"> Login: </label>\
                <br>\
                <input type="text" class="lgn_button" placeholder="Digite o seu Login: " name="login">\
                \
                <br>\
                <label for="password" class="lgn_label"> Senha: </label>\
                <br>\
                <input type="password" class="lgn_button" placeholder="Digite a sua senha: " name="password">\
                <br>\
                \
                <label for="password_confirm" class="lgn_label"> Senha: </label>\
                <br>\
                <input type="password" class="lgn_button" placeholder="Digite a sua senha: " name="password_confirm">\
                <br>\
                \
                <input type="submit" value="Submit" name="submit" id="submit">\
\
            </form>\
        </div>\
    </div>\
');

</script>
</html>