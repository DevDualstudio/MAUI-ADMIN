<?php

require_once "connection.php";

class PuestoModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo Puesto
    public function mdlInsertarPuestos($Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarPuestos('$Nombre','$Descripcion',$AA,$AS,$AU,$WA,$WS,$WU);";

       $query = $con->Consulta($sql);
        if ($query) {

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Puesto Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del puesto falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite  Mostrar un Puesto
    public function mdlMostrarPuesto($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarPuesto('$Id');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
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
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de Puestos
    public function mdlMostrarListaPuestos()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call MostrarListaPuestos();";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Puestos Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un Puesto Registrado
    public function mdlActualizarPuestos($Id, $Nombre, $Descripcion, $AA, $AS, $AU, $WA, $WS, $WU)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarPuestos('$Id','$Nombre','$Descripcion',$AA,$AS,$AU,$WA,$WS,$WU);";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Puesto Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Puesto.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
