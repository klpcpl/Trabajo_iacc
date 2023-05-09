<?php

// hola mundo para mostrar modificación a mi hija
class inicio{
    public $likes = 100;

    public function sumar($r)
    {
        $this->likes = $this->likes + $r;
    }
    public function restar($r)
    {
        $this->likes = $this->likes - $r;
    }
}


class uno{
    public function suma(inicio $init)
    {
        $init->sumar(10);
        return $init->likes;
    }
    public function __invoke()
    {

        $uno = new uno();
        $reflector = new ReflectionClass($uno);
         var_dump($reflector->getMethods());
    }
}

class dos{
    public function resta(inicio $init)
    {
        $init->restar(60);
        return $init->likes;
        
    }
    public function __invoke()
    {

        $dos = new dos();
        $reflector = new ReflectionClass($dos);
         var_dump($reflector->getMethods());
    }

    public function __call($name, $arguments)
    {
        echo "esto es un error no existe el argumento".$name;

    }
    
}

$ini = new inicio();

$uno = new uno();
echo $uno->suma($ini);
echo "<br>";
echo $uno->suma($ini);
echo "<br>";
echo $uno->suma($ini);

echo "<br>";
echo "<pre>";
$uno();
echo "</pre>";

$dos = new dos();
echo $dos->resta($ini);
echo "<br>";
echo $dos->resta($ini);
echo "<br>";
echo "<br>";
echo "<pre>";
$dos->error();
echo "</pre>";



















// class hola {

//     public function saludarA($nombre) {
//         return 'Hola ' . $nombre;
//     }

// }

// $meto = new ReflectionMethod('hola', 'saludarA');
// echo $meto->invoke(new hola(), 'Memosky');






