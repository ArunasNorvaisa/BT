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
        Sukurkite programą, kad galima būtų trinti turimą automobilių
        informaciją po keletą įrašų vienu metu. Taip pat kad galima
        būtų peržiūrėti jau turimus įrašus.
    </h2>
    </code>
<hr>
<h1>Rezultatų atvaizdavimo/trynimo lentelė:</h1>
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

$sql = 'SELECT * FROM automobiliai LIMIT 10 OFFSET ' . $_SESSION['puslapiavimas'];

$result = $connection->query($sql);

if (!$result) {
    die ('Error: ' . $connection->error);
}

//Piešiam lentelę
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['modelis'] . '</td>
    <td>' . $row['marke'] . '</td>
    <td><input type="checkbox" name=trintiEilutes[] id="' . $row['id'] . '"></td>
    </tr>';
    }
}

if(isset($_POST['trinti'])) {
    foreach ($trintiEilutes as $key => $value) {
        $stmt = $connection->prepare("DELETE FROM automobiliai WHERE id = ?");
        $id = $value;
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
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
        <button name="trinti">Trinti pasirinktus</button>
    </center>
</form>
</p>
</body>
</html>
