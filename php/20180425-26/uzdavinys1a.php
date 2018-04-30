<?php

class Radar {
    public $date;
    public $number;
    public $distance;
    public $time;
    public function __construct($date, $number, $distance, $time) {
        $this->date     = new DateTime($date);
        $this->number   = $_POST['numeris'];
        $this->distance = $_POST['atstumas'];
        $this->time     = $_POST['laikas'];
    }
}

    if (isset($_COOKIE['matavimai'])) {
        $ivykiai = unserialize($_COOKIE['matavimai']);
    } else {
        $ivykiai = [];
        $filtruotiIvykiai = [];
    }

    if ($_POST && isset($_POST['suvesti'])) {
        $ivykiai[] = new Radar($_POST['data'], $_POST['numeris'], $_POST['atstumas'], $_POST['laikas']);
        setcookie('matavimai', serialize($ivykiai));
        header('Location: uzdavinys1.php');
    }

    if ($_POST && isset($_POST['filtras'])) {
        for ($n = 0; $n < count($ivykiai); $n++) { 
            if (preg_match('/' . $_POST['filtras'] . '/i', $ivykiai[$n]->number)) {
            $filtruotiIvykiai[] = $ivykiai[$n];
            }
        }
    }
?>