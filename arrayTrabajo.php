<?php

function sacado(){


    ob_start(); // capturamos todos los valores en el buffer
    
    $ramo1      = array(80, 20, 69,71, 100, 98, 79, 100, 99, 88);
    $ramo2      = array(9, 24, 100, 89,76, 100, 88, 99,100, 100);
    $ramo3      = array(100, 100, 89, 91,99, 100,77, 88, 100, 100);
    $alumnos    = array(); //Nombre alumnos
    $notasFinal = array(); // promedio alumnos
    
    // Agregamos los alumons y las notas promediadas
    
    
    for($data = 0; $data < sizeof($ramo1); $data++)
    {
        $alumnos[] = "Alumno_".($data + 1);
        $notasFinal[] = ceil(($ramo1[$data] + $ramo2[$data] + $ramo3[$data])/3);
    }
    
    $dato = "";
    // ordenamos lista y lo pasamos a un valor
    arsort($notasFinal);
    
    foreach($notasFinal as $key => $value)
    {
        $dato .= "El <strong>".$alumnos[$key]."</strong> tiene las siguientes notas:<br>
                Nota 1: ".$ramo1[$key]." <br> Nota 2: ".$ramo2[$key]." <br> Nota 3: ".$ramo3[$key]."<br>
                Obtiene el promedio de : <strong>".$value."</strong><br><br>";
    
    }
    // hago impresion temportal en la pagina
    echo $dato; 
    $info = ob_get_clean(); //obtengo la información y lo paso buffer varible
    ob_end_clean(); // termino de cualquier residuo del buffer
    return  $info; // devuelvo todos los datos
}


// obtengo los valores de la función
$result = sacado();

echo "<h2>El promedio de los Alumnos </h2>";
echo "<h3>El programa muestra como resultado el promedio <br>de las notas por estudiante y luego
son ordenadas de <br> forma descendente. <br>";
echo "El promedio sacado se aproximará</h3>";

echo $result;








// 
?>