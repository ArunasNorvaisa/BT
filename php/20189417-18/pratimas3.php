<?php

//sukelti visus teigiamus masyvo elementus į jo pradžią,
//neigimus paliekant savo vietose

$a = [-4, -2, -2, 0, -14, 2, 3];

foreach ($a as $key => $value) {
	if ($value >= 0) {
		array_splice($a, $key, 1);
		array_unshift($a, $value);
	}
}

var_dump($a);