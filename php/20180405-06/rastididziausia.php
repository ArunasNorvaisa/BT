<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <title>Rasti didziausia is 3</title>
</head>
<body>
<?php
$a = 309;
$b = 52;
$c = 120;
$max = $a;

//var_dump($max); //die;

if ($b >= $max) {
    $max = $b;
}

if ($c >= $max) {
    $max = $c;
}
?>

<h2> <?php echo 'Didžiausias skaičius ' . $max ?>! </h2>
</html>