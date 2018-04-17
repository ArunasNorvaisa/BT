<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 2</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>Turime masyvą $a = ['Jonas', 'Petras', 'Antanas', 'Povilas'].
Atspausdinkite visas galimas skirtingas poras laikant, kad pvz.
poros 'Jonas' - 'Petras' ir 'Petras' - 'Jonas' yra skirtingos.</h2>
</code>
<p>
<?php
$a = ['Jonas', 'Petras', 'Antanas', 'Povilas'];

foreach ($a as $key1 => $value1) {
    foreach ($a as $key2 => $value2) {
    	if ($key1 != $key2) {
        echo '<h1>' . $value1 . ' - ' . $value2 . '</h1>';
    }
    }
}

?>
</p>
</body>
</html>
