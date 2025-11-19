<?php
$numero = 16; 
$esPrimo = true;

if ($numero < 2) {
    $esPrimo = false; 
} else {
    for ($i = 2; $i <= $numero / 2; $i++) {
        if ($numero % $i == 0) {
            $esPrimo = false; 
            break; 
        }
    }
}

if ($esPrimo) {
    echo "El número $numero ES primo.";
} else {
    echo "El número $numero NO es primo.";
}
?>