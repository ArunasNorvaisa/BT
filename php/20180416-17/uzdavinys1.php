<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uždavinys 1</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
    <h2>Turime masyvą $a = ['Jonas', 'Petras', 'Antanas', 'Povilas'].
        Atspausdinkite visas galimas skirtingas poras laikant, kad pvz.
        poros 'Jonas' - 'Petras' ir 'Petras' - 'Jonas' yra tokios pat.</h2>
</code>
<p>
    <?php
    $a = ['Jonas', 'Petras', 'Antanas', 'Povilas'];

    foreach ($a as $key => $value) {
        for ($j = $key + 1; $j < count($a); $j++) {
            echo '<h1>' . $value . ' - ' . $a[$j] . '</h1>';
        }
    }

    ?>
</p>
</body>
</html>
