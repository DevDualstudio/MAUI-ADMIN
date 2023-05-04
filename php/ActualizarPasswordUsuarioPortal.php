<?php
include '../controller/usuarios-portal-controller.php';
$mdl = new UsuarioPortalController;

$Id = $_POST['ECIDUP'];
$Pass = $_POST['ECPwdUD'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo la información del Usuario Portal.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
if ($Pass == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "La contraseña no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarPasswordUsuarioPortal($Id, $Pass);
echo json_encode($respuesta);
