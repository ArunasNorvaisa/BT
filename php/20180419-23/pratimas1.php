<?php

/*Sukurkite klasę Gyvunas su atributais: svoris, ugis.
Sukurkite klasę Suo su atributais: spalva, lytis ir
metodu išvesti visą informaciją.
Sukurkite konstruktorius.

Sukurkite klasės Suo objektą ir iškvieskite metodą
informacijai spausdinti.*/

class Gyvunas {
	public $svoris;
	public $ugis;

	public function __construct(float $svoris, float $ugis) {
		$this->svoris = $svoris;
		$this->ugis = $ugis;
	}
}

class Suo extends Gyvunas {
	public $spalva;
	public $lytis;

	public function __construct(float $svoris, float $ugis, string $spalva, string $lytis) {
		parent:: __construct($svoris, $ugis);
	$this->spalva = $spalva;
	$this->lytis = $lytis;
	}
}

$barbosas = new Suo (8, 25, 'juoda', 'V');
$sargis = new Suo (25, 65, 'ruda', 'V');
$laika = new Suo (1.2, 12, 'balta', 'M');

$sunys = [$barbosas, $sargis, $laika];

var_dump($sunys);

foreach ($sunys as $key) {
	echo $key->svoris . ', ' . $key->ugis . ', ' . $key->spalva . ', ' . $key->lytis . '.<br>';
}