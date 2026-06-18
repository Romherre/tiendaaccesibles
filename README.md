# Tienda Accesibles

Tienda online desarrollada en PHP con sesiones, login de usuario y conexión a base de datos. Incluye catálogo de productos, detalle de producto, carrito de compra y protección de vistas para usuarios no logueados.

## Funcionalidad

- Login de usuario con sesiones PHP (`session_start`).
- Vistas protegidas: el acceso a productos, detalle de producto y "sobre nosotros" requiere estar logueado.
- Conexión a base de datos mediante clase `Conexion`.
- Estructura por vistas (`views/`), con página 404 propia.
- Carrito de compras.

## Tecnologías

PHP, MySQL, HTML, CSS, Bootstrap 5.

## Cómo correrlo localmente

Este proyecto requiere un servidor con soporte PHP y base de datos (por ejemplo XAMPP o WAMP), por lo que no tiene demo en vivo vía GitHub Pages (no soporta PHP). Para probarlo:

1. Cloná el repositorio dentro de la carpeta `htdocs` de tu servidor local.
2. Creá la base de datos correspondiente e importá el esquema.
3. Iniciá Apache/MySQL y accedé a `index.php` desde el navegador.

---
Desarrollado por **Romina Herrera** · [LinkedIn](https://www.linkedin.com/in/romina-herreramicv/)
