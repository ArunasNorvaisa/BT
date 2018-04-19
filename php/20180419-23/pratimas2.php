<?php

$a = [
	['vardas' => 'Jonas', 'ugis' => 2.0],
	['vardas' => 'Petras', 'ugis' => 1.75],
	['vardas' => 'Antanas', 'ugis' => 1.8],
	['vardas' => 'Rasa', 'ugis' => 1.59]
];

usort($a, function($p1, $p2) {
	if ($p1['ugis'] == $p2['ugis']) {
		return 0;
	}
	elseif ($p1['ugis'] < $p2['ugis']) {
		return -1;
	} else {
		return 1;
	}
});

var_dump($a);