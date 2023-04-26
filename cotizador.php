<?php


// Identifica el tipo de cliente si es habitual o nuevo
function listaCliente($info)
{
    $cliente = array("VILLALOBOS","ULLOA","ZAMORANO","IBACACHE");
    $info = strtoupper($info);

    $nombre_salida = ucfirst(strtolower($info));

    if(in_array($info,$cliente )){
        return "El Sr. {$nombre_salida} es un Cliente habitual";
    }else{
        return "El Sr. {$nombre_salida} es Nuevo Cliente";
    }
}



// para sacar el presupuesto
function presupuesto($listado)
{
    $result = array();
    foreach($listado as $keyes => $values){
        $valorArray = array();
        switch ($keyes) {
            case "Moto":
                    // lavado de vehículo
                    $key = "lavado";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 2 : 0;
                    // lavado de motorSuperior
                    $key = "motorSuperior";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 6 : 0;
                    // lavado de motorInferior
                    $key = "motorInferior";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 8 : 0;
                    // lavado de motorInferior
                    $key = "motorAmbos";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 12 : 0;
                    // lavado de motorInferior
                    $key = "fluido";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 2 : 0;

                    $result[$keyes] = $valorArray;
              break;
            case "Automóvil":
                    // lavado de vehículo
                    $key = "lavado";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 4 : 0;
                    // lavado de motorSuperior
                    $key = "motorSuperior";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 6 : 0;
                    // lavado de motorInferior
                    $key = "motorInferior";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 8 : 0;
                    // lavado de motorInferior
                    $key = "motorAmbos";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 12 : 0;
                    // lavado de motorInferior
                    $key = "fluido";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 2 : 0;

                    $result[$keyes] = $valorArray;
              break;
            case "Camioneta":
                    // lavado de vehículo
                    $key = "lavado";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 6 : 0;
                    // lavado de motorSuperior
                    $key = "motorSuperior";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 6 : 0;
                    // lavado de motorInferior
                    $key = "motorInferior";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 8 : 0;
                    // lavado de motorInferior
                    $key = "motorAmbos";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 12 : 0;
                    // lavado de motorInferior
                    $key = "fluido";
                    $valorArray[$key] = ($values[$key] > 0)? $values[$key] * 2 : 0;
                    $result[$keyes] = $valorArray;
                break;
            default:
                $valor = "No existe el valor para este tipo de modelo";
                $result[$key] = $valor;
               break;
          }
        }
         return $result;
}

// para sacar la cotización de lo requerido
function cotizacion($datos = array())
{
    $listaVehiculos = array("Moto","Automóvil","Camioneta");
    // datos de lavado de auto para el lavado
    $precioVehiculo = array(
        "Moto"      => 2,
        "Automóvil" => 4,
        "Camioneta" => 6
    );

    // se extrae al cliente en curso
    $Cliente = listaCliente(func_get_args($datos)[0]);
    
    // dato de la solicitud
    $indicadores = func_get_args($datos)[1];
    $valores = presupuesto($indicadores);

    // se describe el detalle de la cotización requerido por el cliente
    $detalle = "La presente cotización es para: <br> {$Cliente}, <br>a continuación de detalla la cotización <br><br>";

    $total = 0;
    foreach($listaVehiculos as $estatus){

        $detalle .= "Tipo de Vehículo : {$estatus} <br> Cuenta con los siguientes Servicios<br>
        Cantidad de Lavado : ". $indicadores[$estatus]['lavado']." ---------------------C/U : $ ".$precioVehiculo[$estatus]." --------------> Sub-Total : $".  $valores[$estatus]['lavado'] ." <br>
        Lavado Motor Superior : ". $indicadores[$estatus]['motorSuperior']." ----------------------C/U : $ 6 -----------> Sub-Total : $".  $valores[$estatus]['motorSuperior'] ." <br>
        Lavado Motor Inferior : ". $indicadores[$estatus]['motorInferior']." -----------------------C/U : $ 8 -----------> Sub-Total : $".  $valores[$estatus]['motorInferior'] ." <br>
        Ambas caras del motor : ". $indicadores[$estatus]['motorAmbos']." --------------------C/U : $ 12 ---------> Sub-Total : $".  $valores[$estatus]['motorAmbos'] ." <br>
        La revisión de todos los fluidos : ". $indicadores[$estatus]['fluido']." ----------C/U : $ 2 ---------> Sub-Total : $".  $valores[$estatus]['fluido'] ." <br><br>";

        $valor =  $valores[$estatus]['lavado'] + $valores[$estatus]['motorSuperior'] + $valores[$estatus]['motorInferior'] + $valores[$estatus]['motorAmbos'] + $valores[$estatus]['fluido'];
        $total = $total +  $valor;
    }

    $detalle .= "PRECIO NETO = $ ".$total."<br>";
    $iva = ceil($total * 0.19);
    $detalle .= "IMPUESTO IVA 19% = $ ".$iva ."<br>";
    $detalle .= "TOTAL A PAGAR = $ ".($iva + $total) ."<br>";
    return $detalle;
}

