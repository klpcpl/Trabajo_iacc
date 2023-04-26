<?php
// OPERACIONES CON ARREGLOS
$notas_1 = ARRAY(80, 20, 69, 71, 100, 98, 79, 100, 99, 88);
$notas_2 = ARRAY(9, 24, 100, 89,76, 100, 88, 99,100, 100);
$notas_3 = ARRAY(100, 100, 89, 91,99, 100,77, 88, 100, 100);

$total=0; $acumulador=0;
for($i=0; $i<=9; $i++)
	{
	$total=$notas_1[$i]+$notas_2[$i]+$notas_3[$i];
	$promedio=ceil($total/3);
	echo "promedio $i = ".$promedio."<br>";
	$acumulador=$acumulador+$promedio;
	}

	?>