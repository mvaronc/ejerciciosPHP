<?php
/*
Ejercicio 4: Devolución de arrays en funciones
Escribe un programa PHP que pida cinco números al usuario mediante un formulario y los guarde en un array.

Luego debe llamar a una función que debe crear pasándole el array como parámetro, y la función calculará cuál de los cinco números es el mayor, cuál el menor y cuánto vale la media, devolviendo esos tres valores en otro array asociativo.

Por último, se mostrarán en la pantalla el mayor, el menor y la media.
*/
function calculaDatos($miArray){
    $resul=array();
    $resul['min']=min($miArray);
    $resul['max']=max($miArray);
    $resul['media']=array_sum($miArray)/count($miArray);
    return $resul;
}


if(isset($_POST['calcula'])){
    $datos=array();
    foreach($_POST as $clave => $valor){
        if(is_numeric($valor)){
            $datos[]=$valor;
        }
    }

    $resultados = calculaDatos($datos);


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
    <form action="" method="post">
        <input type="number" name="n1" id="">
        <input type="number" name="n2" id="">
        <input type="number" name="n3" id="">
        <input type="number" name="n4" id="">
        <input type="number" name="n5" id="">
        <input type="submit" value="calcula datos" name="calcula">
    </form>

    <?php
        if(isset($resultados)){
            foreach($resultados as $clave=>$valor){
                echo "$clave : $valor <br>";
            }
        }
    ?>
</body>
</html>