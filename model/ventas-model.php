<?php

require_once "connection.php";

class VentaModel
{
    //Permite Registrar un Nuevo Venta
    public static function mdlInsertarVenta($Usuario, $Tipo, $Cliente, $Subtotal, $IVA, $Total)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarVentas($Usuario,$Tipo,$Cliente,$Subtotal,$IVA,$Total);";

        $query = mysqli_query($connection, $sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Venta Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro de la Venta falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite Mostrar un Venta
    public static function mdlMostrarVenta($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaVentas WHERE Id=$Id;";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Venta Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Venta.";
            $respuesta['detail'] = "No se encontró el Venta";
        }
        return $respuesta;
    }

    //Permite Mostrar la Lista de Ventas
    public static function mdlMostrarListaVentas($select, $select2, $select3, $select4, $select5, $select6, $select7)
    {
        $where = "";
        switch ($select) {
            case 2;
                $where = " WHERE Id = $select2";
                break;
            case 3;
                $where = " WHERE IdUsuario  = $select3";
                break;
            case 4;
                $where = " WHERE IdTipoVenta  = $select4";
                break;
            case 5;
                $where = " WHERE IdCliente  = $select5";
                break;
            case 6;
                $where = " WHERE FechaVenta  = '$select6'";
                break;
            case 7;
                $where = " WHERE FechaVenta BETWEEN '$select6' AND '$select7'";
                break;
        }
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaVentas $where;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Ventas Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }
    //-- Mostrar ventas 2
    public static function mdlMostrarListaVentas2()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaVentas;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Venta Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }
    //-- Mostrar tipos de venta
    public static function mdlMostrarListaTiposVenta()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT tv_id AS Id, tv_nombre AS Nombre FROM TipoVenta;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Venta Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar una Venta Registrado

    public static function mdlActualizarVenta($Id, $Subtotal, $IVA, $Total)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarVentas($Id, $Subtotal,$IVA,$Total);";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Venta Actualizada Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar la Venta.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //-- Permite Cancelar una Venta Registrado

    public static function mdlVentaCancelada($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = " call VentaCancelada($Id,'Cancelada','Cancelada por Administrador');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Venta Cancelada Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo cancelar la Venta.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
