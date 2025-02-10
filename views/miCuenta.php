<?php
session_start();
include_once 'class/Conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id'])) {
    header("Location: login.php"); // Redirigir al login si no está autenticado
    exit();
}

// Obtener el ID del usuario desde la sesión
$id_usuario = $_SESSION['usuario']['id'];

// Crear una instancia de la clase Conexion
$conexion = new Conexion();
$db = $conexion->getConexion();

// Obtener los datos del usuario desde la base de datos
$query = "SELECT * FROM usuario WHERE id = :id_usuario"; // Se mantiene 'usuario'
$stmt = $db->prepare($query);
$stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Si no se encuentra el usuario en la base de datos
if (!$usuario) {
    echo "<div class='alert alert-danger'>Usuario no encontrado en la base de datos.</div>";
    exit();
}

// Variable para el mensaje de éxito
$mensaje = "";

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Verificar que los campos no estén vacíos
    if (empty($nombre) || empty($email) || empty($telefono)) {
        $mensaje = "<div class='alert alert-danger'>Todos los campos son obligatorios.</div>";
    } else {
        try {
            // Actualizar los datos en la base de datos
            $update_query = "UPDATE usuario SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id_usuario"; // Se mantiene 'usuario'
            $update_stmt = $db->prepare($update_query);
            $update_stmt->bindParam(':nombre', $nombre);
            $update_stmt->bindParam(':email', $email);
            $update_stmt->bindParam(':telefono', $telefono);
            $update_stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

            if ($update_stmt->execute()) {
                if ($update_stmt->rowCount() > 0) {
                    // Actualizar el nombre en la sesión
                    $_SESSION['usuario']['nombre'] = $nombre;

                    $mensaje = "<div class='alert alert-success'>Datos actualizados correctamente.</div>";

                    // Redirigir a la página de inicio después de 2 segundos
                    echo "<script>
                        setTimeout(function() {
                            window.location.href = 'index.php'; // Redirige a la home
                        }, 2000); // 2 segundos de espera
                    </script>";
                } else {
                    $mensaje = "<div class='alert alert-warning'>No hubo cambios en los datos.</div>";
                }
            } else {
                $mensaje = "<div class='alert alert-danger'>Hubo un error al actualizar los datos.</div>";
            }
        } catch (PDOException $e) {
            // Mostrar el error detallado si ocurre
            $mensaje = "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
        }
    }
}
?>

<body>
    <div class="container mt-5">
        <h2 class="justify-content-center text-center">Modificar Datos Personales</h2>
        <form action="index.php?seccion=MiCuenta" method="POST">
            <div class="form-group mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono"
                    value="<?php echo htmlspecialchars($usuario['telefono']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        <div id="mensaje">
            <?php echo $mensaje; ?> <!-- Mostrar el mensaje si se actualiza o hay un error -->
        </div>
    </div>
</body>
