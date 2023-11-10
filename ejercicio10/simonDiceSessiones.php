<?php
/*
Simon dice” es un clásico juego de memoria que consiste en componer secuencias de cuatro colores cada vez más largas, y el jugador tiene que recordarlas y reproducirlas. Puedes encontrar muchas versiones de Simon en internet.

Nosotros vamos a construir una versión simplificada que muestre secuencias de números (aunque podríamos hacerlo con colores sólo complicándolo un poco).

El programa mostrará un número entre 1 y 4 durante un instante, y luego borrará la pantalla y pedirá al usuario que lo repita. Después mostrará dos números aleatorios entre 1 y 4 (por ejemplo, 3 – 1), y luego el usuario los tendrá que repetir, y así hasta que el usuario falle al introducir los números.
Esta vez lo haremos haciendo uso de las variables de sesion.


//vamos a disponer de cuatro variables  para el juego:
//una para guardar el número de secuencia en el que estamos: NSecuencia
//índice de la comprobacion: indiceComprobacion
//otra para guardar la secuencia con la que comparamos: secuenciaJuego
//otra para guardar la secuencia que va construyendo el jugador: secuenciaJugador

*/

session_start();
if(!isset($_SESSION["Nsecuencia"])){
    $_SESSION["Nsecuencia"]=-1;
}
if(isset($_POST["empezar"])){
    session_destroy();
    session_start();
    $_SESSION["Nsecuencia"]=1;
    $_SESSION["secuenciaJuego"]=random_int(1,4);
    $_SESSION["indiceComprobacion"]=0;
    $_SESSION["secuenciaJugador"]="";
    header("Location: simonDiceSessiones.php");
}else{
    if(isset($_POST["uno"])||isset($_POST["dos"])||isset($_POST["tres"])||isset($_POST["cuatro"])){
        $indiceComprobacion = $_SESSION["indiceComprobacion"]+1;
        $secuenciaJuego = $_SESSION["secuenciaJuego"];
        $Nsecuencia = $_SESSION["Nsecuencia"];
        $secuenciaJugador = $_SESSION["secuenciaJugador"].$_POST["uno"].$_POST["dos"].$_POST["tres"].$_POST["cuatro"];
        if($secuenciaJugador==substr($secuenciaJuego,0,$indiceComprobacion)){//por ahora correcto
            $indiceComprobacion++;
            $_SESSION["indiceComprobacion"]=$indiceComprobacion-1;
            $_SESSION["secuenciaJugador"]=$secuenciaJugador;
            if($indiceComprobacion>strlen($secuenciaJuego)){
                $Nsecuencia++;
                $_SESSION["Nsecuencia"]=$Nsecuencia;
                $_SESSION["indiceComprobacion"]=0;
                $_SESSION["secuenciaJugador"]="";
                $_SESSION["secuenciaJuego"]=$secuenciaJuego.random_int(1,4);
                header("Location: simonDiceSessiones.php");
            } 
            header("Location: simonDiceSessiones.php");    
      }else{
            $mensaje = "<p>Has fallado en la secuencia $Nsecuencia.</p>
            <p>La secuencia era $secuenciaJuego y tu has puesto $secuenciaJugador</p>";
            $_SESSION["Nsecuencia"]=-1;
           
        }
    }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simon dice</title>
</head>
<body>
    <H1>Simón Dice version sesiones PHP</H1>
    <?php
    if(isset($mensaje)){
        echo $mensaje;
    }
    ?>
    <?php
    if(isset($_SESSION["indiceComprobacion"]) && $_SESSION["indiceComprobacion"]=="0"){
        echo "<p>Secuencia de Juego: ".$_SESSION["secuenciaJuego"]."</p>";
    }else{
        echo "<p> Tu secuencia: ".$_SESSION["secuenciaJugador"]."</p>";
    }
    ?>
    <?php
    if($_SESSION["Nsecuencia"] == "-1" or !isset($_SESSION["Nsecuencia"]) or isset($mensaje)){
    ?>
    <form action="#" method="post">
        <input type="submit" name="empezar" value="Empezar">
    </form>
    <?php
    }else{
    ?>
    <form action="#" method="post">
        <input type="submit" name="uno" value="1">
        <input type="submit" name="dos" value="2">
        <input type="submit" name="tres" value="3">
        <input type="submit" name="cuatro" value="4">
    </form>
    <?php
    }
    ?>
</body>
</html>