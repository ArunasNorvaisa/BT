<?php
$a = 'abrikosas 1223 587, bananas ananasas';

// rasti ar yra skaicių 'xxxx xxx' kombinacija

preg_match('/\d{4}.\d{3}/', $a);
var_dump(preg_match('/\d{4}.\d{3}/', $a)); // grąžina 0 arba 1

$rezultatas = [];

preg_match_all('/\d{4}.\d{3}/', $a, $rezultatas, PREG_OFFSET_CAPTURE);

var_dump($rezultatas);
?>