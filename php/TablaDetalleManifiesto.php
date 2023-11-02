<?php
include '../controller/general-controller.php';
$mdl = new GeneralController;
$tabla = 'manifiestos';
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
$info = $respuesta[ 'data' ];
$campo = array( 'campo' => 'manifiestoId', 'id' => $info[ 'manifiestoId' ] );
$detalle = $mdl->ctrListaItemsFiltro( 'guiamanifiesto', $campo );
$info[ 'detalle' ] = $detalle[ 'data' ];
$respuesta[ 'data' ] = $info;
echo json_encode($respuesta);
