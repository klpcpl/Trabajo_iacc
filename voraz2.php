<?php
function encontrarMaximoValor($matriz) {
    $maximo = $matriz[0][0];
    $filas = count($matriz);
    $columnas = count($matriz[0]);

    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            if ($matriz[$i][$j] > $maximo) {
                $maximo = $matriz[$i][$j];
            }
        }
    }

    return $maximo;
}

// Ejemplo de uso
$matriz = array(
    array(4, 5, 2),
    array(14, 1, 7),
    array(3, 8, 6)
);

$maximoValor = encontrarMaximoValor($matriz);
echo "El máximo valor en la matriz es: " . $maximoValor;