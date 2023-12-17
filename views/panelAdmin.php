<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>Primor - ADMIN</title>
    <?php include_once "views/meta.php" ?>
</head>

<body>

  <header>
    <?php include_once "views/header.php"?>
  </header>
  <br>
  <!----------------------------------------------------------------------------------------------------->

  <br>
        <h1>Bienvenido/a admin.</h1>
        <br>
        <div class="container-xl">
          <form action="<?=url.'?controller=producto&action=eliminarProducto'?>" method="post">
                  <button name="btn_" value="">Nuevo producto</button>
          </form>
          <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Nombre</th>
              <th>Stock</th>
              <th>Categoria ID</th>
              <th>Precio</th>
            </tr>
          </thead>
            <?php foreach ($allProducts as $product) { ?>
            <tr class="border">
              <td><?= $product->getproducto_id()?></td>
              <td><img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="50px" height="50px"></td>
              <td><?= $product->getnombre() ?></td>
              <td><?= $product->getstock() ?></td>
              <td><?= $product->getcategoria_id() ?></td>
              <td><?= $product->getprecio() . " €" ?></td>

              <td>
                <form action="<?=url.'?controller=producto&action=eliminarProducto'?>" method="post">
                  <button name="btn_borrar" value="<?=$pos?>">Modificar</button>
                </form>
              </td>

              <td>

              <form action="<?=url.'?controller=producto&action=deleteProducto'?>" method="post">
                <button name="btn_delete" value="<?=$product->getproducto_id()?>">Delete</button>
              </form>

              </td>

            </tr>
            <?php }?>
          </table>
        </div>

  <!-------------------------------------------------------------------------------->
  <br>

    <?php include_once "views/footer.php"?>

</html>