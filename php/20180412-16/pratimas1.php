<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pratimas 1</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>Suskaičiuokite skaičių nuo 1 iki 100 sumą.</h2>
</code>
<p>
<?php
$suma = 0;

for ($i = 1; $i <= 100; $i++) {
    $suma += $i;
}
echo $suma;

?>
</body>
</html>