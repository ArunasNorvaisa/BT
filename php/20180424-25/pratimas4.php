
<?php

//kuriam skaičiuotuvą, naudodami $_POST;

$a = $_POST['skaicius1'];
$b = $_POST['skaicius2'];
$veiksmas = $_POST['veiksmas'];

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

