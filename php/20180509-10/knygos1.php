<?php 
$json = file_get_contents('knygos.json');
$objektai = json_decode($json);

foreach ($objektai as $objektas) {
	echo $objektas->pavadinimas->tekstas . '<br>';
}