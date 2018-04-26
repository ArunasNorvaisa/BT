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
        automobilius ir, žemiau įvedimo formos, išveda juos greičių
        mažėjimo tvarka į html lentelę.
    </h2>
    <hr>
</code>
<p>
<form action="uzdavinys1cookie.php" method="POST">
    <input type="text" name="data" placeholder="data/laikas">
    <input type="text" name="numeris" placeholder="valst. Nr.">
    <input type="text" name="atstumas" placeholder="atstumas, m">
    <input type="text" name="laikas" placeholder="sugaištas laikas, s">
    <button type="submit">Įvesti</button>
    <hr>
</p>
<?php
include_once 'uzdavinys1Acookie.php';

    //spausdinam pradinius duomenis
    echo '<h2>Pradiniai duomenys:</h2><p></p>';
    echo lentele($ivykiai);
    usort($ivykiai, 'rikiuok');
    //spausdinam surikuotus rezultatus
    echo '<h2>Lentelė vid. greičio mažėjimo tvarka:</h2><p></p>';
    echo lentele($ivykiai);
    //var_dump($_COOKIE);
    /**
     * piešiam lentelę
     * @param  array $array [paprastai $ivykiai]
     * @return [string]        [lentelė]
     */
        $lentele = '<table border=3><thead><tr>';
        $lentele .= '<th>Data</th>';
        $lentele .= '<th>Valst. Nr.</th>';
        $lentele .= '<th>Atstumas, m</th>';
        $lentele .= '<th>Laikas, s</th>';
        $lentele .= '<th>Vid. greitis, km/h</th>';
        $lentele .= '</tr></thead><tbody>';
    function lentele(array $array): string {
        foreach ($array as $x) {
            $lentele .= '<tr>';
            $lentele .= '<td>' . $x->date->format('Y-m-d H:m:s') . '</td>';
            $lentele .= '<td>' . $x->number . '</td>';
            $lentele .= '<td>' . $x->distance . ' m</td>';
            $lentele .= '<td>' . $x->time . ' s</td>';
            $lentele .= '<td>' . $x->skaiciuokGreiti() . ' km/h</td>';
            $lentele .= '</tr>';
        }
        $lentele .= '</tbody></table>';
        return $lentele;
    }

 ?>

</body>
</html>