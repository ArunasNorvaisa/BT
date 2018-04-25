<?php
$a = 'abrikosas 1223 587, bananas ananasas';

// rasti bet koki skaiciu

preg_match('/\d{1,}/', $a);
var_dump(preg_match('/\d{1,}/', $a)); // grąžina 0 arba 1

$rezultatas = [];

preg_match_all('/\d{1,}/', $a, $rezultatas, PREG_OFFSET_CAPTURE);

var_dump($rezultatas);
?>