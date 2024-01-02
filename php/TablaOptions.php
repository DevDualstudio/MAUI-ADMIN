<?php
header( 'Access-Control-Allow-Origin: *' );
include '../controller/general-controller.php';
$mdl = new GeneralController;
$tabla = $_REQUEST['tabla'];
if ($tabla == "" ) {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Información de la tabla no proporcionada";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrListaOptions($tabla);
echo json_encode($respuesta);
