<?php

namespace RefactoringGuru\FactoryMethod\Conceptual;

/**
    * La clase Creator declara el método de fábrica que se supone que devolverá un
  * objeto de una clase de Producto. Las subclases de Creator suelen proporcionar la
  * implementación de este método.
 */
abstract class Creator
{
    /**
* Tenga en cuenta que el Creador también puede proporcionar alguna implementación predeterminada del
      * método de fábrica.
     */
    abstract public function factoryMethod(): Product;

    /**
* También tenga en cuenta que, a pesar de su nombre, la responsabilidad principal del Creador es
      * no crear productos. Por lo general, contiene alguna lógica comercial central que
      * se basa en objetos de Producto, devueltos por el método de fábrica. Las subclases pueden
      * cambia indirectamente esa lógica de negocios anulando el método de fábrica
      * y devolver un tipo de producto diferente del mismo.
     */
    public function someOperation(): string
    {
        // Llame al método de fábrica para crear un objeto Producto.
        $product = $this->factoryMethod();
        // Ahora, usa el producto.
        $result = "Creador: El mismo código del creador acaba de trabajar con" .$product->operation();

        return $result;
    }
}

/**
* Concrete Creators anula el método de fábrica para cambiar el
  * tipo de producto resultante.
 */
class ConcreteCreator1 extends Creator
{
    /**
* Tenga en cuenta que la firma del método todavía usa el producto abstracto
      * tipo, a pesar de que el producto concreto se devuelve realmente desde el
      * método. De esta manera, el Creador puede permanecer independiente del producto concreto.
      * clases.
     */
    public function factoryMethod(): Product
    {
        return new ConcreteProduct1();
    }
}

class ConcreteCreator2 extends Creator
{
    public function factoryMethod(): Product
    {
        return new ConcreteProduct2();
    }
}

/**
* La interfaz Producto declara las operaciones que todos los productos concretos deben
  * implementar.
 */
interface Product
{
    public function operation(): string;
}

/**
 * Concrete Products proporciona varias implementaciones de la interfaz del Producto.
 */
class ConcreteProduct1 implements Product
{
    public function operation(): string
    {
        return "{Resutado trabajando con ConcreteProduct1}";
    }
}

class ConcreteProduct2 implements Product
{
    public function operation(): string
    {
        return "{Resutado trabajando con ConcreteProduct2}";
    }
}

/**
* El código del cliente funciona con una instancia de un creador concreto, aunque a través de
  * su interfaz base. Mientras el cliente siga trabajando con el creador a través de
  * la interfaz base, puede pasarla a la subclase de cualquier creador.
 */
function clientCode(Creator $creator)
{
    // ...
    echo "Cliente: no conozco la clase del creador, pero aún funciona.\n"
        . $creator->someOperation();
    // ...
}

/**
* La Aplicación elige el tipo de creador dependiendo de la configuración o
  * ambiente.
 */
echo "Aplicación: lanzada con ConcreteCreator1.\n";
clientCode(new ConcreteCreator1());
echo "\n\n";

echo "Aplicación: lanzada con ConcreteCreator2.\n";
clientCode(new ConcreteCreator2());