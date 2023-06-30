<?php


/**
 * Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 4
 * Contenidos de la semana 4.
 * NOMBRE: COLA.
 * IACC
 */


class Impresora {
    private $colaImpresion;

    public function __construct() {
        $this->colaImpresion = [];
    }

    public function agregarDocumento($documento) {
        array_push($this->colaImpresion, $documento);
        echo "El documento '$documento' ha sido agregado a la cola de impresión.<br>\n";
    }

    public function imprimirDocumento() {
        if (!empty($this->colaImpresion)) {
            $documento = array_shift($this->colaImpresion);
            echo "Imprimiendo el documento '$documento'...<br>\n";
        } else {
            echo "No hay documentos en la cola de impresión.<br>\n";
        }
    }

    public function obtenerEstadoCola() {
        echo "Estado de la cola de impresión:<br>\n";
        if (!empty($this->colaImpresion)) {
            foreach ($this->colaImpresion as $documento) {
                echo "- $documento<br>";
            }
        } else {
            echo "La cola de impresión está vacía.<br>\n";
        }
    }
}

// Crear una instancia de la impresora
$impresora = new Impresora();

// Agregar documentos a la cola de impresión
$impresora->agregarDocumento("Informe académico del alumno");
$impresora->agregarDocumento("Matrícula del alumno");
$impresora->agregarDocumento("Informe de clases realizadas");

// Imprimir un documento
$impresora->imprimirDocumento();
$impresora->imprimirDocumento();

// Obtener el estado de la cola
$impresora->obtenerEstadoCola();
