<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 3</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>Turime daugiamatį masyvą, kuris aprašo kažką panašaus į
Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o
antras stulpelį. Eilutės gali turėti skirtingą elementų (stulpelių)
skaičių. Suskaičiuokite stulpeliuose esančių skaičių sumas ir
išveskite didžiausią.<p>

Testuokite su masyvu:<br>
$a = [[1, 3, 4], [2, 5], [2 => 3, 5 => 8], [1, 1, 5 => 1]]</p></h2>
</code>
<p>
<?php
$a = [
	[1, 3, 4],
	[2, 5],
	[2 => 3, 5 => 8],
	[1, 1, 5 => 1]
];

//ieškom didž. indekso reikšmės mūsų masyvuose
//https://justin.kelly.org.au/get-the-largest-key-in-an-array-with-php-how/

for ($i = 1; $i < count($a); $i++) {
	$maxIndex = max(array_keys($a[0]));
	if (max(array_keys($a[$i])) > $maxIndex) {
		$maxIndex = max(array_keys($a[$i]));
	}
}

echo '<table border=1>';

for ($i = 0; $i < count($a); $i++) {
	$suma = 0;
	echo '<tr>';
	//var_dump($a[$i]);
	for ($j = 0; $j <= $maxIndex; $j++) {
		if (empty($a[$i][$j])) {
			$a[$i][$j] = 0;
		}
		$suma += $a[$i][$j];	
		echo "<td style='padding:10px;'>" . $a[$i][$j] . '</td>';
	}
	echo '</tr>';
}

//skaičiuojam stulpelių sumas
$eilute = 0;
$stulpelis = 0;
$sumuMasyvas = [];

echo "<tr>";
while ($stulpelis <= $maxIndex) {
    $suma = 0;
    $eilute = 0;

    while ($eilute < count($a)) {
        $suma += $a[$eilute][$stulpelis];
        $eilute++;
}
echo '<td style="padding:10px;"><b>' . $suma . '</b></td>';
$sumuMasyvas[] = $suma;
$stulpelis++;
}

echo "</tr>";
echo '</table>';

//renkame didžiausią iš stulpelių sumų

$max = $sumuMasyvas[0];

for ($i = 1; $i < count($sumuMasyvas); $i++) {

    if ($max < $sumuMasyvas[$i]) {
        $max = $sumuMasyvas[$i];
    }
}

echo "<h3>Stulpelių sumos - paskutinėje eilutėje, paryškintos<br>";
echo "Didžiausia suma: " . $max . "</h3>";
?>

</p>
</body>
</html>