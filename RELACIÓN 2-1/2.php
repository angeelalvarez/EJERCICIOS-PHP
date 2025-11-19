<?php
// 1. Definir las fechas
$fechaActual = new DateTime("2025-11-10"); // Fecha actual
$fechaNacimiento = new DateTime("2003-11-15"); // Fecha de nacimiento

// 2. Calcular la diferencia
$intervalo = $fechaActual->diff($fechaNacimiento);

// 3. Obtener los años de diferencia
$edad = $intervalo->y;

// 4. Mostrar datos y comprobar la edad
echo "Fecha actual: " . $fechaActual->format('d-m-Y') . "<br>";
echo "Fecha nacimiento: " . $fechaNacimiento->format('d-m-Y') . "<br>";
echo "Edad: $edad años<br>";

if ($edad >= 18) {
    echo "Es MAYOR de edad.";
} else {
    echo "Es MENOR de edad.";
}
?>