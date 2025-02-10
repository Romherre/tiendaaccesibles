<?php

include_once './class/Conexion.php';
include_once './class/producto.php';




if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = [
        'rol' => 'admin', 
        'nombre' => 'Nombre del Usuario'
    ];
}

$usuario = $_SESSION['usuario'];

$productos = new Producto();

// Llama a la función para obtener los productos con cuotas imperdibles
$cuotas_imperdibles = $productos->cuotas_imperdibles();

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$catalogo = $productos->catalogo_x_pagina($pagina, 4);

$catalogo_completo = $productos->catalogo_completo();
$paginas = ceil(count($catalogo_completo) / 4);

$productos_unicos = array_filter($catalogo, function ($producto) use ($cuotas_imperdibles) {
    foreach ($cuotas_imperdibles as $cuota) {
        if ($producto->id === $cuota->id) {
            return false; // Filtrar el producto si ya está en cuotas imperdibles
        }
    }
    return true;
});

?>

<body class="conteiner__fondo">
<style>
        .bienvenida {
            background-color: #0F1127; 
            color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .bienvenida h1 {
            font-size: 2.5rem;
            font-family:font_titulo;
        }

        .bienvenida p {
            font-size: 1.2rem;
            font-family:font_titulo;
        }
</style>
<main class="productos">
        <div class="container mt-2">
            <div class="bienvenida text-center">
                <h1>¡Bienvenido/a, <?php echo $usuario['nombre']; ?>!</h1>
                <p>
                    <?php
                    if ($usuario['rol'] === 'admin') {
                        echo "Estás gestionando los productos como Administrador.";
                    } else {
                        echo "Explora nuestros productos y encuentra las mejores ofertas.";
                    }
                    ?>
                </p>
            </div>
        </div>

        <div class="producto_cuotas">
            <h2 class="mt-5">CUOTAS IMPERDIBLES</h2>
            <div class="carrousel_cuotas">
                <?php
                foreach ($cuotas_imperdibles as $producto) { ?>
                    <div class="catalogo__juegos1">
                        <a href="index.php?seccion=detalle_producto&id=<?php echo $producto->id; ?>" target="_blank">
                            <img src="./imagenes/imagenes_juego_ps5/CUOTAS/<?php echo $producto->imagen; ?>"
                                alt="<?php echo $producto->nombre; ?>" class="img-fluid">
                        </a>
                        <h4><?php echo $producto->nombre; ?></h4>
                        <p><strong>Precio: $<?php echo number_format($producto->precio, 2); ?></strong></p>
                        <p><?php echo $producto->descripcion; ?></p>

                        <?php
                        if ($usuario['rol'] === 'admin') {
                            // Mostrar botones solo para el administrador
                            include './utils/buttons.php';
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="marco__juegos">
            <div class="juegos_semanales1">
                <?php foreach ($catalogo as $producto) { ?>
                    <div class="catalogo__juegos1">
                        <a href="index.php?seccion=detalle_producto&id=<?php echo $producto->id; ?>" target="_blank">
                            <img src="./imagenes/imagenes_juego_ps5/CUOTAS/<?php echo $producto->imagen; ?>"
                                alt="catalogo_1" class="img-fluid">
                        </a>
                        <h4><?php echo $producto->nombre; ?></h4>
                        <p><strong>Precio: $<?php echo number_format($producto->precio, 2); ?></strong></p>
                        <p><?php echo $producto->descripcion; ?></p>

                        <?php
                        if ($usuario['rol'] === 'admin') {
                            // Mostrar botones solo para el administrador
                            include './utils/buttons.php';
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <nav class="paginado">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $paginas; $i++) { ?>
                    <li class="page-item"><a class="page-link"
                            href='index.php?seccion=productos&pagina=<?= $i ?>'><?= $i ?></a></li>
                <?php } ?>
            </ul>
        </nav>
    </main>
</body>