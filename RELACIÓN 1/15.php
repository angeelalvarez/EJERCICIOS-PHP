<?php 
    $temperatura = 100;


    $estado = ($temperatura <= 0) ? "Congelada" : 
          (($temperatura >= 100) ? "Hirviendo" : "Líquida"); 


    echo "Temperatura: $temperatura °C<br>";
    echo "Estado del agua: " . $estado;
?>
