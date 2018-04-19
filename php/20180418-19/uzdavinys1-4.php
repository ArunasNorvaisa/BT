    <?php

function lentele(array $array) {
    echo '<table border=3><thead><tr><th>Vardas</th><th>Vidurkis</th></tr></thead><tbody>';
    foreach ($array as $x) {
    echo '<tr><td>' . $x->pilnasVardas() . '</td><td>' . $x->vidurkis . '</td></tr>';
    }
    echo '</tbody></table>';
}

/*function rusiuok($vidurkis1, $vidurkis2) {
    if ($vidurkis1 == $vidurkis2) {
        return 0;
    }
    return ($vidurkis1 > $vidurkis2) ? -1 : 1;
}*/

?>