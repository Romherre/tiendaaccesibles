<?php

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include_once './class/Producto.php';
include_once './class/Conexion.php';

$productos = new Producto();

$id = $_GET['id'];
$producto = $productos->obtener_producto($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $detalle = $_POST['detalle']; // Nuevo campo para detalle
    $stock = $_POST['stock'];     // Nuevo campo para stock

    // $imagen = $_FILES['imagen']['name'];
    // if ($imagen) {
    //     $imagen_tmp = $_FILES['imagen']['tmp_name'];
    //     $imagen_path = '../imagenes/imagenes_juego_ps5/CUOTAS/' . $imagen;
    //     move_uploaded_file($imagen_tmp, $imagen_path);
    // } else {
    //     $imagen = $producto->imagen;
    // }

    $imagen = $_FILES['imagen']['name'];
    if ($imagen) {
        // Procesar la nueva imagen subida
        $imagen_tmp = $_FILES['imagen']['tmp_name'];
        $imagen = preg_replace('/[^A-Za-z0-9\.\-_]/', '_', $imagen); // Limpiar el nombre del archivo
        $imagen_path = './imagenes/imagenes_juego_ps5/CUOTAS/' . $imagen;
    
        // Mover el archivo al destino
        move_uploaded_file($imagen_tmp, $imagen_path);
    } else {
        // Usar la imagen anterior si no se sube una nueva
        $imagen = $producto->imagen ?? ''; // Usar un valor predeterminado si no hay imagen previa
    }




    $productos->actualizar_producto($id, $nombre, $descripcion, $precio, $detalle, $stock, $imagen); //aca agregue detalle y stock
    header("Location: index.php?seccion=admin_panel");
    exit();
}
?>


<div class="container mt-5">
    <h1 class="mb-4">Editar Producto</h1>
    <form action="" method="POST" enctype="multipart/form-data" class="card p-4 shadow-sm">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $producto->nombre; ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required><?php echo $producto->descripcion; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" value="<?php echo $producto->precio; ?>" required>
        </div>
        <!-- se agrega detalle y stock -->
        <div class="mb-3">
            <label for="detalle" class="form-label">Detalle:</label>
            <textarea name="detalle" id="detalle" class="form-control" required><?php echo $producto->detalle; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <input type="number" name="stock" id="stock" class="form-control" value="<?php echo $producto->stock; ?>" required>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen:</label>
            <input type="file" name="imagen" id="imagen" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="index.php?seccion=productos" class="btn btn-secondary">Volver</a>

    </form>
</div>