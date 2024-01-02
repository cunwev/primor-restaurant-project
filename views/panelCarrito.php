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
        <div class="col-sm-8">
          <h2 class="page-title">Cesta</h2>
          <hr>
          <p class="cart-subtitle">Envío a domicilio (<?= count($_SESSION['addproducto']); ?> articulos)</p>
          <hr>
          <?php
          $pos = 0;

          foreach ($_SESSION['addproducto'] as $pedido) {
          ?>
            <div class="row d-flex align-items-center justify-content-center" style="padding-top: 10px; padding-bottom: 10px; border-bottom: 1px solid #F4F4F4;">
              <div class="col-sm-2 col-3 text-center"> <!-- IMAGEN -->
                <img src="assets/images/productos/<?= $pedido->getProducto()->getimagen() ?>" alt="imagen de <?= $pedido->getProducto()->getnombre() ?>" class="img-fluid" width="100px" height="100px">
              </div>
              <div class="col-sm-5 col-6"> <!--CATEGORIA, NOMBRE, BOTONES...-->
                <!-- Muestra nombre y categoria del producto -->
                <p class="cart-item-categoria"><?= $pedido->getCategoria() ?></p>
                <p class="cart-item"><?= $pedido->getProducto()->getnombre() ?></p>
                <!-- Elimina el producto de la cesta -->
                <form action="<?= url . '?controller=cesta&action=eliminarProductoCesta' ?>" method="post">
                  <button class="cart-button" name="" value="">Editar</button>
                  <button class="cart-button" name="btn_borrar" value="<?= $pos ?>">Quitar articulo</button>
                </form>
              </div>
              <div class="col-sm-3 col-3 d-flex align-items-center flex-row">
                <span class="display-mode-off" style="margin-right: 5px;">Cantidad: </span>
                <div style="border: 2px solid #F4F4F4; width: 70px; display: flex; justify-content: space-between; align-items: center;">
                  <!-- Modificar cantidad del producto, cuando alcanza 0 se elimina del carrito -->
                  <form action="<?= url . '?controller=cesta&action=cantidadProducto' ?>" method="post">
                    <button class="cart-button-cantidad mt-2" name="btn_resta" value="<?= $pos ?>">-</button>
                  </form>
                  <span style="margin: 0;"><?= $pedido->getcantidad() ?></span>
                  <form action="<?= url . '?controller=cesta&action=cantidadProducto' ?>" method="post">
                    <button class="cart-button-cantidad mt-2" name="btn_suma" value="<?= $pos ?>">+</button>
                  </form>
                </div>
              </div>
              <div class="col-sm-2 col-1 d-flex align-items-center flex-row">
                <p style="margin: 0;" class="cart-item-price"><?= $pedido->getProducto()->getprecio() * $pedido->getcantidad() . '€' ?></p>
              </div>
            </div>
          <?php
            $pos++;
          }
          ?>
        </div>

        <div class="col-sm-4 ">
          <div style="background-color:#F4F4F4; margin-bottom: 40px; padding: 16px">
            <p class="cart-subtotal">Subtotal</p>
            <p class="cart-total">Total del pedido <?= CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) . " €" ?></p>

            <?php if (!isset($_SESSION['user'])) { ?>
              <form action="<?= url . '?controller=user&action=login' ?>" method="post">
              <?php } else { ?>
                <form action="<?= url . '?controller=cesta&action=finalizar' ?>" method="post">
                <?php } ?>
                <input type="text" placeholder="Introducir código de descuento" style="width: 231px !important; height: 40px !important" />
                <button type="submit" class="fw-semibold btn-a" style="width: 128px !important; height: 40px; ">APLICAR</button>
                <input type="hidden" name="precioFinal" value="<?= CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) ?>">
                <button type="submit" name="precio" id="pass" class="fw-semibold btn-c" style="width: 368px !important; height: 40px; margin-top: 16px; ">TRAMITAR PEDIDO (<?= count($_SESSION['addproducto']); ?> artículos)</button>
                </form>


                <div class="row" style="margin-top: 40px; padding: 16px">
                  <div class="col-sm-4 justify-content-center">
                    <img src="assets/images/tarjeta_digital.png" width="100" height="100">
                  </div>
                  <div class="col-sm-8 text-center justify-content-center">
                    <p class="cart-banner-subtitle">REGALA PRIMOR</p>
                    <p>COMPRA NUESTRA TARJETA DE REGALO DIGITAL Y ¡DESPREOCUPATE!</p>
                    <button type="submit" class="fw-semibold btn-a" style="width: 209px !important; margin-top: 16px; ">TARJETA REGALO</button>
                  </div>
                </div>
          </div>

          <div class="bg-image mt-4 mb-4" style="height: 155px; background-image: url('assets/images/carrito_banner.png'); background-size: contain;background-position: center;background-repeat: no-repeat; padding: 16px">
          </div>

          <div style="height: 96px; background-color: #F4F4F4; margin-top: 50px; padding: 16px">
            <p class="cart-banner-subtitle">¿Necesitas ayuda?</p>
            <p>Atención al cliente</p>
          </div>


        </div>

      </div> <!--div class="col-sm-4"-->
    </div> <!--row-->
    </div> <!--container-xl-->
  <?php } else { ?>
    <div class="container-xl  d-flex justify-content-center align-items-center">
      <div class="row m-0 p-0" style="justify-content: space-between;">
        <div class="carrito-vacio" style="background-image: url('assets/images/carrito_vacio.PNG'); width:275px; height: 417px">
        </div>
      </div>
    </div>



  <?php } ?>
  <div class="container-xl">
    <div class="row justify-content-between mx-3">
      <p class="cart-banner-subtitle">Quizá pueda interesarte...</p>
      <?php foreach ($allProducts as $product) {
        if ($product->getcategoria_id() < 10) { ?>
          <div class="col-md-2 justify-content-center p-0 container-producto">

            <a href="#" class="d-flex flex-column align-items-end ms-auto">
              <div class="bg-image btn-fav">
              </div>
            </a>
            <div class="text-center">
              <form action="<?= url . '?controller=producto&action=agregarProducto' ?>" method="post">
                <input type="hidden" name="id" value="<?= $product->getproducto_id() ?>">
                <input type="hidden" name="categoria" value="<?= $product->getNombreCategoria() ?>">
                <img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="200px" height="200px">
                <button type="submit" class="fw-semibold btn-add-producto">AÑADIR AL CARRITO</button>
              </form>
            </div>
            <div class="info-product">
              <!-- Da el nombre de la categoria en mayusculas y el nombre del producto -->
              <p class="product-categoria"><?= strtoupper($product->getNombreCategoria()) ?></p>
              <p class="product-name"><?= $product->getnombre() ?></p>
            </div>
            <div class="text-center my-4">
              <a href="#" class="btn-product-size">75g</a>
              <a href="#" class="btn-product-size">100g</a>
              <a href="#" class="btn-product-size">150g</a>
            </div>

            <div class="m-3">
              <p class="product-price"><?= $product->getprecio() . " €" ?></p>
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