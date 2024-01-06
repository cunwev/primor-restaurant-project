<?php

session_start();
include_once 'model/UsuarioDAO.php';

class UserController{

    public function login(){
        include_once 'views/panelLogin.php';
    }


    public function loginProcess(){
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];
        UsuarioDAO::getUserLogin($usuario, $pass);
    }


    public function logoutProcess(){
        session_start();
        session_destroy();
        header("Location:" . url);
    }


    public function goAdmin(){
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
        setcookie($_SESSION['iduser'], '', time() - 3600);
        unset($_COOKIE[$_SESSION['iduser']]);
        
        // Muestra el mensaje del último pedido después de establecer la cookie
        echo 'Tu último pedido fue de ' . $ultimoPedido . ' €';
    }

    public function eliminarCuenta() {
        // Obtener el usuario de la sesión
        $currentUser = unserialize($_SESSION['user']);
    
        // Verificar si el usuario es válido
        if (!$currentUser instanceof Usuario) {
            echo "Objeto/tipo de usuario no válido";
            exit;
        }
    
        // Obtener el nombre de usuario del usuario
        $usuario_id = $currentUser->getClienteId();
    
        // Eliminar la cuenta del usuario de la base de datos
        UsuarioDAO::eliminarCuenta($usuario_id);
            // Cerrar la sesión después de eliminar la cuenta
            session_destroy();
            header("Location:" . url); // Puedes redirigir a donde quieras después de eliminar la cuenta
    }
    
    public function register() {
        include 'views/panelRegister.php';
    }

    public function registrar() {
        // Recibir los datos del formulario
        $usuario = $_POST['email'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        // Llamar al método para registrar usuario en la base de datos
        $resultado = UsuarioDAO::registrarUsuario($usuario, $password, $email, $nombre, $apellidos, $direccion, $telefono);

        // Verificar el resultado y tomar acciones
        switch ($resultado) {
            case 0:
                echo "Registro exitoso. Puedes iniciar sesión ahora.";
                break;
            case 1:
                echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
                break;
            case 2:
                echo "Error al registrar. Por favor, inténtalo de nuevo.";
                break;
            // Otros casos según tus necesidades
        }
    }
}
