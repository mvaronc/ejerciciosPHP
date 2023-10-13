<?php
    if(isset($_POST['nuevaImagen'])){
        $archivo = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $archivo_tmp = $_FILES['archivo']['tmp_name'];
        $tamano = $_FILES['archivo']['size'];
        $destino = "imagenes/".$archivo;
        if($tipo!="image/jpeg" && $tipo!="image/jpg" && $tipo!="image/png" ){
            $mensaje= "Error, el archivo no es una imagen";
        }else if($tamano>1024*1024){
            $mensaje= "Error, el tamaño máximo permitido es un 1MB";
        }else{
        move_uploaded_file($archivo_tmp,$destino);
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 7</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    Nueva imagen<input type="file" name="archivo" id="archivo">
    <input type="submit" value="sube archivo" name="nuevaImagen">
    </form>
    <?php
        if(isset($mensaje)){
            echo $mensaje;
        }
    ?>

    <table border="2">
        <?php
            define("COLUMNAS",2);
            $directorio = opendir("imagenes");
            $i=0;
            while(($imagen = readdir($directorio))!=false){
                
                if($imagen!="." && $imagen!=".." && strpos($imagen,"hello",0)===false){
                    if($i% COLUMNAS==0){
                        echo "<tr>";
                    }
                    $html="<td>
                            <a href=\"./imagenes/$imagen\">
                            <img src=\"imagenes/$imagen\" width=\"100\" height=\"100\">
                            </a>
                          </td>";
                    echo $html;
                    
                    if($i%COLUMNAS== (COLUMNAS-1)){
                        echo "</tr>";
                    }
                    $i++;
                }
            
            }
        ?>
    </table>
</body>
</html>
