<?php
include '../controller/usuarios-portal-controller.php';
$mdl = new UsuarioPortalController;
$Id = $_POST['Id'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo el ID del Usuario Portal.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrMostrarUsuarioPortal($Id);
echo json_encode($respuesta);
