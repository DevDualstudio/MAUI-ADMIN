<?php

require_once "connection.php";

class PuestoModel
{
    //Permite Registrar un Nuevo Puesto
    public static function mdlInsertarPuestos($Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarPuestos('$Nombre','$Descripcion',$AA,$AS,$AU,$WA,$WS,$WU);";

        $query = mysqli_query($connection, $sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Puesto Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del puesto falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite  Mostrar un Puesto
    public static function mdlMostrarPuesto($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarPuesto('$Id');";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Puesto Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Puesto.";
            $respuesta['detail'] = "No se encontró el Puesto";
        }
        return $respuesta;
    }

    //Permite Mostrar la Lista de Puestos
    public static function mdlMostrarListaPuestos()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "call MostrarListaPuestos();";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Puestos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un Puesto Registrado
    public static function mdlActualizarPuestos($Id, $Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarPuestos('$Id','$Nombre','$Descripcion',$AA,$AS,$AU,$WA,$WS,$WU);";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Puesto Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Puesto.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
