<?php

$a = [
    [
        'vardas' => 'Jonas',
        'pavarde' => 'Jonaitis',
        'elPastas' => 'jonas@jonas.lt'
    ],
    [
        'vardas' => 'Petras',
        'pavarde' => 'Petraitis',
        'elPastas' => 'petras@petras.lt'
    ],
    [
        'vardas' => 'Ona',
        'pavarde' => 'Jonaitiene',
        'elPastas' => 'ona@jonas.lt'
    ]
];

function printInfo(array $array) {
    foreach ($array as $element) {
        echo 'Vardas: ' . $element['vardas'] . ', ';
        echo 'pavardė: ' . $element['pavarde'] . ', ';
        echo 'el. paštas: ' . $element['elPastas'] . ', ';
        echo '<br>';
    }
}

printInfo($a);