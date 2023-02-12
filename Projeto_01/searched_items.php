<?php
    session_start();
    $searched_items_array = $_SESSION['searched_items_array'];
    print_r($searched_items_array);
    // for ($i = 0; $i < count($searched_items_array); $i++) {
    //     echo $searched_items_array[$i] . ' ';
    // }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    
</body>
</html>