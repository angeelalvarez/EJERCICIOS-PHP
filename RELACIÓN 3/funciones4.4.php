<?php
    function tabla(int $n):string{
        $salida = "<ul>";

        for ($i=0;$i<=10;$i++){
            $salida .= "<li>$n * $i = ".($n*$i)."</li>";
        }
        $salida .= "</ul>";

        return $salida;
    }
?>