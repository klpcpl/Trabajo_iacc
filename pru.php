<?php
// el nombre tiene que estar toda en baja sino lanza un error
// la variable tiene espacio
$varNombre = "  Guillermo Ulloa  ";

// primero se quitan los espacios vacios o que no tengan texto
$varNombre = trim($varNombre);

// aca lo comparo para que sea el nombre todas en bajas
// como el nombre tiene mayuscula me va a salir error la idea
// es que el nombre lo tienen que ponder como sale la descripción
if($varNombre !== strtolower($varNombre)){
    echo "Lo sentimos tiene que ponder el nombre toda en baja";
}else{
    echo "Felicidades esta correcto";
}

































// session_start();



// // hola mundo para mostrar modificación a mi hija
// class inicio{
//     public $likes = 0;

//     function __construct($l)
//     {
//         $this->likes = $l;
//     }

//     public function sumar($r)
//     {
//         $this->likes = $this->likes + $r;
//     }
//     public function restar($r)
//     {
//         $this->likes = $this->likes - $r;
//     }
// }





// class uno{
//     public function suma(inicio $init)
//     {
//         $init->sumar(10);
//         $_SESSION['valor'] = $init->likes;
//         return;
//     }
//     // public function __invoke()
//     // {

//     //     $uno = new uno();
//     //     $reflector = new ReflectionClass($uno);
//     //     //  var_dump($reflector->getMethods());
//     // }
// }

// class dos{
//     public function resta(inicio $init)
//     {
//         $init->restar(60);
//         return $init->likes;
        
//     }
//     public function __invoke()
//     {

//         $dos = new dos();
//         $reflector = new ReflectionClass($dos);
//          var_dump($reflector->getMethods());
//     }

//     public function __call($name, $arguments)
//     {
//         echo "esto es un error no existe el argumento".$name;

//     }
    
// }

// $_SESSION['valor'] = 100;
// $new = new inicio($_SESSION['valor']);

// $destino = new uno();
// $res = $destino->suma($new);

// print_r($_SESSION['valor']) ;




