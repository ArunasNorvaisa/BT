<?php

//vakarykštės užduoties (uzdavinys3.php) sprendime buvo
//klaidų, išlysiančių jei ne visi vidiniai masyvai būtų
//vienodo ilgio :(

$a = [
    [
        3, 4, 6, 4
    ],
    [
        5, 6, 2, 1, 1
    ],
    [
        1, 4, 7, 4, 1
    ],
];

$suma = [];

for($i = 0; $i < count($a); $i++) {
    for ($j = 0; $j < count($a[$i]); $j++) {
        if (empty($suma[$j])) {
            $suma[$j] = $a[$i][$j];
        } else {
            $suma[$j] += $a[$i][$j];
        }
    }
}

$i = 0;

while ($i < count($suma)) {
    echo $suma[$i] . '<br>';

    $i++;
}