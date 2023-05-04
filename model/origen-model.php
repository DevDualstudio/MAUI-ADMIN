<?php

require_once "connection.php";

class OrigenModel
{
    //Permite Registrar un Nuevo Origen
    public static function mdlInsertarOrigen($Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarOrigen('$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais');";

        $query = mysqli_query($connection, $sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Origen Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Origen falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite Mostrar un Origen
    public static function mdlMostrarOrigen($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarOrigen('$Id');";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
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
        return $respuesta;
    }

    //Permite Mostrar la Lista de Origenes
    public static function mdlMostrarListaOrigenes()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarListaOrigenes();";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Origenes Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un Origen Registrado

    public static function mdlActualizarOrigen($Id, $Nombre, $Direccion, $Colonia, $CP, $Ciudad, $Estado, $Pais)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarOrigen('$Id','$Nombre','$Direccion','$Colonia','$CP','$Ciudad','$Estado','$Pais');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Origen Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Origen.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
