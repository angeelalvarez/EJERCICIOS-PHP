<?php 
    $cantidad = 9;
    $precio = 3;

    $total = $cantidad * $precio;
    $descuento = ($cantidad >= 10) ? ($total * 0.8) : $total;

    echo "El cliente a comprado $cantidad productos que cuestan $precio € cada uno. <br>";
    

    if($cantidad >= 10){
        echo "Aplicando descuento. <br>";
    }else{
        echo "No se aplica descuento. <br>";
    }
    

    echo "Precio total: $descuento";
?>