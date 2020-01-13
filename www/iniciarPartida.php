<?php
    require 'database.php';
    
    session_start();

    $user = $_SESSION['user_id'] = $_GET['usuario'];

    $_SESSION['fallos'] = 0;

    $_SESSION['victoria'] = false;
    $_SESSION['derrota'] = false;

    $_SESSION['letrasAcertadas'] = 0;
    //echo "<script>alert('Usuario: $user');</script>";


    //tomamos las palabras de la base de datos
    $records = $conexion->query('SELECT palabra FROM palabras');

    $listadoPalabras = array();

    //cargamos las palabras en un array
    while($row = $records->fetch_assoc()) 
    {

        $pa = $row["palabra"];

        $listadoPalabras[] = $pa;
    }

    //selecciono una palabra aleatoria dentro del rango
    $_SESSION['palabraSecreta'] = $listadoPalabras[rand(0, (count($listadoPalabras) - 1))];

    $_SESSION['palabraVacia'] = "";

    for($i = 0; $i < strlen($_SESSION['palabraSecreta']); $i++)
    {
        $_SESSION['palabraVacia'] .= "_";
    }
    
    header("location: game.php");
?>