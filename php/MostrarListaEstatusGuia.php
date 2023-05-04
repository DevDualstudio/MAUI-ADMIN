<?php
include '../controller/guias-controller.php';
$mdl = new GuiaController;
$respuesta = $mdl->ctrMostrarListaEstatusGuia();
echo json_encode($respuesta);
