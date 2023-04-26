<?php

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
}

class dos{
    public function resta(inicio $init)
    {
        $init->restar(60);
        return $init->likes;
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

$dos = new dos();
echo $dos->resta($ini);
echo "<br>";
echo $dos->resta($ini);
echo "<br>";
