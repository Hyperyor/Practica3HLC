<?php
    require 'database.php';
    
    session_start();

    if(!$_SESSION['victoria'])
    {
        $_SESSION['derrota'] = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="assets/imagenes/iconoPag.png" />
    <link rel="stylesheet" href="assets/css/indice.css">
    <title>Resultados</title>
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
        </ul>
    </li>
    </ul>

    <h3>Hangman Game</h3>

    </nav>

    <main class="cuerpo">

        <article>

            <header><h1>Resultados:</h1></header>

            <table class="tablaPlayers">

                <tr id="cabeceraTabla"> 
                    <th>Nombre</th> 
                    <th>Apellido</th> 
                    <th>Victorias</th>
                    <th>Derrotas</th>
                <tr>

                <?php
                    require 'database.php';
                    $records = $conexion->query('SELECT nombre, apellido, victorias, derrotas FROM usuario');
                
                    if ($records->num_rows > 0) {
                    
                        echo '<br/>';
                
                        while($row = $records->fetch_assoc()) {
                
                            $nombre = $row["nombre"];
                            $apellido = $row["apellido"];
                            $vics = $row["victorias"];
                            $derr = $row["derrotas"];

                            echo "<tr> <th>". $nombre . "</th> <th>". $apellido . "</th> <th>" . $vics . "</th> <th>" . $derr . "</th><tr>";
                        }
                
                    } else {
                        //echo "0 results";
                    }                    
                ?>
            </table>
        
        </article>

    </main>

</body>
</html>
