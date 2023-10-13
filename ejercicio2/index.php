<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>muestra superglobals</title>
</head>
<body>
    <h1>Entorno de $_SERVER</h1>
    <?php
        foreach($_SERVER as $clave => $valor){
            if(is_array($valor)){
                echo "La clave <em> $clave </em> es un array <br>";
                print_r($valor);
            }else{
                echo "La clave <em> $clave </em> con el valor <b> $valor </b> <br>";
            }
        }
        ?>
        <h1>Entorno de $_ENV</h1>
        <?php
        foreach($_ENV as $clave => $valor){
            if(is_array($valor)){
                echo "La clave $clave es un array <br>";
                print_r($valor);
            }else{
                echo "La clave $clave con el valor $valor <br>";
            }
        }
    ?>
</body>
</html>