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
    h1, h2, td, th {
        padding: 12px;
    }
</style>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>
    	Tarkime turime masyvą objektų Mokinys. Papildykite Mokinys klasę
    	tekstiniu atributu gimimoData, t.y. jo reikšmė bus pvz ‘2001-10-31’.<br>
		Sukurkite Mokinys klasei metodą, kuris grąžintų sveiką skaičių kiek
		mokiniui yra metų, pvz. 17 (16,5 → 16).<br>
		Sukurkite kelių (3-4) mokinių masyvą ir atspausdinkite html
		lentelėje tik tuos mokinius kurie turi 18 metų ir daugiau.
	</h2>
	<hr>
</code>
<p>
    <?php

    class Mokinys {
        
        public $vardas;
        public $pavarde;

        public function __construct (string $vardas, string $pavarde, string $gData) {
            $this->vardas = $vardas;
            $this->pavarde = $pavarde;
            $this->gData = new DateTime($gData);
        }

        public function kiekMetu():int {
        	$gimimoData = $this->gData;
			$dabar = new DateTime('now');
			$metuKiekis = $gimimoData->diff($dabar);
			return $metuKiekis->format('%y');
        }

        public function pilnasVardas() {
        	return $this->vardas . ' ' . $this->pavarde;
        }
    }

$eustarchijus = new Mokinys ('Eustarchijus', 'Vamzdys', '2004-09-01');
$kulverstukas = new Mokinys ('Kūlverstukas', 'Didžiaausis', '2001-01-11');
$paslemekas = new Mokinys ('Pašlemėkas', 'Šliūpšta', '999-12-25');
$bonifacijus = new Mokinys ('Liūtas', 'Bonifacijus', '1974-04-20');
$perestukinas = new Mokinys ('Perestukinas', 'Nemokusis', '2008-12-18');
$leopoldas = new Mokinys ('Katinas', 'Leopoldas', '1990-07-15');

$mokiniai = [$eustarchijus, $kulverstukas, $paslemekas, $bonifacijus, $perestukinas, $leopoldas];

//var_dump ($leopoldas->kiekMetu());


/**
 * piešiam pradinių duomenų lentelę
 * @param  array  $array [paprastai $mokiniai]
 * @return [string]        [lentelė]
 */
function lentele1(array $array):string {
	$lentele = '<table border=3><thead><tr><th>Vardas</th><th>';
	$lentele .= 'Gimimo data</th><th>Amžius</th></tr></thead><tbody>';
    foreach ($array as $x) {
	    $lentele .= '<tr>';
	    $lentele .= '<td>' . $x->pilnasVardas() . '</td>';
	    $lentele .= '<td>' . $x->gData->format('Y-m-d') . '</td>';
	    $lentele .= '<td>' . $x->kiekMetu() . '</td>';
	    $lentele .= '</tr>';
    }
    $lentele .= '</tbody></table>';
    return $lentele;
}

/**
 * piešiam rezultatų lentelę
 * @param  array  $array [paprastai $mokiniai]
 * @return string        [lentelė]
 */
function lentele2(array $array):string {
	$lentele = '<table border=3><thead><tr><th>Vardas</th><th>';
	$lentele .= 'Gimimo data</th><th>Amžius</th></tr></thead><tbody>';
    foreach ($array as $x) {
    	if ($x->kiekMetu() >= 18) {
		    $lentele .= '<tr>';
		    $lentele .= '<td>' . $x->pilnasVardas() . '</td>';
		    $lentele .= '<td>' . $x->gData->format('Y-m-d') . '</td>';
		    $lentele .= '<td>' . $x->kiekMetu() . '</td>';
		    $lentele .= '</tr>';
	    }
	}
	$lentele .= '</tbody></table>';
    return $lentele;
}

//pildom pirminių duomenų lentelę
//echo '<h2>Pirminiai duomenys:</h2>';
//echo '<table border=3><thead><tr><th>Vardas</th><th>';
//echo 'Gimimo data</th><th>Amžius</th></tr></thead><tbody>';
echo lentele1($mokiniai);
//echo '</tbody></table>';

//pildom rezultatų lentelę
echo '<h2>Mokiniai, kuriems daugiau nei 18 metų:</h2><p></p>';
echo lentele2($mokiniai);
//echo '</tbody></table>';

?>
</p>
</body>
</html>