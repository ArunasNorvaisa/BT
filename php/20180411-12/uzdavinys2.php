<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 2</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>
	Duoti trys skaičiai: a, b, c. Nustatyti ar šie skaičiai gali būti trikampio
	kraštinių ilgiai ir jei gali tai kokio trikampio: lygiakraščio, lygiašonio
	ar įvairiakraščio. Atspausdinkite atsakymą. Kaip pradinius duomenis panaudokite
	tokius skaičius:
	<ul>
		<li>3, 4, 5</li>
		<li>2, 10, 8</li>
		<li>5, 6, 5</li>
		<li>5, 5, 5</li>
	</ul>
	Apskaičioukite trikampio plotą.
</h2>
</code>
<p>
<?php
$a = [3, 4, 5];
$b = [1, 10, 8];
$c = [5, 6, 5];
$d = [5, 5, 5];

//pirmas trikampis
$max = 0; //maksimali kraštinė
$maxIndex = 0; //jos indeksas masyve
$likusiuKrastiniuSuma = 0;
$pusePerimetro = 0; //pusė trikampio perimetro - reikės skaičiuojant plotą
$plotas = 1;

for ($j = 0; $j < count($a); $j++) {
	if ($max < $a[$j]) {
		$max = $a[$j];
		$maxIndex = $j;
	}
	$pusePerimetro += $a[$j] / 2;
}

//skaičiuojam plotą
for ($j = 0; $j < count($a); $j++) {
	$plotas *= ($pusePerimetro - $a[$j]);
}
if ($plotas > 0) {
	$plotas = sqrt($pusePerimetro * $plotas);
}
else {
	$plotas = 0;
}

array_splice($a, $maxIndex, 1);
$likusiuKrastiniuSuma = $a[0] + $a[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.1 nesigauna <br>';
}
else if ($a[0] == $a[1]) {
	if ($a[0] == $max) {
	echo 'Trikampis Nr.1 - lygiakraštis, jo plotas: ' . $plotas . '<br>';
}
	else {
		echo 'Trikampis Nr.1 - lygiašonis, jo plotas: ' . $plotas . '<br>';
	}
}
else {
	echo 'Trikampis Nr.1 -  įvairiakraštis, jo plotas: ' . $plotas . '<br>';
}

//antras trikampis

$max = 0;
$maxIndex = 0;
$likusiuKrastiniuSuma = 0;
$pusePerimetro = 0;
$plotas = 1;

for ($j = 0; $j < count($b); $j++) {
	if ($max < $b[$j]) {
		$max = $b[$j];
		$maxIndex = $j;
	}
	$pusePerimetro += $b[$j] / 2;
}

//skaičiuojam plotą
for ($j = 0; $j < count($b); $j++) {
	$plotas *= ($pusePerimetro - $b[$j]);
}
if ($plotas > 0) {
	$plotas = sqrt($pusePerimetro * $plotas);
}
else {
	$plotas = 0;
}

array_splice($b, $maxIndex, 1);
$likusiuKrastiniuSuma = $b[0] + $b[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.2 nesigauna <br>';
}
else if ($b[0] == $b[1]) {
	if ($b[0] == $max) {
	echo 'Trikampis Nr.2 - lygiakraštis, jo plotas: ' . $plotas . '<br>';
}
	else {
		echo 'Trikampis Nr.2 - lygiašonis, jo plotas: ' . $plotas . '<br>';
	}
}
else {
	echo 'Trikampis Nr.2 -  įvairiakraštis, jo plotas: ' . $plotas . '<br>';
}

//trečias trikampis

$max = 0;
$maxIndex = 0;
$likusiuKrastiniuSuma = 0;
$pusePerimetro = 0;
$plotas = 1;

for ($j = 0; $j < count($c); $j++) {
	if ($max < $c[$j]) {
		$max = $c[$j];
		$maxIndex = $j;
	}
	$pusePerimetro += $c[$j] / 2;
}

//skaičiuojam plotą
for ($j = 0; $j < count($c); $j++) {
	$plotas *= ($pusePerimetro - $c[$j]);
}
if ($plotas > 0) {
	$plotas = sqrt($pusePerimetro * $plotas);
}
else {
	$plotas = 0;
}

array_splice($c, $maxIndex, 1);
$likusiuKrastiniuSuma = $c[0] + $c[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.3 nesigauna <br>';
}
else if ($c[0] == $c[1]) {
	if ($c[0] == $max) {
	echo 'Trikampis Nr.3 - lygiakraštis, jo plotas: ' . $plotas . '<br>';
}
	else {
		echo 'Trikampis Nr.3 - lygiašonis, jo plotas: ' . $plotas . '<br>';
	}
}
else {
	echo 'Trikampis Nr.3 -  įvairiakraštis, jo plotas: ' . $plotas . '<br>';
}

//ketvirtas trikampis

$max = 0;
$maxIndex = 0;
$likusiuKrastiniuSuma = 0;
$pusePerimetro = 0;
$plotas = 1;

for ($j = 0; $j < count($d); $j++) {
	if ($max < $d[$j]) {
		$max = $d[$j];
		$maxIndex = $j;
	}
	$pusePerimetro += $d[$j] / 2;
}

//skaičiuojam plotą
for ($j = 0; $j < count($d); $j++) {
	$plotas *= ($pusePerimetro - $d[$j]);
}
if ($plotas > 0) {
	$plotas = sqrt($pusePerimetro * $plotas);
}
else {
	$plotas = 0;
}

array_splice($d, $maxIndex, 1);
$likusiuKrastiniuSuma = $d[0] + $d[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.4 nesigauna <br>';
}
else if ($d[0] == $d[1]) {
	if ($d[0] == $max) {
	echo 'Trikampis Nr.4 - lygiakraštis, jo plotas: ' . $plotas . '<br>';
}
	else {
		echo 'Trikampis Nr.4 - lygiašonis, jo plotas: ' . $plotas . '<br>';
	}
}
else {
	echo 'Trikampis Nr.4 -  įvairiakraštis, jo plotas: ' . $plotas . '<br>';
}

?>	
</body>
</html>