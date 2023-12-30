<?php

include_once 'config/database.php';
include_once 'Usuario.php';

class UsuarioDAO {

    public static function getUserLogin($usuario, $pass) {
        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM CLIENTES WHERE usuario=?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuarioObj = $result->fetch_object('Usuario');
        var_dump($usuarioObj);
        if (empty($usuarioObj)) {
            return 2;
        } else {
            $clienteid = $usuarioObj->getClienteId();

            $stmt = $conn->prepare("SELECT * FROM CREDENCIALES WHERE cliente_id=?");
            $stmt->bind_param("i", $clienteid);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                return 2;
            } else {
                $stmt = $conn->prepare("SELECT * FROM CLIENTES WHERE cliente_id=? AND permisos_admin=0");
                $stmt->bind_param("i", $clienteid);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
                if ($result->num_rows === 0) {
                    $usuarioObj = new UsuarioAdmin();
                    $usuarioObj->setClienteId($row['cliente_id']);
                    $usuarioObj->setUsuario($row['usuario']);
                    // Configurar las demás propiedades específicas de UsuarioAdmin
                    $usuarioObj->setEmail($row['email']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setNombre($row['nombre']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setApellidos($row['apellidos']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setDireccion($row['direccion']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setTelefono($row['telefono']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setPermisos_admin($row['permisos_admin']);
                    $_SESSION['user'] = serialize($usuarioObj);
                } else {
                    // Si no es administrador, crear una instancia de Usuario estándar
                    $usuarioObj = new Usuario();
                    $usuarioObj->setClienteId($row['cliente_id']);
                    $usuarioObj->setUsuario($row['usuario']);
                    // Configurar las demás propiedades específicas de Usuario
                    $usuarioObj->setEmail($row['email']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setNombre($row['nombre']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setApellidos($row['apellidos']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setDireccion($row['direccion']); // Ejemplo: ajustar según tus propiedades reales
                    $usuarioObj->setTelefono($row['telefono']); // Ejemplo: ajustar según tus propiedades reales
                    $_SESSION['user'] = serialize($usuarioObj);
                }
                
                $_SESSION['iduser'] = $usuarioObj->getClienteId();
                
                // Redirigir según el tipo de usuario
                if ($row['permisos_admin'] === "1") {
                    header('Location:'.url.'?controller=user&action=goAdmin');
                } else {
                    header('Location:'.url.'?controller=user&action=login');
                    var_dump($row['permisos_admin']);
                }
                
                return 3;
            }
        }
    }
}

?>