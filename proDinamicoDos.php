<?php
function lcs($str1, $str2) {
    $len1 = strlen($str1);
    $len2 = strlen($str2);

    $dp = array();

    // Inicializar la matriz dp con ceros
    for ($i = 0; $i <= $len1; $i++) {
        for ($j = 0; $j <= $len2; $j++) {
            if ($i == 0 || $j == 0) {
                $dp[$i][$j] = 0;
            } elseif ($str1[$i - 1] == $str2[$j - 1]) {
                $dp[$i][$j] = $dp[$i - 1][$j - 1] + 1;
            } else {
                $dp[$i][$j] = max($dp[$i - 1][$j], $dp[$i][$j - 1]);
            }
        }
    }

    return $dp[$len1][$len2];
}

// Ejemplo de uso
$str1 = "ABCDGH";
$str2 = "AEDFHR";

$result = lcs($str1, $str2);
echo "La longitud de la subsecuencia común más larga es: " . $result;
