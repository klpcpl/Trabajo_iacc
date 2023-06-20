<?php
function encontrarRutaMinima($matriz) {
    $filas = count($matriz);
    $columnas = count($matriz[0]);

    // Crear una matriz auxiliar para almacenar los valores acumulativos
    $rutaMinima = array_fill(0, $filas, array_fill(0, $columnas, 0));
    
    // Inicializar el primer elemento de la ruta mínima con el valor de la matriz original
    $rutaMinima[0][0] = $matriz[0][0];

    // Calcular los valores acumulativos para la primera fila
    for ($j = 1; $j < $columnas; $j++) {
        $rutaMinima[0][$j] = $rutaMinima[0][$j - 1] + $matriz[0][$j];
    }

    // Calcular los valores acumulativos para la primera columna
    for ($i = 1; $i < $filas; $i++) {
        $rutaMinima[$i][0] = $rutaMinima[$i - 1][0] + $matriz[$i][0];
    }

    // Calcular los valores acumulativos para el resto de la matriz
    for ($i = 1; $i < $filas; $i++) {
        for ($j = 1; $j < $columnas; $j++) {
            $rutaMinima[$i][$j] = $matriz[$i][$j] + min($rutaMinima[$i - 1][$j], $rutaMinima[$i][$j - 1]);
        }
    }

    // Retornar el valor acumulativo en la esquina inferior derecha de la matriz
    return $rutaMinima[$filas - 1][$columnas - 1];
}

// Ejemplo de uso
$matriz = array(
    array(1, 3, 1),
    array(1, 5, 14),
    array(4, 2, 6)
);

$rutaMinima = encontrarRutaMinima($matriz);
echo "La ruta mínima en la matriz es: " . $rutaMinima;
