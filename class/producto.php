<?php

include_once 'Conexion.php';

class Producto
{
    public $id;
    public $nombre;
    public $precio;
    public $descripcion;
    public $destalle;
    public $stock;
    public $imagen;
    public $cuotas_imperdibles;



    public function cuotas_imperdibles()
    {
        $productos = [];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM producto WHERE cuotas_imperdibles = 1";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $productos = $PDOStatement->fetchAll();
        return $productos;
    }


    public function catalogo_completo()
    {
        $catalogo = [];
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM producto";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();
        return $catalogo;
    }

    public function catalogo_x_pagina($pagina, $cantidad)
    {
        $catalogo = [];
        $conexion = (new Conexion())->getConexion();
        $offset = ($pagina - 1) * $cantidad;
        $query = "SELECT * FROM producto LIMIT $cantidad OFFSET $offset";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $catalogo = $PDOStatement->fetchAll();
        return $catalogo;
    }

    public function getProductoPorId($id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM producto WHERE id = :id";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bindParam(':id', $id, PDO::PARAM_INT); //Se asocia el parametro de id con el valor de $id en la query
        $PDOStatement->execute();

        return $PDOStatement->fetch(PDO::FETCH_ASSOC);
    }

    public function obtener_producto($id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "SELECT * FROM producto WHERE id = :id";
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); //
    }

    // public function actualizar_producto($id, $nombre, $descripcion, $precio, $imagen)
    // public function actualizar_producto($id, $nombre, $descripcion, $precio, $detalle, $stock, $imagen)
    // {
    //     $conexion = (new Conexion())->getConexion(); // Obtén la conexión
    //     $query = "UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen WHERE id = :id"; //query para editar algun producto en la bbdd
    //     $stmt = $conexion->prepare($query);
    //     $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    //     $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    //     $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
    //agrego para probar si actualiza los prodcutos
    // $stmt->bindParam(':detalle', $detalle, PDO::PARAM_STR);
    // $stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
    // $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
    // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    //me recomendo para depurar
    // var_dump($id, $nombre, $descripcion, $precio, $detalle, $stock, $imagen);
    // exit();

    //     $stmt->execute();
    // }
    public function actualizar_producto($id, $nombre, $descripcion, $precio, $detalle, $stock, $imagen)
    {
        $conexion = (new Conexion())->getConexion(); // Obtén la conexión
        $query = "UPDATE producto 
            SET nombre = :nombre, 
                descripcion = :descripcion, 
                precio = :precio, 
                detalle = :detalle, 
                stock = :stock, 
                imagen = :imagen 
              WHERE id = :id"; // Incluye detalle y stock en la consulta

        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
        $stmt->bindParam(':detalle', $detalle, PDO::PARAM_STR);
        $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
        $stmt->bindParam(':imagen', $imagen, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }





    public function eliminar_producto($id)
    {
        $conexion = (new Conexion())->getConexion();
        $query = "DELETE FROM producto WHERE id = :id"; //query para eliminar algun producto en la bbdd
        $stmt = $conexion->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function agregar_producto($nombre, $descripcion, $precio, $imagen)
    {
        $conexion = (new Conexion())->getConexion();
        $sql = "INSERT INTO producto (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen)"; //query para agregar algun producto en la bbdd
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->execute();
    }
}
