<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uždavinys 1</title>
    <style>
    table, h1, h2 {
        text-align: center;
        margin: auto;
    }
    h1, h2, td, th {
        padding: 12px;
    }
</style>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>Tarkime turime masyvą objektų Mokinys. Reikia
atspausdinti mokinių vardus ir pavardes su jų trimestro
vidurkiu į html lentelę vidurkio mažėjimo tvarka.<br>
Mokinys klasė – vardas, pavardė. Mokinys paveldi Trimestras
klasę – dalykų masyvas su pažymiais, kur indeksas dalyko
pavadinimas.</h2><hr>
</code>
<p>
<?php
    require 'uzdavinys1-1.php';
    require 'uzdavinys1-2.php';
    require 'uzdavinys1-3.php';
    require 'uzdavinys1-4.php';

//pildom pirminių duomenų lentelę
echo '<h2>Pirminiai duomenys:</h2>';
lentele($mokiniai);

//rūšiuojam masyvą vidurkio mažėjimo tvarka
arsort($mokiniai);

//pildom rezultatų lentelę
echo '<h2>Surikiuota lentelė vidurkio mažėjimo tvarka:</h2>';
lentele($mokiniai);

?>
</p>
</body>
</html>