
    <?php
    function max(int $a, int $b):string {
        $max = $a;
        if ($max < $b) {
            return 'Didesnis skaičius: b';
        }
            return 'Didesnis skaičius: a';
    }

    echo max(1, 23);
