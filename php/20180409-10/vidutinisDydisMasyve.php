<?php

$a = [
    2, 4, 67
];

$suma = 0;

for ($i = 0; $i < count($a); $i++) {
    $suma += $a[$i];
}

echo $suma . '<br>';

$vidutinis = $suma / count($a);

echo $vidutinis;
