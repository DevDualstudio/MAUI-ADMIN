<?php
include '../controller/puesto-controller.php';
$mdl = new PuestoController;
$respuesta = $mdl->ctrMostrarListaPuestos();
echo json_encode($respuesta);
