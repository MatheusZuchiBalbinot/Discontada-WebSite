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

</script>
</html>