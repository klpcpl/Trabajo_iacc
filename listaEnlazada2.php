<?php

class Nodo {
    public $tarea;
    public $siguiente;

    public function __construct($tarea) {
        $this->tarea = $tarea;
        $this->siguiente = null;
    }
}

class GestorTareas {
    private $cabeza;

    public function __construct() {
        $this->cabeza = null;
    }

    public function agregarTarea($tarea) {
        $nuevoNodo = new Nodo($tarea);

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

    public function imprimirTareas() {
        $nodoActual = $this->cabeza;
        if ($nodoActual === null) {
            echo "No hay tareas en la lista.\n";
        } else {
            echo "Lista de tareas:\n";
            $indice = 1;
            while ($nodoActual !== null) {
                echo $indice . ". " . $nodoActual->tarea . "\n";
                $nodoActual = $nodoActual->siguiente;
                $indice++;
            }
        }
    }


    public function obtenerTarea($indice) {
        $nodoActual = $this->cabeza;
        $posicion = 1;
        
        while ($nodoActual !== null) {
            if ($posicion === $indice) {
                return $nodoActual->tarea;
            }
            
            $nodoActual = $nodoActual->siguiente;
            $posicion++;
        }
        
        return null; // Si no se encuentra el índice especificado
    }
    
}

// Ejemplo de uso
$gestorTareas = new GestorTareas();
$gestorTareas->agregarTarea("Hacer la compra");
$gestorTareas->agregarTarea("Llamar al cliente");
$gestorTareas->agregarTarea("Enviar informe");
$gestorTareas->imprimirTareas();

$item2 = $gestorTareas->obtenerTarea(2);
echo "Item 2: " . $item2 . "\n";

?>
