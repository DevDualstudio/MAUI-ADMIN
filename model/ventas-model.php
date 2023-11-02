<?php

require_once "connection.php";

class VentaModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Venta
    public function mdlInsertarVenta($Usuario, $Tipo, $Cliente, $Subtotal, $IVA, $Total)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarVentas($Usuario,$Tipo,$Cliente,$Subtotal,$IVA,$Total);";

       $query = $con->Consulta($sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Venta Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro de la Venta falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar un Venta
    public function mdlMostrarVenta($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaVentas WHERE Id=$Id;";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
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
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Ventas
    public function mdlMostrarListaVentas($select, $select2, $select3, $select4, $select5, $select6, $select7)
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
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaVentas $where;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Ventas Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }
    //-- Mostrar ventas 2
    public function mdlMostrarListaVentas2()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaVentas;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Venta Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }
    //-- Mostrar tipos de venta
    public function mdlMostrarListaTiposVenta()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT tv_id AS Id, tv_nombre AS Nombre FROM TipoVenta;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Tipos de Venta Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar una Venta Registrado

    public function mdlActualizarVenta($Id, $Subtotal, $IVA, $Total)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarVentas($Id, $Subtotal,$IVA,$Total);";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Venta Actualizada Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar la Venta.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Cancelar una Venta Registrado

    public function mdlVentaCancelada($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = " call VentaCancelada($Id,'Cancelada','Cancelada por Administrador');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Venta Cancelada Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo cancelar la Venta.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