// proceso de ejecución de lavado de los vehículos

// para sacar el presupuesto
function lavadoIni($info = array())
{
    $agua           = func_get_args($info)[0];
    $detalle        = func_get_args($info)[1];
    $cantidadMax    = func_get_args($info)[2];
    $listaVehiculos = array_keys($cantidadMax);

    $acumuladorTotal = array();
    foreach($listaVehiculos as $tipo)
    {
        $numMax =  $cantidadMax[$tipo];
        $acumulador = array();
        for($pos = 0; $pos < $numMax; $pos++)
        {
            $Detalle = array();
            if($agua > 0)
            {
                $Detalle["lavado"] = ($detalle[$tipo]["lavado"] > $pos ) ? "REALIZADO" : "No aplica";
                $Detalle["motorSuperior"] = ($detalle[$tipo]["motorSuperior"] > $pos ) ? "REALIZADO" : "No aplica";
                $Detalle["motorInferior"] = ($detalle[$tipo]["motorInferior"] > $pos ) ? "REALIZADO" : "No aplica";
                $Detalle["motorAmbos"] = ($detalle[$tipo]["motorAmbos"] > $pos ) ? "REALIZADO" : "No aplica";
                $Detalle["fluido"] = ($detalle[$tipo]["fluido"] > $pos ) ? "REALIZADO" : "No aplica";
                $agua--;
            }
            else
            {
                $Detalle["lavado"] = ($detalle[$tipo]["lavado"] > $pos ) ? "FALTA SUMINISTRO" : "No aplica";
                $Detalle["motorSuperior"] = ($detalle[$tipo]["motorSuperior"] > $pos ) ? "FALTA SUMINISTRO" : "No aplica";
                $Detalle["motorInferior"] = ($detalle[$tipo]["motorInferior"] > $pos ) ? "FALTA SUMINISTRO" : "No aplica";
                $Detalle["motorAmbos"] = ($detalle[$tipo]["motorAmbos"] > $pos ) ? "FALTA SUMINISTRO" : "No aplica";
                $Detalle["fluido"] = ($detalle[$tipo]["fluido"] > $pos ) ? "FALTA SUMINISTRO" : "No aplica";

            }

            $acumulador[] = $Detalle;
        }
        $acumuladorTotal[$tipo] = $acumulador;
    }

    return $acumuladorTotal;
}

