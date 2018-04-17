<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uždavinys 3</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>Turime daugiamatį masyvą, kuris aprašo kažką panašaus į
        Excel lentelę arba matricą, t.y. pirmas indeksas žymi eilutę, o
        antras stulpelį. Eilutės gali turėti skirtingą elementų (stulpelių)
        skaičių. Suskaičiuokite stulpeliuose esančių skaičių sumas ir
        išveskite didžiausią.<p>

            Testuokite su masyvu:<br>
            $a = [[1, 3, 4], [2, 5], [2 => 3, 5 => 8], [1, 1, 5 => 1]]</p></h2>
</code>
<p>
    <?php

    /*ALTERNATYVUS KODAS:
    PANAUDOJANT isset VIETOJ empty IR 2 FUNKCIJAS

    $array = [
    [1, 3, 4],
    [2, 5],
    [2 => 3, 5 => 8],
    [1, 1, 5 => 1],
];

$columns = getMaxIndex($array);
$sum = sumColumns($array, $columns);

var_dump($sum);

 *
 * Get array max index
 *
 * @param array $array
 *
 * @return int
 *
function getMaxIndex(array $array): int
{
    $maxColumns = 0;

    foreach ($array as $value) {
        $arrayColumns = max(array_keys($value));

        if ($arrayColumns > $maxColumns) {
            $maxColumns = $arrayColumns;
        }
    }

    return $maxColumns;
}

 *
 * Sum array columns
 *
 * @param array $array
 * @param int   $size
 *
 * @return array
 *
function sumColumns(array $array, int $size): array
{
    $columnsSum = [];

    for ($i = 0; $i <= $size; $i++) {
        $sum = 0;

        foreach ($array as $value) {
            if (isset($value[$i])) {
                $sum += $value[$i];
            }
        }

        $columnsSum[] = $sum;
    }

    return $columnsSum;
}*/
    $a = [
        [1, 3, 4],
        [2, 5],
        [2 => 3, 5 => 8],
        [1, 1, 5 => 1]
    ];

    //ieškom didž. indekso reikšmės mūsų masyvuose
    //https://justin.kelly.org.au/get-the-largest-key-in-an-array-with-php-how/

    for ($i = 1; $i < count($a); $i++) {
        $maxIndex = max(array_keys($a[0]));
        if (max(array_keys($a[$i])) > $maxIndex) {
            $maxIndex = max(array_keys($a[$i]));
        }
    }

    //piešiame lentelę, kad žinotumėm su kuo dirbam

    echo '<table border=1>';

    for ($i = 0; $i < count($a); $i++) {
        echo '<tr>';
        for ($j = 0; $j <= $maxIndex; $j++) {
            if (empty($a[$i][$j])) { //jei elementas tuščias
                $a[$i][$j] = 0;      //prilyginam jį nuliui
            }
            echo "<td style='padding:10px;'>" . $a[$i][$j] . '</td>';
        }
        echo '</tr>';
    }

    //skaičiuojam stulpelių sumas
    $stulpelis = 0;
    $sumuMasyvas = [];

    echo "<tr>";
    while ($stulpelis <= $maxIndex) {
        $suma = 0;
        $eilute = 0;

        while ($eilute < count($a)) {
            $suma += $a[$eilute][$stulpelis];
            $eilute++;
        }
        echo '<td style="padding:10px;"><b>' . $suma . '</b></td>';
        $sumuMasyvas[] = $suma;
        $stulpelis++;
    }

    echo "</tr>";
    echo '</table>';

    //renkame didžiausią iš stulpelių sumų

    $max = $sumuMasyvas[0];

    for ($i = 1; $i < count($sumuMasyvas); $i++) {

        if ($max < $sumuMasyvas[$i]) {
            $max = $sumuMasyvas[$i];
        }
    }

    echo "<h3>Stulpelių sumos - paskutinėje eilutėje, paryškintos<br>";
    echo "Didžiausia suma: " . $max . "</h3>";
    ?>

</p>
</body>
</html>