<?php
$numeroOriginal = 12345;
$numero = $numeroOriginal; 
$suma = 0;

while ($numero > 0) {
    $digito = $numero % 10; // Obtiene el último dígito (ej: 5)
    $suma += $digito;       // Lo suma al total
    $numero = (int)($numero / 10); // Elimina el último dígito (ej: queda 1234)
}

echo "La suma de los dígitos de $numeroOriginal es: $suma";
?>