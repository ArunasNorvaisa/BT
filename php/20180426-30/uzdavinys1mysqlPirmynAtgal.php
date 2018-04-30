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
        Sukurkite su phpMyAdmin bent 15 automobilių greičių įrašų. <br>
        Parašykite programą, kuri išvestų įrašus puslapiais po 10. <br>
        Padarykite, kad būtų du mygtukai “Pirmyn” ir “Atgal” vaikščiojimui per puslapius.
    </h2>
    <hr>
</code>
    <table border=1; style="padding:12px;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Data</th>
                <th>Numeris</th>
                <th>Atstumas, m</th>
                <th>Laikas, s</th>
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

session_start();

//darom mygtukus pirmyn/atgal veikiančiais
if(isset($_SESSION['puslapiavimas']) && isset($_POST['pirmyn'])) {
     $_SESSION['puslapiavimas'] += 10;
    }
    elseif(isset($_SESSION['puslapiavimas']) && isset($_POST['atgal'])) {
         if ($_SESSION['puslapiavimas'] >= 10) {
            $_SESSION['puslapiavimas'] -= 10;
        }
    }
    else {
         $_SESSION['puslapiavimas'] = 0;
}

$sql = 'SELECT * FROM rezultatai LIMIT 10 OFFSET ' . $_SESSION['puslapiavimas'];

$result = $connection->query($sql);

if (!$result) {
    die ('Error :' . $connection->error);
}

//piešiam lentelę
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
</table><p>
<form method="POST">
    <center>
        <button name="atgal">10 atgal <<<<<<</button>
        <button name="pirmyn">>>>>>> 10 pirmyn</button>
    </center>
</form>
</p>
</body>
</html>