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
    <h2>Tarkime turime masyvą objektų Mokinys. Reikia
atspausdinti mokinių vardus ir pavardes su jų trimestro
vidurkiu į html lentelę vidurkio mažėjimo tvarka.<br>
Mokinys klasė – vardas, pavardė. Mokinys paveldi Trimestras
klasę – dalykų masyvas su pažymiais, kur indeksas dalyko
pavadinimas.</h2><hr>
</code>
<p>
    <?php
    class Trimestras {
                public $trimestras;

        function __construct(array $trimestras) {
            $this->trimestras = $trimestras;
        }

/**
 * skaičiuojam vidurkiį
 * @return [float] [mokinio vidurkis]
 */
        public function skaiciuokVidurki():float {
            return array_sum($this->trimestras) / count($this->trimestras);
        }
    }

    class Mokinys extends Trimestras {
        
        public $vardas;
        public $pavarde;

        public function __construct (string $vardas, string $pavarde, array $trimestras) {
            parent:: __construct ($trimestras);
            $this->vardas = $vardas;
            $this->pavarde = $pavarde;
        }

        public function pilnasVardas() {
            return $this->vardas . ' ' . $this->pavarde;
        }
    }

$eustarchijus = new Mokinys ('Eustarchijus', 'Vamzdys', ['lietuviu' => 8, 'matematika' => 8, 'anglu' => 8]);
$kulverstukas = new Mokinys ('Kūlverstukas', 'Didžiaausis', ['lietuviu' => 10, 'matematika' => 9, 'anglu' => 8]);
$paslemekas = new Mokinys ('Pašlemėkas', 'Šliūpšta', ['lietuviu' => 5, 'matematika' => 9, 'anglu' => 7]);
$bonifacijus = new Mokinys ('Liūtas', 'Bonifacijus', ['lietuviu' => 10, 'matematika' => 10, 'anglu' => 10]);
$perestukinas = new Mokinys ('Perestukinas', 'Nemokusis', ['lietuviu' => 5, 'matematika' => 3, 'anglu' => 4]);
$leopoldas = new Mokinys ('Katinas', 'Leopoldas', ['lietuviu' => 8, 'matematika' => 4, 'anglu' => 6]);

$mokiniai = [$eustarchijus, $kulverstukas, $paslemekas, $bonifacijus, $perestukinas, $leopoldas];

/**
 * piešiam lentelę
 * @param  array  $array [paprastai $mokiniai]
 * @return [string]        [lentelė]
 */
function lentele(array $array):string {
    $lentele = '<table border=3><thead><tr><th>Vardas</th><th>';
    $lentele .= 'Vidurkis</th></tr></thead><tbody>';
    foreach ($array as $x) {
    $lentele .= '<tr><td>' . $x->pilnasVardas() . '</td><td>' . $x->skaiciuokVidurki() . '</td></tr>';
    }
    $lentele .= '</tbody></table>';
    return $lentele;
}

//pildom pirminių duomenų lentelę
echo '<h2>Pirminiai duomenys:</h2>';
echo lentele($mokiniai);

//rūšiuojam masyvą vidurkio mažėjimo tvarka
usort($mokiniai, 'rusiuok');

/**
 * [rūšiuojam masyvą trimestro vidurkio mažėjimo tvarka]
 * @param  [object]  $vidurkis1
 * @param  [object]  $vidurkis2
 * @return [int]
 */
function rusiuok(object $mokinys1, object $mokinys2):int {
    if ($mokinys1 == $mokinys2) {
        return 0;
    }
    return ($mokinys1->skaiciuokVidurki() > $mokinys2->skaiciuokVidurki()) ? -1 : 1;
}

//pildom rezultatų lentelę
echo '<h2>Surikiuota lentelė vidurkio mažėjimo tvarka:</h2><p></p>';
echo lentele($mokiniai);

?>
</p>
</body>
</html>