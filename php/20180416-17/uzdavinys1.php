<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 1</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>Turime masyvą $a = ['Jonas', 'Petras', 'Antanas', 'Povilas'].
Atspausdinkite visas galimas skirtingas poras laikant, kad pvz.
poros 'Jonas' - 'Petras' ir 'Petras' - 'Jonas' yra tokios pat.</h2>
</code>
<p>
<?php
$a = ['Jonas', 'Petras', 'Antanas', 'Povilas'];

for ($i = 0; $i < count($a); $i++) {
    for ($j = $i + 1; $j < count($a); $j++) {
        echo '<h1>' . $a[$i] . ' - ' . $a[$j] . '</h1>';
    }
}

?>
</p>
</body>
</html>
