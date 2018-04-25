<?php
$a = 'abrikosas 1223 587, bananas ananasas';

// rasti ar yra raidžių 'as' kombinacija

preg_match('/as/', $a);
var_dump(preg_match('/as/', $a)); // grąžina 0 arba 1

$rezultatas = [];

preg_match_all('/as/', $a, $rezultatas, PREG_OFFSET_CAPTURE);

var_dump($rezultatas);
 ?>