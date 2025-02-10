<?php

//inicio session
session_start();

//Borro todos sus valores
$_SESSION = [];

//Borrar session
session_destroy();

//Eliminar cookie
setcookie("user", "", time() - 1); //vencé antes y se borra la cookie

//Redireccionar
header("Location: index.php?seccion=home");