<?php
function fibonacci($n) {
    $fib = array();

    $fib[0] = 0;
    $fib[1] = 1;

    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib[$n];
}

// Ejemplo de uso
// manera: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
$number = 8;
$result = fibonacci($number);
echo "El número de Fibonacci en la posición $number es: $result";