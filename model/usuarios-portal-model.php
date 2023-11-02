<?php

require_once "connection.php";

class UsuarioPortalModel
{
    public function __construct() {}
    //Permite Registrar un Nuevo UsuarioPortal
    public function mdlInsertarUsuarioPortal($Empleado, $Email, $Pass)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call InsertarUsuarioPortal($Empleado,'$Email', '$Pass');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Usuario Portal Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Usuario Portal falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite  Mostrar un UsuarioPortal
    public function mdlMostrarUsuarioPortal($Id)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaUsuariosPortal WHERE Id =$Id;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $data = $row;

            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Usuario Portal Encontrado Exitosamente.';
            $respuesta['data'] = $data;
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo encontrar el Usuario Portal.";
            $respuesta['detail'] = "No se encontró el UsuarioPortal";
        }
        $con->CierraConexion();
        return $respuesta;
    }

    //Permite Mostrar la Lista de UsuarioPortals
    public function mdlMostrarListaUsuariosPortal()
    {
        $filas = array();
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "SELECT * FROM ListaUsuariosPortal;";
        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            while ($row = $con->Resultados( $result )) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Usuarios del Portal Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        $con->CierraConexion();
        return $respuesta;
    }

    //-- Permite Actualizar un UsuarioPortal Registrado

    public function mdlActualizarUsuarioPortal($Id, $Empleado, $Email, $Estatus)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarUsuariosPortal($Id,$Empleado,'$Email','$Estatus');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Usuario Portal Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Usuario Portal.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }

    public function mdlActualizarPasswordUsuarioPortal($Id, $Pass)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call ActualizarPasswordUsuarioPortal($Id,'$Pass');";

       $query = $con->Consulta($sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Contraseña del Usuario Portal Actualizada Exitosamente.';
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Usuario Portal.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
        }
        $con->CierraConexion();
        return $respuesta;
    }
}
