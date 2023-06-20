<?php

function knapsack($capacity, $weights, $values, $numItems) {
    $dp = array();
  
    // Inicializar la matriz dp con ceros
    for ($i = 0; $i <= $numItems; $i++) {
        for ($w = 0; $w <= $capacity; $w++) {
            if ($i == 0 || $w == 0) {
                $dp[$i][$w] = 0;
                
            } else if ($weights[$i-1] <= $w) {
                $dp[$i][$w] = max($values[$i-1] + $dp[$i-1][$w-$weights[$i-1]], $dp[$i-1][$w]);
            } else {
                $dp[$i][$w] = $dp[$i-1][$w];
            }
        }
        print_r($dp);
    }
  
    // Reconstruir la solución seleccionando los elementos
    $selectedItems = array();
    $w = $capacity;
    for ($i = $numItems; $i > 0 && $w > 0; $i--) {
        if ($dp[$i][$w] != $dp[$i-1][$w]) {
            $selectedItems[] = $i-1;
            $w -= $weights[$i-1];
        }
    }
  
    return array(
        'maxValue' => $dp[$numItems][$capacity],
        'selectedItems' => array_reverse($selectedItems)
    );
}

// Ejemplo de uso
$capacity = 11;
$weights = array(2, 3, 4, 5);
$values = array(30, 44, 55, 60);
$numItems = count($weights);

$result = knapsack($capacity, $weights, $values, $numItems);
echo "Valor máximo: " . $result['maxValue'] . "\n";
echo "Elementos seleccionados: " . implode(", ", $result['selectedItems']);