<?php
include '../controller/vehiculo-controller.php';
$mdl = new VehiculoController;
$respuesta = $mdl->ctrMostrarListaVehiculos();
echo json_encode($respuesta);
