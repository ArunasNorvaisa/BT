<?php

/*Turime mokinių sąrašą su dalykais ir gautais pažymiais už tuos dalykus.
Išveskite mokinių sąrašą į HTML lentelę taip (pagal stulpelius):
- mokinio vardas;
- visi lietuvių kalbos pažymiai
- lietuvių kalbos vidurkis
- visi anglų kalbos pažymiai
- anglų kalbos vidurkis
- visi matematikos pažymiai
- matematikos vidurkis
- bendras vidurkis
Duomenys, funkcijos, iškvietimas - atskiruose failuose.*/

function spausdinkDuomenis($array $masyvas) {
	echo '<table><tr>';
	for ($i = 0; $i < count($masyvas); $i++) {
		echo '<td>' . $masyvas[$i]['vardas'] . '</td>';
	}
}