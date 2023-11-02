<?php
include '../controller/general-controller.php';
$mdl = new GeneralController;

$tabla = $_REQUEST[ 'tabla' ];
$datos = $_REQUEST[ 'datos' ];
$action = $_REQUEST[ 'action' ];
if ($tabla == "" || $datos == "" ) {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Información no proporcionada";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
if ( $action == 'Inserta' ) {
    $respuesta = $mdl->ctrInsertaItem($tabla, $datos);
} else if ( $action == 'Actualiza' ) {
    $respuesta = $mdl->ctrActualizaItem($tabla, $datos);
} else if ( $action == 'Elimina' ) {
    $respuesta = $mdl->ctrEliminaItem($tabla, $datos);
} else {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Información no proporcionada";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
echo json_encode($respuesta);