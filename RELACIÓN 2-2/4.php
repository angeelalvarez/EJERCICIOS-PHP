<?php
    $array = [];
    $num = 3;

    for($i=0;$i<=9;$i++){
        $array[] = $num +$i;
    }

    foreach($array as $m){
        echo "$m ";
    }
?>