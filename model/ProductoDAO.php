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



        public static function deleteProductoById($id) {
            $conexion = Database::connect();
            $stmt = $conexion->prepare("DELETE FROM productos WHERE producto_id=?");
            $stmt->bind_param("i", $id);
        
            $stmt->execute();
        
            // No es necesario obtener el resultado después de la ejecución del DELETE
        
            // Puedes devolver un indicador de éxito o algún otro valor si lo necesitas
            return $stmt->affected_rows > 0; // Devuelve true si se eliminó al menos una fila, indicando éxito
        }

        public static function insertProducto($producto) {
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

        public static function updateProducto($id) {
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
?>