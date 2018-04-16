<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 1</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>Turime du masyvus $a = array(5, 6, 10, 15) ir $b = array(8, 5, 3, 25). Raskite kiekvieno masyvo skaičių vidurkį ir atspausdinkite jų skirtumą. Masyvo vidurkio suradimui parašykite funkciją. Rezultatas turi gautis: -1.25
</h2>
</code>
<p>
<?php

$a = [5, 6, 10, 15];
$b = [8, 5, 3, 25];

function rastiVidurki(array $array):float {
	$suma = 0;
	for ($i = 0; $i < count($array); $i++) {
		$suma += $array[$i];
	}
	return $suma / count($array);
}

$vidurkiuSkirtumas = rastiVidurki($a) - rastiVidurki($b);

echo '<br>Vidurkių skirtumas: ' . $vidurkiuSkirtumas;

?>	
</body>
</html>
