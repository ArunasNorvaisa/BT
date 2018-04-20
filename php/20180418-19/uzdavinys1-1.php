    <?php
    class Trimestras {
                public $trimestras;

        function __construct(array $trimestras) {
            $this->trimestras = $trimestras;
        }

/**
 * skaičiuojam vidurkiį
 * @return [float] [mokinio vidurkis]
 */
        public function skaiciuokVidurki():float {
            return array_sum($this->trimestras) / count($this->trimestras);
        }
    }
    ?>