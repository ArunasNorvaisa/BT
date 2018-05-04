<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pratimas 1</title>
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
        Sukurkite programą kad galima būtų išvesti eilučių kiekį duomenų bazėje.
    </h2>
    <hr>
</code>
<h1>Rezultatų atvaizdavimo lentelė:</h1>
    <table border=1>
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Numeris</th>
            <th>Atstumas, m</th>
            <th>Laikas, s</th>
        </tr>
    </thead>
    <tbody>
<?php

session_start();

$serveris = 'localhost';
$vartotojas = 'auto';
$slaptazodis = '123';
$duombaze = 'matavimai1';

$connection = new mysqli($serveris, $vartotojas, $slaptazodis, $duombaze);

if ($connection->connect_error) {
    die ('Nepavyko prisijungti: ' . $connection->connect_error);
}

$sql = 'SELECT * FROM rezultatai';

$result = $connection->query($sql);

if (!$result) {
    die ('Error: ' . $connection->error);
}


//Piešiam lentelę. Kiekviena eilutė turi savo formos ID, kad redaguojant
//į serverį nebūtų siunčiama visa duombazė.
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['data'] .'</td>
    <td>' . $row['numeris'] .'</td>
    <td>' . $row['atstumas'] . '</td>
    <td>' . $row['laikas'] . '</td>
    </tr>';
    }
//skaičiuojam eilučių/įrašų skaičių ir pridedam prie lentelės
$sql = "SELECT COUNT(*) FROM rezultatai";
$result = $connection->query($sql);
if (!$result) {
    die ('Error: ' . $connection->error);
    }
$eiluciuSkaicius = $result->fetch_row();
echo '<tr><td colspan=5><b>Iš viso įrašų: ' . $eiluciuSkaicius[0] . '</b></td></tr>';
}

$connection->close();

?>
    </tbody>
</table>
<p></p>
</body>
</html>
