<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pratimas - 3 - faktorialo skaičiavimas</title>
</head>
<body>

<?php

//reikia sugeneruoti panašią skaičių seką:
// 00, 01, 02, 03, .... 97, 98, 99

for ($i = 0; $i <= 99; $i++) {
    if ($i < 10) {
        echo '0' . $i . ', ';
    }
    else echo $i . ', ';
}

/*alternatyvus sprendimas:
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        echo $i . $j . ', ';
    }
}*/
?>
</body>
</html>
