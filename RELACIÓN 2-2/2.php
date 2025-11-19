<?php
    $array = [2,5,6,8,9];
    $min = $array[0];
    $max = $array[0];
    foreach($array as $n){
        if($min > $n){
            $min = $n;
        }

        if($max < $n){
            $max = $n;
        }
    }

    echo "Maximo: $max "."Minimo: $min";
?>