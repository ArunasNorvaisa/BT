<?php

$a = [];

$b = gettype($a);

switch ($b) {
	case 'integer':
		echo 'Kintamasis yra sveikas skaičius.' . $a;
		break;

	case 'double':
		echo 'Kintamasis yra skaičius su kableliu.' . $a;
		break;

	case 'array':
		echo 'Kintamasis yra masyvas. <br>' . var_dump($a);
		break;

	case 'boolean':
		echo 'Kintamasis yra loginis (TRUE|FALSE).' . $a;
		break;

	case 'string':
		echo 'Kintamasis yra simbolių eilutė.' . $a;
		break;

	case 'NULL':
		echo 'Kintamajam reikšmė nepriskirta.' . $a;
		break;
	
	default:
		echo 'Kintamasis yra nežinomo tipo' . $a;
		break;
}