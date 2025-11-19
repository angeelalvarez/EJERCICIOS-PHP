<?php
    $array = ["hola","hello","bonjour"];

    $lista = "";
    foreach($array as $p){
        $lista .= $p;
    }

    echo trim($lista);
?>