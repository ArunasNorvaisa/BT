<?php 

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
$ivykis5 = new Radar ('2016-09-01', 'BOND007', 20419, 1287);

$ivykiai = [$ivykis1, $ivykis2, $ivykis3, $ivykis4, $ivykis5];

//spausdinam pradinius duomenis
echo '<h2>Pradiniai duomenys:</h2><p></p>';
echo lentele($ivykiai);

/*var_dump(usort($ivykiai, function($a, $b) {
	    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}));*/

$ivykiai = usort($ivykiai, 'rikiuok');

//spausdinam rezultatus
echo '<h2>Lentelė datų didėjimo tvarka:</h2><p></p>';
echo lentele($ivykiai);

/**
 * piešiam pradinių duomenų lentelę
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
 * @param  [int] $a [date1]
 * @param  [int] $b [date2]
 * @return [bool]
 */
function rikiuok(Radar $a->date->format('Y-m-d'), Radar $b->date->format('Y-m-d')) {
	    if ($a->date->format('Y-m-d') == $b->date->format('Y-m-d')) {
        return 0;
    }
    return ($a->date->format('Y-m-d') < $b->date->format('Y-m-d')) ? -1 : 1;
};

echo lentele($ivykiai);

 ?>