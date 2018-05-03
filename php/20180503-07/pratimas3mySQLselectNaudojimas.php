<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pratimas 3</title>
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
        Sukurkite programą kad galima būtų įvesti naujus įrašus apie automobilių greitį,
        taisyti jau suvestą informaciją, trinti įrašus ir SELECT pagalba įrašyti numerių
        raides ir skaitmenis skirtinguose stulpeliuose.
    </h2>
    <hr>
</code>
<h1>Rezultatų atvaizdavimo lentelė:</h1>
    <table border=1>
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Numeris raidės</th>
            <th>Numeris skaičiai</th>
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

$sql = 'SELECT id, data, SUBSTRING(numeris, 1, 3) AS raides, SUBSTRING(numeris, 4, 3) AS skaiciai, atstumas, laikas FROM rezultatai';
//redaguojam duombazę

$result = $connection->query($sql);

if (!$result) {
    die ('Error: ' . $connection->error);
}


//Piešiam lentelę. Kiekviena eilutė turi savo formos ID, kad redaguojant
//į serverį nebūtų siunčiama visa duombazė.
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td>' . $row['id'] .'</td>
    <td>' . $row['data'] .'</td>
    <td>' . $row['raides'] .'</td>
    <td>' . $row['skaiciai'] .'</td>
    <td>' . $row['atstumas'] . '</td>
    <td>' . $row['laikas'] .'</td>
    </tr>';
    }
}

$connection->close();

?>
    </tbody>
</table>
<p></p>
</body>
</html>
