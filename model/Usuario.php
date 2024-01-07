<?php

class Usuario
{
    private $user_id;
    private $usuario;
    private $email;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;

    public function __construct()
    {
    }


    /**
     * Get the value of user_id
     */
    public function getClienteId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setClienteId($user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }


    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }


    /**
     * Set the value of usuario
     */
    public function setUsuario($usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }


    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }


    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }


    /**
     * Set the value of apellidos
     */
    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }


    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }


    /**
     * Set the value of direccion
     */
    public function setDireccion($direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }


    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }


    /**
     * Set the value of telefono
     */
    public function setTelefono($telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }
}


class UsuarioAdmin extends Usuario
{
    private $permisos_admin;

    public function __construct()
    {
        parent::__construct(); // Llama al constructor de la clase padre
    }


    /**
     * Get the value of admin
     */
    public function getPermisos_admin()
    {
        return $this->permisos_admin;
    }


    /**
     * Set the value of admin
     */
    public function setPermisos_admin($permisos_admin): self
    {
        $this->permisos_admin = $permisos_admin;

        return $this;
    }
}
?>