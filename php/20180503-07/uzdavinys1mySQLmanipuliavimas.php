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
         h1, h2, h3, td, th {
         padding: 12px;
         }
      </style>
   </head>
   <body>
      <h1>Sąlyga:</h1>
      <code>
         <h2>
            Pataisykite automobilių programėlę pridėdami naujus mygtukus:
            <p></p>
            1. Mygtukas “Automobiliai”, kurį paspaudus būtų išvedami tik automobilių
            numeriai, automobilio įrašų kiekis ir maksimalus to automobilio greitis;<br>
            2. Mygtukai “Mėnuo” ir “Metai” - paspaudus būtų išvedamos tik atitinkamas
            periodas, įrašų kiekis tame periode ir maksimalus, minimalus bei vidutinis greitis;<br>
            3. Padaryti rezultato puslapiavimą.
         </h2>
         <hr>
      </code>
      <form name="automobiliai" method="POST">
          <button name="automobiliai">Automobiliai</button>
      </form>
      <table>
         <tr>
            <td>
               Metų filtras:
            </td>
            <td>
               <form method='POST'>
                  <input type="text" name="metai">
                  <button type="submit">Metai</button>
            </td>
         </tr>
         </form>
         <tr>
            <td>
               Mėnesių filtras:
            </td>
            <td>
               <form method='POST'>
                  <input type="text" name="menuo">
                  <button type="submit">Mėnuo</button>
            </td>
         </tr>
         </form>
      </table>
      <p></p>
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

//Pirmos sąlygos vykdymas
if (isset($_POST['automobiliai'])) {
    $sql = "SELECT numeris, COUNT(*) AS irasuskaicius, ROUND(MAX((atstumas/laikas) * 3.6), 1) AS maksimalusgreitis FROM rezultatai GROUP BY numeris";
    $result = $connection->query($sql);
    if (!$result) {
        die ('Error :' . $connection->error);
        }
    $maxGreitis = $result->fetch_row();
    echo lentele2($sql, $connection);
}

//Metų/mėnesių filtras ir rezultatų atvaizdavimas
if(isset($_POST['metai'])) {
//http://php.net/manual/en/mysqli.examples-basic.php sako kad taip saugu
//(ir net į pavyzdį įdėjo kaip pavyzdingą kodą):
    $metai = (int)$_POST['metai'];
    $sql = "SELECT COUNT(*) AS irasukiekis FROM rezultatai WHERE YEAR(data) = $metai";
    $result = $connection->query($sql);
    $irasuKiekis = $result->fetch_row();
    $sql = "SELECT MAX(ROUND(((atstumas/laikas)*3.6), 1)) AS maxgreitis FROM rezultatai WHERE YEAR(data) = $metai";
    $result = $connection->query($sql);
    $maxGreitis = $result->fetch_row();
    $sql = "SELECT MIN(ROUND(((atstumas/laikas)*3.6), 1)) AS mingreitis FROM rezultatai WHERE YEAR(data) = $metai";
    $result = $connection->query($sql);
    $minGreitis = $result->fetch_row();
    $sql = "SELECT AVG(ROUND(((atstumas/laikas)*3.6), 1)) AS vidgreitis FROM rezultatai WHERE YEAR(data) = $metai";
    $result = $connection->query($sql);
    $vidGreitis = $result->fetch_row();
    $sql = "SELECT *, ROUND(((atstumas/laikas)*3.6), 1) AS greitis FROM rezultatai WHERE YEAR(data) = $metai";
    echo lentele1($sql, $connection, $irasuKiekis, $maxGreitis, $minGreitis, $vidGreitis);
} elseif(isset($_POST['menuo'])) {
    $menuo = (int)$_POST['menuo'];
    $sql = "SELECT COUNT(*) AS irasukiekis FROM rezultatai WHERE MONTH(data) = $menuo";
    $result = $connection->query($sql);
    $irasuKiekis = $result->fetch_row();
    $sql = "SELECT MAX(ROUND(((atstumas/laikas)*3.6), 1)) AS maxgreitis FROM rezultatai WHERE MONTH(data) = $menuo";
    $result = $connection->query($sql);
    $maxGreitis = $result->fetch_row();
    $sql = "SELECT MIN(ROUND(((atstumas/laikas)*3.6), 1)) AS mingreitis FROM rezultatai WHERE MONTH(data) = $menuo";
    $result = $connection->query($sql);
    $minGreitis = $result->fetch_row();
    $sql = "SELECT AVG(ROUND(((atstumas/laikas)*3.6), 1)) AS vidgreitis FROM rezultatai WHERE MONTH(data) = $menuo";
    $result = $connection->query($sql);
    $vidGreitis = $result->fetch_row();
    $sql = "SELECT *, ROUND(((atstumas/laikas)*3.6), 1) AS greitis FROM rezultatai WHERE MONTH(data) = $menuo";
    echo lentele1($sql, $connection, $irasuKiekis, $maxGreitis, $minGreitis, $vidGreitis);
} else {
    $sql = "SELECT COUNT(*) AS irasukiekis FROM rezultatai";
    $result = $connection->query($sql);
    $irasuKiekis = $result->fetch_row();
    $sql = "SELECT MAX(ROUND(((atstumas/laikas)*3.6), 1)) AS maxgreitis FROM rezultatai";
    $result = $connection->query($sql);
    $maxGreitis = $result->fetch_row();
    $sql = "SELECT MIN(ROUND(((atstumas/laikas)*3.6), 1)) AS mingreitis FROM rezultatai";
    $result = $connection->query($sql);
    $minGreitis = $result->fetch_row();
    $sql = "SELECT AVG(ROUND(((atstumas/laikas)*3.6), 1)) AS vidgreitis FROM rezultatai";
    $result = $connection->query($sql);
    $vidGreitis = $result->fetch_row();
    $sql = "SELECT *, ROUND(((atstumas/laikas)*3.6), 1) AS greitis FROM rezultatai";
    echo lentele1($sql, $connection, $irasuKiekis, $maxGreitis, $minGreitis, $vidGreitis);
    }

