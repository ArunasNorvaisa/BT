<?php

class Automobilis {
	public $marke;
	public $modelis;

	function informacija()	{
		return $this->marke . ' ' . $this->modelis;
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

echo $auto1->informacija();
echo $auto2->informacija();
echo $auto3->informacija();