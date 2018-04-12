<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 3</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>Duotas masyvas array(-10, 0, 2, 9, -5). Atspausdinkite masyvo elementus mažėjimo tvarka.
</h2>
</code>
<p>
<?php

$a = [-10, 0, 2, 9, -5];

for ($i = 0; $i < count($a); $i++) {
$max = $a[0];
$maxIndex = 0;
var_dump($a);

for ($j = 0; $j < count($a); $j++) {
	if ($max < $a[$j]) {
		$max = $a[$j];
		$maxIndex = $j;
	}
}
	echo $max . '<br>'
	//array_splice($a, $maxIndex, 1);
	unset($a[$maxIndex]);
}

?>	
</body>
</html>