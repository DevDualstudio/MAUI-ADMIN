<?php
include '../model/login-model.php';
class LoginController
{

    /*=================================
     Hacer Login
     ===================================*/
    public static function ctrUsuarios_Portal_credenciales($Email, $Password)
    {
        $answer = LoginModel::mdlUsuarios_Portal_credenciales($Email, $Password);
        return $answer;
    }

    /*=================================
     Crear Session
     ===================================*/
    public static function mdlSessionStart($jwt)
    {
        $answer = LoginModel::mdlSessionStart($jwt);
        return $answer;
    }
}
