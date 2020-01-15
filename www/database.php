<?php
  /*
  $server = 'localhost';
  $username = 'root';
  $password = '1234';
  $database = 'db';

  try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }*/

  //$servidor="172.19.0.2";
  $servidor= "172.22.0.2"; // LEO
  $usuario="root";
  $pass="1234";
  $base_datos="db";
  
  $conexion=mysqli_connect($servidor,$usuario,$pass,$base_datos);

  if(mysqli_connect_errno()){
    echo "ERROR DE CONEXIÓN:".mysqli_connect_errno();
  }
  else
  {
    //echo "ok";
  }
?>
