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
                Susikurkite klasę Radar, kurioje būtų tokie atributai:<br>
                 1. $date - Data ir laikas<br>
                 2. $number - Automobilio numeris<br>
                 3. $distance - Nuvažiuotas atstumas metrais<br>
                 4. $time - Sugaištas laikas sekundėmis<br>
                Reikia susikurti metodą, kuris paskaičiuotų greitį kilometrais per valandą.
                <p></p>
                Sukurkite masyvą iš 3-4 elementų ir išveskite automobilius
                pagal greitį mažėjimo tvarka. Taip pat išveskite ir greičio
                reikšmes vieno ženklo po kablelio tikslumu.
            </h2>
            <hr>
        </code>
        <p>
<?php

class Radar {

    public $date;
    public $number;
    public $distance;
    public $time;
    
    public function __construct(string $date, string $number, int $distance, int $time) {
        $this->date = new DateTime($date);
        $this->number = $number;
        $this->distance = $distance;
        $this->time = $time;
    }

    public function skaiciuokGreiti() {
        $greitis = ($this->distance / $this->time) * 3.6;
        return round($greitis, 1);
    }
}

$ivykis1 = new Radar ('2012-04-23', 'ACE922', 12457, 362);
$ivykis2 = new Radar ('2014-04-22', 'JGF476', 24452, 728);
$ivykis3 = new Radar ('2018-03-21', 'CBC025', 2450, 505);
$ivykis4 = new Radar ('2017-12-23', 'FUV723', 120457, 8062);
$ivykis5 = new Radar ('2016-09-01', 'JB0ND007', 70419, 1287);

$ivykiai = [$ivykis1, $ivykis2, $ivykis3, $ivykis4, $ivykis5];

//spausdinam pradinius duomenis
echo '<h2>Pradiniai duomenys:</h2><p></p>';
echo lentele($ivykiai);

usort($ivykiai, 'rikiuok');

//spausdinam surikuotus rezultatus
echo '<h2>Lentelė vid. greičio mažėjimo tvarka:</h2><p></p>';
echo lentele($ivykiai);

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
    $lentele .= '<th>Vid. greitis, km/h</th>';
    $lentele .= '</tr></thead><tbody>';
    foreach ($array as $x) {
        $lentele .= '<tr>';
        $lentele .= '<td>' . $x->date->format('Y-m-d') . '</td>';
        $lentele .= '<td>' . $x->number . '</td>';
        $lentele .= '<td>' . $x->distance . ' m</td>';
        $lentele .= '<td>' . $x->time . ' s</td>';
        $lentele .= '<td>' . $x->skaiciuokGreiti() . ' km/h</td>';
        $lentele .= '</tr>';
    }
    $lentele .= '</tbody></table>';
    return $lentele;
}

/**
 * rikiuojam masyvą greičio mažėjimo tvarka
 * @param  [object] $ivykis1
 * @param  [object] $ivykis2
 * @return [int]
 */
function rikiuok(Radar $ivykis1, Radar $ivykis2):int {
        if ($ivykis1->skaiciuokGreiti() == $ivykis2->skaiciuokGreiti()) {
        return 0;
    }
    return ($ivykis1->skaiciuokGreiti() > $ivykis2->skaiciuokGreiti()) ? -1 : 1;
};

?>
        </p>
    </body>
</html>