<?php
include '../model/usuarios-portal-model.php';
class UsuarioPortalController
{

    /*=================================
     Agregar UsuarioPortal
     ===================================*/
    public function ctrInsertarUsuarioPortal($Empleado, $Email, $Pass)
    {
        $model = new UsuarioPortalModel();
        $answer = $model->mdlInsertarUsuarioPortal($Empleado, $Email, $Pass);
        return $answer;
    }

    /*=================================
      Muestra UsuarioPortal Especifico a partir de Id 
     ===================================*/
    public function ctrMostrarUsuarioPortal($Id)
    {
        $model = new UsuarioPortalModel();
        $answer = $model->mdlMostrarUsuarioPortal($Id);
        return $answer;
    }

    /*=================================
      Muestra Lista de UsuariosPortal
     ===================================*/
    public function ctrMostrarListaUsuariosPortal()
    {
        $model = new UsuarioPortalModel();
        $answer = $model->mdlMostrarListaUsuariosPortal();
        return $answer;
    }

    /*=================================
     Actualizar UsuarioPortal
     ===================================*/
    public function ctrActualizarUsuarioPortal($Id, $Empleado, $Email, $Estatus)
    {
        $model = new UsuarioPortalModel();
        $answer = $model->mdlActualizarUsuarioPortal($Id, $Empleado, $Email, $Estatus);
        return $answer;
    }

    /*=================================
     Actualizar contraseña del UsuarioPortal
     ===================================*/
    public function ctrActualizarPasswordUsuarioPortal($Id, $Pass)
    {
        $model = new UsuarioPortalModel();
        $answer = $model->mdlActualizarPasswordUsuarioPortal($Id, $Pass);
        return $answer;
    }
}
