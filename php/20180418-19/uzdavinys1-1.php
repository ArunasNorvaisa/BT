    <?php
    class Trimestras {
                public $trimestras;
                public $vidurkis;

        function __construct($trimestras, $vidurkis) {
            $this->trimestras = $trimestras;
            $this->vidurkis = $this->skaiciuokVidurki();;
        }

        public function skaiciuokVidurki():float {
            $vidurkis = 0;
            foreach ($this->trimestras as $value) {
                $vidurkis += $value;
            }
            return $vidurkis / 3;
        }
    }
    ?>