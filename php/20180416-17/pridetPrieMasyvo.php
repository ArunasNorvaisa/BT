<?php

$zmones1 = [
	[
		'Jonas',
		'Jonaitis',
		3333333333333
	],
	[
		'Petras',
		'Petraitis',
		3333333333332
	],
	[
		'Ona',
		'Onute',
		3333333333331
	]
	];

$zmones2 = [
	[
		'Vardenis',
		'Pavardenis',
		2222222333333
	],
	[
		'John',
		'Smith',
		1111113333332
	],
	[
		'Jane',
		'Doe',
		4444443333331
	]
	];

    function pridetiElementus(array $a1, array $a2):array {
        for ($i = 0; $i < count($a2); $i++) {
        	$a1[] = $a2[$i];
        	//array_push($a1, $a2[$i]);
        }
        var_dump($a1);
        return $a1;
    }

    pridetiElementus($zmones1, $zmones2);
    var_dump($zmones1);
