<?php

require_once('../config/Conexion.php');

class Producto extends Conexion{
   
    

    public static function agregarproductos($id_producto, $nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare("INSERT INTO productos (id_producto, nombre_producto, precio, impuesto, stock, id_categoria, descripcion, imagen_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $consulta->bind_param('ssddisss', $id_producto, $nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen);
        $resultado = $consulta->execute();

        return $resultado;
    }

    public static function mostrarproductos(){
        $conexion = self::conectar();
        $consulta = "SELECT * from productos";
        $resultado = $conexion->query($consulta)->fetch_all(MYSQLI_ASSOC);
        if (!$resultado) return false;

        return $resultado;
    }
    public static function actualizarproductos($id_producto, $nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare ("UPDATE productos SET nombre_producto = ?,precio = ?, stock = ?, id_categoria = ?, descripcion = ?,  imagen_url = ? WHERE id_producto = ?");
        $consulta->bind_param('sddissss', $id_producto, $nombre_producto, $precio, $impuesto, $stock, $id_categoria, $descripcion, $imagen);
        $resultado = $consulta->execute();

        return $resultado;
}       


    public static function eliminarusuarios($id_producto) {
        $conexion = self::conectar();
        $consulta = $conexion->prepare ("DELETE FROM productos WHERE id_producto = ?;");
        $consulta->bind_param('s', $id_producto);
        $resultado = $consulta->execute();

        return $resultado;
}
}
?>
