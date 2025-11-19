<?php 
    $altura = 1.70;
    $peso = 67;

    $imc = $peso / ($altura * $altura);

    echo "Mido $altura y peso $peso kg. <br>";
    echo "Mi IMC es ".number_format($imc, 2). "<br>";

    if($imc >= 18.5 && $imc <= 24.9){
        echo "Tu IMC está en un rango saludable";
    }else{
        echo "Tu IMC no está en un rango saludable";
    }

?>