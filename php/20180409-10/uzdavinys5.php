<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Užduotis - 5</title>
</head>
<body>
<h2>Sąlyga:</h2>
<code><h3>Duotas daugiamatis masyvas iš n eilučių ir n stulpelių. Suskaičiuoti ir atspausdinti
abiejų įstrįžainių elementų sumas.</h3></code>
<p>

<h2>Duotas masyvas:</h2><br>
<table border=1>

<?php
$a = [
    [
    4645, 7506, 8001, 6088
],
[
    5288, 231, 2661, 9011
],
[
    8474, 6310, 8976, 321
],
[
    2165, 3218, 5496, 6795
]
];

//spausdinsim masyvą, kad būtų aišku su kuo dirbam :)
$i = 0;
while ($i < count($a)) {
    echo "<tr>";

    for ($j = 0; $j < count($a[$i]); $j++) {
    echo "<td>" . $a[$i][$j] . "</td>";
}
    echo "</tr>";
    $i++;
}

//skaičiuojam įstrižainių sumas
$i = 0;
$j = count($a) - 1;
$suma1 = 0;
$suma2 = 0;

while ($i < count($a)) {
    $suma1 += $a[$i][$i];
    $suma2 += $a[$i][$j];
    $i++;
    $j--;
}
echo "</table><h3>Įstrižainių sumos: $suma1 ir $suma2 </h3>";
?>

</p>
</body>
</html>