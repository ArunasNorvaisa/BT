<?php

/*Sukurkite klasę Ivykis, kurios atributai yra: pavadinimas, data.
(panaudoti DateTime).
Sukurkite klasę Istorija, kurios atributai yra: laikotarpio
pavadinimas, įvykiai (masyvas).
Sukurkite metodą klasėje Istorija, kuris atspausdina istoriją
lentelėje ir apskaičiuoja kiek laiko praėjo nuo kiekvieno įvykio.*/

class Ivykis {
	public $pavadinimas;
	public $data;

/**
 * @param string
 * @param string
 */
	public function __construct(string $pavadinimas, string $data) {
		$this->pavadinimas = $pavadinimas;
		$this->data = new DateTime($data);
	}
}

class Istorija {
	public $laikotarpis;
	public $ivykiai;

/**
 * @param string
 * @param array
 */
	public function __construct(string $laikotarpis, array $ivykiai) {
	$this->laikotarpis = $laikotarpis;
	$this->ivykiai = $ivykiai;
	}

		public function spausdinkIstorija (array $array):string {			
	}
}

$vasario16 = new Ivykis ('LT nepriklausomybė', '1918-02-16');
$zalgirioMusis = new Ivykis ('Žalgirio mūšis', '1410-07-15');
$saulesMusis = new Ivykis ('Saulės mūšis', '1236-09-22');

$ivykiai = [$vasario16, $zalgirioMusis, $saulesMusis];

var_dump($ivykiai);