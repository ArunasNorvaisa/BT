    <?php
    class Mokinys extends Trimestras {
        
        public $vardas;
        public $pavarde;

        public function __construct ($vardas, $pavarde, $trimestras, $vidurkis) {
            parent:: __construct ($trimestras, $vidurkis);
            $this->vardas = $vardas;
            $this->pavarde = $pavarde;
        }

        public function pilnasVardas() {
            return $this->vardas . ' ' . $this->pavarde;
        }
    }
?>