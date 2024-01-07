<?php
ob_start(); // Place ob_start() at the very beginning of the script to avoid header issues.
?>
<div class="bg-black d-flex justify-content-center align-items-center">
      <nav class="d-flex justify-content-center align-items-center navbar navbar-expand-lg bg-black pt-4">
        <div class="container-xl">
        <a class="nav-link text-white" href="http://localhost/PRIMOR/index.php?controller=producto">
          <div class="logo" style="background-image: url('assets/images/logo_primor.svg'); background-size:cover; background-position:center; background-repeat:no-repeat;"></div>
        </a>

          <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
            <form class="d-flex m-auto" role="search">
              <input class="form-control me-2 text-black-50 searchbar" type="search" placeholder="¿Qué te apetece para comer?" aria-label="Search">
            </form>
          </div>


        </div>
        <ul class=" d-flex flex-row justify-content-center navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=producto"><img src="assets/icons/home.svg" width="30" height="30" alt="Icono de inicio."></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=producto&action=carta"><img src="assets/icons/carta.svg" width="30" height="30" alt="Icono de carta."></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=user&action=login"><img src="assets/icons/login.svg" width="30" height="30" alt="Icono de panel de usuario."></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/PRIMOR/index.php?controller=cesta&action=cesta"><img src="assets/icons/cesta.svg" width="30" height="30" alt="Icono de cesta.">
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

    <nav class="navbar navbar-expand-lg bg-black  display-mode-off">
      <div class="container-xl  display-mode-off">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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