<?php
header( 'Access-Control-Allow-Origin: *' );
include '../controller/guias-controller.php';
$mdl = new GuiaController;
$respuesta = $mdl->ctrMostrarGuiasLibres();
echo json_encode($respuesta);
