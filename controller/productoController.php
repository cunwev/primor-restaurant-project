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

        public function eliminarProducto(){
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
            //Te almacena el pedido en la base de datos, PedidoDAO que guarda el pedido en BBDD
            
            //Guardo la COOKIE
            var_dump($_POST['precioFinal']);
            setcookie('UltimoPedidoCOOKIE',$_POST['precioFinal'],time()+3600);
            }
    }

?>