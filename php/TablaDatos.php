<?php
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
$respuesta = $mdl->ctrListaItems($tabla);
if ( isset( $_REQUEST[ 'datatable' ] ) ) {
    $info = $respuesta[ 'data' ];
    $respuesta = array();
    $datos = array();
    foreach( $info as $index => $datas ) {
        foreach( $datas as $indice => $data ) {
            $datos[ $index ][] = $data;
        }
    }
    $totalr = count( $info );
    $respuesta["draw"] = 0;
    $respuesta["recordsTotal"] = $totalr;
    $respuesta["recordsFiltered"] = $totalr;
    $respuesta["data"] = $datos;
}
echo json_encode($respuesta);
