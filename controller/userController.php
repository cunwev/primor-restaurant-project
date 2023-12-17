<?php
include_once 'model/UsuarioDAO.php';
class UserController {
    public function login(){  
        session_start();
        include_once 'views/panelLogin.php';
    }

    public function loginProcess(){
        session_start();
        $usuario = $_POST['user'];
        $pass = $_POST['pass'];
        UsuarioDAO::getUserLogin($usuario,$pass);
    }
/*
    public function register(){
        include_once 'views/panelRegister.php';
    }
*/

    public function userData(){
        session_start();
        $userObj = unserialize($_SESSION['user']);
        $usuario = $userObj->getUsuario();
        $email = $userObj->getEmail();
        $nombre = $userObj->getNombre();
        $apellidos = $userObj->getApellidos();
        $direccion = $userObj->getDireccion();
        $telefono = $userObj->getTelefono();
        include_once 'views/panelLogin.php';
    }

    public function logoutProcess(){
        session_start();
        session_destroy();
        header("Location:".url);
    }

    public function goAdmin(){
        $allProducts = ProductoDAO::getAllProducts();
        include_once 'views/panelAdmin.php';
    }
}