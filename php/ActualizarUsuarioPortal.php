<?php
include '../controller/usuarios-portal-controller.php';
$mdl = new UsuarioPortalController;

$Id = $_POST['EIDUP'];
$Email = $_POST['EEmailUP'];
$Estatus = $_POST['EEstatusUP'];
$Empleado = $_POST['EEmpleadoUP'];

if ($Empleado == "" || $Empleado == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un empleado.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

if ($Id == "" || $Email == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El el nombre de usuario no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrActualizarUsuarioPortal($Id, $Empleado, $Email, $Estatus);
echo json_encode($respuesta);
