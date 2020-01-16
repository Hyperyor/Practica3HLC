<?php
	require 'database.php';

	session_start();

	if(!$_SESSION['victoria'])
	{
			$_SESSION['derrota'] = true;
	}

	if (!empty($_POST['nombre']) && !empty($_POST['fecha_nacimiento']) && !empty($_POST['email'])) {

		if(!existe_email($_POST['email']))
		{

		
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
			echo "<script>alert('Error, email ya en uso');</script>";
		}

	}
	else
	{
		if(isset($_POST['envio']))
		{
			echo "<script>alert('Error, el nombre, el email y la fecha de nacimiento son obligatorios');</script>";
		}
	}

	function existe_email($email)
	{
		require 'database.php';
		$query = "select * from usuario where email = ? ;";
		$stmt = mysqli_prepare($conexion, $query) or die(mysqli_error($conexion));
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$datos = $stmt->get_result();
		$stmt->close();

		$cantidad = $datos->num_rows;

		
		
		if($cantidad != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="shortcut icon" href="assets/imagenes/iconoPag.png" />
	<link rel="stylesheet" href="assets/css/indice.css">
	<link rel="stylesheet" href="assets/css/signup.css">
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
          </ul>
        </li>
      </ul>

      <h3>Hangman Game</h3>
    
	</nav>

	<main class="cuerpo">
		
		<form action="signup.php" method="POST" class="registro">

			<fieldset id="bloqueDatos">
				<legend>Datos de Registro</legend>

				<label>Nombre</label>
				<input name="nombre" type="text" placeholder="Introduzca su nombre" value=<? echo '"' . $_POST['nombre'] . '"' ?>>
				
				<label>Apellido</label>
				<input name="apellido" type="text" placeholder="Introduzca su apellido" value=<? echo '"' . $_POST['apellido'] . '"' ?>>
				
				<label>Email</label>
				<input name="email" type="email" placeholder="Introduzca su email" value=<? echo '"' . $_POST['email'] . '"' ?>>
				
				<label>Fecha de nacimiento</label>
				<input name="fecha_nacimiento" type="date" value=<? echo '"' . $_POST['fecha_nacimiento'] . '"' ?>/>

				<button class="botonRegistrar" type="submit" value="Crear cuenta" onClick="validarDatos()">Registrarse</button>
			</fieldset>
		</form>
	</main>
  </body>
</html>
