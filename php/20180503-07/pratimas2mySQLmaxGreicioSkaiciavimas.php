<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pratimas 2</title>
    <style>
        table, h1, h2 {
            text-align: center;
            margin: auto;
        }
        code h2 {
            text-align: left;
        }
        h1, h2, td, th {
            padding: 12px;
        }
    </style>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>
        Sukurkite programą kad galima būtų išvesti max. greitį.
    </h2>
    <hr>
</code>
<h1>Rezultatų atvaizdavimo/redagavimo lentelė:</h1>
    <table border=1>
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Numeris</th>
            <th>Atstumas, m</th>
            <th>Laikas, s</th>
            <th>Greitis, km/h</th>
        </tr>
    </thead>
    <tbody>
<?php

$serveris = 'localhost';
$vartotojas = 'auto';
$slaptazodis = '123';
$duombaze = 'matavimai1';

$connection = new mysqli($serveris, $vartotojas, $slaptazodis, $duombaze);

if ($connection->connect_error) {
    die ('Nepavyko prisijungti: ' . $connection->connect_error);
}

$sql = "SELECT id, data, numeris, atstumas, laikas, ((atstumas / laikas) * 3.6) AS greitis FROM rezultatai";

$result = $connection->query($sql);

if (!$result) {
    die ('Error: ' . $connection->error);
}


//Piešiam lentelę.
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['data'] .'</td>
    <td>' . $row['numeris'] .'</td>
    <td>' . $row['atstumas'] . '</td>
    <td>' . $row['laikas'] .'</td>
    <td>' . $row['greitis'] .'</td>
    </tr>';
    }
//skaičiuojam max. greitį
$sql = 'SELECT MAX((atstumas / laikas) * 3.6) FROM rezultatai';
$result = $connection->query($sql);
if (!$result) {
    die ('Error :' . $connection->error);
    }
$maxGreitis = $result->fetch_row();
echo '<tr><td colspan=6><b>Maksimalus greitis: ' . $maxGreitis[0] . ' km/h</b></td></tr>';
}

$connection->close();

?>
    </tbody>
</table>
<p></p>
</body>
</html>
