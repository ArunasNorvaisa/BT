<?php

//sukurkite 3 php failus: (1) - skirtas saugoti masyvams; sukurkite
//masyvą su žmonių informacija (vardas, gimimo metai); (2) - skirtas
//saugoti funkcijom; sukurkite f-ją apskaičiuoti kiek praėjo laiko nuo
//žmogaus gimimo; (3) - skirtas iškviesti funkcijas ir išvesti inf-jai
//į ekraną lentelėje

function datuSkirtumas (array $array) {
	foreach ($array as $person) {
		$skirtumas = floor((strtotime(date(DATE_W3C)) - strtotime($person['gData'])) / 31536000);
		echo $person['vardas'] . ' yra ' . $skirtumas . ' metų<br>';
	}
}
