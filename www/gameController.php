<?php
    
    session_start();

    $letra = $_GET['letra'];

    $palabraOculta = $_SESSION['palabraSecreta'];

    $existe = 0;

    for($i = 0; $i < strlen($_SESSION['palabraVacia']); $i++)
    {
        if($palabraOculta[$i] == $letra)
        {
            $existe = 1;

            if($_SESSION['palabraVacia'][$i] != $letra)
            {
                $_SESSION['palabraVacia'][$i] = $letra;
                $_SESSION['letrasAcertadas'] += 1;
                
            }
        }
        
    }

    if($existe == 0)
    {
        $_SESSION['fallos'] = $_SESSION['fallos'] + 1;

        if($_SESSION['fallos'] == 8)
        {
            $_SESSION["derrotasUsu"] = $_SESSION["derrotasUsu"] + 1;
            $_SESSION['derrota'] = true;
        }
    }

    if($_SESSION['letrasAcertadas'] == strlen($_SESSION['palabraVacia']))
    {
        $_SESSION["victoriasUsu"] = $_SESSION["victoriasUsu"] + 1;
        $_SESSION['victoria'] = true;
    }


    header("location: game.php");