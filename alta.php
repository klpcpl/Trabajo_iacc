<?php

function string($string, $callback){
    $result = array(
        'alta' => strtoupper($string),
        'baja' => strtolower($string)
    );

    if(is_callable($callback)){
        call_user_func($callback,$result);
    }
}

string('memo', function($nombre){
    print_r($nombre);
});





class memo{
    public $likes = 0;

    function __construct($l)
    {
        $this->likes = $l;
    }
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
    public function suma(memo $init, $valor ,$callback)
    {
       $init->sumar($valor);
       $result = $init->likes;

       if(is_callable($callback)){
            call_user_func($callback,$result);
       }

    }

    public function resta(memo $init, $valor ,$callback)
    {
       if(is_callable($callback)){
            $init->restar($valor);
            $result = $init->likes;
            call_user_func($callback,$result);
       }

    }

    static public function lloco($dato)
    {
        $info = func_get_args($dato);
        print_r($info);
    }
}



$new = new memo(300);
$valor = 200;

$dos = new uno();
$dos->suma($new ,$valor , function($resultado){
    print_r($resultado);
});

$valor = 400;
$dos->resta($new ,$valor , function($resultado){
    print_r($resultado);
});

$dato = [2,4,5,6,7,8,9];
// call_user_func(["uno","lloco"]);
// call_user_func('uno::lloco');
call_user_func_array([$dos,'lloco'],$dato);
call_user_func_array('uno::lloco',$dato);


?>