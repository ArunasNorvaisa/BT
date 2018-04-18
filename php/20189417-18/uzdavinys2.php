<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uždavinys 2</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>Turime žmonių masyvą, kurio kiekvienas elementas yra
masyvas su žmogaus vardu ir lytimi. Pvz:<p>
    $zmones = [<br />
    ['vardas' => 'Jonas', 'lytis' => 'V'],<br />
    ['vardas' => 'Ona', 'lytis' => 'M'],<br />
    ['vardas' => 'Petras', 'lytis' => 'V'],<br />
    ['vardas' => 'Marytė', 'lytis' => 'M'],<br />
    ['vardas' => 'Eglė', 'lytis' => 'M']<br />
    ['vardas' => 'Eustarchijus', 'lytis' => 'V'],<br />
    ['vardas' => 'Nataša', 'lytis' => 'M']<br />
];</p><p>
Atspausdinkite visas galimas skirtingas 3 asmenų grupes taip kad nebūtų tų
pačių lyčių.</p></h2><hr>
</code>
<p>
    <?php
$zmones = [
    ['vardas' => 'Jonas', 'lytis' => 'V'],
    ['vardas' => 'Ona', 'lytis' => 'M'],
    ['vardas' => 'Petras', 'lytis' => 'V'],
    ['vardas' => 'Marytė', 'lytis' => 'M'],
    ['vardas' => 'Eglė', 'lytis' => 'M'],
    ['vardas' => 'Eustarchijus', 'lytis' => 'V'],
    ['vardas' => 'Nataša', 'lytis' => 'M']
];

foreach($zmones as $key => $value) {
    for ($i = $key + 1; $i < count($zmones); $i++) {
        for ($j = $i + 1; $j < count($zmones); $j++) {
            if ($zmones[$key]['lytis'] != $zmones[$i]['lytis'] ||
             $zmones[$key]['lytis'] != $zmones[$j]['lytis']) {
                echo '<h1>' . $zmones[$key]['vardas'] . ' - ' . $zmones[$i]['vardas'];
                echo ' - ' . $zmones[$j]['vardas'] . '</h1>';
            }
        }
    }
}

?>
</p>
</body>
</html>