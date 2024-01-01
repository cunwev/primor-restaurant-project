<!DOCTYPE html>
<html>

<head>
    <title>Primor - CARTA</title>
    <?php include_once "views/meta.php" ?>
</head>

<header>
    <?php include_once "views/header.php" ?>
</header>

<body>
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



        <br>
        <h1>MER À VERSAILLES</h1>
        <br>
        <div class="row">
            <?php foreach ($allProducts as $product) {
                if ($product->getcategoria_id() == 10) { ?> <!-- 10 = MER À VERSAILLES -->
                    <div class="col-md-2 justify-content-center text-center" style="border: 1px solid">
                        <div>
                            <img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="200px" height="200px">
                        </div>
                        <?= $product->getnombre() ?>
                        <br>
                        <?= $product->getprecio() . " €" ?>
                    </div>
            <?php }
            } ?>
        </div>



        <br>
        <h1>ECRASANT DES FEUILLES</h1>
        <br>
        <div class="row">
            <?php foreach ($allProducts as $product) {
                if ($product->getcategoria_id() == 11) { ?> <!-- 11 = ECRASANT DES FEUILLES -->
                    <div class="col-md-2 justify-content-center text-center" style="border: 1px solid">
                        <div>
                            <img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="200px" height="200px">
                        </div>
                        <?= $product->getnombre() ?>
                        <br>
                        <?= $product->getprecio() . " €" ?>
                    </div>
            <?php }
            } ?>
        </div>
    </div>


</body>

<footer class="border-black text-center text-white pt-1" style="background-color: #ffffff;">
    <?php include_once "views/footer.php" ?>
</footer>

</html>