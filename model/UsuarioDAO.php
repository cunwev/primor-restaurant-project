<?php 

include_once 'config/database.php';
include_once 'Usuario.php';

class UsuarioDAO{

    public static function getUserLogin($usuario,$pass){

        $conn = database::connect();
        $stmt = $conn->prepare("SELECT * FROM CLIENTES WHERE usuario=?");
        $stmt->bind_param("s",$usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        $usuarioObj = $result->fetch_object('Usuario');
        if(empty($usuario)){
            /*debug*/echo "Usuario vacio";
            return 2;
            

        }else{
            
            $clienteid = $usuarioObj->getClienteId();
            /*debug*/var_dump($clienteid);
            $stmt = $conn->prepare("SELECT * FROM CREDENCIALES WHERE cliente_id=?");
            $stmt->bind_param("i",$clienteid);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows === 0 ){
                /*debug*/echo "No coincidencias encontradas";
                return 2;
            }else{
                $row = $result->fetch_assoc();
                $passValue = $row['password'];
                
                if ($pass === $passValue){
                    session_start();
                    $_SESSION['user'] = serialize($usuarioObj);
                    header('Location:'.url.'?controller=user&action=login');
                    /*debug*/echo "Sesion iniciada";
                    return 3;
                }else{
                    header('Location:'.url.'?controller=user&action=login');
                    /*debug*/echo "Contraseña incorrecta u otro tipo de error";
                    return 2;
                }
            }

            return 3;
            
        }

    }
}

?>