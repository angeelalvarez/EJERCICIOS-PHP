<?php
// 1. Definir variables
$baseRect = 8; // 
$alturaRect = 5; // 

// 2. Calcular área (base * altura)
$areaRect = $baseRect * $alturaRect; // 

// 3. Calcular perímetro (2 * (base + altura))
$perimetroRect = 2 * ($baseRect + $alturaRect); // 

// 4. Mostrar resultados
echo "Base: $baseRect, Altura: $alturaRect<br>";
echo "Área del rectángulo: " . $areaRect . "<br>";
echo "Perímetro del rectángulo: $perimetroRect";
?>