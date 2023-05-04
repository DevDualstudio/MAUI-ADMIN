<?php

require_once "connection.php";

class ProductoModel
{
    //Permite Registrar un Nuevo Producto
    public static function mdlInsertarProducto($Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarProductos('$Nombre','$DescripPr','$ExpiracionPr','$PrecioPr','$Imagen1','$Imagen2','$Imagen3', '$Imagen4','$Imagen5');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Producto Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Producto falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite Mostrar un Producto
    public static function mdlMostrarProducto($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarProducto('$Id');";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Producto Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Producto.";
            $respuesta['detail'] = "No se encontró el Producto";
        }
        return $respuesta;
    }

    //Permite Mostrar la Lista de Productos
    public static function mdlMostrarListaProductos()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarListaProductos();";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Productos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un Producto Registrado

    public static function mdlActualizarProducto($Id, $Nombre, $DescripPr, $ExpiracionPr, $PrecioPr, $Imagen1, $Imagen2, $Imagen3, $Imagen4, $Imagen5, $Estatus)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarProductos('$Id', '$Nombre','$DescripPr','$ExpiracionPr','$PrecioPr','$Imagen1','$Imagen2','$Imagen3','$Imagen4','$Imagen5','$Estatus');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Producto Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Producto.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
