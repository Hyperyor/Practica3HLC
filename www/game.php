<?php
    require 'database.php';
    
    session_start();

    $user = $_SESSION['user_id'] = $_GET['usuario'];

    echo "<script>alert('Usuario: $user');</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GAME</title>
</head>
<body>
    <a href="logout.php">Salir</a>
</body>
</html>