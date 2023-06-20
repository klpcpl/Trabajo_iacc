<?php
function factorial($n, &$memo) {
    if ($n <= 1) {
        return 1;
    }

    if (!isset($memo[$n])) {
        $memo[$n] = 1 + factorial($n - 1, $memo);
    }

    return $memo[$n];
}

// Ejemplo de uso
$n = 3;
$memo = array();

$result = factorial($n, $memo);
echo "El factorial de $n es: $result";
