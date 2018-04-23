<?php

/* Susikurkite klasę Radar, kurioje būtų tokie atributai:
 1. $date - Data ir laikas
 2. $number - Automobilio numeris
 3. $distance - Nuvažiuotas atstumas metrais
 4. $time - Sugaištas laikas sekundėmis
 Sukurkite masyvą iš 3-4 elementų ir išveskite juos pagal datos
 lauką nuo vėliausio iki anksčiausio, t.y. mažėjimo tvarka.*/

class Radar {

	public $date;
	public $number;
	public $distance;
	public $time;
	
	public function __construct(string $date, string $number, int $distance, int $time)
	{
		$this->date = new DateTime($date);
		$this->number = $number;
		$this->distance = $distance;
		$this->time = $time;
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
echo '<h2>Lentelė datų didėjimo tvarka:</h2><p></p>';
echo lentele($ivykiai);

/**
 * piešiam lentelę
 * @param  array  $array [paprastai $ivykiai]
 * @return [string]        [lentelė]
 */
function lentele(array $array): string {
    $lentele = '<table border=3><thead><tr><th>Data</th><th>';
    $lentele .= 'Valst. Nr.</th><th>Atstumas, m</th>';
    $lentele .= '<th>Laikas, s</th></tr></thead><tbody>';
    foreach ($array as $x) {
        $lentele .= '<tr>';
        $lentele .= '<td>' . $x->date->format('Y-m-d') . '</td>';
        $lentele .= '<td>' . $x->number . '</td>';
        $lentele .= '<td>' . $x->distance . 'm</td>';
        $lentele .= '<td>' . $x->time . 's</td>';
        $lentele .= '</tr>';
    }
    $lentele .= '</tbody></table>';
    return $lentele;
}

/**
 * rikiuojam masyvą didėjančia tvarka
 * @param  [object] $ivykis1
 * @param  [object] $ivykis2
 * @return [int]
 */
function rikiuok(Radar $ivykis1, Radar $ivykis2) {
	    if ($ivykis1->date->format('Y-m-d') == $ivykis2->date->format('Y-m-d')) {
        return 0;
    }
    return ($ivykis1->date->format('Y-m-d') < $ivykis2->date->format('Y-m-d')) ? -1 : 1;
};

 ?>