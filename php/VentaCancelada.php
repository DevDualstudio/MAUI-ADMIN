<?php
include '../controller/ventas-controller.php';
$mdl = new VentaController;

$Id = $_POST['ECIDV'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Alguno de los datos se encuentra en blanco.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrVentaCancelada($Id);
echo json_encode($respuesta);
