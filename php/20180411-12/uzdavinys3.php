<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 3</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>Duotas masyvas array(-10, 0, 2, -13, -7777, 9, -5, -12, -999, -236764). Atspausdinkite masyvo elementus mažėjimo tvarka.
</h2>
</code>
<p>
<?php

$a = [-10, 0, 2, -13, -7777, 9, -5, -12, -999, -236764];

$start = count($a);

for ($j = 0; $j < $start; $j++) {
    $max = $a[0];
    $maxIndex = 0;

    for ($i = 1; $i < count($a); $i++) {
        if ($a[$i] > $max) {
            $max = $a[$i];
            $maxIndex = $i;
        }
    }
    echo $max . '<br>';
    array_splice($a, $maxIndex, 1);
}

?>	
</body>
</html>