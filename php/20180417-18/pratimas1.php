<?php

//rasti lyginių skaičių sumą iki pirmojo nelyginio

$a = [4, 2, 2, 0, 1, 2, 3];

$suma = 0;

foreach ($a as $value) {
	if ($value % 2) {
		break;
	}
	else {
		$suma += $value;
	}
}

var_dump($suma);