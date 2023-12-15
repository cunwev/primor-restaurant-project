<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Primor - LOGIN</title>
    <?php include_once "views/meta.php" ?>
</head>

<body>

  <header>
    <?php include_once "views/header.php"?>
  </header>
  <br>
  <!----------------------------------------------------------------------------------------------------->
<?php
  if(!isset($_SESSION['user'])){?>
<h1 class="p-0 m-0 fw-semibold text-center" style="font-size: 20px; margin-bottom:24px !important">ENTRAR</h1>
<p class="p-0 m-0 text-center" style="margin-bottom:24px !important">Si ya tienes una cuenta, inicia sesión con tu dirección de email</p>
  <div class="d-flex col-12 container-xl justify-content-center align-items-center">

    <br>

    <form action="?controller=user&action=loginProcess" method="post">
      <div class="">
        <label style="margin-bottom:4px; width: 600px !important; height: 22px !important;">Email *</label><br>
        <input type="email" name="user" id="user" placeholder="" style="width: 600px !important; height: 40px !important; padding-left: 16px; padding-right: 16px; margin-bottom: 16px !important"/>
      </div>
      <div class="">
        <label style="margin-bottom:4px; width: 600px !important; height: 22px !important;">Contraseña *</label><br>
        <input type="password" name="pass" id="pass" placeholder="" style="width: 600px !important; height: 40px !important"/>
      </div>

      <div class="">
        <button type="submit" name='submit' value='' class="fw-semibold btn-login" style="margin-top: 16px; ">INICIAR SESIÓN</button>
      </div>
      <div class="">
        <p class="text-center" style="margin-top: 16px; ">¿Has olvidado tu contraseña?</p>
      </div>
      <div>
        <p class="text-center">¿Todavia no eres miembro? <a href="?controller=user&action=register">Crea tu cuenta</a> </p>
      </div>
    </form>
  </div>
<?php }else{?>

  <!--USER-->
  <form class="col-6 ps-5" action="<?=url.'?controller=user&action=logout'?>" method="post">
    <button class="btn">Modificar datos</button>
  </form>
  <form class="col-6 ps-5" action="<?=url.'?controller=user&action=logout'?>" method="post">
    <button class="btn">Eliminar cuenta</button>
  </form>
  <form class="col-6 ps-5" action="<?=url.'?controller=user&action=logoutProcess'?>" method="post">
    <button class="btn">Cerrar sesión</button>
  </form>
  
    <!--USER_ADMIN-->
    <form class="col-6 ps-5" action="<?=url.'?controller=user&action=logout'?>" method="post">
      <button class="btn">Modificar datos</button>
    </form>
    <form class="col-6 ps-5" action="<?=url.'?controller=user&action=logout'?>" method="post">
      <button class="btn">Eliminar cuenta</button>
    </form>
    <form class="col-6 ps-5" action="<?=url.'?controller=user&action=logoutProcess'?>" method="post">
      <button class="btn">Cerrar sesión</button>
    </form>

  <?php }?>
  <!-------------------------------------------------------------------------------->
  <br>
  <!-- Remove the container if you want to extend the Footer to full width. -->
  <footer class="border-black text-center text-white pt-1" style="background-color: #ffffff;">
    <?php include_once "views/footer.php"?>
  </footer>


  <script src="assets/js/bootstrap.bundle.min.js"></script>

</html>