// proceso de la empresa dependiendo del consumible de agua
function proceso($datos = array())
{
    
    $listaVehiculos = array("Moto","Automóvil","Camioneta");
    // datos de lavado de auto para el lavado

    // se extrae al cliente en curso
    $Cliente        = listaCliente(func_get_args($datos)[0]);

    // cantidad de agua que hay en la empresa
    $cantiAgua      = func_get_args($datos)[2];
    
    // dato de la solicitud
    $indicadores    = func_get_args($datos)[1];
    
    $listaCantidad  = array();
    foreach($listaVehiculos as $key)
    {
        $value = $indicadores[$key];
        $num = array();
        $num[] = $value["lavado"];
        $num[] = $value["motorSuperior"];
        $num[] = $value["motorInferior"];
        $num[] = $value["motorAmbos"];
        $num[] = $value["fluido"];
        
        $maxNum = max($num);
        $listaCantidad[$key] = $maxNum;
    }
    
    $valores = lavadoIni($cantiAgua,$indicadores,$listaCantidad);

    $detalle = "Estado de evolución del trabajo requerido: <br> {$Cliente}, a continuación de detalla el proceso <br>";
    $detalle .= "Los item que estan terminados se destacara con la palabra -- REALIZADO --<br>";
    $detalle .= "Por falta de Agua para el lavado de vehículos se detallara con -- FALTA SUMINISTRO -- para determinar cuantos faltan<br>";
    $detalle .= "Los ítem que no estan dentro de la cotización o pedido se destacara con -- No aplica --<br>";
    $detalle .= "-------------------------------------------------------------------------------------------<br>";
    $detalle .= "DETALLES DE LA REALIZACIÓN DE LOS TRABAJOS DE LAVADO<br>";
    $detalle .= "-------------------------------------------------------------------------------------------<br>";
    foreach($listaVehiculos as $vehiculo)
    {
        $detalle .= "-------------------------------------------------------------------------------------------<br>";
        $detalle .= "VEHICULO TIPO O MODELO : ". strtoupper($vehiculo)."<br>";
        foreach($valores[$vehiculo] as $key => $value)
        {
            $numero = (($key + 1) < 10)? "0".($key + 1) : ($key + 1);
            $detalle .= "<============= ".$vehiculo." ".$numero." =============> <br> - Lavado de Vehículo :".$value["lavado"]." <br> - Lavado Motor Superior :".$value["motorSuperior"]." <br> - Lavado Motor Inferior : ".$value["motorInferior"]." <br> - Ambas caras del motor : ".$value["motorAmbos"]." <br> - La revisión de todos los fluidos : ".$value["fluido"]."<br><br>";
        }
        $detalle .="<br>";
    }
   
     return $detalle;
}




// Datos del cliente
$NombreCliente = "villalobos";
// consumible de agua se puede modificar su valor para su funcionamiento
$ConsumibleAgua = 7;

// listado de requerimientos para la operacion llenando los campos del pedido
// loca campos lavado indica la cantidad de vehiculos asi como los demas
// si es un solo vehiculo con los servicios respectivos se marca 1 ejemplo
/**
 * una camioneta con lavado de motor solamente por ambas partes
 * TODOS LOS NUMEROS PUEDEN SER MODIFICADOS EN LOS ITEM - PERO NO SE DEBE ALTERAR EL ORDEN NI SACAR CLAVE DE LOS ARRAY
 * ADEMAS ESTA CONTEMPLADO SI LLEVAN POR EJEMPLO 10 CAMIONETAS 5 PARA LAVADO, 2 PARA LAVADO DE MOTOR 10 PARA LOS FLUIDOS
 *  
    "Camioneta" => array("lavado"       =>0 ,
                         "motorSuperior"=>0 ,
                         "motorInferior"=>0 ,
                         "motorAmbos"   =>1 ,
                         "fluido"       =>0 )
 * 
 */

$pedido = array(
    "Moto"       => array("lavado"      =>3 ,
                         "motorSuperior"=>0 ,
                         "motorInferior"=>0 ,
                         "motorAmbos"   =>0 ,
                         "fluido"       =>3 )
    ,
    "Automóvil" => array("lavado"       =>5 ,
                         "motorSuperior"=>0 ,
                         "motorInferior"=>0 ,
                         "motorAmbos"   =>0 ,
                         "fluido"       =>5 )
    ,
    "Camioneta" => array("lavado"       =>7 ,
                         "motorSuperior"=>0 ,
                         "motorInferior"=>7 ,
                         "motorAmbos"   =>0 ,
                         "fluido"       =>7 )
);



echo "==============================================================================================================================<br>";
echo "============================ EJERCICO DE COTIZACIÓN DE SERVICO LAVADO ====================================<br>";
echo "==============================================================================================================================<br>";
echo "<br>";

// Envio para cotizar lo solicitado por el cliente 
print_r(cotizacion($NombreCliente,$pedido));

echo "<br><br>";
echo "==============================================================================================================================<br>";
echo "============================ EJERCICO DE ESTATUS DEL PROCESO DE LAVADO====================================<br>";
echo "==============================================================================================================================<br>";
echo "<br>";
// proceso de la empresa para ejecutar pedidos
print_r(proceso($NombreCliente,$pedido,$ConsumibleAgua));


?>