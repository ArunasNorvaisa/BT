<?php

class Radar {

    public $date;
    public $number;
    public $distance;
    public $time;
    
    public function __construct(string $date, string $number, int $distance, int $time) {
        $this->date = new DateTime ($date);
        $this->number  = $_POST['numeris'];
        $this->distance  = $_POST['atstumas'];
        $this->time = $_POST['laikas'];
    }

    public function skaiciuokGreiti():float {
        $greitis = ($this->distance / $this->time) * 3.6;
        return round($greitis, 1);
    }
}

if (isset($_COOKIE['matavimai'])) {
    $ivykiai = unserialize($_COOKIE['matavimai']);
    } else {
        $ivykiai = [];
    }

if ($_POST) {
    $ivykiai[] = new Radar($_POST['data'], $_POST['numeris'], $_POST['atstumas'], $_POST['laikas']);
    setcookie('matavimai', serialize($ivykiai));
}

?>