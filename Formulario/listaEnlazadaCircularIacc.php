<?php 

/* Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 5
 * Contenidos de la semana 5.
 * NOMBRE: Listas enlazadas.
 * IACC
 * ejemplo: Lista enlazada Circular
 */

// El método mostrarLista() recorre la lista enlazada circular y muestra los valores de cada nodo en la consola. Se recorre la lista hasta volver al primer nodo para evitar un bucle infinito.

class Nodo {
    public $dato;
    public $siguiente;

    public function __construct($dato) {
        $this->dato = $dato;
        $this->siguiente = null;
    }
}

class ListaEnlazadaCircular {
    public $cabeza;

    public function __construct() {
        $this->cabeza = null;
    }

    public function agregarElemento($dato) {
        $nuevoNodo = new Nodo($dato);

        // Si la lista está vacía, el nuevo nodo se convierte en la cabeza y se enlaza a sí mismo
        if ($this->cabeza === null) {
            $this->cabeza = $nuevoNodo;
            $nuevoNodo->siguiente = $nuevoNodo;
        } else {
            // Si la lista no está vacía, se enlaza el nuevo nodo al siguiente de la cabeza
            $nuevoNodo->siguiente = $this->cabeza->siguiente;
            $this->cabeza->siguiente = $nuevoNodo;
        }
    }

    public function mostrarLista() {
        if ($this->cabeza !== null) {
            $actual = $this->cabeza;

            // Se recorre la lista hasta volver al primer nodo
            do {
                echo $actual->dato . " ";
                $actual = $actual->siguiente;
            } while ($actual !== $this->cabeza);
        }
        echo "\n";
    }
}

// Crear una instancia de la lista enlazada circular
$lista = new ListaEnlazadaCircular();

// Agregar elementos a la lista
$lista->agregarElemento(5);
$lista->agregarElemento(10);
$lista->agregarElemento(15);

// Mostrar la lista
$lista->mostrarLista();




?>