<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 1</title>
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
</h2>
</code>
<p>
<?php
$a = [3, 4, 5];
$b = [1, 10, 8];
$c = [5, 6, 5];
$d = [5, 5, 5];

$j = 0;
$max = 0;
$maxIndex = 0;
$likusiuKrastiniuSuma = 0;

for ($j = 0; $j < count($a); $j++) {
	if ($max < $a[$j]) {
		$max = $a[$j];
		$maxIndex = $j;
	}
}

array_splice($a, $maxIndex, 1);
$likusiuKrastiniuSuma = $a[0] + $a[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.1 nesigauna <br>';
}
else if ($a[0] == $a[1]) {
	if ($a[0] == $max) {
	echo 'Trikampis Nr.1 - lygiakraštis<br>';
}
	else {
		echo 'Trikampis Nr.1 - lygiašonis<br>';
	}
}
else {
	echo 'Trikampis Nr.1 -  įvairiakraštis<br>';
}

//antras masyvas

$j = 0;
$max = 0;
$maxIndex = 0;
$likusiuKrastiniuSuma = 0;

for ($j = 0; $j < count($b); $j++) {
	if ($max < $b[$j]) {
		$max = $b[$j];
		$maxIndex = $j;
	}
}

array_splice($b, $maxIndex, 1);
$likusiuKrastiniuSuma = $b[0] + $b[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.2 nesigauna <br>';
}
else if ($b[0] == $b[1]) {
	if ($b[0] == $max) {
	echo 'Trikampis Nr.2 - lygiakraštis<br>';
}
	else {
		echo 'Trikampis Nr.2 - lygiašonis<br>';
	}
}
else {
	echo 'Trikampis Nr.2 -  įvairiakraštis<br>';
}

//trečias trikampis

$j = 0;
$max = 0;
$maxIndex = 0;
$likusiuKrastiniuSuma = 0;

for ($j = 0; $j < count($c); $j++) {
	if ($max < $c[$j]) {
		$max = $c[$j];
		$maxIndex = $j;
	}
}

array_splice($c, $maxIndex, 1);
$likusiuKrastiniuSuma = $c[0] + $c[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.3 nesigauna <br>';
}
else if ($c[0] == $c[1]) {
	if ($c[0] == $max) {
	echo 'Trikampis Nr.3 - lygiakraštis<br>';
}
	else {
		echo 'Trikampis Nr.3 - lygiašonis<br>';
	}
}
else {
	echo 'Trikampis Nr.3 -  įvairiakraštis<br>';
}

//ketvirtas trikampis

$j = 0;
$max = 0;
$maxIndex = 0;
$likusiuKrastiniuSuma = 0;

for ($j = 0; $j < count($d); $j++) {
	if ($max < $d[$j]) {
		$max = $d[$j];
		$maxIndex = $j;
	}
}

array_splice($d, $maxIndex, 1);
$likusiuKrastiniuSuma = $d[0] + $d[1];
if ($likusiuKrastiniuSuma < $max) {
	echo 'Trikampis Nr.4 nesigauna <br>';
}
else if ($d[0] == $d[1]) {
	if ($d[0] == $max) {
	echo 'Trikampis Nr.4 - lygiakraštis<br>';
}
	else {
		echo 'Trikampis Nr.4 - lygiašonis<br>';
	}
}
else {
	echo 'Trikampis Nr.4 -  įvairiakraštis<br>';
}

?>	
</body>
</html>