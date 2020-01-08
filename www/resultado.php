<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
</head>
<body>
    <a href="indice.php">Volver</a>

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
            
            echo '<p>Nombre: ' . $nombre . ' Apellido: ' . $apellido . ' Victorias: ' . $vics . ' Derrotas: ' . $derr . '</p>';
        }

    } else {
        echo "0 results";
    }
?>
    
</body>
</html>
