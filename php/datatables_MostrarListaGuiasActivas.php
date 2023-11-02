<?php
include '../controller/guias-controller.php';

$mdl = new GuiaController;
$lista = $mdl->ctrMostrarListaManifiestos();

$totalr = count($lista);
$respuesta["draw"] = 0;
$respuesta["recordsTotal"] = $totalr;
$respuesta["recordsFiltered"] = $totalr;
$respuesta["data"] = $lista["data"];
echo json_encode($respuesta);
