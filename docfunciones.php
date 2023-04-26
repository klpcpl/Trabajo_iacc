<?php

/**
 * Explicaciones de distitnos tipos de funciones EXTERNAS realizadas por el desarrollador
 * EN ESTE APARTADO NO SE HABLARA DE OBJETOS YA QUE SU FUNCIONES SE LLAMAN METODOS, FUNCIONAN COMO FUNCION PERO ES PARTE DE UN OBJETO.
 */


 //==================== FUNCIÓN SIN PARAMETROS =================================
 //===========================================================================

// función simple de ejcución sin parametro solamente devolvera un resultado 

function resSimples(){
    return "Trae un texo sin interes alguno en la función SIMPLE <br><br>";
}

echo resSimples();

//==================== FUNCIÓN CON PARAMETROS =================================
 //===========================================================================

// función con envio de parametros, en este caso solamente se envio uno
function resConParam($uno = ""){
    return "Resultado de una función con envio de parámetros enviado ej :{$uno} <br><br>";
}

echo resConParam("Enviado con Param");

// function con envio de más de un parametro de string
function resConMasParam($uno = "", $dos= "", $tres=""){
    return "Resultado de una función con envio de parámetros enviado ej :{$uno} - {$dos} - {$tres} <br><br>";
}

echo resConMasParam("Enviado con Param1", "Enviado con Param2", "Enviado con Param3");


// function con envio de más de un parametro de int
function resultMate($uno = "", $dos= "", $tres=""){
    $result = ($uno  + $dos) * $tres;
    return "Resultado de de una operación matemática {$result} <br><br>";
}

echo resultMate(4,9,3);


//==================== FUNCIÓN DE TIPO ANÓNIMAS =================================
 //===========================================================================

// Esta función no tiene nombre solamente se le asigna a un valor como el ejemplo puede ser con parametros enviado o sin el 

$saludo = function($nombre = "")
{
    printf("Hola nombrando el programa %s <br><br>", $nombre);
};

$saludo('PHP');


//==================== FUNCIÓN DE TIPO VARIABLE =================================
 //===========================================================================

//PHP admite el concepto de funciones variables. Esto significa que si un nombre de variable tiene paréntesis anexos a él, PHP buscará una función con el mismo nombre que lo evaluado por la variable, e intentará ejecutarla

function informa() {
    echo "Esta es una información pasada de otra forma<br><br>";
}

$dato = 'informa';
$dato();


//==================== FUNCIÓN CON ENVIO DE DATOS ARRAY ITERABLES PERO A TRAVES DE EXPRES OPERATOR =================================
 //===========================================================================

 // este tipo de funcion recive distitnos tipos de parametros no ordenados como a continuación se muestra
 // DIRECTORY_SEPARATOR = es una funcion interna para hacer el \ 
 // getcwd() = funcion para traer la raiz de la ruta donde se encuentra

function traerRuta(...$segments) {
    $rutaUno = getcwd();
    $rutados = join(DIRECTORY_SEPARATOR, $segments);
    return $rutaUno.DIRECTORY_SEPARATOR.$rutados;
}
echo "creando la primera ruta <br>";
echo traerRuta("home", "alice", "Documents", "example.txt");
echo "<br><br>";


//==================== FUNCIÓN CON ENVIO DE DATOS ARRAY CAPTURA DE DATOS=================================
//===========================================================================

// este tipo de funcion recive distitnos tipos de parametros no ordenados como a continuación se muestra
// DIRECTORY_SEPARATOR = es una funcion interna para hacer el \ 
// getcwd() = funcion para traer la raiz de la ruta donde se encuentra
//  func_get_args($segments) = captura todas las variables que se le asigna y los tranforma en array;

function traerRutaCaptura($segments) {
    $rutaUno = getcwd();
    $lista = func_get_args($segments);
    $rutados = join(DIRECTORY_SEPARATOR, $lista);
    return $rutaUno.DIRECTORY_SEPARATOR.$rutados;
}

echo "creando la Segunda ruta <br>";
echo traerRutaCaptura("home", "Guillermo", "Documents", "example.txt");
echo "<br><br>";