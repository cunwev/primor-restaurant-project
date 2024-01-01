<?php

include_once 'model/ProductoDAO.php';
include_once 'model/Pedido.php';

class ProductoController{

    public function carta(){
        $allProducts = ProductoDAO::getAllProducts();
        include_once 'views/panelProductos.php';
    }

    public function index(){
        $allProducts = ProductoDAO::getAllProducts();
        // Panel index
        include_once 'views/panelIndex.php';
    }

    public function agregarProducto(){
        // Validar que se haya enviado un ID de producto
        if (!isset($_POST['id'])) {
            // Manejar el error o redirigir a una página de error
            echo "Error: ID de producto no proporcionado";
            exit;
        }
    
        $productoId = $_POST['id'];
    
        // Inicializar $_SESSION['addproducto'] si aún no existe
        if (!isset($_SESSION['addproducto'])) {
            $_SESSION['addproducto'] = array();
        }
    
        // Verificar si el producto ya está en el carrito
        $encontrado = false;
        foreach ($_SESSION['addproducto'] as $carrito) {
            if ($carrito->getProducto()->getproducto_id() == $productoId) {
                // Producto encontrado en el carrito, aumentar la cantidad
                $carrito->aumentarCantidad();
                $encontrado = true;
                break;
            }
        }
    
        // Si el producto no estaba en el carrito, agregarlo
        if (!$encontrado) {
            // Obtener el producto desde la base de datos
            $producto = ProductoDAO::getProductID($productoId);
    
            if ($producto) {
                // Especificar la cantidad inicial (puedes ajustar esto según tus necesidades)
                $cantidadInicial = 1;
    
                // Crear un nuevo Pedido con el producto y la cantidad inicial
                $carrito = new Pedido($producto, $cantidadInicial);
    
                // Agregar la categoría al Pedido
                $carrito->setCategoria($_POST['categoria']);
    
                // Agregar el Pedido al carrito
                $_SESSION['addproducto'][] = $carrito;
            } else {
                // Manejar el caso en que el producto no se pudo obtener
                echo "Error: No se pudo obtener el producto desde la base de datos";
                exit;
            }
        }
    
        $this->carta();
    }
    
    


    // CUIDADO - ELIMINA EL PRODUCTO DE LA BASE DE DATOS
    public function deleteProducto(){
        if (isset($_POST['btn_delete'])) {
            $producto_id = $_POST['btn_delete'];
            
            // Obtén el producto antes de eliminarlo
            $productoEliminado = ProductoDAO::getProductID($producto_id);
            
            // Elimina el producto por ID
            $exito = ProductoDAO::deleteProductoById($producto_id);
            
            if ($exito) {
                // La eliminación fue exitosa, ahora puedes trabajar con $productoEliminado si es necesario
                echo "Producto eliminado correctamente";
                header('Location:' . url . '?controller=user&action=goAdmin');
            } else {
                // Hubo un problema con la eliminación
                echo "Error al eliminar el producto";
            }
        }
    }


    // CUIDADO - INSERTA UN PRODUCTO DE LA BASE DE DATOS
    public function insertProducto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_insert'])) {
            // Obtén los valores del formulario
            $nombre = $_POST['nombre'];
            $stock = $_POST['stock'];
            $categoria_id = $_POST['categoria_id'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];
            
            // Crea un nuevo objeto Producto con los datos del formulario
            $nuevoProducto = new Producto($nombre, $stock, $categoria_id, $precio, $imagen);
            
            // Inserta el producto en la base de datos
            $exito = ProductoDAO::insertProducto($nuevoProducto);
            
            if ($exito) {
                echo "Producto insertado correctamente";
                header('Location:' . url . '?controller=user&action=goAdmin');
            } else {
                echo "Error al insertar el producto";
            }
        }
    }


    // CUIDADO - MODIFICA UN PRODUCTO DE LA BASE DE DATOS
    public function updateProducto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])) {
            // Obtén el ID del producto desde el formulario
            $producto_id = $_POST['producto_id'];
            
            // Obtén los valores actualizados del formulario
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_POST['imagen'];
            $categoria_id = $_POST['categoria_id'];
            
            // Crea un nuevo objeto Producto con los datos actualizados
            $productoActualizado = new Producto($nombre, $stock, $categoria_id, $precio, $imagen);
            
            // Actualiza el producto en la base de datos
            $exito = ProductoDAO::updateProducto($producto_id, $productoActualizado);
            
            if ($exito) {
                echo "Producto actualizado correctamente";
                header('Location:' . url . '?controller=user&action=goAdmin');
            } else {
                echo "Error al actualizar el producto";
            }
        }
    }
}
