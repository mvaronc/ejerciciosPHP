<?php
    if(isset($_POST['enviar'])){
        echo "Insert into `usuarios` values(";
        foreach ($_POST as $clave => $valor){
            echo htmlspecialchars($valor).",";
        }
        echo ");";
    

    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
    <style>
        form * {
            display:block;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        Nombre<input type="text" name="Nombre" id="" required>
        Apellido1<input type="text" name="Apellido1" id="" required>
        Apellido2<input type="text" name="Apellido2" id="" required>
        TLF<input type="number" name="Telefono" id="" reqired>
        H<input type="radio" value="H" name="sexo">
        M<input type="radio" value="M" name="sexo"> 

        <fieldset>
            Opel <input type="checkbox" value="opel" name="marca">
            Seat <input type="checkbox" value="seat" name="marca">
        </fieldset>
    

        <input type="submit" name="enviar" value="enviar">
    </form>
    
</body>
</html>