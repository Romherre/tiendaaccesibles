<?php


// Verificar si el usuario tiene rol de admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include_once './class/Conexion.php';
include_once './class/producto.php';

$productos = new Producto();
$catalogo_completo = $productos->catalogo_completo();
?>


<div class="container mt-5">
    <header class="d-flex justify-content-between align-items-center">
        <div>
            <!-- Agregue el mensaje de bienvenida al panel -->
            <h1>Panel de Administración</h1>
            <h4>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?>!</h4>
        </div>
        <div>
            <a href="index.php" class="btn btn-primary">Ir al Home</a>
            <a href="index.php?seccion=productos" class="btn btn-secondary">Ver Productos</a>
            <a href="index.php?seccion=agregar_producto" class="btn btn-success">Agregar Producto</a>
        </div>
    </header>

    <section class="mt-4">
        <h2>Lista de Productos</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($catalogo_completo as $producto) { ?>
                    <tr>
                        <td><?php echo $producto->id; ?></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td>$<?php echo number_format($producto->precio, 2); ?></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="index.php?seccion=editar_producto&id=<?php echo $producto->id; ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="index.php?seccion=eliminar_producto&id=<?php echo $producto->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</div>