<?php

    include_once 'model/ProductoDAO.php';
    include_once 'model/Pedido.php';

    class CestaController{
        public function cesta(){
            // Panel cesta
            
            include_once 'views/panelCarrito.php';
        }

        // public function carrito(){
        //     session_start();
        //     // Panel carrito
        //     include_once 'views/panelCarrito.php';
        // }
        

        public function eliminarProductoCesta(){
            

            unset($_SESSION['addproducto'][$_POST['btn_borrar']]);
            $_SESSION['addproducto']= array_values($_SESSION['addproducto']);

            $this->cesta();
        }


        public function cantidadProducto(){
            
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

        public function finalizar(){
            
            $userObj = unserialize($_SESSION['user']);
            $email = $userObj->getEmail();
            $precioFinal = $_POST['precioFinal'];
            
            // Establece la cookie
            setcookie($_SESSION['iduser'], $precioFinal, time() + 3600);
        var_dump($_COOKIE[$_SESSION['iduser']]);
            // Imprime o manipula el valor directamente

        }
    }

?>