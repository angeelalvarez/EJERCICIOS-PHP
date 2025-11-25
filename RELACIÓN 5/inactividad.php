<?php
    if(isset($_SESSION['ultimo_movimiento'])){
        $tiempo_transcurrido = time() - $_SESSION['ultimo_movimiento'];
        
        if($tiempo_transcurrido > 500){
            //Has superado el tiempo maximo permitido de inactividad
            header("Location:salir.php");
            exit;
        }else{
            $minutos = floor($tiempo_transcurrido / 60);
            $segundos = $tiempo_transcurrido % 60;
        }
    }
    echo "Tiempo transcurrido: $minutos:$segundos";
?>