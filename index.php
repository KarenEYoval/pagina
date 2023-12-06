<?php
include_once('bases.php');
$bases = new Bases();
$mysqli = $bases->obten_conexion();

function tabla($resultado, $tabla_nombre, $tabla_descripcion)
{
    echo "<h2>Tabla {$tabla_nombre}</h2>";
    echo "<p>{$tabla_descripcion}</p>";
    $i = 0;
    echo '<table class="table table-sm table-striped table-bordered">';
    while ($fila = $resultado->fetch_assoc()) : 
        if ($i == 0){
            echo "<thead><tr>";
            foreach (array_keys($fila) as $columna){
                echo "<th>{$columna}</th>";
            }
            echo "</tr></thead><tbody>";
        }
        echo "<tr>";
        foreach ($fila as $dato){
            echo "<td>{$dato}</td>";
        }
        echo "</tr>";
        $i++;
    endwhile;
    echo '</tbody></table>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas SQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <scrip defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class= "m-4">
<?php
$resultado = null;

$consulta = "SELECT A.Matricula, A.Nombre, A.ApellidoPaterno, A.ApellidoMaterno, A.email, A.edad FROM Alumnos A order by A.ApellidoPaterno;";
if ($sentencia = $mysqli->prepare($consulta)){
    $sentencia->execute();
    $resultado = $sentencia->get_result();
    $sentencia->close();
    tabla ($resultado, 'Bases de datos', 'Consulta 1. Obtener estudiantes.');
}

?>
</body>
</html>
