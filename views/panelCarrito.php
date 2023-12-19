<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Primor - LOGIN</title>
  <?php include_once "views/meta.php" ?>
</head>

<body>

  <header>
    <?php include_once "views/header.php";
    include_once "utils/CalculadoraPrecios.php"?>
  </header>
  <br>
  <!----------------------------------------------------------------------------------------------------->

  <?php if(!empty($_SESSION['addproducto'])){?>
  <div class="container-xl">
    <div class="row">
      <div class="col-sm-8" style="background-color: #F4F4F4">
        <h2>Cesta</h2>
        <hr>
        <p>Envío a domicilio (<?=count($_SESSION['addproducto']);?> articulos)</p>

      <table>  
        <?php
        $pos=0;
        foreach ($_SESSION['addproducto'] as $pedido){
          ?>
  
          <tr>
            <td><?=$pos+1?></td>
            <td><?=$pedido->getProducto()->getnombre()?></td>
            <td><?=$pedido->getProducto()->getprecio()?></td>
            <td>
              <form action="<?=url.'?controller=producto&action=cantidadProducto'?>" method="post">
                <button name="btn_suma" value="<?=$pos?>">+</button>
              </form>
            </td>
            <td> <?=$pedido->getcantidad()?> </td>
            <td>
              <form action="<?=url.'?controller=producto&action=cantidadProducto'?>" method="post">
                <button name="btn_resta" value="<?=$pos?>">-</button>
              </form>
            </td>
            <td>
              <form action="<?=url.'?controller=producto&action=eliminarProductoCesta'?>" method="post">
                <button name="btn_borrar" value="<?=$pos?>">Eliminar</button>
              </form>
            </td>
            <td>
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
          <p>Subtotal <?=CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto'])." €"?></p>
          <p>Total del pedido <?=CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto'])." €"?></p>

          <?php if(!isset($_SESSION['user'])){?>
            <form action="<?=url.'?controller=user&action=login'?>" method="post">
          <?php }else{?>
            <form action="<?=url.'?controller=producto&action=finalizar'?>" method="post">
          <?php }?>
            <input type="text" placeholder="Introducir código de descuento" style="width: 231px !important; height: 40px !important" />
            <button type="submit" class="fw-semibold" style="width: 128px !important; height: 40px; ">APLICAR</button>
            <input type="hidden" name="precioFinal" value="<?=CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto'])." €"?>" >
            <input type="hidden" name="user" value="<?=$_SESSION['user']?>" >
            <button type="submit" name="precio" id="pass" class="fw-semibold" style="width: 368px !important; height: 40px; margin-top: 16px; ">CONTINUAR</button>
          </form>
          <?php
          var_dump(CalculadoraPrecios::calculadorPrecioPedido($_SESSION['addproducto']));?>


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
  <?php }else{?>
    <div class="container-xl">
      <div class="row m-0 p-0" style="justify-content: space-between;">
          <div class="carrito-vacio" style="background-image: url('assets/images/carrito_vacio.PNG'); width:425px; height: 567px">
        </div>
      </div>
    </div>  



    <?php }?>

    <!-------------------------------------------------------------------------------->
    <br>
      <?php include_once "views/footer.php" ?>
</html>