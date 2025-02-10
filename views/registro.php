<?php
include_once "class/Conexion.php";

// Pregunto si están seteados username, email, password, pass2 y telefono
if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["pass2"]) && isset($_POST["telefono"])) {
    try {
        // Me traigo una conexión
        $conexion = (new Conexion())->getConexion();

        // Valido los caracteres ingresados
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $pass = htmlspecialchars($_POST["password"]);
        $pass2 = htmlspecialchars($_POST["pass2"]);
        $telefono = htmlspecialchars($_POST["telefono"]); // Cambié "telephone" por "telefono"

        // Verifico que las contraseñas ingresadas sean iguales
        if ($pass === $pass2) {
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

            // Insertar en la base de datos con los nombres correctos de las columnas
            $query = "INSERT INTO usuario (usuario, email, password, telefono) VALUES (:username, :email, :password, :telefono)";
            $stmt = $conexion->prepare($query);
            $stmt->execute([
                "username" => $username,
                "email" => $email,
                "password" => $hashedPass,
                "telefono" => $telefono // ✅ Ahora coincide con la base de datos
            ]);

            // Redireccionar al login
            header("Location: index.php?seccion=home");
            exit();
        } else {
            echo "Las contraseñas no coinciden";
        }
    } catch (Exception $e) {
        echo "No se puede registrar el usuario: " . $e->getMessage();
    }
}
?>

<div class="container mt-5">
    <h2>Registro</h2>
    <form action="index.php?seccion=registro" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="pass2" class="form-label">Confirmar Contraseña</label>
            <input type="password" class="form-control" id="pass2" name="pass2" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>
