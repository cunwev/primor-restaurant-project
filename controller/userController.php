<?php

session_start();
include_once 'model/UsuarioDAO.php';

class UserController
{
    // Función para el panel de login
    public function login()
    {
        include_once 'views/panelLogin.php';
    }

    // Función para pasar las variables necesarias a la hora de realizar el login
    public function loginProcess()
    {
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];
        UsuarioDAO::getUserLogin($usuario, $pass);
    }

    // Función para el proceso de logout, destruye la sesion y te manda de vuelta a la main page
    public function logoutProcess()
    {
        session_start();
        session_destroy();
        header("Location:" . url);
    }

    // Función para mostrar los datos de usuario (no debe funcionar si es admin)
    public function mostrarDatosUsuario()
    {
        $currentUser = unserialize($_SESSION['user']);
        if (!($currentUser instanceof UsuarioAdmin)) {
            echo '<div class="col-7 col-sm-4 p-3">';
            echo '<p>Nombre: ' . $currentUser->getNombre() . '</p>';
            echo '<p>Apellidos: ' . $currentUser->getApellidos() . '</p>';
            echo '<p>Email: ' . $currentUser->getEmail() . '</p>';
            echo '<p>Dirección: ' . $currentUser->getDireccion() . '</p>';
            echo '<p>Teléfono: ' . $currentUser->getTelefono() . '</p>';
            echo '</div>';
        }
    }


    // Función para mostrar el ultimo pedido en forma de cookie, una vez mostrado esta se destruye.
    public function mostrarUltimoPedido()
    {
        // Obtén el valor de la cookie antes de eliminarla
        $ultimoPedido = isset($_COOKIE[$_SESSION['iduser']]) ? $_COOKIE[$_SESSION['iduser']] : 'N/A';

        // Establecer la cookie con tiempo de expiración en el pasado (eliminación)
        setcookie($_SESSION['iduser'], '', time() - 3600);
        unset($_COOKIE[$_SESSION['iduser']]);

        // Muestra el mensaje del último pedido después de establecer la cookie
        echo '<p class="fw-semibold m-0 p-0">Tu último pedido fue de ' . $ultimoPedido . ' € <p>';
    }

    // Función para eliminar la cuenta
    public function eliminarCuenta()
    {
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

    // Función para acceder al panel de registro
    public function register()
    {
        include 'views/panelRegister.php';
    }

    // Función para registrar un usuario, es decir, crear una cuenta
    public function registrar()
    {
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
                header("Location:".url.'?controller=user&action=login');
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
?>