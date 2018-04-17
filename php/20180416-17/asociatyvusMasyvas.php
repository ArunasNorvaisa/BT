<?php

$a = [
	'49001010123' => [
		'vardas' => 'Jonas',
		'pavarde' => 'Jonaitis',
		'gdata' => '1990-01-01'
	],
	'37502055584' => [
		'vardas' => 'Petras',
		'pavarde' => 'Petraitis',
		'gdata' => '1975-02-05'
	]
];

$b = [
	'36708030084' => [
		'vardas' => 'Rasa',
		'pavarde' => 'Jonaitiene',
		'gdata' => '1967-08-03'
	],
	'48409262345' => [
		'vardas' => 'Ona',
		'pavarde' => 'Onute',
		'gdata' => '1984-09-26'
	]
];

foreach ($b as $key => $value) {
	$a[] = $value;
}

var_dump($a);

$a = array_splice($a, -count($b));

var_dump($a);
