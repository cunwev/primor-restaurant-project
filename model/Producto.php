<?php

class Producto
{
  private $producto_id;
  private $nombre;
  private $precio;
  private $stock;
  private $imagen;
  private $categoria_id;
  public $nombre_categoria;


  // Define the constructor of the class
  public function __construct()
  {
  }


  /**
   * Get the value of producto_producto_id
   */
  public function getproducto_id()
  {
    return $this->producto_id;
  }


  /**
   * Set the value of producto_id
   */
  public function setproducto_id($producto_id): self
  {
    $this->producto_id = $producto_id;

    return $this;
  }


  /**
   * Get the value of nombre
   */
  public function getnombre()
  {
    return $this->nombre;
  }


  /**
   * Set the value of nombre
   */
  public function setnombre($nombre): self
  {
    $this->nombre = $nombre;

    return $this;
  }


  /**
   * Get the value of precio
   */
  public function getprecio()
  {
    return $this->precio;
  }


  /**
   * Set the value of precio
   */
  public function setprecio($precio): self
  {
    $this->precio = $precio;

    return $this;
  }


  /**
   * Get the value of stock
   */
  public function getStock()
  {
    return $this->stock;
  }


  /**
   * Set the value of stock
   */
  public function setStock($stock): self
  {
    $this->stock = $stock;

    return $this;
  }


  /**
   * Get the value of imagen
   */
  public function getimagen()
  {
    return $this->imagen;
  }


  /**
   * Set the value of imagen
   */
  public function setimagen($imagen): self
  {
    $this->imagen = $imagen;

    return $this;
  }


  /**
   * Get the value of categoria_id
   */
  public function getcategoria_id()
  {
    return $this->categoria_id;
  }


  /**
   * Set the value of imagen
   */
  public function setcategoria_id($categoria_id): self
  {
    $this->categoria_id = $categoria_id;

    return $this;
  }

  /**
   * Obtener el valor de nombre_categoria
   */
  public function getNombreCategoria()
  {
    return $this->nombre_categoria;
  }

  /**
   * Establecer el valor de nombre_categoria
   */
  public function setNombreCategoria($nombre_categoria): self
  {
    $this->nombre_categoria = $nombre_categoria;

    return $this;
  }
}
?>