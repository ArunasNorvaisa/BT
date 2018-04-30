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
				Padarykite formą įvesti automobilius:<p></p>

				• Greičio fiksavimo data ir laikas, pvz: 2018-04-26 23:15:25<br>
				• Automobilio numeris, pvz: ABC 001 <br>
				• Nuvažiuotas atstumas metrais <br>
				• Sugaištas laikas sekundėmis <p></p>

				Tegul programa atsimena (session arba cookie) visus suvestus
				automobilius ir, žemiau įvedimo formos, išveda juos į html
                lentelę. Padarykite filtravimo lauką su mygtuku “Filtruoti”.
                Įvedus kažkokį tekstą ir paspaudus tą mygtuką reikia, kad
                lentelėje rodytų tik tuos įrašus, kurių numeriuose yra įvestas
                tekstas. pvz.: jei įvesime “ab” arba “AB” tai turėtume matyti
                tik įrašus su numeriais ABC 001 arba KAB 123 ir pan.
            </h2>
            <hr>
        </code>
        <p>
<p>
<form method="POST">
    <input type="text" name="data" placeholder="data/laikas">
    <input type="text" name="numeris" placeholder="valst. Nr.">
    <input type="text" name="atstumas" placeholder="atstumas, m">
    <input type="text" name="laikas" placeholder="sugaištas laikas, s">
    <input type="submit" name="suvesti" placeholder="submit"></p>
    <hr><p></p>
    <input type="text" name="filtras" placeholder="filtravimo kriterijus">
    <button>filtruoti</button>

<?php

require_once 'uzdavinys1a.php';

if (!empty($ivykiai)) {
    echo '<h2>Pradiniai duomenys:</h2><p></p>';
    echo lentele($ivykiai);
}

if (!empty($filtruotiIvykiai)) {
    echo '<h2>Rezultatų lentelė:</h2><p></p>';
    echo lentele($filtruotiIvykiai);
}

/**
 * piešiam lentelę
 * @param  array  $array [paprastai $ivykiai]
 * @return [string]        [lentelė]
 */
function lentele(array $array): string {
    $lentele = '<table border=3><thead><tr>';
    $lentele .= '<th>Data</th>';
    $lentele .= '<th>Valst. Nr.</th>';
    $lentele .= '<th>Atstumas, m</th>';
    $lentele .= '<th>Laikas, s</th>';
    $lentele .= '</tr></thead><tbody>';
    foreach ($array as $x) {
        $lentele .= '<tr>';
        $lentele .= '<td>' . $x->date->format('Y-m-d H:m:s') . '</td>';
        $lentele .= '<td>' . $x->number . '</td>';
        $lentele .= '<td>' . $x->distance . '</td>';
        $lentele .= '<td>' . $x->time . '</td>';
        $lentele .= '</tr>';
    }
    $lentele .= '</tbody></table>';
    return $lentele;
}

?>
        </p>
    </body>
</html>