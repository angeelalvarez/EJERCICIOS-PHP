<?php
    $array=[1,23,10,5,7,9,2];
    $contador = 0;
    foreach($array as $p){
        if($p > 5){
            $contador++;
        }
    }

    echo $contador;
?>