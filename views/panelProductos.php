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
    <div class="container-xl pt-5 pb-5">

        <div class="text-center">
            <h2 class="carta-title">TENDENCIAS</h2>
            <p>Una exquisita colección de los platos que están en boca de todos.<br>Conoce las últimas tendencias gatronómicas.</p>
        </div>

        <div class="row justify-content-between mx-3">
            <?php foreach ($allProducts as $product) {
                if ($product->getcategoria_id() < 10) { ?>
                    <div class="col-md-2 justify-content-center p-0 container-producto" >

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
                        <div class="text-center mb-4 mt-4">
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

    <div class="container-xl pt-20 pb-20">
        <br>
        <h2 class="text-center carta-title">MER À VERSAILLES</h2>
        <p class="text-center">Un menú inspirado en las frias aguas del atlántico norte pero abrigado por la majestuosidad del neoclásico Versalles.<br>Descubre una brisa refrescante y con sabor floral en cada bocado.</p>
        <br>
        <div class="row justify-content-between" style="margin-left: 20px; margin-right:20px">
            <?php foreach ($allProducts as $product) {
                if ($product->getcategoria_id() == 10) { ?>
                    <div class="col-md-2 justify-content-center p-0 container-producto" style="border: 1px solid #EBEBEB;  width: 246px; margin-bottom: 40px;">

                        <a href="#" class="d-flex flex-column align-items-end ms-auto">
                            <div class="bg-image btn-fav">
                            </div>
                        </a>
                        <div class="text-center">
                            <form action="<?= url . '?controller=producto&action=agregarProducto' ?>" method="post">
                                <input type="hidden" name="id" value="<?= $product->getproducto_id() ?>">
                                <input type="hidden" name="categoria" value="<?= $product->getNombreCategoria() ?>">
                                <img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="200px" height="200px">
                                <button type="submit" class="fw-semibold btn-add-producto" style="margin-top: 16px; width: 220px; height: 40px">AÑADIR AL CARRITO</button>
                            </form>
                        </div>
                        <div style="height: 18%; padding-top: 10px; margin-left: 15px; margin-right: 15px; border-top: 1px solid #EBEBEB; border-bottom: 1px solid #EBEBEB;">
                            <!-- Da el nombre de la categoria en mayusculas y el nombre del producto -->
                            <p class="product-categoria"><?= strtoupper($product->getNombreCategoria()) ?></p>
                            <p class="product-name"><?= $product->getnombre() ?></p>
                        </div>
                        <div class="text-center" style="margin-bottom: 30px; margin-top: 30px">
                            <a href="#" class="btn-product-size" style="width: 80px; height: 40px">75g</a>
                            <a href="#" class="btn-product-size" style="width: 80px; height: 40px">100g</a>
                            <a href="#" class="btn-product-size" style="width: 80px; height: 40px">150g</a>
                        </div>

                        <div style="margin: 20px">
                            <p class="product-price"><?= $product->getprecio() . " €" ?></p>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    <div class="container-xl pt-20 pb-20">
        <br>
        <h2 class="text-center carta-title">ECRESANT DES FEUILLES</h2>
        <p class="text-center">Un menú otoñal que celebra los ingredientes y sabores que se encuentran en su apogeo durante esta temporada.<br>Disfruta de una experiencia culinaria cálida y reconfortante.</p>
        <br>
        <div class="row justify-content-between" style="margin-left: 20px; margin-right:20px">
            <?php foreach ($allProducts as $product) {
                if ($product->getcategoria_id() == 11) { ?>
                    <div class="col-md-2 justify-content-center p-0 container-producto" style="border: 1px solid #EBEBEB;  width: 246px; margin-bottom: 40px;">

                        <a href="#" class="d-flex flex-column align-items-end ms-auto">
                            <div class="bg-image btn-fav">
                            </div>
                        </a>
                        <div class="text-center">
                            <form action="<?= url . '?controller=producto&action=agregarProducto' ?>" method="post">
                                <input type="hidden" name="id" value="<?= $product->getproducto_id() ?>">
                                <input type="hidden" name="categoria" value="<?= $product->getNombreCategoria() ?>">
                                <img src="assets/images/productos/<?= $product->getimagen() ?>" alt="imagen de <?= $product->getnombre() ?>" width="200px" height="200px">
                                <button type="submit" class="fw-semibold btn-add-producto" style="margin-top: 16px; width: 220px; height: 40px">AÑADIR AL CARRITO</button>
                            </form>
                        </div>
                        <div style="height: 18%; padding-top: 10px; margin-left: 15px; margin-right: 15px; border-top: 1px solid #EBEBEB; border-bottom: 1px solid #EBEBEB;">
                            <!-- Da el nombre de la categoria en mayusculas y el nombre del producto -->
                            <p class="product-categoria"><?= strtoupper($product->getNombreCategoria()) ?></p>
                            <p class="product-name"><?= $product->getnombre() ?></p>
                        </div>
                        <div class="text-center" style="margin-bottom: 30px; margin-top: 30px">
                            <a href="#" class="btn-product-size" style="width: 80px; height: 40px">75g</a>
                            <a href="#" class="btn-product-size" style="width: 80px; height: 40px">100g</a>
                            <a href="#" class="btn-product-size" style="width: 80px; height: 40px">150g</a>
                        </div>

                        <div style="margin: 20px">
                            <p class="product-price"><?= $product->getprecio() . " €" ?></p>
                        </div>
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