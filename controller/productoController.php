<?php

    include_once 'model/ProductoDAO.php';
    include_once 'model/Pedido.php';

    class ProductoController{
        public function carta(){
            $allProducts = ProductoDAO::getAllProducts();
            include_once 'views/panelProductos.php';
        }

        public function index(){
            // Panel index
            include_once 'views/panelIndex.php';
        }



        public function cesta(){
            // Panel login
            include_once 'views/panelCarrito.php';
        }


        public function agregarProducto(){
            session_start();
            if(!isset($_SESSION['addproducto'])){
                $_SESSION['addproducto']= array();
                $carrito = new Pedido(ProductoDAO::getProductID($_POST['id']));
                array_push($_SESSION['addproducto'],$carrito);
            }else{
                $carrito = new Pedido(ProductoDAO::getProductID($_POST['id']));
                array_push($_SESSION['addproducto'],$carrito);
            }

            $this->carta();
        }

        public function eliminarProductoCesta(){
            session_start();

            unset($_SESSION['addproducto'][$_POST['btn_borrar']]);
            $_SESSION['addproducto']= array_values($_SESSION['addproducto']);

            $this->cesta();
        }


        public function cantidadProducto(){
            session_start();
            if (isset($_POST['btn_suma'])) {
                $pedido = $_SESSION['addproducto'][$_POST['btn_suma']];
                $pedido->setCantidad($pedido->getCantidad()+1);
            }elseif(isset($_POST['btn_resta'])){
                $pedido = $_SESSION['addproducto'][$_POST['btn_resta']];
                if ($pedido->getCantidad()==1){
                    unset($_SESSION['addproducto'][$_POST['btn_resta']]);

                    //se reindexa el array
                    $_SESSION['addproducto']=array_values($_SESSION['addproducto']);
                }else {
                    $pedido->setCantidad($pedido->getCantidad()-1);
                }
            }

            $this->cesta();

        }


        public function carrito(){
            session_start();
            // Panel carrito
            include_once 'views/panelCarrito.php';
        }




        public function finalizar(){
            session_start();
            $userObj = unserialize($_SESSION['user']);
            $email = $userObj->getEmail();
            $precioFinal = $_POST['precioFinal'];
            
            // Establece la cookie
            setcookie($email, $precioFinal, time() + 3600);
        
            // Imprime o manipula el valor directamente
            $cookie = $_COOKIE[$email];
            echo $cookie;
        }






        
        public function deleteProducto() {
            if (isset($_POST['btn_delete'])) {
                $producto_id = $_POST['btn_delete'];
    
                // Obtén el producto antes de eliminarlo
                $productoEliminado = ProductoDAO::getProductID($producto_id);
    
                // Elimina el producto por ID
                $exito = ProductoDAO::deleteProductoById($producto_id);
    
                if ($exito) {
                    // La eliminación fue exitosa, ahora puedes trabajar con $productoEliminado si es necesario
                    echo "Producto eliminado correctamente";
                    header('Location:'.url.'?controller=user&action=goAdmin');
                } else {
                    // Hubo un problema con la eliminación
                    echo "Error al eliminar el producto";
                }
            }
        }

        public function insertProducto() {
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
                    header('Location:'.url.'?controller=user&action=goAdmin');
                } else {
                    echo "Error al insertar el producto";
                }
            }
        }


        public function updateProducto() {
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
                    header('Location:'.url.'?controller=user&action=goAdmin');
                } else {
                    echo "Error al actualizar el producto";
                }
            }
        }
    }

?>