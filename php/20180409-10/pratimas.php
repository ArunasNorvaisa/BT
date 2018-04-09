<?php

// rasti max skaičių iš trijų vidinių masyvų

$array = [
    [
        4, 56, 2375, 67, 487, 3865
    ],
    [
        282457, 39648, 58365, 68325
    ],
    [
        5346, 63437, 86677
    ],
    ];

for ($i = 0; $i < count($array); $i++) {
    $max = $array[$i][0];

    for ($j = 1; $j < count($array[$i]); $j++) {
        if ($array[$i][$j] > $max) {
            $max = $array[$i][$j];
        }
    }

    echo($max) . '<br>';
}
