<?php

/**
 * Se genera con funciones los distintos requerimientos para las funciones de una calculadora y esto se podra ejecutar en cualquier código
 */

 function sumar($uno,$dos,$tres){
    $suma = $uno + $dos + $tres;
    return "El resultado de la suma de los 3 número {$uno} - {$dos} - {$tres} es {$suma} <br><br>";
 }

 function resta($uno,$dos,$tres){
    $resta = $uno + $dos + $tres;
    return "El resultado de la resta de los 3 número {$uno} - {$dos} - {$tres} es {$resta} <br><br>";
 }

 function multi($uno,$dos){
    $multiplica = $uno * $dos;
    return "El resultado de la multiplicación de los 2 número {$uno} - {$dos}  es {$multiplica} <br><br>";
 }
 
 function division($uno,$dos){
    $divi = $uno / $dos;
    return "El resultado de la división de los 2 número {$uno} dividido en {$dos}  es {$divi} <br><br>";
 }
 
 function exponer($uno,$dos){
    $base = pow($uno, $dos);
    return "El {$uno} elevado a {$dos}  es {$base} <br><br>";
 }

 function raiz($uno){
    $result = sqrt($uno);
    return "El resultado de la raiz cuadrada del número {$uno}  es {$result} <br><br>";
 }

 function porcentaje($uno, $dos){
    $result = ($uno * $dos )/100;
    return "El {$dos}% del numero {$uno} es {$result} <br><br>";
 }





echo sumar(10,14,8);
echo resta(27,5,8);
echo multi(27,5);
echo division(90,5);
echo exponer(2,8);
echo raiz(25);
echo porcentaje(25,65);
