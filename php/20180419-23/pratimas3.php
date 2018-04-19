<?php

class Ivykis {
	public $pavadinimas;
	public $data;

	public function __construct(string $pavadinimas, string $data) {
		$this->pavadinimas = $pavadinimas;
		$this->data = new DateTime($data);
	}
}

class Istorija {
	public $laikotarpis;
	public $ivykiai;

	public function __construct(string $laikotarpis, array $ivykiai) {
	$this->laikotarpis = $laikotarpis;
	$this->ivykiai = $ivykiai;

	public function spausdinkIstorija (array $array):string {
		
	}
	}
}

$vasario16 = new Ivykis('LT nepriklausomybė', '1918-02-16');
$zalgirioMusis = new Ivykis('Žalgirio mūšis', '1410-07-15');
$saulesMusis = new Ivykis('Saulės mūšis', '1236-09-22');

$ivykiai = [$vasario16, $zalgirioMusis, $saulesMusis];

var_dump($ivykiai);