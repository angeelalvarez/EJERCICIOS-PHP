<?php
    $array=[1,5,8,3,5,6];
    $suma=0;
    $contador=0;

    foreach($array as $n){
        $suma += $n;
        $contador++;
    }

    $promedio = $suma/$contador;

    echo number_format($promedio,2);
?>