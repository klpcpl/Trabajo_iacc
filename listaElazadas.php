<?php

class Nodo {
    public $valor;
    public $siguiente;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->siguiente = null;
    }
}

class ListaEnlazada {
    public $cabeza;

    public function __construct() {
        $this->cabeza = null;
    }

    public function agregar($valor) {
        $nuevoNodo = new Nodo($valor);

        if ($this->cabeza === null) {
            $this->cabeza = $nuevoNodo;
        } else {
            $nodoActual = $this->cabeza;
            while ($nodoActual->siguiente !== null) {
                $nodoActual = $nodoActual->siguiente;
            }
            $nodoActual->siguiente = $nuevoNodo;
        }
    }

    public function imprimir() {
        $nodoActual = $this->cabeza;
        while ($nodoActual !== null) {
            echo $nodoActual->valor . " ";
            $nodoActual = $nodoActual->siguiente;
        }
        echo "\n";
    }
}

// Ejemplo de uso
$lista = new ListaEnlazada();
$lista->agregar(1);
$lista->agregar(2);
$lista->agregar(3);
$lista->imprimir();

?>
