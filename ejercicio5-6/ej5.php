<?php
    if(isset($_REQUEST['pedido'])){
        $fp=fopen("datos.txt","a");
        $miPedido="";
        $tiposPizza=$_REQUEST['tipoPizza'];
        $miPedido.=date("d-m-Y H:i:s").";$_REQUEST[nombre];$_REQUEST[direccion];$tiposPizza[0];$_REQUEST[c1];$tiposPizza[1];$_REQUEST[c2];$tiposPizza[2];$_REQUEST[c3]\n";
        fwrite($fp,$miPedido);
        fclose($fp);
        $mensaje="Pedido realizado";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos pizzas</title>
    <style>
        form *{display:block;}
    </style>

</head>
<body>
    <form action="" method="POST">
        nombre<input type="text" name="nombre" id="">
        dirección<input type="text" name="direccion" id="">
        Jamón y queso<input type="checkbox" name="tipoPizza[]" id="" value="jamonyqueso">
        cantidad<input type="number" name="c1" id="">
        Napolitana<input type="checkbox" name="tipoPizza[]" id="" value="napolitana">
        cantidad<input type="number" name="c2" id="">
        Mozzarela<input type="checkbox" name="tipoPizza[]" id="" value="mozzarela">
        cantidad<input type="number" name="c3" id="">
        <input type="submit" name="pedido" value="realizar pedido">
    </form>
    <?php
        if(isset($mensaje)){
            echo $mensaje;
        }
    ?>
</body>
</html>