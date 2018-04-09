<?php

// duotas skaičių masyvas, rasti didžiausią

$array = [
    4,
    56,
    2375,
    67,
    487,
    3865
];
$max = $array[0];

for($i = 1; $i < count($array); $i++) {
    if ($array[$i] > $max) {
        $max = $array[$i];
    }
}
echo("Didžiausias skaičius yra " . $max);
