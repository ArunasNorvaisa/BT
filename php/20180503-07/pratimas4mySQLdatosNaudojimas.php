<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pratimas 4</title>
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

if(isset($_POST['metai'])) {
//http://php.net/manual/en/mysqli.examples-basic.php sako kad taip saugu...
    $metai = (int)$_POST['metai'];
    $sql = "SELECT * FROM rezultatai WHERE YEAR(data) = $metai";
} else {
    $sql = "SELECT * FROM rezultatai";
    }


$result = $connection->query($sql);

if (!$result) {
    die ('Error: ' . $connection->error);
}


//Piešiam lentelę.
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td>' . $row['id'] .'</td>
    <td>' . $row['data'] .'</td>
    <td>' . $row['numeris'] .'</td>
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
