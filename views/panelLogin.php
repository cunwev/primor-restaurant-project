<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Primor - LOGIN</title>
  <?php include_once "views/meta.php" ?>
</head>

<body>

  <header>
    <?php include_once "views/header.php" ?>
  </header>

  <!----------------------------------------------------------------------------------------------------->
  <?php
  if (!isset($_SESSION['user'])) { ?>
    <h2 class="p-0 my-3 fw-semibold text-center">ENTRAR</h2> <!-- FONT SIZE 20 -->
    <p class="p-0 my-4 text-center">Si ya tienes una cuenta, inicia sesión con tu dirección de email</p>
    <div class="d-flex col-12 container-fluid justify-content-center align-items-center">

      
      <form action="?controller=user&action=loginProcess" method="post">
        <div>
          <label class="label-text-login">Email *</label><br>
          <input class="input-text-login" type="email" name="user" id="user" placeholder=""/>
        </div>
        <div>
          <label class="label-text-login">Contraseña *</label><br>
          <div class="container-login-password">
            <input class="input-text-login" type="password" name="pass" id="pass" placeholder=""/>
            <button class="btn-login-password" name="pass" type="button" onclick="togglePasswordVisibility()" id="passwordToggle">Mostrar</button>
          </div>
        </div>

        <div class="my-4">
          <button type="submit" name='submit' value='' class="fw-semibold btn-login">INICIAR SESIÓN</button>
        </div>
        <div>
          <p class="text-center">¿Has olvidado tu contraseña?</p>
        </div>
        <div>
          <p class="text-center">¿Todavia no eres miembro? <a href="?controller=user&action=register">Crea tu cuenta</a> </p>
        </div>
      </form>
    </div>
  <?php
  } else {
    // Verificar si 'iduser' está definido en $_SESSION
    if (isset($_COOKIE[$_SESSION['iduser']])) {
      require_once 'controller/UserController.php';
      // Llama a la función mostrarUltimoPedido
      UserController::mostrarUltimoPedido();
    }
  ?>

    <h2>Bienvenido/a <?=unserialize($_SESSION['user'])->getNombre()?></h2>
    <!--Usuario-->
    <div class="container-xl" style="height: 50%">
      <div class="row">
        <div class="col-4">
          <form action="<?= url . '?controller=user&action=logout' ?>" method="post">
            <button class="btn">Modificar datos</button>
          </form>
          <form  action="<?= url . '?controller=user&action=eliminarCuenta' ?>" method="post">
            <button class="btn" onclick="return confirm('¿Estás seguro de que quieres eliminar tu cuenta?');">Eliminar cuenta</button>
          </form>
          <form action="<?= url . '?controller=user&action=logoutProcess' ?>" method="post">
            <button class="btn">Cerrar sesión</button>
          </form>
          <!--UsuarioAdmin-->
          <form action="<?= url . '?controller=user&action=goAdmin' ?>" method="post">
            <?php
            // Obtener el usuario de la sesión
            $currentUser = unserialize($_SESSION['user']);
            // Verificar si el usuario es administrador
            if ($currentUser instanceof UsuarioAdmin) {
              // Se imprime por pantalla el botón de acceso a Administrar productos
              echo '<button class="btn">Administrar productos</button>';
            }
            ?>
          </form>
          <form action="" method="post">
            <?php
            // Obtener el usuario de la sesión
            $currentUser = unserialize($_SESSION['user']);
            // Verificar si el usuario es administrador
            if ($currentUser instanceof UsuarioAdmin) {
              // Se imprime por pantalla el botón de acceso a Administrar productos
              echo '<button class="btn">Administrar usuarios</button>';
            }
            ?>
          </form>
        </div>
      
        <div class="col-8">
          <?php $currentUser = unserialize($_SESSION['user']);?>
          <p>Nombre: <?=$currentUser->getNombre();?></p>
          <p>Apellidos: <?=$currentUser->getApellidos();?></p>
          <p>Correo electrónico: <?=$currentUser->getEmail();?></p>
          <p>Dirección: <?=$currentUser->getDireccion();?></p>
          <p>Teléfono: <?=$currentUser->getTelefono();?></p>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-------------------------------------------------------------------------------->

  <?php include_once "views/footer.php" ?>
  <script src="assets/js/script.js"></script> <!-- Script para ver la contraseña -->

</html>