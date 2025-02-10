<?php
include_once './class/Conexion.php';
include_once './class/producto.php';

if (isset($_GET['id'])) {
    $idProducto = $_GET['id']; //Se obtiene el ID desde la url de productos

    // Crear instancia de conexión
    $conexion = (new Conexion())->getConexion(); //crea un nuevo objeto para la clase producto

    // Instanciar la clase Producto
    $producto = new Producto();

    // Obtener el detalle del producto
    $detalleProducto = $producto->getProductoPorId($idProducto, $conexion); //se llama al metodo


}



?>

<main class="contenido_carrito">
    <div class="carrito__1">
        <div class="box_carrito">
            <h2><?php echo htmlspecialchars($detalleProducto['nombre']); ?></h2>
            <div class="imagen__carrito"><img src="./imagenes/imagenes_juego_ps5/CUOTAS/<?php echo htmlspecialchars($detalleProducto['imagen']); ?>" alt="<?php echo htmlspecialchars($detalleProducto['nombre']); ?>">
                <a><?php echo '$' . number_format($detalleProducto['precio'], 2, ',', '.'); ?></a>
            </div> <!-- aca se muestra la imagen, el nombre y el precio del producto-->
        </div>
        <div class="texto__carrito">
            <a>
                <div class="detalle_producto">
                    <?php echo htmlspecialchars($detalleProducto['detalle']); ?>
                </div>
                <br>
                <div class="precio_producto">
                    Precio: <?php echo '$' . number_format($detalleProducto['precio'], 2, ',', '.'); ?>
                </div>
                <div class="stock_producto">
                    Stock disponible: <?php echo htmlspecialchars($detalleProducto['stock']); ?>
                </div>
            </a>
            <div class="boton_carrito">
                <button>COMPRAR</button><!--Sin lógica-->
            </div>
        </div>
    </div>
    <div class="videos_carrito">
        <div><img class="videos" src="./imagenes/index/juegos_semanales/juego_semanal_2.jpg" alt="trailer_1"></div>
        <div><img class="videos" src="./imagenes/index/juegos_semanales/juego_semanal_2.jpg" alt="trailer_2"></div>
        <div><img class="videos" src="./imagenes/index/juegos_semanales/juego_semanal_2.jpg" alt="trailer_3"></div>
    </div>
    <div class="box_comentarios_recomendados">
        <div class="comentarios_carritos">
            <h2>COMENTARIOS</h2>
            <div class="fondo_comentarios">
                <div class="comentarios"><img src="./imagenes/carrito/fotos_perfil_comentarios/foto_perfil1.jpg"
                        alt="foto_perfil_1"><a>Muy bueno el juego</a></div>
            </div>
            <div class="fondo_comentarios">
                <div class="comentarios"><img src="./imagenes/carrito/fotos_perfil_comentarios/foto_perfil2.jpg"
                        alt="foto_perfil_2"><a>Excelente</a></div>
            </div>
            <div class="fondo_comentarios">
                <div class="comentarios"><img src="./imagenes/carrito/fotos_perfil_comentarios/foto_perfil3.jpg"
                        alt="foto_perfil_3"><a>El invierno se acerca</a></div>
            </div>
        </div>
        <div class="recomendados_juego">
            <h2>Recomendacion</h2>
            <div class="fondo_barra_recomendado">
                <div class="barra_recomendado_90"><a>90%</a></div>
            </div>
            <div class="fondo_barra_recomendado">
                <div class="barra_recomendado_60"><a>60%</a></div>
            </div>
            <div class="fondo_barra_recomendado">
                <div class="barra_recomendado_40"><a>40%</a></div>
            </div>
            <div class="fondo_barra_recomendado">
                <div class="barra_recomendado_20"><a>20%</a></div>
            </div>
            <div class="fondo_barra_recomendado">
                <div class="barra_recomendado_5"><a>5%</a></div>
            </div>
        </div>
    </div>
    </div>
</main>