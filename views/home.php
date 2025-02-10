
<?php
// Verificar si el usuario está logueado
if (isset($_SESSION["usuario"])) {
    // Obtener el nombre del usuario desde la sesión
    $nombreUsuario = $_SESSION["usuario"]["nombre"] ?? "Usuario";
    echo "
    <div class='container mb-3'>
        <div class='bienvenida text-center'>
            <h1>¡Bienvenido/a de nuevo, $nombreUsuario!</h1>
            <p>Explora nuestras promociones!!.</p>
        </div>
    </div>";
} else {
    echo "
    <div class='container mb-3'>
        <div class='bienvenida text-center'>
            <h1>¡Bienvenido/a a Accesibles!</h1>
            <p>Inicia sesión para disfrutar de una experiencia personalizada y acceder a nuestras ofertas especiales.</p>
        </div>
    </div>";
}
?>

<style>
    .bienvenida {
    background-color: rgba(15, 17, 39, 0.8); /* Fondo semi-transparente */
    color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    max-width: 80%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10; /* Asegura que quede sobre el carrusel */
    text-align: center;
}

    .bienvenida h1 {
        font-size: 2.5rem;
        font-family: font_titulo;
    }
    .bienvenida p {
        font-size: 1.2rem;
        font-family: font_titulo;
    }
</style>
<main class="contenido__principal">
    <div class="banner__semanal">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>


                <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-block w-100">
                        <!-- <a href="index.php?seccion=login"> -->
                        <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                            <img class="imagen_semanal" src="./imagenes/index/carrousel/fondo_amarillo.png"
                                alt="imagen_1"> </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-block w-100">
                        <!-- <a href="index.php?seccion=login"> -->
                        <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                            <img class="imagen_semanal" src="./imagenes/index/carrousel/smart.png"
                                alt="imagen_2"> </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-block w-100">
                        <!-- <a href="index.php?seccion=login"> -->
                        <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                            <img class="imagen_semanal" src="./imagenes/index/carrousel/violeta.png"
                                alt="imagen_3"></a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="marco__juegos_semanales">
        <div class="promos__semanales1">
            <div class="promos__juegos1">
                <!-- <a href="index.php?seccion=login"> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                    <img src="./imagenes/index/juegos_semanales/juego_semanal_1.jpg" alt="oferta_1" height="210"
                        width="330"></a>
                Juego 1 en oferta semanal hasta un 80%
            </div>
            <div class="promos__juegos1">
                <!-- <a href="index.php?seccion=login"> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                    <img src="./imagenes/index/juegos_semanales/juego_semanal_2.jpg" alt="oferta_2" height="210"
                        width="330"></a>
                Juego 2 en oferta semanal hasta un 80%
            </div>
            <div class="promos__juegos1">
                <!-- <a href="index.php?seccion=login"> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                    <img src="./imagenes/index/juegos_semanales/juego_semanal_3.jpeg" alt="oferta_3" height="210"
                        width="330"></a>
                Juego 3 en oferta semanal hasta un 80%
            </div>
            <div class="promos__juegos1">
                <!-- <a href="index.php?seccion=login"> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                    <img src="./imagenes/index/juegos_semanales/juego_semanal_4.jpeg" alt="oferta_4" height="210"
                        width="330"></a>
                Juego 4 en oferta semanal hasta un 80%
            </div>
            <div class="promos__juegos1">
                <!-- <a href="index.php?seccion=login"> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                    <img src="./imagenes/index/juegos_semanales/juego_semanal_5.jpg" alt="oferta_5" height="210"
                        width="330"></a>
                Juego 5 en oferta semanal hasta un 80%
            </div>
            <div class="promos__juegos1">
                <!-- <a href="index.php?seccion=login"> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">
                    <img src="./imagenes/index/juegos_semanales/juego_semanal_6.jpg" alt="oferta_6" height="210"
                        width="330"></a>
                Juego 6 en oferta semanal hasta un 80%
            </div>
        </div>
    </div>

    <div class="marco_generos">
        <div class="titulo_generos">
            <h2>EXPLORA LOS DIFERENTES GENEROS</h2>
        </div>
        <!-- <div class="box_generos">
        <div class="generos">
        <img src="./imagenes/index/Generos/generos_1.jpg" alt="genero_1">
                <a href="index.php?seccion=login">SHOOTER</a>
        </div> -->
        <div class="box_generos">
            <div class="generos">
                <img src="./imagenes/index/Generos/generos_1.jpg" alt="genero_1">
                <!-- <a href="index.php?seccion=productos">SHOOTER</a> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">SHOOTER</a>
            </div>

            <div class="generos">
                <img src="./imagenes/index/Generos/generos_2.jpg" alt="genero_2">
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">MUNDO ABIERTO</a>
            </div>
            <div class="generos">
                <img src="./imagenes/index/Generos/generos_3.jpg" alt="genero_3">
                <!-- <a href="index.php?seccion=productos">DEPORTES</a> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">DEPORTES</a>
            </div>
            <div class="generos">
                <img src="./imagenes/index/Generos/generos_4.jpg" alt="genero_4">
                <!-- <a href="index.php?seccion=login">TERROR</a> -->
                <a href="<?php echo isset($_SESSION['usuario']) ? 'index.php?seccion=productos' : 'index.php?seccion=login'; ?>">TERROR</a>
            </div>
        </div>
    </div>
</main>
