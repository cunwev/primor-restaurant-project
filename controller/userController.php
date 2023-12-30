<?php
session_start();
include_once 'model/UsuarioDAO.php';
class UserController {
    public function login(){  
        include_once 'views/panelLogin.php';
    }

    public function loginProcess(){
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];
        UsuarioDAO::getUserLogin($usuario,$pass);
    }
/*
    public function register(){
        include_once 'views/panelRegister.php';
    }
*/

    public function logoutProcess(){
        session_start();
        session_destroy();
        header("Location:".url);
    }



    public function goAdmin() {
        // Obtener el usuario de la sesión
        $currentUser = unserialize($_SESSION['user']);
    
        // Verificar si el usuario es administrador
        if ($currentUser instanceof UsuarioAdmin) {
            $allProducts = ProductoDAO::getAllProducts();
            include_once 'views/panelAdmin.php';
        } elseif ($currentUser instanceof Usuario) {
            echo "Acceso no autorizado para usuarios estándar";
            exit;
        } else {
            echo "Objeto/tipo de usuario no reconocido";
        }
    }



    public function mostrarUltimoPedido(){
        // Obtén el valor de la cookie antes de eliminarla
        $ultimoPedido = isset($_COOKIE[$_SESSION['iduser']]) ? $_COOKIE[$_SESSION['iduser']] : 'N/A';
    
        // Establecer la cookie con tiempo de expiración en el pasado (eliminación)
        setcookie($_SESSION['iduser'], '', time()-3600);
        unset($_COOKIE[$_SESSION['iduser']]);
    
        // Muestra el mensaje del último pedido después de establecer la cookie
        echo 'Tu último pedido fue de '.$ultimoPedido.' €';
    }
}

?>