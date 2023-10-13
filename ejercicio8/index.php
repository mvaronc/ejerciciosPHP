<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'persona.php'; ?>
    <?php
    $personas[] = new Persona('Juan', 'Perez', 20);
    $personas[] = new Persona('Maria', 'Lopez', 17);    
    $personas[] = new Persona('Pedro', 'Garcia', 30);
    $personas[] = new Persona('Ana', 'Gonzalez', 15);
    ?>
    <?php

        foreach($personas as $clave=>$p){
        echo "<h1>Persona $clave</h1>";
        if($p->mayorEdad()){
            echo $p->nombreCompleto()."Es mayor de edad";
        }else{
            echo $p->nombreCompleto()."Es menor de edad";
        }
    }
    ?>
</body>
</html>