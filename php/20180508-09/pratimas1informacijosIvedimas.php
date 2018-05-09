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
        Sukurkite programą kad galima būtų įvesti vairuotojus ir
        juos priskirti automobilių įrašams.
    </h2>
    <hr>
</code>
<h1>Įveskite vairuotoją:</h1>
    <form method="POST">
        <input type="text" name="vairuotojas" placeholder="Vardas Pavardė">
        <input type="text" name="gyvVieta" placeholder="Gyvenamoji vieta">
        <button>Įvesti</button>
    </form>
<?php

$serveris = 'localhost';
$vartotojas = 'auto';
$slaptazodis = '123';
$duombaze = 'matavimai1';

$connection = new mysqli($serveris, $vartotojas, $slaptazodis, $duombaze);

if ($connection->connect_error) {
    die ('Nepavyko prisijungti: ' . $connection->connect_error);
}

//Įterpiam įrašą į vairuotojų lentelę
if(isset($_POST['vairuotojas']) && isset($_POST['gyvVieta'])) {
    $name = $_POST['vairuotojas'];
    $city = $_POST['gyvVieta'];
    $stmp = $connection->prepare("INSERT INTO drivers(name, city) VALUES(?, ?)");
    $stmp->bind_param("ss", $name, $city);
    $stmp->execute();
    }

$sql = "SELECT id, numeris, driverId FROM rezultatai";
$sqlDrivers = "SELECT driverId, name FROM drivers";

$result = $connection->query($sql);

if (!$result) {
    die ('Error: ' . $connection->error);
}


//Piešiam lentelę. Kiekviena eilutė turi savo formos ID, kad redaguojant
//į serverį nebūtų siunčiama visa duombazė.
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    echo '<table><tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['numeris'] .'</td>
    </tr></table>';
    }
}

$connection->close();

?>
    </tbody>
</table>
<p></p>
</body>
</html>
