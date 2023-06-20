<?php 

/* Nombre Alumno: Guillermo Ulloa Ordenes
 * Trabajo: TAREA SEMANA 3
 * Contenidos de la semana 3.
 * NOMBRE: Pilas en programación.
 * IACC
 * Ejemplo: LLenado de pila con programación
 */

class PilaDeCartas {
    private $cartas;
    private $tamanoMaximo;
  
    public function __construct($tamanoMaximo) {
      $this->cartas = array();
      $this->tamanoMaximo = $tamanoMaximo;
    }

    public function agregarCarta($carta) {
        array_push($this->cartas, $carta);
      }
  
    public function estaLlena() {
        return count($this->cartas) === $this->tamanoMaximo;
    }
  
    // Resto de los métodos de la pila...
  }
  
  // Uso de la pila de cartas
  $pilaDeCartas = new PilaDeCartas(52);
  
  // aca agrego 80 cartas, pero deberia responder cuando llegue al 52 y dejar de agregar cartas
  for ($i = 1; $i <= 80; $i++) {
    if ($pilaDeCartas->estaLlena()) {
      echo "La pila de cartas está llena ya que llego al máximo de 52 y no puede ingresar más.";
      break;
    }
    
    $pilaDeCartas->agregarCarta("Carta $i");
  }