function lentele1(string $sql, mysqli $connection, array $irasuKiekis, array $maxGreitis, array $minGreitis, array $vidGreitis): string {

    $lentele = '';
    $result = $connection->query($sql);
    if (!$result) {
        die ('Error: ' . $connection->error);
    }
    if ($result->num_rows > 0) {
    $lentele = '<h1>Rezultatų (pirminių duomenų) atvaizdavimo lentelė:</h1>';
    $lentele .= '<table border=1>';
    $lentele .= '<thead>';
    $lentele .= '<tr>';
    $lentele .= '<th>ID</th>';
    $lentele .= '<th>Data</th>';
    $lentele .= '<th>Numeris</th>';
    $lentele .= '<th>Atstumas, m</th>';
    $lentele .= '<th>Laikas, s</th>';
    $lentele .= '<th>Greitis, km/h</th>';
    $lentele .= '</tr>';
    $lentele .= '</thead>';
    $lentele .= '<tbody>';
    while ($row = $result->fetch_assoc()) {
        $lentele .= '<tr>';
        $lentele .= '<td>' . $row['id'] .'</td>';
        $lentele .= '<td>' . $row['data'] .'</td>';
        $lentele .= '<td>' . $row['numeris'] .'</td>';
        $lentele .= '<td>' . $row['atstumas'] . '</td>';
        $lentele .= '<td>' . $row['laikas'] .'</td>';
        $lentele .= '<td>' . $row['greitis'] .'</td>';
        $lentele .= '</tr>';
        }
    $lentele .= '</tbody>';
    $lentele .= '</table>';
    $lentele .= '<p></p><h3>Įrašų kiekis: ' . $irasuKiekis[0] . '</h3>';
    $lentele .= '<p></p><h3>Maksimalus greitis: ' . $maxGreitis[0] . ' km/h</h3>';
    $lentele .= '<p></p><h3>Minimalus greitis: ' . $minGreitis[0] . ' km/h</h3>';
    $lentele .= '<p></p><h3>Vidutinis greitis: ' . $vidGreitis[0] . ' km/h</h3>';
    }
    return $lentele;
}

function lentele2(string $sql, mysqli $connection): string {

    $lentele = '';
    $result = $connection->query($sql);
    if (!$result) {
        die ('Error: ' . $connection->error);
    }
    if ($result->num_rows > 0) {
    $lentele = '<h1>Automobilių atvaizdavimo lentelė:</h1>';
    $lentele .= '<table border=1>';
    $lentele .= '<thead>';
    $lentele .= '<tr>';
    $lentele .= '<th>Numeris</th>';
    $lentele .= '<th>Įrašų kiekis</th>';
    $lentele .= '<th>Max. greitis, km/h</th>';
    $lentele .= '</tr>';
    $lentele .= '</thead>';
    $lentele .= '<tbody>';
    while ($row = $result->fetch_assoc()) {
        $lentele .= '<tr>';
        $lentele .= '<td>' . $row['numeris'] .'</td>';
        $lentele .= '<td>' . $row['irasuskaicius'] . '</td>';
        $lentele .= '<td>' . $row['maksimalusgreitis'] .'</td>';
        $lentele .= '</tr>';
        }
    $lentele .= '</tbody>';
    $lentele .= '</table>';
    }
    return $lentele;
}

$connection->close();

?>
<p></p>
</body>
</html>
