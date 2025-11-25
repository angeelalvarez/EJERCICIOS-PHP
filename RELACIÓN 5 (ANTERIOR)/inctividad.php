<?php
    if(isset($_SESSION['inicio_sesion'])){
        $tiempo = time() - $_SESSION['inicio_sesion'];

        if($tiempo > 300 ){
            header("Location:login.php");
            exit;
        }else{
            $minutos = floor($tiempo / 60);
            $segundos = $tiempo % 60;
        }
    }

    echo "Tiempo transcurrido => $minutos:$segundos";
?>