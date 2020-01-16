<?php
    require 'database.php';
    
    session_start();

    $user = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/imagenes/iconoPag.png" />
    <link rel="stylesheet" href="assets/css/indice.css">
    <link rel="stylesheet" href="assets/css/game.css">
    <title>GAME</title>
</head>
<body>
    <nav class="menu">

        <ul class="desplegable">
            <li>
                <a href="#" class="game">
                <img src="assets/imagenes/iconoGame.png" alt="Game" height="40" width="40">
                </a>

                <ul class="subMenuG">
                    <li><a href="indice.php">Home</a></li>
                <li><a href="signup.php">SignUp</a></li>
                <li><a href="resultado.php">Status</a></li>
                <li><a href="logout.php">Salir</a></li>
                </ul>
            </li>
        </ul>

        <h3>Hangman Game</h3>

    </nav>

    <main class="cuerpo">

        <article class=statJugador>

            <header><h1>Jugador:</h1></header>

            <table class="tablaPlayers">

                <tr id="cabeceraTabla"> 
                    <th>Nombre</th> 
                    <th>Apellido</th> 
                    <th>Victorias</th>
                    <th>Derrotas</th>
                <tr>

                <?php
                    echo "<tr> <th>" . $_SESSION["nombreUsuario"] . "</th> <th>" . $_SESSION["apellidoUsuario"] . "</th> <th>" . $_SESSION["victoriasUsu"] . "</th> <th>" . $_SESSION["derrotasUsu"] . "</th><tr>";                 
                ?>
            </table>

        </article>

        <article>
            <header id="imagenes">
                <figure>
                    <img height="400" width="200" src="assets/imagenes/<?php echo $_SESSION['fallos']; ?>.png" />
                </figure>
            </header>

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
                else //si pierde o gana se deja de mostrar el teclado
                {
                    if($_SESSION['derrota'])
                    {

                        

                        $query = "UPDATE usuario set derrotas = ? where email = ?";

                        $stmt = mysqli_prepare($conexion, $query) or die(mysqli_error($conexion));
                        $stmt->bind_param('is', $_SESSION["derrotasUsu"], $_SESSION["user_id"]);
                        $stmt->execute();
                        $stmt->close();

                        $palabra = $_SESSION['palabraSecreta'];
                        echo "<script>alert('Ha perdido, la palabra era $palabra'); </script>";
                    }
                    else
                    {
                        if($_SESSION['victoria'])
                        {
                            

                            $query = "UPDATE usuario set victorias = ? where email = ?";

                            $stmt = mysqli_prepare($conexion, $query) or die(mysqli_error($conexion));
                            $stmt->bind_param('is', $_SESSION["victoriasUsu"], $_SESSION["user_id"]);
                            $stmt->execute();
                            $stmt->close();

                            echo "<script>alert('Enhorabuena, ha ganado!');</script>";
                        }
                    }
                }


                ?>
            </section>

        </article>

    </main>
</body>
</html>
