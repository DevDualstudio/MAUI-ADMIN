<?php
include '../controller/empleado-controller.php';
$mdl = new EmpleadoController;
$lista = $mdl->ctrMostrarListaEmpleados();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
