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
        Sukurkite programą, kad galima būtų įvesti naujus radarų
        įrašus ir taisyti jau suvestą informaciją. Taip pat kad galima
        būtų peržiūrėti jau turimus įrašus.
    </h2>
    <hr>
</code>
<h1>Forma naujiems duomenims įvesti:</h1>
<form method="POST">
    <input type="text" name="data1" placeholder="Data, laikas">
    <input type="text" name="numeris1" placeholder="Numeris">
    <input type="text" name="atstumas1" placeholder="Atstumas">
    <input type="text" name="laikas1" placeholder="Laikas">
    <button name="ivesti">Įvesti</button>
</form>
<h1>Rezultatų atvaizdavimo/redagavimo lentelė:</h1>
    <table border=1>
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Numeris</th>
            <th>Atstumas, m</th>
            <th>Laikas, s</th>
            <th>Redaguoti</th>
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

if(isset($_POST['atstumas1']) && isset($_POST['laikas1']) && isset($_POST['numeris1'])) {
    $data1 = $_POST['data1'];
    $numeris1 = $_POST['numeris1'];
    $atstumas1 = $_POST['atstumas1'];
    $laikas1 = $_POST['laikas1'];
    $stmp = $connection->prepare("INSERT INTO rezultatai(data, numeris, atstumas, laikas) VALUES(?, ?, ?, ?)");
    $stmp->bind_param("ssdd", $data1, $numeris1, $atstumas1, $laikas1);
    $stmp->execute();
    }

$sql = 'SELECT id FROM rezultatai';

$result = $connection->query($sql);

if (!$result) {
    die ('Error :' . $connection->error);
}

$eiluciuSkaicius = $connection->query($sql)->num_rows;

//darom mygtukus pirmyn/atgal veikiančiais
if(isset($_SESSION['puslapiavimas']) && isset($_POST['pirmyn'])) {
    if (($_SESSION['puslapiavimas'] <= $eiluciuSkaicius) && ($eiluciuSkaicius > $_SESSION['puslapiavimas'] + 10)) {
     $_SESSION['puslapiavimas'] += 10;
        }
    }
    elseif(isset($_SESSION['puslapiavimas']) && isset($_POST['atgal'])) {
         if ($_SESSION['puslapiavimas'] >= 10) {
            $_SESSION['puslapiavimas'] -= 10;
        }
    }
    else {
         $_SESSION['puslapiavimas'] = 0;
}

if(isset($_POST['redaguoti'])) {

        $stmt = $connection->prepare("UPDATE rezultatai SET data = ?, numeris = ?, atstumas = ?, laikas = ? WHERE id = ?");
        $id = $_POST['id'];
        $data = $_POST['data'];
        $numeris = $_POST['numeris'];
        $atstumas = $_POST['atstumas'];
        $laikas = $_POST['laikas'];
        $stmt->bind_param("ssddi", $data, $numeris, $atstumas, $laikas, $id);
        $stmt->execute();
        $stmt->close();
}

$sql = 'SELECT * FROM rezultatai LIMIT 10 OFFSET ' . $_SESSION['puslapiavimas'];

$result = $connection->query($sql);

if (!$result) {
    die ('Error: ' . $connection->error);
}

//Piešiam lentelę. Kiekviena eilutė turi savo formos ID, kad redaguojant
//į serverį nebūtų siunčiama visa duombazė.
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td><form method="POST" id="forma' . $row['id'] . '"></form>
    <input form="forma' . $row['id'] . '" type="hidden" name="id" value="' . $row['id'] .'">' . $row['id'] . '</td>
    <td><input form="forma' . $row['id'] . '" type="text" name="data" value="' . $row['data'] .'"></td>
    <td><input form="forma' . $row['id'] . '" type="text" name="numeris" value="' . $row['numeris'] .'"></td>
    <td><input form="forma' . $row['id'] . '" type="text" name="atstumas" value="' . $row['atstumas'] . '"></td>
    <td><input form="forma' . $row['id'] . '" type="text" name="laikas" value="' . $row['laikas'] .'"></td>
    <td><button form="forma' . $row['id'] . '" name="redaguoti" id="' . $row['id'] . '">Redaguoti</button></td>
    </tr>';
    }
}

$connection->close();

?>
    </tbody>
</table>
<p>
<form method="POST">
    <center>
        <button name="atgal">10 psl. atgal <<<<<<</button>
        <button name="pirmyn">>>>>>> 10 psl. pirmyn</button>
    </center>
</form>
</p>
</body>
</html>
