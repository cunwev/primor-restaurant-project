
<?php
include_once 'config/dataBase.php';
require_once 'Usuario.php';

class UsuarioDAO {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerUsuarioPorCredenciales($usuario, $password) {
        $query = "SELECT * FROM credenciales WHERE usuario = ? AND password = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $usuario, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            return new Usuario($row['id_cliente'], $row['usuario'], $row['password']);
        }

        return null;
    }
}
?>