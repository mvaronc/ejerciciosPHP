<?php
require_once "../../config/templates.php";
require_once "../../config/seguridad.php";
require_once "../../config/conexion.php";
require_once "users.php";
$raiz=RUTA_APP;
$conexion=conexion();
$seguridad= new seguridad($conexion);
$seguridad->secureRol();
if(isset($_POST['enviar'])){
    $oldPassword = $_POST['oldPassword'];
    $newPassword1 = $_POST['newPassword1'];
    $newPassword2 = $_POST['newPassword2'];
    if($newPassword1==$newPassword2){
        $users= new users($conexion);
        $user = $users->get_user($seguridad->getUser());
        if($user){
            if(password_verify($oldPassword.$user['salt'],$user['password'])){
               $result = $users->update_user($seguridad->getUser(),$newPassword1);
                if($result){
                    $mensaje="Contraseña actualizada";
                }else{
                    $mensaje= "Error al actualizar la contraseña";
                }
            }else{
                $mensaje="Contraseña actual incorrecta";
            }
        }
    }else{
        $mensaje="Las contraseñas no coinciden";
    }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza Password</title>
    <link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
    <?php
    echo $cabecera;
    ?>
    <form action="" method="post">
        <label for="oldPassord">Introduzca su contraseña actual</label>
        <input type="password" name="oldPassword" id="oldPassword" placeholder="contraseña actual" required>
        <label for="oldPassord2">Introduzca su nueva contraseña</label>
        <input type="password" name="newPassword1" id="oldPassword2" placeholder="nueva contraseña" required>
        <label for="password2">Repita su nueva contraseña</label>
        <input type="password" name="newPassword2" id="newPassword" placeholder="repita su nueva contraseña" required>
        <input type="submit" value="enviar" name="enviar">
    </form>
    <?php
    if(isset($mensaje)){
        echo "<p>$mensaje</p>";
    }   
    echo $pie;
    ?>
</body>
</html>