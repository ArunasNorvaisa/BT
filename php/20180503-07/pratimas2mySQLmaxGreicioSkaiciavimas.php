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
        Sukurkite programą kad galima būtų įvesti naujus įrašus apie automobilių greitį,
        taisyti jau suvestą informaciją, trinti įrašus ir išvesti max. greitį.
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
            <th>Trinti</th>
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

//pridedam įrašą į duombazę
if(isset($_POST['atstumas1']) && isset($_POST['laikas1']) && isset($_POST['numeris1'])) {
    $data1 = $_POST['data1'];
    $numeris1 = $_POST['numeris1'];
    $atstumas1 = $_POST['atstumas1'];
    $laikas1 = $_POST['laikas1'];
    $stmp = $connection->prepare("INSERT INTO rezultatai(data, numeris, atstumas, laikas) VALUES(?, ?, ?, ?)");
    $stmp->bind_param("ssdd", $data1, $numeris1, $atstumas1, $laikas1);
    $stmp->execute();
    }

$sql = 'SELECT * FROM rezultatai';
//redaguojam duombazę
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

//triname eilutę
if(isset($_POST['trinti'])) {

        $stmt = $connection->prepare("DELETE FROM rezultatai WHERE id = ?");
        $id = $_POST['id'];
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
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
    <td><form method="POST" id="forma' . $row['id'] . '"></form>
    <input form="forma' . $row['id'] . '" type="hidden" name="id" value="' . $row['id'] .'">' . $row['id'] . '</td>
    <td><input form="forma' . $row['id'] . '" type="text" name="data" value="' . $row['data'] .'"></td>
    <td><input form="forma' . $row['id'] . '" type="text" name="numeris" value="' . $row['numeris'] .'"></td>
    <td><input form="forma' . $row['id'] . '" type="text" name="atstumas" value="' . $row['atstumas'] . '"></td>
    <td><input form="forma' . $row['id'] . '" type="text" name="laikas" value="' . $row['laikas'] .'"></td>
    <td><button form="forma' . $row['id'] . '" name="redaguoti" id="' . $row['id'] . '">Redaguoti</button></td>
    <td><button form="forma' . $row['id'] . '" name="trinti" id="' . $row['id'] . '">Trinti</button></td>
    </tr>';
    }
}

//skaičiuojam max. greitį
$sql = 'SELECT MAX((atstumas / laikas) * 3.6) FROM rezultatai';
$result = $connection->query($sql);
if (!$result) {
    die ('Error :' . $connection->error);
}
$maxGreitis = $result->fetch_row();
echo '<tr><td colspan=6>Maksimalus greitis: ' . $maxGreitis[0] . ' km/h<td><tr>';

$connection->close();

?>
    </tbody>
</table>
<p></p>
</body>
</html>
