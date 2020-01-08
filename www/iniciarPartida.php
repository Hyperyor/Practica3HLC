<?php
    require 'database.php';
    
    session_start();

    //rellenamos la sesion con variables que usaremos 
    $user = $_SESSION['user_id'] = $_GET['email'];

    $_SESSION['fallos'] = 0;

    $_SESSION['victoria'] = false;
    $_SESSION['derrota'] = false;

    $_SESSION['letrasAcertadas'] = 0;
    
    
    $query = "SELECT nombre, apellido, email, fecha_nacimiento, victorias, derrotas from usuario where email = ?";

    $stmt = mysqli_prepare($conexion, $query) or die(mysqli_error($conexion));
    $stmt->bind_param('s', $user);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if($resultado->num_rows < 1){
        echo "sin valores"; 
    }else{
        //cargamos los datos del usuario en la sesion
        while($fila = $resultado->fetch_assoc()){
        $_SESSION['nombreUsuario'] = $fila["nombre"];
        $_SESSION['apellidoUsuario'] = $fila["apellido"];
        $_SESSION['victoriasUsu'] = $fila["victorias"];
        $_SESSION['fechaNacUsuario'] = $fila["fecha_nacimiento"];
        $_SESSION['derrotasUsu'] = $fila["derrotas"];
        }
    }

    $stmt->close();

    //tomamos las palabras de la base de datos
    $records = $conexion->query('SELECT palabra FROM palabras');

    $listadoPalabras = array();

    //cargamos las palabras en un array
    while($row = $records->fetch_assoc()) 
    {

        $pa = $row["palabra"];

        $listadoPalabras[] = $pa;
    }

    //selecciono una palabra aleatoria dentro del rango
    $_SESSION['palabraSecreta'] = $listadoPalabras[rand(0, (count($listadoPalabras) - 1))];

    $_SESSION['palabraVacia'] = "";

    for($i = 0; $i < strlen($_SESSION['palabraSecreta']); $i++)
    {
        $_SESSION['palabraVacia'] .= "_";
    }
    
    header("location: game.php");
?>