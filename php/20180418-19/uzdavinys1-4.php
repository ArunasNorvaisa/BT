    <?php

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

/**
 * [rūšiuojam masyvą trimestro vidurkio mažėjimo tvarka]
 * @param  [object]  $vidurkis1
 * @param  [object]  $vidurkis2
 * @return [int]
 */
function rusiuok(Mokinys $mokinys1, Mokinys $mokinys2):int {
    if ($mokinys1->skaiciuokVidurki() == $mokinys2->skaiciuokVidurki()) {
        return 0;
    }
    return ($mokinys1->skaiciuokVidurki() > $mokinys2->skaiciuokVidurki()) ? -1 : 1;
}

?>