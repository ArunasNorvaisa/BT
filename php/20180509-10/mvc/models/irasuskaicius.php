<?php

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
?>