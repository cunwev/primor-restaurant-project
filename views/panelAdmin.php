<!DOCTYPE html PUBLIC>
<html>

<head>
  <title>Primor - ADMIN</title>
  <?php include_once "views/meta.php" ?>
</head>

<body>

  <header>
    <?php include_once "views/header.php" ?>
  </header>
  <br>
  <!----------------------------------------------------------------------------------------------------->


  <div class="container-xl m-4 d-flex flex-column align-items-center justify-content-center">

    <!-- Tu formulario para agregar productos -->
    <form action="<?= url . '?controller=admin&action=insertProducto' ?>" method="post">
      <br>
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" required>
      <br>
      <label for="precio">Precio:</label>
      <input type="number" name="precio" step="0.01" required>
      <br>
      <label for="stock">Stock:</label>
      <input type="number" name="stock" required>
      <br>
      <label for="imagen">Imagen:</label>
      <input type="text" name="imagen" required>
      <br>
      <label for="categoria_id">Categoría ID:</label>
      <input type="number" name="categoria_id" required>
      <br>
      <!-- Botón para enviar el formulario -->
      <button type="submit" name="btn_insert">Agregar Producto</button>
    </form>

    <table class="table-bordered">
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
        <tr>
          <td><?= $product->getproducto_id() ?></td>
          <td><img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="50px" height="50px"></td>
          <td><?= $product->getnombre() ?></td>
          <td><?= $product->getstock() ?></td>
          <td><?= $product->getcategoria_id() ?></td>
          <td><?= $product->getprecio() . " €" ?></td>

          <td>
            <!-- Tu formulario para agregar productos -->
            <form action="<?= url . '?controller=admin&action=updateProducto' ?>" method="post">
              <br>
              <label for="nombre">Nombre:</label>
              <input type="text" placeholder="<?= $product->getnombre() ?>" name="nombre" required>
              <br>
              <label for="precio">Precio:</label>
              <input type="number" placeholder="<?= $product->getprecio() ?>" name="precio" step="0.01" required>
              <br>
              <label for="stock">Stock:</label>
              <input type="number" placeholder="<?= $product->getstock() ?>" name="stock" required>
              <br>
              <label for="imagen">Imagen:</label>
              <input type="text" placeholder="<?= $product->getimagen() ?>" name="imagen" required>
              <br>
              <label for="categoria_id">Categoría ID:</label>
              <input type="number" placeholder="<?= $product->getcategoria_id() ?>" name="categoria_id" required>
              <br>
              <!-- Botón para enviar el formulario -->
              <input type="hidden" name="producto_id" value="<?= $product->getproducto_id() ?>">
              <button type="submit" name="btn_update">Confirmar cambios</button>
            </form>
          </td>

          <td>
            <form action="<?= url . '?controller=admin&action=deleteProducto' ?>" method="post">
              <button name="btn_delete" value="<?= $product->getproducto_id() ?>">Delete</button>
            </form>
          </td>

        </tr>
      <?php } ?>
    </table>
  </div>
  <br>
</body>
  <!-------------------------------------------------------------------------------->

  <?php include_once "views/footer.php" ?>

</html>