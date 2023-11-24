<?php
    require_once "../../config/seguridad.php";
    require_once "../../config/conexion.php";
    $conexion =conexion();
    $seguidad = new seguridad($conexion);
    if(isset($_POST['Acceder'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        if($seguidad->login($login,$password)){
            header("Location: ../../index.php");
        }else{
            $mensaje= "Usuario o contraseña incorrectos";
           
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
    <header>
        <h1>Biblioteca principal</h1>
        <h1>Login</h1>
    </header>
    <section id="formulario">
        <form action="" method="post" onsubmit="">
            <fieldset>
                <legend>Login</legend>
                <label for="login">Login</label>
                <input type="text" name="login" id="login" >
                <label for="password">Password</label>
                <input type="password" name="password" id="password" >
                <input type="submit" value="Login" name="Acceder">
            </fieldset>
  
        </form>
        <?php
                if(isset($mensaje)){
                    echo "<p>$mensaje</p>";
                }
                require_once "../../config/templates.php";
                echo $pie;
            ?>
</body>
</html>