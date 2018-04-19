<?php

class Gyvunas {
	public $svoris;
	public $ugis;

	public function __contruct(float $svoris, float $ugis) {
		$this->svoris = $svoris;
		$this->ugis = $ugis;
	}
}

class Suo extends Gyvunas {
	public $spalva;
	public $lytis;

	public function __contruct(float $svoris, float $ugis, string $spalva, string $lytis) {
		parent:: __contruct($svoris, $ugis);
	$this->spalva = $spalva;
	$this->lytis = $lytis;
	}
}

$barbosas = new Suo (8, 25, 'juoda', 'V');
$sargis = new Suo (25, 65, 'ruda', 'V');
$laika = new Suo (1.2, 12, 'balta', 'M');

$sunys = [$barbosas, $sargis, $laika];

foreach ($sunys as $key) {
	echo $sunys->svoris . ', ' . $sunys->ugis . ', ' . $sunys->spalva . ', ' . $sunys->lytis . '.<br>';
}