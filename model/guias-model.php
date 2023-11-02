<?php

require_once "connection.php";

class GuiaModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Guia
    public function mdlInsertarGuia($Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Venta)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarGuia($Cliente, $Origen, $Destino, '$Descripcion', $Chofer, $Vehiculo, '', '$FechaExpiracion', $Venta);";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $id_nuevo = $row['Respuesta'];

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Guia Registrada Exitosamente.';
            $respuesta['data'] = $id_nuevo;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro de la Guia falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar un Guia
    public function mdlMostrarGuia($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaGuias WHERE IdGuia=$Id;";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
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
        $con->CierraConexion();
        return $respuesta;
    }


    //Permite Mostrar la fecha de una Guia
    public function mdlMostrarFechaGuia($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaHistorialGuia WHERE Guia = $Id AND IDEstatus = 1;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
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
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Guias
    public function mdlMostrarListaGuias($select, $select2, $select3, $select4, $select5, $select6, $select8, $select9, $estatus)
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
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaGuias $wherestatus $where;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Guias Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Mostrar tipos de Guia
    public function mdlMostrarListaEstatusGuia()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT Id AS Id, Descripcion AS Nombre FROM MAUI.ListaEstatusGuia;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Guia Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Mostrar tipos de Guia
    public function mdlMostrarListaHistorialGuia($Id)
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaHistorialGuia WHERE Guia = $Id;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Guia Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }


    //-- Permite Actualizar una Guia Registrada

    public function mdlActualizarGuia($Id, $Cliente, $Origen, $Destino, $Descripcion, $Chofer, $Vehiculo, $FechaExpiracion, $Estatus)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarGuia($Id, $Cliente, $Origen, $Destino, '$Descripcion', $Chofer, $Vehiculo, '', '$FechaExpiracion', $Estatus);";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Guia Actualizada Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar la Guia.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
