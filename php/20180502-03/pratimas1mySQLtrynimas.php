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
        Sukurkite programą, kad galima būtų trinti turimą automobilių
        informaciją. Taip pat kad galima būtų peržiūrėti jau turimus įrašus.
    </h2>
    </code>
<hr>
<h1>Rezultatų atvaizdavimo/redagavimo/trynimo lentelė:</h1>
    <table border=1>
    <thead>
        <tr>
            <th>ID</th>
            <th>Gamintojas</th>
            <th>Modelis</th>
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

$sql = 'SELECT id FROM automobiliai';

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
    } elseif(isset($_SESSION['puslapiavimas']) && isset($_POST['atgal'])) {
         if ($_SESSION['puslapiavimas'] >= 10) {
            $_SESSION['puslapiavimas'] -= 10;
        }
    } else {
         $_SESSION['puslapiavimas'] = 0;
}

if(isset($_POST['trinti'])) {
        $stmt = $connection->prepare("DELETE FROM automobiliai WHERE id = ?");
        $id = $_POST['id'];
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
}

$sql = 'SELECT * FROM automobiliai LIMIT 10 OFFSET ' . $_SESSION['puslapiavimas'];

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
    <input form="forma' . $row['id'] . '" type="hidden" name="id" value="' . $row['id'] . '">' . $row['id'] . '</td>
    <td form="forma' . $row['id'] . '" type="text" name="modelis">' . $row['modelis'] . '</td>
    <td form="forma' . $row['id'] . '" type="text" name="marke">' . $row['marke'] . '</td>
    <td><button form="forma' . $row['id'] . '" name="trinti" id="' . $row['id'] . '">trinti</button></td>
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
