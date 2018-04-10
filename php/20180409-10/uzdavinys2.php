<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                         <meta http-equiv="X-UA-Compatible" content="ie=edge">
             <title>Užduotis - 2</title>
</head>
<body>
<h2>Sąlyga:</h2>
<code><h3>Duotas masyvas a. Atspausdinkite masyvo elementus didėjančia tvarka.</h3></code>
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

//rikiuojam masyvo elementus didėjančia tvarka
sort($a);

echo "<br><h2>Masyvo elementai didėjančia tvarka:</h2><br>";

//išvedam surikiuotus elementus
$i = 0;
while ($i < count($a)) {
    echo $a[$i] . "<br>";
    $i++;
}

?>
</p>
</body>
</html>