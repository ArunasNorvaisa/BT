<?php
$a = 'abrikosas 1223 587, bananas ananasas';

// rasti ar yra raidžių 'ssss' kombinacija

preg_match('/s{4}/', $a);
var_dump(preg_match('/s{4}/', $a)); // grąžina 0 arba 1

$rezultatas = [];

preg_match_all('/s{4}/', $a, $rezultatas, PREG_OFFSET_CAPTURE);

var_dump($rezultatas);
?>