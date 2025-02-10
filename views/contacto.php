<div class="container mt-5">
    <h2>Ingrese los datos solicitados</h2>
    <form action="index.php?seccion=login" method="post">
    <div class="mb-3">
            <label for="name_user" class="form-label">Nombre completo</label>
            <input type="name_user" class="form-control" id="name_user" name="name_user" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="telephone" class="form-label">Teléfono</label>
            <input type="telephone" class="form-control" id="telephone" name="telephone" required>
        </div>
        <div class="mb-3">
        <textarea class="form-control" aria-label="With textarea" placeholder="*Descripción"></textarea>

        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
