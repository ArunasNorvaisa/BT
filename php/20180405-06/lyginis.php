<!DOCTYPE html>
<html>
<head><meta charset="UTF-8">
    <title>Ar X lyginis</title>
</head>
<body>
<?php
$x = 8;
$liekana = $x % 2;

var_dump($liekana); //die;

$ats = 'Taip';

if ($liekana !== 0) {
    $ats = 'Ne';
}
?>

<h2> <?php echo $ats ?>! </h2>
</html>