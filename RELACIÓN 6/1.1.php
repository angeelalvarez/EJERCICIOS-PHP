<?php
    function taxi(int $dist, int $ti):float{
            $totalkm = 1.5 * $dist;
            $totalti = 0.5 * $ti;
            $total = $totalkm + $totalti + 3;
            return $total;
    }
?>