
<?php 
require_once "../../config/conexion.php";
require_once "../../config/seguridad.php";
require_once "../../config/templates.php";
require_once "users.php";
$conexion = conexion();
$seguridad = new seguridad($conexion);
$seguridad->secureRol(array("administrador"));

$users = new users($conexion);
if(isset($_POST['CrearUser'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $users->insert_user($login,$password,$nombre,$apellidos,$rol);
    header("Location: gestUsers.php");
}
if(isset($_GET['borrar'])){
    $users->delete_user($_GET['borrar']);
    header("Location: gestUsers.php");
}
if(isset($_POST['actualizar'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $users->update_user($login,$password,$nombre,$apellidos,$rol);
    header("Location: gestUsers.php");
}
if(isset($_GET['actualizar'])){
    $user = $users->get_user($_GET['actualizar']);
    $nombre = $user['nombre'];
    $apellidos = $user['apellidos'];
    $login = $user['login'];
    $password = $user['password'];
    $rol = $user['rol'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de ususarios</title>
    <link rel="stylesheet" href="../../css/estilo.css">
</head>
<body>
    <header>
    <?php
        echo $cabecera;
    ?>
    <h1>Gestión de usuarios</h1>
    </header>
    <section id="formulario">
        <form action="" method="post" onsubmit="">
            <fieldset>
                <?php 
                    if(isset($_GET['actualizar'])){
                        echo "<legend>Actualizar Usuarios</legend>";
                    }else{
                        echo "<legend>Insertar Usuarios</legend>";
                    }
                ?>
                <label for="login">Login</label>
                <?php 
                    if(isset($_GET['actualizar'])){
                        echo "<input type='text' name='login' id='login' required value='$login' readonly><br>";
                    }else{
                        echo "<input type='text' name='login' id='login' required><br>";
                    }
                ?>

            
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" 
                required value="<?php if(isset($nombre)) echo $nombre; ?>"><br>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" required value="<?php if(isset($apellidos)) echo $apellidos; ?>"><br>
                <label for="password">Contraseña</label>
                <?php
                if(isset($_GET['actualizar'])){
                    echo "<input type='password' name='password' id='password'>";
                }else{
                    echo "<input type='password' name='password' id='password' required>";
                }
                ?>

                <label for="rol">
                    <select name="rol" id="rol">
                        <option><?php echo $rol; ?></option>
                        <option value="administrador">Administrador</option>
                        <option value="bibliotecario">Bibliotecario</option>
                        <option value="registrado">registrado</option>
                    </select>
                </label>
                <?php 
                    if(isset($_GET['actualizar'])){
                        echo "<input type='submit' name='actualizar' value='actualizar'>";
                    }else{
                        echo "<input type='submit' name='CrearUser' value='crearUser'>";
                    }
                ?>
                
    
            </fieldset>
        </form>
    </section>
    <section id="listado">
        <table>
            <tr>
                <th>Login</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            <?php
            $users = $users->get_users();
            foreach($users as $user){
                echo "<tr>";
                echo "<td>".$user['login']."</td>";
                echo "<td>".$user['nombre']."</td>";
                echo "<td>".$user['apellidos']."</td>";
                echo "<td>".$user['rol']."</td>";
                echo "<td><a href='?actualizar=".$user['login']."'>Modificar</a> <a href='?borrar=".$user['login']."'>Borrar</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </section>
    <php 
    echo $pie;
    ?>
</body>
</html>
<?php