<?php
include '../controller/origen-controller.php';
$mdl = new OrigenController;
$Id = $_POST['Id'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo el ID del Origen.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrMostrarOrigen($Id);
echo json_encode($respuesta);
