<?php

//rasti visų nenulinių skaičių sandaugą

$a = [4, 2, 2, 0, 1, 2, 3];

$sandauga = 1;

foreach ($a as $value) {
	if ($value == 0) {
		continue;
	}
	else {
		$sandauga *= $value;
	}
}

var_dump($sandauga);