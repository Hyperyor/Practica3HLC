<?php

  require 'database.php';

  session_start();

  if(!$_SESSION['victoria'])
  {
      $_SESSION['derrota'] = true;
  }
  
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="shortcut icon" href="assets/imagenes/iconoPag.png" />
    <link rel="stylesheet" href="assets/css/indice.css">
  </head>
  <body>
 
    <nav class="menu">

      <ul class="desplegable">
        <li>
          <a href="#" class="game">
            <img src="assets/imagenes/iconoGame.png" alt="Game" height="40" width="40">
          </a>

          <ul class="subMenuG">
            <li><a href="signup.php">SignUp</a></li>
            <li><a href="resultado.php">Status</a></li>
          </ul>
        </li>
      </ul>

      <h3>Hangman Game</h3>
    
    </nav>

    <main class="cuerpo">

      <article>

        <header><h1>Jugadores:</h1></header>

        <table class="tablaPlayers">

          <tr id="cabeceraTabla"> 
            <th>Nombre</th> 
            <th>Apellido</th> 
            <th>Edad</th>
          <tr>

          <?php
            $records = $conexion->query('SELECT nombre, apellido, email, fecha_nacimiento FROM usuario');

            if ($records->num_rows > 0) {
            
              while($row = $records->fetch_assoc()) {

                $nombre = $row["nombre"];
                $apellido = $row["apellido"];
                $em = $row["email"];
                $fechaNac = $row["fecha_nacimiento"];
              
                $date1 = new DateTime($fechaNac);
                $date2 = new DateTime("now");

                $diff = $date1->diff($date2);

                //le enviamos el email por get, ya que es la fk de la tabla usuario y nos servira para buscar todos los datos despues
                echo "<tr> <th><a href=\"iniciarPartida.php?email=$em\">". $nombre . "</a></th> <th>". $apellido . "</th> <th>" . get_format($diff) . "</th><tr>";
              }
            } else {
                //echo "0 results";
            }
            
            $conexion->close();

            function get_format($df) {

              $str = '';
              if ($df->y >= 0) {
                  // years
                  $str .= ($df->y > 1) ? $df->y . ' Años ' : $df->y . ' Años ';
              }

              return $str;
            }
          ?>
        </table>
        
      </article>

    </main>
    
  </body>
</html>
