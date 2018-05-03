<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uždavinys 1</title>
    <style>
        table, h1, h2, form {
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
        taisyti jau suvestą informaciją, trinti įrašus ir DATE pagalba filtruoti duomenis
        pagal užduotą datą/metus.
    </h2>
    <hr>
</code>
<h1>Metų filtras:</h1>
<form method='POST'>
    <input type="text" name="metai">
    <button type="submit">Metai</button>
</form>
<p></p>
<h1>Mėnesių filtras:</h1>
<form method='POST'>
    <input type="text" name="menuo">
    <button type="submit">Mėnuo</button>
</form>
<p></p>
<h1>Rezultatų atvaizdavimo lentelė:</h1>
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

session_start();

$serveris = 'localhost';
$vartotojas = 'auto';
$slaptazodis = '123';
$duombaze = 'matavimai1';

$connection = new mysqli($serveris, $vartotojas, $slaptazodis, $duombaze);

if ($connection->connect_error) {
    die ('Nepavyko prisijungti: ' . $connection->connect_error);
}


//Metų filtras
if(isset($_POST['metai'])) {
    $metai = $_POST['metai'];
    $sql = "SELECT id, data, numeris, atstumas, laikas, ((atstumas/laikas)*3.6) AS greitis FROM rezultatai WHERE YEAR(data) = $metai";
} elseif(isset($_POST['menuo'])) {
    $menuo = $_POST['menuo'];
    $sql = "SELECT id, data, numeris, atstumas, laikas, ((atstumas/laikas)*3.6) AS greitis FROM rezultatai WHERE MONTH(data) = $menuo";
} else {
    $sql = "SELECT id, data, numeris, atstumas, laikas, ((atstumas/laikas)*3.6) AS greitis FROM rezultatai";
    }

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
    <td>' . $row['numeris'] .'</td>
    <td>' . $row['atstumas'] . '</td>
    <td>' . $row['laikas'] .'</td>
    <td>' . $row['greitis'] .'</td>
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
