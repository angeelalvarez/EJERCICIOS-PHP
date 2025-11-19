<?php 
    $edad = 20;
    $permiso = true;

    echo "Tiene $edad años <br>";
    echo "Tiene permiso: " . ($permiso ? "Sí" : "No") . "<br>";

    if($edad >= 18 && $permiso = true){
        echo "Puedes conducir";
    }else{
        echo "No puedes conducir";
    }
?>