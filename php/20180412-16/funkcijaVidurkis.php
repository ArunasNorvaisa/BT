<?php
function vidurkis(array $array):float {
    $suma = 0;
    $vid = 0;
    for ($i = 0; $i < count($array); $i++) {
        $suma += $array[$i];
    }
    $vid = $suma / count($array);
    return $vid;
}

$a = [1, 2, 5, 7, 89];

echo vidurkis($a);