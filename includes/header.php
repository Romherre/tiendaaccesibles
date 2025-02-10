<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Accesibles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Archivo CSS personalizado -->
    <style>
        .logo img {
            border-radius: 50%;
            object-fit: cover;
        }
        .container {
            padding: 20px 0;
        }
        .nav .nav-item {
            margin: 0 15px;
        }
        .social-icons img {
            margin-left: 15px;
        }
        .form-control {
            width: 250px;
        }
        .d-flex.align-items-center {
            gap: 20px;
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center">
                <a href="index.php?seccion=home">
                    <img src="./imagenes/logos/talogo.png" alt="logo_pagina" height="60" width="60">
                </a>
                <a href="index.php?seccion=home" class="text-white text-decoration-none ms-4">
                    <h1 class="mb-0">Tienda Accesibles</h1>
                </a>
            </div>
            <nav class="d-none d-md-block">
                <ul class="nav">
                    <!-- <?php if(!isset($_SESSION['usuario'])) {?> -->
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=login">Login</a></li>
                    <!-- <?php } else { ?> -->
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=productos">Productos</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=sobre_nosotros">Sobre Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=miCuenta">Mi cuenta</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=cerrar_session">Cerrar sesión</a></li>
                    <!-- <?php } ?> -->
                </ul>
            </nav>
            <div class="d-flex align-items-center">
                <input type="text" class="form-control me-3" placeholder="Buscar...">
                <div class="social-icons d-flex align-items-center">
                    <a href="https://www.tiktok.com" target="_blank"><img src="./imagenes/logos/logo_tiktok.png" alt="TikTok" height="30"></a>
                    <a href="https://www.instagram.com" target="_blank"><img src="./imagenes/logos/logo_instagram.png" alt="Instagram" height="30"></a>
                    <a href="https://www.facebook.com" target="_blank"><img src="./imagenes/logos/logo_facebook.png" alt="Facebook" height="30"></a>
                </div>
                <button class="btn btn-outline-light ms-3 d-md-none" id="menu-toggle">☰</button>
            </div>
        </div>
        <div class="d-md-none bg-dark p-3 collapse" id="mobile-menu">
            <ul class="nav flex-column">
                <!-- <?php if(!isset($_SESSION['usuario'])) {?> -->
                    <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=home">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=login">Login</a></li>
                <!-- <?php } else { ?> -->
                    <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=productos">Productos</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=sobre_nosotros">Sobre Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=miCuenta">Mi cuenta</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="index.php?seccion=cerrar_session">Cerrar sesión</a></li>
                <!-- <?php } ?> -->
            </ul>
        </div>
    </header>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('show');
        });
    </script>
</body>
</html>
