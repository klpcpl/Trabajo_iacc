<?php


/**
 * Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 6
 * Contenidos de la semana 6.
 * NOMBRE: Operaciones en cadena en PHP.
 * IACC
 */

################ IMPORTANTE ################
// EN LA LINEA 159 SE AGREGA EL NOMBRE A LA VARIABLE
// EN LA LINEA 201 SE AGREGA LA CLAVE A LA VARIABLE




///========== EJERCICO DE COMPROBACIÓN DE NOMBRE ==========
//=========================================================

function compAltas($string, $callback)
{

    // LIMPIAMOS LOS ESPACIOS EN BLANCO AL FINAL Y AL PRICIPIO
    $string = trim($string);
    $flag = true; // inicializo verdadoro el flag

    # inicializo un array para los errores
    $rango = array();

    # identifica si el campo viene vacio
    if(empty($string)){
        $rango["Longitud"] = "No debe venir vacio el campo <br>\n";
        $flag = false;
    }

    # identifica si el primer caracter es mayúscula
    $stringUp = strtoupper($string);
    if($stringUp !== $string){
        $rango["Texto"] = "Todas las letras deben ser mayusculas <br>\n";
        $flag = false;  
    }

    # identifico que no tenga caracteres como # ! & entre otros ni numeros
    if(!preg_match("/^[a-zA-Z ÁÉÍÓÚÑÖÜáéíóúñöü]+$/",$string)){
        $rango["Caracteres"] = "No debe contener caracter especiales ni números <br>\n"; 
        $flag = false; 
    }

    # si el flag esta verdadero retorno correcto, de lo contrario devuelvo la lista de errores
    if($flag){
        $rango = "Nombre Ingresado: $string <br>\n";
    }

   # retorno de fucnión
    if(is_callable($callback)){
        call_user_func($callback,$rango);
   }
}


// ● Los usuarios registrados están algunos en mayúsculas y otros en minúsculas.
// ● La longitud de las claves para el acceso no cumple con el formato y longitud mínima
// establecida: mínimo 4 máximo 8 caracteres de longitud, primer carácter en mayúscula,
// un carácter numérico.

///========== EJERCICO DE COMPROBACIÓN DE CLAVE ==========
//=========================================================

function comprobarClave($string, $callback)
{
    $flages = true; // inicializo el flago como verdadero
    $rango = array(); // inicializo el array para lista de errores

    // indicamos los numeros
    $listNum = "0123456789";
    // sacamos el largo del string de los numeros
    $largoNum = mb_strlen($listNum, "utf-8");

    // sacamos los espacios

    $string = trim($string); // limpiamos los espacios en blanco
    $primera = substr($string,0,1); // sacamos la primera letra
    $segunda = strtoupper($primera); // sacamos la primera letra

    # saco el largo del string enviado
    $largo = mb_strlen($string, "utf-8");

    # identifica que no venga vacio
    if(empty($string))
    {
        $rango["Texto"] = "No debe venir vacio el texto";
        $flages = false;
    }

    # Determina el largo de la clave
    if($largo < 4 || $largo > 8)
    {
        $rango["Longitud"] = "La longitud de las claves para el acceso debe ser mínimo 4 máximo 8 caracteres de longitud";
        $flages = false;
    }

    # determina que la primera venga en mayuscula
    if($primera !== $segunda){
        $rango["Mayúscula"] = "La primera letra no esta en mayúscula";
        $flages = false;
    }

    # determina que no vengan caracteres especiales
    if(!preg_match("/^[a-zA-Z0-9ÁÉÍÓÚÑÖÜáéíóúñöü]+$/",$string)){
        $rango["Caracteres"] = "No debe contener caracter especiales y espacios en blanco"; 
        $flages = false;        
    }

    // comparo el texto con lista de numero para ver si en el string
    // existe algun numero
    $flag = false;
    for($x = 0; $x < $largo; $x++){
        $let = $string[$x];
        for($y = 0; $y < $largoNum; $y++){
            $Num = $listNum[$y];
            if($Num == $let){
                $flag = true;
            }
        }
    }

    if(!$flag){
        $rango["Número"] = "Debe exister al menos un numero en la clave";
        $flages = false;
    }

    # si todo esta correcto devuelvo el ok, en caso contrario devuelvo el array con la lista de errores
    if($flages)
    {
        $rango = "Los Clave fue ingresada Correctamente";
    }
 
    # retorno de la función
    if(is_callable($callback)){
        call_user_func($callback,$rango);
   }
}

/**
 * $nombre puede ser escrito con espacios tanto al inicio como al final
 * solamente pueden haber letras mayúsculas
 * puede contener solamente los siguientes caracteres especiales como:
 * Á - É - Í - Ó - Ú - Ñ - Ö - Ü
 */



#################################################
//  CAMBIAR EL NOMBRE PARA INGRESO
#################################################

$nombre = "        GUILLERMO 3lloa ORD#NES      ";

// llamada de function 
compAltas($nombre, function($result)
{
    # identifico si el resultado es un array si es asi muestro los errores
    if(is_array($result))
    {
        $contador = 1;
        $texto = "EL NOMBRE HAY LOS SIGUIENTES PROBLEMAS <BR>\n";
       foreach($result as $key => $val)
       {
        $texto .= $contador.").- ".$key.": ".$val;
        $contador++;
       }
       echo $texto;
       echo "===== VUELVA A INGRESAR EL NOMBRE ===== <BR>\n";
    }
    else
    {
        # muestro el resultado ok
        echo $result;
    }
});

echo "<br><br>\n\n";




///========== COMPROBACIÓN DE CLAVE tiene la siguiente condicion==========
// 1.- La longitud de las claves para el acceso debe ser mínimo 4 máximo 8 caracteres de longitud
// 2.- La primera letra no esta en mayúscula
// 3.- No debe contener caracter especiales
// 4.- Debe exister al menos un numero en la clave
//=========================================================


##########################################################
// CAMBIAR LOS DATOS DE LA CLAVE
###########################################################

$clave = " cambio Clave ";

# llamada de la funcion para la clave
comprobarClave($clave, function($result){
    # identifico si el resultado es un array si es asi muestro los errores
    if(is_array($result))
    {
        $contador = 1;
        $texto = "LA CLAVE TIENE LOS SIGUIENTES PROBLEMAS <BR>\n";
       foreach($result as $key => $val)
       {
        $texto .= $contador.").- ".$key.": ".$val;
        $texto .= "<br>\n";
        $contador++;
       }
       echo $texto;
       echo "===== VUELVA A INGRESAR LA CLAVE ===== <BR>\n";
    }else{
        # muestro el resultado ok
        echo "ESTADO DE LA CLAVE <BR>\n";
        echo $result;
    }
});




?>