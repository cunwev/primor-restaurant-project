<?php

// session_start();
include_once 'model/UsuarioDAO.php';

// Clase extendida con herencia de Usuario --> UsuarioAdmin
class AdminController
{

    public function showAdminOptions()
    {
        echo '<form action="' . url . '?controller=admin&action=goAdmin" method="post">';
        // Obtener el usuario de la sesión
        $currentUser = unserialize($_SESSION['user']);
        // Verificar si el usuario es administrador
        if ($currentUser instanceof UsuarioAdmin) {
            // Se imprime por pantalla el botón de acceso a Administrar productos
            echo '<button class="btn-a w-100 px-2 py-1">Administrar productos</button>';
        }
        echo '</form>';
        echo '<form action="" method="post">';
        // Obtener el usuario de la sesión
        $currentUser = unserialize($_SESSION['user']);
        // Verificar si el usuario es administrador
        if ($currentUser instanceof UsuarioAdmin) {
            // Se imprime por pantalla el botón de acceso a Administrar productos
            echo '<button class="btn-a w-100 px-2 py-1">Administrar usuarios</button>';
        }
        echo '</form>';
    }

    public function goAdmin()
    {
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

    // CUIDADO - ELIMINA EL PRODUCTO DE LA BASE DE DATOS
    public function deleteProducto()
    {
        if (isset($_POST['btn_delete'])) {
            $producto_id = $_POST['btn_delete'];

            // Obtén el producto antes de eliminarlo
            $productoEliminado = ProductoDAO::getProductID($producto_id);

            // Elimina el producto por ID
            $exito = ProductoDAO::deleteProductoById($producto_id);

            if ($exito) {
                // La eliminación fue exitosa, ahora puedes trabajar con $productoEliminado si es necesario
                echo "Producto eliminado correctamente";
                header('Location:' . url . '?controller=admin&action=goAdmin');
            } else {
                // Hubo un problema con la eliminación
                echo "Error al eliminar el producto";
            }
        }
    }


    // CUIDADO - INSERTA UN PRODUCTO DE LA BASE DE DATOS
    public function insertProducto()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_insert'])) {
            // Obtén los valores del formulario
            $nombre = $_POST['nombre'];
            $stock = $_POST['stock'];
            $categoria_id = $_POST['categoria_id'];
            $precio = $_POST['precio'];
            $imagen = $_POST['imagen'];

            // Crea un nuevo objeto Producto con los datos del formulario
            $nuevoProducto = new Producto($nombre, $stock, $categoria_id, $precio, $imagen);

            // Inserta el producto en la base de datos
            $exito = ProductoDAO::insertProducto($nuevoProducto);

            if ($exito) {
                echo "Producto insertado correctamente";
                header('Location:' . url . '?controller=admin&action=goAdmin');
            } else {
                echo "Error al insertar el producto";
            }
        }
    }


    // CUIDADO - MODIFICA UN PRODUCTO DE LA BASE DE DATOS
    public function updateProducto()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update'])) {
            // Obtén el ID del producto desde el formulario
            $producto_id = $_POST['producto_id'];

            // Obtén los valores actualizados del formulario
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $imagen = $_POST['imagen'];
            $categoria_id = $_POST['categoria_id'];

            // Crea un nuevo objeto Producto con los datos actualizados
            $productoActualizado = new Producto($nombre, $stock, $categoria_id, $precio, $imagen);

            // Actualiza el producto en la base de datos
            $exito = ProductoDAO::updateProducto($producto_id, $productoActualizado);

            if ($exito) {
                echo "Producto actualizado correctamente";
                header('Location:' . url . '?controller=admin&action=goAdmin');
            } else {
                echo "Error al actualizar el producto";
            }
        }
    }
}
?>