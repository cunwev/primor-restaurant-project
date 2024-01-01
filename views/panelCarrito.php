<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Primor - LOGIN</title>
  <?php include_once "views/meta.php" ?>
</head>

<body>

  <header>
    <?php include_once "views/header.php";
    include_once "utils/CalculadoraPrecios.php" ?>
  </header>
  <br>
  <!----------------------------------------------------------------------------------------------------->

  <?php if (!empty($_SESSION['addproducto'])) { ?>
    <div class="container-xl">
      <div class="row">
        <div class="col-sm-8" style="">
          <h2>Cesta</h2>
          <hr>
          <p>Envío a domicilio (<?= count($_SESSION['addproducto']); ?> articulos)</p>

          <table>
            <?php
            $pos = 0;

            foreach ($_SESSION['addproducto'] as $pedido) {
            ?>

              <tr>
                <td>
                  <img src="assets/images/productos/<?= $pedido->getProducto()->getimagen() ?>" alt="imagen de <?= $pedido->getProducto()->getnombre() ?>" width="100px" height="100px">
                </td>
                </td>
                <td>
                  <!-- Muestra nombre y categoria del producto -->
                  <p><?= $pedido->getCategoria() ?></p>
                  <p><?= $pedido->getProducto()->getnombre() ?></p>
                  <!-- Elimina el producto de la cesta -->
                  <form action="<?= url . '?controller=cesta&action=eliminarProductoCesta' ?>" method="post">
                    <button name="" value="">Editar</button>
                    <button name="btn_borrar" value="<?= $pos ?>">Quitar articulo</button>
                  </form>
                </td>
                <td>
                  <div style="background-color:#F4F4F4">
                    <!-- Modificar cantidad del producto, cuando alcanza 0 se elimina del carrito -->
                    <form action="<?= url . '?controller=cesta&action=cantidadProducto' ?>" method="post">
                      <button name="btn_suma" value="<?= $pos ?>">+</button>
                      <?= $pedido->getcantidad() ?>
                      <button name="btn_resta" value="<?= $pos ?>">-</button>
                    </form>
                  </div>
                </td>
                <td>
                  <!-- Precio producto * cantidad producto -->
                  <?= $pedido->getProducto()->getprecio() * $pedido->getcantidad() . '€' ?>
                </td>
              </tr>
            <?php
              $pos++;
            }
            ?>
          </table>
        </div>

        <div class="col-sm-4">
          <div style="background-color:#F4F4F4; margin-bottom: 40px; padding: 16px">
            <p>Subtotal</p>
            <p>Total del pedido <?= CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) . " €" ?></p>

            <?php if (!isset($_SESSION['user'])) { ?>
              <form action="<?= url . '?controller=user&action=login' ?>" method="post">
              <?php } else { ?>
                <form action="<?= url . '?controller=cesta&action=finalizar' ?>" method="post">
                <?php } ?>
                <input type="text" placeholder="Introducir código de descuento" style="width: 231px !important; height: 40px !important" />
                <button type="submit" class="fw-semibold" style="width: 128px !important; height: 40px; ">APLICAR</button>
                <input type="hidden" name="precioFinal" value="<?= CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) ?>">
                <button type="submit" name="precio" id="pass" class="fw-semibold" style="width: 368px !important; height: 40px; margin-top: 16px; ">CONTINUAR</button>
                </form>


                <div class="row" style="margin-top: 40px">
                  <div class="col-sm-4 justify-content-center">
                    <img src="assets/images/tarjeta_digital.png" width="100" height="100">
                  </div>
                  <div class="col-sm-8 text-center justify-content-center">
                    <p>REGALA PRIMOR</p>
                    <p>COMPRA NUESTRA TARJETA DE REGALO DIGITAL Y ¡DESPREOCUPATE!</p>
                    <button type="submit" class="fw-semibold btn-login" style="width: 209px !important; margin-top: 16px; ">TARJETA REGALO</button>
                  </div>
                </div>
          </div>

          <div class="bg-image mt-4 mb-4" style="height: 155px; background-image: url('assets/images/carrito_banner.png');    background-size: contain;background-position: center;background-repeat: no-repeat;">
          </div>

          <div style="height: 96px; background-color: #F4F4F4; margin-top: 50px">
            <p>¿Necesitas ayuda?</p>
            <p>Atención al cliente</p>
          </div>


        </div>

      </div> <!--div class="col-sm-4"-->
    </div> <!--row-->
    </div> <!--container-xl-->
  <?php } else { ?>
    <div class="container-xl">
      <div class="row m-0 p-0" style="justify-content: space-between;">
        <div class="carrito-vacio" style="background-image: url('assets/images/carrito_vacio.PNG'); width:425px; height: 567px">
        </div>
      </div>
    </div>



  <?php } ?>
  <div class="container-xl" style="padding: 40px 0px 40px 0px">

    <br>
    <h1 class="text-center">TENDENCIAS</h1>
    <p class="text-center">Una exquisita colección de los platos que están en boca de todos.<br>Conoce las últimas tendencias gatronómicas.</p>
    <br>
    <div class="row justify-content-between" style="margin-left: 20px; margin-right:20px">
      <?php foreach ($allProducts as $product) {
        if ($product->getcategoria_id() < 10) { ?>
          <div class="col-md-2 justify-content-center text-center p-0 container-producto" style="border: 1px solid;  width: 246px; margin-bottom: 40px;">

            <a href="#" class="d-flex flex-column align-items-end ms-auto" style="">
              <div class="bg-image btn-fav">
              </div>
            </a>

            <form action="<?= url . '?controller=producto&action=agregarProducto' ?>" method="post">
              <input type="hidden" name="id" value="<?= $product->getproducto_id() ?>">
              <input type="hidden" name="categoria" value="<?= $product->getNombreCategoria() ?>">
              <?php echo $product->getNombreCategoria() . "<br>"; ?>
              <img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="200px" height="200px">
              <button type="submit" class="fw-semibold btn-add-producto" style="margin-top: 16px; width: 220px; height: 40px">AÑADIR AL CARRITO</button>
            </form>


            <p>TENDENCIAS</p>
            <?= $product->getnombre() ?>

            <div style="margin-bottom: 10px; margin-top: 10px">
              <a href="#" class="btn-cantidad" style="width: 80px; height: 40px">75g</a>
              <a href="#" class="btn-cantidad" style="width: 80px; height: 40px">100g</a>
              <a href="#" class="btn-cantidad" style="width: 80px; height: 40px">150g</a>
            </div>

            <div style="margin-bottom: 0px; margin-top: 0px">
              <?= $product->getprecio() . " €" ?>
            </div>

          </div>
      <?php }
      } ?>
    </div>
  </div>
  <!-------------------------------------------------------------------------------->
  <br>
  <?php include_once "views/footer.php" ?>

</html>