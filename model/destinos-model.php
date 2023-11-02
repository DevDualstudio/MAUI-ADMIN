<?php

require_once "connection.php";

class DestinoModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Destino
    public function mdlInsertarDestino($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarDestino('$Nombre','$Domicilio','$Colonia','$CP','$Ciudad','$Estado','$Pais', $IdCliente);";

       $query = $con->Consulta($sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Destino Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Destino falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar un Destino
    public function mdlMostrarDestino($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarDestino('$Id');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Destino Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Destino.";
            $respuesta['detail'] = "No se encontró el Destino";
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Destinos
    public function mdlMostrarListaDestinos()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarListaDestinos();";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Destinos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un Destino Registrado

    public function mdlActualizarDestino($Id, $Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarDestino('$Id', '$Nombre','$Domicilio','$Colonia','$CP','$Ciudad','$Estado','$Pais');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Destino Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Destino.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
