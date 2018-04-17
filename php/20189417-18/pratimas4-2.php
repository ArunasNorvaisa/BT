<?php

//sukurkite 3 php failus: (1) - skirtas saugoti masyvams; sukurkite
//masyvą su žmonių informacija (vardas, gimimo metai); (2) - skirtas
//saugoti funkcijom; sukurkite f-ją apskaičiuoti kiek praėjo laiko nuo
//žmogaus gimimo; (3) - skirtas iškviesti funkcijas ir išvesti inf-jai
//į ekraną lentelėje

function datuSkirtumas (array $a): int {
	foreach ($a as $vardas => $gData) {
		echo (date('Y-m-d') - $a['gData']) . '<br>';
	}
}