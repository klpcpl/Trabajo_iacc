<?php

/* Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 3
 * Contenidos de la semana 3.
 * NOMBRE: Pilas en programación.
 * IACC
 * ejemplo: forma básica de representación de una Pila
 */

class PilaDeCartas {
    private $cartas;
  
    public function __construct() {
      $this->cartas = array();
    }
  
    public function estaVacia() {
      return empty($this->cartas);
    }
  
    public function agregarCarta($carta) {
      array_push($this->cartas, $carta);
    }
  
    public function quitarCarta() {
      if ($this->estaVacia()) {
        return null;
      }
      return array_pop($this->cartas);
    }
  
    public function obtenerCartaSuperior() {
      if ($this->estaVacia()) {
        return null;
      }
      return end($this->cartas);
    }
  }
  
  // Uso de la pila de cartas
  $pilaDeCartas = new PilaDeCartas();
  $pilaDeCartas->agregarCarta("Carta AS de Corazones");
  $pilaDeCartas->agregarCarta("Carta AS de Pica");
  $pilaDeCartas->agregarCarta("Carta AS de Trevol");
  $pilaDeCartas->agregarCarta("Carta AS de Diamantes");
  
 
  echo $pilaDeCartas->quitarCarta();  // Imprime: Carta Diamantes 
  echo "<br>\n";
  echo $pilaDeCartas->quitarCarta();  // Imprime: Carta Trevol
  echo "<br>\n";
  echo $pilaDeCartas->obtenerCartaSuperior();  // Imprime: Pica
  echo "<br>\n";
  echo $pilaDeCartas->quitarCarta();  // Imprime: Pica
  echo "<br>\n";
  echo $pilaDeCartas->quitarCarta();  // Imprime: Corazones
  echo "<br>\n";
  echo $pilaDeCartas->quitarCarta();  // Imprime: null (pila vacía)
  