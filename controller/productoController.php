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
    
        // Verificar si el producto ya está en el cesta
        $encontrado = false;
        foreach ($_SESSION['addproducto'] as $cesta) {
            if ($cesta->getProducto()->getproducto_id() == $productoId) {
                // Producto encontrado en el cesta, aumentar la cantidad
                $cesta->aumentarCantidad();
                $encontrado = true;
                break;
            }
        }
    
        // Si el producto no estaba en el cesta, agregarlo
        if (!$encontrado) {
            // Obtener el producto desde la base de datos
            $producto = ProductoDAO::getProductID($productoId);
    
            if ($producto) {
                // Especificar la cantidad inicial (puedes ajustar esto según tus necesidades)
                $cantidadInicial = 1;
    
                // Crear un nuevo Pedido con el producto y la cantidad inicial
                $cesta = new Pedido($producto, $cantidadInicial);
    
                // Agregar la categoría al Pedido
                $cesta->setCategoria($_POST['categoria']);
    
                // Agregar el Pedido al cesta
                $_SESSION['addproducto'][] = $cesta;
            } else {
                // Manejar el caso en que el producto no se pudo obtener
                echo "Error: No se pudo obtener el producto desde la base de datos";
                exit;
            }
        }
    
        $this->carta();
    }
}
