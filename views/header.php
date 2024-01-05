<?php
ob_start(); // Place ob_start() at the very beginning of the script to avoid header issues.
?>
<div class="bg-black d-flex justify-content-center align-items-center">
      <nav class="d-flex justify-content-center align-items-center navbar navbar-expand-lg bg-black pt-4">
        <div class="container-xl">
        <a class="nav-link text-white" href="http://localhost/PRIMOR/index.php?controller=producto">
          <div class="logo" style="background-image: url('assets/images/logo_primor.svg'); background-size:cover; background-position:center; background-repeat:no-repeat;"></div>
        </a>
          <a class="navbar-brand" href="#"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
            <form class="d-flex mx-auto" role="search">
              <input class="form-control me-2 text-black-50 searchbar" type="search" placeholder="Que te apetece para comer?" aria-label="Search">
            </form>
          </div>


        </div>
        <ul class=" d-flex flex-row justify-content-center navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=producto"><img src="assets/images/home.png" width="30" height="30" /></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=producto&action=carta"><img src="assets/images/carta.png" width="30" height="30" /></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=user&action=login"><img src="assets/images/login.png" width="30" height="30" /></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=cesta&action=cesta"><img src="assets/images/cesta.png" width="30" height="30" />
            <?php
              if (isset($_SESSION['addproducto'])) {
                // Imprime el conteo de elementos en 'addproducto', es decir, en cesta.
                echo '<div class="contador-cesta"><p class="m-0">'.count($_SESSION['addproducto']).'</p></div>';
              }
            ?>
            </a> 
          </li>
        </ul>
      </nav>
    </div>

    <nav class="navbar navbar-expand-lg bg-black ">
      <div class="container-xl">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="http://localhost/PRIMOR/index.php?controller=producto"><button class="btn text-white header-menu-link" type="submit">INICIO</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="http://localhost/PRIMOR/index.php?controller=producto&action=carta"><button class="btn text-white header-menu-link" type="submit">CARTA</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="http://localhost/PRIMOR/index.php?controller=cesta&action=cesta"><button class="btn text-white header-menu-link" type="submit">CESTA</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">TENDENCIAS</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">BIENESTAR</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">DE TEMPORADA</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">EXCLUSIVOS</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">NOVEDADES</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">REGALA PRIMOR</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">NUESTRO BLOG</button></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#!"><button class="btn text-white header-menu-link" type="submit">DESCUBRE MÁS</button></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>