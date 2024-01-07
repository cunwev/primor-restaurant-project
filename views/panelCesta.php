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

  <!----------------------------------------------------------------------------------------------------->

  <?php if (!empty($_SESSION['addproducto'])) { ?>
    <div class="container-xl my-4">
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
            <div class="row d-flex align-items-center justify-content-center cart-item-container">
              <div class="col-sm-2 col-2 text-center"> <!-- IMAGEN -->
                <img src="assets/images/productos/<?= $pedido->getProducto()->getimagen() ?>" alt="imagen de <?= $pedido->getProducto()->getnombre() ?>" class="img-fluid" width="100px" height="100px"> <!-- Muestra imagen del producto -->
              </div>
              <div class="col-sm-5 col-4"> <!--CATEGORIA, NOMBRE, BOTONES...-->
                <p class="cart-item-categoria"><?= $pedido->getCategoria() ?></p> <!-- Muestra categoria del producto -->
                <p class="cart-item"><?= $pedido->getProducto()->getnombre() ?></p> <!-- Muestra nombre del producto -->
                <form action="<?= url . '?controller=cesta&action=eliminarProductoCesta' ?>" method="post"><!-- Elimina el producto de la cesta -->
                  <button class="btn-cart-item" name="" value="">Editar</button> <!-- No implementado -->
                  <button class="btn-cart-item" name="btn_borrar" value="<?= $pos ?>">Quitar articulo</button>
                </form>
              </div>
              <div class="col-sm-3 col-4 d-flex align-items-center flex-row">
                <span class="display-mode-off m-auto">Cantidad:</span>
                <div class="d-flex justify-content-between align-items-center cart-item-cantidad">
                  <form action="<?= url . '?controller=cesta&action=cantidadProducto' ?>" method="post"> <!-- Modificar cantidad del producto, cuando alcanza 0 se elimina del cesta -->
                    <button class="cart-button-cantidad mt-2" name="btn_resta" value="<?= $pos ?>">-</button> <!-- Restar cantidad -->
                  </form>
                  <span class="m-0"><?= $pedido->getcantidad() ?></span> <!-- Muestra cantidad del producto y permite modificarla -->
                  <form action="<?= url . '?controller=cesta&action=cantidadProducto' ?>" method="post">
                    <button class="cart-button-cantidad mt-2" name="btn_suma" value="<?= $pos ?>">+</button> <!-- Sumar cantidad -->
                  </form>
                </div>
              </div>
              <div class="col-sm-2 col-2 d-flex align-items-center flex-row">
                <p class="m-0 cart-item-price m-auto"><?= $pedido->getProducto()->getprecio() * $pedido->getcantidad() . '€' ?></p> <!-- Muestra cantidad x precio del producto-->
              </div>
            </div>
          <?php
            $pos++;
          }
          ?>
        </div>

        <div class="col-sm-4">
          <div class="cart-summary-container">
            <p class="cart-subtotal">Subtotal <?= CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) . " €" ?></p>
            <p class="cart-total m-0">Total del pedido <?= round(CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) * 1.10, 2) . " € " ?></p>
            <p class="cart-banner-text-b"><?= round(CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) * 0.10, 2) . " € " ?> (10% IVA incl.)</p>

            <?php if (!isset($_SESSION['user'])) { ?>
              <form class="p-2" action="<?= url . '?controller=user&action=login' ?>" method="post">
              <?php } else { ?>
                <form class="p-2" action="<?= url . '?controller=cesta&action=finalizar' ?>" method="post">
                <?php } ?>
                <input class="input-text-descuento" type="text" placeholder="Introducir código de descuento"/>
                <button type="submit" class="fw-semibold btn-a btn-cart-aplicar p-0">APLICAR</button>
                <input type="hidden" name="precioFinal" value="<?= round(CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']) * 1.10, 2) ?>">
                <button type="submit" name="precio" id="pass" class="fw-semibold btn-c btn-cart-tramitar">TRAMITAR PEDIDO (<?= count($_SESSION['addproducto']); ?> artículos)</button>
                </form>



                <div class="row banner-cart-a">
                  <div class="col-sm-4 container d-flex align-items-center justify-content-center">
                    <img src="assets/images/tarjeta_digital.png" width="140" height="140" alt="Imagen de tarjeta digital de Primor.">
                  </div>
                  <div class="col-sm-8 text-center justify-content-center">
                    <p class="cart-banner-text-a fw-bold">REGALA PRIMOR</p>
                    <p class="cart-banner-text-b">COMPRA NUESTRA TARJETA DE REGALO DIGITAL Y ¡DESPREOCUPATE!</p>
                    <button type="submit" class="fw-semibold btn-a btn-cart-regalo">TARJETA REGALO</button>
                  </div>
                </div>
          </div>

          <div class="bg-image banner-cart-b my-4" style="background-image: url('assets/images/cesta_banner.png');">
          </div>

          <div class="banner-cart-c">
            <p class="cart-banner-text-a fw-bold m-0">¿Necesitas ayuda?</p>
            <p class="cart-banner-text-a m-0">Atención al cliente</p>
          </div>


        </div>

      </div> <!--div class="col-sm-4"-->
    </div> <!--row-->
    </div> <!--container-xl-->
  <?php } else { ?>
    <div class="container-xl d-flex justify-content-center align-items-center ">
      <div class="row m-0 p-0 justify-content-between">
        <div class="banner-cart-empty">
        </div>
      </div>
    </div>



  <?php } ?>
  <div class="container-xl">
    <div class="row justify-content-between mx-3">
      <p class="my-4 cart-banner-text-a fw-semibold">Quizá pueda interesarte...</p>
      <?php foreach ($allProducts as $product) {
        if ($product->getcategoria_id() < 10) { ?>
          <div class="col-md-2 justify-content-center p-0 main-container-product">

            <a href="#" class="d-flex flex-column align-items-end ms-auto">
              <div class="bg-image btn-fav">
              </div>
            </a>
            <div class="text-center">
              <form action="<?= url . '?controller=producto&action=agregarProducto' ?>" method="post">
                <input type="hidden" name="id" value="<?= $product->getproducto_id() ?>">
                <input type="hidden" name="categoria" value="<?= $product->getNombreCategoria() ?>">
                <img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="200px" height="200px">
                <button type="submit" class="fw-semibold btn-add-producto">AÑADIR A LA CESTA</button>
              </form>
            </div>
            <div class="sub-container-product">
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
  </body>
  <!-------------------------------------------------------------------------------->

  <?php include_once "views/footer.php" ?>

</html>