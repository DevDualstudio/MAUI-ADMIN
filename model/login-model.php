<?php

require_once "connection.php";

class LoginModel
{
    public function __construct() {}
    //Permite Hacer Login
    public function mdlUsuarios_Portal_credenciales($Email, $Password)
    {
        $con =  new MauiConnection();
         $con->OpenConnection();
        $sql = "call Usuarios_Portal_credenciales('$Email','$Password');";

        $result = $con->Consulta($sql);
        if ($con->Cuantos( $result ) > 0) {
            $row = $con->Resultados( $result );
            $Estatus = $row['Respuesta'];
            if ($Estatus == 'Acceso Permitido') {
                $respuesta['code'] = '200';
                $respuesta['message'] = 'OK';
                $respuesta['description'] = '¡Bienvenido a MAUI!';
                $respuesta['status'] = true;
            } else {
                $respuesta['code'] = '400';
                $respuesta['message'] = 'BAD REQUEST';
                $respuesta['description'] = "El correo electrónico o la contraseña son incorrectos.";
                $respuesta['detail'] = "Acceso Denegado.";
                $respuesta['status'] = false;
            }
        } else {

            $respuesta['code'] = '400';
            $respuesta['message'] = 'BAD REQUEST';
            $respuesta['description'] = "Lo sentimos, el inicio de sesión falló. Por favor vuelva a intentarlo.";
            $respuesta['detail'] = "Error SQL: " . $con->MuestraError();
            $respuesta['status'] = false;
        }
        $con->CierraConexion();
        return $respuesta;
    }

    /*=================================
     Creamos la Sesion
     ===================================*/
    public function mdlSessionStart($jwt)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION['token_maui'] = $jwt;
        if ($_SESSION['token_maui'] == '') {
            return false;
        }
        return true;
    }
}
