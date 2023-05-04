<?php
include '../controller/puesto-controller.php';
$mdl = new PuestoController;
$lista = $mdl->ctrMostrarListaPuestos();
foreach( $lista['data'] as $index => $info ) {
    $lista['data'][$index]['AppAdministrador'] = ( $info['AppAdministrador'] == 1 ) ? 'Si' : 'No';
    $lista['data'][$index]['AppSupervisor'] = ( $info['AppSupervisor'] == 1 ) ? 'Si' : 'No';
    $lista['data'][$index]['AppUsuario'] = ( $info['AppUsuario'] == 1 ) ? 'Si' : 'No';
    $lista['data'][$index]['WebAdministrador'] = ( $info['WebAdministrador'] == 1 ) ? 'Si' : 'No';
    $lista['data'][$index]['WebSupervisor'] = ( $info['WebSupervisor'] == 1 ) ? 'Si' : 'No';
    $lista['data'][$index]['WebUsuario'] = ( $info['WebUsuario'] == 1 ) ? 'Si' : 'No';
}
$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
