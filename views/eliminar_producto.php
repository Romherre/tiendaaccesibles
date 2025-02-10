<?php


if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include_once './class/Conexion.php';
include_once './class/producto.php';

$id = $_GET['id'];
$productos = new Producto();
$productos->eliminar_producto($id);

header("Location: index.php?seccion=admin_panel");
exit();
?>
