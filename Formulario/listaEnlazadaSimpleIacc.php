<?php

/* Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 5
 * Contenidos de la semana 5.
 * NOMBRE: Listas enlazadas.
 * IACC
 * ejemplo: Lista enlazada Lineal
 */


class Nodo {
    public $dato;
    public $siguiente;

    public function __construct($dato) {
        $this->dato = $dato;
        $this->siguiente = null;
    }
}

class ListaEnlazada {
    public $cabeza;

    public function __construct() {
        $this->cabeza = null;
    }

    public function agregarElemento($dato) {
        $nuevoNodo = new Nodo($dato);

        // Si la lista está vacía, el nuevo nodo se convierte en la cabeza
        if ($this->cabeza === null) {
            $this->cabeza = $nuevoNodo;
        } else {
            // Si la lista no está vacía, recorremos hasta el último nodo y lo enlazamos al nuevo nodo
            $actual = $this->cabeza;
            while ($actual->siguiente !== null) {
                $actual = $actual->siguiente;
            }
            $actual->siguiente = $nuevoNodo;
        }
    }

    public function mostrarLista() {
        $actual = $this->cabeza;
        while ($actual !== null) {
            echo $actual->dato . " ";
            $actual = $actual->siguiente;
        }
        echo "\n";
    }
}

// Crear una instancia de la lista enlazada
$lista = new ListaEnlazada();

// Agregar elementos a la lista
$lista->agregarElemento(5);
$lista->agregarElemento(10);
$lista->agregarElemento(15);
echo '<pre>';
var_dump($lista);
echo '</pre>';
// Mostrar la lista
$lista->mostrarLista();


?>