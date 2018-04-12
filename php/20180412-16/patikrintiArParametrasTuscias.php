<?php

$a = true;

function arTuscias($parametras): string {
    if ($parametras) {
        return 'Parametras netuščias';
    }
        return 'Parametras tuščias';
}

echo arTuscias($a);
