<?php
include '../controller/empleado-controller.php';
$mdl = new EmpleadoController;
$Id = $_POST['Id'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo el ID del empleado.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrMostrarEmpleado($Id);
echo json_encode($respuesta);
