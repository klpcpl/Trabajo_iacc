<?php


// identificador de usuario
function iditicarNombre($a){
    $myArray = array("NOMBRE1","NOMBRE2","NOMBRE3","VILLALOBOS"); 
    $nombreAlta = strtoupper($a);

    if(in_array($nombreAlta,$myArray)){
        return "El ".$nombreAlta." es un cliente habitual";
    }else{
        return "El ".$nombreAlta."Cliente Nuevo";
    }
}


function sacaValor($cantidad, $valor){
    return ($cantidad * $valor);
}


function cotizar($nombre,$array){

    $precio = "";
    $total = 0;
    foreach($array as $key => $value)
    {
        // $moto = ("Moto" == $val) ? 2 : 0;
        if("Moto" == $key){
            $precio .= "Tipo de vehículos ".$key."<br>";
            $precio .= "Valor del Lavado de ".$key." cantidad de ".$value[0]." tiene un valor de ".($value[0] * 2)."<br>";
            $total = $total + ($value[0] * 2);
            $precio .= "Valor del Motor Superior de ".$key." tiene un valor de ".($value[1] * 6)."<br>";
            $total = $total + ($value[1] * 2);
            $precio .= "Valor del Motor Inferior de ".$key." tiene un valor de ".($value[2] * 8)."<br>";
            $total = $total + ($value[2] * 2);
            $precio .= "Valor del Motor ambas caras de ".$key." tiene un valor de ".($value[3] * 12)."<br>";
            $total = $total + ($value[3] * 2);
            $precio .= "Valor del revision de fluidos de ".$key." tiene un valor de ".($value[4] * 2)."<br>";
            $total = $total + ($value[4] * 2);
            $precio .= "<br>";
        }elseif("Automóvil" == $key)
        {
            $precio .= "Tipo de vehículos ".$key."<br>";
            $precio .= "Valor del Lavado de ".$key." tiene un valor de ".($value[0] * 4)."<br>";
            $total = $total + ($value[0] * 4);
            $precio .= "Valor del Motor Superior de ".$key." tiene un valor de ".($value[1] * 6)."<br>";
            $total = $total + ($value[1] * 6);
            $precio .= "Valor del Motor Inferior de ".$key." tiene un valor de ".($value[2] * 8)."<br>";
            $total = $total + ($value[2] * 8);
            $precio .= "Valor del Motor ambas caras de ".$key." tiene un valor de ".($value[3] * 12)."<br>";
            $total = $total + ($value[3] * 12);
            $precio .= "Valor del revision de fluidos de ".$key." tiene un valor de ".($value[4] * 2)."<br>";
            $total = $total + ($value[4] * 2);
            $precio .= "<br>";
        }else{
            $precio .= "Tipo de vehículos ".$key."<br>";
            $precio .= "Valor del Lavado de ".$key." tiene un valor de ".($value[0] * 6)."<br>";
            $total = $total + ($value[0] * 6);
            $precio .= "Valor del Motor Superior de ".$key." tiene un valor de ".($value[1] * 6)."<br>";
            $total = $total + ($value[1] * 6);
            $precio .= "Valor del Motor Inferior de ".$key." tiene un valor de ".($value[2] * 8)."<br>";
            $total = $total + ($value[2] * 8);
            $precio .= "Valor del Motor ambas caras de ".$key." tiene un valor de ".($value[3] * 12)."<br>";
            $total = $total + ($value[3] * 12);
            $precio .= "Valor del revision de fluidos de ".$key." tiene un valor de ".($value[4] * 2)."<br>";
            $total = $total + ($value[4] * 2);
            $precio .= "<br>";
        }

    }

    $cliente = iditicarNombre($nombre); // mando a llamar la funcion de usuario

    echo $cliente. "tiene la siguiente Cotización <br>";

    echo $precio;
    echo "precio Neto ".$total;
    echo "<br>";
    $iva = ceil($total * 0.19);
    echo "Impuesto IVA ".$iva."<br>";
    echo "Total a Pagar ".($total + $iva);

    
}


// ...$dato (recibe la información a traves como un array)
function procesoLavado(...$dato)
{
    // echo "<pre>"; // ordena visualmente el array
    // print_r($dato);
    // echo "</pre>";
    // die();
    $agua =  $dato[0];
    $nombre =  $dato[1];
    $lista =  $dato[2];
    $listaKey = array_keys($lista); // saca las key de un array moto, automóvil etc

    $tipoInfo = array("lavado","Motor Superior","Motor Inferior","Ambas Caras","fluidos");

    foreach($listaKey as $key)
    {
        $tipo = $lista[$key];
        $contador = 0;
        foreach($lista[$key] as $val)
        {
            $modelo = $tipoInfo[$contador];
            for($x = 0; $x < $val; $x++)
            {
                if($agua > 0){
                    if( $modelo != "fluidos" ){
                        echo "Modelo ".$key." ".($x + 1)." tipo servicio ".$modelo." realizado <br>";
                        $agua =  $agua - 1;
                    }else{
                        echo "Modelo ".$key." ".($x + 1)." tipo servicio ".$modelo." realizado <br>";
                    }

                }else{
                    echo "Se termino el agua y estamos en paro";
                    return;
                }
            }
            $contador++;
        }

    }
   
}


$cantidadAgua = 7;
$tipo = array(
    "Moto"      => [3,0,0,0,3],
    "Automóvil" =>[5,0,0,0,5],
    "Camioneta" =>[7,0,7,0,7]
);

$nombre = "villAloBos";

$cotiza = cotizar($nombre,$tipo);

echo "<br>";
echo "<br>";

procesoLavado($cantidadAgua,$nombre,$tipo);


