<?php
include '../controller/vehiculo-controller.php';
$mdl = new VehiculoController;
$lista = $mdl->ctrMostrarListaVehiculos();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
