
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uždavinys 3</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>Turime mokinių sąrašą su dalykais ir gautais pažymiais už tuos dalykus, pvz.:<p></p>

<pre>$mokiniai = [<br />
['vardas' => 'Jonas',<br />
        'pazymiai' => [<br />
                'lietuviu' => [4, 8, 6, 7],<br />
                'anglu' => [6, 7, 8],<br />
                'matematika' => [3, 5, 4]]],<br />
['vardas' => 'Ona',
        'pazymiai' => [<br />
                'lietuviu' => [10, 9, 10],<br />
                'anglu' => [9, 8, 10],<br />
                'matematika' => [10, 10, 9, 9]]],<br />
['vardas' => 'Rasa',<br />
        'pazymiai' => [<br />
                'lietuviu' => [10, 10, 10, 10],<br />
                'anglu' => [10, 10, 10],<br />
                'matematika' => [10, 10, 10]]],<br />
['vardas' => 'Perestukinas',<br />
        'pazymiai' => [<br />
                'lietuviu' => [6, 8, 4, 5],<br />
                'anglu' => [5, 6, 9],<br />
                'matematika' => [4, 3, 5]]]];<p></p>

Suskaičiuokite kuris geriausiai mokosi pagal visų dalykų pažymių
vidurkius. Dalyko pažymio nustatymui reikės panaudoti funkciją round()</h2><hr>
</pre></code>
<p>
    <?php
$mokiniai = [
    ['vardas' => 'Jonas', 'pazymiai' =>
    ['lietuviu' => [4, 8, 6, 7],
    'anglu' => [6, 7, 8],
    'matematika' => [3, 5, 4]]],
    ['vardas' => 'Ona', 'pazymiai' =>
    ['lietuviu' => [10, 9, 10],
    'anglu' => [9, 8, 10],
    'matematika' => [10, 10, 9, 9]]],
    ['vardas' => 'Rasa', 'pazymiai' =>
    ['lietuviu' => [10, 10, 10, 10],
    'anglu' => [10, 10, 10, 10],
    'matematika' => [10, 10, 10]]],
    ['vardas' => 'Perestukinas', 'pazymiai' =>
    ['lietuviu' => [6, 8, 4, 5],
    'anglu' => [5, 6, 9, 6, 3, 8],
    'matematika' => [4, 3, 5]]]];

$vidurkiai = [];

for ($i = 0; $i < count($mokiniai); $i++) {
    $vidurkis = 0;
    $vidurkis += blah($mokiniai, $i, 'lietuviu');
    $vidurkis += blah($mokiniai, $i, 'anglu');
    $vidurkis += blah($mokiniai, $i, 'matematika');
    $vidurkis /= 3;
    $vidurkis = round($vidurkis);
    $vidurkiai[] = $vidurkis;
    echo '<h1>Mokinio(-ės) ' . $mokiniai[$i]['vardas'] . ' vidurkis: ';
    echo $vidurkis . '</h1>';
}

// ieškom kas geriausiai mokosi:

$maxIndex = 0;

for ($i = 1; $i < count($vidurkiai); $i++) {
    $max = $vidurkiai[0];
    if ($vidurkiai[$i] > $max) {
        $max = $vidurkiai[$i];
        $maxIndex = $i;
    }
}

echo '<h1>Geriausiai mokosi ' . $mokiniai[$maxIndex]['vardas'];

// f-cja disciplinų vidurkiams skaičiuoti:

function blah(array $masyvas, int $indeksas, string $disciplina):int {
        $laikinasVidurkis = 0;
        for ($i = 0; $i < count($masyvas[$indeksas]['pazymiai'][$disciplina]); $i++) {
            $laikinasVidurkis += $masyvas[$indeksas]['pazymiai'][$disciplina][$i];
        }

        $laikinasVidurkis /= count($masyvas[$indeksas]['pazymiai'][$disciplina]);
        return $laikinasVidurkis;
    }

?>
</p>
</body>
</html>
