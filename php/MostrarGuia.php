<?php
header( 'Access-Control-Allow-Origin: *' );
include '../controller/guias-controller.php';
$mdl = new GuiaController;
$Id = $_POST['Id'];

if ($Id == "") {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "No se está recibiendo el ID de la Guia.";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrMostrarGuia($Id);
echo json_encode($respuesta);
