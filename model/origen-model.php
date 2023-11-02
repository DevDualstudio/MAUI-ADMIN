<?php

require_once "connection.php";

class OrigenModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Origen
    public function mdlInsertarOrigen($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarOrigen('$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais');";

       $query = $con->Consulta($sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Origen Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Origen falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar un Origen
    public function mdlMostrarOrigen($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarOrigen('$Id');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Origen Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Origen.";
            $respuesta['detail'] = "No se encontró el Origen";
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Origenes
    public function mdlMostrarListaOrigenes()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarListaOrigenes();";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Origenes Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un Origen Registrado

    public function mdlActualizarOrigen($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarOrigen('$Id','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Origen Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Origen.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
