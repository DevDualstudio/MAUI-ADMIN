<?php

require_once "connection.php";

class GuiaModel
{
    //Permite Registrar un Nuevo Guia
    public static function mdlInsertarGuia($Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Venta)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarGuia($Cliente, $Origen, $Destino, '$Descripcion', $Chofer, $Vehiculo, '', '$FechaExpiracion', $Venta);";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_nuevo = $row['Respuesta'];

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Guia Registrada Exitosamente.';
            $respuesta['data'] = $id_nuevo;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro de la Guia falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite Mostrar un Guia
    public static function mdlMostrarGuia($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaGuias WHERE IdGuia=$Id;";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Guia Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar la Guia.";
            $respuesta['detail'] = "No se encontró la Guia";
        }
        return $respuesta;
    }


    //Permite Mostrar la fecha de una Guia
    public static function mdlMostrarFechaGuia($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaHistorialGuia WHERE Guia = $Id AND IDEstatus = 1;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Fecha de la Guía Encontrada Exitosamente.';
            $respuesta['data'] = $data;
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el estatus de la Guia.";
            $respuesta['detail'] = "No se encontró la Guia";
        }
        return $respuesta;
    }

    //Permite Mostrar la Lista de Guias
    public static function mdlMostrarListaGuias($select, $select2, $select3, $select4, $select5, $select6, $select8, $select9, $estatus)
    {
        if ($estatus == 0) {
            $wherestatus = " WHERE IdEstatus IN(1,2,3,4,5,6,7,8,9) ";
        } else if ($estatus == 10) {
            $wherestatus = " WHERE IdEstatus != 8 ";
        } else {
            $wherestatus = " WHERE IdEstatus = $estatus ";
        }
        $where = "";
        switch ($select) {
            case 2;
                $where = " AND IdGuia = $select2";
                break;
            case 3;
                $where = " AND IdCliente  = $select3";
                break;
            case 4;
                $where = " AND IdOrigen  = $select4";
                break;
            case 5;
                $where = " AND IdDestino  = $select5";
                break;
            case 6;
                $where = " AND IdChofer  = $select6";
                break;
            case 7;
                $where = " AND IdChofer  = $select6 AND IdEstatus != 8";
                break;
            case 8;
                $where = " AND FechaExpiracion  = '$select8'";
                break;
            case 9;
                $where = " AND FechaExpiracion BETWEEN '$select8' AND '$select9'";
                break;
        }
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaGuias $wherestatus $where;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Guias Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Mostrar tipos de Guia
    public static function mdlMostrarListaEstatusGuia()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT Id AS Id, Descripcion AS Nombre FROM MAUI.ListaEstatusGuia;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Guia Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Mostrar tipos de Guia
    public static function mdlMostrarListaHistorialGuia($Id)
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaHistorialGuia WHERE Guia = $Id;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Guia Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }


    //-- Permite Actualizar una Guia Registrada

    public static function mdlActualizarGuia($Id, $Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Estatus)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarGuia($Id, $Cliente, $Origen, $Destino, '$Descripcion', $Chofer, $Vehiculo, '', '$FechaExpiracion', $Estatus);";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Guia Actualizada Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar la Guia.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
