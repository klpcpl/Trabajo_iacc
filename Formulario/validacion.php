<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container">

<?php

/**
 * Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 7
 * Contenidos de la semana 7.
 * NOMBRE: Operaciones en cadena y validaciones en PHP.
 * IACC
 */

$info = $_SERVER['PHP_SELF'];
$resultado2 = str_replace("validacion", "formularios", $info);


$datos = $_REQUEST;
$salida = true;
$listado = array();

if( !isset($datos["nombre"]) || !preg_match("/^[a-zA-Z0-9 ÁÉÍÓÚÑÖÜáéíóúñöü]+$/",$datos["nombre"]))
{
    $listado["nombre"] = "Ested no ha ingresado el nombre y no debe ponder carácteres especiales";
    $salida = false;
}

$largo = mb_strlen($datos["nombre"], "utf-8");
if($largo < 4 ){

    $listado["nombre_Caracteres"] = "Minimo del nombre son 4 caracteres";
    $salida = false;
}

if( !isset($datos["apellido"]) || !preg_match("/^[a-zA-Z0-9 ÁÉÍÓÚÑÖÜáéíóúñöü]+$/",$datos["apellido"]))
{
    $listado["apellido"] = "Ested no ha ingresado el apellido y no debe ponder carácteres especiales";
    $salida = false;
}

$largo = mb_strlen($datos["apellido"], "utf-8");
if($largo < 4 ){
    $listado["Apellido_Caracteres"] = "Minimo del apellido son 4 caracteres";
    $salida = false;
}


if( !isset($datos["apellido"]) || !preg_match("/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/",$datos["email"]))
{
    $listado["email"] = "Debe ingresar el correo correctamente";
    $salida = false;
}

if( !isset($datos["text"]) || !preg_match("/^[a-zA-Z0-9 ÁÉÍÓÚÑÖÜáéíóúñöü]+$/",$datos["text"]))
{
    $listado["text"] = "Debe ingresar el texto correctamente";
    $salida = false;
}

if( !isset($datos["valido"]) || $datos["valido"] != "on")
{
    $listado["valido"] = "Ested no ha validado los datos Checket";
    $salida = false;
}


if($salida){
    echo '<div class="alert alert-success">
            <strong>Success! </strong> Los valores fueron ingresado correctamente
        </div>';
    echo '<BR><BR><a href="'.$resultado2.'"><button type="button" class="btn btn-success">Volver a ingresar nuevos datos</button></a> ';
}else{
    $contador = 1;
        $texto = "EN EL INGRESO DE DATOS HAY LOS SIGUIENTES PROBLEMAS: <BR>\n";
       foreach($listado as $key => $val)
       {
        $texto .= $contador.").- ".$key.": ".$val."<BR>";
        $contador++;
       }

       echo '<div class="alert alert-danger">
            <strong>Error! </strong>'.$texto.'
            </div>';
        echo '<BR><BR><button type="button"  onclick="history.back()" class="btn btn-danger">Volver</button>';
}

?>

</div>

</body>

</html>