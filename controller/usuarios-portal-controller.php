<?php
include '../model/usuarios-portal-model.php';
class UsuarioPortalController
{

    /*=================================
     Agregar UsuarioPortal
     ===================================*/
    public static function ctrInsertarUsuarioPortal($Empleado, $Email, $Pass)
    {
        $answer = UsuarioPortalModel::mdlInsertarUsuarioPortal($Empleado, $Email, $Pass);
        return $answer;
    }

    /*=================================
      Muestra UsuarioPortal Especifico a partir de Id 
     ===================================*/
    public static function ctrMostrarUsuarioPortal($Id)
    {
        $answer = UsuarioPortalModel::mdlMostrarUsuarioPortal($Id);
        return $answer;
    }

    /*=================================
      Muestra Lista de UsuariosPortal
     ===================================*/
    public static function ctrMostrarListaUsuariosPortal()
    {
        $answer = UsuarioPortalModel::mdlMostrarListaUsuariosPortal();
        return $answer;
    }

    /*=================================
     Actualizar UsuarioPortal
     ===================================*/
    public static function ctrActualizarUsuarioPortal($Id, $Empleado, $Email, $Estatus)
    {
        $answer = UsuarioPortalModel::mdlActualizarUsuarioPortal($Id, $Empleado, $Email, $Estatus);
        return $answer;
    }

    /*=================================
     Actualizar contraseña del UsuarioPortal
     ===================================*/
    public static function ctrActualizarPasswordUsuarioPortal($Id, $Pass)
    {
        $answer = UsuarioPortalModel::mdlActualizarPasswordUsuarioPortal($Id, $Pass);
        return $answer;
    }
}
