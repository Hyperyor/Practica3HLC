<?php
	require 'database.php';

	session_start();

	if (!empty($_POST['nombre']) && !empty($_POST['fecha_nacimiento']) && !empty($_POST['email'])) {

		$nom = $_POST['nombre'];
		$mail = $_POST['email'];
		$ape = $_POST['apellido'];
		$fec = $_POST['fecha_nacimiento'];
		$vic = 0;
		$der = 0;

		$query = "INSERT INTO usuario (nombre, apellido, email, fecha_nacimiento, victorias, derrotas) VALUES (?, ?, ?, ?, ?, ?)";

		$stmt = mysqli_prepare($conexion, $query) or die(mysqli_error($conexion));
		$stmt->bind_param('ssssii', $nom, $ape, $mail, $fec, $vic, $der);
		$stmt->execute();
		$stmt->close();

		//$_SESSION['user_id'] = $_POST['nombre'];

		//echo "<script>alert('Alta de usuario correcta');</script>";

		header("Location: indice.php");
	}
	else
	{
		if(isset($_POST['envio']))
		{
			echo "<script>alert('Error, el nombre, el email y la fecha de nacimiento son obligatorios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!--<link rel="stylesheet" href="assets/css/style.css"> -->
  </head>
  <body>

	<a href="indice.php">Volver al inicio</a>

    <h1>SignUp</h1>

    <form action="signup.php" method="POST" >
	  <p>Nombre</p>
      <input name="nombre" type="text" placeholder="Introduzca su nombre" value=<? echo '"' . $_POST['nombre'] . '"' ?>>
	  <p>Apellido</p>
      <input name="apellido" type="text" placeholder="Introduzca su apellido" value=<? echo '"' . $_POST['apellido'] . '"' ?>>
	  <p>Email</p>
      <input name="email" type="email" placeholder="Introduzca su email" value=<? echo '"' . $_POST['email'] . '"' ?>>
      <p>Fecha de nacimiento</p>
	  <input name="fecha_nacimiento" type="date" value=<? echo '"' . $_POST['fecha_nacimiento'] . '"' ?>/>
						
      <input name="envio" type="submit" value="Submit">
    </form>

  </body>
</html>
