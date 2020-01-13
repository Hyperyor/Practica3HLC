<?php
    require 'database.php';
    
    session_start();

    $user = $_SESSION['user_id'];

    //echo "<script>alert('Usuario: $user');</script>";
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

    <figure id="imagenes">
        <img src="assets/imagenes/<?php echo $_SESSION['fallos']; ?>.png" />
    </figure>

    <section id= "palabraSecreta">
        <?php 
            $palabra = $_SESSION['palabraVacia'];

            //recorre la palabra oculta y va mostrando letra por letra
            for($i = 0; $i < strlen($_SESSION['palabraVacia']); $i++)
            {
                echo $palabra[$i];
                echo " ";
            }
        ?>

    </section>

    <section id= "teclado">
        <?php

        if(!$_SESSION['derrota'] && !$_SESSION['victoria'])
        {
        
            echo '<a href="gameController.php?letra=q">Q</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=w">W</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=e">E</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=r">R</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=t">T</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=y">Y</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=u">U</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=i">I</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=o">O</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=p">P</a>';

            echo '<br/>';

            echo '<a href="gameController.php?letra=a">A</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=s">S</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=d">D</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=f">F</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=g">G</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=h">H</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=j">J</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=k">K</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=l">L</a>';
            
            echo '<br/>';

            echo '<a href="gameController.php?letra=z">Z</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=x">X</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=c">C</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=v">V</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=b">B</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=n">N</a>';
            echo ' ';
            echo '<a href="gameController.php?letra=m">M</a>';
        }

        ?>
    </section>
    
</body>
</html>