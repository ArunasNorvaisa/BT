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
                public $vidurkis;

        function __construct($trimestras, $vidurkis) {
            $this->trimestras = $trimestras;
            $this->vidurkis = $this->skaiciuokVidurki();;
        }

        public function skaiciuokVidurki():float {
            $vidurkis = 0;
            foreach ($this->trimestras as $value) {
                $vidurkis += $value;
            }
            return $vidurkis / 3;
        }
    }

    class Mokinys extends Trimestras {
        
        public $vardas;
        public $pavarde;

        public function __construct ($vardas, $pavarde, $trimestras, $vidurkis) {
            parent:: __construct ($trimestras, $vidurkis);
            $this->vardas = $vardas;
            $this->pavarde = $pavarde;
        }

        public function pilnasVardas() {
            return $this->vardas . ' ' . $this->pavarde;
        }
    }

$eustarchijus = new Mokinys ('Eustarchijus', 'Vamzdys', ['lietuviu' => 8, 'matematika' => 8, 'anglu' => 8], 0);
$kulverstukas = new Mokinys ('Kūlverstukas', 'Didžiaausis', ['lietuviu' => 10, 'matematika' => 9, 'anglu' => 8], 0);
$paslemekas = new Mokinys ('Pašlemėkas', 'Šliūpšta', ['lietuviu' => 5, 'matematika' => 9, 'anglu' => 7], 0);
$bonifacijus = new Mokinys ('Liūtas', 'Bonifacijus', ['lietuviu' => 10, 'matematika' => 10, 'anglu' => 10], 0);
$perestukinas = new Mokinys ('Perestukinas', 'Nemokusis', ['lietuviu' => 5, 'matematika' => 3, 'anglu' => 4], 0);
$leopoldas = new Mokinys ('Katinas', 'Leopoldas', ['lietuviu' => 8, 'matematika' => 4, 'anglu' => 6], 0);

$mokiniai = [$eustarchijus, $kulverstukas, $paslemekas, $bonifacijus, $perestukinas, $leopoldas];

function lentele(array $array) {
    echo '<table border=3><thead><tr><th>Vardas</th><th>Vidurkis</th></tr></thead><tbody>';
    foreach ($array as $x) {
    echo '<tr><td>' . $x->pilnasVardas() . '</td><td>' . $x->vidurkis . '</td></tr>';
    }
    echo '</tbody></table>';
}

//pildom pirminių duomenų lentelę
echo '<h2>Pirminiai duomenys:</h2>';
lentele($mokiniai);

//rūšiuojam masyvą vidurkio mažėjimo tvarka
arsort($mokiniai);

/*function rusiuok($vidurkis1, $vidurkis2) {
    if ($vidurkis1 == $vidurkis2) {
        return 0;
    }
    return ($vidurkis1 > $vidurkis2) ? -1 : 1;
}*/

//pildom rezultatų lentelę
echo '<h2>Surikiuota lentelė vidurkio mažėjimo tvarka:</h2>';
lentele($mokiniai);

?>
</p>
</body>
</html>