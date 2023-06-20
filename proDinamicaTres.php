<?php
function fibonacci($n, &$memo) {
    if ($n <= 1) {
        return $n;
    }

    if (!isset($memo[$n])) {
        $memo[$n] = fibonacci($n - 1, $memo) + fibonacci($n - 2, $memo);
    }

    return $memo[$n];
}

// Ejemplo de uso
$n = 10;
$memo = array();

$result = fibonacci($n, $memo);
echo "El número de Fibonacci en la posición $n es: $result";
