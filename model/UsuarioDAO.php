<?php

include_once 'config/database.php';
include_once 'Usuario.php';

class UsuarioDAO
{

    public static function getUserLogin($usuario, $pass)
    {
        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE usuario=?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuarioObj = $result->fetch_object('Usuario');

        if (empty($usuarioObj)) {
            header('Location:' . url . '?controller=user&action=login');
            return 2;
        } else {
            $clienteid = $usuarioObj->getClienteId();

            $stmt = $conn->prepare("SELECT * FROM CREDENCIALES WHERE user_id=?");
            $stmt->bind_param("i", $clienteid);
            $stmt->execute();
            $resultCredenciales = $stmt->get_result();

            if ($resultCredenciales->num_rows === 0) {
                return 2; // Credenciales no encontradas
            } else {
                $credenciales = $resultCredenciales->fetch_assoc();
                $storedPasswordHash = $credenciales['password'];

                // Verificar el hash de la contraseña
                if (password_verify($pass, $storedPasswordHash)) {
                    $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE user_id=? AND permisos_admin=0");
                    $stmt->bind_param("i", $clienteid);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    if ($result->num_rows === 0) {
                        $usuarioObj = new UsuarioAdmin();
                        // Configurar las demás propiedades específicas de UsuarioAdmin
                        $usuarioObj->setPermisos_admin($row['permisos_admin']);
                    } else {
                        // Si no es administrador, crear una instancia de Usuario estándar
                        $usuarioObj = new Usuario();
                    }

                    // Configurar el resto de las propiedades comunes
                    $usuarioObj->setClienteId($row['user_id']);
                    $usuarioObj->setUsuario($row['usuario']);
                    $usuarioObj->setEmail($row['email']);
                    $usuarioObj->setNombre($row['nombre']);
                    $usuarioObj->setApellidos($row['apellidos']);
                    $usuarioObj->setDireccion($row['direccion']);
                    $usuarioObj->setTelefono($row['telefono']);

                    $_SESSION['user'] = serialize($usuarioObj);
                    $_SESSION['iduser'] = $usuarioObj->getClienteId();

                    // Redirigir según el tipo de usuario, se deja asi por defecto
                    if ($usuarioObj instanceof UsuarioAdmin) {
                        header('Location:' . url . '?controller=user&action=login');
                    } else {
                        header('Location:' . url . '?controller=user&action=login');
                    }

                    return 3; // Inicio de sesión exitoso
                } else {
                    // Contraseña incorrecta
                    header('Location:' . url . '?controller=user&action=login');
                    return 4;
                }
            }
        }
    }

    // CUIDADO - Elimina una cuenta de la BBDD segun el user_id (excepto administradores)
    public static function eliminarCuenta($usuario_id)
    {
        // Obtener la conexión a la base de datos (ajusta según tu implementación)
        $conn = database::connect();

        // Verificar si el usuario existe antes de eliminar la cuenta
        $query = "DELETE FROM USUARIOS WHERE user_id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
    }

    // Método para registrar un nuevo usuario en la base de datos
    public static function registrarUsuario($usuario, $password, $email, $nombre, $apellidos, $direccion, $telefono)
    {
        $conn = database::connect();

        // Verificar si el usuario ya existe
        $stmt = $conn->prepare("SELECT * FROM USUARIOS WHERE usuario=?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return 1; // Usuario ya existe
        }

        // Insertar nuevo usuario en USUARIOS
        $stmt = $conn->prepare("INSERT INTO USUARIOS (usuario, email, nombre, apellidos, direccion, telefono, permisos_admin) VALUES (?, ?, ?, ?, ?, ?, 0)");
        $stmt->bind_param("ssssss", $usuario, $email, $nombre, $apellidos, $direccion, $telefono);

        if (!$stmt->execute()) {
            return 2; // Error al registrar en USUARIOS
        }

        // Obtener el ID del nuevo usuario insertado
        $user_id = $stmt->insert_id;

        // Insertar credenciales en CREDENCIALES
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO CREDENCIALES (user_id, password) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $hashedPass);

        if ($stmt->execute()) {
            return 0; // Registro exitoso
        } else {
            return 2; // Error al registrar en CREDENCIALES
        }
    }
}
?>