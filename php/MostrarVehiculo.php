<?php
include '../controller/vehiculo-controller.php';
$mdl = new VehiculoController;
$Id = $_POST['Id'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo el ID del Vehiculo.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrMostrarVehiculo($Id);
echo json_encode($respuesta);
