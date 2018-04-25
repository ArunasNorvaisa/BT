<?php
$a = 'abrikosas 1223 587, bananas ananasas';

// rasti bet koki skaičių didesnį nei 3 skaitmenys

preg_match('/\d{3,}\d*/', $a);
var_dump(preg_match('/\d{3,}\d*/', $a)); // grąžina 0 arba 1

$rezultatas = [];

preg_match_all('/\d{3,}\d*/', $a, $rezultatas, PREG_OFFSET_CAPTURE);

var_dump($rezultatas);
?>