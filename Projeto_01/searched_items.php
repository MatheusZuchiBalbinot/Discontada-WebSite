<?php
    session_start();
    $variable2 = $_SESSION['variavel1'];
    for ($i = 0; $i < count($variable2); $i++) {
        echo $variable2[$i] . ' ';
   }
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