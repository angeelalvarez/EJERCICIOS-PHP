<?php
$terminos = 15; // Número de términos a mostrar
$num1 = 0;
$num2 = 1;

echo "Secuencia de Fibonacci ($terminos términos): <br>";

// Mostramos los dos primeros manualmente (o dentro del bucle con lógica extra)
echo "$num1, $num2"; 

for ($i = 3; $i <= $terminos; $i++) {
    $siguiente = $num1 + $num2; // Suma de los dos anteriores
    echo ", $siguiente";
    
    // Actualizamos las variables para la siguiente iteración
    $num1 = $num2;
    $num2 = $siguiente;
}
?>