<?php

//Sukurkite masyvą, kuriame būtų bent trys Automobilis klasės objektai ir
//atspausdinkite visus automobilius HTML lentelėje.
//Automobilis klasė - atskirame faile.

class Automobilis {
	public $marke;
	public $modelis;

	function marke()	{
		return $this->marke;
	}

	function modelis() {
		return $this->modelis;
	}
}

$auto1 = new Automobilis;
$auto1->marke = 'Audi';
$auto1->modelis = 'A6';

$auto2 = new Automobilis;
$auto2->marke = 'BMW';
$auto2->modelis = '525';

$auto3 = new Automobilis;
$auto3->marke = 'BMW';
$auto3->modelis = 'X6';