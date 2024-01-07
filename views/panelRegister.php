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
  <div class="my-4">
  <h2 class="p-0 my-3 fw-semibold text-center">Crear una cuenta</h2> <!-- FONT SIZE 20 -->
  </div>
    <div class="d-flex col-12 container-fluid justify-content-center align-items-center">
      <form action="?controller=user&action=registrar" method="post">
        <div>
          <label class="label-text-login" for="email">Correo electrónico:</label><br>
          <input class="input-text-login" type="email" name="email" required>
        </div>
        <div>
          <label class="label-text-login" for="password">Contraseña:</label><br>
          <input class="input-text-login" type="password" name="password" required>
        </div>
        <div>
          <label class="label-text-login" for="nombre">Nombre:</label><br>
          <input class="input-text-login" type="text" name="nombre" required>
        </div>
        <div>
          <label class="label-text-login" for="apellidos">Apellidos:</label><br>
          <input class="input-text-login" type="text" name="apellidos" required>
        </div>
        <div>
          <label class="label-text-login" for="direccion">Dirección:</label><br>
          <input class="input-text-login" type="text" name="direccion" required>
        </div>
        <div>
          <label class="label-text-login" for="telefono">Teléfono:</label><br>
          <input class="input-text-login" type="tel" name="telefono" required>
        </div>
        <div class="my-4">
          <input class="fw-semibold btn-login" type="submit" value="CREAR UNA CUENTA">
        </div>
      </form>
    </div>
    </body>



  <!-------------------------------------------------------------------------------->

  <?php include_once "views/footer.php" ?>
  <script src="assets/js/script.js"></script> <!-- Script para ver la contraseña -->

</html>