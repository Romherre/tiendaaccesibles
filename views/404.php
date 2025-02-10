<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>


    <style>
        body {
            background: linear-gradient(135deg, #0d1b2a, #1b263b, #415a77, #1b263b, #0d1b2a);
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
        }


        .gif-404 {
            display: block;
            margin: 30px auto;
            box-shadow: 0 15px 25px rgba(255, 165, 0, 0.5), 0 0 30px rgba(255, 140, 0, 0.5);
            border-radius: 15px;
            background-color: #0d1b2a;
            /* Color similar al fondo para disimular la línea */
        }

        .content {
            text-align: center;
            margin-top: 50px;
        }

        a.btn {
            background-color: #415a77;
            border-color: #415a77;
        }

        a.btn:hover {
            background-color: #1b263b;
            border-color: #1b263b;
        }
    </style>

    <main class="content">
        <h1>Error 404</h1>
        <p>Lo sentimos, la página que estás buscando no existe.</p>
        <img class="gif-404" src="../imagenes/404/404.gif" alt="Error 404">
        <!-- Recuerde que el boton no dirige al home,como acordamos en clase -->
        <a href="../index.php?seccion=home" class="btn btn-primary mt-3">Volver al Inicio</a>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
