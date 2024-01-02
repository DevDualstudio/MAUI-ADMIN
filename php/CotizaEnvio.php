<?php
header( 'Access-Control-Allow-Origin: *' );
include '../controller/cotizacion-controller.php';
$mdl = new CotizaController;
if ( $_REQUEST['origen'] == "" || $_REQUEST['destino'] == "" || $_REQUEST['alto'] == "" || $_REQUEST['largo'] == ""|| $_REQUEST['ancho'] == "" ) {
    $respuesta['code'] = '400';
    $respuesta['message'] = 'BAD REQUEST';
    $respuesta['description'] = "Datos incompletos";
    $respuesta['detail'] = "Datos vacíos.";
    echo json_encode($respuesta);
    exit();
}
$respuesta = $mdl->ctrCotiza( $_REQUEST['origen'], $_REQUEST['destino'], $_REQUEST['peso'], $_REQUEST['alto'], $_REQUEST['largo'], $_REQUEST['ancho'] );
echo json_encode($respuesta);
