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
    <div class="container-xl">

        <div class="text-center my-5">
            <h2 class="carta-title">TENDENCIAS</h2>
            <p>Una exquisita colección de los platos que están en boca de todos.<br>Conoce las últimas tendencias gatronómicas.</p>
        </div>

        <div class="row justify-content-between mx-3">
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

    <div class="container-xl">

        <div class="text-center my-5">
            <h2 class="carta-title">MER À VERSAILLES</h2>
            <p>Un menú inspirado en las frias aguas del atlántico norte pero abrigado por la majestuosidad del neoclásico Versalles.<br>Descubre una brisa refrescante y con sabor floral en cada bocado.</p>
        </div>

        <div class="row justify-content-between mx-3">
            <?php foreach ($allProducts as $product) {
                if ($product->getcategoria_id() == 10) { ?>
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

    <div class="container-xl">

        <div class="text-center my-5">
            <h2 class="carta-title">ECRESANT DES FEUILLES</h2>
            <p>Un menú otoñal que celebra los ingredientes y sabores que se encuentran en su apogeo durante esta temporada.<br>Disfruta de una experiencia culinaria cálida y reconfortante.</p>
        </div>

        <div class="row justify-content-between mx-3">
            <?php foreach ($allProducts as $product) {
                if ($product->getcategoria_id() == 11) { ?>
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


    <?php include_once "views/footer.php" ?>
</html>