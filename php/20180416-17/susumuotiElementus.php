<?php
//susumuoti pirmus elementus visų išskyrus ‘B’:

$a = ['A' => [1], 'B' => [3, 4], 'C' => [6, 5]];
$suma = 0;

foreach ($a as $key => $value) {

if ($key != 'B') {
$suma += $value[0];
}

}

echo $suma;