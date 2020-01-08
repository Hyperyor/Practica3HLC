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
    <title>GAME</title>
</head>
<body>
    <a href="logout.php">Salir</a>

    <section id="datosUsuario">
        <?php
            echo '<p>Nombre</p>';
            echo '<p>' . $_SESSION["nombreUsuario"] . '</p>';
            echo '<p>Apellido</p>';
            echo '<p>' . $_SESSION["apellidoUsuario"] . '</p>';
            echo '<p>Fecha nacimiento</p>';
            echo '<p>' . $_SESSION["fechaNacUsuario"] . '</p>';
            echo '<p>Victorias</p>';
            echo '<p>' . $_SESSION["victoriasUsu"] . '</p>';
            echo '<p>Derrotas</p>';
            echo '<p>' . $_SESSION["derrotasUsu"] . '</p>';
            echo '<p>Email</p>';
            echo '<p>' .$_SESSION["user_id"] . '</p>';
        ?>
    </section>

    <figure id="imagenes">
        <img height="100" width="50" src="assets/imagenes/<?php echo $_SESSION['fallos']; ?>.png" />
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
    
</body>
</html>
