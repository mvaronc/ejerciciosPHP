<?php
    require_once "./externo.php";
    if(isset($_POST['envia'])){
        if($_POST['exponente']!="")
          $resultado=potencia($_POST['base'],$_POST['exponente']);
        else   
          $resultado=potencia($_POST['base']);
    }
    $resultado= "$_POST[base]<sup>$_POST[exponente] </sup> = $resultado";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 bis</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="base">
        <input type="text" name="exponente">
        <input type="submit" name="envia" value="calcula potencia">
    </form>    

    <?php
        if(isset($resultado)){
            echo "<p>$resultado</p>";
        }
    ?>

</body>
</html>