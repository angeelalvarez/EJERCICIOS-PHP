<?php 
    $edadger = 19;
    $edadfacu = 17;

    echo "Gervasio tiene $edadger años. <br>";
    echo "Facundina tiene $edadfacu años. <br>";
    
    $gerpuede = ($edadger >= 18);
    $facupuede = ($edadfacu >= 18);

    if($gerpuede && $facupuede){
        echo "Ambos pueden ir a ver la película";
    }elseif($gerpuede){
        echo "Solo Gervasio puede verla";
    }elseif($facupuede){
        echo "Solo Facundina puede verla";
    }else{
        echo "Ninguno puede verla";
    }
?>