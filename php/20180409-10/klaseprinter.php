<?php
class Printer
{
    function welcome(string $message)
    {
        echo 'Welcome' . $message . '<br>';
    }
}

$world = new Printer();
$world->welcome(', World!!!!');
$world->welcome(', John!!!!');
