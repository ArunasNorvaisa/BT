<?php
$array = generateArray(1, 1);
$array1 = generateArray(2, 5);

function generateArray(int $count, int $columns): array
{
    $array = [];

    for ($i = 0; $i < $count; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            $array[$i][$j] = mt_rand();
        }
    }

    return $array;
}