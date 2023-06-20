<?php
function buscandoPosicion($arr, $left, $right, $target) {
    if ($right >= $left) {
        $mid = floor(($left + $right) / 2);

        if ($arr[$mid] == $target) {
            return $mid;
        }

        if ($arr[$mid] > $target) {
            return buscandoPosicion($arr, $left, $mid - 1, $target);
        }

        return buscandoPosicion($arr, $mid + 1, $right, $target);
    }

    return -1;
}

// Ejemplo de uso
$miArray = array(2, 5, 8, 12, 16, 23, 38, 56, 72, 91);
$numBuascado = 72;

$index = buscandoPosicion($miArray, 0, count($miArray) - 1, $numBuascado);

if ($index != -1) {
    echo "El valor $numBuascado se encuentra en el índice $index del arreglo.";
} else {
    echo "El valor $numBuascado no se encuentra en el arreglo.";
}
