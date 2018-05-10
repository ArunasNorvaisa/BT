<?php

function lentele1(string $sql, mysqli $connection, array $irasuKiekis, array $maxGreitis, array $minGreitis, array $vidGreitis): string {

    $lentele = '';
    $result = $connection->query($sql);
    if (!$result) {
        die ('Error: ' . $connection->error);
    }
    if ($result->num_rows > 0) {
    $lentele = '<h1>Rezultatų atvaizdavimo lentelė:</h1>';
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
?>