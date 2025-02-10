<?php if (!isset($isIndex)) $isIndex = false; ?>
<div class="menu <?php echo $isIndex ? '' : 'menu-solo-nav'; ?>">
    <input class="menu__checkbox" type="checkbox" id="open-menu">
    <label for="open-menu" class="menu__open-nav-button">=</label>
    <div class="nav__mobile">
        <div class="nav__mobile-lista">
            <div class="nav__mobile-links"><a href="./views/productos.php">Productos</a></div>
            <div class="nav__mobile-links"><a href="./views/sobre_nosotros.php">Sobre Nosotros</a></div>
            <div class="nav__mobile-links"><a href="./views/login.php">Login</a></div>
            <div class="nav__mobile-links"><a href="./views/registro.php">Registro</a></div>
        </div>
    </div>
</div>
<nav class="nav__desktop">
    <a class="nav__links" href="./views/productos.php">Productos</a>
    <a class="nav__links" href="./views/sobre_nosotros.php">Sobre Nosotros</a>
    <a class="nav__links" href="./views/login.php">Login</a>
    <a class="nav__login" href="./views/registro.php" target="_blank">Registro</a>
</nav>