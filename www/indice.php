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

    <?php if(isset($_SESSION['user_id'])): ?>
      <br> Welcome. <?= $_SESSION['user_id']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>

    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a href="signup.php">SignUp</a>
    <?php endif; ?>

    <h1>Jugadores:</h1>

    <?php
        $records = $conexion->query('SELECT nombre, email FROM usuario');

      if ($records->num_rows > 0) {
      
        while($row = $records->fetch_assoc()) {

          $nombre = $row["nombre"];

          echo "nombre: <a href=\"game.php?usuario=$nombre\">". $nombre . "</a>" . "- email: ". $row["email"] . "<br>";
        }
      } else {
            echo "0 results";
      }
      
      $conexion->close();
    ?>
  </body>
</html>
