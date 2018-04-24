
<?php

//kuriam skaičiuotuvą, naudodami $_GET;

$a = $_GET['a'];
$b = $_GET['b'];
$veiksmas = $_GET['veiksmas'];

if ($a && $b && $veiksmas) {
	switch ($veiksmas) {
		case 'sudetis':
		echo $a + $b;
		break;
		case 'atimtis':
		echo $a - $b;
		break;
		case 'daugyba':
		echo $a * $b;
		break;
		case 'dalyba':
		echo $a / $b;
		break;
		default:
		echo 'Neteisingi duomenys';
	}
}

?>

