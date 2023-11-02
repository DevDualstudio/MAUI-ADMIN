<?php

require_once "connection.php";

class DeleteModel
{
    public function __construct() {}
    //Permite Eliminar un Registro
    public function mdlDeleteData($tabla, $campoID, $id)
    {
        $con =  new MauiConnection();
        $con->OpenConnection();
        $sql = "delete from $tabla where $campoID = $id;";

       $query = $con->Consulta($sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Registro Eliminado Exitosamente.';
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, la eliminación de este registro fallo. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
