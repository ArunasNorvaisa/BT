<?php
//if (!empty($date) && !empty($number) && !empty($distance) && !empty($time)) {
        class Radar {
        public $date;
        public $number;
        public $distance;
        public $time;
        public function __construct(string $date, string $number, int $distance, int $time)
        {
            $this->date = new DateTime ($date);
            $this->number = $_POST['numeris'];
            $this->distance = $_POST['atstumas'];
            $this->time = $_POST['laikas'];
        }
        public function skaiciuokGreiti(): float
        {
            $greitis = ($this->distance / $this->time) * 3.6;
            return round($greitis, 1);
        }
    }

//====================================================

if (isset($_COOKIE['ivykiai'])) {
    $ivykiai[] = unserialize($_COOKIE['ivykiai']);
    } else {
        $ivykiai = [];
    }

if ($_POST) {
$ivykiai[] = new Radar($_POST['data'], $_POST['numeris'], $_POST['atstumas'], $_POST['laikas']);
setcookie('ivykiai', serialize($ivykiai));
header('Location: uzdavinys1Acookie.php');
}


// if ($_POST && !isset($_POST['filter'])) {
// $ivykiai[] = new Radar($_POST['date'], ......);
// setcookie('ivykiai', serialize($ivykiai));
// header('Location: uzdavinys1.php');
// }

// if ($_POST && isset($_POST['filter'])) {
// foreach ($radars as $radar) {
// if (preg_match('/(?i)' . $_POST['filter'].'/'.serialize($ivykiai->number)) {
// $filteredRadars[] = $ivykis;
// }
// }
// }

//====================================================

    setcookie('data', $date, time() + 300);
    setcookie('numeris', $number, time() + 300);
    setcookie('atstumas', $distance, time() + 300);
    setcookie('laikas', $time, time() + 300);
    //$ivykiai = [];
    //$ivykis = new Radar ($_POST['data'], $_POST['numeris'], $_POST['atstumas'], $_POST['laikas']);
    //$ivykiai[] = $ivykis;
    //var_dump($ivykiai);
    // //spausdinam pradinius duomenis
    // echo '<h2>Pradiniai duomenys:</h2><p></p>';
    // echo lentele($ivykiai);
    // usort($ivykiai, 'rikiuok');
    // //spausdinam surikuotus rezultatus
    // echo '<h2>Lentelė vid. greičio mažėjimo tvarka:</h2><p></p>';
    // echo lentele($ivykiai);
    // //var_dump($_COOKIE);
    // /**
    //  * piešiam lentelę
    //  * @param  array $array [paprastai $ivykiai]
    //  * @return [string]        [lentelė]
    //  */
    // function lentele(array $array): string
    // {
    //     $lentele = '<table border=3><thead><tr>';
    //     $lentele .= '<th>Data</th>';
    //     $lentele .= '<th>Valst. Nr.</th>';
    //     $lentele .= '<th>Atstumas, m</th>';
    //     $lentele .= '<th>Laikas, s</th>';
    //     $lentele .= '<th>Vid. greitis, km/h</th>';
    //     $lentele .= '</tr></thead><tbody>';
    //     foreach ($array as $x) {
    //         $lentele .= '<tr>';
    //         $lentele .= '<td>' . $x->date->format('Y-m-d H:m:s') . '</td>';
    //         $lentele .= '<td>' . $x->number . '</td>';
    //         $lentele .= '<td>' . $x->distance . ' m</td>';
    //         $lentele .= '<td>' . $x->time . ' s</td>';
    //         $lentele .= '<td>' . $x->skaiciuokGreiti() . ' km/h</td>';
    //         $lentele .= '</tr>';
    //     }
    //     $lentele .= '</tbody></table>';
    //     return $lentele;
    // }
    /**
     * rikiuojam masyvą greičio mažėjimo tvarka
     * @param  [object] $ivykis1
     * @param  [object] $ivykis2
     * @return [int]
     */
    function rikiuok(Radar $ivykis1, Radar $ivykis2): int
    {
        if ($ivykis1->skaiciuokGreiti() == $ivykis2->skaiciuokGreiti()) {
            return 0;
        }
        return ($ivykis1->skaiciuokGreiti() > $ivykis2->skaiciuokGreiti()) ? -1 : 1;
    }
//}
?>