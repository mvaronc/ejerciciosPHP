<?php
/**
 * Cabecera de mi aplicación
 */
//$raiz = $_SERVER['HTTP_HOST'];
require_once 'conexion.php';
require_once 'seguridad.php';
$raiz=RUTA_APP;
$conexion=conexion();
$seguridad= new seguridad($conexion);
if($seguridad->getRol()=="administrador"){
    $cabecera="
    <header><h1>Biblioteca principal</h1> </header>
    
    <nav>
        
        <a href='$raiz/gestion/gestBooks/insertar.php'>Insertar</a>
        <a href='$raiz/gestion/gestBooks/listar.php'>Listar</a>
        <a href='$raiz/gestion/gestBooks/buscar.php'>Buscar</a>
        <a href='$raiz/gestion/gestUsers/gestUsers.php'>gestionar Usuarios</a>
        <a href='$raiz/gestion/gestUsers/cambiaPassword.php'>cambiaPassword</a>
        <a class='menuUsers' href='$raiz/gestion/login/cerrarSesion.php'>Cerrar sesión <em>"
        .$seguridad->getUser()."</em></a>
          
    </nav>";
}elseif($seguridad->getRol()=="registrado"){
        $cabecera="
        <header><h1>Biblioteca principal</h1> </header>
         <nav>
            <a href='$raiz/gestion/gestBooks/listar.php'>Listar</a>
            <a href='$raiz/gestion/gestBooks/buscar.php'>Buscar</a>
            <a href='$raiz/gestion/gestUsers/cambiaPassword.php'>cambiaPassword</a>
            <a class='menuUsers' href='$raiz/gestion/login/cerrarSesion.php'>Cerrar sesión <em>"
            .$seguridad->getUser()."</em></a>
        </nav>";
}elseif($seguridad->getRol()=="bibliotecario"){
            $cabecera="
            <header><h1>Biblioteca principal</h1> </header>
            <nav>
                <a href='$raiz/gestion/gestBooks/insertar.php'>Insertar</a>
                <a href='$raiz/gestion/gestBooks/listar.php'>Listar</a>
                <a href='$raiz/gestion/gestBooks/buscar.php'>Buscar</a>
                <a href='$raiz/gestion/gestUsers/cambiaPassword.php'>cambiaPassword</a>
                <a class='menuUsers' href='$raiz/gestion/login/cerrarSesion.php'>Cerrar sesión <em>"
                .$seguridad->getUser()."</em></a>
            </nav>";
}else{

        $cabecera="
        <header><h1>Biblioteca principal</h1> </header>
        <nav>
            <a href='$raiz/gestion/gestBooks/listar.php'>Listar</a>
            <a href='$raiz/gestion/gestBooks/buscar.php'>Buscar</a>
        </nav>";
}

/**
 * Pie de mi aplicación
 */

$pie=
<<<EX
<footer> <p>Biblioteca version 1.0 </p>
    
</footer>
EX;
?>