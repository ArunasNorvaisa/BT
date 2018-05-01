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
        Sukurkite formą automobilių įvedimui. Įvedus automobilį, jis turi
        atsirasti html lentelėje.
    </h2>
    <hr>
</code>
    <table border=1>
        <thead>
            <tr>
                <th>Markė</th>
                <th>Modelis</th>
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

$stmp = $connection->prepare("INSERT INTO automobiliai(marke, modelis) VALUES(?, ?)");

if(isset($_POST['marke']) && $_POST['modelis']) {
    $marke = $_POST['marke'];
    $modelis = $_POST['modelis'];
    $stmp->bind_param("ss", $marke, $modelis);
    $stmp->execute();
    }

$sql = 'SELECT * FROM automobiliai';

$result = $connection->query($sql);

//piešiam lentelę
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<tr>
    <td>' . $row['marke'] .'</td>
    <td>' . $row['modelis'] .'</td>
    </tr>';
    }
}

$connection->close();

?>
    </tbody>
</table><p>
<form method="POST">
    <center>
        <input type="text" name="marke" placeholder="marke">
        <input type="text" name="modelis" placeholder="modelis">
        <button type="submit">Įrašyti</button>
    </center>
</form>
</p>
</body>
</html>
