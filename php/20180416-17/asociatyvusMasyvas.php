<?php

$a = [
	'39001010123' => [
		'vardas' => 'Jonas',
		'pavarde' => 'Jonaitis',
		'gdata' => '1990-01-01'
	],
	'37502055584' => [
		'vardas' => 'Petras',
		'pavarde' => 'Petraitis',
		'gdata' => '1975-02-05'
	],
];

$b = [
	'46708030084' => [
		'vardas' => 'Rasa',
		'pavarde' => 'Jonaitiene',
		'gdata' => '1967-08-03'
	],
	'48409262345' => [
		'vardas' => 'Ona',
		'pavarde' => 'Onute',
		'gdata' => '1984-09-26'
	],
];

for ($i = 0; $i < count($b); $i++) {
	array_push($a, $b[$i]);
}

var_dump($a);
echo '<br>';
var_dump($b);
