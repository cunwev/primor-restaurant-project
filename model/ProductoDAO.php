<?php
include_once 'config/database.php';
include_once 'Producto.php';
class ProductoDAO {
    public static function getAllProducts() {
        $conexion = Database::connect();
        $stmt = $conexion->query("SELECT * FROM productos");
        /*("SELECT productos.producto_id,
        categorias.nombre AS producto_id, 
        productos.nombre, 
        productos.precio, 
        productos.stock, 
        productos.imagen 
        FROM productos JOIN categorias ON productos.producto_id = categorias.categoria_id;");*/
        $productos = [];

        while ($obj = $stmt->fetch_object('Producto')) {
            $productos[] = $obj;
        }

        return $productos;
    }

    public static function getProductID($id) {
        $conexion = Database::connect();
        $stmt = $conexion->prepare("SELECT * FROM productos WHERE producto_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $resultado=$stmt->get_result();

        return $resultado->fetch_object('Producto');
    }
}
?>