<?php

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
}

?>