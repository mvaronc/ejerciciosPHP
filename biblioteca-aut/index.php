<?php      
    if(!file_exists("./config/config.php")){
        header("Location: ./install/install.php");
    }
    require_once './config/seguridad.php';
    require_once './config/conexion.php';
    $seguridad= new seguridad(conexion());
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
    <?php
        if($seguridad->isLogged()){
            include_once './config/templates.php';
            echo $cabecera;
            
        }else{
            header("Location: ./gestion/login/login.php");
            
        }
        include_once './config/templates.php';
        
        echo $pie;
    ?>
  

</body>
</html>