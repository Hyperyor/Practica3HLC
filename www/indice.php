<?php

  require 'database.php';

  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--<link rel="stylesheet" href="assets/css/style.css"> -->
  </head>
  <body>
 
    <h1>Please Login or SignUp</h1>

    <a href="signup.php">SignUp</a>
    
    <h1>Tabla de resultados:</h1>
    <a href="resultado.php">Resultados</a>

    <h1>Jugadores:</h1>

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
          echo "Nombre: <a href=\"iniciarPartida.php?email=$em\">". $nombre . "</a>" . " - Apellido: ". $apellido . " - Edad: " . get_format($diff) . "<br>";
        }
      } else {
          echo "0 results";
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
  </body>
</html>
