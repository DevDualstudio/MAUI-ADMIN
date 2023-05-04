<?php
include '../controller/usuarios-portal-controller.php';
$mdl = new UsuarioPortalController;

$Email = $_POST['EmailUP'];
$Pass = $_POST['PwdUD'];
$Empleado = $_POST['EmpleadoUP'];

if ($Empleado == "" || $Empleado == "t") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Por favor seleccione un empleado.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}

if ($Email == "" || $Pass == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "El nombre de usuario y la contraseña no puede estar en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrInsertarUsuarioPortal($Empleado, $Email, $Pass);
echo json_encode($respuesta);
