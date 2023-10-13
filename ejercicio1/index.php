<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--
        Ejercicio 1. Tablas de multiplicar.

Realizar usando bucles definidos e indefinidos el código necesario para ...

Crear en un array indexado de 0 a 10 otro array con los valores de la tabla de multiplicar.

Una vez creado el array.  Usando el bucle foreach de php mostrar el resultado creando una tabla HTML para cada número de 0 a 10.

-->
    <?php
        $tabla=array();
        for($i=0;$i<11;$i++){
            for($j=0;$j<11;$j++){
                $tabla[$i][$j]=$i*$j;
            }

        }
        //print_r($tabla);
   ?>
<h1>Las tablas de multiplicar</h1>

<?php
    foreach($tabla as $clave1 => $valor1){
        echo "<h2>La tabla del $clave1</h2>";
        echo "<table border='2'>";
        foreach($valor1 as $clave2 => $valor2){
            echo "<tr><td>$clave1 x $clave2 = $valor2 </td></tr>";
        }
        echo "</table>";
        unset($tabla);
    }

?>
</body>
</html>