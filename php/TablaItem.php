<?php
include '../controller/general-controller.php';
$mdl = new GeneralController;
$tabla = $_REQUEST['tabla'];
$id = $_REQUEST['id'];
if ($tabla == "" || $id == "" ) {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Información de la tabla no proporcionada";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrMostrarItem($tabla, $id);
echo json_encode($respuesta);
