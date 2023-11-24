<?php
require_once "config.php";
function conexion(){
    $conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE,DB_PORT);
    if($conexion->connect_errno){
        echo "Error al conectar con la base de datos";
        exit();
    }
    return $conexion;
}
?>