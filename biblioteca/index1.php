<?php

//Este archivo solo vale para hacer pruebas de las clases
    require_once("config.php");
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error; 
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Listados de las dos tablas -->
    
    <h1>Listado de autores</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Pais</th>
        </tr>
        <?php

            require_once("autores.php");
            $autores = new autores($conexion);
            $todosLosAutores = $autores->consultaAutores();
            foreach($todosLosAutores as $autor){
                echo "<tr>";
                echo "<td>".$autor['idAutor']."</td>";
                echo "<td>".$autor['Nombre']."</td>";
                echo "<td>".$autor['Apellidos']."</td>";
                echo "<td>".$autor['Pais']."</td>";
                echo "</tr>";
              
            }

        ?>
    </table>
</body>
</html>
<?php
    $conexion->close();
?>