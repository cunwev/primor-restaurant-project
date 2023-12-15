<?php
require_once 'controller/userController.php';
require_once 'model/Usuario.php';
require_once 'model/UsuarioDAO.php';
include_once 'views/panelLogin.php';
$userController = new UserController($conexion);

class UserController {
    private $usuarioDAO;

    public function __construct($conexion) {
        $this->usuarioDAO = new UsuarioDAO($conexion);
    }

    public function showLoginForm() {
        include 'views/panelLogin.php';
    }

    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $usuarioObj = $this->usuarioDAO->obtenerUsuarioPorCredenciales($usuario, $password);

            if ($usuarioObj) {
                // Usuario autenticado, realizar acciones adicionales si es necesario
                echo "¡Bienvenido, {$usuarioObj->usuario}!";
            } else {
                // Usuario no autenticado, manejar el error
                echo "Credenciales incorrectas. Intenta de nuevo.";
            }
        }
    }
}