<?php


/* Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 6
 * Contenidos de la semana 6.
 * NOMBRE: Listas Doblemente enlazadas.
 * IACC
 * ejemplo: Lista Doblemente enlazada
 */


class Node {
    public $data;
    public $prev;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->prev = null;
        $this->next = null;
    }
}

class DoblementeEnlazada {
    private $head;
    private $tail;

    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    public function agregarFinal($data) {
        $newNode = new Node($data);
        if ($this->tail === null) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }

    public function insertarEntre($prevData, $data) {
        $newNode = new Node($data);
        $current = $this->head;
        while ($current !== null) {
            if ($current->data === $prevData) {
                $newNode->prev = $current;
                $newNode->next = $current->next;
                if ($current->next !== null) {
                    $current->next->prev = $newNode;
                } else {
                    $this->tail = $newNode;
                }
                $current->next = $newNode;
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function borrarNodo($data) {
        $current = $this->head;
        while ($current !== null) {
            if ($current->data === $data) {
                if ($current->prev !== null) {
                    $current->prev->next = $current->next;
                } else {
                    $this->head = $current->next;
                }
                if ($current->next !== null) {
                    $current->next->prev = $current->prev;
                } else {
                    $this->tail = $current->prev;
                }
                unset($current);
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function salidaFinal() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->data . " ";
            $current = $current->next;
        }
        echo PHP_EOL;
    }
}

// Ejemplo de uso:

$list = new DoblementeEnlazada();
$list->agregarFinal(12); // se ingresa el 12
$list->agregarFinal(57); // se ingresa el 57
$list->agregarFinal(95); // se ingresa el 95

$list->insertarEntre(12, 20); // Agregar el nodo 20 después del 12
$list->borrarNodo(57); // Eliminar el nodo con el valor 57
$list->salidaFinal(); // Salida: 12 20 95
