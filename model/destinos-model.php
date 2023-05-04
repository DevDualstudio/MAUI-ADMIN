<?php

require_once "connection.php";

class DestinoModel
{
    //Permite Registrar un Nuevo Destino
    public static function mdlInsertarDestino($Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarDestino('$Nombre','$Domicilio','$Colonia','$CP','$Ciudad','$Estado','$Pais', $IdCliente);";

        $query = mysqli_query($connection, $sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Destino Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Destino falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite Mostrar un Destino
    public static function mdlMostrarDestino($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarDestino('$Id');";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
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
        return $respuesta;
    }

    //Permite Mostrar la Lista de Destinos
    public static function mdlMostrarListaDestinos()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarListaDestinos();";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Destinos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un Destino Registrado

    public static function mdlActualizarDestino($Id, $Nombre, $Domicilio, $Colonia, $CP, $Ciudad, $Estado, $Pais, $IdCliente)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarDestino('$Id', '$Nombre','$Domicilio','$Colonia','$CP','$Ciudad','$Estado','$Pais');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Destino Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Destino.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
