<?php
    session_start();

    if(isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['password']) )
    {

            include_once('config.php');

            $login = $_POST['login'];
            $password = $_POST['password'];

            $sql_verification = "SELECT * FROM user_data WHERE login = '$login' and password = '$password'";
            $verification_query = $connection-> query($sql_verification);

            if(mysqli_num_rows($verification_query) < 1 )
            {
                unset($_SESSION['login']);
                unset($_SESSION['password']);
                header('Location: login.html');
            }
            else
            {
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                header('Location: main.php');
            }
    }
    else 
    {
        header('Location: login.html');
    }

?>