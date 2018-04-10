<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Užduotis - 1</title>
</head>
<body>
<h2>Sąlyga:</h2>
<code><h3>Duotas masyvas a. Suskaičiuokite lyginių indeksų masyvo elementų sumą.</h3></code>
<p>

<h2>Duotas masyvas:</h2><br>

<?php
$a = [
    4645, 7506, 8001, 6088, 23, 581, 5050, 3611, 1485, 1149, 2870, 888
];

//spausdinsim masyvą, kad būtų aišku su kuo dirbam :)
$i = 0;
while ($i < count($a)) {
    echo "Masyvo elementas Nr. $i: $a[$i]<br>";
    $i++;
}

echo "<br><h2>Masyvo elementai su lyginiu indeksu:</h2><br>
<h3>(atkreipiam dėmesį jog indeksuose 0, 2, 4 ir t.t. - NElyginiai skaičiai)</h3><br>";

//ieškom elementų su lyginiu indeksu ir juos sumuojam
$suma = 0;
$i = 1;
while ($i < count($a)) {
    $suma += $a[$i];
    echo "Masyvo elementas Nr. $i: $a[$i]<br>";
    $i += 2;
}

//išvedam sumą ant ekrano
echo "<h3>Masyvo elementų lyginiu indeksu suma: $suma</h3>";

?>
</p>
</body>
</html>