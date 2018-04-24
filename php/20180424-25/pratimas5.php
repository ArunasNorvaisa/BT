
<?php

//įkeliam sausainėlį

$a = $_POST['vartotojas'];

setcookie('vartotojas', $a);
var_dump($_COOKIE);
?>

