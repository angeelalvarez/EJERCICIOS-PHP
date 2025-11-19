<?php
$numero = 5; 

$factorial = 1;

if ($numero < 0) {
    echo "El factorial no está definido para números negativos.";
} else {
    for ($i = 1; $i <= $numero; $i++) {
        $factorial *= $i; 
    }
    
    echo "El factorial de $numero es: $factorial"; 
}
?>