<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "./class/Conexion.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Obtener conexión
    $conexion = (new Conexion())->getConexion();

    // Buscar el usuario en la base de datos
    $query = "SELECT * FROM usuario WHERE email = :email";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener usuario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verificar contraseña hasheada
        if (password_verify($pass, $usuario["password"])) {
            $_SESSION['usuario'] = $usuario;

            // Redirección por rol
            header("Location: index.php?seccion=productos");
            exit(); // 🚀 IMPORTANTE: Agregado exit() para evitar errores en la redirección
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado, debe registrarse";
    }
}
?>


<div class="container mt-5">
    <h2>Login</h2>
    <form action="index.php?seccion=login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
        <a href="index.php?seccion=registro" type="submit" class="btn btn-primary">Registrarse</a>
    </form>
    <br>
    <br>
</div>