<?php

$a = [
	'49001010123' => [
		'vardas' => 'Jonas',
		'pavarde' => 'Jonaitis',
		'gdata' => '1990-01-01'
	],
	'7502055584' => [
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

//Šitas kodas visai neveikia:

/*for ($i = 0; $i < count($b); $i++) {
	//array_push($a, $b[$i]);
	$a[] = $b[$i];
}*/

//šitas ciklas grąžina masyvą su pakeistais $b indeksais:

foreach ($b as $key => $value) {
	$a[] = $b[$key];
}

var_dump($a);

//Šita eilutė vietoj to kad ištrintų paskutinius 2 elementus,
//ištrina pirmus. O kaip ištrinti kurių indeksas prasideda "4"
//visai neturiu idėjų :(

$a = array_splice($a, -count($b));

var_dump($a);
