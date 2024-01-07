<?php

include_once 'config/database.php';
include_once 'Producto.php';

class ProductoDAO
{

    public static function getAllProducts()
    {
        $conexion = Database::connect();
        $stmt = $conexion->query("SELECT p.*, c.nombre as nombre_categoria FROM productos p
        JOIN categorias c ON p.categoria_id = c.categoria_id");
        $productos = [];

        while ($obj = $stmt->fetch_object('Producto')) {
            // Setear el nombre de la categoría en el objeto Producto
            $obj->setNombreCategoria($obj->nombre_categoria);
            $productos[] = $obj;
        }

        return $productos;
    }

    public static function getProductID($id)
    {
        $conexion = Database::connect();
        $stmt = $conexion->prepare("SELECT * FROM productos WHERE producto_id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_object('Producto');
    }


    public static function deleteProductoById($id)
    {
        $conexion = Database::connect();
        $stmt = $conexion->prepare("DELETE FROM productos WHERE producto_id=?");
        $stmt->bind_param("i", $id);

        $stmt->execute();

        // Devuelve true si se eliminó al menos una fila, indicando éxito
        return $stmt->affected_rows > 0;
    }


    public static function insertProducto($producto)
    {
        $conexion = Database::connect();
        $nombre = $_POST['nombre'];
        $stock = $_POST['stock'];
        $categoria_id = $_POST['categoria_id'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];

        $stmt = $conexion->prepare("INSERT INTO productos (nombre, precio, stock, imagen, categoria_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siisi", $nombre, $precio, $stock, $imagen, $categoria_id); // siisi = String, Int, Int, String, Int

        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }


    public static function updateProducto($id)
    {
        $conexion = Database::connect();
        $nombre = $_POST['nombre'];
        $stock = $_POST['stock'];
        $categoria_id = $_POST['categoria_id'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];

        $stmt = $conexion->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ?, imagen = ?, categoria_id = ? WHERE producto_id = ?");
        $stmt->bind_param("siisii", $nombre, $precio, $stock, $imagen, $categoria_id, $id);

        $exito = $stmt->execute();
        $stmt->close();
        return $exito;
    }
}