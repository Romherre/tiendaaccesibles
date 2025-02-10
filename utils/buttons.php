<div
    style="display: flex; justify-content: center; align-items: center; gap: 10px; padding-top: 2px; margin-bottom: 10px;">
    

    <a href="index.php?seccion=editar_producto&id=<?php echo $producto->id; ?>" 
       class="btn btn-outline-dark" 
       style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; width: 100px;">
        Editar
    </a>

 
    <a href="index.php?seccion=eliminar_producto&id=<?php echo $producto->id; ?>" 
       class="btn btn-outline-danger" 
       style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; width: 100px;" 
       onclick="return confirm('¿Estás seguro de eliminar este producto?');">
        Eliminar
    </a>

   
    <a href="index.php?seccion=agregar_producto&id=" 
       class="btn btn-outline-primary" 
       style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; width: 100px;">
        Agregar
    </a>
</div>
