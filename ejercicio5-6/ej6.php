<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de pedidos</title>
</head>
<body>
    <h3>Listado de pedidos</h3>
    <?php
        $fp=fopen("datos.txt","r");
        echo "<table border='2'>";
        echo "<tr><th>Fecha</th><th>Nombre</th><th>Dirección</th><th>Pizza</th><th>Cantidad</th><th>Pizza</th><th>Cantidad</th><th>Pizza</th><th>Cantidad</th></tr>";
        while(!feof($fp)){
            $linea=fgets($fp);
            $datos=explode(";",$linea);
        
           
            
            echo "<tr><td>$datos[0]</td><td>$datos[1]</td><td>$datos[2]</td><td>$datos[3]</td><td>$datos[4]</td><td>$datos[5]</td><td>$datos[6]</td><td>$datos[7]</td><td>$datos[8]</td></tr>";
           
        }
        echo "</table>";
        fclose($fp);
    ?>
</body>
</html>