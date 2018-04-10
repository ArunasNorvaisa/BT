<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Užduotis - 3</title>
</head>
<body>
<h2>Sąlyga:</h2>
<code><h3>Duotas daugiamatis masyvas m elementų, kurių kiekvienas yra masyvas iš n elementų.
 Įsivaizduokime tą masyvą kaip lentelę iš m eilučių, kurių kiekviena turi n reikšmių arba n
 stulpelių. Suskaičiuokite visų stulpelių sumas ir atspausdinkite.</h3></code>
<p>

<h2>Duotas masyvas:</h2><br>
<table border=1>

<?php
$a = [
    [
    4645, 7506, 8001, 6088, 23, 581, 5050, 3611, 1485, 1149, 2870, 888
],
[
    5288, 231, 2661, 9011, 8723, 3081, 6800, 4899, 6108, 962, 1499, 9305
],
[
    8474, 6310, 8976, 321, 4941, 6987, 1561, 8969, 219, 8749, 8461, 3165
],
[
    2165, 3218, 5496, 6795, 7987, 2545, 8195, 5465, 3254, 5065, 754, 3694
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

//skaičiuojam stulpelių sumas
$eilute = 0;
$stulpelis = 0;
$stulpeliuKiekis = count($a[$eilute]);

echo "<tr>";
while ($stulpelis < $stulpeliuKiekis) {
    $suma = 0;
    $eilute = 0;

    while ($eilute < count($a)) {
        $suma += $a[$eilute][$stulpelis];
        $eilute++;
}
echo "<td><b>" . $suma . "</b></td>";
$stulpelis++;
}
echo "</tr>";

?>
</table>
</p>
<h3>Stulpelių sumos - paskutinėje eilutėje, paryškintos</h3>
</body>
</html>