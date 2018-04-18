<?php

class Zmogus {
	public $vardas;
	public $pavarde;

	function pilnasVardas()	{
		return $this->vardas . ' ' . $this->pavarde;
	}
}

$zmogus1 = new Zmogus;
$zmogus1->vardas = 'Jonas';
$zmogus1->pavarde = 'Jonaitis';

pilnasVardas($zmogus1);
var_dump($zmogus1);