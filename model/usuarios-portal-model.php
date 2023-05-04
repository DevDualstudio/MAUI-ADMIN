<?php

require_once "connection.php";

class UsuarioPortalModel
{
    //Permite Registrar un Nuevo UsuarioPortal
    public static function mdlInsertarUsuarioPortal($Empleado, $Email, $Pass)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call InsertarUsuarioPortal($Empleado,'$Email', '$Pass');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Usuario Portal Registrado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el registro del Usuario Portal falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    //Permite  Mostrar un UsuarioPortal
    public static function mdlMostrarUsuarioPortal($Id)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaUsuariosPortal WHERE Id =$Id;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
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
        return $respuesta;
    }

    //Permite Mostrar la Lista de UsuarioPortals
    public static function mdlMostrarListaUsuariosPortal()
    {
        $filas = array();
        $connection =  MauiConnection::MauiConn();
        $sql = "SELECT * FROM ListaUsuariosPortal;";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filas[] = $row;
            }
        }

        $respuesta['code'] = '200';
        $respuesta['message'] = 'OK';
        $respuesta['description'] = 'Usuarios del Portal Encontrados Exitosamente.';
        $respuesta['data'] = $filas;
        return $respuesta;
    }

    //-- Permite Actualizar un UsuarioPortal Registrado

    public static function mdlActualizarUsuarioPortal($Id, $Empleado, $Email, $Estatus)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarUsuariosPortal($Id,$Empleado,'$Email','$Estatus');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Usuario Portal Actualizado Exitosamente.';
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Usuario Portal.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }

    public static function mdlActualizarPasswordUsuarioPortal($Id, $Pass)
    {
        $connection =  MauiConnection::MauiConn();
        $sql = "call ActualizarPasswordUsuarioPortal($Id,'$Pass');";

        $query = mysqli_query($connection, $sql);
        if ($query) {
            $respuesta['code'] = '200';
            $respuesta['message'] = 'OK';
            $respuesta['description'] = 'Contraseña del Usuario Portal Actualizada Exitosamente.';
        } else {
            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "No se pudo actualizar el Usuario Portal.";
            $respuesta['detail'] = "Error SQL: " . $connection->error;
        }
        return $respuesta;
    }
}
