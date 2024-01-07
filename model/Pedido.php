<?php
class Pedido
{
    protected $producto;
    protected $cantidad = 1;
    public $categoria;

    // public function __construct($producto){
    //     $this->producto = $producto;
    // }
    public function __construct($producto)
    {
        $this->producto = $producto;
        $this->categoria = $producto->getNombreCategoria();
    }

    /*Get the value of producto*/
    public function getProducto()
    {
        return $this->producto;
    }


    /*Set the value of producto*/
    public function setProducto($producto): self
    {
        $this->producto = $producto;

        return $this;
    }


    /*Get the value of cantidad*/
    public function getCantidad()
    {
        return $this->cantidad;
    }


    /*Set the value of cantidad*/
    public function setCantidad($cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    // Método para aumentar la cantidad
    public function aumentarCantidad()
    {
        $this->cantidad++;
    }


    // Método para establecer la categoría
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    // Método para obtener la categoria
    public function getCategoria()
    {
        return $this->categoria;
    }
}
?>