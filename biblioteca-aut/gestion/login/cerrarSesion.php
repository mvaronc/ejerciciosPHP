<?php
include_once '../../config/conexion.php';
include_once '../../config/seguridad.php';
$seguridad = new seguridad(conexion());
$seguridad->logout();
header("Location: ../../index.php");
?>