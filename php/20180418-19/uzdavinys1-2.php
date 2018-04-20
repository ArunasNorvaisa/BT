    <?php
    class Mokinys extends Trimestras {
        
        public $vardas;
        public $pavarde;

        public function __construct (string $vardas, string $pavarde, array $trimestras) {
            parent:: __construct ($trimestras);
            $this->vardas = $vardas;
            $this->pavarde = $pavarde;
        }

        public function pilnasVardas() {
            return $this->vardas . ' ' . $this->pavarde;
        }
    }
?>