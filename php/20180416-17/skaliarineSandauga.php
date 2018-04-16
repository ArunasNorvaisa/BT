<?php

$vector1 = [5, 6, 10, 15];
$vector2 = [8, 5, 3, 25];
// 475

    function skaliarineSandauga(array $vector1, array $vector2):int {
        $suma = 0;

        for ($i = 0; $i < count($vector1); $i++) {
        	$suma += $vector1[$i] * $vector2[$i];
        }
        return $suma;
    }

    echo skaliarineSandauga($vector1, $vector2);
