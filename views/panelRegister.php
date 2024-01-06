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

    <h2>Registro de Usuario</h2>
    <form action="?controller=user&action=registrar" method="post">
    <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" required>
        <br>
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required>
        <br>
        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" required>
        <br>
        <input type="submit" value="Registrar">
    </form>

  <!-------------------------------------------------------------------------------->
  </body>
  <?php include_once "views/footer.php" ?>
  <script src="assets/js/script.js"></script> <!-- Script para ver la contraseña -->

</html>