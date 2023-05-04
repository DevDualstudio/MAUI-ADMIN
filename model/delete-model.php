<?php

require_once "connection.php";

class DeleteModel
{
    //Permite Eliminar un Registro
    public static function mdlDeleteData($tabla, $campoID, $id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "delete from $tabla where $campoID = $id;";

        $query = mysqli_query($connection, $sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Registro Eliminado Exitosamente.';
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, la eliminación de este registro fallo. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
