<?php
include '../model/login-model.php';
class LoginController
{

    /*=================================
     Hacer Login
     ===================================*/
    public function ctrUsuarios_Portal_credenciales($Email, $Password)
    {
        $model = new LoginModel();
        $answer = $model->mdlUsuarios_Portal_credenciales($Email, $Password);
        return $answer;
    }

    /*=================================
     Crear Session
     ===================================*/
    public function mdlSessionStart($jwt)
    {
        $model = new LoginModel();
        $answer = $model->mdlSessionStart($jwt);
        return $answer;
    }
}
