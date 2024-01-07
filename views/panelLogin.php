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
    <div class="my-4 p-1">
      <h2 class="p-0 fw-semibold text-center">Entrar</h2> <!-- FONT SIZE 20 -->
      <p class="p-0 text-center">Si ya tienes una cuenta, inicia sesión con tu dirección de email</p>
    </div>
    <div class="d-flex flex-column align-items-center justify-content-center">


      <form action="?controller=user&action=loginProcess" method="post">
        <div>
          <label class="label-text-login w-100">Email *</label>
          <input class="input-text-login w-100 form-control" type="email" name="user" id="user" placeholder="" />
        </div>
        <div>
          <label class="label-text-login w-100">Contraseña *</label>
          <div class="container-login-password w-100">
            <input class="input-text-login w-100 form-control" type="password" name="pass" id="pass" placeholder="" />
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
  ?>
    <!--Usuario-->
    <div class="container-fluid my-5 h-50 d-flex flex-column align-items-center justify-content-center">
      <div class="row">
        <h2 class="p-0 m-0 simple-title">Bienvenido/a <?= unserialize($_SESSION['user'])->getNombre() ?></h2>
        <?php // Verificar si 'iduser' está definido en $_SESSION
        if (isset($_COOKIE[$_SESSION['iduser']])) {
          require_once 'controller/UserController.php';
          // Llama a la función mostrarUltimoPedido
          UserController::mostrarUltimoPedido();
        }
        // Llamada al método mostrarDatosUsuario()
        UserController::mostrarDatosUsuario();
        ?>
        <div class="col-4 col-sm-3 p-3 w-auto">
          <?php 
          require_once 'controller/AdminController.php';
          // Crear una instancia de AdminController
          $adminController = new AdminController();
          // Llamada al método showAdminOptions()
          $adminController->showAdminOptions();
          ?>
          <form action="<?= url . '?controller=user&action=logout' ?>" method="post">
            <button class="btn-a w-100 px-2 py-1">Modificar datos</button>
          </form>
          <form action="<?= url . '?controller=user&action=eliminarCuenta' ?>" method="post">
            <button class="btn-a w-100 px-2 py-1" onclick="return confirm('¿Estás seguro de que quieres eliminar tu cuenta?');">Eliminar cuenta</button>
          </form>
          <form action="<?= url . '?controller=user&action=logoutProcess' ?>" method="post">
            <button class="btn-a w-100 px-2 py-1">Cerrar sesión</button>
          </form>
        </div>
      </div>
    </div>
    </body>
  <?php } ?>
  <!-------------------------------------------------------------------------------->

  <?php include_once "views/footer.php" ?>
  <script src="assets/js/script.js"></script> <!-- Script para ver la contraseña -->

</html>