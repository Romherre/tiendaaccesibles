<?php 

session_start();

require_once "class/Conexion.php";
$conexion = new Conexion();



//Valido que mi vista tenga seccion, y si no tiene que vaya a home */
$views = isset($_GET["seccion"]) ? $_GET["seccion"] : "home";

 //Protego mi app para que no se puede ingresar por url, si no esta logueado
$protectList = ['detalle_producto', 'productos', 'sobre_nosotros'];

if(in_array($views, $protectList) && !isset($_SESSION["usuario"])){
    header("Location: index.php?seccion=login");
    exit();  // para probar algo 
}

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tienda Accesibles</title>
    <link rel="stylesheet" href="./dani/css/styles.css">
    <link rel="stylesheet" href="/dani/css/fonts.css">
    <link rel="stylesheet" href="/dani/css/index.css">
    <link rel="stylesheet" href="/dani/css/carrito.css">
    <link rel="stylesheet" href="/dani/css/juegosPC.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fontawesome.com/icons/magnifying-glass?f=classic&s=solid">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta charset="UTF-8">
</head>

<body class="conteiner__fondo">
    <?php include_once "includes/header.php" ?>
    <main class="contenido__principal">
    <?php 
    file_exists("views/$views.php") 
    ? include "views/$views.php"
    : include "views/404.php"
    ?>
    </main>
    <?php include_once "includes/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>