<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Uždavinys 2</title>
</head>
<body>
<h1>Sąlyga:</h1>
<code>
	<h2>Tobuluoju skaičiumi vadinamas natūralusis skaičius, lygus visų savo daliklių, mažesnių už save patį, sumai. pvz 28 = 1 + 2 + 4 + 7 + 14. Suraskite visus tokius skaičius iš intervalo 1...1000. Skaičiaus daliklių radimui ir tikrinimui ar skaičius tobulas pasirašykite atskiras funkcijas.
        <h3 style="color:red;text-align:center;">(antros f-jos neprisireikė; jos reiktų, jei norėtumėm pvz. patikrinti sąlygą skirtingiems skaičiams, nebūtinai 1000.)</h3>
</h2>
</code>
<p>
<?php

/*
//n00biškas kodas:
function dalikliuSuma(int $skaicius):int {
	$suma = 0;
	for ($i = 1; $i <= ceil($skaicius / 2); $i++) {
        if ($skaicius % $i) {
            $suma = $suma + 0; //bereikšmė eilutė, nesant galimybės parašyti sąlygos !%
        }
        else {
		$suma += $i;
    }
}
	return $suma;
}*/

//patobulintas kodas, reikalaujantis žymiai mažiau resursų

function dalikliuSuma(int $skaicius):int {
    $suma = 1;
    for ($i = 2; $i <= floor(sqrt($skaicius)); $i++) {
        if ($skaicius % $i) {
            $suma = $suma + 0; //bereikšmė eilutė, nesant galimybės parašyti sąlygos !%
        }
        else {
        $suma += $i;
        $suma += $skaicius / $i;
    }
}
    return $suma;
}

for ($i = 2; $i <= 1000; $i++) {
    if (dalikliuSuma($i) == $i) {
        echo '<h1 style="text-align:center;">' . $i . '</h1>';
    }
}
?>

</body>
</html>
