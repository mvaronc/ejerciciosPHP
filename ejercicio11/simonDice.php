<?php
/*
Simon dice” es un clásico juego de memoria que consiste en componer secuencias de cuatro colores cada vez más largas, y el jugador tiene que recordarlas y reproducirlas. Puedes encontrar muchas versiones de Simon en internet.

Nosotros vamos a construir una versión simplificada que muestre secuencias de números (aunque podríamos hacerlo con colores sólo complicándolo un poco).

El programa mostrará un número entre 1 y 4 durante un instante, y luego borrará la pantalla y pedirá al usuario que lo repita. Después mostrará dos números aleatorios entre 1 y 4 (por ejemplo, 3 – 1), y luego el usuario los tendrá que repetir, y así hasta que el usuario falle al introducir los números.
Esta vez lo haremos haciendo uso de las cookies.


//vamos a disponer de cuatro cookies para el juego:
//una para guardar el número de secuencia en el que estamos: NSecuencia
//índice de la comprobacion: indiceComprobacion
//otra para guardar la secuencia con la que comparamos: secuenciaJuego
//otra para guardar la secuencia que va construyendo el jugador: secuenciaJugador

*/
if(isset($_POST["empezar"])){

    setcookie("Nsecuencia",1,time()+60*60*24*365);
    setcookie("secuenciaJuego",random_int(1,4),time()+60*60*24*365);
    setcookie("indiceComprobacion","0",time()+60*60*24*365);
    setcookie("secuenciaJugador","",time()+60*60*24*365);
    header("Location: simonDice.php");
}
if(isset($_POST["uno"])||isset($_POST["dos"])||isset($_POST["tres"])||isset($_POST["cuatro"])){
    $indiceComprobacion = $_COOKIE["indiceComprobacion"]+1;
    $secuenciaJuego = $_COOKIE["secuenciaJuego"];
    $Nsecuencia = $_COOKIE["Nsecuencia"];
    $secuenciaJugador = $_COOKIE["secuenciaJugador"].$_POST["uno"].$_POST["dos"].$_POST["tres"].$_POST["cuatro"];
    if($secuenciaJugador==substr($secuenciaJuego,0,$indiceComprobacion)){//por ahora correcto
        $indiceComprobacion++;
        setcookie("indiceComprobacion",$indiceComprobacion-1,time()+60*60*24*365);
        setcookie("secuenciaJugador",$secuenciaJugador,time()+60*60*24*365);
        if($indiceComprobacion>strlen($secuenciaJuego)){
            $Nsecuencia++;
            setcookie("Nsecuencia",$Nsecuencia,time()+60*60*24*365);
            setcookie("indiceComprobacion","0",time()+60*60*24*365);
            setcookie("secuenciaJugador","",time()+60*60*24*365);
            setcookie("secuenciaJuego",$secuenciaJuego.random_int(1,4),time()+60*60*24*365);
            header("Location: simonDice.php");
        } 
        header("Location: simonDice.php");    
  }else{
        $mensaje = "<p>Has fallado en la secuencia $Nsecuencia.</p>
        <p>La secuencia era $secuenciaJuego y tu has puesto $secuenciaJugador</p>";
       
    }
}   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Simón Dice version cookies PHP</H1>
    <?php
        if($_COOKIE["indiceComprobacion"]=="0"){
            echo "<p>Secuencia de Juego: ".$_COOKIE["secuenciaJuego"]."</p>";
        }else{
            echo "<p> Tu secuencia: ".$_COOKIE["secuenciaJugador"]."</p>";
        }
    ?>

   
    <?php
        if($_COOKIE["Nsecuencia"] == "-1" or !isset($_COOKIE["Nsecuencia"]) or isset($mensaje)){
    ?>
    
    <form method="POST">
        <p><?php
            if(isset($mensaje)){
                
                echo $mensaje;
            }?>
            </p>
        <input type="submit" value="empezar juego" name="empezar">

    </form>
    <?php
        }else{  
    ?>
 <form method="POST">
            
        <input type="submit" value="1" name="uno">
        <input type="submit" value="2" name="dos">
        <input type="submit" value="3" name="tres">
        <input type="submit" value="4" name="cuatro">
    </form>
    <?php
        }
    ?>
    
</body>
</html>