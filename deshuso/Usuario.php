<?php
class Usuario {
    public $id_cliente;
    public $usuario;
    public $password;

    public function __construct($id_cliente, $usuario, $password) {
        $this->id_cliente = $id_cliente;
        $this->usuario = $usuario;
        $this->password = $password;
    }
}
?>