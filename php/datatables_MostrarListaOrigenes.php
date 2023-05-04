<?php
include '../controller/origen-controller.php';
$mdl = new OrigenController;
$lista = $mdl->ctrMostrarListaOrigenes();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
