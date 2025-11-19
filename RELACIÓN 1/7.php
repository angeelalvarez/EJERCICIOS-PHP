<?php
// 1. Definir total de segundos
$totalSegundos = 15000; // 

// 2. Calcular horas
// (3600 segundos en 1 hora)
$horas = floor($totalSegundos / 3600); // 

// 3. Calcular segundos restantes
$segundosRestantes = $totalSegundos % 3600;

// 4. Calcular minutos
// (60 segundos en 1 minuto)
$minutos = floor($segundosRestantes / 60); // 

// 5. Calcular segundos finales
$segundos = $segundosRestantes % 60; // 

// 6. Formatear a dos dígitos (HH:MM:SS) 
$hh = str_pad($horas, 2, "0", STR_PAD_LEFT);
$mm = str_pad($minutos, 2, "0", STR_PAD_LEFT);
$ss = str_pad($segundos, 2, "0", STR_PAD_LEFT);

// 7. Mostrar resultado
echo "Total de segundos: $totalSegundos<br>";
echo "Formato HH:MM:SS: " . $hh . ":" . $mm . ":" . $ss; // 
?>